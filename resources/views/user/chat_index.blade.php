@extends('user.header')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('userchat/style.css')}}">    
<link rel="stylesheet" type="text/css" href="{{asset('userchat/emoji.css')}}">
@endsection
@section('content')

<div class="ttr-sidebar-chat">

    <nav class="ttr-sidebar-nav-chat">
        <div class="toolbar">
            <div class="toptoolbar">
                <div class="Appname">
                    ChatApp
                </div>
                <div class="AppAction">
                    <u class="AppActionlist">
                        <li>
                            <a href="#" class="ttr-material-button"><i class="fa fa-search"></i></a>
                        </li>
                        <li>
                            <a href="#" class="ttr-material-button"><i class="fa fa-th"></i></a>
                        </li>
                    </u>
                </div>
            </div>

            <div id ="tabs" class="bottomtoolbar">
                <ul class="Tabs" id="Tabs">
                    <li class="Tabs__tab active Tab" ><a  id="tab_chat"  href="#">chat</a></li>
                    <li class="Tabs__tab Tab"><a id="tab_group" href="#">groups</a></li>
                    <li class="Tabs__tab Tab"><a id="tab_calls" href="#">calls</a></li>
                    <li class="Tabs__presentation-slider" role="presentation"></li>
                </ul>
            </div>

        </div>
        <!--Tab contant-->
        <div class="ttr-sidebar-wrapper content-scroll">
            <div id="chat" class="styleShow">
                <div class="_chat set_chat" id="pane-side">
                    <div tabindex="-1" data-tab="3">
                        <div class="">
                            <div class="chat chat_top" style="height: 1152px;">
                                <div class="chat_" style="transition: none 0s ease 0s; height: 65px; transform: translateY(0px);">
                                    <div tabindex="-1">
                                        <?php if ($users): ?>
                                            <?php foreach ($users as $user): ?>
                                                <?php if ($user != auth()->user()): ?>
                                                       
                                                    <div class="chat_item" id="user_sender">
                                                        <span id= "user_id" style="display: none"><?= $user->id ?></span>   
                                                        <div class="chat_user_image">
                                                            <div class="_3RWII" style="height: 44px; width: 44px;">
                                                                <img id="user_image" src="{{asset('assets/images/profile/next.jpg')}}">
                                                            </div>
                                                        </div>
                                                        <div class="_user_info" >
                                                            <div class="user_name_Chat">
                                                                <div class="_user_name_chat_set">
                                                                    <span class="_user_name_chat_n">
                                                                        <span id="user_name"  class="_user_text_name _user_text_name_dispaly _user_text_name_visiable"><?= $user->firstname . ' ' . $user->lastname ?></span>
                                                                        <div class="_2Ol0p"></div>
                                                                    </span>
                                                                </div>
                                                                <div class="_user_time" id="chat_date">Yesterday</div>
                                                            </div>
                                                            <div class="user_message">
                                                                <div class="user_message_text">
                                                                    <span class="user_message_text_flex"‬>
                                                                        <div class="user_message_text_flex2">
                                                                            <span data-icon="status-check" class="">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" 
                                                                                     viewBox="0 0 14 18" width="14" height="18">
                                                                                <path fill="currentColor"
                                                                                      d="M12.502 5.035l-.57-.444a.434.434 0 0 0-.609.076l-6.39 
                                                                                      8.198a.38.38 0 0 1-.577.039l-2.614-2.556a.435.435 0 
                                                                                      0 0-.614.007l-.505.516a.435.435 0 0 0 .007.614l3.887 
                                                                                      3.8a.38.38 0 0 0 .577-.039l7.483-9.602a.435.435 0 0 0-.075-.609z">

                                                                                </path>
                                                                                </svg>
                                                                            </span>
                                                                        </div>
                                                                        <span id="chat_message" class="_user_text_name _user_text_name_dispaly _user_text_name_visiable _message_text_display">Hello</span>
                                                                    </span>
                                                                </div>
                                                                <div class="user_count_text">
                                                                    <span id="chat_count" class="badge bade_chat"  data-count="0" >0</span>
                                                                </div>
                                                                <div class="_user_time">
                                                                    <span></span>
                                                                    <span></span>
                                                                    <span></span>
                                                                </div></div>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="groups" class="tabcontent">
                <h3>Groups</h3>
                <p>welcome to Groups</p> 
            </div>

            <div id="calls" class="tabcontent">
                <h3>Calls</h3>
                <p>Welcome to Calls.</p>
            </div>


        </div> 
        <!-- sidebar menu end -->
    </nav>
    <!-- sidebar menu end -->

