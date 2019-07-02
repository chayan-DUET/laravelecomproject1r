@extends('admin.master')
@section('content')
<hr/>
<div class="row">
    <div class="col-lg-12">
<!--        <h3 style="text-align: center">{{Session::get('message')}}</h3>-->
<h3 class="text-center text-success">{{Session::get('message')}}</h3>
        <hr/>
		 <div class=" form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">ADD Slider</label>
              
            </div>
			<hr/>
        <div class="well">
            <!--            <form class="form-horizontal" action="" method="post" enctype="mulptipart/form-data">-->
            {!!Form::open(['url'=>'save_slider','method'=>'POST','class'=>'form-horizontal','enctype'=>'multipart/form-data'])!!}
             
               
            
            <div class=" form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">ADD Slider</label>
                <div class="col-sm-10">
                    <input type="file" name="slider_image" accept="image/*" required="">
                </div>
            </div>
       
            <div class=" form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Publication Status</label>
                <div class="col-sm-10">
                  <input type="checkbox" name="publication_status" value="1"  required=""/>

                </div>
            </div>
            <div class=" form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name="btn" class="btn btn-success" >Add slider</button>
					<button type="reset" name="btn" class="btn" >cancel</button>

                </div>
            </div>
            <!--            </form>-->
            {!!Form::close()!!}

        </div>
    </div>
</div>
@endsection
