@extends('admin.master')
@section('content')
<hr/>
<div class="row">
    <div class="col-lg-12">
<!--        <h3 style="text-align: center">{{Session::get('message')}}</h3>-->
<h3 class="text-center text-success">{{Session::get('message')}}</h3>
        <hr/>
        <div class="well">
            <!--            <form class="form-horizontal" action="" method="post" enctype="mulptipart/form-data">-->
            {!!Form::open(['url'=>'product/update','method'=>'POST','class'=>'form-horizontal','enctype'=>'multipart/form-data','name'=>'editProductForm'])!!}
            <div class=" form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Product Name</label>
                <div class="col-sm-10">
                    <input type="text" value="{{$ProductById->productName}}" class="form-control" name="productName">
                    <input type="hidden" value="{{$ProductById->id}}" class="form-control" name="productId">

                    <span class="text-danger">{{$errors->has('productName')?$errors->first('productName'):''}}</span>
                </div>
            </div>
             <div class=" form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Category Name</label>
                <div class="col-sm-10">
                    <select class="form-control" name="categoryId">
                        <option>Select Category Name</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->categoryName}}</option>
                       @endforeach
                    </select>

                </div>
            </div>
             <div class=" form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Manufacture Name</label>
                <div class="col-sm-10">
                    <select class="form-control" name="manufacturerId">
                        <option>Select Manufacture Name</option>
                        @foreach($manufacturers as $manufacturer)
                        <option value="{{$manufacturer->id}}">{{$manufacturer->manufactureName}}</option>
                       @endforeach
                    </select>

                </div>
            </div>
            <div class=" form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Product Price</label>
                <div class="col-sm-10">
                    <input type="number" value="{{$ProductById->productPrice}}" class="form-control" name="productPrice">
                    <span class="text-danger">{{$errors->has('productPrice')?$errors->first('productPrice'):''}}</span>
                </div>
            </div>
             <div class=" form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Product Quantity</label>
                <div class="col-sm-10">
                    <input type="number" value="{{$ProductById->productQuantity}}" class="form-control" name="productQuantity">
                    <span class="text-danger">{{$errors->has('productQuantity')?$errors->first('productQuantity'):''}}</span>
                </div>
            </div>
            
            <div class=" form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Product Short Description</label>
                <div class="col-sm-10">
                    <textarea class="form-control"  name="productShortDiscription" rows="5">{{$ProductById->productShortDiscription}}</textarea>
                     <span class="text-danger">{{$errors->has('productShortDiscription')?$errors->first('productShortDiscription'):''}}</span>
                </div>
            </div>
             <div class=" form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Product Long Description</label>
                <div class="col-sm-10">
                    <textarea class="form-control"  name="productLongDiscription" rows="8">{{$ProductById->productLongDiscription}}</textarea>
                     <span class="text-danger">{{$errors->has('productLongDiscription')?$errors->first('productLongDiscription'):''}}</span>
                </div>
            </div>
            
            <div class=" form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Product Image</label>
                <div class="col-sm-10">
                    <input type="file" name="productImage" accept="image/*">
                    <img src="{{asset($ProductById->productImage)}}" alt="" height="150" width="150">
                    <span class="text-danger">{{$errors->has('productImage')?$errors->first('productImage'):''}}</span>
                </div>
            </div>
       
            <div class=" form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Publication Status</label>
                <div class="col-sm-10">
                    <select class="form-control" name="publicationstatus">
                        <option>Select Publication Status</option>
                        <option value="1">Published</option>
                        <option value="0">Unpublished</option>
                    </select>

                </div>
            </div>
            <div class=" form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name="btn" class="btn btn-success btn-block" >Update Product Info</button>

                </div>
            </div>
            <!--            </form>-->
            {!!Form::close()!!}

        </div>
    </div>
</div>
<script>
    document.forms['editProductForm'].elements['publicationstatus'].value={{$ProductById->publicationstatus}}
    document.forms['editProductForm'].elements['categoryId'].value={{$ProductById->categoryId}}
    document.forms['editProductForm'].elements['manufacturerId'].value={{$ProductById->manufacturerId}}

     
</script>
@endsection
