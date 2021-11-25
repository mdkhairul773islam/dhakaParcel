<!doctype html>
<html lang="en">

<head>
    <!-- required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- title -->
    <title><?=(isset($title) ? $title : '😢')?> | <?=($header?$header->web_title:'')?></title>
    <!-- favicon -->
    <link rel="shortcut icon" href="<?php echo site_url('public/images/favicon/favicon.png')?>">
    <!-- ionicons -->
    <link rel="stylesheet" href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">

    <!-- selectpicker css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    
    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <!-- include css -->
    <link rel="stylesheet" href="<?php echo site_url('public/style/master.css')?>">
    <!-- axios -->
    <script src="<?=site_url('node_modules/axios/dist/axios.js')?>"></script>
    <!-- vuex -->
    <script src="<?=site_url('node_modules/vuex/dist/vuex.js')?>"></script>
    <!-- Helper -->
    <script src="<?=site_url('public/js/helper.js')?>"></script>
</head>

<?php
    $header = read('header');
?>

<body>
    <div id="app">
        <!-- navbar nav start -->
        <nav class="fixed-top">
            <!-- contact nav -->
            <div class="contact_nav">
                <div class="container">
                    <div class="cnav_content">
                        <div class="contact_access">
                            <a href="mailto:"><i class="icon ion-ios-mail"></i><?=($footer?$footer->email:'')?> </a>
                            <a href="tel:" class="call"><i class="icon ion-ios-call"></i><?=($footer?$footer->phone:'')?> </a>
                        </div>

                        <?php if(!user()){ ?>
                        <ul class="auth">
                            <li>
                                <a href="<?=site_url('login')?>"><span>Log In</span></a>
                            </li>
                            <li>
                                <a href="<?=site_url('registration')?>"><span>Sign Up</span></a>
                            </li>
                        </ul>
                        <?php } else if(user()) { ?>
                        <div class="user-dropdown dropdown">
                            <div class="user-menu" data-toggle="dropdown">
                                <span><?=(user()->name)?></span>
                                <img src="<?= site_url(!empty(user()->image) ? user()->image : 'public/images/user/01.png') ?>"
                                    alt="">
                            </div>
                            <ul class="dropdown-menu">
                                <li><a href="<?=site_url('user-panel/dashboard')?>"><i
                                            class="icon ion-ios-speedometer"></i> Dashboard</a></li>
                                <li><a href="<?=site_url('user-panel/profile')?>"><i class="icon ion-md-person-add"></i>
                                        Profile</a></li>
                                <li><a href="<?=site_url('logout')?>"><i class="icon ion-md-log-out"></i> Logout</a>
                                </li>
                            </ul>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <!-- main nav -->
            <div class="navbar navbar-expand-lg">
                <div class="container">
                    <a class="brand" href="<?=site_url('')?>">
                        <!-- <img src="<?=site_url('public/images/logo/logo.png')?>" alt=""> -->
                        <img src="<?=site_url($header ? $header[0]->web_logo : 'public/images/logo/logo.png')?>" alt="">
                    </a>
                    <button class="navbar-toggler" data-toggle="collapse" data-target="#nav">
                        <i class="icon ion-ios-menu"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="nav">
                        <ul class="navbar-nav">
                            <li><a href="<?=site_url('')?>" class="nav-link">Home</a></li>
                            <li><a href="<?=site_url('about')?>" class="nav-link">About Us</a></li>
                            <li><a href="<?=site_url('sister_concern')?>" class="nav-link">Sister Concern</a></li>
                            <li><a href="<?=site_url('services')?>" class="nav-link">Services</a></li>
                            <li><a href="<?=site_url('testimonial')?>" class="nav-link">Testimonial</a></li>
                            <li><a href="<?=site_url('news')?>" class="nav-link">News</a></li>
                            <li><a href="<?=site_url('contact')?>" class="nav-link">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <!-- navbar nav end -->
