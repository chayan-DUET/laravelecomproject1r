@extends('frontEnd.master')
@section('mainContent')
<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Thank you for order </h2>
						<p>We will contact ass soon as possible</p>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action="{{url('/customer-registration')}}" method="post">
						{{csrf_field()}}
							<input type="text" name="customer_name" placeholder="Name" required=""/>
							<input type="email" name="customer_email" placeholder="Email Address" required=""/>
							<input type="text" name="mobil_number" placeholder="Mobil Number" required=""/>
							<input type="password" name="password" placeholder="Password" required=""/>
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	@endsection