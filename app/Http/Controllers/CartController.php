<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use DB;
class CartController extends Controller
{
          /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function add_cart(Request $request){
    	$data=array();
    	$data['id'] = $request->id;
        $data['name'] = $request->name;
        $data['qty'] = $request->qty;
        $data['price'] = $request->price;
        $cart=Cart::add($data);

        if($cart){
                    $notification=array(
                        'messege'=>'Product Added Successfully into cart',
                        'alert-type'=>'success'
                        );
                        return Redirect()->back()->with($notification);
                }else{
                    $notification=array(
                        'messege'=>'Product Not Added Successfully into cart',
                        'alert-type'=>'error'
                        );
                        return Redirect()->back()->with($notification);
                }


        //echo "<pre>";
    	//print_r($post);
    	//exit(); 
    }

    public function cart_update(Request $request, $rowId){
    	$data=array();  
    	$qty = $request->qty;  
    	$update = Cart::update($rowId, $qty);

    	if($update){
                    $notification=array(
                        'messege'=>'Cart update Successfully',
                        'alert-type'=>'success'
                        );
                        return Redirect()->back()->with($notification);
                }else{
                    $notification=array(
                        'messege'=>'Cart Not updated Successfully',
                        'alert-type'=>'error'
                        );
                        return Redirect()->back()->with($notification);
                }
    }

    public function cart_remove($rowId){ 
        $remove = Cart::remove($rowId);
        $notification=array(
            'messege'=>'Cart Product Remove Successfully',
            'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);

    }

    public function create_invoice(Request $request){
        $validatedData = $request->validate([
            'cus_id' => 'required',
        ],
        [
            'cus_id.required' => 'Please Select An Customer Name !',
        ]);

        $cus_id = $request->cus_id;
        $customer = DB::table('customers')->where('id',$cus_id)->first();
        $contants = Cart::content();
        return view('poss.invoice', compact('customer','contants'));
    }

     public function final_invoice(Request $request){
        $data=array();
        $data['customer_id'] = $request->customer_id;
        $data['order_date'] = $request->order_date;
        $data['order_status'] = $request->order_status;
        $data['total_products'] = $request->total_products;
        $data['sub_total'] = $request->sub_total;
        $data['vat'] = $request->vat;
        $data['total'] = $request->total;
        $data['payment_status'] = $request->payment_status;
        $data['pay'] = $request->pay;
        $data['due'] = $request->due;

        $order_id = DB::table('orders')->insertGetId($data);
        $contants = Cart::content();
        $odata=array();

        foreach ($contants as $contant) {
            $odata['order_id'] = $order_id;
            $odata['product_id'] = $contant->id;
            $odata['quantity'] = $contant->qty;
            $odata['unicost'] = $contant->price;
            $odata['total'] = $contant->total;

            $insert = DB::table('ordersdetails')->insert($odata);
        }

        if($insert){
                    $notification=array(
                        'messege'=>'Thanks for your Orders | Now your products are in processing',
                        'alert-type'=>'success'
                        );
                        Cart::destroy();
                        return Redirect()->route('pos')->with($notification);
                        //return Redirect()->back()->with($notification);
                }else{
                    $notification=array(
                        'messege'=>'Invoice Not Created Something Wrong !!',
                        'alert-type'=>'error'
                        );
                        return Redirect()->back()->with($notification);
                }
        // echo "<pre>";
        // print_r($data);
        // exit(); 
     }	
}
