<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ExpenseController extends Controller
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

    // add expense return here
    public function add_expense(){
        return view('expense.add_expense');
    }

    // Save expense return here
        public function insert_expense(Request $request){
    	$data=array();
        $data['details'] = $request->details;
        $data['amount'] = $request->amount;
        $data['month'] = $request->month;
        $data['date'] = $request->date;
        $data['year'] = $request->year;
      
        $expense = DB::table('expenses')->insert($data);
                if($expense){
                    $notification=array(
                        'messege'=>'expense Added Successfully',
                        'alert-type'=>'success'
                        );
                        return Redirect()->route('add.expense')->with($notification);
        }else{
            $notification=array(
                        'messege'=>'expense Not Added',
                        'alert-type'=>'error'
                        );
                        return Redirect()->route('add.expense')->with($notification);
        	}

    }

    // today expense return here
    public function today_expense(){
    	$date = date("d/m/y");
    	$today = DB::table('expenses')->where('date',$date)->get();
        return view('expense.today_expense',compact('today'));
    }

    // monthly expense return here
    public function monthly_expense(){
    	$month = date("F");
    	$monthly = DB::table('expenses')->where('month',$month)->get();
        return view('expense.monthly_expense',compact('monthly'));
    }

        //single monthly expense return here
    public function january_expense(){
    	$month = "January";
    	$monthly = DB::table('expenses')->where('month',$month)->get();
        return view('expense.monthly_expense',compact('monthly'));
    }

    //single monthly expense return here
    public function february_expense(){
    	$month = "February";
    	$monthly = DB::table('expenses')->where('month',$month)->get();
        return view('expense.monthly_expense',compact('monthly'));
    }

    //single monthly expense return here
    public function march_expense(){
    	$month = "March";
    	$monthly = DB::table('expenses')->where('month',$month)->get();
        return view('expense.monthly_expense',compact('monthly'));
    }

    //single monthly expense return here
    public function april_expense(){
    	$month = "April";
    	$monthly = DB::table('expenses')->where('month',$month)->get();
        return view('expense.monthly_expense',compact('monthly'));
    }

    //single monthly expense return here
    public function may_expense(){
    	$month = "May";
    	$monthly = DB::table('expenses')->where('month',$month)->get();
        return view('expense.monthly_expense',compact('monthly'));
    }

    //single monthly expense return here
    public function june_expense(){
    	$month = "June";
    	$monthly = DB::table('expenses')->where('month',$month)->get();
        return view('expense.monthly_expense',compact('monthly'));
    }

    //single monthly expense return here
    public function july_expense(){
    	$month = "July";
    	$monthly = DB::table('expenses')->where('month',$month)->get();
        return view('expense.monthly_expense',compact('monthly'));
    }

    //single monthly expense return here
    public function augest_expense(){
    	$month = "August";
    	$monthly = DB::table('expenses')->where('month',$month)->get();
        return view('expense.monthly_expense',compact('monthly'));
    }

    //single monthly expense return here
    public function september_expense(){
    	$month = "September";
    	$monthly = DB::table('expenses')->where('month',$month)->get();
        return view('expense.monthly_expense',compact('monthly'));
    }

    //single monthly expense return here
    public function octber_expense(){
    	$month = "October";
    	$monthly = DB::table('expenses')->where('month',$month)->get();
        return view('expense.monthly_expense',compact('monthly'));
    }

    //single monthly expense return here
    public function november_expense(){
    	$month = "November";
    	$monthly = DB::table('expenses')->where('month',$month)->get();
        return view('expense.monthly_expense',compact('monthly'));
    }

    //single monthly expense return here
    public function december_expense(){
    	$month = "December";
    	$monthly = DB::table('expenses')->where('month',$month)->get();
        return view('expense.monthly_expense',compact('monthly'));
    }



    // yearly expense return here
    public function yearly_expense(){
    	$year = date("Y");
    	$yearly = DB::table('expenses')->where('year',$year)->get();
        return view('expense.yearly_expense',compact('yearly'));
    }

     //  single expense today edit here
    public function edit_today_expense($id){
    	$edit = DB::table('expenses')	
    			->where('id',$id)
    			->first();
    	return view('expense.edit_today_expense')->with("edit",$edit);

    	//echo "<pre>";
    	//print_r($post);
    	//exit(); 
    }

    public function update_today_expense(Request $request, $id){

        $data=array();
	    $data['details'] = $request->details;
	    $data['amount'] = $request->amount;

        $user = DB::table('expenses')->where('id',$id)->update($data);
        	 if($user){
        			$notification=array(
                        'messege'=>'Expense Updated Successfully',
                        'alert-type'=>'success'
                        );
                    return Redirect()->route('today.expense')->with($notification);
        		}else{
        			$notification=array(
	                        'messege'=>'Not update Expense',
	                        'alert-type'=>'error'
	                        );
	                        return Redirect()->route('today.expense')->with($notification);
        }		
    }

     //  single today expnse delete here
    public function delete_today_expense($id){

        $delete = DB::table('expenses')->where('id',$id)->delete();    
            if($delete){
                    $notification=array(
                        'messege'=>'expense delete Successfully',
                        'alert-type'=>'success'
                        );
                        return Redirect()->route('today.expense')->with($notification);
                }else{
                    return Redirect()->back();
                }


    }     
}
