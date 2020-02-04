<!DOCTYPE html>
<html lang="en">

    <head>

        <!-- META ============================================= -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="keywords" content="" />
        <meta name="author" content="" />
        <meta name="robots" content="" />

        <!-- DESCRIPTION -->
        <meta name="description" content=" Education Engineer" />

        <!-- OG -->
        <meta property="og:title" content="Education Engineer" />
        <meta property="og:description" content="Education Engineer" />
        <meta property="og:image" content="" />
        <meta name="format-detection" content="telephone=no">

        <!-- FAVICONS ICON ============================================= -->
        <link rel="icon" href="{{asset('assets/images/favicon.ico')}}" type="image/x-icon" />
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/favicon.png')}}" />

        <!-- PAGE TITLE HERE ============================================= -->
        <title>Forget Password </title>

        <!-- MOBILE SPECIFIC ============================================= -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.min.js"></script>
        <script src="assets/js/respond.min.js"></script>
        <![endif]-->

        <!-- All PLUGINS CSS ============================================= -->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/assets.css')}}">

        <!-- TYPOGRAPHY ============================================= -->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/typography.css')}}">

        <!-- SHORTCODES ============================================= -->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/shortcodes/shortcodes.css')}}">

        <!-- STYLESHEETS ============================================= -->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
        <link class="skin" rel="stylesheet" type="text/css" href="{{asset('assets/css/color/color-1.css')}}">

    </head>
    <body id="bg">
        <div class="page-wraper">
            <div id="loading-icon-bx"></div>
            <div class="account-form">
                <div class="account-head" style="background-image:url({{asset('assets/images/background/bg2.jpg')}});">
                    <a href="index.html"><img src="{{asset('assets/images/logo-white-2.png')}}" alt=""></a>
                </div>
                <div class="account-form-inner">
                    <div class="account-container">
                        <div class="heading-bx left">
                            <h2 class="title-head">Forget <span>Password</span></h2>
                            <p>Login Your Account <a href="{{route('login')}}">Click here</a></p>
                        </div>	
                        <form class="contact-bx" method="POST" action="{{route('user.restpassword')}}">
                            @csrf
                            <div class="row placeani">
                               
                                <div class=" col-lg-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <label>Your Email Address</label>
                                            <input name="email" type="email" required="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 m-b30">
                                    <button name="submit" type="submit" value="Submit" class="btn button-md">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- External JavaScripts -->
        <script src="{{asset('assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('assets/vendors/bootstrap/js/popper.min.js')}}"></script>
        <script src="{{asset('assets/vendors/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/vendors/bootstrap-select/bootstrap-select.min.js')}}"></script>
        <script src="{{asset('assets/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js')}}"></script>
        <script src="{{asset('assets/vendors/magnific-popup/magnific-popup.js')}}"></script>
        <script src="{{asset('assets/vendors/counter/waypoints-min.js')}}"></script>
        <script src="{{asset('assets/vendors/counter/counterup.min.js')}}"></script>
        <script src="{{asset('assets/vendors/imagesloaded/imagesloaded.js')}}"></script>
        <script src="{{asset('assets/vendors/masonry/masonry.js')}}"></script>
        <script src="{{asset('assets/vendors/masonry/filter.js')}}"></script>
        <script src="{{asset('assets/vendors/owl-carousel/owl.carousel.js')}}"></script>
        <script src="{{asset('assets/js/functions.js')}}"></script>
        <script src="{{asset('assets/js/contact.js')}}"></script>
        <script src='{{asset('assets/vendors/switcher/switcher.js')}}'></script>
    </body>

</html>
