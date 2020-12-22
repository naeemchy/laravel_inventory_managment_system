<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class CustomerController extends Controller
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


    public function index()
    {
        return view('customer.add_customer');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
	        'name' => 'required|max:255',
	        'email' => 'required|unique:customers|max:255',
	        'phone' => 'required|unique:customers|max:13',
	        'address' => 'required',
	        'city' => 'required',
    	]);

    	$data=array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['shopname'] = $request->shopname;
        $data['account_holder'] = $request->account_holder;
        $data['account_number'] = $request->account_number;
        $data['bank_name'] = $request->bank_name;
        $data['bank_branch'] = $request->bank_branch;
        $data['city'] = $request->city;

        $photo=$request->file('photo');
        if($photo){
            $image_name=hexdec(uniqid());
            $ext=strtolower($photo->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/customers/';
            $image_url=$upload_path.$image_full_name;
            $success=$photo->move($upload_path,$image_full_name);
            if($success){
                $data['photo']=$image_url;
                $add = DB::table('customers')->insert($data);
                if($add){
                    $notification=array(
                        'messege'=>'Customers Added Successfully with image',
                        'alert-type'=>'success'
                        );
                        return Redirect()->route('add.customer')->with($notification);
                }else{
                    return Redirect()->back();
                }
            }
        }else{
        	$add = DB::table('customers')->insert($data);
            $notification=array(
                        'messege'=>'Customers Added Successfully without image',
                        'alert-type'=>'error'
                        );
                        return Redirect()->route('add.customer')->with($notification);
        	}
    }


    // all customer return here
    public function all_customer(){
        $all_customer = DB::table('customers')->get();
        return view('customer.all_customer',compact('all_customer'));
     } 	



     //  single employ view return here
    public function view_customer($id){
    	$single = DB::table('customers')
    			  ->where('id',$id)
    			  ->first();
    	return view('customer.view_customer')->with("single",$single);

    	//echo "<pre>";
    	//print_r($post);
    	//exit(); 
    }

    //  single customer delete here
    public function delete_customer($id){
        $img = DB::table('customers')->where('id',$id)->first();
        $image_url = $img->photo;
        if( $image_url == NULL ){

        $delete = DB::table('customers')->where('id',$id)->delete();    
            if($delete){
                    $notification=array(
                        'messege'=>'customers delete Successfully without image',
                        'alert-type'=>'success'
                        );
                        return Redirect()->route('all.customer')->with($notification);
                }else{
                    return Redirect()->back();
                }
            }
        else{

        	$done = unlink($image_url); 
        	$delete = DB::table('customers')->where('id',$id)->delete();
        	if($delete){
                    $notification=array(
                        'messege'=>'customers delete Successfully with image',
                        'alert-type'=>'success'
                        );
                        return Redirect()->route('all.customer')->with($notification);
                }else{
                    return Redirect()->back();
                }
        }        

    }


    //  single customer edit here
    public function edit_customer($id){
    	$edit = DB::table('customers')
    			  ->where('id',$id)
    			  ->first();
    	return view('customer.edit_customer')->with("edit",$edit);
    }

    //  single customer update here
    public function update_customer(Request $request, $id){
         $validatedData = $request->validate([
	        'name' => 'required|max:255',
	        'email' => 'required|max:255',
	        'address' => 'required',
	        'city' => 'required',
    	]);

        $data=array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['shopname'] = $request->shopname;
        $data['account_holder'] = $request->account_holder;
        $data['account_number'] = $request->account_number;
        $data['bank_name'] = $request->bank_name;
        $data['bank_branch'] = $request->bank_branch;
        $data['city'] = $request->city;

        $photo=$request->file('photo'); 
        if($photo){
            $image_name=hexdec(uniqid());
            $ext=strtolower($photo->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/customers/';
            $image_url=$upload_path.$image_full_name;
            $success=$photo->move($upload_path,$image_full_name);
            if($success){
              $data['photo']=$image_url; 
              	$img = DB::table('customers')->where('id',$id)->first();
        		$image_path = $img->photo;
                if($image_path != NULL){
                    $done = unlink($image_path); 
                }
        	  $user = DB::table('customers')->where('id',$id)->update($data);
        	  if($user){
        			$notification=array(
                        'messege'=>'customers Updated Successfully with New image',
                        'alert-type'=>'success'
                        );
                    return Redirect()->route('all.customer')->with($notification);
        		}else{
        			return Redirect()->back();
        		}

        }
      }
      else{
        	$user = DB::table('customers')->where('id',$id)->update($data);
        		if($user){
        			$notification=array(
                        'messege'=>'customers Updated Successfully with old image',
                        'alert-type'=>'success'
                        );
                    return Redirect()->route('all.customer')->with($notification);
        		}
        }    		
    }    
}
