<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use DB;
class CategoryController extends Controller
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

    // add categories return here
    public function add_category(){
        return view('category.add_category');
    }


    // Save categories return here
        public function insert_category(Request $request){
    	$data=array();
        $data['cat_name'] = $request->cat_name;
      
        $category = DB::table('categories')->insert($data);
                if($category){
                    $notification=array(
                        'messege'=>'Category Added Successfully',
                        'alert-type'=>'success'
                        );
                        return Redirect()->route('add.category')->with($notification);
        }else{
            $notification=array(
                        'messege'=>'Category Not Added',
                        'alert-type'=>'error'
                        );
                        return Redirect()->route('add.category')->with($notification);
        	}

    }

    // all categories return here
    public function all_category(){
        $all_category = DB::table('categories')->get();
        return view('category.all_category',compact('all_category'));
     } 


     //  single Category delete here
    public function delete_catedory($id){

        $delete = DB::table('categories')->where('id',$id)->delete();    
            if($delete){
                    $notification=array(
                        'messege'=>'category delete Successfully',
                        'alert-type'=>'success'
                        );
                        return Redirect()->route('all.category')->with($notification);
                }else{
                    return Redirect()->back();
                }


    }

     //  single employ advance salaries edit here
    public function edit_catedory($id){
    	$edit = DB::table('categories')	
    			->where('id',$id)
    			->first();
    	return view('category.edit_category')->with("edit",$edit);

    	//echo "<pre>";
    	//print_r($post);
    	//exit(); 
    }

    public function update_category(Request $request, $id){

        $data=array();
	    $data['cat_name'] = $request->cat_name;

        $user = DB::table('categories')->where('id',$id)->update($data);
        	 if($user){
        			$notification=array(
                        'messege'=>'Category Updated Successfully',
                        'alert-type'=>'success'
                        );
                    return Redirect()->route('all.category')->with($notification);
        		}else{
        			$notification=array(
	                        'messege'=>'Not update Category',
	                        'alert-type'=>'error'
	                        );
	                        return Redirect()->route('all.category')->with($notification);
        }		
    } 
}
