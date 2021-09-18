<link rel="stylesheet" href="<?php echo site_url('public/style/contact.css')?>">
<!-- second header start -->
<header class="second_header">
    <div class="cover">
        <div class="container">
            <div class="header_content">
                <h2>Contact</h2>
                <ul>
                    <li><a href="<?=site_url('')?>">Home</a></li>
                    <li>Contact</li>
                </ul>
            </div>
        </div>
    </div>
</header>
<!-- second header end -->


<?php $footer = read('footer');?>

<!-- contact section strat -->
<section class="contact_section" id="message">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="contact_info">
                    <div class="address">
                        <h2>Where to Find Us</h2>
                        <p><?=($footer ? $footer[0]->location : '')?></p>
                        <a href="https://goo.gl/maps/xB3zibLVg12Svgrx7" target="_blank">On Google Map</a>
                    </div>
                    <article>
                        <h2>Hear our voice</h2>
                        <p>Say hello <a href="tel:<?=($footer ? $footer[0]->phone : '')?>"><?=($footer ? $footer[0]->phone : '')?></a></p>
                    </article>
                    <article>
                        <h2>Information</h2>
                        <p><a href="mailto:<?=($footer ? $footer[0]->email : '')?>"><?=($footer ? $footer[0]->email : '')?></a></p>
                    </article>
                </div>
            </div>

            <div class="col-md-8">
                <div class="request_form">
                    <h2>Reach out to us</h2>
                    <form action="<?php echo site_url('home/add_message');?>" method="post">
                        <div class="form-row">
                            <div class="form-group col-md-6 required">
                                <label for="first_name">First name</label>
                                <input type="text" id="first_name" name="name" class="form-control" required>
                            </div>
                            <div class="form-group col-md-6 required">
                                <label for="last_name">Last name</label>
                                <input type="text" id="last_name" name="last_name" class="form-control" required>
                            </div>
                            <div class="form-group col-md-6 required">
                                <label for="email">Email address</label>
                                <input type="email" id="email" name="email" class="form-control" required>
                            </div>
                            <div class="form-group col-md-6 required">
                                <label for="phone_number">Phone number</label>
                                <input type="text" id="phone_number" name="phone" class="form-control" required>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="description">Your Message</label>
                                <textarea id="description" name="message" class="form-control" rows="5" required></textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-primary">Send message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- contact section strat -->