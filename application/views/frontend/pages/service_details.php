<link rel="stylesheet" href="<?=site_url('public/style/single.css')?>">

<!-- second header start -->
<header class="second_header">
    <div class="cover">
        <div class="container">
            <div class="header_content">
                <h2>Service Details</h2>
                <ul>
                    <li><a href="<?=site_url('')?>">Home</a></li>
                    <li>Service</li>
                </ul>
            </div>
        </div>
    </div>
</header>
<!-- second header end -->


<!-- single page start -->
<section class="single_page">
    <div class="container">
        <h3><?= $service->title; ?></h3>

        <p><?= $service->description; ?></p>
    </div>
</section>
<!-- single page end -
