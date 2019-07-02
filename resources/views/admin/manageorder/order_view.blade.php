@extends('admin.master')
@section('content')


<hr/>
<h3 class="text-center text-success">{{Session::get('message')}}</h3>
<hr/>
<div class="row-fluid sortable">
<div class="col-md-6 col-sm-6 xs-6">
<div class="box-header">
<h2 style="color:#A7DCDD">Customers Details</h2>
</div>
<table class="table table-hover table-bordered">
    <thead>
        <tr class="success">
            <th>User Name</th>
             <th>Mobile</th>
           
        </tr>
    </thead>
    <tbody>
       
    </tbody>
    
</table>

</div>
<div class="col-md-6 col-sm-6 xs-6">
<div class="box-header">
<h2 style="color:#A7DCDD">Shipping Details</h2>
</div>
<table class="table table-hover table-bordered">
    <thead>
         <tr class="success">
            <th>User Name</th>
             <th>Address</th>
			 <th>Mobile</th>
               
        </tr>
    </thead>
    <tbody>
       
    </tbody>
    
</table>

</div>
</div>


<div class="row-fluid sortable">
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
<div class="box-header">
<h2 style="color:#A7DCDD">Order Details</h2>
</div>
 
  <table class="table">
    <thead >
      <tr class="success">
	  <th>ID</th>
        <th>Product Name</th>
        <th>Product Price</th>
        <th>Product Seles Quentity</th>
		<th>Product Sub Total</th>
        
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Default</td>
        <td>Defaultson</td>
        <td>def@somemail.com</td>
		 <td>Defaultson</td>
        <td>def@somemail.com</td>
      </tr>      
      <tr class="success">
        <td>Success</td>
        <td>Doe</td>
        <td>john@example.com</td>
		<td>Doe</td>
        <td>john@example.com</td>
      </tr>
      <tr class="danger">
        <td>Danger</td>
        <td>Moe</td>
        <td>mary@example.com</td>
		 <td>Moe</td>
        <td>mary@example.com</td>
      </tr>
      <tr class="info">
        <td>Info</td>
        <td>Dooley</td>
        <td>july@example.com</td>
		 <td>Dooley</td>
        <td>july@example.com</td>
      </tr>
     
    </tbody>
  </table>
  </div>
</div>

@endsection