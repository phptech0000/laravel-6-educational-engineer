<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <!-- META ============================================= -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="keywords" content="" />
        <meta name="author" content="" />
        <meta name="robots" content="" />
        <meta charset="UTF-8">
        <!-- DESCRIPTION -->
        <meta name="description" content=" Education Engineer" />

        <!-- OG -->
        <meta property="og:title" content=" Education Engineer " />
        <meta property="og:description" content=" Education Engineer" />
        <meta property="og:image" content="" />
        <meta name="format-detection" content="telephone=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- FAVICONS ICON ============================================= -->
        <link rel="icon" href="../error-404.html" type="image/x-icon" />
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/favicon.png')}}" />

        <!-- PAGE TITLE HERE ============================================= -->
        <title>User Profile</title>
        <!-- MOBILE SPECIFIC ============================================= -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.min.js"></script>
        <script src="assets/js/respond.min.js"></script>
        <![endif]-->

        <!-- All PLUGINS CSS ============================================= -->
        <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/assets.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/vendors/summernote/summernote.css')}}">

        <!-- TYPOGRAPHY ============================================= -->
        <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/typography.css')}}">

        <!-- SHORTCODES ============================================= -->
        <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/shortcodes/shortcodes.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('icons/css/material-design-iconic-font.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('icons/css/material-design-iconic-font.min.css')}}">
        <!-- STYLESHEETS ============================================= -->
        <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/style.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/dashboard.css')}}">
        <link class="skin" rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/color/color-1.css')}}">
        @yield('styles')





        <script>
            window.Laravel = <?php
echo json_encode([
    'csrfToken' => csrf_token(),
]);
?>
        </script>

        <!-- This makes the current user's id available in javascript -->
        <?php if (!auth()->guest()): ?>
            <script>
                window.Laravel.userId = <?= auth()->user()->id; ?>;
                window.Laravel.url = '<?= route('notification') ?>';
                window.Laravel.broadcast = '<?= url('/broadcasting/auth') ?>';
                window.Laravel.deleteNotification = '<?= route('notification.delete', ':id') ?>';
                window.Laravel.createsession = '<?= route('createsession') ?>';
                window.Laravel.sendmessage = '<?= route('sendmessage', ':sessionid') ?>';
                window.Laravel.getsession = '<?= route('getsession', [':sender_id', ':receiver_id']) ?>';
                window.Laravel.getUnReadMessage = '<?= route('unreadmessages',':id') ?>';
            </script>
        <?php endif; ?>
    </head>
    <body class="ttr-opened-sidebar ttr-pinned-sidebar" id="body">
        <!-- header start -->
        <header class="ttr-header">
            <div class="ttr-header-wrapper">
                <!--sidebar menu toggler start -->
                <div class="ttr-toggle-sidebar ttr-material-button" id="toggle_button">
                    <i class="ti-close ttr-open-icon"></i>
                    <i class="ti-menu ttr-close-icon"></i>
                </div>
                <!--sidebar menu toggler end -->
                <!--logo start -->
                <div class="ttr-logo-box">
                    <div>
                        <a href="{{route('index')}}" class="ttr-logo">
                            <img class="ttr-logo-mobile" alt="" src="{{asset('assets/images/logo-white.png')}}" width="30" height="30">
                            <img class="ttr-logo-desktop" alt="" src="{{asset('assets/images/logo-white.png')}}" width="160" height="27">
                        </a>
                    </div>
                </div>
                <!--logo end -->
                <div class="ttr-header-menu">
                    <!-- header left menu start -->
                    <ul class="ttr-header-navigation">
                        <li>
                            <a href="{{route('index')}}" class="ttr-material-button ttr-submenu-toggle">HOME</a>
                        </li>
                        <li>
                            <a href="#" class="ttr-material-button ttr-submenu-toggle">QUICK MENU <i class="fa fa-angle-down"></i></a>
                            <div class="ttr-header-submenu">
                                <ul>
                                    <li><a href="../courses.html">Our Courses</a></li>
                                    <li><a href="../event.html">New Event</a></li>
                                    <li><a href="../membership.html">Membership</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                    <!-- header left menu end -->
                </div>
                <div class="ttr-header-right ttr-with-seperator">
                    <!-- header right menu start -->
                    <ul class="ttr-header-navigation">
                        <li>
                            <a href="#" class="ttr-material-button ttr-search-toggle"><i class="fa fa-search"></i></a>
                        </li>

                        <li id="notification_list">
                            <a href="#" class="ttr-material-button ttr-submenu-toggle">
                                <i class="fa fa-bell"></i>
                                <span id="count" class="badge" data-count="0" >0</span>
                            </a>
                            <div class="ttr-header-submenu noti-menu"  id="notificationlist">

                                <div class="ttr-notify-header">
                                    <span class="ttr-notify-text-top">0 New</span>
                                    <span class="ttr-notify-text"> User Notifications</span>
                                </div>
                                <div class="noti-box-list scrollbar sytel-8">
                                    <div class="widget-inner">
                                        <div class="new-user-list">
                                            <ul id="notify">

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="#" class="ttr-material-button ttr-submenu-toggle"><span class="ttr-user-avatar"><img alt="" src="{{asset('assets/images/testimonials/pic3.jpg')}}" width="32" height="32"></span></a>
                            <div class="ttr-header-submenu">
                                <ul>
                                    <li><a href="<?= route('users.user.profile', $user->id) ?>">My profile</a></li>
                                    <li><a href="list-view-calendar.html">Activity</a></li>
                                    <li><a href="{{route('admin.mailbox')}}">Messages</a></li>
                                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form></li>
                                </ul>
                            </div>
                        </li>
                        <li class="ttr-hide-on-mobile">
                            <a href="#" class="ttr-material-button"><i class="ti-layout-grid3-alt"></i></a>
                            <div class="ttr-header-submenu ttr-extra-menu">
                                <a href="#">
                                    <i class="fa fa-music"></i>
                                    <span>Musics</span>
                                </a>
                                <a href="#">
                                    <i class="fa fa-youtube-play"></i>
                                    <span>Videos</span>
                                </a>
                                <a href="#">
                                    <i class="fa fa-envelope"></i>
                                    <span>Emails</span>
                                </a>
                                <a href="#">
                                    <i class="fa fa-book"></i>
                                    <span>Reports</span>
                                </a>
                                <a href="#">
                                    <i class="fa fa-smile-o"></i>
                                    <span>Persons</span>
                                </a>
                                <a href="#">
                                    <i class="fa fa-picture-o"></i>
                                    <span>Pictures</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                    <!-- header right menu end -->
                </div>
                <!--header search panel start -->
                <div class="ttr-search-bar">
                    <form class="ttr-search-form">
                        <div class="ttr-search-input-wrapper">
                            <input type="text" name="qq" placeholder="search something..." class="ttr-search-input">
                            <button type="submit" name="search" class="ttr-search-submit"><i class="ti-arrow-right"></i></button>
                        </div>
                        <span class="ttr-search-close ttr-search-toggle">
                            <i class="ti-close"></i>
                        </span>
                    </form>
                </div>
                <!--header search panel end -->
            </div>
        </header>
        <!-- header end -->
        <main id ="main" class="ttr-wrapper">
            @yield('content')
        </main>


        <div class="ttr-overlay" id="overlay"></div>
        <!-- External JavaScripts -->
        <script src="{{asset('js/app.js')}}"></script>
        <script src="{{asset('admin/assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('admin/assets/vendors/bootstrap/js/popper.min.js')}}"></script>
        <script src="{{asset('admin/assets/vendors/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('admin/assets/vendors/bootstrap-select/bootstrap-select.min.js')}}"></script>
        <script src="{{asset('admin/assets/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js')}}"></script>
        <script src="{{asset('admin/assets/vendors/magnific-popup/magnific-popup.js')}}"></script>
        <script src="{{asset('admin/assets/vendors/counter/waypoints-min.js')}}"></script>
        <script src="{{asset('admin/assets/vendors/counter/counterup.min.js')}}"></script>
        <script src="{{asset('admin/assets/vendors/imagesloaded/imagesloaded.js')}}"></script>
        <script src="{{asset('admin/assets/vendors/masonry/masonry.js')}}"></script>
        <script src="{{asset('admin/assets/vendors/masonry/filter.js')}}"></script>
        <script src="{{asset('admin/assets/vendors/owl-carousel/owl.carousel.js')}}"></script>
        <script src='{{asset('admin/assets/vendors/scroll/scrollbar.min.js')}}'></script>
        <script src="{{asset('admin/assets/js/functions.js')}}"></script>
        <script src="{{asset('admin/assets/js/admin.js')}}"></script>
        <script src='{{asset('admin/assets/vendors/switcher/switcher.js')}}'></script>
        @yield('scripts')
    </body>
</html>

