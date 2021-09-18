<!-- include css -->
<link rel="stylesheet" href="<?=site_url('public/style/single.css')?>">

<!-- second header start -->
<header class="second_header">
    <div class="cover">
        <div class="container">
            <div class="header_content">
                <h2><?=filter(!empty($page_content->title) ? $page_content->title : '')?></h2>
                <ul>
                    <li><a href="<?=site_url('')?>">Home</a></li>
                    <li><?=filter(!empty($page_content->title) ? $page_content->title : '')?></li>
                </ul>
            </div>
        </div>
    </div>
</header>
<!-- second header end -->


<!-- single page start -->
<section class="single_page">
    <div class="container">
        <?php if($page_content) { ?>
        	<?=filter($page_content->description)?>
        <?php } else { ?>
        	<p>Nothing</p>
        <?php } ?>
    </div>
</section>
<!-- single page end -->
