<link rel="stylesheet" href="<?=site_url('public/style/services.css')?>">
<!-- second header start -->
<header class="second_header">
    <div class="cover">
        <div class="container">
            <div class="header_content">
                <h2>Services</h2>
                <ul>
                    <li><a href="<?=site_url()?>">Home</a></li>
                    <li>Services</li>
                </ul>
            </div>
        </div>
    </div>
</header>
<!-- second header end -->

<!-- service section start -->
<section class="service_section">
    <div class="container">
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
