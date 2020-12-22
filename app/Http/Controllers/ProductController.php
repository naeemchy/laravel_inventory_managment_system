<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Exports\ProductExport;
use App\Imports\ProductImport;
use Maatwebsite\Excel\Facades\Excel;
class ProductController extends Controller
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
    public function add_product(){
        return view('product.add_product');
    }

    // all products return here
    public function all_product(){
        $all_product = DB::table('products')->get();
        return view('product.all_product',compact('all_product'));
     } 

     // insert products return here
     public function insert_product(Request $request){
     	$data=array();
        $data['product_name'] = $request->product_name;
        $data['cat_id'] = $request->cat_id;
        $data['sup_id'] = $request->sup_id;
        $data['product_code'] = $request->product_code;
        $data['product_garage'] = $request->product_garage;
        $data['product_route'] = $request->product_route;
        $data['buy_date'] = $request->buy_date;
        $data['expire_date'] = $request->expire_date;
        $data['buying_price'] = $request->buying_price;
        $data['selling_price'] = $request->selling_price;

        $product_image=$request->file('product_image');
        if($product_image){
            $image_name=hexdec(uniqid());
            $ext=strtolower($product_image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/product/';
            $image_url=$upload_path.$image_full_name;
            $success=$product_image->move($upload_path,$image_full_name);
            if($success){
                $data['product_image']=$image_url;
                $add = DB::table('products')->insert($data);
                if($add){
                    $notification=array(
                        'messege'=>'products Added Successfully with image',
                        'alert-type'=>'success'
                        );
                        return Redirect()->route('add.product')->with($notification);
                }else{
                    return Redirect()->back();
                }
            }
        }else{
        	$add = DB::table('products')->insert($data);
            $notification=array(
                        'messege'=>'products Added Successfully without image',
                        'alert-type'=>'error'
                        );
                        return Redirect()->route('add.product')->with($notification);
        	}
     }

     //  single product delete here
    public function delete_product($id){
        $img = DB::table('products')->where('id',$id)->first();
        $image_url = $img->product_image;
        if( $image_url == NULL ){
                
            $delete = DB::table('products')->where('id',$id)->delete();
            if($delete){
                    $notification=array(
                        'messege'=>'products delete Successfully without image',
                        'alert-type'=>'success'
                        );
                        return Redirect()->route('all.product')->with($notification);
                }else{
                    return Redirect()->back();
                }
            }
        else{
            $done = unlink($image_url); 
            $delete = DB::table('products')->where('id',$id)->delete();    
            if($delete){
                    $notification=array(
                        'messege'=>'products delete Successfully with image',
                        'alert-type'=>'success'
                        );
                        return Redirect()->route('all.product')->with($notification);
                }else{
                    return Redirect()->back();
                }
        }        

    }

    //  single product view return here
    public function view_product($id){
    	$single = DB::table('products')
    			  ->join('categories','products.cat_id','categories.id')	
    			  ->join('suppliers','products.sup_id','suppliers.id')	
    			  ->select('products.*','categories.cat_name','suppliers.name')
    			  ->where('products.id',$id)
    			  ->first();
    	return view('product.view_product')->with("single",$single);

    }


    //  single product edit here
    public function edit_product($id){
    	$edit = DB::table('products')
    			  ->where('id',$id)
    			  ->first();
    	return view('product.edit_product')->with("edit",$edit);
    }


    //  single product update here
    public function update_product(Request $request, $id){

        $data=array();
        $data['product_name'] = $request->product_name;
        $data['cat_id'] = $request->cat_id;
        $data['sup_id'] = $request->sup_id;
        $data['product_code'] = $request->product_code;
        $data['product_garage'] = $request->product_garage;
        $data['product_route'] = $request->product_route;
        $data['buy_date'] = $request->buy_date;
        $data['expire_date'] = $request->expire_date;
        $data['buying_price'] = $request->buying_price;
        $data['selling_price'] = $request->selling_price;

        $product_image=$request->file('product_image'); 
        if($product_image){
            $image_name=hexdec(uniqid());
            $ext=strtolower($product_image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/product/';
            $image_url=$upload_path.$image_full_name;
            $success=$product_image->move($upload_path,$image_full_name);
            if($success){
              	$data['product_image']=$image_url; 
              	$img = DB::table('products')->where('id',$id)->first();
        		$image_path = $img->product_image;
        		if($image_path != NULL){
                    $done = unlink($image_path); 
                }
        	  $user = DB::table('products')->where('id',$id)->update($data);
        	  if($user){
        			$notification=array(
                        'messege'=>'products Updated Successfully with New image',
                        'alert-type'=>'success'
                        );
                    return Redirect()->route('all.product')->with($notification);
        		}else{
        			return Redirect()->back();
        		}

        }
      }
      else{
        	$user = DB::table('products')->where('id',$id)->update($data);
        		if($user){
        			$notification=array(
                        'messege'=>'products Updated Successfully with old image',
                        'alert-type'=>'success'
                        );
                    return Redirect()->route('all.product')->with($notification);
        		}
        }    		
    }    

     	//echo "<pre>";
        //print_r($data);
        //exit();

     //  excel import product and export product route here

    public function excel_import_product(){
        return view('product.import_product');
    }

    public function export(){
        return Excel::download(new ProductExport,'products.xlsx');
    }

    public function import(Request $request){
        $import = Excel::import(new ProductImport, $request->file('import_file'));
        if($import){
                    $notification=array(
                        'messege'=>'Product import Successfully',
                        'alert-type'=>'success'
                        );
                    return Redirect()->route('all.product')->with($notification);
        }else{
            return Redirect()->back();
        }
    }
}
