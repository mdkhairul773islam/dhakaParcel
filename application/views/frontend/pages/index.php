<!-- owl carousel -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<!-- include css -->
<link rel="stylesheet" href="<?=site_url('public')?>/style/home.css">


<!-- header slider start -->
<header class="header_slider carousel slide carousel-fade" id="header_slider" data-ride="carousel">
    <div class="carousel-inner">
        <?php if(!empty($slider)) foreach($slider as $key=>$row){?>
        <div class="carousel-item <?=($key==0?'active':'')?>">
            <img src="<?=site_url($row->path)?>" alt="">
        </div>
        <?php } ?>

        <div class="carousel_cover">
            <div class="container">
                <div class="row">
                    <div class="col-xl-10 offset-xl-1">
                        <h1 class="cd-headline clip">
                            <span class="cd-words-wrapper">
                                <b class="is-visible">Your Courier Partner</b>
                                <b>Fast and Friendly Services</b>
                                <b>Your Package in our Safe hands</b>
                            </span>
                        </h1>
                        <h4>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do</h4>
                        <a href="<?=site_url('user-panel/booking')?>">Booking Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#header_slider" data-slide="prev">
        <i class="icon ion-md-arrow-round-back"></i>
    </a>
    <a class="carousel-control-next" href="#header_slider" data-slide="next">
        <i class="icon ion-md-arrow-round-forward"></i>
    </a>
</header>
<!-- header slider end -->



<!-- work process start -->
<section class="word_process">
    <div class="container">
        <div class="process_content">
            <div class="process_box">
                <div class="icon">
                    <!--<i class="far fa-calendar-check"></i>-->
                    <img src="<?php echo site_url('public/images/icon/01.png');?>" alt="">
                </div>
                <h4>Booking</h4>
            </div>
            <div class="process_box">
                <div class="icon">
                    <!--<i class="fas fa-box-open"></i>-->
                    <img src="<?php echo site_url('public/images/icon/02.png');?>" alt="">
                </div>
                <h4>Packing</h4>
            </div>
            <div class="process_box">
                <div class="icon">
                    <!--<i class="fas fa-shipping-fast"></i>-->
                    <img src="<?php echo site_url('public/images/icon/03.png');?>" alt="">
                </div>
                <h4>Transportation</h4>
            </div>
            <div class="process_box">
                <div class="icon">
                    <!--<i class="fab fa-audible"></i>-->
                    <img src="<?php echo site_url('public/images/icon/04.png');?>" alt="">
                </div>
                <h4>Delivery</h4>
            </div>
        </div>
    </div>
</section>
<!-- work process end -->



<!-- story section start -->
<section class="story_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="story_img">
                    <img src="<?=site_url(!empty($about) ? $about[0]->path : '')?>" alt="">
                </div>
            </div>
            <div class="col-lg-7">
                <div class="story_article">
                    <h3>How we work</h3>
                    <p><?=crop(!empty($about) ? $about[0]->description : '', 150)?></p>
                    <a class="read_btnOne btn" href="<?=site_url('about')?>">Read More</a>
                </div>
            </div>
        </div>
        <div class="story_status">
            <div class="status_box">
                <h3 class="status">500</h3>
                <h5>Project Completed</h5>
            </div>
            <div class="status_box">
                <h3 class="status">210</h3>
                <h5>Packages Delivered</h5>
            </div>
            <div class="status_box">
                <h3 class="status">110</h3>
                <h5>Commercial Goods</h5>
            </div>
            <div class="status_box">
                <h3 class="status">310</h3>
                <h5>Delivered On Time</h5>
            </div>
        </div>
    </div>
</section>
<!-- story section end -->



