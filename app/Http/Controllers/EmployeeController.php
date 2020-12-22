<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Employee;

class EmployeeController extends Controller
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
        return view('add_employee');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
	        'name' => 'required|max:255',
	        'email' => 'required|unique:employees|max:255',
	        'nid' => 'required|unique:employees|max:255',
	        'phone' => 'required|max:13',
	        'address' => 'required',
	        'photo' => 'required',
	        'salary' => 'required',
	        'city' => 'required',
    	]);

    	$data=array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['experience'] = $request->experience;
        $data['nid'] = $request->nid;
        $data['salary'] = $request->salary;
        $data['vacation'] = $request->vacation;
        $data['city'] = $request->city;

        $photo=$request->file('photo');
        if($photo){
            $image_name=hexdec(uniqid());
            $ext=strtolower($photo->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/employee/';
            $image_url=$upload_path.$image_full_name;
            $success=$photo->move($upload_path,$image_full_name);
            if($success){
                $data['photo']=$image_url;
                $news = DB::table('employees')->insert($data);
                if($news){
                    $notification=array(
                        'messege'=>'Employee Added Successfully with image',
                        'alert-type'=>'success'
                        );
                        return Redirect()->route('add.employe')->with($notification);
                }else{
                    return Redirect()->back();
                }
            }
        }else{
            $notification=array(
                        'messege'=>'Employee Added Successfully without image',
                        'alert-type'=>'error'
                        );
                        return Redirect()->route('add.employe')->with($notification);
        	}

    }

// all employ return here
    public function all_employe(){
        $all_employee = DB::table('employees')->get();
        return view('all_employee',compact('all_employee'));
     } 

//  single employ view return here
    public function view_employee($id){
    	$single = DB::table('employees')
    			  ->where('id',$id)
    			  ->first();
    	return view('view_employee')->with("single",$single);

    	//echo "<pre>";
    	//print_r($post);
    	//exit(); 
    }

//  single employ delete here
    public function delete_employee($id){
        $img = DB::table('employees')->where('id',$id)->first();
        $image_url = $img->photo;
        $done = unlink($image_url); 

        $delete = DB::table('employees')->where('id',$id)->delete();    
            if($delete){
                    $notification=array(
                        'messege'=>'employee delete Successfully with image',
                        'alert-type'=>'success'
                        );
                        return Redirect()->route('all.employe')->with($notification);
                }else{
                    return Redirect()->back();
                }


    }
//  single employ edit here
    public function edit_employee($id){
    	$edit = DB::table('employees')
    			  ->where('id',$id)
    			  ->first();
    	return view('edit_employee')->with("edit",$edit);

    	//echo "<pre>";
    	//print_r($post);
    	//exit(); 
    }

//  single employ update here
    public function update_employee(Request $request, $id){
         $validatedData = $request->validate([
	        'name' => 'required|max:255',
	        'email' => 'required|max:255',
	        'nid' => 'required|max:255',
	        'address' => 'required',
	        'salary' => 'required',
	        'city' => 'required',
    	]);

        $data=array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['experience'] = $request->experience;
        $data['nid'] = $request->nid;
        $data['salary'] = $request->salary;
        $data['vacation'] = $request->vacation;
        $data['city'] = $request->city;

        $photo=$request->file('photo'); 
        if($photo){
            $image_name=hexdec(uniqid());
            $ext=strtolower($photo->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/employee/';
            $image_url=$upload_path.$image_full_name;
            $success=$photo->move($upload_path,$image_full_name);
            if($success){
              $data['photo']=$image_url; 
              	$img = DB::table('employees')->where('id',$id)->first();
        		$image_path = $img->photo;
        		if($image_path != NULL){
                    $done = unlink($image_path); 
                }
        	  $user = DB::table('employees')->where('id',$id)->update($data);
        	  if($user){
        			$notification=array(
                        'messege'=>'employee Updated Successfully with New image',
                        'alert-type'=>'success'
                        );
                    return Redirect()->route('all.employe')->with($notification);
        		}else{
        			return Redirect()->back();
        		}

        }
      }
      else{
        	$user = DB::table('employees')->where('id',$id)->update($data);
        		if($user){
        			$notification=array(
                        'messege'=>'employee Updated Successfully with old image',
                        'alert-type'=>'success'
                        );
                    return Redirect()->route('all.employe')->with($notification);
        		}
        }    		
    }    


}
