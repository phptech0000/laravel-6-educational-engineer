<!DOCTYPE html>
<html>
    <head>
        <title>Education Engineer Reset  Password</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/assets.css')}}"media="all">

        <!-- TYPOGRAPHY ============================================= -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/typography.css')}}"media="all">

        <!-- SHORTCODES ============================================= -->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/shortcodes/shortcodes.css')}}"media="all">

        <!-- STYLESHEETS ============================================= -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css')}}"media="all">
        <link class="skin" rel="stylesheet" type="text/css" href="{{asset('assets/css/color/color-1.css')}}"media="all"/>
    </head>
    <body>
        <div class="section-area section-sp2 bg-fix ovbl-dark join-bx text-center" style="background-image:url({{$message->embed(public_path().'assets/images/background/bg1.jpg')}});">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="join-content-bx text-white">
                            <h2>Welcome <?= $user->firstname ?>  The Education Engineer  platform <br/> your time</h2>
                            <h4><span class="counter">57,000 </span> Engineer and staff Education</h4>
                            <p>Education Engineer is a platform that aims to
                                qualify the engineer to succeed 
                                in his work through reliable courses 
                                from international universities. 
                                It also helps the learner to 
                                communicate directly with his academic 
                                professor to find out his qualification 
                                level and his preparation from a 
                                distinguished scientific level and a 
                                training level. He can also follow his 
                                case from his university from here to 
                                It provides less effort, <?=$user->email ?> , Please click on the below link to verify your email account and to speak the path towards better knowledge
                                </p>
                             <a href="<?= route('user.RestPassword' , $token) ?>" class="btn button-md">Reset Password </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About Content END ==== -->
    </body>
</html>

