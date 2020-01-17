<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use Session;
use Illuminate\Support\Facades\Redirect;


class ManufactureController extends Controller
{
    public function addmanufacture(){
        return view('admin.add_manufacture');
    } 
    
    public function allmanufacture(){
        
        $all_manufacture_info=DB::table('tbl_manufacture')->get();
       $manage_manufacture= view('admin.all_manufacture')->with('all_manufacture_info',$all_manufacture_info);
       return view('admin_dashboard')->with('admin.all_manufacture',$manage_manufacture);
       
       //return view('admin.all_category');
    } 
    
    public function savemanufacture(Request $request){
        $data=array();
        $data['manufacture_id']=$request->manufacture_id;
        $data['manufacture_name']=$request->manufacture_name;
        $data['manufacture_description']=$request->manufacture_description;
        $data['publication_status']=$request->publication_status;
        
        DB::table('tbl_manufacture')->insert($data);
        Session::put('message', 'Category Added Successfully!!');
        return Redirect::to('/addmanufacture');
    }
    
    
    public function inactivePublicatnion($manufacture_id){
        
       DB::table('tbl_manufacture')->where('manufacture_id',$manufacture_id)->update(['publication_status'=>0]);
        Session::put('message', 'Staus Updated Successfully!!');
        return Redirect::to('/allmanufacture');
        
    }
    
     public function activePublication($manufacture_id){
        
       DB::table('tbl_manufacture')->where('manufacture_id',$manufacture_id)->update(['publication_status'=>1]);
        Session::put('message', 'Staus Updated Successfully!!');
        return Redirect::to('/allmanufacture');
        
    }
    
    
    public function edit_manufacture($manufacture_id){
        
         $manufacture_info=DB::table('tbl_manufacture')
                 ->where('manufacture_id',$manufacture_id)
                 ->first();
       $manage_manufacture= view('admin.edit_manufacture')->with('manufacture_info',$manufacture_info);
       return view('admin_dashboard')->with('admin.edit_manufacture',$manage_manufacture);
        
        
        //return view('admin.edit_category');
        
    }
    
    public function updatemanufacture(Request $request,$manufacture_id){
        $data=array();
       
        $data['manufacture_name']=$request->manufacture_name;
        $data['manufacture_description']=$request->manufacture_description;
          DB::table('tbl_manufacture')->where('manufacture_id',$manufacture_id)->update($data);
           Session::put('message', 'manufacture Updated Successfully!!');
       return Redirect::to('/allmanufacture');
        
        
        
    }
 public function deletemanufacture($manufacture_id){
     
  DB::table('tbl_manufacture')->where('manufacture_id',$manufacture_id)->delete();
           Session::put('message', 'Manufacture Deleted Successfully!!');
       return Redirect::to('/allmanufacture');
     
     
 }
    
    
}
