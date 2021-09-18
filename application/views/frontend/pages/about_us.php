<link rel="stylesheet" href="<?=site_url('public/style/single.css')?>">
<!-- second header start -->
<header class="second_header">
    <div class="cover">
        <div class="container">
            <div class="header_content">
                <h2>How we work</h2>
                <ul>
                    <li><a href="<?=site_url('')?>">Home</a></li>
                    <li>About Us</li>
                </ul>
            </div>
        </div>
    </div>
</header>
<!-- second header end -->



<!-- single page start -->
<section class="single_page">
    <div class="container">
        <?php if(!empty($about)){?>
            <img src="<?php echo site_url($about[0]->path);?>" alt="">
            <p><?= $about[0]->description ?></p>
        <?php } ?>
    </div>
</section>
<!-- single page end -->
