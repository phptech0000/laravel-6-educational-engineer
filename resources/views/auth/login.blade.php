<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--===============================================================================================-->	
        <link rel="icon" type="image/png" href="{{asset('logins/images/icons/favicon.ico')}}"/>
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('logins/vendor/bootstrap/css/bootstrap.min.css')}}">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('logins/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('logins/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('logins/vendor/animate/animate.css')}}">
        <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="{{asset('logins/vendor/css-hamburgers/hamburgers.min.css')}}">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('logins/vendor/animsition/css/animsition.min.css')}}">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('logins/vendor/select2/select2.min.css')}}">
        <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="{{asset('logins/vendor/daterangepicker/daterangepicker.css')}}">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('logins/css/util.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('logins/css/main.css')}}">
        <!--===============================================================================================-->
    </head>
    <body>

        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100">
                    <div class="login100-form-title" style="background-image: url({{asset('admin/images/bg-01.jpg')}});">
                        <span class="login100-form-title-1">
                            Sign In
                        </span>
                    </div>

                    <form class="login100-form validate-form" action="{{route('login')}}" method="POST">
                        @csrf
                        <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                            <span class="label-input100">Email</span>
                            <input class="input100" type="email" name="email" placeholder="Enter Email">
                            <span class="focus-input100"></span>
                        </div>

                        <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
                            <span class="label-input100">Password</span>
                            <input class="input100" type="password" name="password" placeholder="Enter password">
                            <span class="focus-input100"></span>
                        </div>

                        <div class="flex-sb-m w-full p-b-30">
                            <div class="contact100-form-checkbox">
                                <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                                <label class="label-checkbox100" for="ckb1">
                                    Remember me
                                </label>
                            </div>

                            <div>
                                <a href="" class="txt1">
                                    Forgot Password?
                                </a>
                            </div>
                        </div>

                        <div class="container-login100-form-btn form-group" >
                            <input  type="submit" name="submit" value="Login"class="login100-form-btn">
                        </div>
                    </form>
                    <div class="flex-sb-m w-full p-b-30">
                        <div class="contact100-form-checkbox">

                            <a class="contact100-form-checkbox" href="{{route('registeruser.create')}}" >Create New Account</a>

                        </div>

                    </div>

                </div>
            </div>

            <!--===============================================================================================-->
            <script src="{{asset('logins/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
            <!--===============================================================================================-->
            <script src="{{asset('logins/vendor/animsition/js/animsition.min.js')}}"></script>
            <!--===============================================================================================-->
            <script src="{{asset('logins/vendor/bootstrap/js/popper.js')}}"></script>
            <script src="{{asset('logins/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
            <!--===============================================================================================-->
            <script src="{{asset('logins/vendor/select2/select2.min.js')}}"></script>
            <!--===============================================================================================-->
            <script src="{{asset('logins/vendor/daterangepicker/moment.min.js')}}"></script>
            <script src="{{asset('logins/vendor/daterangepicker/daterangepicker.js')}}"></script>
            <!--===============================================================================================-->
            <script src="{{asset('logins/vendor/countdowntime/countdowntime.js')}}"></script>
            <!--===============================================================================================-->
            <script src="{{asset('logins/js/main.js')}}"></script>

    </body>
</html>