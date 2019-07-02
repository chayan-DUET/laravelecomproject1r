@extends('admin.master')
@section('content')
<hr/>
<div class="row">
    <div class="col-lg-12">
<!--        <h3 style="text-align: center">{{Session::get('message')}}</h3>-->
<!--<h3 class="text-center text-success">{{Session::get('message')}}</h3>-->
        <hr/>
        <div class="well">
            <!--            <form class="form-horizontal" action="" method="post" enctype="mulptipart/form-data">-->
            {!!Form::open(['url'=>'category/update','method'=>'POST','class'=>'form-horizontal','name'=>'editCategoryForm'])!!}
            <div class=" form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Category Name</label>
                <div class="col-sm-10">
                    <input type="text" value="{{$categoryById->categoryName}}" class="form-control" name="categoryName">
                    <input type="hidden" value="{{$categoryById->id}}" class="form-control" name="categoryId">
                </div>
            </div>
            
            <div class=" form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Category Description</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="CategoryDiscription" rows="8">{{$categoryById->CategoryDiscription}}</textarea>

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
                    <button type="submit" name="btn" class="btn btn-success btn-block" >Update Category Info</button>

                </div>
            </div>
            <!--            </form>-->
            {!!Form::close()!!}

        </div>
    </div>
</div>
<script>
    document.forms['editCategoryForm'].elements['publicationstatus'].value={{$categoryById->publicationstatus}}
</script>
@endsection
