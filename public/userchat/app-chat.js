/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



var tablayout = document.getElementsByClassName("tablayout");
$(document).ready(function () {
    var tabs = document.getElementsByClassName('Tab');
    Array.prototype.forEach.call(tabs, function (tab) {
        tab.addEventListener('click', setActiveClass);
    });

    function setActiveClass(evt) {
        Array.prototype.forEach.call(tabs, function (tab) {
            tab.classList.remove('active');
        });

        evt.currentTarget.classList.add('active');
    }
$("#main").removeClass("ttr-wrapper");
$("#main").addClass("ttr-wrapper-chat");

   
    if ($(window).width() < 760) {
        window.console.log('width:' + $(window).width());
        var width = $(window).width();
        $('.ttr-sidebar-chat').width(width);
    
    }

});


/* Time */

var form = document.querySelector('.conversation-compose');
var conversation = document.querySelector('.conversation-container');

form.addEventListener('submit', newMessage);

function newMessage(e) {
	var input = e.target.input;

	if (input.value) {
		var message = buildMessage(input.value);
		conversation.appendChild(message);
		animateMessage(message);
	}

	input.value = '';
	conversation.scrollTop = conversation.scrollHeight;

	e.preventDefault();
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

function animateMessage(message) {
	setTimeout(function() {
		var tick = message.querySelector('.tick');
		tick.classList.remove('tick-animation');
	}, 500);
}






$(document).on('click', "#Tabs #tab_chat", function (event) {
    window.console.log('tab_chat');
    //show content in your tab
    $("#chat").removeClass("tabcontent");
    $("#chat").addClass("styleShow");
    //hiden contant in other tab
    $("#groups").addClass("tabcontent");
    $("#calls").addClass("tabcontent");
    $("#groups").removeClass("styleShow");
    $("#calls").removeClass("styleShow");
});

$(document).on('click', "#Tabs #tab_group", function (event) {
    window.console.log('tab_groups');

    //show content in your tab
    $("#groups").removeClass("tabcontent");
    $("#groups").addClass("styleShow");
    //hiden contant in other tab
    $("#chat").addClass("tabcontent");
    $("#calls").addClass("tabcontent");
    $("#chat").removeClass("styleShow");
    $("#calls").removeClass("styleShow");


});
$(document).on('click', "#Tabs #tab_calls", function (event) {
    window.console.log('tab_calls');
    //show content in your tab
    $("#calls").removeClass("tabcontent");
    $("#calls").addClass("styleShow");
    //hiden contant in other tab
    $("#chat").addClass("tabcontent");
    $("#groups").addClass("tabcontent");
    $("#chat").removeClass("styleShow");
    $("#groups").removeClass("styleShow");


});
window.addEventListener("resize", function (event) {
    window.console.log('width:' + $(window).width());
    if ($(window).width() < 760) {
        window.console.log('width:' + $(window).width());
        var width = $(window).width();
        $('.ttr-sidebar-chat').width(width);
    }
});
       
  