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

        <!-- DESCRIPTION -->
        <meta name="description" content=" Education Engineering" />

        <!-- OG -->
        <meta property="og:title" content="Education Engineering" />
        <meta property="og:description" content="Education Engineering" />
        <meta property="og:image" content="" />
        <meta name="format-detection" content="telephone=no">

        <!-- FAVICONS ICON ============================================= -->
        <link rel="icon" href="{{asset('assets/images/favicon.ico" type="image/x-icon')}}" />
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/favicon.png')}}" />

        <!-- PAGE TITLE HERE ============================================= -->
        <title>@yield('title', 'Education Engineering ')</title>

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
        <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
        <!-- STYLESHEETS ============================================= -->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
        <link class="skin" rel="stylesheet" type="text/css" href="{{asset('assets/css/color/color-1.css')}}">

        <!-- REVOLUTION SLIDER CSS ============================================= -->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/revolution/css/layers.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/revolution/css/settings.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/revolution/css/navigation.css')}}">

        <!-- REVOLUTION SLIDER END -->	



        <!-- All PLUGINS CSS ============================================= -->
        <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/assets.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/vendors/calendar/fullcalendar.css')}}">

        <!-- TYPOGRAPHY ============================================= -->
        <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/typography.css')}}">

        <!-- SHORTCODES ============================================= -->
        <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/shortcodes/shortcodes.css')}}">

        <!-- STYLESHEETS ============================================= -->
        <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/style.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/dashboard.css')}}">
        <link class="skin" rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/color/color-1.css')}}">
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
                window.Laravel.broadcast = '<?= route('broadcast') ?>';
                window.Laravel.deleteNotification = '<?= route('notification.delete', ':id') ?>';
                window.Laravel.notifiction = '<?= route('notification.show', ':id') ?>';
            </script>
        <?php endif; ?>
    </head>
    <body>
        <div class="page-wraper">
            <!--            <div id="loading-icon-bx"></div>-->
            <!-- Header Top ==== -->
            <header class="header rs-nav header-transparent">
                <div class="top-bar">
                    <div class="container">
                        <div class="row d-flex justify-content-between">
                            <div class="topbar-left">
                                <ul>
                                    <li><a href="faq-1.html"><i class="fa fa-question-circle"></i>Ask a Question</a></li>
                                    <li><a href="javascript:;"><i class="fa fa-envelope-o"></i>Support@website.com</a></li>
                                </ul>
                            </div>
                            <div class="topbar-right">
                                <ul>
                                    <li><a href="javascript:;" class="btn-link"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="javascript:;" class="btn-link"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="javascript:;" class="btn-link"><i class="fa fa-linkedin"></i></a></li>
                                    <!-- Search Button ==== -->
                                    <li><a id="quik-search-btn" href="javascript:;" class="btn-link"><i class="fa fa-search"></i></a></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sticky-header navbar-expand-lg">
                    <div class="menu-bar clearfix">
                        <div class="container clearfix">
                            <!-- Header Logo ==== -->
                            <div class="menu-logo">
                                <a href="{{route('index')}}"><img src="{{asset('assets/images/logo-white.png')}}" alt=""></a>
                            </div>
                            <!-- Mobile Nav Button ==== -->
                            <button class="navbar-toggler collapsed menuicon justify-content-end" type="button" data-toggle="collapse" data-target="#menuDropdown" aria-controls="menuDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                            <!-- Author Nav ==== -->
                            @guest
                            <div class="secondary-menu">
                                <div class="secondary-inner">

                                    <div class="topbar-right">
                                        <ul>
                                            <li><a href="{{route('login')}}">Login</a></li>
                                            <li><a href="{{route('registeruser.create')}}">Register</a></li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                            @else
                            @auth
                            <div class="ttr-header-wrapper">
                                <div class="ttr-header-right ttr-with-seperator">
                                    <!-- header right menu start -->
                                    <ul class="ttr-header-navigation">
                                        <li id="notification_list">
                                            <a href="#" id = "notifications" class="ttr-material-button ttr-submenu-toggle">
                                                <i class="fa fa-bell"></i>
                                                <span id="count" class="badge" data-count="0" >0</span>
                                            </a>
                                            <div class="ttr-header-submenu noti-menu"  id="notificationlist">

                                                <div class="ttr-notify-header">
                                                    <span class="ttr-notify-text-top">0 New</span>
                                                    <span class="ttr-notify-text"> User Notifications</span>
                                                </div>
                                                <div class="noti-box-list ">
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
                                            <a href="#" class="ttr-material-button ttr-submenu-toggle"><span class="ttr-user-avatar"><img alt="" src="assets/images/testimonials/pic3.jpg" width="32" height="32"></span></a>
                                            <div class="ttr-header-submenu">
                                                <ul>
                                                    <li><a href="<?= route('users.user.profile', $user->id) ?>">My profile</a></li>
                                                    <li><a href="list-view-calendar.html">Activity</a></li>
                                                    <li><a href="mailbox.html">Messages</a></li>
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

                            </div>
                            @else 
                            <div class="topbar-right">
                                <ul>
                                    <li><a href="{{route('login')}}">Login</a></li>
                                    <li><a href="{{route('registeruser.create')}}">Register</a></li>
                                </ul>
                            </div>

                            @endauth
                            @endguest
                            <!-- Search Box ==== -->
                            <div class="nav-search-bar">
                                <form action="#">
                                    <input name="search" value="" type="text" class="form-control" placeholder="Type to search">
                                    <span><i class="ti-search"></i></span>
                                </form>
                                <span id="search-remove"><i class="ti-close"></i></span>
                            </div>
                            <!-- Navigation Menu ==== -->
                            <div class="menu-links navbar-collapse collapse justify-content-start" id="menuDropdown">
                                <div class="menu-logo">
                                    <a href="{{route('index')}}"><img src="{{asset('assets/images/logo.png')}}" alt=""></a>
                                </div>
                                <ul class="nav navbar-nav">	
                                    <li class="active"><a href="javascript:;">Home <i class="fa fa-chevron-down"></i></a>
                                        <ul class="sub-menu">
                                            <li><a href="index.html">Home 1</a></li>
                                            <li><a href="index-2.html">Home 2</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="javascript:;">Pages <i class="fa fa-chevron-down"></i></a>
                                        <ul class="sub-menu">
                                            <li><a href="javascript:;">About<i class="fa fa-angle-right"></i></a>
                                                <ul class="sub-menu">
                                                    <li><a href="about-1.html">About 1</a></li>
                                                    <li><a href="about-2.html">About 2</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="javascript:;">Event<i class="fa fa-angle-right"></i></a>
                                                <ul class="sub-menu">
                                                    <li><a href="event.html">Event</a></li>
                                                    <li><a href="events-details.html">Events Details</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="javascript:;">FAQ's<i class="fa fa-angle-right"></i></a>
                                                <ul class="sub-menu">
                                                    <li><a href="faq-1.html">FAQ's 1</a></li>
                                                    <li><a href="faq-2.html">FAQ's 2</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="javascript:;">Contact Us<i class="fa fa-angle-right"></i></a>
                                                <ul class="sub-menu">
                                                    <li><a href="contact-1.html">Contact Us 1</a></li>
                                                    <li><a href="contact-2.html">Contact Us 2</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="portfolio.html">Portfolio</a></li>
                                            <li><a href="profile.html">Profile</a></li>
                                            <li><a href="membership.html">Membership</a></li>
                                            <li><a href="error-404.html">404 Page</a></li>
                                        </ul>
                                    </li>
                                    <li class="add-mega-menu"><a href="javascript:;">Our Courses <i class="fa fa-chevron-down"></i></a>
                                        <ul class="sub-menu add-menu">
                                            <li class="add-menu-left">
                                                <h5 class="menu-adv-title">Our Courses</h5>
                                                <ul>
                                                    <li><a href="courses.html">Courses </a></li>
                                                    <li><a href="courses-details.html">Courses Details</a></li>
                                                    <li><a href="profile.html">Instructor Profile</a></li>
                                                    <li><a href="event.html">Upcoming Event</a></li>
                                                    <li><a href="membership.html">Membership</a></li>
                                                </ul>
                                            </li>
                                            <li class="add-menu-right">
                                                <img src="assets/images/adv/adv.jpg" alt=""/>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="javascript:;">Blog <i class="fa fa-chevron-down"></i></a>
                                        <ul class="sub-menu">
                                            <li><a href="blog-classic-grid.html">Blog Classic</a></li>
                                            <li><a href="blog-classic-sidebar.html">Blog Classic Sidebar</a></li>
                                            <li><a href="blog-list-sidebar.html">Blog List Sidebar</a></li>
                                            <li><a href="blog-standard-sidebar.html">Blog Standard Sidebar</a></li>
                                            <li><a href="blog-details.html">Blog Details</a></li>
                                        </ul>
                                    </li>

                                    @auth
                                    <?php if ($user->is_admin == 1): ?>
                                        <li class="nav-dashboard"><a href="javascript:;">Dashboard <i class="fa fa-chevron-down"></i></a>
                                            <ul class="sub-menu">
                                                <li><a href="{{route('admin.home')}}">Dashboard</a></li>
                                                <li><a href="admin/add-listing.html">Add Listing</a></li>
                                                <li><a href="admin/bookmark.html">Bookmark</a></li>
                                                <li><a href="admin/courses.html">Courses</a></li>
                                                <li><a href="admin/review.html">Review</a></li>
                                                <li><a href="admin/teacher-profile.html">Teacher Profile</a></li>
                                                <li><a href="admin/user-profile.html">User Profile</a></li>
                                                <li><a href="javascript:;">Calendar<i class="fa fa-angle-right"></i></a>
                                                    <ul class="sub-menu">
                                                        <li><a href="admin/basic-calendar.html">Basic Calendar</a></li>
                                                        <li><a href="admin/list-view-calendar.html">List View Calendar</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="javascript:;">Mailbox<i class="fa fa-angle-right"></i></a>
                                                    <ul class="sub-menu">
                                                        <li><a href="admin/mailbox.html">Mailbox</a></li>
                                                        <li><a href="admin/mailbox-compose.html">Compose</a></li>
                                                        <li><a href="admin/mailbox-read.html">Mail Read</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    <?php endif; ?>


                                    @endauth
                                </ul>
                                <div class="nav-social-link">
                                    <a href="javascript:;"><i class="fa fa-facebook"></i></a>
                                    <a href="javascript:;"><i class="fa fa-google-plus"></i></a>
                                    <a href="javascript:;"><i class="fa fa-linkedin"></i></a>
                                </div>
                            </div>
                            <!-- Navigation Menu END ==== -->
                        </div>
                    </div>
                </div>
            </header>
            <!-- Header Top END ==== -->
            <!-- Content -->
            <div class="page-content bg-white">

                <!-- Main Slider -->
                <div class="rev-slider">
                    <div id="rev_slider_486_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="news-gallery36" data-source="gallery" style="margin:0px auto;background-color:#ffffff;padding:0px;margin-top:0px;margin-bottom:0px;">
                        <!-- START REVOLUTION SLIDER 5.3.0.2 fullwidth mode -->
                        <div id="rev_slider_486_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.3.0.2">
                            <ul>	<!-- SLIDE  -->
                                <li data-index="rs-100" 
                                    data-transition="parallaxvertical" 
                                    data-slotamount="default" 
                                    data-hideafterloop="0" 
                                    data-hideslideonmobile="off" 
                                    data-easein="default" 
                                    data-easeout="default" 
                                    data-masterspeed="default" 
                                    data-thumb="error-404.html" 
                                    data-rotate="0" 
                                    data-fstransition="fade" 
                                    data-fsmasterspeed="1500" 
                                    data-fsslotamount="7" 
                                    data-saveperformance="off" 
                                    data-title="A STUDY ON HAPPINESS" 
                                    data-param1="" data-param2="" 
                                    data-param3="" data-param4="" 
                                    data-param5="" data-param6="" 
                                    data-param7="" data-param8="" 
                                    data-param9="" data-param10="" 
                                    data-description="Science says that Women are generally happier">
                                    <!-- MAIN IMAGE -->
                                    <img src="{{asset('assets/images/slider/slide1.jpg')}}" alt="" 
                                         data-bgposition="center center" 
                                         data-bgfit="cover" 
                                         data-bgrepeat="no-repeat" 
                                         data-bgparallax="10" 
                                         class="rev-slidebg" 
                                         data-no-retina />

                                    <!-- LAYER NR. 1 -->
                                    <div class="tp-caption tp-shape tp-shapewrapper " 
                                         id="slide-100-layer-1" 
                                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                                         data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" 
                                         data-width="full"
                                         data-height="full"
                                         data-whitespace="nowrap"
                                         data-type="shape" 
                                         data-basealign="slide" 
                                         data-responsive_offset="off" 
                                         data-responsive="off"
                                         data-frames='[{"from":"opacity:0;","speed":1,"to":"o:1;","delay":0,"ease":"Power4.easeOut"},{"delay":"wait","speed":1,"to":"opacity:0;","ease":"Power4.easeOut"}]'
                                         data-textAlign="['left','left','left','left']"
                                         data-paddingtop="[0,0,0,0]"
                                         data-paddingright="[0,0,0,0]"
                                         data-paddingbottom="[0,0,0,0]"
                                         data-paddingleft="[0,0,0,0]"
                                         style="z-index: 5;background-color:rgba(2, 0, 11, 0.80);border-color:rgba(0, 0, 0, 0);border-width:0px;"> </div>	
                                    <!-- LAYER NR. 2 -->
                                    <div class="tp-caption Newspaper-Title   tp-resizeme" 
                                         id="slide-100-layer-2" 
                                         data-x="['center','center','center','center']" 
                                         data-hoffset="['0','0','0','0']" 
                                         data-y="['top','top','top','top']" 
                                         data-voffset="['250','250','250','240']" 
                                         data-fontsize="['50','50','50','30']"
                                         data-lineheight="['55','55','55','35']"
                                         data-width="full"
                                         data-height="none"
                                         data-whitespace="normal"
                                         data-type="text" 
                                         data-responsive_offset="on" 
                                         data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                                         data-textAlign="['center','center','center','center']"
                                         data-paddingtop="[0,0,0,0]"
                                         data-paddingright="[0,0,0,0]"
                                         data-paddingbottom="[10,10,10,10]"
                                         data-paddingleft="[0,0,0,0]"
                                         style="z-index: 6; font-family:rubik; font-weight:700; text-align:center; white-space: normal;">
                                        Welcome To Engineering
                                    </div>

                                    <!-- LAYER NR. 3 -->
                                    <div class="tp-caption Newspaper-Subtitle   tp-resizeme" 
                                         id="slide-100-layer-3" 
                                         data-x="['center','center','center','center']" 
                                         data-hoffset="['0','0','0','0']" 
                                         data-y="['top','top','top','top']" 
                                         data-voffset="['210','210','210','210']" 
                                         data-width="none"
                                         data-height="none"
                                         data-whitespace="nowrap"
                                         data-type="text" 
                                         data-responsive_offset="on"
                                         data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                                         data-textAlign="['left','left','left','left']"
                                         data-paddingtop="[0,0,0,0]"
                                         data-paddingright="[0,0,0,0]"
                                         data-paddingbottom="[0,0,0,0]"
                                         data-paddingleft="[0,0,0,0]"
                                         style="z-index: 7; white-space: nowrap; color:#fff; font-family:rubik; font-size:18px; font-weight:400;">
                                        Batter Education For A Better 
                                    </div>

                                    <!-- LAYER NR. 3 -->
                                    <div class="tp-caption Newspaper-Subtitle   tp-resizeme" 
                                         id="slide-100-layer-4" 
                                         data-x="['center','center','center','center']" 
                                         data-hoffset="['0','0','0','0']" 
                                         data-y="['top','top','top','top']" 
                                         data-voffset="['320','320','320','290']" 
                                         data-width="['800','800','700','420']"
                                         data-height="['100','100','100','120']"
                                         data-whitespace="unset"
                                         data-type="text" 
                                         data-responsive_offset="on"
                                         data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                                         data-textAlign="['center','center','center','center']"
                                         data-paddingtop="[0,0,0,0]"
                                         data-paddingright="[0,0,0,0]"
                                         data-paddingbottom="[0,0,0,0]"
                                         data-paddingleft="[0,0,0,0]"
                                         style="z-index: 7; text-transform:capitalize; white-space: unset; color:#fff; font-family:rubik; font-size:18px; line-height:28px; font-weight:400;">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the
                                    </div>
                                    <!-- LAYER NR. 4 -->
                                    <div class="tp-caption Newspaper-Button rev-btn " 
                                         id="slide-100-layer-5" 
                                         data-x="['center','center','center','center']" 
                                         data-hoffset="['90','80','75','90']" 
                                         data-y="['top','top','top','top']" 
                                         data-voffset="['400','400','400','420']" 
                                         data-width="none"
                                         data-height="none"
                                         data-whitespace="nowrap"
                                         data-type="button" 
                                         data-responsive_offset="on" 
                                         data-responsive="off"
                                         data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"300","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(0, 0, 0, 1.00);bg:rgba(255, 255, 255, 1.00);bc:rgba(255, 255, 255, 1.00);bw:1px 1px 1px 1px;"}]'
                                         data-textAlign="['center','center','center','center']"
                                         data-paddingtop="[12,12,12,12]"
                                         data-paddingright="[30,35,35,15]"
                                         data-paddingbottom="[12,12,12,12]"
                                         data-paddingleft="[30,35,35,15]"
                                         style="z-index: 8; white-space: nowrap; outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer; background-color:var(--primary) !important; border:0; border-radius:30px; margin-right:5px;">READ MORE </div>
                                    <div class="tp-caption Newspaper-Button rev-btn" 
                                         id="slide-100-layer-6" 
                                         data-x="['center','center','center','center']" 
                                         data-hoffset="['-90','-80','-75','-90']" 
                                         data-y="['top','top','top','top']" 
                                         data-voffset="['400','400','400','420']" 
                                         data-width="none"
                                         data-height="none"
                                         data-whitespace="nowrap"
                                         data-type="button" 
                                         data-responsive_offset="on" 
                                         data-responsive="off"
                                         data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"300","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(0, 0, 0, 1.00);bg:rgba(255, 255, 255, 1.00);bc:rgba(255, 255, 255, 1.00);bw:1px 1px 1px 1px;"}]'
                                         data-textAlign="['center','center','center','center']"
                                         data-paddingtop="[12,12,12,12]"
                                         data-paddingright="[30,35,35,15]"
                                         data-paddingbottom="[12,12,12,12]"
                                         data-paddingleft="[30,35,35,15]"
                                         style="z-index: 8; white-space: nowrap; outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer; border-radius:30px;">CONTACT US</div>
                                </li>
                                <li data-index="rs-200" 
                                    data-transition="parallaxvertical" 
                                    data-slotamount="default" 
                                    data-hideafterloop="0" 
                                    data-hideslideonmobile="off" 
                                    data-easein="default" 
                                    data-easeout="default" 
                                    data-masterspeed="default" 
                                    data-thumb="{{asset('assets/images/slider/slide1.jpg')}}" 
                                    data-rotate="0" 
                                    data-fstransition="fade" 
                                    data-fsmasterspeed="1500" 
                                    data-fsslotamount="7" 
                                    data-saveperformance="off" 
                                    data-title="A STUDY ON HAPPINESS" 
                                    data-param1="" data-param2="" 
                                    data-param3="" data-param4="" 
                                    data-param5="" data-param6="" 
                                    data-param7="" data-param8="" 
                                    data-param9="" data-param10="" 
                                    data-description="Science says that Women are generally happier">
                                    <!-- MAIN IMAGE -->
                                    <img src="{{asset('assets/images/slider/slide2.jpg')}}" alt="" 
                                         data-bgposition="center center" 
                                         data-bgfit="cover" 
                                         data-bgrepeat="no-repeat" 
                                         data-bgparallax="10" 
                                         class="rev-slidebg" 
                                         data-no-retina />

                                    <!-- LAYER NR. 1 -->
                                    <div class="tp-caption tp-shape tp-shapewrapper " 
                                         id="slide-200-layer-1" 
                                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                                         data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" 
                                         data-width="full"
                                         data-height="full"
                                         data-whitespace="nowrap"
                                         data-type="shape" 
                                         data-basealign="slide" 
                                         data-responsive_offset="off" 
                                         data-responsive="off"
                                         data-frames='[{"from":"opacity:0;","speed":1,"to":"o:1;","delay":0,"ease":"Power4.easeOut"},{"delay":"wait","speed":1000,"to":"opacity:1;","ease":"Power4.easeOut"}]'
                                         data-textAlign="['left','left','left','left']"
                                         data-paddingtop="[0,0,0,0]"
                                         data-paddingright="[0,0,0,0]"
                                         data-paddingbottom="[0,0,0,0]"
                                         data-paddingleft="[0,0,0,0]"
                                         style="z-index: 5;background-color:rgba(2, 0, 11, 0.80);border-color:rgba(0, 0, 0, 0);border-width:0px;"> 
                                    </div>

                                    <!-- LAYER NR. 2 -->
                                    <div class="tp-caption Newspaper-Title   tp-resizeme" 
                                         id="slide-200-layer-2" 
                                         data-x="['center','center','center','center']" 
                                         data-hoffset="['0','0','0','0']" 
                                         data-y="['top','top','top','top']" 
                                         data-voffset="['250','250','250','240']" 
                                         data-fontsize="['50','50','50','30']"
                                         data-lineheight="['55','55','55','35']"
                                         data-width="full"
                                         data-height="none"
                                         data-whitespace="normal"
                                         data-type="text" 
                                         data-responsive_offset="on" 
                                         data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                                         data-textAlign="['center','center','center','center']"
                                         data-paddingtop="[0,0,0,0]"
                                         data-paddingright="[0,0,0,0]"
                                         data-paddingbottom="[10,10,10,10]"
                                         data-paddingleft="[0,0,0,0]"
                                         style="z-index: 6; font-family:rubik; font-weight:700; text-align:center; white-space: normal;text-transform:uppercase;">
                                        Welcome To Engineering
                                    </div>

                                    <!-- LAYER NR. 3 -->
                                    <div class="tp-caption Newspaper-Subtitle   tp-resizeme" 
                                         id="slide-200-layer-3" 
                                         data-x="['center','center','center','center']" 
                                         data-hoffset="['0','0','0','0']" 
                                         data-y="['top','top','top','top']" 
                                         data-voffset="['210','210','210','210']" 
                                         data-width="none"
                                         data-height="none"
                                         data-whitespace="nowrap"
                                         data-type="text" 
                                         data-responsive_offset="on"
                                         data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                                         data-textAlign="['left','left','left','left']"
                                         data-paddingtop="[0,0,0,0]"
                                         data-paddingright="[0,0,0,0]"
                                         data-paddingbottom="[0,0,0,0]"
                                         data-paddingleft="[0,0,0,0]"
                                         style="z-index: 7; white-space: nowrap;text-transform:uppercase; color:#fff; font-family:rubik; font-size:18px; font-weight:400;">
                                        Batter Education For A Better 
                                    </div>

                                    <!-- LAYER NR. 3 -->
                                    <div class="tp-caption Newspaper-Subtitle   tp-resizeme" 
                                         id="slide-200-layer-4" 
                                         data-x="['center','center','center','center']" 
                                         data-hoffset="['0','0','0','0']" 
                                         data-y="['top','top','top','top']" 
                                         data-voffset="['320','320','320','290']" 
                                         data-width="['800','800','700','420']"
                                         data-height="['100','100','100','120']"
                                         data-whitespace="unset"
                                         data-type="text" 
                                         data-responsive_offset="on"
                                         data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                                         data-textAlign="['center','center','center','center']"
                                         data-paddingtop="[0,0,0,0]"
                                         data-paddingright="[0,0,0,0]"
                                         data-paddingbottom="[0,0,0,0]"
                                         data-paddingleft="[0,0,0,0]"
                                         style="z-index: 7; text-transform:capitalize; white-space: unset; color:#fff; font-family:rubik; font-size:18px; line-height:28px; font-weight:400;">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the
                                    </div>
                                    <!-- LAYER NR. 4 -->
                                    <div class="tp-caption Newspaper-Button rev-btn " 
                                         id="slide-200-layer-5" 
                                         data-x="['center','center','center','center']" 
                                         data-hoffset="['90','80','75','90']" 
                                         data-y="['top','top','top','top']" 
                                         data-voffset="['400','400','400','420']" 
                                         data-width="none"
                                         data-height="none"
                                         data-whitespace="nowrap"
                                         data-type="button" 
                                         data-responsive_offset="on" 
                                         data-responsive="off"
                                         data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"300","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(0, 0, 0, 1.00);bg:rgba(255, 255, 255, 1.00);bc:rgba(255, 255, 255, 1.00);bw:1px 1px 1px 1px;"}]'
                                         data-textAlign="['center','center','center','center']"
                                         data-paddingtop="[12,12,12,12]"
                                         data-paddingright="[30,35,35,15]"
                                         data-paddingbottom="[12,12,12,12]"
                                         data-paddingleft="[30,35,35,15]"
                                         style="z-index: 8; white-space: nowrap; outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer; background-color:var(--primary) !important; border:0; border-radius:30px; margin-right:5px;">READ MORE </div>
                                    <div class="tp-caption Newspaper-Button rev-btn" 
                                         id="slide-200-layer-6" 
                                         data-x="['center','center','center','center']" 
                                         data-hoffset="['-90','-80','-75','-90']" 
                                         data-y="['top','top','top','top']" 
                                         data-voffset="['400','400','400','420']" 
                                         data-width="none"
                                         data-height="none"
                                         data-whitespace="nowrap"
                                         data-type="button" 
                                         data-responsive_offset="on" 
                                         data-responsive="off"
                                         data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"300","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(0, 0, 0, 1.00);bg:rgba(255, 255, 255, 1.00);bc:rgba(255, 255, 255, 1.00);bw:1px 1px 1px 1px;"}]'
                                         data-textAlign="['center','center','center','center']"
                                         data-paddingtop="[12,12,12,12]"
                                         data-paddingright="[30,35,35,15]"
                                         data-paddingbottom="[12,12,12,12]"
                                         data-paddingleft="[30,35,35,15]"
                                         style="z-index: 8; white-space: nowrap; outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer; border-radius:30px;">CONTACT US</div>
                                </li>
                                <!-- SLIDE  -->
                            </ul>
                        </div><!-- END REVOLUTION SLIDER -->  
                    </div>  
                </div>  
                <main>
                    @yield('content')
                </main>
            </div>


            <!-- Footer ==== -->
            <footer>
                <div class="footer-top">
                    <div class="pt-exebar">
                        <div class="container">
                            <div class="d-flex align-items-stretch">
                                <div class="pt-logo mr-auto">
                                    <a href="{{route('index')}}"><img src="{{asset('assets/images/logo-white.png')}}" alt=""/></a>
                                </div>
                                <div class="pt-social-link">
                                    <ul class="list-inline m-a0">
                                        <li><a href="#" class="btn-link"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#" class="btn-link"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#" class="btn-link"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="#" class="btn-link"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                                <div class="pt-btn-join">
                                    <a href="#" class="btn ">Join Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4 col-md-12 col-sm-12 footer-col-4">
                                <div class="widget">
                                    <h5 class="footer-title">Sign Up For A Newsletter</h5>
                                    <p class="text-capitalize m-b20">Weekly Breaking news analysis and cutting edge advices on job searching.</p>
                                    <div class="subscribe-form m-b20">
                                        <form class="subscription-form" action="http://educhamp.themetrades.com/demo/assets/script/mailchamp.php" method="post">
                                            <div class="ajax-message"></div>
                                            <div class="input-group">
                                                <input name="email" required="required"  class="form-control" placeholder="Your Email Address" type="email">
                                                <span class="input-group-btn">
                                                    <button name="submit" value="Submit" type="submit" class="btn"><i class="fa fa-arrow-right"></i></button>
                                                </span> 
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-5 col-md-7 col-sm-12">
                                <div class="row">
                                    <div class="col-4 col-lg-4 col-md-4 col-sm-4">
                                        <div class="widget footer_widget">
                                            <h5 class="footer-title">Company</h5>
                                            <ul>
                                                <li><a href="{{route('index')}}">Home</a></li>
                                                <li><a href="about-1.html">About</a></li>
                                                <li><a href="faq-1.html">FAQs</a></li>
                                                <li><a href="contact-1.html">Contact</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-4 col-lg-4 col-md-4 col-sm-4">
                                        <div class="widget footer_widget">
                                            <h5 class="footer-title">Get In Touch</h5>
                                            <ul>
                                                <li><a href="http://educhamp.themetrades.com/admin/index.html">Dashboard</a></li>
                                                <li><a href="blog-classic-grid.html">Blog</a></li>
                                                <li><a href="portfolio.html">Portfolio</a></li>
                                                <li><a href="event.html">Event</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-4 col-lg-4 col-md-4 col-sm-4">
                                        <div class="widget footer_widget">
                                            <h5 class="footer-title">Courses</h5>
                                            <ul>
                                                <li><a href="courses.html">Courses</a></li>
                                                <li><a href="courses-details.html">Details</a></li>
                                                <li><a href="membership.html">Membership</a></li>
                                                <li><a href="profile.html">Profile</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-3 col-md-5 col-sm-12 footer-col-4">
                                <div class="widget widget_gallery gallery-grid-4">
                                    <h5 class="footer-title">Our Gallery</h5>
                                    <ul class="magnific-image">
                                        <li><a href="{{asset('assets/images/gallery/pic1.jpg')}}" class="magnific-anchor"><img src="{{asset('assets/images/gallery/pic1.jpg')}}" alt=""></a></li>
                                        <li><a href="{{asset('assets/images/gallery/pic2.jpg')}}" class="magnific-anchor"><img src="{{asset('assets/images/gallery/pic2.jpg')}}" alt=""></a></li>
                                        <li><a href="{{asset('assets/images/gallery/pic3.jpg')}}" class="magnific-anchor"><img src="{{asset('assets/images/gallery/pic3.jpg')}}" alt=""></a></li>
                                        <li><a href="{{asset('assets/images/gallery/pic4.jpg')}}" class="magnific-anchor"><img src="{{asset('assets/images/gallery/pic4.jpg')}}" alt=""></a></li>
                                        <li><a href="{{asset('assets/images/gallery/pic5.jpg')}}" class="magnific-anchor"><img src="{{asset('assets/images/gallery/pic5.jpg')}}" alt=""></a></li>
                                        <li><a href="{{asset('assets/images/gallery/pic6.jpg')}}" class="magnific-anchor"><img src="{{asset('assets/images/gallery/pic6.jpg')}}" alt=""></a></li>
                                        <li><a href="{{asset('assets/images/gallery/pic7.jpg')}}" class="magnific-anchor"><img src="{{asset('assets/images/gallery/pic7.jpg')}}" alt=""></a></li>
                                        <li><a href="{{asset('assets/images/gallery/pic8.jpg')}}" class="magnific-anchor"><img src="{{asset('assets/images/gallery/pic8.jpg')}}" alt=""></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-center"> <a target="_blank" href="https://www.templateshub.net">Templates Hub</a></div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- Footer END ==== -->
            <button class="back-to-top fa fa-chevron-up" ></button> 

        </div>

        <script src="{{asset('js/app.js')}}"></script>
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
        <!-- Revolution JavaScripts Files -->
        <script src="{{asset('assets/vendors/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
        <script src="{{asset('assets/vendors/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
        <!-- Slider revolution 5.0 Extensions  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
        <script src="{{asset('assets/vendors/revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
        <script src="{{asset('assets/vendors/revolution/js/extensions/revolution.extension.carousel.min.js')}}"></script>
        <script src="{{asset('assets/vendors/revolution/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
        <script src="{{asset('assets/vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
        <script src="{{asset('assets/vendors/revolution/js/extensions/revolution.extension.migration.min.js')}}"></script>
        <script src="{{asset('assets/vendors/revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
        <script src="{{asset('assets/vendors/revolution/js/extensions/revolution.extension.parallax.min.js')}}"></script>
        <script src="{{asset('assets/vendors/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
        <script src="{{asset('assets/vendors/revolution/js/extensions/revolution.extension.video.min.js')}}"></script>
        <script>
                                                        jQuery(document).ready(function () {
                                                        var ttrevapi;
                                                        var tpj = jQuery;
                                                        if (tpj("#rev_slider_486_1").revolution == undefined) {
                                                        revslider_showDoubleJqueryError("#rev_slider_486_1");
                                                        } else {
                                                        ttrevapi = tpj("#rev_slider_486_1").show().revolution({
                                                        sliderType: "standard",
                                                                jsFileLocation: "{{asset('assets/vendors/revolution/js/')}}",
                                                                sliderLayout: "fullwidth",
                                                                dottedOverlay: "none",
                                                                delay: 9000,
                                                                navigation: {
                                                                keyboardNavigation: "on",
                                                                        keyboard_direction: "horizontal",
                                                                        mouseScrollNavigation: "off",
                                                                        mouseScrollReverse: "default",
                                                                        onHoverStop: "on",
                                                                        touch: {
                                                                        touchenabled: "on",
                                                                                swipe_threshold: 75,
                                                                                swipe_min_touches: 1,
                                                                                swipe_direction: "horizontal",
                                                                                drag_block_vertical: false
                                                                        }
                                                                ,
                                                                        arrows: {
                                                                        style: "uranus",
                                                                                enable: true,
                                                                                hide_onmobile: false,
                                                                                hide_onleave: false,
                                                                                tmp: '',
                                                                                left: {
                                                                                h_align: "left",
                                                                                        v_align: "center",
                                                                                        h_offset: 10,
                                                                                        v_offset: 0
                                                                                },
                                                                                right: {
                                                                                h_align: "right",
                                                                                        v_align: "center",
                                                                                        h_offset: 10,
                                                                                        v_offset: 0
                                                                                }
                                                                        },
                                                                },
                                                                viewPort: {
                                                                enable: true,
                                                                        outof: "pause",
                                                                        visible_area: "80%",
                                                                        presize: false
                                                                },
                                                                responsiveLevels: [1240, 1024, 778, 480],
                                                                visibilityLevels: [1240, 1024, 778, 480],
                                                                gridwidth: [1240, 1024, 778, 480],
                                                                gridheight: [768, 600, 600, 600],
                                                                lazyType: "none",
                                                                parallax: {
                                                                type: "scroll",
                                                                        origo: "enterpoint",
                                                                        speed: 400,
                                                                        levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 50, 46, 47, 48, 49, 50, 55],
                                                                        type: "scroll",
                                                                },
                                                                shadow: 0,
                                                                spinner: "off",
                                                                stopLoop: "off",
                                                                stopAfterLoops: - 1,
                                                                stopAtSlide: - 1,
                                                                shuffle: "off",
                                                                autoHeight: "off",
                                                                hideThumbsOnMobile: "off",
                                                                hideSliderAtLimit: 0,
                                                                hideCaptionAtLimit: 0,
                                                                hideAllCaptionAtLilmit: 0,
                                                                debugMode: false,
                                                                fallbacks: {
                                                                simplifyAll: "off",
                                                                        nextSlideOnWindowFocus: "off",
                                                                        disableFocusListener: false,
                                                                }
                                                        });
                                                        }
                                                        });
        </script>



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
        <script src="{{asset('admin/assets/vendors/chart/chart.min.js')}}"></script>
        <script src="{{asset('admin/assets/js/admin.js')}}"></script>
        <script src="{{asset('admin/assets/vendors/switcher/switcher.js')}}"></script>
        <script>

                                                        </body>
                                                                </html>
