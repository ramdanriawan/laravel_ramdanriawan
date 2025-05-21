<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>{{ env('APP_NAME') }}</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ url("") }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ url("") }}/css/adminnine.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ url("") }}/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

{{--    <style>--}}
{{--        .loginpages {--}}
{{--            background-image: url("{{ url($identity->background) }}");--}}
{{--            background-repeat: no-repeat;--}}
{{--            background-size: cover;--}}
{{--        }--}}
{{--    </style>--}}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="loginpages">
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="userpic" style="background-color: white; margin-bottom: 40px;"><img
                        src="{{ url($identity->logo) }}" alt=""></div>

                <h1 style="text-align: center; ">{{ $identity->appTitle }}</h1>
                <div class="panel-body">
                    <h2 class="text-center">Silakan login</h2>

                    @if(session()->get('message'))
                        <h2 class="text-center" style="color: red;">{{ session()->get('message') }}</h2>
                    @endif

                    <form action="{{ route('loginPost') }}" method="post">
                        {{ csrf_field() }}

                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password"
                                       value="">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="remember" type="checkbox" value="Remember Me">
                                    Remember Me </label>
                            </div>
                            <br>
                            <!-- Change this to a button or input when using this as a form -->
                            <button type="submit" class="btn btn-lg btn-info btn-block">Login</button>
                        </fieldset>
                        <br>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="{{ url("") }}/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{ url("") }}/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="{{ url("") }}/js/adminnine.js"></script>
</body>
</html>
