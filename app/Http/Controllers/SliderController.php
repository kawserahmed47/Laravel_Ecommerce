<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use Session;
use Illuminate\Support\Facades\Redirect;


class SliderController extends Controller
{
    public function addslider(){
        return view('admin.add_slider');
    } 
    
    public function allslider(){
        
        $all_slider_info=DB::table('tbl_slider')->orderBy('tbl_slider.slider_id','desc')->get();
       $manage_slider= view('admin.all_slider')->with('all_slider_info',$all_slider_info);
       return view('admin_dashboard')->with('admin.all_slider',$manage_slider);
       
       //return view('admin.all_category');
    } 
    
    public function saveslider(Request $request){
        $data=array();
        $data['slider_id']=$request->slider_id;
        $data['publication_status']=$request->publication_status;
        
         $image=$request->file('slider_image');
        
        if($image){
            $image_name= str_random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.".".$ext;
            $upload_path='image/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if($success){
                $data['slider_image']=$image_url;
                DB::table('tbl_slider')->insert($data);
                Session::put('message', 'Slider Added Successfully!');
                return Redirect::to('/addslider');
            }
        }
        $data['slider_image']='';
       
        Session::put('message', 'Submit not allow without image!!');
        return Redirect::to('/addslider');
    }
    
    
    public function inactivePublicatnion($slider_id){
        
       DB::table('tbl_slider')->where('slider_id',$slider_id)->update(['publication_status'=>0]);
        Session::put('message', 'Staus Updated Successfully!!');
        return Redirect::to('/allslider');
        
    }
    
     public function activePublication($slider_id){
        
       DB::table('tbl_slider')->where('slider_id',$slider_id)->update(['publication_status'=>1]);
        Session::put('message', 'Staus Updated Successfully!!');
        return Redirect::to('/allslider');
        
    }
    
    
   
    
   
 public function deleteslider($slider_id){
     
  DB::table('tbl_slider')->where('slider_id',$slider_id)->delete();
           Session::put('message', 'Manufacture Deleted Successfully!!');
       return Redirect::to('/allslider');
     
     
 }
 
 
 
 
 
 
 
 
 
 
 
 
    
    
}
