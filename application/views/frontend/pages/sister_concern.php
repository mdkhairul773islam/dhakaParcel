<link rel="stylesheet" href="<?=site_url('public/style/sister_concern.css')?>">

<!-- second header start -->
<header class="second_header">
    <div class="cover">
        <div class="container">
            <div class="header_content">
                <h2>Sister Concern</h2>
                <ul>
                    <li><a href="<?=site_url()?>">Home</a></li>
                    <li>Sister Concern</li>
                </ul>
            </div>
        </div>
    </div>
</header>
<!-- second header end -->



<!-- sister section start -->
<section class="sister_section">
    <div class="container">
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