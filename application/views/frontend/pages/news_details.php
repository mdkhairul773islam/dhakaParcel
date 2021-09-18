<link rel="stylesheet" href="<?=site_url('public/style/single.css')?>">

<!-- second header start -->
<header class="second_header">
    <div class="cover">
        <div class="container">
            <div class="header_content">
                <h2>Blog Details</h2>
                <ul>
                    <li><a href="<?=site_url('')?>">Home</a></li>
                    <li>Blog</li>
                </ul>
            </div>
        </div>
    </div>
</header>
<!-- second header end -->



<!-- single page start -->
<section class="single_page">
    <div class="container">
        <img src="<?php echo site_url($blog[0]->path) ?>" alt="">
        <h3><?= $blog[0]->title; ?></h3>
		<p><?= $blog[0]->description; ?></p>
    </div>
</section>
<!-- single page end -
