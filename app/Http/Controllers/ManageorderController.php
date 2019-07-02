<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class ManageorderController extends Controller
{
	public function manage_order(){
		 $all_order_info = DB::table('tb_order')
                ->join('Customers', 'tb_order.customer_id' ,'=', 'Customers.id')
             
                ->select('tb_order.*', 'Customers.customer_name')
                ->get();
		
		return view('admin.manageorder.manage_order',['all_order_info' => $all_order_info]);
	}
	public function order_view($order_id){
		
		return view('admin.manageorder.order_view');
	}
    
}
