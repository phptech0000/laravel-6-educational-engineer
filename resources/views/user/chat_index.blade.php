
@extends('user.header')
@section('content')
<!-- Left sidebar menu start -->
<div class="ttr-sidebar-chat">

    <!--  TabLayout in chat-->
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
                                        <div class="chat_item">
                                            <div class="chat_user_image">
                                                <div class="_3RWII" style="height: 44px; width: 44px;">
                                                    <img src="{{asset('assets/images/profile/next.jpg')}}">
                                                </div>
                                            </div>
                                            <div class="_user_info" >
                                                <div class="user_name_Chat">
                                                    <div class="_user_name_chat_set">
                                                        <span class="_user_name_chat_n">
                                                            <span  class="_user_text_name _user_text_name_dispaly _user_text_name_visiable">Hassan Elsaied</span>
                                                            <div class="_2Ol0p"></div>
                                                        </span>
                                                    </div>
                                                    <div class="_user_time">Yesterday</div>
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
                                                            <span  class="_user_text_name _user_text_name_dispaly _user_text_name_visiable _message_text_display">Hello</span>
                                                        </span>
                                                    </div>
                                                    <div class="_user_time">
                                                        <span></span>
                                                        <span></span>
                                                        <span></span>
                                                    </div></div>
                                            </div>
                                        </div>
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
<!-- Left sidebar menu end -->

@end@section