/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');
window._ = require('lodash');
window.$ = window.jQuery = require('jquery');
window.Bus = new Vue();
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});
var notifications = [];
var MESSAGE_TYPE = {
    MessageSend: 0,
    MessageReceive: 1
}
var NOTIFICATIONS_TYPE = {
    newuser: 'App\\Notifications\\NewUserNotification',
    follow: 'App\\Notifications\\UserFollowed',
}

$(document).ready(function () {

    window.Vue.config.devtools = true;
    if (window.Laravel.userId) {

        $.get('' + window.Laravel.url + '', function (data) {
            window.console.log(data);
            addNotification(data);
            window.console.log(data);
        });
        var channel = window.Echo.private(`App.User.${Laravel.userId}`);
        window.console.log(channel);
        channel.notification((notification) => {
            window.console.log('notification:' + notification);
            addNotification([notification]);
        });
        firstsession();
        Pusher.logToConsole = true;
        var session_channel = window.Echo.private('chat');
        window.console.log(session_channel);
       
        session_channel.listen('.App\\Events\\SessionEvent', (data) => {
            window.console.log('datapusher:' + data);
            var chat_channel = window.Echo.private(`chat.${data.session.id}`);
            window.console.log(chat_channel);
            chat_channel.listen('.App\\Events\\UserMessageEvent', (data) => {
                addMessage([data.chat], data.message,'Hassan');
            });
        });
        getUnReadMessage();
    }






});
function firstsession() {
    var mainchat = $("#chat_main");
    var footer = $("#footer");
    var splash = $("#splash");
    mainchat.addClass('chat_main_hidden');
    footer.addClass('chat_main_hidden');
    splash.removeClass('chat_main_hidden');
}
function addNotification(newNotification) {
    notifications = window._.concat(newNotification, notifications);
    // show only last 5 notifications
    window.console.log('notifications:' + notifications);
    showNotification(notifications);
}
function showNotification(notifications) {
    var notificationsWrapper = $('#notification_list');
    var notificationsToggle = notificationsWrapper.find('a.ttr-submenu-toggle');
    var notificationsCountElem = notificationsToggle.find('#count');
    var notificationsCount = parseInt(notificationsCountElem.data('count'));
    var notificationsList = notificationsWrapper.find('#notify');
    var oldnotifictions = notificationsList.html();
    if (notifications.length) {
        var htmllist = notifications.map(function (notification) {
            window.console.log('notification:' + notification);
            return  makeNotification(notification);
        });
        notificationsList.html(htmllist);
        notificationsCount = notifications.length;
        var text = notificationsCount + ' New';
        notificationsCountElem.show();
        notificationsCountElem.attr('data-count', notificationsCount);
        notificationsWrapper.find('.ttr-notify-text-top').text(text);
        notificationsWrapper.find('#count').text(notificationsCount);
    } else {
        notificationsList.html(`
                     <li> 
                       <span class="new-users-top-text">
                               <span>No Notifications</span>
                         </span>
                     </li>`
                );
        notificationsCountElem.hide();
    }

}
function makeNotification(notification) {
    var to = routeNotifiction(notification);
    var listitem = NotificationItem(notification);
    return '<li id="item">' + listitem + '</li>';
}
function routeNotifiction(notification) {
    var to = '?read' + notification.id;
    if (notification.type === NOTIFICATIONS_TYPE.follow) {
        to = 'user.' + to;
    } else if (notification.type === NOTIFICATIONS_TYPE.newuser) {

        to = 'user.' + to;
    }
    return '/' + to;
}

