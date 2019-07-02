@extends('admin.master')
@section('content')


<hr/>
<h3 class="text-center text-success">{{Session::get('message')}}</h3>
<hr/>
<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th> Product Name</th>
             <th>Category Name</th>
              <th>Manufacturer Name </th>
               <th>Product Price</th>
               <th>Product Quantity</th>
               <th>Publication Status</th>
               <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr class="table-light table">
            <td>{{$product->productName}} </td>
            <td>{{$product->categoryName}} </td>
             <td>{{$product->manufactureName}} </td>
              <td>TK.{{$product->productPrice}} </td>
            <td>{{$product->publicationstatus}} </td>
            
            <td>{{$product->publicationstatus==1?'published':'unpublished'}} </td>
            <td>
                <a href="{{url('/product/view/'.$product->id)}}" class="btn btn-info" title="Product Show">
                        <span class="glyphicon glyphicon-info-sign"></span>
                    </a>
                <a href="{{url('/product/edit/'.$product->id)}}" class="btn btn-success" title="Product Edit">
                        <span class="glyphicon glyphicon-edit"></span>
                    </a>
                
                <a href="{{url('/product/delete/'.$product->id)}}" onclick="return confirm('are u sure delete this item')" class="btn btn-danger" title="Product Delete">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>

                </td>
        </tr>
        @endforeach
      
    </tbody>
    
</table>
@endsection