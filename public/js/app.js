// fixed nav bar in jquery
$(window).scroll(function() {
    if ($(this).scrollTop() > 75) {
        $('.contact_nav, .navbar').addClass('active');
    } else {
        $('.contact_nav, .navbar').removeClass('active');
    };
});