function NotificationItem(notification) {
    var NotificationHtml = '';
    if (notification.type === NOTIFICATIONS_TYPE.follow) {
        var message = 'followed You';
        NotificationHtml = `
                                                 <span class="new-users-top-text">
                                                                <span>` + notification.data.date + `</span>
                                                                <span id= "notification_id" style=" display: none;"">` + notification.id + `</span>
                                                            </span>
                                                            <span class="new-users-pic">
                                                                <img src="assets/images/testimonials/pic1.jpg" alt=""/>
                                                            </span>
                                                            <span class="new-users-text">
                                                                <a href="#" class="new-users-name">` + notification.data.follower_name + `</a>
                                                                <span class="new-users-info">` + message + ` </span>
                                                            </span>
                                                            <span class="notification-time">
                                                             <a id="delete" href="#"><i class="fa fa-close"></i></a>
                                                            </span>`;
    } else if (notification.type === NOTIFICATIONS_TYPE.newuser) {
        var message = 'Registration Now by ' + notification.data.user_email;
        NotificationHtml = `
                   <span class="new-users-top-text">
                       <span>` + notification.data.date + `</span>
                       <span id = "notification_id" style=" display: none;"">` + notification.id + `</span>
                    </span>
                    <span class="new-users-pic">
                       <img src="assets/images/testimonials/pic1.jpg" alt=""/>
                    </span>
                     <span class="new-users-text">
                        <a href="#" class="new-users-name">` + notification.data.user_name + `</a>
                        <span class="new-users-info">` + message + ` </span>
                    </span>
                    <span class="notification-time">
                        	<a id="delete" href="#"><i class="fa fa-close"></i></a>
                    </span>`;
    }

    return NotificationHtml;
}
$(document).on('click', '#notify  #delete', function (event) {
    var notificationsWrapper = $('#notification_list');
    var notificationsToggle = notificationsWrapper.find('a.ttr-submenu-toggle');
    var notificationsCountElem = notificationsToggle.find('#count');
    var notificationsCount = parseInt(notificationsCountElem.data('count'));
    var notificationsList = notificationsWrapper.find('#notify');
    var item = $(event.currentTarget).parents('#item');
    var id = item.find('#notification_id').text();
    window.console.log('id:' + id);
    var id_url = window.Laravel.deleteNotification.replace(':id', id);
    window.console.log('url:' + id_url);
    $.get('' + id_url + '', function () {
        if (item) {
            window.console.log('befor notifications:' + notifications.length);
            RemoveFromArray(notifications, id);
            window.console.log('after notifications:' + notifications.length);
            item.remove();
            notificationsCount = notifications.length;
            var text = notificationsCount + ' New';
            notificationsCountElem.show();
            notificationsCountElem.attr('data-count', notificationsCount);
            notificationsWrapper.find('.ttr-notify-text-top').text(text);
            notificationsWrapper.find('#count').text(notificationsCount);
            if (notifications.length === 0) {
                notificationsCountElem.hide();
                notificationsList.html(`
                     <li> 
                       <span class="new-users-top-text">
                               <span>No Notifications</span>
                         </span>
                     </li>`
                        );
            }
        }
    });
});
function RemoveFromArray(notificationArray, id) {
    for (var i = 0; i < notificationArray.length; i++) {
        window.console.log('id:' + notificationArray[i].id);
        if (notificationArray[i].id === id) {
            window.console.log('index:' + i);
            notificationArray.splice(i, 1);
            break;
        }
    }
}
$(document).on('click', "#user_sender", function (event) {
    var mainchat = $("#chat_main");
    var footer = $("#footer");
    var splash = $("#splash");
    mainchat.removeClass('chat_main_hidden');
    footer.removeClass('chat_main_hidden');
    splash.addClass('chat_main_hidden');
    var item = $(event.currentTarget);
    var image = item.find("#user_image").attr('src');
    var user_name = item.find("#user_name").text();
    var user_id = item.find("#user_id").text();
    sender_id = user_id;
    var user_name_bar = $("#usernamebar");
    var user_image_bar = $("#userimagebar");
    var user_id_bar = $("#user_id_bar")
    var form = document.querySelector('.conversation-compose');
    form.receiver_id.value = user_id;
    user_id_bar.text(user_id);
    user_image_bar.attr("src", image);
    user_name_bar.text(user_name);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var createsession = window.Laravel.createsession;
    $.post('' + createsession + '',
            {
                receiver_id: user_id,
            },
            function (data) {

                window.console.log('data:' + data);
            });
});
$(document).on('submit', "#messageForm", function (event) {
    var message = newMessage(event);
    var session = window.Laravel.getsession;
    var sender_id = event.target.current_id.value;
    var receiver_id = event.target.receiver_id.value;
    session = session.replace(':sender_id', sender_id);
    session = session.replace(':receiver_id', receiver_id);
    window.console.log('session_ulr:' + session);
    var session_id = '';
    $.get('' + session + '', function (data) {
        window.console.log('session.id:', data.session.id);
        var message_post = window.Laravel.sendmessage;
        var url_message_post = message_post.replace(":sessionid", data.session.id);
        window.console.log('url_message_post:', url_message_post);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.post('' + url_message_post + '',
                {
                    receiver_id: receiver_id,
                    current_id: sender_id,
                    message: message,
                },
                function (data) {


                }
        ).error(function (data) {
            var errors = $.parseJSON(data.responseText);
            $.each(errors, function (key, value) {
                $('#' + key).parent().addClass('error');
            });
        });
    });
});
function newMessage(e) {
    var conversation = document.querySelector('.conversation-container');
    var input = e.target.message;
    if (input.value) {
        var message = buildMessage(input.value);
        conversation.appendChild(message);
    }
    var message = input.value;
    input.value = '';
    conversation.scrollTop = conversation.scrollHeight;
    e.preventDefault();
    return message;
}
function buildMessage(text) {
    var element = document.createElement('div');
    element.classList.add('message', 'sent');
    element.innerHTML = text +
            '<span class="metadata">' +
            '<span class="time"> 2:25 </span>' +
            '<span class="tick tick-animation">' +
            '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" id="msg-dblcheck" x="2047" y="2061"><path d="M15.01 3.316l-.478-.372a.365.365 0 0 0-.51.063L8.666 9.88a.32.32 0 0 1-.484.032l-.358-.325a.32.32 0 0 0-.484.032l-.378.48a.418.418 0 0 0 .036.54l1.32 1.267a.32.32 0 0 0 .484-.034l6.272-8.048a.366.366 0 0 0-.064-.512zm-4.1 0l-.478-.372a.365.365 0 0 0-.51.063L4.566 9.88a.32.32 0 0 1-.484.032L1.892 7.77a.366.366 0 0 0-.516.005l-.423.433a.364.364 0 0 0 .006.514l3.255 3.185a.32.32 0 0 0 .484-.033l6.272-8.048a.365.365 0 0 0-.063-.51z" fill="#92a58c"/></svg>' +
            '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" id="msg-dblcheck-ack" x="2063" y="2076"><path d="M15.01 3.316l-.478-.372a.365.365 0 0 0-.51.063L8.666 9.88a.32.32 0 0 1-.484.032l-.358-.325a.32.32 0 0 0-.484.032l-.378.48a.418.418 0 0 0 .036.54l1.32 1.267a.32.32 0 0 0 .484-.034l6.272-8.048a.366.366 0 0 0-.064-.512zm-4.1 0l-.478-.372a.365.365 0 0 0-.51.063L4.566 9.88a.32.32 0 0 1-.484.032L1.892 7.77a.366.366 0 0 0-.516.005l-.423.433a.364.364 0 0 0 .006.514l3.255 3.185a.32.32 0 0 0 .484-.033l6.272-8.048a.365.365 0 0 0-.063-.51z" fill="#4fc3f7"/></svg>' +
            '</span>' +
            '</span>';
    return element;
}
function ReadMessage(message) {
    setTimeout(function () {
        var tick = message.querySelector('.tick');
        tick.classList.remove('tick-animation');
    }, 500);
}
function buildMessagereceived(message) {
    var element = document.createElement('div');
    element.classList.add('message', 'received');
    element.innerHTML =
            `<span id="random">` + message.message + `</span>
             <span class="metadata">
                <span class="time">3:20PM</span>
             </span>`;
    return element;
}
var chats = [];
function parsedata(date_time) {
    var Value = '';
    var index = date_time.indexOf('-');

    var date = date_time.substring(0, index);
    var time = date_time.substring(index + 1, date_time.length);
    var CurrentDataTime = new Date();
    var day = CurrentDataTime.getDate()
    if (day < 10) {
        day = '0' + day;
    }
    var month = CurrentDataTime.getMonth() + 1;
    if (month < 10) {
        month = '0' + month;
    }
    var year = CurrentDataTime.getFullYear();
    var CurrentDate = day + '/' + month + '/' + year;
    var char = new RegExp('/', 'g');
    var dateInt = date.replace(char, '');
    var currentdateInt = CurrentDate.replace(char, '');
    var dateInteger = parseInt(dateInt);
    window.console.log('dateInteger', dateInteger);
    var currentdateInteger = parseInt(currentdateInt);
    window.console.log('currentdateInteger', currentdateInteger);
    var diff = currentdateInteger - dateInteger;
    window.console.log('diff', diff);
    if (diff == 0) {
        Value = time;
    } else if (diff == 1) {
        Value = "Yesterday";
    } else if (diff > 1) {
        Value = date;
    }

    return Value;
}
function getUnReadMessage() {
    var url = window.Laravel.getUnReadMessage;
    var listusers = $("#lsit_users");
    listusers.find('div[id="user_sender"]').each(function (index) {
        var userId = $(this).find("#user_id").text();
        var username = $(this).find("#user_name").text();
        var unReadMessages = url.replace(':id', userId);
        window.console.log('unReadMessage:' + unReadMessages);
        $.get('' + unReadMessages, function (data) {
            var message = data.message[0];
            var chat = data.chats;
            window.console.log('chats:', chat.length);
            addMessage(chat, message, username);
        });
    });
}

