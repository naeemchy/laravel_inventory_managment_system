<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class SupplierController extends Controller
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
        return view('supplier.add_supplier');
    }

     public function store(Request $request)
    {
        $validatedData = $request->validate([
	        'name' => 'required|max:255',
	        'email' => 'required|unique:suppliers|max:255',
	        'phone' => 'required|unique:suppliers|max:13',
	        'address' => 'required',
	        'city' => 'required',
    	]);

    	$data=array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['shop'] = $request->shop;
        $data['account_holder'] = $request->account_holder;
        $data['account_number'] = $request->account_number;
        $data['bank_name'] = $request->bank_name;
        $data['branch_name'] = $request->branch_name;
        $data['city'] = $request->city;
        $data['type'] = $request->type;

        $photo=$request->file('photo');
        if($photo){
            $image_name=hexdec(uniqid());
            $ext=strtolower($photo->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/supplier/';
            $image_url=$upload_path.$image_full_name;
            $success=$photo->move($upload_path,$image_full_name);
            if($success){
                $data['photo']=$image_url;
                $add = DB::table('suppliers')->insert($data);
                if($add){
                    $notification=array(
                        'messege'=>'suppliers Added Successfully with image',
                        'alert-type'=>'success'
                        );
                        return Redirect()->route('add.supplier')->with($notification);
                }else{
                    return Redirect()->back();
                }
            }
        }else{
        	$add = DB::table('suppliers')->insert($data);
            $notification=array(
                        'messege'=>'suppliers Added Successfully without image',
                        'alert-type'=>'error'
                        );
                        return Redirect()->route('add.supplier')->with($notification);
        	}
    }


    // all supplier return here
    public function all_supplier(){
        $all_supplier = DB::table('suppliers')->get();
        return view('supplier.all_supplier',compact('all_supplier'));
     } 

    //  single supplier view return here
    public function view_supplier($id){
    	$single = DB::table('suppliers')
    			  ->where('id',$id)
    			  ->first();
    	return view('supplier.view_supplier')->with("single",$single);

    }

        //  single supplier delete here
    public function delete_supplier($id){
        $img = DB::table('suppliers')->where('id',$id)->first();
        $image_url = $img->photo;
        if( $image_url == NULL ){

        $delete = DB::table('suppliers')->where('id',$id)->delete();    
            if($delete){
                    $notification=array(
                        'messege'=>'suppliers delete Successfully without image',
                        'alert-type'=>'success'
                        );
                        return Redirect()->route('all.supplier')->with($notification);
                }else{
                    return Redirect()->back();
                }
            }
        else{

        	$done = unlink($image_url); 
        	$delete = DB::table('suppliers')->where('id',$id)->delete();
        	if($delete){
                    $notification=array(
                        'messege'=>'suppliers delete Successfully with image',
                        'alert-type'=>'success'
                        );
                        return Redirect()->route('all.supplier')->with($notification);
                }else{
                    return Redirect()->back();
                }
        }        

    }


    //  single supplier edit here
    public function edit_supplier($id){
    	$edit = DB::table('suppliers')
    			  ->where('id',$id)
    			  ->first();
    	return view('supplier.edit_supplier')->with("edit",$edit);
    }


    //  single supplier update here
    public function update_supplier(Request $request, $id){
         $validatedData = $request->validate([
	        'name' => 'required|max:255',
	        'email' => 'required|max:255',
	        'phone' => 'required|max:13',
	        'address' => 'required',
	        'city' => 'required',
    	]); 

        $data=array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['shop'] = $request->shop;
        $data['account_holder'] = $request->account_holder;
        $data['account_number'] = $request->account_number;
        $data['bank_name'] = $request->bank_name;
        $data['branch_name'] = $request->branch_name;
        $data['city'] = $request->city;
        $data['type'] = $request->type; 

        $photo=$request->file('photo'); 
        if($photo){
            $image_name=hexdec(uniqid());
            $ext=strtolower($photo->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/supplier/';
            $image_url=$upload_path.$image_full_name;
            $success=$photo->move($upload_path,$image_full_name);
            if($success){
              	$data['photo']=$image_url; 
              	$img = DB::table('suppliers')->where('id',$id)->first();
        		$image_path = $img->photo;
        		if($image_path != NULL){
                    $done = unlink($image_path); 
                }
        	  $user = DB::table('suppliers')->where('id',$id)->update($data);
        	  if($user){
        			$notification=array(
                        'messege'=>'suppliers Updated Successfully with New image',
                        'alert-type'=>'success'
                        );
                    return Redirect()->route('all.supplier')->with($notification);
        		}else{
        			return Redirect()->back();
        		}

        }
      }
      else{
        	$user = DB::table('suppliers')->where('id',$id)->update($data);
        		if($user){
        			$notification=array(
                        'messege'=>'suppliers Updated Successfully with old image',
                        'alert-type'=>'success'
                        );
                    return Redirect()->route('all.supplier')->with($notification);
        		}
        }    		
    }    


}
