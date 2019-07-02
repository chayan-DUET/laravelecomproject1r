@extends('admin.master')
@section('content')

<!--<ul>
@foreach($manufactures as $manufacture)
<li>
   {{$manufacture->manufactureName}} 
   
</li>

<li>
    {{$manufacture->manufactureDiscription}} 
</li>
<hr/>-->
<!--@endforeach
</ul>-->
<hr/>
<h3 class="text-center text-success">{{Session::get('message')}}</h3>
<hr/>
<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th> ID</th>
             <th>Manufacture Name</th>
              <th>Manufacture Description </th>
               <th>Publication Status</th>
               <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($manufactures as $manufacture)
        <tr class="table-light table">
            <td>{{$manufacture->id}} </td>
            <td>{{$manufacture->manufactureName}} </td>
            <td>{{$manufacture->manufactureDiscription}} </td>
            
            <td>{{$manufacture->publicationstatus==1?'published':'unpublished'}} </td>
            <td>
                    <a href="{{url('manufacture/edit/'.$manufacture->id)}}" class="btn btn-success">
                        <span class="glyphicon glyphicon-edit"></span>
                    </a>
                <a href="{{url('manufacture/delete/'.$manufacture->id)}}" onclick="return confirm('are u sure delete this item')" class="btn btn-danger">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>

                </td>
        </tr>
        @endforeach
    </tbody>
    
</table>
@endsection