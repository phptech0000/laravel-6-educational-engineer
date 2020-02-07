@extends('Dashboard.main.header')
@section('content')
<div class="container-fluid">
    <div class="db-breadcrumb">
        <h4 class="breadcrumb-title">Mail Read</h4>
        <ul class="db-breadcrumb-list">
            <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
            <li>Mail Read</li>
        </ul>
    </div>	
    <div class="row">
        <!-- Your Profile Views Chart -->
        <div class="col-lg-12 m-b30">
            <div class="widget-box">
                <div class="email-wrapper">
                    <div class="email-menu-bar">
                        <div class="compose-mail">
                            <a href="mailbox-compose.html" class="btn btn-block">Compose</a>
                        </div>
                        <div class="email-menu-bar-inner">
                            <ul>
                                <li class="active"><a href="mailbox.html"><i class="fa fa-envelope-o"></i>Inbox <span class="badge badge-success">8</span></a></li>
                                <li><a href="mailbox.html"><i class="fa fa-send-o"></i>Sent</a></li>
                                <li><a href="mailbox.html"><i class="fa fa-file-text-o"></i>Drafts <span class="badge badge-warning">8</span></a></li>
                                <li><a href="mailbox.html"><i class="fa fa-cloud-upload"></i>Outbox <span class="badge badge-danger">8</span></a></li>
                                <li><a href="mailbox.html"><i class="fa fa-trash-o"></i>Trash</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="mail-list-container">
                        <div class="mail-toolbar">
                            <div class="mail-search-bar">
                                <input type="text" class="form-control" placeholder="Search"/>
                            </div>
                            <div class="dropdown all-msg-toolbar">
                                <span class="btn btn-info-icon" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></span>
                                <ul class="dropdown-menu">
                                    <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
                                    <li><a href="#"><i class="fa fa-arrow-down"></i> Archive</a></li>
                                    <li><a href="#"><i class="fa fa-clock-o"></i> Snooze</a></li>
                                    <li><a href="#"><i class="fa fa-envelope-open"></i> Mark as unread</a></li>
                                </ul>
                            </div> 
                            <div class="next-prev-btn">
                                <a href="#"><i class="fa fa-angle-left"></i></a>
                                <a href="#"><i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                        <div class="mailbox-view">
                            <div class="mailbox-view-title">
                                <h5 class="send-mail-title">Your message title goes here</h5>
                            </div>
                            <div class="send-mail-details">
                                <div class="d-flex">
                                    <div class="send-mail-user">
                                        <div class="send-mail-user-pic">
                                            <img src="assets/images/testimonials/pic3.jpg" alt="">
                                        </div>
                                        <div class="send-mail-user-info">
                                            <h4>Pavan kumar</h4>
                                            <h5>From: example@info.com</h5>
                                        </div>
                                    </div>
                                    <div class="ml-auto send-mail-full-info">
                                        <div class="time"><span>10:25 PM</span></div>
                                        <span class="btn btn-info-icon">Reply</span>
                                        <div class="dropdown all-msg-toolbar ml-auto">
                                            <span class="btn btn-info-icon" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></span>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
                                                <li><a href="#"><i class="fa fa-arrow-down"></i> Archive</a></li>
                                                <li><a href="#"><i class="fa fa-clock-o"></i> Snooze</a></li>
                                                <li><a href="#"><i class="fa fa-envelope-open"></i> Mark as unread</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="read-content-body">
                                    <h5 class="read-content-title">Hi,Ingredia,</h5>
                                    <p><strong>Ingredia Nutrisha,</strong> A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there hung a picture</p>
                                    <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of
                                        Grammar. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.
                                    </p>
                                    <p>Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet.
                                        Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero,
                                        sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar,</p>

                                    <h5 class="read-content-title">Kind Regards</h5>
                                    <p class="read-content-name">Mr Smith</p>
                                    <hr>
                                    <h6> <i class="fa fa-download m-r5"></i> Attachments <span>(3)</span></h6>
                                    <div class="mailbox-download-file">
                                        <a href="#"><i class="fa fa-file-image-o"></i> photo.png</a>
                                        <a href="#"><i class="fa fa-file-text-o"></i> dec.text</a>
                                        <a href="#"><i class="fa fa-file"></i> video.mkv</a>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <h6>Reply Message</h6>
                                        <div class="m-b15">
                                            <textarea class="form-control"> </textarea>
                                        </div>
                                        <button class="btn">Reply Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        <!-- Your Profile Views Chart END-->
    </div>
</div>
@endsection