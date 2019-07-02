@extends('admin.master')
@section('content')

<!--<ul>
@foreach($categories as $category)
<li>
   {{$category->categoryName}} 
   
</li>

<li>
    {{$category->CategoryDiscription}} 
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
             <th>Category Name</th>
              <th>Category Description </th>
               <th>Publication Status</th>
               <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
        <tr class="table-light table">
            <td>{{$category->id}} </td>
            <td>{{$category->categoryName}} </td>
            <td>{{$category->CategoryDiscription}} </td>
            
            <td>{{$category->publicationstatus==1?'published':'unpublished'}} </td>
            <td>
                    <a href="{{url('category/edit/'.$category->id)}}" class="btn btn-success">
                        <span class="glyphicon glyphicon-edit"></span>
                    </a>
                <a href="{{url('category/delete/'.$category->id)}}" onclick="return confirm('are u sure delete this item')" class="btn btn-danger">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>

                </td>
        </tr>
        @endforeach
    </tbody>
    
</table>
@endsection