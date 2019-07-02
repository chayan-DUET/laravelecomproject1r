<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use Srmklive\PayPal\Services\ExpressCheckout;

class PaymentController extends Controller
{
    public function paywithpayple(){
		
		$provider = new ExpressCheckout; 
		
		$data = [];
		$data['items'] = [];
         foreach(Cart::content() as $key=>$cart ){
			 $itemDetail=[
			    'name' => $cart->name,
				'price' => $cart->price,
				'qty' =>$cart->qty
			 ];
			 $data['items'][] = $itemDetail;
		 }

		$data['invoice_id'] = uniqid();
		$data['invoice_description'] = "test Invoice";
		$data['return_url'] = URL::to('/payment');
		$data['cancel_url'] = URL::to('/payment');

		$total = Cart::total();
		

		$data['total'] = $total;

		$response = $provider->setExpressCheckout($data);

// Use the following line when creating recurring payment profiles (subscriptions)
$response = $provider->setExpressCheckout($data, true);

 // This will redirect user to PayPal
return redirect($response['paypal_link']);
			}
		}
