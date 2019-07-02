@extends('admin.master')
@section('content')
<hr/>
<table class="table table-bordered table-hover">
    <tr>
        <th>Product Id</th>
        <th>{{$product->id}}</th>
    </tr>
    <tr>
        <th>Product Name</th>
        <th>{{$product->productName}}</th>
    </tr>
    <tr>
        <th>Category Name</th>
        <th>{{$product->categoryName}}</th>
    </tr>
    <tr>
        <th>Manufacture Name </th>
        <th>{{$product->manufactureName}}</th>
    </tr>
    <tr>
        <th>Product Price</th>
        <th>{{$product->productPrice}}</th>
    </tr>
    <tr>
        <th>Product Quantity</th>
        <th>{{$product->productQuantity}}</th>
    </tr>
    <tr>
        <th>Product Sort Description</th>
        <th>{!!$product->productShortDiscription!!}</th>
    </tr>
    <tr>
        <th>Product Short Description</th>
        <th>{!!$product->productLongDiscription !!}</th>
    </tr>
    <tr>
        <th>Product Image</th>
<!--        <th>><img src="{{url('/'.$product->productImage)}}" alt="{{$product->productName}}" height="200" width="200"/></th>-->
                <th>><img src="{{asset($product->productImage)}}" alt="{{$product->productName}}" height="200" width="200"/></th>
    </tr>
    <tr>
        <th>Product Status</th>
        <th>{{$product->publicationstatus==1?'published':'unpublished'}}</th>
    </tr>
    
</table>

@endsection
