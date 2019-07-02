<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use DB;
use Cart;

class CartController extends Controller
{
    
    public function addtocart(Request $request){
        $qty=$request->qty;
        $productId=$request->productId;
        $product_info=DB::table('products')
                ->where('id',$productId)
                ->first();
       /*  echo "<pre>";
        print_r($product_info);
        echo "</pre>"; */
        $data['qty']=$qty;
		$data['id']=$product_info->id;
		$data['name']=$product_info->productName;
		$data['price']=$product_info->productPrice;
		$data['options']['image']=$product_info->productImage;
		
	$carts=	Cart::add($data);
		return Redirect('/show-cart');
		
    }
	public function showcart(){
		
		$all_publish_category=DB::table('categories')
		                      ->where('publicationstatus',1)
							  ->get();
							  
		 return view('frontEnd.cart.viewCart',['all_publish_category'=>$all_publish_category]);					  
	}   
	public function delete_to_cart($rowId){
		//echo $rowId;
		cart::update($rowId,0);
		return Redirect('/show-cart');
		
	}
	public function update_to_cart(Request $request){
		$qty=$request->qty;
		$rowId=$request->rowId;
		//echo $qty;
		//echo"<br>";
		//echo $rowId;
		cart::update($rowId,$qty);
		return Redirect('/show-cart');
		
	}
}
