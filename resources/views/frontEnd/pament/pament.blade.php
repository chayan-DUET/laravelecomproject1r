@extends('frontEnd.master')
@section('mainContent')

<div class="container">
          </br>
		<h3 class="text-center">My Shopping Bag</h3> 
		  </br>
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
			<br>
			<a href="{{URL::to('/pay-with-payple')}}">pay-with-payple</a>
			@include('frontEnd.pament.payple')
		</div>
		</div>
		
		

<div class="container">
	<div class="row">
		<div class="paymentCont">
						<div class="headingWrap">
						        </br>
								<h3 class="headingTop text-center">Select Your Payment Method</h3>
                                 </br>								
								
						</div>
						 <form action="{{url('/order-place')}}" method="post">
								   {{csrf_field()}}
						<div class="paymentWrap">
							<div class="btn-group paymentBtnGroup btn-group-justified" data-toggle="buttons">
					            <label class="btn paymentMethod active">
					            	<div class="method visa"></div>
					                <input type="radio" name="pament_method" value="bkash" checked> 
					            </label>
					            <label class="btn paymentMethod">
					            	<div class="method master-card"></div>
					                <input type="radio" name="pament_method" value="ekash"> 
					            </label>
					            <label class="btn paymentMethod">
				            		<div class="method amex"></div>
					                <input type="radio" name="pament_method" value="hkash">
					            </label>
					             <label class="btn paymentMethod">
				             		<div class="method vishwa"></div>
					                <input type="radio" name="pament_method" value="vISA"> 
					            </label>
					            <label class="btn paymentMethod">
				            		<div class="method ez-cash"></div>
					                <input type="radio" name="pament_method" value="paple"> 
					            </label>
					         
					        </div>  
                              							
						</div>
						
						<div class="footerNavWrap clearfix">
							<div class="btn btn-success pull-left btn-fyi"><span class="glyphicon glyphicon-chevron-left">
							<a href="/ecomers/laravelecomproject1r/" >
                             CONTINUE SHOPPING
                             </a>
							</span> </div>
							<input type="submit" class="btn btn-success pull-right btn-fyis" style="" value=OK>
						</div>
						</form>
					</div>
		
	</div>
</div>
</br>
	@endsection