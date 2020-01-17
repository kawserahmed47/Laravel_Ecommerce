<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use Session;
use Illuminate\Support\Facades\Redirect;


class ProductController extends Controller
{
    public function addproduct(){
        return view('admin.add_product');
    } 
    
    public function allproduct(){
        
        $all_product_info=DB::table('tbl_products')
                ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                  ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
                ->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
                ->get();
       $manage_product= view('admin.all_product')->with('all_product_info',$all_product_info);
       return view('admin_dashboard')->with('admin.all_product',$manage_product);
       
       //return view('admin.all_category');
    } 
    
    public function saveproduct(Request $request){
        $data=array();
        $data['category_id']=$request->category_id;
        $data['manufacture_id']=$request->manufacture_id;
        $data['product_name']=$request->product_name;
        $data['product_short_desc']=$request->product_short_desc;
         $data['product_long_desc']=$request->product_long_desc;
          $data['product_price']=$request->product_price;
           $data['product_image']=$request->product_image;
            $data['product_size']=$request->product_size;
             $data['product_color']=$request->product_color;
        $data['publication_status']=$request->publication_status;
        $image=$request->file('product_image');
        if($image){
            $image_name= str_random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.".".$ext;
            $upload_path='image/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if($success){
                $data['product_image']=$image_url;
                DB::table('tbl_products')->insert($data);
                Session::put('message', 'Product Added Successfully!');
                return Redirect::to('/addproduct');
            }
        }
        $data['product_image']='';
        DB::table('tbl_products')->insert($data);
        Session::put('message', 'Product Added Successfully without image!!');
        return Redirect::to('/addproduct');
    }
    
    
    public function inactivePublicatnion($product_id){
        
       DB::table('tbl_products')->where('product_id',$product_id)->update(['publication_status'=>0]);
        Session::put('message', 'Staus Updated Successfully!!');
        return Redirect::to('/allproduct');
        
    }
    
     public function activePublication($product_id){
        
       DB::table('tbl_products')->where('product_id',$product_id)->update(['publication_status'=>1]);
        Session::put('message', 'Staus Updated Successfully!!');
        return Redirect::to('/allproduct');
        
    }
    
    
    public function edit_product($product_id){
        
         $product_info=DB::table('tbl_products')
                  ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                  ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
                ->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
                 ->where('product_id',$product_id)
                 ->first();
       $manage_product= view('admin.edit_product')->with('product_info',$product_info);
       return view('admin_dashboard')->with('admin.edit_product',$manage_product);
        
        
        //return view('admin.edit_category');
        
    }
    
    public function updateproduct(Request $request,$product_id){
        $data=array();
        $data['category_id']=$request->category_id;
        $data['manufacture_id']=$request->manufacture_id;
        $data['product_name']=$request->product_name;
        $data['product_short_desc']=$request->product_short_desc;
         $data['product_long_desc']=$request->product_long_desc;
          $data['product_price']=$request->product_price;
           $data['product_image']=$request->product_image;
            $data['product_size']=$request->product_size;
             $data['product_color']=$request->product_color;
        $data['publication_status']=$request->publication_status;
        $image=$request->file('product_image');
        if($image){
            $image_name= str_random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.".".$ext;
            $upload_path='image/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if($success){
                $data['product_image']=$image_url;
              DB::table('tbl_products')->where('product_id',$product_id)->update($data);
                Session::put('message', 'Product Added Successfully!');
                return Redirect::to('/addproduct');
            }
        }
        $data['product_image']='';
        DB::table('tbl_products')->where('product_id',$product_id)->update($data);
           Session::put('message', 'Product Updated Successfully!!');
       return Redirect::to('/allproduct');
        
        
        
    }
 public function deleteproduct($product_id){
     
  DB::table('tbl_products')->where('product_id',$product_id)->delete();
           Session::put('message', 'Produce Deleted Successfully!!');
       return Redirect::to('/allproduct');
     
     
 }
    
    
}
