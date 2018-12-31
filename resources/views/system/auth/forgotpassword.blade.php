<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <title>FreshUI - Premium Web App and Admin Template</title>

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
    </head>
    <body>
        <!-- Header -->
        <header class="navbar navbar-default navbar-fixed-top">
            <!-- Header Brand -->
            <a href="javascript:void(0)" class="navbar-brand">
                <img src="img/template/drop.png" alt="FreshUI">
                <span>FreshUI</span>
            </a>
            <!-- END Header Brand -->
        </header>
        <!-- END Header -->

        <!-- Login Container -->
        <div id="login-container">
            <!-- Page Content -->
            <div id="page-content" class="block remove-margin">
               <!-- Register Title -->
               <div class="block-header">
                    <div class="header-section">
                        <h1 class="text-center">Welcome to FreshUI<br><small>Enter your email to get password</small></h1>
                    </div>
                </div>
                <!-- END Register Title -->

                <!-- Register Form -->
                <form action="page_special_login.html" method="post" id="form-register" class="form-horizontal" onsubmit="return false;">
                    <!-- <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                                <input type="text" id="register-username" name="register-username" class="form-control input-lg" placeholder="Username">
                            </div>
                        </div>
                    </div> -->
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
                                <input type="text" id="register-email" name="register-email" class="form-control input-lg" placeholder="Email">
                            </div>
                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-asterisk fa-fw"></i></span>
                                <input type="password" id="register-password" name="register-password" class="form-control input-lg" placeholder="Password">
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-asterisk fa-fw"></i></span>
                                <input type="password" id="register-password-verify" name="register-password-verify" class="form-control input-lg" placeholder="Verify Password">
                            </div>

                        
                            Hidden checkbox. Its checked property will be toggled every time the terms (#btn-terms) button is clicked (js code at the bottom)
                            You can add the checked property by default (the button will be enabled automatically)
                            
                             <input type="checkbox" id="register-terms" name="register-terms" hidden>
                        </div>
                    </div> -->
                    <div class="form-group">
                        <div class="col-xs-8">
                            <!-- <div class="btn-group">
                                <a href="#modal-terms" class="btn btn-sm btn-primary" data-toggle="modal">Terms</a>
                                <button type="button" class="btn btn-sm btn-default" data-toggle="button" id="btn-terms"><i class="fa fa-check"></i> Agree</button>
                            </div> -->
                        </div>
                        <div class="col-xs-4 text-right">
                            <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-angle-right"></i> Get Password</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <p class="text-center remove-margin"><small>Oops, you have an account?</small> <a href="{{ route('system.getSignin') }}" id="link-register"><small>Login!</small></a></p>
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
        <script>
            $(function () {
                // /* Save buttons (remember me and terms) and hidden checkboxes in variables */
                // var checkR = $('#login-remember'),
                //     checkT = $('#register-terms'),
                //     btnR = $('#btn-remember'),
                //     btnT = $('#btn-terms');

                // // Add the 'active' class to button if their checkbox has the property 'checked'
                // if (checkR.prop('checked'))
                //     btnR.addClass('active');
                // if (checkT.prop('checked'))
                //     btnT.addClass('active');

                // // Toggle 'checked' property of hidden checkboxes when buttons are clicked
                // btnR.on('click', function () {
                //     checkR.prop('checked', !checkR.prop('checked'));
                // });
                // btnT.on('click', function () {
                //     checkT.prop('checked', !checkT.prop('checked'));
                // });

                /* Login & Register show-hide */
                // var formLogin = $('#form-login'),
                //     formRegister = $('#form-register');

                // $('#link-login').click(function () {
                //     formLogin.slideUp(250);
                //     formRegister.slideDown(250);
                // });
                // $('#link-register').click(function () {
                //     formRegister.slideUp(250);
                //     formLogin.slideDown(250);
                // });
            });
        </script>
    </body>
</html>