 <!DOCTYPE html>
<html lang="en">

    <head>
        <title>CLM</title>
        <!-- for-mobile-apps -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="" />




        <script>
            addEventListener("load", function () {
                setTimeout(hideURLbar, 0);
            }, false);

            function hideURLbar() {
                window.scrollTo(0, 1);
            }

        </script>



        <!-- css files -->
        <link href="<?php echo URL::To('/') ?>/assets/css/bootstrap.css" rel='stylesheet' type='text/css' /><!-- bootstrap css -->
        <link href="<?php echo URL::To('/') ?>/assets/css/style.css" rel='stylesheet' type='text/css' /><!-- custom css -->
        <link href="<?php echo URL::To('/') ?>/assets/css/font-awesome.min.css" rel="stylesheet"><!-- fontawesome css -->
        <link href="<?php echo URL::To('/') ?>/assets/css/responsive.css" rel="stylesheet type='text/css' "><!-- responsive css -->

        <!--    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css" />-->
        <link href="<?php echo URL::To('/') ?>/assets/css/semantic.min.css" type="text/css" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo URL::To('/') ?>/assets/css/intlTelInput.css">
        <link rel="stylesheet" href="<?php echo URL::To('/') ?>/assets/css/demo.css"> 
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/css/intlTelInput.css'>





        <script src="<?php echo URL::To('/') ?>/assets/js/jquery-2.1.4.js"></script>
        <script src="<?php echo URL::To('/') ?>/assets/js/semantic.min.js"></script>
        <script src="<?php echo URL::To('/') ?>/assets/js/intlTelInput.js"></script>
    </head>

    <body>
        <!-- top header -->
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <ul class="d-lg-flex header-w3_pvt">
                            <li class="mr-lg-3">
                                <span class="fa fa-facebook"></span>
                                <a href="#" class="">CLM DAMANSARA</a>
                            </li>
                            <li class="mr-lg-3">
                                <span class="fa fa-facebook"></span>
                                <a href="#" class="">CLM MIDVALLEY</a>
                            </li>
                            <li class="mr-lg-3">
                                <span class="fa fa-facebook"></span>
                                <a href="#" class="">CLM SETIA ALAM</a>
                            </li>
                            <li class="mr-lg-3">
                                <span class="fa fa-facebook"></span>
                                <a href="#" class="">CLM SRI PETALING</a>
                            </li>
                            <li>
                                <span class="fa fa-instagram"></span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-3 header-right-w3_pvt">
                        <ul class="d-lg-flex header-w3_pvt justify-content-lg-end">
                            <li class="">
                                <span class="fa fa-envelope"></span>
                                <a href="mailto:info@example.com" class="">info@clmethod.com</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- //top header -->
        <!-- //header -->
        <header class="py-sm-3 pt-3 pb-2">
            <div class="container">
                <div class="row">
                    <div id="logo" class="col-lg-2 col-md-12 col-sm-12 col-xs-2 p-0">
                        <h1> <a href="{{ URL::to('home') }}"><img class="img-responsive" src="<?php echo URL::To('/') ?>/assets/images/logo.png"></a></h1>
                        <label for="drop" class="toggle"><span class="fa fa-bars"></span></label>
                    </div>
                    <!-- nav -->
                    <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12 p-0 mt-2">
                        <nav class="d-lg-flex">
                            <input type="checkbox" id="drop" />
                            <ul class="menu mt-2 ml-auto">
                                <li class="active"><a href="{{ URL::to('home') }}">Home</a></li>
                                <li class=""><a href="<?php echo url::to('/');?>/aboutus">About Us</a></li>
                                <li class=""><a href="<?php echo url::to('/');?>/services">Services</a></li>
                                <li class=""><a href="<?php echo url::to('/');?>/ourteam">Our Team</a></li>
                                <li class=""><a href="<?php echo url::to('/');?>/ourcenters">Our Centres</a></li>
                                <li class=""><a href="#">...</a>
                                    <ul class="menu-dropdown" style="right:-30px; box-shadow:1px 1px 5px #eee">
                                        <li class=""><a href="<?php echo url::to('/');?>/aboutus">About Us</a></li>
                                        <li class=""><a href="<?php echo url::to('/');?>/services">Services</a></li>
                                        <li class=""><a href="<?php echo url::to('/');?>/ourteam">Our Team</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <?php if(!empty(Auth::user())){ ?>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 p-0">
                        <div class=" ml-2 right hidden-xs">
                            <a class="btn-red" href="https://work-demo.in/clmweb/public/outlet-worldtour">Book An Appointment</a>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="clear"></div>
                    <!-- //nav -->
                </div>
            </div>
        </header>
        <!-- //header -->