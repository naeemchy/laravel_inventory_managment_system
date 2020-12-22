<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Attendance;
class AttendanceController extends Controller
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

    // add attendance return here
    public function take_attendance(){
    	$employee = DB::table('employees')->get();
        return view('attendance.take_attendance',compact('employee'));
    }

    public function insert_attendance(Request $request){
    	$date=$request->att_date;
    	$attend_date=DB::table('attendances')->where('att_date',$date)->first();
    	if($attend_date){
    		            $notification=array(
                        'messege'=>'Today Attendances Alredy Taken',
                        'alert-type'=>'error'
                        );
                        return Redirect()->back()->with($notification);
        	}else{
        		foreach ($request->user_id as $id) {
	    		$data[]=[
	    			"user_id"=>$id,
	    			"attendance"=>$request->attendance[$id],
	    			"att_date"=>$request->att_date,
	    			"att_year"=>$request->att_year,
	    			"month"=>$request->month,
		    		"edit_date"=>date("d_m_y")
		    		];
	    	}

	    	$attend=DB::table('attendances')->insert($data);
	    	if($attend){
	                    $notification=array(
	                        'messege'=>'Attendances Take Successfully',
	                        'alert-type'=>'success'
	                        );
	                        return Redirect()->back()->with($notification);
	        }else{
	            $notification=array(
	                        'messege'=>'Attendances Not Added',
	                        'alert-type'=>'error'
	                        );
	                        return Redirect()->back()->with($notification);
	        	}

	        	}
    	

    	    	//return $request->all();
        		
    }


    public function all_attendance(){
    	$all_attend = DB::table('attendances')->select('edit_date')->groupBy('edit_date')->get();
        return view('attendance.all_attendance',compact('all_attend'));
    } 

    //  single attendance edit here
    public function edit_attendance($edit_date){
    	$date = DB::table('attendances')->where('edit_date',$edit_date)->first();
    	$edit = DB::table('attendances')	
    			->join('employees','attendances.user_id','employees.id')
    			->select('attendances.*','employees.name','employees.photo')
    			->where('edit_date',$edit_date)
    			->get();
    	return view('attendance.edit_attendances',compact("edit","date"));

    	 
    }

    public function update_attendance(Request $request){
    		foreach ($request->id as $id) {
	    		$data=[
	    			"attendance"=>$request->attendance[$id],
	    			"att_date"=>$request->att_date,
	    			"att_year"=>$request->att_year,
	    			"month"=>$request->month
		    		];

		    		$attendance = Attendance::where(['att_date'=>$request->att_date,'id'=>$id])->first();
		    		$attendance->update($data);
	    	}

	    	if($attendance){
	                    $notification=array(
	                        'messege'=>'Attendances Update Successfully',
	                        'alert-type'=>'success'
	                        );
	                        return Redirect()->route('all.attendance')->with($notification);
	        }else{
	            $notification=array(
	                        'messege'=>'Attendances Not Update',
	                        'alert-type'=>'error'
	                        );
	                        return Redirect()->route('all.attendance')->with($notification);
	        	}

    }


    //  single attendance view here
    public function view_adattennce($edit_date){
    	$date = DB::table('attendances')->where('edit_date',$edit_date)->first();
    	$edit = DB::table('attendances')	
    			->join('employees','attendances.user_id','employees.id')
    			->select('attendances.*','employees.name','employees.photo')
    			->where('edit_date',$edit_date)
    			->get();
    	return view('attendance.view_attendance',compact("edit","date"));
    }

    //  single attendance view here
    public function delete_attendance($edit_date){
    	$delete = DB::table('attendances')->where('edit_date',$edit_date)->delete();
    	if($delete){
	                    $notification=array(
	                        'messege'=>'Attendances delete Successfully',
	                        'alert-type'=>'success'
	                        );
	                        return Redirect()->route('all.attendance')->with($notification);
	        }else{
	            $notification=array(
	                        'messege'=>'Attendances Not delete',
	                        'alert-type'=>'error'
	                        );
	                        return Redirect()->route('all.attendance')->with($notification);
	        	}
    }	

    public function settings(){
       	$setting = DB::table('settings')->first();
    	return view('setting.view_settings',compact("setting"));
    }


    //  setting update here
    public function update_website(Request $request, $id){
         $validatedData = $request->validate([
	        'company_name' => 'required|max:255',
	        'company_address' => 'required|max:255',
	        'company_email' => 'required|max:255',
	        'company_mobile' => 'required|max:13',
	        'company_city' => 'required',
	        'company_country' => 'required',
	        'company_phone' => 'required',
	        'company_zipcode' => 'required',
    	]);

        $data=array();
        $data['company_name'] = $request->company_name;
        $data['company_address'] = $request->company_address;
        $data['company_email'] = $request->company_email;
        $data['company_mobile'] = $request->company_mobile;
        $data['company_city'] = $request->company_city;
        $data['company_country'] = $request->company_country;
        $data['company_phone'] = $request->company_phone;
        $data['company_zipcode'] = $request->company_zipcode;

        $company_logo=$request->file('company_logo'); 
        if($company_logo){
            $image_name=hexdec(uniqid());
            $ext=strtolower($company_logo->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/company/';
            $image_url=$upload_path.$image_full_name;
            $success=$company_logo->move($upload_path,$image_full_name);
            if($success){
              $data['company_logo']=$image_url; 
              	$img = DB::table('settings')->where('id',$id)->first();
        		$image_path = $img->company_logo;
        		if($image_path != NULL){
                    $done = unlink($image_path); 
                }
        	  $user = DB::table('settings')->where('id',$id)->update($data);
        	  if($user){
        			$notification=array(
                        'messege'=>'company settings Updated Successfully with New image',
                        'alert-type'=>'success'
                        );
                    return Redirect()->route('settings')->with($notification);
        		}else{
        			return Redirect()->back();
        		}

        }
      }
      else{
        	$user = DB::table('settings')->where('id',$id)->update($data);
        		if($user){
        			$notification=array(
                        'messege'=>'company settings Updated Successfully with old image',
                        'alert-type'=>'success'
                        );
                    return Redirect()->route('settings')->with($notification);
        		}
        }    		
    } 
}
