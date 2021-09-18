<link rel="stylesheet" href="<?=site_url('public/style/testimonial.css')?>">
<!-- second header start -->
<header class="second_header">
    <div class="cover">
        <div class="container">
            <div class="header_content">
                <h2>Testimonials</h2>
                <ul>
                    <li><a href="<?=site_url()?>">Home</a></li>
                    <li>Testimonial</li>
                </ul>
            </div>
        </div>
    </div>
</header>
<!-- second header end -->

<!-- testimonial section start -->
<section class="testimonial_section">
    <div class="container">
        <div class="row">
            <?php if(!empty($testimonial)) foreach($testimonial as $key=>$row){?>
            <div class="col-lg-4 col-sm-6">
                <div class="items_content">
                    <div class="article">
                        <div class="rating">
                            <i class="icon ion-ios-quote"></i>
                        </div>
                        <p><?=$row->description?></p>
                    </div>
                    <figure class="author">
                        <img src="<?=($row->path)?>" alt="">
                        <figcaption>
                            <h5><?=($row->name)?></h5>
                            <p><?=($row->designation)?></p>
                        </figcaption>
                    </figure>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- testimonial section end -->
