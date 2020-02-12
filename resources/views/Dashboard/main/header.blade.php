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
        <meta name="description" content=" Education Engineer" />

        <!-- OG -->
        <meta property="og:title" content=" Education Engineer " />
        <meta property="og:description" content=" Education Engineer" />
        <meta property="og:image" content="" />
        <meta name="format-detection" content="telephone=no">

        <!-- FAVICONS ICON ============================================= -->
        <link rel="icon" href="../error-404.html" type="image/x-icon" />
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/favicon.png')}}" />

        <!-- PAGE TITLE HERE ============================================= -->
        <title>Dashboard</title>
        <!-- MOBILE SPECIFIC ============================================= -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.min.js"></script>
        <script src="assets/js/respond.min.js"></script>
        <![endif]-->

        <!-- All PLUGINS CSS ============================================= -->
        <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/assets.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/vendors/calendar/fullcalendar.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/vendors/summernote/summernote.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/vendors/file-upload/imageuploadify.min.css')}}">
        <!-- TYPOGRAPHY ============================================= -->
        <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/typography.css')}}">

        <!-- SHORTCODES ============================================= -->
        <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/shortcodes/shortcodes.css')}}">

        <!-- STYLESHEETS ============================================= -->
        <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/style.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/dashboard.css')}}">
        <link class="skin" rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/color/color-1.css')}}">
        <style >

            /* Hiding the checkbox, but allowing it to be focused */
            .badgebox
            {
                opacity: 0;
            }

            .badgebox + .badge
            {
                /* Move the check mark away when unchecked */
                text-indent: -999999px;
                /* Makes the badge width stay the same checked and unchecked */
                width: 27px;
            }

            .badgebox:focus + .badge
            {
                /* Set something to make the badge looks focused */
                /* This really depends on the application, in my case it was: */

                /* Adding a light border */
                box-shadow: inset 0px 0px 5px;
            }

            .badgebox:checked + .badge
            {
                /* Move the check mark back when checked */
                text-indent: 0;
            }

        </style>

        <style>
            .grid-container {
                display: grid;
                grid-template-columns: auto auto auto;
                padding: 10px;
            }
            .grid-item {

                border: 1px solid rgba(0, 0, 0, 0.8);
                padding: 20px;
                font-size: 30px;
                text-align: center;
            }
         

        </style>
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
                 window.Laravel.url = '<?= route('notification')?>';
                 window.Laravel.broadcast = '<?=route('broadcast')?>';
            </script>
        <?php endif; ?>
    </head>
    <body class="ttr-opened-sidebar ttr-pinned-sidebar">
        <!-- header start -->
        <header class="ttr-header">
            <div class="ttr-header-wrapper">
                <!--sidebar menu toggler start -->
                <div class="ttr-toggle-sidebar ttr-material-button">
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
                                    <ul id="notify">
                                        <?php foreach (auth()->user()->unreadNotifications as $notification): ?>
                                            <li>                                               
                                                <span class="notification-icon dashbg-gray">
                                                    <a href="#" ><img alt="" src="{{asset('assets/images/testimonials/pic3.jpg')}}"></a>
                                                </span>
                                                <span class="notification-text">
                                                    <span><?= $notification->data['name'] ?> </span>
                                                    <?= $notification->data['message'] ?>
                                                </span> 
                                                <span class="notification-time">
                                                    <a href="#" class="fa fa-close"></a>
                                                    <span> 02:14</span>
                                                </span>

                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="#" class="ttr-material-button ttr-submenu-toggle"><span class="ttr-user-avatar"><img alt="" src="{{asset('assets/images/testimonials/pic3.jpg')}}" width="32" height="32"></span></a>
                            <div class="ttr-header-submenu">
                                <ul>
                                    <li><a href="<?= route('users.user.profile' ,$user->id)?>">My profile</a></li>
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
        <!-- Left sidebar menu start -->
        <div class="ttr-sidebar">
            <div class="ttr-sidebar-wrapper content-scroll">
                <!-- side menu logo start -->
                <div class="ttr-sidebar-logo">
                    <a href="#"><img alt="" src="{{asset('assets/images/logo.png')}}" width="122" height="27"></a>
                    <!-- <div class="ttr-sidebar-pin-button" title="Pin/Unpin Menu">
                            <i class="material-icons ttr-fixed-icon">gps_fixed</i>
                            <i class="material-icons ttr-not-fixed-icon">gps_not_fixed</i>
                    </div> -->
                    <div class="ttr-sidebar-toggle-button">
                        <i class="ti-arrow-left"></i>
                    </div>
                </div>
                <!-- side menu logo end -->
                <!-- sidebar menu start -->
                <nav class="ttr-sidebar-navi">
                    <ul>
                        <li>
                            <a href="<?php route('index') ?>" class="ttr-material-button">
                                <span class="ttr-icon"><i class="ti-home"></i></span>
                                <span class="ttr-label">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="courses.html" class="ttr-material-button">
                                <span class="ttr-icon"><i class="ti-book"></i></span>
                                <span class="ttr-label">Courses</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="ttr-material-button">
                                <span class="ttr-icon"><i class="ti-email"></i></span>
                                <span class="ttr-label">Mailbox</span>
                                <span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span>
                            </a>
                            <ul>
                                <li>
                                    <a href="<?= route('admin.mailbox') ?>" class="ttr-material-button"><span class="ttr-label">Mail Box</span></a>
                                </li>
                                <li>
                                    <a href="{{route('admin.mailcompose')}}" class="ttr-material-button"><span class="ttr-label">Compose</span></a>
                                </li>
                                <li>
                                    <a href="<?= route('admin.readmail') ?>" class="ttr-material-button"><span class="ttr-label">Mail Read</span></a>
                                </li>
                            </ul>
                        </li>



                        <li>
                            <a href="#" class="ttr-material-button">
                                <span class="ttr-icon"><i class="ti-email"></i></span>
                                <span class="ttr-label">Authorization</span>
                                <span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span>
                            </a>
                            <ul>
                                <li>
                                    <a href="{{route('users.index')}}" class="ttr-material-button"><span class="ttr-label">users</span></a>
                                </li>
                                <li>
                                    <a href="{{route('roles.index')}}" class="ttr-material-button"><span class="ttr-label">Roles</span></a>
                                </li>

                            </ul>
                        </li>
                        <li>
                            <a href="#" class="ttr-material-button">
                                <span class="ttr-icon"><i class="ti-calendar"></i></span>
                                <span class="ttr-label">Calendar</span>
                                <span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span>
                            </a>
                            <ul>
                                <li>
                                    <a href="basic-calendar.html" class="ttr-material-button"><span class="ttr-label">Basic Calendar</span></a>
                                </li>
                                <li>
                                    <a href="list-view-calendar.html" class="ttr-material-button"><span class="ttr-label">List View</span></a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="bookmark.html" class="ttr-material-button">
                                <span class="ttr-icon"><i class="ti-bookmark-alt"></i></span>
                                <span class="ttr-label">Bookmarks</span>
                            </a>
                        </li>
                        <li>
                            <a href="review.html" class="ttr-material-button">
                                <span class="ttr-icon"><i class="ti-comments"></i></span>
                                <span class="ttr-label">Review</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('add_deps')}}" class="ttr-material-button">
                                <span class="ttr-icon"><i class="ti-layout-accordion-list"></i></span>
                                <span class="ttr-label">Add Department</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="ttr-material-button">
                                <span class="ttr-icon"><i class="ti-user"></i></span>
                                <span class="ttr-label">My Profile</span>
                                <span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span>
                            </a>
                            <ul>
                                <li>
                                    <a href="user-profile.html" class="ttr-material-button"><span class="ttr-label">User Profile</span></a>
                                </li>
                                <li>
                                    <a href="teacher-profile.html" class="ttr-material-button"><span class="ttr-label">Teacher Profile</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="ttr-seperate"></li>
                    </ul>
                    <!-- sidebar menu end -->
                </nav>
                <!-- sidebar menu end -->
            </div>
        </div>
        <!-- Left sidebar menu end -->
        <main class="ttr-wrapper">
            @yield('content')

        </main>


        <div class="ttr-overlay"></div>

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
        <script src="{{asset('admin/assets/vendors/chart/chart.min.js')}}"></script>
        <script src="{{asset('admin/assets/js/admin.js')}}"></script>
        <script src='{{asset('admin/assets/vendors/calendar/moment.min.js')}}'></script>
        <script src='{{asset('admin/assets/vendors/calendar/fullcalendar.js')}}'></script>
        <script src='{{asset('admin/assets/vendors/switcher/switcher.js')}}'></script>

        <script  src="{{asset('admin/assets/vendors/file-upload/imageuploadify.min.js')}}"></script>
        <script>
                                                        $(document).ready(function() {

                                                        $('#calendar').fullCalendar({
                                                        header: {
                                                        left: 'prev,next today',
                                                                center: 'title',
                                                                right: 'month,agendaWeek,agendaDay,listWeek'
                                                        },
                                                                defaultDate: '2019-03-12',
                                                                navLinks: true, // can click day/week names to navigate views

                                                                weekNumbers: true,
                                                                weekNumbersWithinDays: true,
                                                                weekNumberCalculation: 'ISO',
                                                                editable: true,
                                                                eventLimit: true, // allow "more" link when too many events
                                                                events: [
                                                                {
                                                                title: 'All Day Event',
                                                                        start: '2019-03-01'
                                                                },
                                                                {
                                                                title: 'Long Event',
                                                                        start: '2019-03-07',
                                                                        end: '2019-03-10'
                                                                },
                                                                {
                                                                id: 999,
                                                                        title: 'Repeating Event',
                                                                        start: '2019-03-09T16:00:00'
                                                                },
                                                                {
                                                                id: 999,
                                                                        title: 'Repeating Event',
                                                                        start: '2019-03-16T16:00:00'
                                                                },
                                                                {
                                                                title: 'Conference',
                                                                        start: '2019-03-11',
                                                                        end: '2019-03-13'
                                                                },
                                                                {
                                                                title: 'Meeting',
                                                                        start: '2019-03-12T10:30:00',
                                                                        end: '2019-03-12T12:30:00'
                                                                },
                                                                {
                                                                title: 'Lunch',
                                                                        start: '2019-03-12T12:00:00'
                                                                },
                                                                {
                                                                title: 'Meeting',
                                                                        start: '2019-03-12T14:30:00'
                                                                },
                                                                {
                                                                title: 'Happy Hour',
                                                                        start: '2019-03-12T17:30:00'
                                                                },
                                                                {
                                                                title: 'Dinner',
                                                                        start: '2019-03-12T20:00:00'
                                                                },
                                                                {
                                                                title: 'Birthday Party',
                                                                        start: '2019-03-13T07:00:00'
                                                                },
                                                                {
                                                                title: 'Click for Google',
                                                                        url: 'http://google.com/',
                                                                        start: '2019-03-28'
                                                                }
                                                                ]
                                                        });
                                                        });
        </script>

        <script>
                            // Pricing add
                            function newMenuItem() {
                            var newElem = $('tr.list-item').first().clone();
                            newElem.find('input').val('');
                            newElem.appendTo('table#item-add');
                            }
                            if ($("table#item-add").is('*')) {
                            $('.add-item').on('click', function (e) {
                            e.preventDefault();
                            newMenuItem();
                            });
                            $(document).on("click", "#item-add .delete", function (e) {
                            e.preventDefault();
                            $(this).parent().parent().parent().parent().remove();
                            });
                            }
        </script>
        <script src="{{asset('admin/assets/vendors/summernote/summernote.js')}}"></script>

        <!-- include plugin -->
        <script>
                            $(document).ready(function() {
                            $('.summernote').summernote({
                            height: 300,
                                    tabsize: 2
                            });
                            $('input[type="file"]').imageuploadify();
                            });
        </script>

        <script>
                            $(document).ready(function () {
                            $('[data-toggle="tooltip"]').tooltip();
                            });
        </script>

        

    </body>
</html>

