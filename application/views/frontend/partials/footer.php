    <!-- footer section start -->
    <footer class="footer_section" id="message">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="company_info">
                        <h3>Information Details</h3>
                        <p>Welcome To <?=($header?$header->web_title:'')?></p><br>
                        <p><?=($footer?$footer->location:'')?></p>
                        <p>Phone : <a
                                href="tel:<?=($footer?$footer->phone:'')?>"><?=($footer? $footer->phone:'Wbsite Title')?></a>
                        </p>
                        <p>Email : <a
                                href="mailto:<?=($footer?$footer->email:'')?>"><?=($footer?$footer->email:'')?></a>
                        </p>
                        <ul class="social_link">
                            <li><a href="<?=($footer?$footer->fb_link:'')?>" target="_blank" class="facebook"><i class="icon ion-logo-facebook"></i></a></li>
                            <li><a href="<?=($footer?$footer->tw_link:'')?>" target="_blank" class="twitter"><i class="icon ion-logo-twitter"></i></a></li>
                            <li><a href="<?=($footer?$footer->in_link:'')?>" target="_blank" class="linkedin"><i class="icon ion-logo-linkedin"></i></a></li>
                            <li><a href="<?=($footer?$footer->youtube:'')?>" target="_blank" class="youtube"><i class="icon ion-logo-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="company_info">
                        <h3>Important Links</h3>
                        <ul class="quick_link">
                            <li><a href="<?=site_url('services')?>">Our Services</a></li>
                            <li><a href="<?=site_url('about')?>">About Us</a></li>
                            <li><a href="<?=site_url('testimonial')?>">Testimonial</a></li>
                            <li><a href="<?=site_url('home/news')?>">News</a></li>
                            <li><a href="<?=site_url('home/contact')?>">Contact</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="company_info">
                        <h3>Our Policy</h3>
                        <ul class="quick_link">
                            <li><a href="<?=site_url('page/terms_condition')?>">Terms and Condition</a></li>
                            <li><a href="<?=site_url('page/privacy_policy')?>">Privacy Policy</a></li>
                            <li><a href="<?=site_url('page/loan_policy')?>">Loan Policy</a></li>
                            <li><a href="<?=site_url('page/return_policy')?>">Return Policy</a></li>
                            <li><a href="<?=site_url('page/help_support')?>">Help and Support</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="company_info">
                        <h3>Instant Contact</h3>
                        <form class="contact_form" action="<?=site_url('home/add_message')?>" method="post">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Full Name" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="phone" placeholder="Mobile" required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="4" placeholder="Message"
                                    required></textarea>
                            </div>
                            <button type="submit" class="btn">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer section end -->


    <!-- second footer start -->
    <footer class="second_footer">
        <div class="container">
            <div class="ft_content">
                <p><span class="copyright">©</span> 2021
                    <?php // ($header ? $header[0]->web_title : 'Website Title'); ?> -
                    All Right Reserved.</p>
                <p>Developed By <a href="http://www.freelanceitlab.com/" target="_blank">FreelanceITLab</a></p>
            </div>
        </div>
    </footer>
    <!-- second footer end -->
    </div>
    
    
    <!-- jQuery js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
    <!-- owl carousel js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!-- jquery.counterup.min js -->
    <script src="<?php echo site_url('public/vendors/counterup/jquery.counterup.min.js')?>"></script>
    <script src="<?php echo site_url('public/vendors/counterup/jquery.waypoints.min.js')?>"></script>
    <!-- text animate js -->
    <script src="<?php echo site_url('public/vendors/text_animate/text_animate.js')?>"></script>
    <!-- include js -->
    <script type="module" src="<?=site_url('public/js/app.js')?>"></script>
    <!-- Toastar -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        
    <script>
        /* carousel js */
        $('.carousel').carousel({
            interval: false,
            interval: 5000,
            pause: "false"
        });

        /* counter js */
        $(function() {
            $('.story_section .status').countUp({
                delay: 10,
                time: 1500
            });
        });

        /* testimonial carousel */
        $('.testimonial_carousel').owlCarousel({
            autoplayTimeout: 5000,
            autoplay: true,
            margin: 20,
            dots: false,
            loop: true,
            nav: false,
            responsive: {
                991: {items: 3},
                768: {items: 2},
                0: {items: 1}
            }
        });
    </script>

    <script>
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>
    
    <?=msg();?>

    </body>
</html>