</div>
<div class="chat_page" id="chat_main">
    <div class="user-bar">
        <div class="back">
            <i class="fa back"></i>
        </div>
        <span id= "user_id_bar" style="display: none"></span>  
        <div class="avatar">
            <img id="userimagebar" src="https://avatars2.githubusercontent.com/u/398893?s=128" alt="Avatar">
        </div>
        <div class="name">
            <span id="usernamebar">Hassan Elsaied</span>
            <span class="status">online</span>
        </div>
        <a class="actions more">

            <i class="zmdi zmdi-more-vert"></i>
        </a>
        <a class="actions more">
            <i class="fa fa-phone"></i>
        </a>
        <a class="actions more">
            <i class="fa fa-video-camera"></i>
        </a>
    </div>
    <div class="page_chat">

        <div class="conversation content-scroll">
            <div class="conversation-container" id="messageTextShow">

            </div>
        </div>


    </div>


</div>
<div class="chat_splash"></div>
    
<div class="footer-bottom footer_chat">
    <form class="conversation-compose" method="post" action="javascript:void(0)"id="messageForm">
        @csrf
        <a class="emoji" href="#emoji">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" id="smiley" x="3147" y="3209"><path fill-rule="evenodd" clip-rule="evenodd" d="M9.153 11.603c.795 0 1.44-.88 1.44-1.962s-.645-1.96-1.44-1.96c-.795 0-1.44.88-1.44 1.96s.645 1.965 1.44 1.965zM5.95 12.965c-.027-.307-.132 5.218 6.062 5.55 6.066-.25 6.066-5.55 6.066-5.55-6.078 1.416-12.13 0-12.13 0zm11.362 1.108s-.67 1.96-5.05 1.96c-3.506 0-5.39-1.165-5.608-1.96 0 0 5.912 1.055 10.658 0zM11.804 1.01C5.61 1.01.978 6.034.978 12.23s4.826 10.76 11.02 10.76S23.02 18.424 23.02 12.23c0-6.197-5.02-11.22-11.216-11.22zM12 21.355c-5.273 0-9.38-3.886-9.38-9.16 0-5.272 3.94-9.547 9.214-9.547a9.548 9.548 0 0 1 9.548 9.548c0 5.272-4.11 9.16-9.382 9.16zm3.108-9.75c.795 0 1.44-.88 1.44-1.963s-.645-1.96-1.44-1.96c-.795 0-1.44.878-1.44 1.96s.645 1.963 1.44 1.963z" fill="#7d8489"/></svg>
        </a>
        <input name="receiver_id" type="hidden"  autocomplete="off" autofocus>
        <input name ="current_id" type="hidden" value='<?= auth()->user()->id ?>' autocomplete="off" autofocus>
        <input name="message"     type="text" class="input-msg"  placeholder="Type a message" autocomplete="off" autofocus>
        <a href="#share" class="link">
            <i class="zmdi zmdi-link"></i>
        </a>
        <a class="photo" href="#camera">
            <i class="zmdi zmdi-camera"></i>
        </a>
        <button class="send" type="submit">
            <div class="circle">
                <i class="zmdi zmdi-mail-send"></i>
            </div>
        </button>
    </form>
</div>

<!-- contact area END -->
@endsection
@section('scripts')
<script src="{{asset('userchat/app-chat.js')}}"></script>
<script src="{{asset('userchat/emoji.js')}}"></script>
@endsection