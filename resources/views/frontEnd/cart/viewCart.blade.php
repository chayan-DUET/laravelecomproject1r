@extends('frontEnd.master')
@section('mainContent')
<div class="checkout">
	<div class="container">
		<h3>My Shopping Bag</h3>
		<div class="table-responsive checkout-right animated wow slideInUp" data-wow-delay=".5s">
		<div>
		 <?php
		$contents= Cart::content();
		 //echo "<pre>";
		 //print_r($contents);
         //echo "</pre>";
		?> 
		</div>
			<table class="timetable_sub">
				<thead>
					<tr>
						<th>Remove</th>
						<th>Image</th>
						<th>Quantity</th>
						<th>Product Name</th>
						<th>Price</th>
						<th>Total Price</th>
						<th>Count</th>
					</tr>
				</thead>
				@foreach($contents as $content)
					<tr class="rem1">
						<td class="cart_delete">
							<div class="rem">
								<div class=" ">
								<a class="cart_quentity_delete" href="{{URL::to('/delete-to-cart/'.$content->rowId)}}">
								<i class="glyphicon glyphicon-remove-circle" style="color:red" aria-hidden="true"></i></a>
								</div>
							</div>
							 <!--  <script>$(document).ready(function(c) {
								$('.close1').on('click', function(c){
									$('.rem1').fadeOut('slow', function(c){
										$('.rem1').remove();
									});
									});	 
								});
						   </script>--> 
						</td>
						<td class="invert-image"><a href="single.html"><img src="{{URL::to($content->options->image)}}"
						style="width:80px; height:80px" alt=" " class="img-responsive" /></a>
						</td>
						<td class="invert">
							 <div class="quantity"> 
								<div class="quantity-select"> 
								<form action="{{url('/update-cart')}}" method="post">
								{{csrf_field()}}
                                   <input class="cart_quentity_input" type="text" name="qty" value="{{($content->qty)}}">								
                                    <input type="hidden" name="rowId" value="{{($content->rowId)}}">
                                      <input class="btn btn-sm btn-default" type="submit" name="submit" value="update">	
                                         </form>									  
									<!--<div class="entry value-minus">&nbsp;</div>-->
									 <!--<div class="entry value">
									<span>{{($content->qty)}}</span>
									</div>-->
									 <!--<div class="entry value-plus active">&nbsp;</div>-->
								</div>
							</div>
						</td>
						<td class="invert">{{($content->name)}}</td>
						<td class="invert">{{($content->price)}}</td>
						<td class="invert">{{($content->total)}}</td>
						<td class="invert">{{(Cart::content()->count())}}</td>
						
					</tr>
					@endforeach
					
								<!--quantity-->
									<script>
									$('.value-plus').on('click', function(){
										var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
										divUpd.text(newVal);
									});

									$('.value-minus').on('click', function(){
										var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
										if(newVal>=1) divUpd.text(newVal);
									});
									</script>
								<!--quantity-->
			</table>
		</div>
		<div class="checkout-left">	
				
				<div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
					<a href="mens.html"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Back To Shopping</a>
				</div>
				<div class="checkout-left-basket animated wow slideInLeft" data-wow-delay=".5s">
					<h4>Shopping basket</h4>
					@foreach($contents as $content)
					<ul>
						<li>{{($content->name)}} <i>-</i> <span>{{($content->price)}}</span></li>
						
					
					</ul>
						@endforeach
						<hr/>
						<ul>
						<li>Total <i>-</i> <span>{{(Cart::total())}}</span> </li>
						</ul>
				</div>
				<div class="clearfix"> </div>
				<div class="mid-text">
				 
				<?php
          		 $shipping_id=Session::get('shipping_id');
				 $customer_id=Session::get('id');?>
			   
			   <?php if($customer_id!=NULL && $shipping_id==NULL){?>
			   <a class="hvr-outline-out button2" href="{{URL::to('/checkout')}}">Check Out </a>
			   <?php }else if($customer_id!=NULL && $shipping_id!=NULL){?>
			   <a class="hvr-outline-out button2" href="{{URL::to('/pament')}}">Check Out </a>
			   <?php } else {?>
				 <a class="hvr-outline-out button2" href="{{URL::to('/loging-check')}}">Check Out </a>
			   <?php }?>
				</div>
			</div>
	</div>
</div>	
@endsection