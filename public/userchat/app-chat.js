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

});
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

