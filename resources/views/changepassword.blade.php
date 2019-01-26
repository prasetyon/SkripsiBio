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
        <h3></h3>
<!--        <img src="{{ URL::asset('public/img/philips.png ') }}" alt="ship" width="300" height="100">-->
        </center>

        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading"><center>Change Password</center></div>
                        <div class="panel-body">
                            @if (session('alert'))
                                <div class="alert alert-success">
                                    {{ session('alert') }}
                                </div>
                            @endif
                            <form class="form-horizontal" role="form" method="post" action="changepassword">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label for="oldpassword" class="col-md-4 control-label">Old Password</label>

                                    <div class="col-md-6">
                                        <input id="oldpassword" type="password" class="form-control" name="oldpassword" required autofocus>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="newpassword1" class="col-md-4 control-label">New Password</label>

                                    <div class="col-md-6">
                                        <input id="newpassword1" type="password" class="form-control" name="newpassword1" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="newpassword2" class="col-md-4 control-label">Confirm New Password</label>

                                    <div class="col-md-6">
                                        <input id="newpassword2" type="password" class="form-control" name="newpassword2" required>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <div class="checkbox">

                                            <button type="submit" class="btn btn-primary pull-right">
                                                Change Password
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