<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use Session;
use Illuminate\Support\Facades\Redirect;


class CategoryController extends Controller
{
    public function addcategory(){
        return view('admin.add_category');
    } 
    
    public function allcategory(){
        
        $all_category_info=DB::table('tbl_category')->get();
       $manage_category= view('admin.all_category')->with('all_category_info',$all_category_info);
       return view('admin_dashboard')->with('admin.all_category',$manage_category);
       
       //return view('admin.all_category');
    } 
    
    public function savecategory(Request $request){
        $data=array();
        $data['category_id']=$request->category_id;
        $data['category_name']=$request->category_name;
        $data['category_description']=$request->category_description;
        $data['publication_status']=$request->publication_status;
        
        DB::table('tbl_category')->insert($data);
        Session::put('message', 'Category Added Successfully!!');
        return Redirect::to('/addcategory');
    }
    
    
    public function inactivePublicatnion($category_id){
        
       DB::table('tbl_category')->where('category_id',$category_id)->update(['publication_status'=>0]);
        Session::put('message', 'Staus Updated Successfully!!');
        return Redirect::to('/allcategory');
        
    }
    
     public function activePublication($category_id){
        
       DB::table('tbl_category')->where('category_id',$category_id)->update(['publication_status'=>1]);
        Session::put('message', 'Staus Updated Successfully!!');
        return Redirect::to('/allcategory');
        
    }
    
    
    public function edit_category($category_id){
        
         $category_info=DB::table('tbl_category')
                 ->where('category_id',$category_id)
                 ->first();
       $manage_category= view('admin.edit_category')->with('category_info',$category_info);
       return view('admin_dashboard')->with('admin.edit_category',$manage_category);
        
        
        //return view('admin.edit_category');
        
    }
    
    public function updatecategory(Request $request,$category_id){
        $data=array();
       
        $data['category_name']=$request->category_name;
        $data['category_description']=$request->category_description;
          DB::table('tbl_category')->where('category_id',$category_id)->update($data);
           Session::put('message', 'Category Updated Successfully!!');
       return Redirect::to('/allcategory');
        
        
        
    }
 public function deletecategory($category_id){
     
  DB::table('tbl_category')->where('category_id',$category_id)->delete();
           Session::put('message', 'Category Deleted Successfully!!');
       return Redirect::to('/allcategory');
     
     
 }
    
    
}
