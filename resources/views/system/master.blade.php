<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <title>@yield('title')</title>

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

        <!-- Sweet Alert css -->
        <link href="plugins/sweet-alert/sweetalert2.min.css" rel="stylesheet" type="text/css" />

    </head>
    <!-- In the PHP version you can set the following options from the config file -->
    <!--
        Add one of the following classes to the body element for the desirable feature:
        'sidebar-left-pinned'                         for a left pinned sidebar (always visible > 1200px)
        'sidebar-right-pinned'                        for a right pinned sidebar (always visible > 1200px)
        'sidebar-left-pinned sidebar-right-pinned'    for both sidebars pinned (always visible > 1200px)
    -->
    <body class="header-fixed-top">
        @include('system.layouts.leftsidebar')

        @include('system.layouts.rightsidebar')

        <!-- Page Container -->
        <!-- In the PHP version you can set the following options from the config file -->
        <!-- Add the class .full-width for a full width page (100%, 1920px max width) -->
        <div id="page-container">
            <!-- Header -->
            <!-- In the PHP version you can set the following options from the config file -->
            <!-- Add the class .navbar-default or .navbar-inverse for a light or dark header respectively -->
            <!-- Add the class .navbar-fixed-top or .navbar-fixed-bottom for a fixed header on top or bottom respectively -->
            <!-- If you add the class .navbar-fixed-top remember to add the class .header-fixed-top to <body> element -->
            <!-- If you add the class .navbar-fixed-bottom remember to add the class .header-fixed-bottom to <body> element -->
            <header class="navbar navbar-default navbar-fixed-top">
                <!-- Right Header Navigation -->
                <ul class="nav header-nav pull-right">
                    <li>
                        <a href="javascript:void(0)" id="sidebar-right-toggle">
                            <strong></strong> <i class="fa fa-user"></i>
                        </a>
                    </li>
                </ul>
                <!-- END Right Header Navigation -->

                <!-- Left Header Navigation -->
                <ul class="nav header-nav pull-left">
                    <li>
                        <a href="javascript:void(0)" id="sidebar-left-toggle">
                            <i class="fa fa-bars"></i>
                        </a>
                    </li>
                </ul>
                <!-- END Left Header Navigation -->

                <!-- Header Brand -->
                <a href="index.html" class="navbar-brand">
                    <img src="img/template/drop.png" alt="Crypto">
                    <span>Crypto</span>
                </a>
                <!-- END Header Brand -->
            </header>
            <!-- END Header -->

            @yield('page-content')

                <!-- Remember to include excanvas for IE8 chart support -->
                <!--[if IE 8]><script src="js/helpers/excanvas.min.js"></script><![endif]-->

                <!-- Footer -->
                <footer class="clearfix">
                    <div class="pull-right">
                        Crafted with <i class="fa fa-heart text-danger"></i> by <a href="http://goo.gl/vNS3I" target="_blank">pixelcave</a>
                    </div>
                    <div class="pull-left">
                        <span id="year-copy"></span> &copy; <a href="http://goo.gl/CJE2tn" target="_blank">FreshUI 2.1</a>
                    </div>
                </footer>
                <!-- END Footer -->
            </div>
            <!-- END FX Container -->
        </div>
        <!-- END Page Container -->

        <!-- Scroll to top link, check main.js - scrollToTop() -->
        <a href="javascript:void(0)" id="to-top"><i class="fa fa-angle-up"></i></a>

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

        <!-- Sweet Alert Js  -->
        <script src="plugins/sweet-alert/sweetalert2.min.js"></script>

        <!-- Parsley js -->
        <script type="text/javascript" src="plugins/parsleyjs/parsley.min.js"></script>

            <script type="text/javascript">
                $(document).ready(function() {
                    $('form').parsley();
                    @if($otp)
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    swal({
                        title: 'Enter OTP',
                        text: 'Please check your email to get OTP verification code.',
                        input: 'text',
                        name: 'txtOTP',
                        showCancelButton: true,
                        confirmButtonText: 'Submit',
                        showLoaderOnConfirm: true,
                        confirmButtonClass: 'btn btn-confirm',
                        cancelButtonClass: 'btn btn-cancel',
                        preConfirm: function (otp) {

                            $.ajax({
                                
                                url: "/system/wallet/check-otp",
                                type: 'POST',
                                data: {_token: CSRF_TOKEN, otp:otp},
                                success: function (data) {
                                    if(data ==1){
                                        swal({
                                                title: 'WithDraw Success!',
                                                type: 'success',
                                                confirmButtonClass: 'btn btn-confirm',
                                                allowOutsideClick: false
                                            }).then(function() {
                                                location.href = "/system/wallet/withdraw";
                                            })
                                    }else{
                                        swal({
                                            title: 'Error',
                                            text: "OTP Wrong",
                                            type: 'error',
                                            confirmButtonClass: 'btn btn-confirm',
                                            allowOutsideClick: false
                                        }).then(function() {
                                            location.href = "/system/wallet/withdraw";
                                            })
                                    }
                                }
                            });
                        },
                        allowOutsideClick: false
                    }).then(function() {
                        location.href = "/system/wallet/withdraw";
                    })
                    @endif;
                });    
            </script>

        <script>
            $(function () {
                // Set up timeline scrolling functionality
                $('.timeline-con').slimScroll({height: 565, color: '#000000', size: '3px', touchScrollStep: 100, distance: '0'});
                $('.timeline').css('min-height', '565px');

                // Demo status updates and timeline functionality
                var statusUpdate = $('#status-update');
                var statusUpdateVal = '';

                $('#accept-request').click(function () {
                    $(this).replaceWith('<span class="label label-success">Awesome, you became friends!');
                });

                $('#status-update-btn').click(function () {
                    statusUpdateVal = statusUpdate.val();

                    if (statusUpdateVal) {
                        $('.timeline-con').slimScroll({scrollTo: '0px'});

                        $('.timeline').prepend('<li class="animation-pullDown">' +
                            '<div class="timeline-item">' +
                            '<h4 class="timeline-title"><small class="timeline-meta">just now</small><i class="fa fa-file"></i> Status</h4>' +
                            '<div class="timeline-content"><p>' + $('<div />').text(statusUpdateVal).html().substring(0, 200) + '</p><em>Demo functionality</em></div>' +
                            '</div>' +
                            '</li>');

                        statusUpdate.val('').attr('placeholder', 'I hope you like it! :-)');
                    }
                });

                /*
                 * Flot 0.8.3 Jquery plugin is used for charts
                 *
                 * For more examples or getting extra plugins you can check http://www.flotcharts.org/
                 * Plugins included in this template: pie, resize, stack
                 */

                // Get the elements where we will attach the charts
                var chartClassic = $('#chart-classic');

                // Random data for the charts
                var dataEarnings = [[0, 60], [1, 100], [2, 80], [3, 84], [4, 124], [5, 90], [6, 150]];
                var dataSales = [[0, 30], [1, 50], [2, 40], [3, 42], [4, 62], [5, 45], [6, 75]];

                /* Classic Chart */
                $.plot(chartClassic,
                    [
                        {
                            data: dataEarnings,
                            lines: {show: true, fill: true, fillColor: {colors: [{opacity: 0.25}, {opacity: 0.25}]}},
                            points: {show: true, radius: 7}
                        },
                        {
                            data: dataSales,
                            lines: {show: true, fill: true, fillColor: {colors: [{opacity: 0.15}, {opacity: 0.15}]}},
                            points: {show: true, radius: 7}
                        }
                    ],
                    {
                        colors: ['#f39c12', '#2e3030'],
                        legend: {show: false},
                        grid: {borderWidth: 0, hoverable: true, clickable: true},
                        yaxis: {show: false},
                        xaxis: {show: false}
                    }
                );

                // Creating and attaching a tooltip to the classic chart
                var previousPoint = null, ttlabel = null;
                chartClassic.bind('plothover', function (event, pos, item) {

                    if (item) {
                        if (previousPoint !== item.dataIndex) {
                            previousPoint = item.dataIndex;

                            $('#chart-tooltip').remove();
                            var x = item.datapoint[0], y = item.datapoint[1];

                            if (item.seriesIndex === 1) {
                                ttlabel = '<strong>' + y + '</strong> sales';
                            } else {
                                ttlabel = '$ <strong>' + y + '</strong>';
                            }

                            $('<div id="chart-tooltip" class="chart-tooltip">' + ttlabel + '</div>')
                                .css({top: item.pageY - 45, left: item.pageX + 5}).appendTo("body").show();
                        }
                    }
                    else {
                        $('#chart-tooltip').remove();
                        previousPoint = null;
                    }
                });
            });
        </script>

        @yield('script')
    </body>
</html>