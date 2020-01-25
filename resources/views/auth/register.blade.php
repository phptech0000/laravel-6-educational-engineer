<!doctypehtml>
<html lang=en-US>
    <head>
        <meta charset=utf-8>
        <meta content="IE=edge" http-equiv=X-UA-Compatible>
        <meta content="width=device-width,minimum-scale=1,maximum-scale=1" name=viewport>
        <title>Registration</title>
        <meta content="Add your website description here" name=description>
        <meta content="Add your website keywords here" name=keywords>
        <link href="favicon.ico" rel="icon">
        <link href="<?= asset('reg/css/reg.css') ?>" rel="stylesheet">
        <link href="<?= asset('reg/css/bootstrap.min.css') ?>" rel="stylesheet">
        <link href="<?= asset('reg/css/font_awesome.min.css') ?>" rel="stylesheet">
        <link href="<?= asset('reg/css/bootstrap_datepicker3.min.css') ?>" rel="stylesheet">
        <link href="<?= asset('reg/css/sweetalert.css') ?>" rel="stylesheet">

    </head>
    <body>
        <div class="signupForm-section wrapper">
            <div class=display-table>
                <div class=display-table-cell>
                    <div class=container>
                        <div class=row>
                            <div class=col-sm-12>
                                <div class="clearfix form-wrap">
                                    <h2 class=form-title>Education Engineering Registration</h2>
                                    <div class="col-sm-6 col-sm-offset-3">
                                        <form class=signUpForm data-toggle=validator enctype=multipart/form-data
                                              id=signUpForm name=signUpForm>
                                            <div class=signUpForm-step-holder>
                                                <div class=signUpForm-step-wrap id=section-1>
                                                    <h3 class=section-title>Step 1 of 4</h3>
                                                    <fieldset>
                                                        <div class="form-layer-steps form-layer-tolal-steps-4">
                                                            <div class=form-layer-progress>
                                                                <div class=form-layer-progress-line style=width:0%></div>
                                                            </div>
                                                            <div class="form-layer-step active">
                                                                <div class=form-layer-step-icon><i
                                                                        class="fa fa-unlock-alt"></i></div>
                                                                <p>Account
                                                            </div>
                                                            <div class=form-layer-step>
                                                                <div class=form-layer-step-icon><i class="fa fa-user"></i>
                                                                </div>
                                                                <p>Personal
                                                            </div>
                                                            <div class=form-layer-step>
                                                                <div class=form-layer-step-icon><i
                                                                        class="fa fa-credit-card-alt"></i></div>
                                                                <p>Payment Info
                                                            </div>
                                                            <div class=form-layer-step>
                                                                <div class=form-layer-step-icon><i class="fa fa-check"></i>
                                                                </div>
                                                                <p>Confirm
                                                            </div>
                                                        </div>
                                                        <h3 class=section-form-title>Account Information</h3>
                                                        <div class="help-block with-errors mandatory-error"></div>
                                                        <div class="form-group validuname"><input id=uname name=uname
                                                                                                  class=form-control data-error="Please enter UserName"
                                                                                                  placeholder=UserName* required>
                                                            <div class=input-group-icon><i class="fa fa-user"></i></div>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                        <div class="form-group validemail"><input id=email name=email
                                                                                                  class=form-control data-error="Please enter valid email"
                                                                                                  placeholder=Email* required type=email>
                                                            <div class=input-group-icon><i class="fa fa-envelope"></i></div>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                        <div class="form-group validpass"><input id=pass name=pass
                                                                                                 class=form-control data-error="Please enter password"
                                                                                                 placeholder="Password* at least 6 character" required
                                                                                                 type=password>
                                                            <div class=input-group-icon><i class="fa fa-key"></i></div>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                        <div class=form-group><input id=cpass name=cpass class=form-control
                                                                                     data-error="Please retype password"
                                                                                     placeholder="Confirm Password*" required type=password>
                                                            <div class=input-group-icon><i class="fa fa-key"></i></div>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                        <div class="form-group signUpForm-step-1"><button
                                                                class="btn btn-default disable" type=button>Are you
                                                                ready!</button> <button class="btn btn-custom pull-right"
                                                                                    type=button onclick=nextStep2()>Next <span
                                                                    class="fa fa-arrow-right"></span></button></div>
                                                    </fieldset>
                                                </div>
                                                <div class="signUpForm-step-wrap slide-right" id=section-2>
                                                    <h3 class=section-title>Step 2 of 4</h3>
                                                    <fieldset>
                                                        <div class="form-layer-steps form-layer-tolal-steps-4">
                                                            <div class=form-layer-progress>
                                                                <div class=form-layer-progress-line style=width:37.25%>
                                                                </div>
                                                            </div>
                                                            <div class="form-layer-step activated">
                                                                <div class=form-layer-step-icon><i
                                                                        class="fa fa-unlock-alt"></i></div>
                                                                <p>Account
                                                            </div>
                                                            <div class="form-layer-step active">
                                                                <div class=form-layer-step-icon><i class="fa fa-user"></i>
                                                                </div>
                                                                <p>Personal
                                                            </div>
                                                            <div class=form-layer-step>
                                                                <div class=form-layer-step-icon><i
                                                                        class="fa fa-credit-card-alt"></i></div>
                                                                <p>Payment Info
                                                            </div>
                                                            <div class=form-layer-step>
                                                                <div class=form-layer-step-icon><i class="fa fa-check"></i>
                                                                </div>
                                                                <p>Confirm
                                                            </div>
                                                        </div>
                                                        <h3 class=section-form-title>Personal Information</h3>
                                                        <div class="help-block with-errors mandatory-error"></div>
                                                        <div class="form-group validfname"><input id=fname name=fname
                                                                                                  class=form-control data-error="Please enter First Name"
                                                                                                  placeholder="First Name*" required>
                                                            <div class=input-group-icon><i class="fa fa-user"></i></div>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                        <div class="form-group validlname"><input id=lname name=lname
                                                                                                  class=form-control data-error="Please enter Last Name"
                                                                                                  placeholder="Last Name*" required>
                                                            <div class=input-group-icon><i class="fa fa-user"></i></div>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                        <div class="form-group validgender"><select class=form-control
                                                                                                    data-error="Please Select Gender" id=gender name=gender
                                                                                                    required>
                                                                <option value="">--- Select Your Gender* ---
                                                                <option value=Male>Male
                                                                <option value=Femal>Female
                                                            </select>
                                                            <div class=input-group-icon><i class="fa fa-mars"></i></div>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                        <div class="form-group validbirthdate" id=date-of-birth>
                                                            <h5><strong>Date of Birth*:</strong></h5>
                                                            <div id=datepicker></div><input id=birthdate name=birthdate
                                                                                            type=hidden>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                        <div class="form-group validaddress"><input id=address name=address
                                                                                                    class=form-control data-error="Please enter address"
                                                                                                    placeholder=Address* required>
                                                            <div class=input-group-icon><i class="fa fa-map-marker"></i>
                                                            </div>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                        <div class="form-group validphone"><input id=phone name=phone
                                                                                                  class=form-control data-error="Please enter valid phone"
                                                                                                  placeholder=Phone* required>
                                                            <div class=input-group-icon><i class="fa fa-phone"></i></div>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                        <div class="form-group validpreferedcontact"><strong>Prefered
                                                                Contact Method*: </strong><label class=radio-inline><input
                                                                    id=preferedcontact1 name=preferedcontact type=radio
                                                                    value=email>email</label> <label
                                                                class=radio-inline><input id=preferedcontact2
                                                                                      name=preferedcontact type=radio
                                                                                      value=Phone>Phone</label>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                        <h3 class=section-form-title>Profile Image</h3>
                                                        <div class="form-group attachmentFile"><label
                                                                class=input-group-btn><span class=btn>Browse… <input
                                                                        id=userfile name=userfile type=file></span></label>
                                                            <input id=attachedFile class=form-control
                                                                   placeholder="Browse to select file" readonly></div>
                                                        <div class="form-group signUpForm-step-2"><button
                                                                class="btn btn-custom" type=button
                                                                onclick=previousStep1()><span
                                                                    class="fa fa-arrow-left"></span> Back</button> <button
                                                                class="btn btn-custom pull-right" type=button
                                                                onclick=nextStep3()>Next <span
                                                                    class="fa fa-arrow-right"></span></button></div>
                                                    </fieldset>
                                                </div>
                                                <div class="signUpForm-step-wrap slide-right" id=section-3>
                                                    <h3 class=section-title>Step 3 of 4</h3>
                                                    <fieldset>
                                                        <div class="form-layer-steps form-layer-tolal-steps-4">
                                                            <div class=form-layer-progress>
                                                                <div class=form-layer-progress-line style=width:62.25%>
                                                                </div>
                                                            </div>
                                                            <div class="form-layer-step activated">
                                                                <div class=form-layer-step-icon><i
                                                                        class="fa fa-unlock-alt"></i></div>
                                                                <p>Account
                                                            </div>
                                                            <div class="form-layer-step activated">
                                                                <div class=form-layer-step-icon><i class="fa fa-user"></i>
                                                                </div>
                                                                <p>Personal
                                                            </div>
                                                            <div class="form-layer-step active">
                                                                <div class=form-layer-step-icon><i
                                                                        class="fa fa-credit-card-alt"></i></div>
                                                                <p>Payment Info
                                                            </div>
                                                            <div class=form-layer-step>
                                                                <div class=form-layer-step-icon><i class="fa fa-check"></i>
                                                                </div>
                                                                <p>Confirm
                                                            </div>
                                                        </div>
                                                        <h3 class=section-title>Payment Details:</h3>
                                                        <div class="help-block with-errors mandatory-error"></div>
                                                        <div class="form-group validpaymenttype"><select class=form-control
                                                                                                         data-error="Please Select Payment Type" id=paymenttype
                                                                                                         name=paymenttype required>
                                                                <option value="">--- Select Your Payment Type* ---
                                                                <option value="Master Card">Master Card
                                                                <option value="Visa Card">Visa Card
                                                            </select>
                                                            <div class=input-group-icon><i class="fa fa-mars"></i></div>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                        <div class="form-group validhname"><input id=hname name=hname
                                                                                                  class=form-control
                                                                                                  data-error="Please enter Card Holder Name"
                                                                                                  placeholder="Card Holder Name*" required>
                                                            <div class=input-group-icon><i class="fa fa-user"></i></div>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                        <div class="form-group validcardnumber"><input id=cardnumber
                                                                                                       name=cardnumber class=form-control
                                                                                                       data-error="Please enter valid card number"
                                                                                                       placeholder="Card Number*" required pattern=\d*>
                                                            <div class=input-group-icon><i class="fa fa-credit-card"></i>
                                                            </div>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                        <div class="form-group validcvc"><input id=cvc name=cvc
                                                                                                class=form-control data-error="Please enter CVC"
                                                                                                placeholder=CVC* required maxlength=3 pattern=\d*>
                                                            <div class=input-group-icon><i class="fa fa-credit-card"></i>
                                                            </div>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                        <div class="form-group validexpirydate" id=sandbox-container2><input
                                                                id=expirydate name=expirydate class=form-control
                                                                data-error="Please enter Expiry Date"
                                                                placeholder="Expiry Date*" required>
                                                            <div class=input-group-icon><i class="fa fa-calendar"></i></div>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                        <div class="form-group validagree">
                                                            <div class=checkbox><label><input id=aggre name=aggre
                                                                                              type=checkbox value=1>Aggre with terms &
                                                                    conditions</label>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group signUpForm-step-3"><button
                                                                class="btn btn-custom" type=button
                                                                onclick=previousStep2()><span
                                                                    class="fa fa-arrow-left"></span> Back</button> <button
                                                                class="btn btn-custom pull-right" type=button
                                                                onclick=nextStep4()>Next <span
                                                                    class="fa fa-arrow-right"></span></button></div>
                                                    </fieldset>
                                                </div>
                                                <div class="signUpForm-step-wrap slide-right review-submit-section"
                                                     id=section-4>
                                                    <h3 class=section-title>Step 4 of 4: Review & Submit</h3>
                                                    <fieldset>
                                                        <div class="form-layer-steps form-layer-tolal-steps-4">
                                                            <div class=form-layer-progress>
                                                                <div class=form-layer-progress-line style=width:100%></div>
                                                            </div>
                                                            <div class="form-layer-step activated">
                                                                <div class=form-layer-step-icon><i
                                                                        class="fa fa-unlock-alt"></i></div>
                                                                <p>Account
                                                            </div>
                                                            <div class="form-layer-step activated">
                                                                <div class=form-layer-step-icon><i class="fa fa-user"></i>
                                                                </div>
                                                                <p>Personal
                                                            </div>
                                                            <div class="form-layer-step activated">
                                                                <div class=form-layer-step-icon><i
                                                                        class="fa fa-credit-card-alt"></i></div>
                                                                <p>Payment Info
                                                            </div>
                                                            <div class="form-layer-step active">
                                                                <div class=form-layer-step-icon><i class="fa fa-check"></i>
                                                                </div>
                                                                <p>Confirm
                                                            </div>
                                                        </div>
                                                        <h3 class=section-form-title>Confirm Details</h3>
                                                        <div class=row>
                                                            <div class="col-sm-12 contentBoxMargin text-center">
                                                                <div id=profile-Image><img alt="Prifile Image" id=userPhoto
                                                                                           src=#></div>
                                                                <h3>Profile Image</h3>
                                                            </div>
                                                            <div class="col-sm-12 contentBoxMargin text-center">
                                                                <h5>Account Information</h5>
                                                                <p id=unameData>
                                                                <p id=emailData>
                                                                <p id=passData>
                                                            </div>
                                                            <div class="col-sm-12 contentBoxMargin text-center">
                                                                <h5>Personal Information:</h5>
                                                                <p id=firstNameData>
                                                                <p id=lastNameData>
                                                                <p id=genderData>
                                                                <p id=birthdateData>
                                                                <p id=addressData>
                                                                <p id=emailaddressData>
                                                                <p id=phoneData>
                                                                <p id=preferedcontactData>
                                                            </div>
                                                            <div class="col-sm-12 contentBoxMargin text-center">
                                                                <h5>Payment Information:</h5>
                                                                <p id=paymenttypeData>
                                                                <p id=hnameData>
                                                                <p id=cardnumberData>
                                                                <p id=cvcData>
                                                                <p id=expirydateData>
                                                            </div>
                                                            <div class="help-block with-errors mandatory-error"></div>
                                                            <div class=col-sm-12>
                                                                <div class=form-group>
                                                                    <div id=AggreData>
                                                                        <strong>Aggre with terms &
                                                                            conditions:</strong> <input id=aggre2 name=aggre
                                                                                                    type=checkbox value=1 checked disabled></div>
                                                                </div>
                                                                <div class=hidden id=mgsFormSubmit></div>
                                                                <div class="form-group signUpForm-step-4"
                                                                     id=final-step-buttons><button class="btn btn-custom"
                                                                                              type=button onclick=previousStep3()><span
                                                                            class="fa fa-arrow-left"></span> Back</button>
                                                                    <button class="btn btn-custom pull-right" type=submit
                                                                            id=Submit>Submit</button></div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=row>
                            <div class="col-sm-12 footer-top">
                                <p class="text-center copyright">© 2019 Education Engineering. <a
                                        href="{{route('index')}}" target=_blank>Home</a>
                                    All rights reserved. <a
                                        href="{{route('login')}}"
                                        class=footer-site-link>Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{asset('reg/js/jquery_3.4.1.min.js')}}" type="text/javascript"></script> 
        <script src="{{asset('reg/js/bootstrap_datepicker.min.js')}}" type="text/javascript"></script> 
        <script src="{{asset('reg/js/validator.min.js')}}" type="text/javascript"></script> 
        <script src="{{asset('reg/js/sweetalert.min.js')}}" type="text/javascript"></script> 
        <script src="{{asset('reg/js/reg_form_3.js')}}" type="text/javascript"></script>

        <script type="text/javascript">
                                                                                                  !function (e, a, t, n, g, c, o) {
                                                                                                      e.GoogleAnalyticsObject = g, e.ga = e.ga || function () {
                                                                                                          (e.ga.q = e.ga.q || []).push(arguments)
                                                                                                      }, e.ga.l = 1 * new Date, c = a.createElement(t), o = a.getElementsByTagName(t)[0], c.async = 1, c.src = "https://www.google-analytics.com/analytics.js", o.parentNode.insertBefore(c, o)
                                                                                                  }(window, document, "script", 0, "ga"), ga("create", "UA-93541536-2", "auto"), ga("send", "pageview")
        </script>
    </body>
</html>