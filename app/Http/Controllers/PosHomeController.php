<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class PosHomeController extends Controller
{
     public function pos_home(){
      $product = DB::table('products')
      ->join('categories','products.cat_id','categories.id')
      ->select('products.*','categories.cat_name')
      ->get();
      $customer = DB::table('customers')->get();
      $category = DB::table('categories')->get();
        return view('poss.pos_home',compact('product','customer','category'));
        //echo "<pre>";
      //print_r($post);
      //exit(); 
    }
}
