
@extends('Dashboard.main.header')
@section('content')

<div class="container-fluid">
    <div class="db-breadcrumb">
        <h4 class="breadcrumb-title">Compose</h4>
        <ul class="db-breadcrumb-list">
            <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
            <li>Compose</li>
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
                        <form class="mail-compose">
                            <div class="form-group col-12">
                                <input class="form-control" type="email" placeholder="To">
                            </div>
                            <div class="form-group col-12">
                                <input class="form-control" type="email" placeholder="CC">
                            </div>
                            <div class="form-group col-12">
                                <input class="form-control" type="text" placeholder="Subject">
                            </div>
                            <div class="form-group col-12">
                                <div class="summernote"><p>Hello World</p></div>
                            </div>
                            <div class="form-group col-12">
                                <input type="file" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple>
                            </div>
                            <div class="form-group col-12">
                                <button type="submit" class="btn btn-lg">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> 
        </div>
        <!-- Your Profile Views Chart END-->
    </div>
</div>
@endsection