function addMessage(chat, message, username) {
    var chats = [];
    chats = window._.concat(chat, chats);
    showMessage(chats, message, username);
}
function showMessage(chats, message, username) {
    var listChatItem = $("#startchat");
    var i =0;
    if (chats.length) {
      for(i=0;i<chats.length;i++){
         var Html = chatIII(chats[i] , message , chats,username);
         listChatItem.append(Html);
      }
    } else {
        listChatItem.html('no have any chat');
    }
}



function bulidchatItem(chat, message, chats, username) {
    var HtmlItem = '';
    var dataTime = parsedata(message.messageTime);
    window.console.log('dataTime:' + dataTime);
    if (chat.type == MESSAGE_TYPE.MessageSend) {
        if (chat.read == 0) {
            var booleanItem = findItem(chat.user_id);
            if (booleanItem === true) {
                updataItem(chat, message, chats);
                HtmlItem='';
            } else {
                HtmlItem =
                        `
<div class="chat_item" id="user_sender">
 <span id= "user_id" style="display:none;">` + chat.user_id + `</span>   
 <div class="chat_user_image">
 <div class="_3RWII" style="height: 44px; width: 44px;">
 <img id="user_image" src="../assets/images/profile/next.jpg">
 </div>
 </div>
 <div class="_user_info" >
 <div class="user_name_Chat">
 <div class="_user_name_chat_set">
 <span class="_user_name_chat_n">
 <span id="user_name"  class="_user_text_name _user_text_name_dispaly _user_text_name_visiable">` + username + `</span>
 <div class="_2Ol0p"></div>
 </span>
 </div>
 <div class="_user_time" id="chat_date">` + dataTime + `</div>
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
 <span id="chat_message" class="_user_text_name _user_text_name_dispaly _user_text_name_visiable _message_text_display">` + message.message + `</span>
 </span>
 </div>
 <div class="user_count_text">
 <span id="chat_count" class="badge bade_chat"  data-count="0" >` + chats.length + `</span>
 </div>
 <div class="_user_time">
 <span></span>
 <span></span>
 <span></span>
 </div></div>
 </div>
 </div>

`
            }
        }
//        else if (chat.read == 1) {
//
//
//        }
    }
//    else if (chat.type == MESSAGE_TYPE.MessageReceive) {
//
//    }

    return HtmlItem;
}
function chatIII(chat, message, chats, username) {
    var chatItem = bulidchatItem(chat, message, chats, username);
    return '<div tabindex="-1">' + chatItem + '</div>';
}
function findItem(id) {
    var bool;
    window.console.log('id:', id);
    var listChatItem = $('#startchat div[id="user_sender"]');
    var exist = listChatItem.filter(function () {
        var userId = $(this).find("#user_id").text();
        window.console.log('user:' + userId);
        return userId == id;
    });
    window.console.log('exit:'+exist.text());
    if (!exist.length) {
        bool = false;

    } else {
        bool = true;
    }
    window.console.log('boolean:' + bool);
    return bool;
}
function updataItem(chat, message, chats) {
    var listChatItem = $("#startchat");
    var item = listChatItem.find('div[id="user_sender"]');
    item.each(function () {
        var user_id = $(this).find("#user_id").text();
        var message = $(this).find("#chat_message");
        var date_time = $(this).find("#chat_date");
        var count = $(this).find("#chat_count");
        if (chat.user_id == user_id) {
            message.text(message.message);
            var date = parsedata(message.messageTime);
            date_time.text(date);
            count.text(chats.length);
            window.console.log('message.message' + message.message);
        }
    });
}