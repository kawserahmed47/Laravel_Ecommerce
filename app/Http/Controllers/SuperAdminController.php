<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


use Session;
use Illuminate\Support\Facades\Redirect;


class SuperAdminController extends Controller
{
    
    
    public function index(){
        $this->AdminCheck();
        return view('admin.dashboard');
    }

        public function logout(){
        //Session::put('name', null);
        //Session::put('id',null);
        Session::flush();
        return Redirect::to('/admin');
      
    }
    
    public function AdminCheck(){
        $id=Session::get('id');
        if($id){
            return;
        }else{
            return Redirect::to('/admin')->send();
        }
    }

}

