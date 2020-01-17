<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use Session;
use Illuminate\Support\Facades\Redirect;


class AdminController extends Controller
{
    public function admin_login(){
        return view('admin_login');
    }

     public function admin_dashboard(){
        return view('admin.dashboard');
    }
    
    public function dashboard(Request $request){
        $admin_email=$request->email;
        $admin_password= md5($request->password);
        
        $result=DB::table('tbl_admin')->where('email', $admin_email)
                ->where('password',$admin_password)->first();
       if($result){
           Session::put('name',$result->name);
           Session::put('id',$result->id);
           return Redirect::to('/dashboard');
           
           
       }else{
           echo "email or password doesn't math";
       }
      
    }
}

