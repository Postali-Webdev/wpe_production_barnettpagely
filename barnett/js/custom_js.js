jQuery(document).ready(function($) {
    console.log('JS ready');

    $('#menu-mobile-menu > .menu-item-has-children.has_sub').on('click', function(e){
        
        if( $(e.target).parent()[0].className !== 'mobile-menu' ) {
            return;
        } else {
            $(this).find('.second').toggleClass('active');
            $(this).toggleClass('active');
        }
    })

    $('.menu-item-has-children.sub').on('click', function(){
        $(this).find('> ul').toggleClass('active');
        $(this).toggleClass('active');
    })

    $('.selectnav_button').on('click', function() {
        console.log('click!');
        $('.header_inner_right .main_menu').toggleClass('active');
        $(this).toggleClass('active');
    })


});