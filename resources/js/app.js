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
    el: '#app',
});
var notifications = [];
var NOTIFICATIONS_TYPE = {
    newuser: 'App\\Notifications\\NewUserNotification',
    follow: 'App\\Notifications\\UserFollowed',
}

$(document).ready(function () {


    if (window.Laravel.userId) {

        $.get('' + window.Laravel.url + '', function (data) {
            window.console.log(data);
            addNotification(data);

        });

        var channel = window.Echo.private(`App.User.${Laravel.userId}`);
        Pusher.logToConsole = true;
        window.console.log(channel);
        channel.notification((notification) => {
            window.console.log(notification);
            addNotification([notification]);
        });
    }
});
function addNotification(newNotification) {
    notifications = newNotification;
    // show only last 5 notifications
    window.console.log('notifications:' + notifications);
    notifications.slice(0, 5);
    showNotification(notifications);


}

function showNotification(notifications) {
    var notificationsWrapper = $('#notification_list');
    var notificationsToggle = notificationsWrapper.find('a.ttr-submenu-toggle');
    var notificationsCountElem = notificationsToggle.find('#count');
    var notificationsCount = parseInt(notificationsCountElem.data('count'));
    var notificationsList = notificationsWrapper.find('#notify');
    if (notifications.length) {
        var htmllist = notifications.map(function (notification) {
            window.console.log('notification:' + notification);
            return  makeNotification(notification);
        });
        var oldnotifictions = notificationsList.html();
        window.console.log('htmllist' + htmllist);
        notificationsList.html(htmllist+oldnotifictions);
        notificationsCount = notificationsCount+1 ;
        var text = notificationsCount + ' New';
        notificationsCountElem.attr('data-count', notificationsCount);
        notificationsWrapper.find('.ttr-notify-text-top').text(text);
        notificationsWrapper.find('#count').text(notificationsCount);


    } else {
        notificationsList.html('<li class="dropdown-header">No notifications</li>');

    }

}
function makeNotification(notification) {
    var to = routeNotifiction(notification);
    var listitem = NotificationItem(notification);
    window.console.log('listitem' + listitem);
    return '<li><a href="' + to + '">' + listitem + '</a></li>';

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
                            
                                  <span class="notification-icon dashbg-gray">
                                       <img alt="" src='{{asset('assets/images/testimonials/pic3.jpg')}}'>
                                   </span>
                                  <span class="notification-text">
                                       <span>` + notification.data.follower_name + `</span> <br>`
                + message +
                `</span>
                                 <span class="notification-time">
                                 <a href="#" class="fa fa-close"></a>
                                 <span> 02:14</span></span>
                           `;
    } else if (notification.type === NOTIFICATIONS_TYPE.newuser) {
        var message = 'Registration Now by <br>' + notification.data.user_email;
        NotificationHtml = `
                             
                                  <span class="notification-icon dashbg-gray">
                                        <img alt="" src='{{asset('assets/images/testimonials/pic3.jpg')}}'>
                                   </span>
                                  <span class="notification-text">
                                       <span>` + notification.data.user_name + `</span> <br>`
                + message +
                `</span>
                                 <span class="notification-time">
                                 <a href="#" class="fa fa-close"></a>
                                 <span> 02:14</span></span>
                           `;
    }

    window.console.log('NotificationHtml' + NotificationHtml);
    return NotificationHtml;
}