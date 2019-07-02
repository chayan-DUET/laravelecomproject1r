<?php

namespace App\Http\Controllers;
use DB;
use App\Customer;
use Cart;
use Illuminate\Http\Request;
use Session;

class CheckoutController extends Controller
{
   public function loging_check(){
	   
	   return view('frontEnd.checkout.loging');
   }
   public function customer_registration(Request $request) {
	   
	   $data=array();
	   $data['customer_name']=$request->customer_name;
	   $data['customer_email']=$request->customer_email;
	   $data['mobil_number']=$request->mobil_number;
	   $data['password']=$request->password;
	   
	   $customer_id=DB::table('Customers')
	                     ->insertGetId($data);
						  Session::put('id',$customer_id);
						  Session::put('customer_name',$request->customer_name);
						  return Redirect('/checkout');
   }
   public function customer_checkout(){
	   return view('frontEnd.checkout.checkout');
   }
   public function save_shipping_details(Request $request){
	   
	   $data=array();
	   $data['shipping_first_name']=$request->shipping_first_name;
	   $data['shipping_last_name']=$request->shipping_last_name;
	   $data['shipping_email']=$request->shipping_email;
	   $data['shipping_address']=$request->shipping_address;
	   $data['shipping_mobil_number']=$request->shipping_mobil_number;
	   $data['shipping_city']=$request->shipping_city;
	   
	   //echo "<pre>";
	   //print_r($data);
	   //echo "</pre>";
	   $shipping_id=DB::table('shipping')
	                     ->insertGetId($data);
						  Session::put('shipping_id',$shipping_id);
						 
						  return Redirect('/pament');
	   
   }
   public function pament(){
	   return view('frontEnd.pament.pament');
   }
   public function customer_login(Request $request){
	                    $customer_email=$request->customer_email;
						 $password=$request->password;
						 $result_login=DB::table('Customers')
						              ->where('customer_email',$customer_email)
									  ->where('password',$password)
									  ->first();
									  
									  // echo "<pre>";
									   //print_r($result_login);
									   //echo "</pre>";
						if($result_login){
							Session::put('id',$result_login->id);
							return Redirect('/checkout');
						}
						else{
							return Redirect('/loging-check');
						}
									   
   }
   
    public function customer_logout(){
	   
	                                Session::flush();
									return Redirect('/');
   }
   ////payment-order-orderDetails///////
   
   public function order_place(Request $request){
	     $pament_getway=$request->pament_method;
		// $shipping_id=Session::get('shipping_id');
		// $customer_id=Session::get('id');
	    // echo $pament_getway;
	    // echo "<br>";
	    //echo $customer_id;
	    //echo"<pre>";
	    // print_r ($shipping_id);
	    // echo"</pre>";
	   
	    //return view('frontEnd.pament.order');
		
		$pdata=array();
		$pdata['payment_method']=$pament_getway;
		$pdata['payment_status']='painding';
		$payment_id=DB::table('payment')
		            ->insertGetId($pdata);
		 
		 $odata=array();
		 $odata['customer_id']=Session::get('id');
		 $odata['shipping_id']=Session::get('shipping_id');
		 $odata['payment_id']=$payment_id;
		 $odata['order_total']=Cart::total();
		 $odata['order_status']='pending';
		 
		 $order_id=DB::table('tb_order')
		           ->insertGetId($odata);
		  
		  $contents= Cart::content();
		  
		  $oddata=array();
		  
		  foreach($contents as $v_content){
			  $oddata['order_id']=$order_id;
			  $oddata['product_id']=$v_content->id;
			  $oddata['product_name']=$v_content->name;
			  $oddata['product_price']=$v_content->price;
			  $oddata['product_sales_quantity']=$v_content->qty;
			  
			  DB::table('order_details')
			     ->insert($oddata);
			  
		  }
		  if($pament_getway=="bkash"){
			  Cart::destroy();
			  return view('frontEnd.pament.bkash');
		  }
		  elseif($pament_getway=="ekash"){
			  echo " success ecash";
		  }
		    elseif($pament_getway=="hkash"){
				Cart::destroy();
			   return view('frontEnd.pament.hkash');
		  }
		  
		  		  elseif($pament_getway=="vISA"){
			  echo " success vISA";
		  }
		  		  elseif($pament_getway=="paple"){
			  echo " success paple";
		  }
		  else{
			  echo "not success";
		  }
		 
		 
		  
   }
}
