@extends('admin.master')
@section('content')


<hr/>
<h3 class="text-center text-success">{{Session::get('message')}}</h3>
<hr/>
<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th>Order ID</th>
             <th>Customer Name</th>
               <th>Order Total</th>
               <th>Order Status</th>
			   <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($all_order_info as $all_order_info)
        <tr class="table-light table">
            <td>{{$all_order_info->order_id}} </td>
           
            
            
			<td>{{$all_order_info->customer_name}} </td>
			<td>{{$all_order_info->order_total}} </td>
            <td>{{$all_order_info->order_status=='pending'?'unpublished':'published'}} </td>
            <td>
			@if($all_order_info->order_status=='pending')
                    <a href="{{URL::to('/order-view/'.$all_order_info->order_id)}}" class="btn btn-success">
                        <span class="glyphicon glyphicon-thumbs-down "></span>
                    </a>
					@else
					<a href="{{url('/active_slider/'.$all_order_info->order_id)}}" class="btn btn-success">
                        <span class="glyphicon glyphicon-thumbs-up "></span>
                    </a>
					@endif
                <a href="{{url('/delete_slider/'.$all_order_info->order_id)}}" onclick="return confirm('are u sure delete this item')" class="btn btn-danger">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>

                </td>
        </tr>
        @endforeach
    </tbody>
    
</table>
@endsection