<!-- sister section start -->
<section class="sister_section">
    <div class="container">
        <div class="title_div">
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <h2>Sister Concern</h2>
                    <a class="show_more" href="<?=site_url('sister_concern')?>" >All Sister Concern</a>
                </div>
                <div class="col-xl-9 col-lg-8">
                    <p>We are a team of people just like you! <strong>We realized there was a need for reliable social media services from a trustworthy company</strong>, and we have come to fill that spot. We love the services we provide and we use them every day.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach($sister as $key => $value) { ?>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <a href="<?=$value->url?>" target="_blank" class="sister_content">
                    <img src="<?php echo site_url($value->path); ?>" alt="...">
                    <h4><?php echo $value->title; ?></h4>
                </a>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- sister section end -->



<!-- service section start -->
<section class="service_section">
    <div class="container">
        <div class="title_div">
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <h2>Our Services</h2>
                    <a class="show_more" href="<?=site_url('services')?>" >All Services</a>
                </div>
                <div class="col-xl-9 col-lg-8">
                    <p>We are a team of people just like you! <strong>We realized there was a need for reliable social media services from a trustworthy company</strong>, and we have come to fill that spot. We love the services we provide and we use them every day.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php if(!empty($services)) foreach($services as $key=>$row){?>
            <div class="col-lg-4 col-sm-6">
                <div class="service_content">
                    <figure class="service_img"><img src="<?=($row->path)?>" alt=""></figure>
                    <div class="service_article">
                        <a href="<?=(site_url("home/service_details/{$row->id}"))?>">
                            <h3><?=($row->title)?></h3>
                            <p><?=crop($row->description, 10)?></p>
                            <small>Read More <i class="icon ion-ios-arrow-round-forward"></i></small>
                        </a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- service section end -->



<!-- testimonial section start -->
<section class="testimonial_section">
    <div class="container">
        <div class="title_div">
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <h2>What Our Clients Say</h2>
                    <a class="show_more" href="<?=site_url('testimonial')?>" >All Testimonial</a>
                </div>
                <div class="col-xl-9 col-lg-8">
                    <p>We are a team of people just like you! <strong>We realized there was a need for reliable social media services from a trustworthy company</strong>, and we have come to fill that spot. We love the services we provide and we use them every day.</p>
                </div>
            </div>
        </div>
        <div class="owl-carousel testimonial_carousel">
            <?php if(!empty($testimonial)) foreach($testimonial as $key=>$row){?>
            <div class="items_content">
                <div class="article">
                    <div class="rating">
                        <i class="icon ion-ios-quote"></i>
                    </div>
                    <p><?=crop($row->description, 20)?></p>
                </div>
                <figure class="author">
                    <img src="<?=($row->path)?>" alt="">
                    <figcaption>
                        <h5><?=($row->name)?></h5>
                        <p><?=($row->designation)?></p>
                    </figcaption>
                </figure>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- testimonial section end -->



<!-- rider section start -->
<section class="rider_section">
    <div class="cover">
        <div class="container">
            <h2>Want to be an Agent's Or Rider ?</h2>
            <a href="#" data-toggle="modal" data-target="#registration">Registration Now</a>
        </div>
    </div>
</section>
<!-- rider section end -->



<!-- registration modal start -->
<div class="modal registration_modal fade" id="registration">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Rider Or Agent Registration</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="registration_form">
                    <p>Please fill up all the required files</p>
                    <form action="<?= site_url('/rider_or_agent_registration'); ?>" method="post">
                        <div class="form-row">
                            <div class="form-group col-lg-4 col-sm-6">
                                <input type="text" class="form-control" name="name" placeholder="Your Name *" required>
                            </div>
                            <div class="form-group col-lg-4 col-sm-6">
                                <input type="email" name="email" class="form-control" placeholder="Email Address">
                            </div>
                            <div class="form-group col-lg-4 col-sm-6">
                                <input type="text" name="phone" class="form-control" placeholder="Phone *" required>
                            </div>
                            <!--<div class="form-group col-lg-4 col-sm-6">
                                <select class="form-control" required>
                                    <option value="" selected disabled>Division *</option>
                                    <option value="">Mymensingh</option>
                                    <option value="">Dhaka</option>
                                    <option value="">Mymensingh</option>
                                    <option value="">Dhaka</option>
                                    <option value="">Mymensingh</option>
                                    <option value="">Dhaka</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-4 col-sm-6">
                                <select class="form-control" required>
                                    <option value="" selected disabled>Gender *</option>
                                    <option value="">Mael</option>
                                    <option value="">Dhaka</option>
                                    <option value="">Mymensingh</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-4 col-sm-6">
                                <select class="form-control" required>
                                    <option value="" selected disabled>District *</option>
                                    <option value="">Mymensingh</option>
                                    <option value="">Dhaka</option>
                                    <option value="">Mymensingh</option>
                                    <option value="">Dhaka</option>
                                    <option value="">Mymensingh</option>
                                    <option value="">Dhaka</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-4 col-sm-6">
                                <select class="form-control" required>
                                    <option value="" selected disabled>Upazila *</option>
                                    <option value="">Mymensingh</option>
                                    <option value="">Dhaka</option>
                                    <option value="">Mymensingh</option>
                                    <option value="">Dhaka</option>
                                    <option value="">Mymensingh</option>
                                    <option value="">Dhaka</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-4 col-sm-6">
                                <select class="form-control" required>
                                    <option value="" selected disabled>Zone *</option>
                                    <option value="">Mymensingh</option>
                                    <option value="">Dhaka</option>
                                    <option value="">Mymensingh</option>
                                    <option value="">Dhaka</option>
                                    <option value="">Mymensingh</option>
                                    <option value="">Dhaka</option>
                                </select>
                            </div>-->
                        </div>
                        <button type="submit" class="btn">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- registration modal end -->



<!-- news section start -->
<section class="news_section">
    <div class="container">
        <div class="title_div">
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <h2>Recent News</h2>
                    <a class="show_more" href="<?=site_url('news')?>" >All News</a>
                </div>
                <div class="col-xl-9 col-lg-8">
                    <p>We are a team of people just like you! <strong>We realized there was a need for reliable social media services from a trustworthy company</strong>, and we have come to fill that spot. We love the services we provide and we use them every day.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php if(!empty($blogs)) foreach($blogs as $key=>$row){ ?>
            <div class="col-lg-4 col-sm-6">
                <div class="news_content">
                    <figure class="news_summary">
                        <img src="<?=($row->path)?>" alt="">
                    </figure>
                    <div class="news_article">
                        <div class="date">
                            <h2><?=date('d', strtotime($row->date))?></h2>
                            <p><?=date('M', strtotime($row->date))?></p>
                        </div>
                        <h4><a href="<?=site_url("home/news_detail/{$row->id}")?>"><?=($row->title)?></a></h4>
                        <p><?=crop($row->description, 22)?></p>
                        <a href="<?=site_url("home/news_detail/{$row->id}")?>" class="read_more">Read more &rarr;</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- news section end -->
