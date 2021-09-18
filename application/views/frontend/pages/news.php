<link rel="stylesheet" href="<?=site_url('public/style/news.css')?>">
<!-- second header start -->
<header class="second_header">
    <div class="cover">
        <div class="container">
            <div class="header_content">
                <h2>Blog and Event</h2>
                <ul>
                    <li><a href="<?=site_url()?>">Home</a></li>
                    <li>Blog</li>
                </ul>
            </div>
        </div>
    </div>
</header>
<!-- second header end -->

<!-- news section start -->
<section class="news_section">
    <div class="container">
        <div class="row">
            <?php if(!empty($blogs)) foreach($blogs as $key=>$value){ ?>
            <div class="col-lg-4 col-sm-6" data-aos="fade-up">
                <div class="news_content">
                    <figure class="news_summary">
                        <img src="<?php echo site_url($value->path)?>" alt="">
                    </figure>
                    <div class="news_article">
                        <div class="date">
                            <h2><?=(date('d', strtotime($value->date)))?></h2>
                            <p><?=(date('M', strtotime($value->date)))?></p>
                        </div>
                        <h4><a href="<?= site_url("home/news_detail/$value->id");?>"><?= $value->title?></a></h4>
                        <p><?=substr(strip_tags($value->description), 0, 125)?></p>
                        <a href="<?= site_url("home/news_detail/$value->id");?>" class="read_more">Read more &rarr;</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- news section end -->
