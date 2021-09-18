<!-- owl carousel -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<!-- zoom images -->
<link rel="stylesheet" href="<?=site_url('public/vendors/elevatezoom/css/jquery.ez-plus.css')?>">

<style>
    /* details style start */
    .details_section {
        background: #F3F3F3;
        padding: 20px 0;
    }
    .zoomWindow {
        height: 100% !important;
        width: 100% !important;
        overflow: hidden;
    }
    @media screen and (max-width: 991px) {
        .zoomWindow {display: none !important;}
    }
    .details_section .product_images {
        border: 1px solid #fff;
        background: #fff;
        text-align: center;
        overflow: hidden;
        height: 346px;
        position: relative;
    }
    .details_section .product_images img {
        height: 100%;
        width: 100%;
        object-fit: cover;
    }
    .details_section .tabs_product {margin-top: 12px;}
    .details_section .tabs_product .owl-nav {
        justify-content: space-between;
        top: calc(50% - 4px);
        align-items: center;
        transition: all 0.3s;
        position: absolute;
        height: 0;
        left: 0;
        width: 100%;
        display: flex;
        opacity: 1;
    }
    .details_section .tabs_product .owl-nav button {
        justify-content: center;
        align-items: center;
        background: #00A8FF;
        border-radius: 50%;
        width: 25px;
        height: 25px;
        border: none;
        display: flex;
    }
    .details_section .tabs_product .owl-nav button.owl-prev {padding-left: 4px !important;}
    .details_section .tabs_product .owl-nav button.owl-prev::after {
        border-right: 2px solid transparent;
        border-top: 2px solid transparent;
        border-bottom: 2px solid #FFF;
        border-left: 2px solid #FFF;
        display: inline-block;
        content: "";
        width: 9px;
        height: 9px;
        transform: rotate(45deg);
    }
    .details_section .tabs_product .owl-nav button.owl-next {padding-right: 4px !important;}
    .details_section .tabs_product .owl-nav button.owl-next::after {
        border-bottom: 2px solid transparent;
        border-left: 2px solid transparent;
        border-right: 2px solid #FFF;
        border-top: 2px solid #FFF;
        transform: rotate(45deg);
        display: inline-block;
        content: "";
        width: 9px;
        height: 9px;
    }
    .details_section .tabs_product .owl-nav button:focus {outline: none;}
    .details_section .tabs_product .owl-nav button span {display: none;}
    .details_section .tabs_product a {
        display: inline-block;
        height: 65px;
    }
    .details_section .tabs_product a img {
        object-fit: cover;
        width: 100%;
        height: 100%;
    }

    /* product details style start */
    .details_section .product_details {min-height: 20vh;}
    .details_section .product_details h3 {
        font-weight: bold;
        color: #001E32;
        margin-top: 0;
    }
    .details_section .product_details .price {color: #E64723;}
    .details_section .product_details p strong {
        display: inline-block;
        min-width: 100px;
    }
</style>

<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Prodcut View</h1>
                </div>
            </div>
            <div class="panel-body details_section">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <?php
                                $images = getImages($product->id);
                                if(!empty($images)){
                            ?>
                            <div class="product_images">
                                <img id="img_01" src="<?=site_url($images[0]->large)?>" alt="">
                            </div>
                            <div class="owl-carousel tabs_product" id="gal1">
                                <?php foreach($images as $row){ ?>
                                <a href="#" data-update="" data-image="<?=site_url($row->large)?>">
                                    <img src="<?=site_url($row->small)?>" alt="">
                                </a>
                                <?php } ?>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="col-md-6">
                            <div class="product_details">
                                <h3><?=($product->title)?></h3>
                                <p><strong>Short Description</strong> :<?=($product->short_description)?></p>
                                <p><strong>Description</strong> : <?=($product->description)?></p>
                                <p class="price"><strong>Price</strong> : ৳<?=($product->price)?></p>
                                <p class="price"><strong>Discount</strong> : <?=($product->discount)?></p>
                                <p><strong>Brand</strong> : <?=($product->brand)?></p>
                                <p><strong>Category</strong> : <?=($product->category)?></p>
                                <p><strong>Sub-Category</strong> : <?=($product->subcategory)?></p>
                                <p><strong>Color</strong> :
                                    <?php
                                        $colors = getProductColors($product->id);
                                        if(!empty($colors)) foreach ($colors as $key => $row) {
                                            echo $row->color.',';
                                        }
                                    ?>
                                </p>
                                <p><strong>Size</strong> :
                                    <?php
                                        $sizes = getProductSizes($product->id);
                                        if(!empty($sizes)) foreach ($sizes as $key => $row) {
                                            echo $row->size.',';
                                        }
                                    ?>
                                </p>
                                <p><strong>Purchase Price</strong> : <?=($product->purchase_price ? $product->purchase_price : $product->d_purchase_price)?></p>
                                <p><strong>Sale Price</strong> : <?=($product->price)?></p>
                                <p><strong>Min-Qty</strong> : <?=($product->min_qty)?></p>
                                <p><strong>Warranty</strong> : <?=($product->warranty)?></p>
                                <p><strong>Feature Product</strong> : <?=ucfirst($product->feature_product)?></p>
                                <p><strong>Status</strong> : <?=ucfirst($product->status)?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

<!-- carousel js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<!-- zoom images -->
<script src="<?=site_url('public/vendors/elevatezoom/js/jquery.ez-plus.js')?>"></script>
<script src="<?=site_url('public/vendors/elevatezoom/js/web.js')?>"></script>

<script>
    /* tabs product */
    $('.tabs_product').owlCarousel({
        autoplay:true,
        loop:false,
        nav:false,
        dots:false,
        autoplayTimeout:5000,
        margin: 5,
        responsive:{
            1200:{items:4},
            991:{items:3},
            768:{items:3},
            576:{items:3},
            0:{items:3}
        }
    });
</script>
