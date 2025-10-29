jQuery(function ($) {
    "use strict";
    
    $('.tab').click(function() {
        var testimonialType = $(this).data('testimonial-type');
        $('.tab').removeClass('active');
        $(this).addClass('active');

        $('.testimonial-category').removeClass('active');
        $('.' + testimonialType).addClass('active');
    });

});