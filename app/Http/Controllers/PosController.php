<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class PosController extends Controller
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

    // add products return here
    public function pos(){
    	$product = DB::table('products')
    	->join('categories','products.cat_id','categories.id')
    	->select('products.*','categories.cat_name')
    	->get();
    	$customer = DB::table('customers')->get();
    	$category = DB::table('categories')->get();
        return view('poss.pos',compact('product','customer','category'));
        //echo "<pre>";
    	//print_r($post);
    	//exit(); 
    }

    public function panding_orders(){
      $pending = DB::table('orders')
      ->join('customers','orders.customer_id','customers.id')
      ->select('orders.*','customers.name')
      ->where('order_status', 'pending')
      ->get();

       return view('poss.pending_order',compact('pending'));
      
    }

    public function view_order_status($id){
        $order = DB::table('orders')
                ->join('customers','orders.customer_id','customers.id')
                ->select('customers.*','orders.*','orders.id as order_id')
                ->where('orders.id', $id)
                ->first();

        $order_details = DB::table('ordersdetails')  
                        ->join('products','ordersdetails.product_id','products.id')      
                        ->select('ordersdetails.*','products.product_name','products.product_code')
                        ->where('order_id', $id)
                        ->get();

        return view('poss.order_confermation',compact('order','order_details'));
    }

    public function pos_done($id){
         $approve = DB::table('orders')->where('id', $id)->update(['order_status' => 'success']);
         if($approve){
                    $notification=array(
                        'messege'=>'Successfully Order Confirmed Done | And All Products Delevered',
                        'alert-type'=>'success'
                        );
                        return Redirect()->route('panding.orders')->with($notification);
                }else{
                    $notification=array(
                        'messege'=>'Order Confirmed Not Done Something Wrong !!',
                        'alert-type'=>'error'
                        );
                        return Redirect()->back()->with($notification);
                }
    }

    public function success_orders(){
      $success = DB::table('orders')
      ->join('customers','orders.customer_id','customers.id')
      ->select('orders.*','customers.name')
      ->where('order_status', 'success')
      ->get();

       return view('poss.success_order',compact('success'));
      
    }
}
