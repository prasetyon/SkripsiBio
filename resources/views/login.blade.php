<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>LOGIN</title>

    <!-- Styles -->
    <link href="{{ URL::asset('public/Admin-LTE/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">    
        <center>
        <h3>LOGIN</h3>
<!--        <img src="{{ URL::asset('public/img/philips.png ') }}" alt="ship" width="300" height="100">-->
        </center>

        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading"><center>Philips</center></div>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="post" action="login">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                    <label for="username" class="col-md-4 control-label">Username</label>

                                    <div class="col-md-6">
                                        <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                                        @if ($errors->has('username'))username
                                            <span class="help-block">
                                                <strong>{{ $errors->first('username') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 control-label">Password</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <div class="checkbox">
                                            <!-- <label>
                                                <input type="checkbox" name="remember" value="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                            </label> -->

                                            <button type="submit" class="btn btn-primary pull-right">
                                                Login
                                            </button>

                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Scripts -->
    <script src="{{ asset('public/Admin-LTE/bootstrap/js/app.js') }}"></script>
</body>
</html>