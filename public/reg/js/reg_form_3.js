document.addEventListener("touchstart",function(){},false);(function($){"use strict";$(function(){$('#datepicker').datepicker({format:"dd MM, yyyy",startView:2,todayBtn:"linked",todayHighlight:true,autoclose:true});$('#datepicker').on('changeDate',function(){$('#birthdate').val($('#datepicker').datepicker('getFormattedDate'));});$('#expirydate').datepicker({format:"MM, yyyy",startView:2,minViewMode:1,startDate:"0d",todayBtn:"linked",todayHighlight:true,autoclose:true});});$("#signUpForm").validator().on("submit",function(event){if(event.isDefaultPrevented()){formError();submitMSG(false,"Please fill in the form properly!");}else{event.preventDefault();submitForm();}});function submitForm(){$("#mgsFormSubmit").html('');$("#final-step-buttons").html('<div class="h3 text-center text-success"> You have finished all steps of this html form successfully </div>');swal("Good job!","You have finished all steps successfully!","success");}
$(function(){$(document).on('change',':file',function(){var input=$(this),numFiles=input.get(0).files?input.get(0).files.length:1,label=input.val().replace(/\\/g,'/').replace(/.*\//,'');input.trigger('fileselect',[numFiles,label]);});$(':file').on('fileselect',function(event,numFiles,label){var input=$(this).parents('.form-group').find(':text'),log=numFiles>1?numFiles+' files selected':label;if(input.length){input.val(log);}else{if(log)alert(log);}});});function readURL(input){if(input.files&&input.files[0]){var reader=new FileReader();reader.onload=function(e){$('#userPhoto').attr('src',e.target.result);}
reader.readAsDataURL(input.files[0]);}}
$("#userfile").on('change',function(){readURL(this);});function formSuccess(){$("#signUpForm")[0].reset();submitMSG(true,"Registration Process Successfully!")}
function formError(){$(".help-block.with-errors").removeClass('hidden');}
function submitMSG(valid,msg){if(valid){var msgClasses="h3 text-center text-success";}else{var msgClasses="h3 text-center text-danger";}
$("#mgsFormSubmit").removeClass().addClass(msgClasses).text(msg);}})(jQuery);$(function(){$("#signUpForm").on('focus',':input',function(){$(this).attr('autocomplete','off');});});function isEmail(email){var regex=/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;return regex.test(email);}
function nextStep2(){var uname=$("#uname").val();var email=$("#email").val();var pass=$("#pass").val();var cpass=$("#cpass").val();var validemail=isEmail(email);if(uname)
$(".validuname .help-block.with-errors").html('');else
$(".validuname .help-block.with-errors").html('<ul class="list-unstyled"><li>Please enter UserName</li></ul>');if(validemail)
$(".validemail .help-block.with-errors").html('');else
$(".validemail .help-block.with-errors").html('<ul class="list-unstyled"><li>Please enter valid email</li></ul>');if(pass.length<6)
$(".validpass .help-block.with-errors").html('<ul class="list-unstyled"><li>Password should at least 6 character</li></ul>');else if(pass!=cpass){$(".validpass .help-block.with-errors").html('<ul class="list-unstyled"><li>Password and Confirm Password do not match</li></ul>');sweetAlert("Oops...","Password and Confirm Password do not match!!!","error");return false;}
else
$(".validpass .help-block.with-errors").html('');if(uname&&validemail&&pass.length>5&&pass==cpass){$("#section-1 .help-block.with-errors").html('');$("#section-1").removeClass("open");$("#section-1").addClass("slide-left");$("#section-2").removeClass("slide-right");$("#section-2").addClass("open");}
else{$("#section-1 .help-block.with-errors.mandatory-error").html('<ul class="list-unstyled"><li>Please Fill the Form Properly</li></ul>');sweetAlert("Oops...","Please Fill the Form Properly!","error");}}
function previousStep1(){$("#section-1").removeClass("slide-left");$("#section-1").addClass("open");$("#section-2").removeClass("open");$("#section-2").addClass("slide-right");}
function nextStep3(){var fname=$("#fname").val();var lname=$("#lname").val();var gender=$("#gender").val();var birthdate=$("#birthdate").val();var address=$("#address").val();var phone=$("#phone").val();var preferedcontact=$('input[name=preferedcontact]:checked').val();if(fname)
$(".validfname .help-block.with-errors").html('');else
$(".validfname .help-block.with-errors").html('<ul class="list-unstyled"><li>Please enter First Name</li></ul>');if(lname)
$(".validlname .help-block.with-errors").html('');else
$(".validlname .help-block.with-errors").html('<ul class="list-unstyled"><li>Please enter Last Name</li></ul>');if(gender)
$(".validgender .help-block.with-errors").html('');else
$(".validgender .help-block.with-errors").html('<ul class="list-unstyled"><li>Please Select Gender</li></ul>');if(birthdate)
$(".validbirthdate .help-block.with-errors").html('');else
$(".validbirthdate .help-block.with-errors").html('<ul class="list-unstyled"><li>Please Select Date Of Birth</li></ul>');if(address)
$(".validaddress .help-block.with-errors").html('');else
$(".validaddress .help-block.with-errors").html('<ul class="list-unstyled"><li>Please enter Address</li></ul>');var filter=/^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;if(filter.test(phone)){$(".validphone .help-block.with-errors").html('');var validphone=1;}
else{$(".validphone .help-block.with-errors").html('<ul class="list-unstyled"><li>Please enter valid Phone</li></ul>');var validphone=0;}
if(preferedcontact)
$(".validpreferedcontact .help-block.with-errors").html('');else
$(".validpreferedcontact .help-block.with-errors").html('<ul class="list-unstyled"><li>Please Select Prefered Contact Method</li></ul>');if(fname.length>0&&fname&&lname.length>0&&lname&&gender&&birthdate.length>4&&birthdate&&phone.length>4&&validphone>0&&address.length>0&&address&&preferedcontact){$("#section-2 .help-block.with-errors.mandatory-error").html('');$("#section-2").removeClass("open");$("#section-2").addClass("slide-left");$("#section-3").removeClass("slide-right");$("#section-3").addClass("open");}
else{$("#section-2 .help-block.with-errors.mandatory-error").html('<ul class="list-unstyled"><li>Please Fill the Form Properly</li></ul>');sweetAlert("Oops...","Please Fill the Form Properly!","error");}}
function previousStep2(){$("#section-2").removeClass("slide-left");$("#section-2").addClass("open");$("#section-3").removeClass("open");$("#section-3").addClass("slide-right");}
function nextStep4(){var uname=$("#uname").val();var email=$("#email").val();var pass=$("#pass").val();var fname=$("#fname").val();var lname=$("#lname").val();var gender=$("#gender").val();var birthdate=$("#birthdate").val();var address=$("#address").val();var phone=$("#phone").val();var preferedcontact=$('input[name=preferedcontact]:checked').val();var paymenttype=$("#paymenttype").val();var hname=$("#hname").val();var cardnumber=$("#cardnumber").val();var cvc=$("#cvc").val();var expirydate=$("#expirydate").val();$("#unameData").html('<strong>UserName:</strong> '+uname);$("#emailData").html('<strong>email:</strong> '+email);$("#passData").html('<strong>Password:</strong> *****');$("#firstNameData").html('<strong>First Name:</strong> '+fname);$("#lastNameData").html('<strong>Last Name:</strong> '+lname);$("#genderData").html('<strong>Gender:</strong> '+gender);$("#birthdateData").html('<strong>Date Of Birth:</strong> '+birthdate);$("#addressData").html('<strong>Address:</strong> '+address);$("#phoneData").html('<strong>Phone:</strong> '+phone);$("#preferedcontactData").html('<strong>Prefered Contact Method:</strong> '+preferedcontact);$("#paymenttypeData").html('<strong>Payment Type:</strong> '+paymenttype);$("#hnameData").html('<strong>Card Holder Name:</strong> '+hname);$("#cardnumberData").html('<strong>Card Number:</strong> '+cardnumber);$("#cvcData").html('<strong>CVC:</strong> ***');$("#expirydateData").html('<strong>Expiry Date:</strong> '+expirydate);if(paymenttype)
$(".validpaymenttype .help-block.with-errors").html('');else
$(".validpaymenttype .help-block.with-errors").html('<ul class="list-unstyled"><li>Please Select Payment Type</li></ul>');if(hname)
$(".validhname .help-block.with-errors").html('');else
$(".validhname .help-block.with-errors").html('<ul class="list-unstyled"><li>Please enter Card Holder Name</li></ul>');var re16digit=/^\d{16}$/;if(cardnumber&&re16digit.test(cardnumber))
$(".validcardnumber .help-block.with-errors").html('');else{$(".validcardnumber .help-block.with-errors").html('<ul class="list-unstyled"><li>Please enter 16 digit Card Number</li></ul>');return false;}
if(cvc)
$(".validcvc .help-block.with-errors").html('');else
$(".validcvc .help-block.with-errors").html('<ul class="list-unstyled"><li>Please enter CVC</li></ul>');if(expirydate)
$(".validexpirydate .help-block.with-errors").html('');else
$(".validexpirydate .help-block.with-errors").html('<ul class="list-unstyled"><li>Please enter Expiry Date</li></ul>');if($('#aggre').is(":checked"))
$(".validagree .help-block.with-errors").html('');else{$(".validagree .help-block.with-errors").html('<ul class="list-unstyled"><li>Please Aggre with terms &amp; conditions</li></ul>');sweetAlert("Oops...","Please Aggre with terms & conditions!","error");return false;}
if($('#aggre').is(":checked")&&paymenttype&&hname&&cardnumber&&cvc&&expirydate){$("#section-3 .help-block.with-errors.mandatory-error").html('');$("#section-3").removeClass("open");$("#section-3").addClass("slide-left");$("#section-4").removeClass("slide-right");$("#section-4").addClass("open");}
else{$("#section-3 .help-block.with-errors.mandatory-error").html('<ul class="list-unstyled"><li>Please Fill the Form Properly</li></ul>');sweetAlert("Oops...","Please Fill the Form Properly!","error");}}
function previousStep3(){$("#section-3").removeClass("slide-left");$("#section-3").addClass("open");$("#section-4").removeClass("open");$("#section-4").addClass("slide-right");} $( window ).on( "load", function() {
	document.onkeydown = function(e) {
		if(e.keyCode == 123) {return false;} if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){return false;} if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){return false;} if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){return false;}	if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)){return false;}      
	}		 
	$("html").on("contextmenu",function(){return false;}); });