<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use Cart;
use Session;
use Illuminate\Support\Facades\Redirect;


class CheckoutController extends Controller
{
   public function login_check(){
      return view('pages.login');
   }
   public function customer_registration(Request $request){
     $data=array();
      $data['customer_name']=$request->customer_name;
      $data['customer_email']=$request->customer_email;
      $data['customer_mobile']=$request->customer_mobile;
      $data['customner_password']=$request->customner_password;
      
     $ss=  DB::table('tbl_customer')->insertGetId($data);
      
       Session::put('customer_id',$ss);
       Session::put('customer_name',$request->customer_name);
        Session::put('message', 'Customer Registration Successfully!!');
        return Redirect::to('/check-out');
      
      
   }
   public function check_out(){
      return view('pages.checkout');
   }
   public function save_shipping(Request $request){
      $data=array();
      $data['shipping_name']=$request->shipping_name;
       $data['shipping_email']=$request->shipping_email;
        $data['shipping_phone']=$request->shipping_phone;
         $data['shipping_address']=$request->shipping_address;
          $data['shipping_city']=$request->shipping_city;
         $shipping_id= DB::table('tbl_shipping')->insertGetId($data);
           Session::put('shipping_id',$shipping_id);
            Session::put('message', 'Shipping Information Added Successfully!!');
        return Redirect::to('/payment');
          
      
      
   }
   public function customer_payment(){
       $all_published_category = DB::table('tbl_category')->where('publication_status',1)->get();
           Session::put('message', 'Produce Deleted Successfully!!');
        $manage_publish_category = view('pages.payment')->with('all_published_category',$all_published_category);
       return view('welcome')->with('pages.payment',$manage_publish_category);
   }
   
   public function bill_pay(Request $request){
      $payment_method=$request->payment_method;
      $pdata=array();
      $pdata['payment_method']=$payment_method;
      $pdata['payment_status']='pending';
      $payment_id=DB::table('tbl_payment')->insertGetId($pdata);
      
      
      $odata=array();
      $odata['customer_id']=Session::get('customer_id');
      $odata['shipping_id']=Session::get('shipping_id');
      $odata['payment_id']=$payment_id;
      $odata['order_total']=Cart::total();
      $odata['order_status']='pending';
      $order_id=DB::table('tbl_order')->insertGetId($odata);
      
      $contents=Cart::content();
      $oddata=array();
      foreach($contents as $v_content){
         $oddata['order_id']=$order_id;
          $oddata['product_id']=$v_content->id;
           $oddata['product_name']=$v_content->name;
           $oddata['product_price']=$v_content->price;
            $oddata['product_sales_quantity']=$v_content->qty;
         
         
      }
      DB::table('tbl_order_details')->insert($oddata);
      
      if(  $payment_method=='cash'){
          Cart::destroy();
         return view('pages.handcash');
        
      }elseif($payment_method=='card'){
           echo 'Sussessfull done by Card';
      }elseif ($payment_method=='bKash') {
           echo 'Sussessfull done by Card';
      }else{
         echo 'not selected payment method';
      }
      
      
   }
   
public function manage_order(){
    $all_order_info=DB::table('tbl_order')
                ->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')
                 
                ->select('tbl_order.*','tbl_customer.customer_name')
                ->get();
    
       $manage_order= view('admin.manage_order')->with('all_order_info',$all_order_info);
       return view('admin_dashboard')->with('admin.manage_order',$manage_order);
       
}

public function view_order($order_id){
    $order_by_id=DB::table('tbl_order')
                ->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')
                 ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
             ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
                ->select('tbl_order.*','tbl_order_details.*','tbl_customer.*','tbl_shipping.*')
               
                ->get();
    
       $view_order= view('pages.view_order')->with('order_by_id',$order_by_id);
       return view('admin_dashboard')->with('pages.view_order',$view_order);

  // return view('pages.view_order')->with('order_id',$order_id);
}




public function customer_login(Request $request){
      $customer_email=$request->customer_email;
      $customner_password=$request->customner_password;
      $result = DB::table('tbl_customer')
              ->where('customer_email',$customer_email)
              ->where('customner_password',$customner_password)->first();
      
      if($result){
         Session::put('customer_id',$result->customer_id);
         Session::put('message', 'Login  Successfully!!');
        return Redirect::to('/check-out');
          
      }
      else{
         Session::put('message', 'Login  Successfully!!');
        return Redirect::to('/login-check');
         
      }
      
      
      
   }
   
   public function customer_logout(){
      Session::flush();
       return Redirect::to('/');
   }
}