<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class Salaries_Controller extends Controller
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


    public function advance_salary()
    {
        return view('salaries.advance_salaries');
    }

     public function insert_advance_salary(Request $request)
    {
    	$emp_id = $request->emp_id;
        $month = $request->month;

        $advance = DB::table('advance_salaries')
        			   ->where('emp_id',$emp_id)
        			   ->where('month',$month)
        			   ->first();

        if($advance === NULL){
	        $data=array();
	        $data['emp_id'] = $request->emp_id;
	        $data['month'] = $request->month;
	        $data['year'] = $request->year;
	        $data['advanced_salary'] = $request->advanced_salary;

	        $advance = DB::table('advance_salaries')->insert($data);

	        if($advance){
	                    $notification=array(
	                        'messege'=>'Employee advance salaries Added Successfully',
	                        'alert-type'=>'success'
	                        );
	                        return Redirect()->back()->with($notification);
	        }else{
	            	$notification=array(
	                        'messege'=>'Error',
	                        'alert-type'=>'error'
	                        );
	                        return Redirect()->back()->with($notification);
	        }
        }else{
        	$notification=array(
	                        'messege'=>'Aleary Advanced paid',
	                        'alert-type'=>'error'
	                        );
	                        return Redirect()->back()->with($notification);
        }

    }

    // all advance salary return here
    public function all_advance_salary(){
        $all_advance_salary = DB::table('advance_salaries')
        				      ->join('employees','advance_salaries.emp_id','employees.id')		
        				      ->select('advance_salaries.*','employees.name','employees.salary','employees.photo')
        				      ->orderBy('id','DESC')
        					  ->get();
        return view('salaries.all_advance_salary',compact('all_advance_salary'));
     } 	


     //  single employ advance salaries edit here
    public function edit_advance_salary($id){
    	$edit = DB::table('advance_salaries')	
    			->where('id',$id)
    			->first();
    	return view('salaries.edit_advance_salary')->with("edit",$edit);

    	//echo "<pre>";
    	//print_r($post);
    	//exit(); 
    }

     public function update_advance_selary(Request $request, $id){

        $data=array();
	    $data['month'] = $request->month;
	    $data['year'] = $request->year;
	    $data['advanced_salary'] = $request->advanced_salary;

        $user = DB::table('advance_salaries')->where('id',$id)->update($data);
        	 if($user){
        			$notification=array(
                        'messege'=>'employee advance salary Updated Successfully',
                        'alert-type'=>'success'
                        );
                    return Redirect()->route('all.advanced_salaries')->with($notification);
        		}else{
        			$notification=array(
	                        'messege'=>'Not update Advanced paid',
	                        'alert-type'=>'error'
	                        );
	                        return Redirect()->route('all.advanced_salaries')->with($notification);
        }		
    }


//  single employ delete here
    public function delete_advance_salary($id){

        $delete = DB::table('advance_salaries')->where('id',$id)->delete();    
            if($delete){
                    $notification=array(
                        'messege'=>'employee Advanced paid delete Successfully',
                        'alert-type'=>'success'
                        );
                        return Redirect()->route('all.advanced_salaries')->with($notification);
                }else{
                    return Redirect()->back();
                }


    }    

     // empl. pay salary return here
    public function pay_salaries(){
    /*	$month = date("F",strtotime('-1 month'));
        $pay_salaries = DB::table('advance_salaries')
        				      ->join('employees','advance_salaries.emp_id','employees.id')		
        				      ->select('advance_salaries.*','employees.name','employees.salary','employees.photo')
        				      ->where('month',$month)
        					  ->get(); */
        $employee = DB::table('employees')->get();					  
        return view('salaries.pay_salaries',compact('employee'));
     }
}
