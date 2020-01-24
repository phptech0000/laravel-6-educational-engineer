<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Education Engineering</title>

        <!-- Font Icon -->
        <link rel="stylesheet" href="{{asset('register/fonts/material-icon/css/material-design-iconic-font.min.css')}}">

        <!-- Main css -->
        <link rel="stylesheet" href="{{asset('register/css/style.css')}}">


    </head>
    <body>

        <div class="main">

            <div class="container">
                <form method="POST" class="appointment-form" id="appointment-form" action="{{route('register')}}">
                    <h2>education appointment form</h2>
                    <h3>Basic Information</h3>
                    <div class="form-group-1">
                        <input type="text" name="name" id="title" placeholder="Name" required />
                        <input type="email" name="email" id="email" placeholder="Email" required />
                        <input type="number" name="phone_number" id="phone_number" placeholder="Phone number" required />
                    </div>

                    <div class="form-group-2">
                        <h3>Academic Information</h3>
                      
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                        <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree to the  <a href="#" class="term-service">Terms and Conditions</a></label>
                    </div>
                    <div class="form-submit">
                        <input type="submit" name="submit" id="submit" class="submit" value="Request an appointment" />
                    </div>
                </form>
            </div>
        </div>



        <!-- JS -->
        <script src="{{asset('register/vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('register/js/main.js')}}"></script>




    </body>
</html>