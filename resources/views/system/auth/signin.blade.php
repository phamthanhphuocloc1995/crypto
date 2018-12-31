<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <title>Login</title>

        <meta name="description" content="FreshUI is a Premium Web App and Admin Template created by pixelcave and published on Themeforest.">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">
        <base href="{{ asset('') }}system/">
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="img/favicon.ico">
        <link rel="apple-touch-icon" href="img/icon57.png" sizes="57x57">
        <link rel="apple-touch-icon" href="img/icon72.png" sizes="72x72">
        <link rel="apple-touch-icon" href="img/icon76.png" sizes="76x76">
        <link rel="apple-touch-icon" href="img/icon114.png" sizes="114x114">
        <link rel="apple-touch-icon" href="img/icon120.png" sizes="120x120">
        <link rel="apple-touch-icon" href="img/icon144.png" sizes="144x144">
        <link rel="apple-touch-icon" href="img/icon152.png" sizes="152x152">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Bootstrap is included in its original form, unaltered -->
        <link rel="stylesheet" href="css/bootstrap.css">

        <!-- Related styles of various icon packs and javascript plugins -->
        <link rel="stylesheet" href="css/plugins.css">

        <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
        <link rel="stylesheet" href="css/main.css">

        <!-- Include a specific file here from css/themes/ folder to alter the default theme of the template -->

        <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
        <link rel="stylesheet" href="css/themes.css">
        <!-- END Stylesheets -->

        <!-- Modernizr (Browser feature detection library) & Respond.js (Enable responsive CSS code on browsers that don't support it, eg IE8) -->
        <script src="js/vendor/modernizr-respond.min.js"></script>

        <!-- Toastr css -->
        <link href="plugins/jquery-toastr/jquery.toast.min.css" rel="stylesheet" />

        <script src='https://www.google.com/recaptcha/api.js'></script>
        
    </head>
    <body>
        <!-- Login Container -->
        <div id="login-container">
            <!-- Page Content -->
            <div id="page-content" class="block remove-margin">
                <!-- Login Title -->
                <div class="block-header">
                    <div class="header-section">
                        <h1 class="text-center">Welcome to FreshUI<br><small>Please Login or Register</small></h1>
                    </div>
                </div>
                <!-- END Login Title -->

                <!-- Login Form -->
                <form action="{{ route('system.postSignin') }}" method="post" id="form-login" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <!-- Social Login -->
                        <!-- <div class="col-xs-6">
                            <a href="javascript:void(0)" class="btn btn-lg btn-info btn-block"><i class="fa fa-facebook"></i> Facebook</a>
                        </div>
                        <div class="col-xs-6">
                            <a href="javascript:void(0)" class="btn btn-lg btn-info btn-block"><i class="fa fa-twitter"></i> Twitter</a>
                        </div> -->
                        <!-- END Social Login -->
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                                <input type="email" id="login-email" name="login-email" class="form-control input-lg" placeholder="Email" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-asterisk fa-fw"></i></span>
                                <input type="password" id="login-password" name="login-password" class="form-control input-lg" placeholder="Password" maxlength=25 required>
                            </div>
                        </div>
                    </div>

                    <div class="g-recaptcha" data-sitekey="6Leie4UUAAAAAAQEzvbxOVamWO5i2sB-RqckTIVY"></div>

                    <div class="form-group">
                        <div class="col-xs-8">
                            <div class="btn-group">
                            <a href="{{ route('system.getForgotPassword') }}"><button type="button" class="btn btn-sm btn-default disabled">Forgot password?</button></a>
                            </div>
                        </div>
                        <div class="col-xs-4 text-right">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Login</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <p class="text-center remove-margin"><small>Don't have an account?</small> <a href="{{ route('system.getSignup') }}" id="link-login"><small>Create one for free!</small></a></p>
                        </div>
                    </div>
                </form>
                <!-- END Login Form -->

                <!-- Register Form -->
                <form action="page_special_login.html" method="post" id="form-register" class="form-horizontal display-none" onsubmit="return false;">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                                <input type="text" id="register-username" name="register-username" class="form-control input-lg" placeholder="Username">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
                                <input type="text" id="register-email" name="register-email" class="form-control input-lg" placeholder="Email">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-asterisk fa-fw"></i></span>
                                <input type="password" id="register-password" name="register-password" class="form-control input-lg" placeholder="Password">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-asterisk fa-fw"></i></span>
                                <input type="password" id="register-password-verify" name="register-password-verify" class="form-control input-lg" placeholder="Verify Password">
                            </div>

                            <!--
                            Hidden checkbox. Its checked property will be toggled every time the terms (#btn-terms) button is clicked (js code at the bottom)
                            You can add the checked property by default (the button will be enabled automatically)
                            -->
                            <!-- <input type="checkbox" id="register-terms" name="register-terms" hidden> -->
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-8">
                            <!-- <div class="btn-group">
                                <a href="#modal-terms" class="btn btn-sm btn-primary" data-toggle="modal">Terms</a>
                                <button type="button" class="btn btn-sm btn-default" data-toggle="button" id="btn-terms"><i class="fa fa-check"></i> Agree</button>
                            </div> -->
                        </div>
                        <div class="col-xs-4 text-right">
                            <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-angle-right"></i> Register</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <p class="text-center remove-margin"><small>Oops, you have an account?</small> <a href="javascript:void(0)" id="link-register"><small>Login!</small></a></p>
                        </div>
                    </div>
                </form>
                <!-- END Register Form -->
            </div>
            <!-- END Page Content -->
        </div>
        <!-- END Login Container -->

        <!-- Include Jquery library from Google's CDN but if something goes wrong get Jquery from local file (Remove 'http:' if you have SSL) -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script>!window.jQuery && document.write(decodeURI('%3Cscript src="js/vendor/jquery-1.11.1.min.js"%3E%3C/script%3E'));</script>

        <!-- Bootstrap.js, Jquery plugins and custom Javascript code -->
        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <!-- Javascript code only for this page -->
        <!-- Toastr js -->
        <script src="plugins/jquery-toastr/jquery.toast.min.js" type="text/javascript"></script>
        @if(Session::has('flash_type'))
            <script type="text/javascript">
                $.toast({
                heading: '{{ (Session::get('flash_type') == 'success') ? 'Success!' : 'Error!' }}',
                text: "{!! Session::get('flash_message') !!}",
                position: 'top-right',
                loaderBg: '{{ (Session::get('flash_type') == 'success') ? '#5ba035' : '#bf441d' }}',
                icon: '{{ (Session::get('flash_type') == 'success') ? 'success' : 'error' }}',
                hideAfter: 3000,
                stack: 1
                });
            </script>
        @endif
        @if(count($errors) > 0)
            @foreach($errors->all() as $error)
                <script type="text/javascript">
                    $.toast({
                    heading: 'Error!',
                    text: "{!! $error !!}",
                    position: 'top-right',
                    loaderBg: '#bf441d',
                    icon: 'error',
                    hideAfter: 3000,
                    stack: 1
                    });
                </script>
            @endforeach
        @endif
    </body>
</html>