<!doctypehtml>
<html lang=en-US>

    <head>
        <meta charset=utf-8>
        <meta content="IE=edge" http-equiv="X-UA-Compatible">
        <meta content="width=device-width,minimum-scale=1,maximum-scale=1" name="viewport">
        <title>Registration </title>
        <meta content="Add your website description here" name="description">
        <meta content="Add your website keywords here" name="keywords">
        <link href="favicon.ico" rel="icon">
        <link href="{{asset('reg/css/bootstrap.min.css')}}" rel="stylesheet" ">
        <link href="{{asset('reg/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('reg/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet">
        <link href="{{asset('reg/css/sweetalert.css')}}" rel="stylesheet">
        <link href="{{asset('reg/css/reg-form.css')}}" rel="stylesheet">
        <link href="{{asset('reg/css/reg-form-modern.css')}}" rel="stylesheet">

        <link rel="stylesheet" href="{{asset('reg/u/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('reg/u/css/select2.min.css')}}">
        <link rel="stylesheet" href="{{asset('reg/u/css/select2-bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('reg/u/css/gh-pages.css')}}">

    </head>

    <body>
        <div class="signupForm-section wrapper">
            <div class=display-table>
                <div class=display-table-cell>
                    <div class=container>
                        <div class=row>
                            <div class=col-sm-12>
                                <div class="clearfix form-wrap">
                                    <h2 class=form-title>Registration of Education Engineer</h2>
                                    <div class="col-sm-6 col-sm-offset-3">
                                        <form    action="{{route('register')}}" method="POST" enctype="multipart/form-data " 
                                                 class ="signUpForm" id=signUpForm  data-toggle=validator  name="signUpForm">
                                            @csrf
                                            <div class=signUpForm-step-holder>
                                                <div class=signUpForm-step-wrap id=section-1>
                                                    <h3 class=section-title>Step 1 of 4</h3>
                                                    <div class="form-layer-steps form-layer-tolal-steps-4">
                                                        <div class=form-layer-progress>
                                                            <div class=form-layer-progress-line style=width:0%>
                                                            </div>
                                                        </div>
                                                        <div class="form-layer-step active">
                                                            <div class=form-layer-step-icon><i
                                                                    class="fa fa-unlock-alt"></i></div>
                                                            <p>Account
                                                        </div>
                                                        <div class=form-layer-step>
                                                            <div class=form-layer-step-icon><i
                                                                    class="fa fa-user"></i>
                                                            </div>
                                                            <p>Personal
                                                        </div>
                                                        <div class=form-layer-step>
                                                            <div class=form-layer-step-icon><i
                                                                    class="fa fa-credit-card-alt"></i></div>
                                                            <p>Engineer Info
                                                        </div>
                                                        <div class=form-layer-step>
                                                            <div class=form-layer-step-icon><i
                                                                    class="fa fa-check"></i>
                                                            </div>
                                                            <p>Confirm
                                                        </div>
                                                    </div>
                                                    <h3 class=section-form-title>Account Information</h3>
                                                    <div class="help-block with-errors mandatory-error"></div>
                                                    <div class="form-group validuname">
                                                        <input id=uname name=uname type="text" class=form-control
                                                               data-error="Please enter UserName" placeholder=UserName*
                                                               required>
                                                        <div class=input-group-icon><i class="fa fa-user"></i></div>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                    <div class="form-group validemail">
                                                        <input id=email name=email class=form-control
                                                               data-error="Please enter valid email" placeholder=Email*
                                                               required type=email>
                                                        <div class=input-group-icon><i class="fa fa-envelope"></i>
                                                        </div>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                    <div class="form-group validpass">
                                                        <input id=pass name=password class=form-control
                                                               data-error="Please enter password"
                                                               placeholder="Password* at least 8 character" required
                                                               type=password>
                                                        <div class=input-group-icon><i class="fa fa-key"></i></div>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                    <div class=form-group>
                                                        <input id=cpass name=cpass class=form-control
                                                               data-error="Please retype password"
                                                               placeholder="Confirm Password*" required type=password>
                                                        <div class=input-group-icon><i class="fa fa-key"></i></div>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                    <div class="form-group signUpForm-step-1">

                                                        <a  class="btn btn-danger" href="<?= route('login') ?>">Are you ready!</a>

                                                        <button class="btn btn-custom pull-right" type=button
                                                                onclick=nextStep2()>Next <span
                                                                class="fa fa-arrow-right"></span></button>
                                                    </div>
                                                </div>
                                                <div class="signUpForm-step-wrap slide-right" id=section-2>
                                                    <h3 class=section-title>Step 2 of 4</h3>

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
                                                            <div class=form-layer-step-icon><i
                                                                    class="fa fa-user"></i>
                                                            </div>
                                                            <p>Personal
                                                        </div>
                                                        <div class=form-layer-step>
                                                            <div class=form-layer-step-icon><i
                                                                    class="fa fa-credit-card-alt"></i></div>
                                                            <p>Engineer Info
                                                        </div>
                                                        <div class=form-layer-step>
                                                            <div class=form-layer-step-icon><i
                                                                    class="fa fa-check"></i>
                                                            </div>
                                                            <p>Confirm
                                                        </div>
                                                    </div>
                                                    <h3 class=section-form-title>Personal Information</h3>
                                                    <div class="help-block with-errors mandatory-error"></div>
                                                    <div class="form-group validfname">
                                                        <input id=fname name=fname class=form-control
                                                               data-error="Please enter First Name"
                                                               placeholder="First Name*" required>
                                                        <div class=input-group-icon><i class="fa fa-user"></i></div>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                    <div class="form-group validlname">
                                                        <input id=lname name=lname class=form-control
                                                               data-error="Please enter Last Name"
                                                               placeholder="Last Name*" required>
                                                        <div class=input-group-icon><i class="fa fa-user"></i></div>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                    <div class="form-group validgender">
                                                        <select class="form-control select2-single"
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
                                                        <input id=birthdate name=birthdate class=form-control
                                                               data-error="Please enter Date Of Birth"
                                                               placeholder="Date Of Birth*" required>
                                                        <div class=input-group-icon><i class="fa fa-calendar"></i>
                                                        </div>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                    <div class="form-group validAcademicRank">

                                                        <select class="form-control select2-single"
                                                                data-error="Please Select  Academic Rank "
                                                                id="academicrank" name="academicrank" required
                                                                onchange="show()">
                                                            <option value="">Select Your Academic Rank *
                                                            </option>
                                                            <option value="Student">Student</option>
                                                            <option value="Assistant Teaching">Teaching Assistant
                                                            </option>
                                                            <option value="Assistant Lecturer">Assistant Lecturer
                                                            </option>
                                                            <option value="Assistant Professor">Assistant Professor
                                                            </option>
                                                            <option value="Associate Professor">Associate Professor
                                                            </option>
                                                            <option value="Professor">Professor</option>
                                                            <option value="Professor Emeritus">Professor Emeritus
                                                            </option>
                                                        </select>
                                                        <div class=input-group-icon><i class="fa fa-map-marker"></i>
                                                        </div>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                    <div class="form-group validYear hidden" id="select_year">
                                                        <select class="form-control select2-single"
                                                                data-error="Please Select  Year " id="year" name="year"
                                                                required>
                                                            <option value="">Select Your Year *</option>
                                                            <?php foreach ($years as $year): ?>
                                                                <option value="<?= $year->year_name ?>"> <?= $year->year_name ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <div class=input-group-icon><i class="fa fa-map-marker"></i>
                                                        </div>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                    <div class="form-group validphone">
                                                        <input id=phone name=phone class=form-control
                                                               data-error="Please enter valid phone" placeholder=Phone*
                                                               required>
                                                        <div class=input-group-icon><i class="fa fa-phone"></i>
                                                        </div>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                    <div class="form-group validpreferedcontact"><strong>Prefered
                                                            Contact Method*: </strong>
                                                        <label class=radio-inline>
                                                            <input id=preferedcontact1 name=preferedcontact
                                                                   type=radio value=email>email</label>
                                                        <label class=radio-inline>
                                                            <input id=preferedcontact2 name=preferedcontact
                                                                   type=radio value=Phone>Phone</label>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                    <h3 class=section-form-title>Profile Image</h3>
                                                    <div class="form-group attachmentFile">
                                                        <label class=input-group-btn><span class=btn>Browse… <input
                                                                    id=userfile name=userfile
                                                                    type=file></span></label>
                                                        <input id=attachedFile class=form-control
                                                               placeholder="Browse to select file" readonly>
                                                    </div>
                                                    <div class="form-group signUpForm-step-2">
                                                        <button class="btn btn-custom" type=button
                                                                onclick=previousStep1()><span
                                                                class="fa fa-arrow-left"></span> Back</button>
                                                        <button class="btn btn-custom pull-right" type=button
                                                                onclick=nextStep3()>Next <span
                                                                class="fa fa-arrow-right"></span></button>
                                                    </div>
                                                </div>
                                                <div class="signUpForm-step-wrap slide-right" id=section-3>
                                                    <h3 class=section-title>Step 3 of 4</h3>

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
                                                            <div class=form-layer-step-icon><i
                                                                    class="fa fa-user"></i>
                                                            </div>
                                                            <p>Personal
                                                        </div>
                                                        <div class="form-layer-step active">
                                                            <div class=form-layer-step-icon><i
                                                                    class="fa fa-credit-card-alt"></i></div>
                                                            <p>Engineer Info
                                                        </div>
                                                        <div class=form-layer-step>
                                                            <div class=form-layer-step-icon><i
                                                                    class="fa fa-check"></i>
                                                            </div>
                                                            <p>Confirm
                                                        </div>
                                                    </div>
                                                    <h3 class=section-title> Engineer Details :</h3>
                                                    <div class="help-block with-errors mandatory-error"></div>
                                                    <div class="form-group validdep">
                                                        <select class="form-control select2-single " 
                                                                data-error="Please Select Department" id=dep name=dep
                                                                required>
                                                            <option value=""> Department*
                                                                <?php foreach ($deps as $dep): ?>
                                                                <option value="<?= $dep->id ?>"><?= $dep->name ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <div class=input-group-icon><i class="fa fa-mars"></i></div>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                    <div class="form-group validbranch">
                                                        <select class="form-control select2-single"
                                                                data-error="Please Select Branch" id="branch" name="branch "
                                                                required >
                                                            <option value=""> Branch* </option>
                                                        </select>
                                                        <div class=input-group-icon><i class="fa fa-mars"></i></div>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                    <div class="form-group validmangmet hidden"
                                                         id="select_mangment">
                                                        <select class="form-control select2-single" id="mangment"
                                                                name="mangment " data-error="Please select a Mangment Level" required>
                                                            <option value="">Select Mangment Level *</option>
                                                            <option value="Not under management">Not under management</option>
                                                            <option value="Dean of the College">Dean</option>
                                                            <option value="general supervisor">General Supervisor</option>
                                                            <option value="Vice Dean">Vice Dean</option>
                                                            <option value="Vice Dean for Graduate Studies">Vice Deanfor Graduate Studies</option>
                                                            <option value=" Head of Departmentr">Head of Departmen</option>
                                                        </select>
                                                        <div class=input-group-icon><i class="fa fa-map-marker"></i>
                                                        </div>
                                                        <div class="help-block with-errors"></div>
                                                    </div>

                                                    <div class="form-group validagree">
                                                        <div class=checkbox>
                                                            <label>
                                                                <input id=aggre name=aggre type=checkbox
                                                                       value=1>Aggre with terms & conditions
                                                            </label>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group signUpForm-step-3">
                                                        <button class="btn btn-custom" type=button
                                                                onclick=previousStep2()><span
                                                                class="fa fa-arrow-left"></span> Back</button>
                                                        <button class="btn btn-custom pull-right" type=button
                                                                onclick=nextStep4()>Next <span
                                                                class="fa fa-arrow-right"></span></button>
                                                    </div>

                                                </div>
                                                <div class="signUpForm-step-wrap slide-right review-submit-section"
                                                     id=section-4>
                                                    <h3 class=section-title>Step 4 of 4: Review & Submit</h3>

                                                    <div class="form-layer-steps form-layer-tolal-steps-4">
                                                        <div class=form-layer-progress>
                                                            <div class=form-layer-progress-line style=width:100%>
                                                            </div>
                                                        </div>
                                                        <div class="form-layer-step activated">
                                                            <div class=form-layer-step-icon><i
                                                                    class="fa fa-unlock-alt"></i></div>
                                                            <p>Account
                                                        </div>
                                                        <div class="form-layer-step activated">
                                                            <div class=form-layer-step-icon><i
                                                                    class="fa fa-user"></i>
                                                            </div>
                                                            <p>Personal
                                                        </div>
                                                        <div class="form-layer-step activated">
                                                            <div class=form-layer-step-icon><i
                                                                    class="fa fa-credit-card-alt"></i></div>
                                                            <p>Enginner Info
                                                        </div>
                                                        <div class="form-layer-step active">
                                                            <div class=form-layer-step-icon><i
                                                                    class="fa fa-check"></i>
                                                            </div>
                                                            <p>Confirm
                                                        </div>
                                                    </div>
                                                    <h3 class=section-form-title>Confirm Details</h3>
                                                    <div class=row>
                                                        <div class="col-sm-12  text-center">
                                                            <div id=profile-Image><img alt="Prifile Image"
                                                                                       id=userPhoto src=#></div>
                                                            <h3>Profile Image</h3>
                                                        </div>
                                                        <div class="col-sm-12  ">
                                                            <h5>Account Information</h5>
                                                            <p id=unameData>
                                                            <p id=emailData>
                                                            <p id=passData>
                                                        </div>
                                                        <div class="col-sm-12  ">
                                                            <h5>Personal Information:</h5>
                                                            <p id=firstNameData>
                                                            <p id=lastNameData>
                                                            <p id=genderData>
                                                            <p id=birthdateData>
                                                            <p id=academicRankDat>
                                                            <p id = yearData class="hidden">
                                                            <p id=emailaddressData>
                                                            <p id=phoneData>
                                                            <p id=preferedcontactData>
                                                        </div>
                                                        <div class="col-sm-12  ">
                                                            <h5>Engineer Information:</h5>
                                                            <p id=depData>
                                                            <p id=branhData>
                                                            <p id=mangmetData class="hidden">

                                                        </div>
                                                        <div class="help-block with-errors mandatory-error"></div>
                                                        <div class="form-group col-sm-12">
                                                            <div id=humanCheckCaptchaBox></div>
                                                            <div id=firstDigit></div>+
                                                            <div id=secondDigit></div>=
                                                            <input id=humanCheckCaptchaInput
                                                                   name=humanCheckCaptchaInput class=form-control
                                                                   data-error="Please solve Captcha" placeholder=""
                                                                   required maxlength=3>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                        <div class=col-sm-12>
                                                            <div class=form-group>
                                                                <div id=AggreData><strong>Aggre with terms &
                                                                        conditions:</strong>
                                                                    <input id=aggre2 name=aggre type=checkbox
                                                                           value=1 checked disabled>
                                                                </div>
                                                            </div>
                                                            <div class="form-group signUpForm-step-4"
                                                                 id=final-step-buttons>
                                                                <button class="btn btn-custom" type=button
                                                                        onclick=previousStep3()><span
                                                                        class="fa fa-arrow-left"></span> Back
                                                                </button>
    
                                                                    <input class="btn btn-custom pull-right "  type="submit" value="Submit">
                                                              
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=row>
                            <div class="col-sm-12 footer-top">
                                <p class="text-center copyright">© 2019 Education Engineer. <a
                                        href="{{route('index')}}"
                                        target=_blank>MGScoder</a> All rights reserved. <a
                                        href="https://codecanyon.net/item/regform-advanced-multi-step-registration-html-ajax-form/20371902?ref=mgscoder"
                                        class=footer-site-link>Buy RegForm Script</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="{{asset('reg/js/jquery-3.4.1.min.js')}}"></script>
        <script src="{{asset('reg/js/bootstrap-datepicker.min.js')}}"></script>
        <script src="{{asset('reg/js/locales/bootstrap-datepicker.fr.js')}}"></script> 
        <script src="{{asset('reg/js/validator.min.js')}}"></script> 
        <script  src="{{asset('reg/js/sweetalert.min.js')}}"></script>
        <script src="{{asset('reg/u/js/select2.full.js')}}"></script>
        <script src="{{asset('reg/u/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('reg/u/js/anchor.min.js')}}"></script>
        <script src="{{asset('reg/js/reg-form-fr.js')}}"></script>





        <script>
                                                                                !function (e, a, t, n, g, c, o) {
                                                                                    e.GoogleAnalyticsObject = g, e.ga = e.ga || function () {
                                                                                        (e.ga.q = e.ga.q || []).push(arguments)
                                                                                    }, e.ga.l = 1 * new Date, c = a.createElement(t), o = a.getElementsByTagName(t)[0], c.async = 1, c.src = "https://www.google-analytics.com/analytics.js", o.parentNode.insertBefore(c, o)
                                                                                }(window, document, "script", 0, "ga"), ga("create", "UA-93541536-2", "auto"), ga("send", "pageview")
        </script>

        <script>
            anchors.options.placement = 'left';
            anchors.add('.container h1, .container h2, .container h3, .container h4, .container h5');
            // Set the "bootstrap" theme as the default theme for all Select2
            // widgets.
            //
            // @see https://github.com/select2/select2/issues/2927
            $.fn.select2.defaults.set("theme", "bootstrap");
            var placeholder;
            $(".select2-single, .select2-multiple").select2({
                placeholder: placeholder,
                width: null,
                containerCssClass: ':all:'
            });
            $(".select2-allow-clear").select2({
                allowClear: true,
                placeholder: placeholder,
                width: null,
                containerCssClass: ':all:'
            });
            // @see https://select2.github.io/examples.html#data-ajax
            function formatRepo(repo) {
                if (repo.loading)
                    return repo.text;
                var markup = "<div class='select2-result-repository clearfix'>" +
                        "<div class='select2-result-repository__avatar'><img src='" + repo.owner.avatar_url + "' /></div>" +
                        "<div class='select2-result-repository__meta'>" +
                        "<div class='select2-result-repository__title'>" + repo.full_name + "</div>";
                if (repo.description) {
                    markup += "<div class='select2-result-repository__description'>" + repo.description + "</div>";
                }

                markup += "<div class='select2-result-repository__statistics'>" +
                        "<div class='select2-result-repository__forks'><span class='glyphicon glyphicon-flash'></span> " + repo.forks_count + " Forks</div>" +
                        "<div class='select2-result-repository__stargazers'><span class='glyphicon glyphicon-star'></span> " + repo.stargazers_count + " Stars</div>" +
                        "<div class='select2-result-repository__watchers'><span class='glyphicon glyphicon-eye-open'></span> " + repo.watchers_count + " Watchers</div>" +
                        "</div>" +
                        "</div></div>";
                return markup;
            }

            function formatRepoSelection(repo) {
                return repo.full_name || repo.text;
            }

            $(".js-data-example-ajax").select2({
                width: null,
                containerCssClass: ':all:',
                ajax: {
                    url: "https://api.github.com/search/repositories",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term, // search term
                            page: params.page
                        };
                    },
                    processResults: function (data, params) {
                        // parse the results into the format expected by Select2
                        // since we are using custom formatting functions we do not need to
                        // alter the remote JSON data, except to indicate that infinite
                        // scrolling can be used
                        params.page = params.page || 1;
                        return {
                            results: data.items,
                            pagination: {
                                more: (params.page * 30) < data.total_count
                            }
                        };
                    },
                    cache: true
                },
                escapeMarkup: function (markup) {
                    return markup;
                }, // let our custom formatter work
                minimumInputLength: 1,
                templateResult: formatRepo,
                templateSelection: formatRepoSelection
            });
            $("button[data-select2-open]").click(function () {
                $("#" + $(this).data("select2-open")).select2("open");
            });
            $(":checkbox").on("click", function () {
                $(this).parent().nextAll("select").prop("disabled", !this.checked);
            });
            // copy Bootstrap validation states to Select2 dropdown
            //
            // add .has-waring, .has-error, .has-succes to the Select2 dropdown
            // (was #select2-drop in Select2 v3.x, in Select2 v4 can be selected via
            // body > .select2-container) if _any_ of the opened Select2's parents
            // has one of these forementioned classes (YUCK! ;-))
            $(".select2-single, .select2-multiple, .select2-allow-clear, .js-data-example-ajax").on("select2:open", function () {
                if ($(this).parents("[class*='has-']").length) {
                    var classNames = $(this).parents("[class*='has-']")[0].className.split(/\s+/);
                    for (var i = 0; i < classNames.length; ++i) {
                        if (classNames[i].match("has-")) {
                            $("body > .select2-container").addClass(classNames[i]);
                        }
                    }
                }
            });
        </script>
        <script>
            $(document).ready(function () {
                $("#dep").on('change', function () {
                    var depId = $(this).val();
                    if (depId) {
                        $.ajax({
                            url: '/branch/get/' + depId,
                            method: 'GET',
                            dataType: 'json',
                            delay: 250,
                            success: function (data) {
                                $("#branch").empty();
                                $.each(data, function (key, value) {
                                    $("#branch").append('<option value="' + value + '">' + value + '</option>');
                                });
                            },
                        });
                    } else {
                        $("#branch").empty();
                    }
                });
            });

        </script>
    </body>

</html>