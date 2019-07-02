@extends('admin.master')
@section('content')


<hr/>
<h3 class="text-center text-success">{{Session::get('message')}}</h3>
<hr/>
<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th> ID</th>
             <th>Slider Image</th>
               <th>Publication Status</th>
               <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($slider as $sliders)
        <tr class="table-light table">
            <td>{{$sliders->slider_id}} </td>
           <td><img src="{{URL::to($sliders->slider_image)}}" style="height:80px;width:200px;"> </td>
            
            
            <td>{{$sliders->publication_status==1?'published':'unpublished'}} </td>
            <td>
			@if($sliders->publication_status==1)
                    <a href="{{URL::to('/unactive_slider/'.$sliders->slider_id)}}" class="btn btn-success">
                        <span class="glyphicon glyphicon-thumbs-down "></span>
                    </a>
					@else
					<a href="{{url('/active_slider/'.$sliders->slider_id)}}" class="btn btn-success">
                        <span class="glyphicon glyphicon-thumbs-up "></span>
                    </a>
					@endif
                <a href="{{url('/delete_slider/'.$sliders->slider_id)}}" onclick="return confirm('are u sure delete this item')" class="btn btn-danger">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>

                </td>
        </tr>
        @endforeach
    </tbody>
    
</table>
@endsection