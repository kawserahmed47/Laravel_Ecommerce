<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Http\Request;
use DB;

use Session;
use Illuminate\Support\Facades\Redirect;

class Home extends BaseController
{
    public function index(){
        
         $all_publish_product=DB::table('tbl_products')
                ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                  ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
                ->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
                 ->where('tbl_products.publication_status',1)
                 ->limit(9)
                ->get();
       $manage_publish_product = view('pages.home_content')->with('all_publish_product',$all_publish_product);
       return view('welcome')->with('pages.home_content',$manage_publish_product);
        //return view('pages.home_content');
    }
    
    public function showCategoryProduct($category_id){
        
        $all_publish_product2=DB::table('tbl_products')
                ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                  ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
                ->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
                 ->where('tbl_products.category_id',$category_id)
                ->where('tbl_products.publication_status',1)
               
                
                ->get();
       $manage_publish_product2 = view('pages.category_content')->with('all_publish_product2',$all_publish_product2);
       return view('welcome')->with('pages.category_content',$manage_publish_product2);
        
        
        
        
       // return view(pages.category_content);
        
    }
    
    public function showManufactureProduct($manufacture_id){
         $all_publish_product3=DB::table('tbl_products')
                ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                  ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
                ->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
                 ->where('tbl_products.manufacture_id',$manufacture_id)
                ->where('tbl_products.publication_status',1)
               
                
                ->get();
       $manage_publish_product3 = view('pages.manufacture_content')->with('all_publish_product3',$all_publish_product3);
       return view('welcome')->with('pages.manufacture_content',$manage_publish_product3);
        
        
        
        
    }
    public function showProductDetails($product_id){
       $showDBproduct= DB::table('tbl_products')
               ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                 ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
                ->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
               ->where('product_id',$product_id)->first();
       return view('pages.product_details')->with('showDBproduct',$showDBproduct);
       
       
      
        
    }
    
    
}