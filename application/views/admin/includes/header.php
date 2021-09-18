<!DOCTYPE html>
<html lang="en" ng-app="MainApp">
<head>
    <?php $site_info = read('header'); ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Keywords" content="<?php echo isset($meta_keyword) ? $meta_keyword : ''; ?>">
    <meta name="description" content="<?php echo isset($meta_description) ? $meta_description : ''; ?>">

    <title><?php echo ucwords($meta_title); ?></title>
    <!-- favicon -->
    <link rel="icon" href="<?php echo site_url(isset($site_info) ? $site_info[0]->fev_icon : ''); ?>" type="image/x-icon" />
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo site_url('private/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <!-- Bootstrap Date Picker -->
    <link href="<?php echo site_url('private/plugins/bootstrap-datetimepicker-master/build/css/bootstrap-datetimepicker.min.css'); ?>" rel="stylesheet">
    <!-- Bootstrap file upload CSS -->
    <link href="<?php echo site_url('private/plugins/bootstrap-fileinput-master/css/fileinput.min.css') ;?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo site_url('private/css/simple-sidebar.css'); ?>" rel="stylesheet">
    <!-- Awesome Font CSS -->
    <link href="<?php echo site_url('private/css/font-awesome.min.css'); ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo site_url('private/css/profile.css'); ?>" rel="stylesheet">
    <link href="<?php echo site_url('private/css/form.css'); ?>" rel="stylesheet">
    <link href="<?php echo site_url('private/css/top-nav.css'); ?>" rel="stylesheet">
    <link href="<?php echo site_url('private/css/style.css'); ?>" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="<?php echo site_url('private/css/responsive.css'); ?>" rel="stylesheet">
    <!-- Freelance iT Lab official CDN -->
    <link href="<?php echo site_url('private/css/fit_official.css'); ?>"  rel="stylesheet">

    <!-- Angular -->
    <script type="text/javaScript" src="<?php echo site_url('private/js/angular.js'); ?>"></script>
    <script type="text/javaScript" src="<?php echo site_url('private/js/angular-sanitize.min.js'); ?>"></script>
    <script type="text/javaScript" src="<?php echo site_url('private/js/dirPagination.js'); ?>"></script>
    <script type="text/javaScript" src="<?php echo site_url('private/js/ng-controller/app.js'); ?>"></script>

    <!-- jQuery -->
    <script type="text/javaScript" src="<?php echo site_url('private/js/jquery.js'); ?>"></script>
    <!-- includ moment for bootstrap calander -->
    <script type="text/javascript" src="<?php echo site_url('private/js/Moment.js'); ?>"></script>
    <script type="text/javaScript" src="<?php echo site_url('private/plugins/bootstrap-datetimepicker-master/build/js/bootstrap-datetimepicker.min.js') ;?>"></script>
    <!-- texteditor Core Javascript -->

    <!-- CHART -->
    <script src="<?php echo site_url('private/js/loader.js'); ?>"></script>
    <script src="<?php echo site_url('private/plugins/tinymce/js/tinymce/tinymce.min.js')?>"></script>

    <script type="text/javascript" src="<?php echo site_url('private/js/inwordbn.js'); ?>"></script>

    <script>
            // Texteditor Script
            tinymce.init({
                selector: '#tinyTextarea',
                theme: 'modern',
                plugins: [
                  'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
                  'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
                  'save table contextmenu directionality emoticons template paste textcolor'
                ],
                // content_css: 'css/content.css',
                toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons | code',
                skin: 'lightgray',
                content_css: "<?php echo site_url('private/css/tinymce.css'); ?>"
            });

    </script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
    <script src="<?=site_url('node_modules/axios/dist/axios.js')?>"></script>

    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script type="text/javascript">
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>
    <style>
        /* dark linear css start */
        #wrapper.dark_linear .sidebar-nav li > ul.collapse li a,
        #wrapper.dark_linear .sidebar-nav>li.active {background: linear-gradient(60deg, #536272 0%, #333f4b 100%);}
        #wrapper.dark_linear nav.content-fixed-nav ul li.open,
        #wrapper.dark_linear nav.content-fixed-nav ul li:hover,
        #wrapper.dark_linear .sidebar-nav>li:hover,
        #wrapper.dark_linear .sidebar-nav li a:hover {background: linear-gradient(60deg, #5d6e80 0%, #3e4b5a 100%);}
        #wrapper.dark_linear .content-fixed-nav,
        #wrapper.dark_linear h3.sidebar-brand,
        #wrapper.dark_linear .sidebar-nav {background: linear-gradient(60deg, #29323c 0%, #485563 100%);}
        #wrapper.dark_linear .content-fixed-nav > ul > li > a,
        #wrapper.dark_linear .sidebar-nav li a {color: #eee;}
        #wrapper.dark_linear .sidebar-nav>li.active>a,
        #wrapper.dark_linear .sidebar-nav > .sidebar-brand a {color: #fff;}
        #wrapper.dark_linear .content-fixed-nav > ul > li > a span {color: #fff !important;}
        #wrapper.dark_linear h3.sidebar-brand {border-bottom: 1px solid rgba(255,255,255,.2);}
        #wrapper.dark_linear .content-fixed-nav > ul > li > a {border: 1px solid rgba(255,255,255,.2);}
        /* dark linear css end */


        /* dark css start */
        #wrapper.dark .sidebar-nav li > ul.collapse li a,
        #wrapper.dark .sidebar-nav>li.active {background: #454b60;}
        #wrapper.dark nav.content-fixed-nav ul li.open,
        #wrapper.dark nav.content-fixed-nav ul li:hover,
        #wrapper.dark .sidebar-nav>li:hover,
        #wrapper.dark .sidebar-nav li a:hover {background: #4f566f;}
        #wrapper.dark .content-fixed-nav,
        #wrapper.dark h3.sidebar-brand,
        #wrapper.dark .sidebar-nav {background: #3A3F51;}
        #wrapper.dark .content-fixed-nav > ul > li > a,
        #wrapper.dark .sidebar-nav li a {color: #eee;}
        #wrapper.dark .sidebar-nav>li.active>a,
        #wrapper.dark .sidebar-nav > .sidebar-brand a {color: #fff;}
        #wrapper.dark .content-fixed-nav > ul > li > a span {color: #fff !important;}
        #wrapper.dark h3.sidebar-brand {border-bottom: 1px solid rgba(255,255,255,.2);}
        #wrapper.dark .content-fixed-nav > ul > li > a {border: 1px solid rgba(255,255,255,.2);}
        /* dark css end */


        /* light linear css start */
        #wrapper.light_linear .sidebar-nav li > ul.collapse li a,
        #wrapper.light_linear .sidebar-nav>li.active {background: linear-gradient(60deg, #9f89df 0%, #8a92f7 100%);}
        #wrapper.light_linear nav.content-fixed-nav ul li.open,
        #wrapper.light_linear nav.content-fixed-nav ul li:hover,
        #wrapper.light_linear .sidebar-nav>li:hover,
        #wrapper.light_linear .sidebar-nav li a:hover {background: linear-gradient(60deg, #b09de5 0%, #a2a8f8 100%);}
        #wrapper.light_linear .content-fixed-nav,
        #wrapper.light_linear h3.sidebar-brand,
        #wrapper.light_linear .sidebar-nav {background: linear-gradient(135deg,#8f75da 0,#727cf5 60%);}
        #wrapper.light_linear .content-fixed-nav > ul > li > a,
        #wrapper.light_linear .sidebar-nav li a {color: #eee;}
        #wrapper.light_linear .sidebar-nav>li.active>a,
        #wrapper.light_linear .sidebar-nav > .sidebar-brand a {color: #fff;}
        #wrapper.light_linear .content-fixed-nav > ul > li > a span {color: #fff !important;}
        #wrapper.light_linear h3.sidebar-brand {border-bottom: 1px solid rgba(255,255,255,.2);}
        #wrapper.light_linear .content-fixed-nav > ul > li > a {border: 1px solid rgba(255,255,255,.2);}
        /* light linear css end */


        /* light css start */
        #wrapper.light .sidebar-nav li > ul.collapse li a,
        #wrapper.light .sidebar-nav>li.active {background: #9f89df;}
        #wrapper.light nav.content-fixed-nav ul li.open,
        #wrapper.light nav.content-fixed-nav ul li:hover,
        #wrapper.light .sidebar-nav>li:hover,
        #wrapper.light .sidebar-nav li a:hover {background: #b09de5;}
        #wrapper.light .content-fixed-nav,
        #wrapper.light h3.sidebar-brand,
        #wrapper.light .sidebar-nav {background: #8f75da;}
        #wrapper.light .content-fixed-nav > ul > li > a,
        #wrapper.light .sidebar-nav li a {color: #eee;}
        #wrapper.light .sidebar-nav>li.active>a,
        #wrapper.light .sidebar-nav > .sidebar-brand a {color: #fff;}
        #wrapper.light .content-fixed-nav > ul > li > a span {color: #fff !important;}
        #wrapper.light h3.sidebar-brand {border-bottom: 1px solid rgba(255,255,255,.2);}
        #wrapper.light .content-fixed-nav > ul > li > a {border: 1px solid rgba(255,255,255,.2);}
        /* light css end */


        /* night linear css start */
        #wrapper.night_linear .sidebar-nav li > ul.collapse li a,
        #wrapper.night_linear .sidebar-nav>li.active {background: linear-gradient(60deg, #b09ed8 0%, #fddaf3 100%);}
        #wrapper.night_linear nav.content-fixed-nav ul li.open,
        #wrapper.night_linear nav.content-fixed-nav ul li:hover,
        #wrapper.night_linear .sidebar-nav>li:hover,
        #wrapper.night_linear .sidebar-nav li a:hover {background: linear-gradient(60deg, #bfb0e0 0%, #fef2fb 100%);}
        #wrapper.night_linear .content-fixed-nav,
        #wrapper.night_linear h3.sidebar-brand,
        #wrapper.night_linear .sidebar-nav {background: linear-gradient(to top, #a18cd1 0%, #fbc2eb 100%);}
        #wrapper.night_linear .content-fixed-nav > ul > li > a,
        #wrapper.night_linear .sidebar-nav li a {color: #eee;}
        #wrapper.night_linear .sidebar-nav>li.active>a,
        #wrapper.night_linear .sidebar-nav > .sidebar-brand a {color: #fff;}
        #wrapper.night_linear .content-fixed-nav > ul > li > a span {color: #fff !important;}
        #wrapper.night_linear h3.sidebar-brand {border-bottom: 1px solid rgba(255,255,255,.2);}
        #wrapper.night_linear .content-fixed-nav > ul > li > a {border: 1px solid rgba(255,255,255,.2);}
        /* night linear css end */


        /* night css start */
        #wrapper.night .sidebar-nav li > ul.collapse li a,
        #wrapper.night .sidebar-nav>li.active {background: #b09ed8;}
        #wrapper.night nav.content-fixed-nav ul li.open,
        #wrapper.night nav.content-fixed-nav ul li:hover,
        #wrapper.night .sidebar-nav>li:hover,
        #wrapper.night .sidebar-nav li a:hover {background: #bfb0e0;}
        #wrapper.night .content-fixed-nav,
        #wrapper.night h3.sidebar-brand,
        #wrapper.night .sidebar-nav {background: #a18cd1;}
        #wrapper.night .content-fixed-nav > ul > li > a,
        #wrapper.night .sidebar-nav li a {color: #eee;}
        #wrapper.night .sidebar-nav>li.active>a,
        #wrapper.night .sidebar-nav > .sidebar-brand a {color: #fff;}
        #wrapper.night .content-fixed-nav > ul > li > a span {color: #fff !important;}
        #wrapper.night h3.sidebar-brand {border-bottom: 1px solid rgba(255,255,255,.2);}
        #wrapper.night .content-fixed-nav > ul > li > a {border: 1px solid rgba(255,255,255,.2);}
        /* night css end */
        .default {background: #ECEFF4;}
    </style>

</head>


<?php
    $theme = readTable('site_meta', ['meta_key'=>'theme']);
?>


<body>
    <div id="wrapper" class="<?=($theme ? $theme[0]->meta_value:'')?>">
        <div class="color_plate">
            <a href="" class="setting_btn">
                <i class="fa fa-cog" aria-hidden="true"></i>
            </a>
            <ul class="color_list">
                <li class="dark_linear" theme="dark_linear"></li>
                <li class="dark" theme="dark"></li>
                <li class="light_linear" theme="light_linear"></li>
                <li class="light" theme="light"></li>
                <li class="night_linear" theme="night_linear"></li>
                <li class="night" theme="night"></li>
                <li class="default" theme="default"></li>
                <li class="dark_linear" theme="dark_linear"></li>
                <li class="dark" theme="dark"></li>
                <li class="light_linear" theme="light_linear"></li>
                <li class="light" theme="light"></li>
                <li class="night_linear" theme="night_linear"></li>
                <li class="night" theme="night"></li>
                <li class="default" theme="default"></li>
            </ul>
        </div>


        <script>
            var _d = (x)=>document.querySelector(x);
            // color_plate.active
            var setting_btn   = _d('.setting_btn');
            var color_plate   = _d('.color_plate')
            if(setting_btn){
                setting_btn.onclick =()=>{
                    if(color_plate.classList.contains('active')){
                        color_plate.classList.remove('active');
                    }
                    else{
                        color_plate.classList.add('active');
                    }
                }
            }

            var container = read('#wrapper');
            var colors = readAll('.color_list li');
            if(colors) Object.values(colors).forEach(color=>{

                color.addEventListener('click', ()=>{
                    // if(container) container.classList.add('');
                    Object.values(colors).forEach(check=>{
                        var readyClass = check.getAttribute('theme');
                        console.log(container.classList.contains(readyClass));
                        if(container.classList.contains(readyClass)){
                            container.classList.remove(readyClass)
                        }
                    });
                    var newClass = color.getAttribute('theme');
                    container.classList.add(newClass)

                    axios.post(url+'Ajax/save_theme', makeFormData({theme:newClass}))
                    .then(response=>{})
                    .catch(err=>console.log(err));

                });
            });

            // Action and Execute when Focus in the window
            window.onclick = (event)=>{
                if(!event.target.closest('.color_plate')){
                    color_plate.classList.remove('active');
                }
            }
        </script>
