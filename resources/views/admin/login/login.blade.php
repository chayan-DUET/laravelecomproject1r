<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Admin login</title>

        <!-- Bootstrap Core CSS -->
        <link href="{{asset('public/admin/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="{{asset('public/admin/vendor/metisMenu/metisMenu.min.css')}}" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="{{asset('public/admin/dist/css/sb-admin-2.css')}}" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="{{asset('public/admin/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                             <li class="nav-item text-right">
                                <a class="nav-link"  href="{{ route('register') }} ">{{ __('Register') }}</a>
                            </li>
                            <h3 class="panel-title">Please Sign In</h3>
                        </div>
                        <div class="panel-body">
                            <!--                        <form role="form" method="POST" action="{{ url('/login') }}">-->
                            {!!Form::open(['url'=>'/login','method'=>'POST'])!!}
                            <fieldset>
                                <div class="form-group {{ $errors->has('email') ? ' is-invalid' : '' }}">
                                    <input class="form-control " placeholder="E-mail" name="email" type="email" autofocus>
                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                    @if ($errors->has('Password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <div class="form-group">
                                    <input class="btn btn-success btn-block" name="btn" type="submit" value="Login">
                                </div>
                                <div class="form-group">
                                    <a href="{{ url('/Login/facebook') }}" class="btn btn-facebook">
                                        <i class="fa fa-facebook">
                                        facebook
                                        </i>
                                        
                                    </a>                                  </div>
                            </fieldset>
                            <!--</form>-->
                            {!!Form::close()!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="{{asset('public/admin/vendor/jquery/jquery.min.js')}}"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="{{asset('public/admin/vendor/bootstrap/js/bootstrap.min.js')}}"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="{{asset('public/admin/vendor/metisMenu/metisMenu.min.js')}}"></script>

        <!-- Custom Theme JavaScript -->
        <script src="{{asset('public/admin/dist/js/sb-admin-2.js')}}"></script>

    </body>

</html>
