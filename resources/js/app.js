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
var ChatsForReceive = [];
var MessagesForReceive = [];
var Chats = [];
var Messages = [];
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

        session_channel.listen('.App\\Events\\SessionEvent', (session) => {
            window.console.log('datapusher:' + session);
            var chat_channel = window.Echo.private(`chat.${session.session.id}`);
            window.console.log(chat_channel);
            chat_channel.listen('.App\\Events\\UserMessageEvent', (data) => {
                var chat = data.chat;
                var message = data.message;
                var ChatMessage = {chat, message};
                addMessage([ChatMessage]);
            });
        });
        Message();
    }
});
function firstsession() {
    var splash = $("#splash");
    var footer = $("#footer");
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
$(document).on('click', "#user_sender", function (event) {
    var mainchat = $("#chat_main");
    var footer = $("#footer");
    var splash = $("#splash");
    footer.removeClass('chat_main_hidden');
    splash.addClass('chat_main_hidden');
    var item = $(event.currentTarget);
    var image = item.find("#user_image").attr('src');
    var user_name = item.find("#user_name").text();
    var user_id = item.find("#user_id").text();
    bulidChatMain(user_id, user_name, image);
    var user_image_bar = $("#userimagebar");
    var user_id_bar = $("#user_id_bar")
    var form = document.querySelector('.conversation-compose');
    form.receiver_id.value = user_id;
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

    ReadMessages(user_id);
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

function parsedata(date_time) {
    var Value = '';
    var messageTimeDate = new Date(Date.parse(date_time, "dd/mm/yyyy HH:mm:ss"));
    var messageDay = messageTimeDate.getDate();
    var messageMonth = messageTimeDate.getMonth() + 1;
    var messageYear = messageTimeDate.getFullYear();
    var messaMint = messageTimeDate.getMinutes();
    var messageHour = messageTimeDate.getHours();
    var CurrentDataTime = new Date();
    var day = CurrentDataTime.getDate();
    var month = CurrentDataTime.getMonth() + 1;
    var year = CurrentDataTime.getFullYear();
    var time = CurrentDataTime.getTime();
    var diffYear = year - messageYear;
    var diffMonth = month - messageMonth;
    var diffDay = Math.abs(day - messageDay);
    if (diffMonth == 0 && diffYear == 0) {
        if (diffDay == 0) {
            Value = messageHour + ':' + messaMint;
        } else if (diffDay == 1) {
            Value = 'YesterDay';
        } else {
            Value = messageDay + '/' + messageMonth + '/' + messageYear;
        }

    } else if (diffMonth == 1 && diffYear == 0) {
        if (messageMonth == 2 && diffDay == 28) {
            Value = 'YesterDay';
        } else if (
                (messageMonth == 1 ||
                        messageMonth == 3 ||
                        messageMonth == 5 ||
                        messageMonth == 7 ||
                        messageMonth == 8 ||
                        messageMonth == 10 ||
                        messageMonth == 12) && diffDay) {

            Value = 'YesterDay';

        } else if (
                (messageMonth == 4 ||
                        messageMonth == 6 ||
                        messageMonth == 9 ||
                        messageMonth == 11) && diffDay == 29) {
            Value = 'YesterDay';

        } else {
            Value = messageDay + '/' + messageMonth + '/' + messageYear;
        }
    } else {
        Value = messageDay + '/' + messageMonth + '/' + messageYear;
    }
    return Value;
}

function addMessage(ChatMessage) {
    ChatsForReceive = window._.concat(ChatMessage, ChatsForReceive);
    showMessages(ChatsForReceive);
}
function showMessages(ChatsForReceive) {
    if (ChatsForReceive.length) {
        var Array = sort(ChatsForReceive);
        Chats = MutiArray(Array);
        window.console.log('SortChats:', Array);
        window.console.log('chats:', Chats);
        var userChat = Chats.map(function (chatsOfuser, index) {
            window.console.log('chatsOfuser:', chatsOfuser);
            window.console.log('chatsOfuserIndex:', index);
            MessageUnReadItem(chatsOfuser, index);
        });

    }


}
function MessageUnReadItem(chatsOfuser, index) {
    var ALLItems = $("#lsit_users");
    var Itemlist = ALLItems.find('div[id="user_sender"]');
    Itemlist.each(function () {
        var userId = $(this).find("#user_id").text();
        var id = parseInt(userId);
        var username = $(this).find("#user_name").text();
        if (index == id) {
            chatsOfuser.map(function (chatmessage) {
                DataItem(chatmessage.chat, chatmessage.message, username);
            });
        }
    });
}


function updateItemData(Item, message, chat) {
    var user_id = Item.find("#user_id").text();
    var messageText = Item.find("#chat_message");
    var date_time = Item.find("#chat_date");
    var count = Item.find("#chat_count");
    var dataTime = parsedata(message.messageTime);
    messageText.text(message.message);
    window.console.log('messagetime:' + dataTime);
    date_time.text(dataTime);
    if (chat.read == 0 || chat.type == MESSAGE_TYPE.MessageSend) {
        date_time.addClass('dateTimeColor');
        count.text(Chats[user_id].length);
        count.css('display', 'block');
    } else if (chat.read == 1 || chat.type == MESSAGE_TYPE.MessageReceive) {
        date_time.removeClass('dateTimeColor');
        count.css('display', 'none');
    }

}


function addItem(chat, message, username) {
    var listChatItem = $("#startchat");
    var dataTime = parsedata(message.messageTime);
    var message = message.message;
    var HtmlItem = [];
    if (chat.type == MESSAGE_TYPE.MessageSend) {
        HtmlItem = `
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
 <div class="_user_time dateTimeColor" id="chat_date">` + dataTime + `</div>
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
 <span id="chat_message" class="_user_text_name _user_text_name_dispaly _user_text_name_visiable _message_text_display">` + message + `</span>
 </span>
 </div>
 <div class="user_count_text">
 <span id="chat_count" class="badge bade_chat"  data-count="0" >` + Chats[chat.user_id].length + `</span>
 </div>
 <div class="_user_time">
 <span></span>
 <span></span>
 <span></span>
 </div></div>
 </div>
 </div>`;
    } else if (MESSAGE_TYPE.MessageReceive) {
        HtmlItem = `
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
 <div class="_user_time dateTimeColor" id="chat_date">` + dataTime + `</div>
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
 <span id="chat_message" class="_user_text_name _user_text_name_dispaly _user_text_name_visiable _message_text_display">` + message + `</span>
 </span>
 </div>
 <div class="user_count_text">
 <span id="chat_count" class="badge bade_chat" style="display:none;" data-count="0" >` + Chats[chat.user_id].length + `</span>
 </div>
 <div class="_user_time">
 <span></span>
 <span></span>
 <span></span>
 </div></div>
 </div>
 </div>`;
    }
    listChatItem.append(HtmlItem);
}
function DataItem(chat, message, username) {
    var finditem;
    var ListChatItems = $("#startchat");
    var Item = ListChatItems.find('div[id="user_sender"]');
    if (!ListChatItems.html().length) {
        window.console.log('nolist');
        addItem(chat, message, username);
        finditem = false;
    } else {
        var FoundItem = Item.filter(function () {
            var userId = $(this).find("#user_id").text();
            var id = parseInt(userId);
            return chat.user_id == id;
        });
        if (FoundItem.length) {
            updateItemData(FoundItem, message, chat);
            finditem = true;
        } else {
            addItem(chat, message, username);
            finditem = false;
        }
    }

    return finditem;
}



function Message() {
    var url = window.Laravel.getUnReadMessage;
    var listusers = $("#lsit_users");
    listusers.find('div[id="user_sender"]').each(function (index) {
        var userId = $(this).find("#user_id").text();
        var username = $(this).find("#user_name").text();
        var unReadMessages = url.replace(':id', userId);
        window.console.log('unReadMessage:' + unReadMessages);
        $.get('' + unReadMessages, function (data) {
            window.console.log('unreadData:', data);
            if (data) {
                var dataMessages = [];
                for (var i = 0; i < data.ChatsForReceive.length; i++) {
                    var chat = data.ChatsForReceive[i];
                    var message = data.MessagesForReceive[i];
                    var ChatMessage = {chat, message};
                    dataMessages = window._.concat(ChatMessage, dataMessages);

                }
                addMessage(dataMessages);
            }
        });
    });
}
function MutiArray(array) {
    var ChatMessages = [];
    var i = 0, count = 0;
    var length = array.length;
    if (length > 1) {
        for (i = 1; i < length; i++) {
            if (array[i - 1].chat.user_id != array[i].chat.user_id) {

                var NewArray = [];
                for (var j = count; j < i; j++) {
                    var chat = array[j];
                    NewArray = window._.concat(array[j], NewArray);
                }
                count = i;
                window.console.log('count:' + count);
                ChatMessages[array[i - 1].chat.user_id] = NewArray;
            }

            if (i == length - 1) {

                var NewArray = [];
                window.console.log('countend:' + count);
                for (var j = count; j < length; j++) {

                    NewArray = window._.concat(array[j], NewArray);

                }
                ChatMessages[array[i].chat.user_id] = NewArray;
            }

        }
    } else {
        ChatMessages[array[0].chat.user_id] = array;
    }

    return ChatMessages;
}

function sort(Array) {
    var len = Array.length,
            i, j, stop;
    if (len > 1) {
        for (i = 0; i < len; i++) {
            for (j = 1, stop = len - i; j < stop; j++) {
                if (Array[j - 1].chat.user_id > Array[j].chat.user_id) {
                    swap(Array, j - 1, j);

                }
            }
        }
    }
    return Array;
}
function swap(array, firstIndex, lastIndex) {
    var temp = array[firstIndex];
    array[firstIndex] = array[lastIndex];
    array[lastIndex] = temp;
}
function ReadMessages(user_id) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var url = window.Laravel.getReadMessages.replace(':id', user_id);
    $.post('' + url, {read: 1}, function (data) {
        var messageRead = [];
        for (var i = 0; i < data.chats.length; i++) {
            var chat = data.chats[i];
            var message = data.messages[i];
            var messages = {chat, message};
            messageRead = window._.concat(messages, messageRead);
        }
        window.console.log(messageRead);
        addMessageRead(messageRead);
    });

}

function addMessageRead(newMessage) {
    showReadMessage(newMessage);
}
function showReadMessage(Messages) {
    var conversation = document.querySelector('.conversation-container');
    Messages.map(function (message) {
        var view = readmessageView(message);
        conversation.appendChild(view);
    });

}
function buildMessage(message) {
    var element = document.createElement('div');
    element.classList.add('message', 'sent');
    element.innerHTML = message.message +
            `<span class="metadata">
            <span class="time">` + message.messageTime + `  </span>
            <span class="tick tick-animation">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" id="msg-dblcheck" x="2047" y="2061"><path d="M15.01 3.316l-.478-.372a.365.365 0 0 0-.51.063L8.666 9.88a.32.32 0 0 1-.484.032l-.358-.325a.32.32 0 0 0-.484.032l-.378.48a.418.418 0 0 0 .036.54l1.32 1.267a.32.32 0 0 0 .484-.034l6.272-8.048a.366.366 0 0 0-.064-.512zm-4.1 0l-.478-.372a.365.365 0 0 0-.51.063L4.566 9.88a.32.32 0 0 1-.484.032L1.892 7.77a.366.366 0 0 0-.516.005l-.423.433a.364.364 0 0 0 .006.514l3.255 3.185a.32.32 0 0 0 .484-.033l6.272-8.048a.365.365 0 0 0-.063-.51z" fill="#92a58c"/></svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" id="msg-dblcheck-ack" x="2063" y="2076"><path d="M15.01 3.316l-.478-.372a.365.365 0 0 0-.51.063L8.666 9.88a.32.32 0 0 1-.484.032l-.358-.325a.32.32 0 0 0-.484.032l-.378.48a.418.418 0 0 0 .036.54l1.32 1.267a.32.32 0 0 0 .484-.034l6.272-8.048a.366.366 0 0 0-.064-.512zm-4.1 0l-.478-.372a.365.365 0 0 0-.51.063L4.566 9.88a.32.32 0 0 1-.484.032L1.892 7.77a.366.366 0 0 0-.516.005l-.423.433a.364.364 0 0 0 .006.514l3.255 3.185a.32.32 0 0 0 .484-.033l6.272-8.048a.365.365 0 0 0-.063-.51z" fill="#4fc3f7"/></svg>
            </span> 
            </span>`;
    return element;
}
function ReadMessageIcone() {
    setTimeout(function (message) {
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
                <span class="time">` + message.messageTime + `</span>
             </span>`;
    return element;
}
function readmessageView(chatmessage) {
    var chat = chatmessage.chat;
    var message = chatmessage.message;
    var view = '';
    if (chat.type == MESSAGE_TYPE.MessageSend) {
        view = buildMessagereceived(message);

    } else if (chat.type == MESSAGE_TYPE.MessageReceive) {
        view = buildMessage(message);
    }

    return view;
}

function bulidChatMain(user_id, username, image) {
    var Html = `
<div class="user-bar">
        <div class="back">
            <i class="fa back"></i>
        </div>
        <span id= "user_id_bar" style="display: none">` + user_id + `</span>  
        <div class="avatar">
            <img id="userimagebar" src="` + image + `" alt="Avatar">
        </div>
        <div class="name">
            <span id="usernamebar">` + username + `</span>
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
`;
    var chatmain = $("#chat_main");
    chatmain.html(Html);
}