<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
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
        <title>Reset Password </title>

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
</head>
<body>
    <div class="tab-pane"">
        <div class="profile-head">
            <h3>Change Password</h3>
        </div>
        <form class="edit-profile" method="POST" action="<?= route('user.updatepassword') ?>">
            @csrf


            <div class="form-group row">
                <div class="col-12 col-sm-8 col-md-8 col-lg-9 ml-auto">
                    <h3>ٌRest Password</h3>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group row">
                    <div class="col-12 col-sm-8 col-md-8 col-lg-7">
                        <input class="form-control" name="token" type="hidden" value="<?= $tokencompact ?>" >
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group row">
                    <label class="col-12 col-sm-4 col-md-4 col-lg-3 col-form-label">New Password</label>
                    <div class="col-12 col-sm-8 col-md-8 col-lg-7">
                        <input name="password" class="form-control" type="password" value="">
                    </div>
                </div>
            </div>
             <div class="col-lg-12">
            <div class="form-group row">
                <label class="col-12 col-sm-4 col-md-4 col-lg-3 col-form-label">Re Type New Password</label>
                <div class="col-12 col-sm-8 col-md-8 col-lg-7">
                    <input name="retypepassword" class="form-control" type="password" value="">
                </div>
            </div>
             </div>
            <div class="row">
                <div class="col-12 col-sm-4 col-md-4 col-lg-3"></div>

                <div class="col-12 col-sm-8 col-md-8 col-lg-7">
                    <button type="submit" class="btn">Save changes</button>
                    <button type="reset" class="btn-secondry">Cancel</button>
                </div>
            </div>

        </form>
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
