//stickey header
jQuery(function() {

    $(window).scroll(function() {
        var windscroll = $(window).scrollTop();
        if (windscroll >= 100) {
            $('#warp .section').each(function(i) {
                if ($(this).position().top <= windscroll + 150) {
                    $('.navbar-nav li.active').removeClass('active');
                    $('.navbar-nav li').eq(i).addClass('active');
                }
            });

        } else {

            $('.navbar-nav').removeClass('');
            $('.navbar-nav li.active').removeClass('active');
            $('.navbar-nav li:first').addClass('active');
        }

    }).scroll();

    jQuery(window).scroll(function() {
        var scroll = jQuery(window).scrollTop();
        if (scroll >= 40) {
            jQuery(".subMenu").addClass("smallheader");
        }
        else {
            jQuery(".subMenu").removeClass("smallheader");
        }
    });
});

$(document).ready(function(){
    $('#nav').localScroll(800);


    //.parallax(xPosition, speedFactor, outerHeight) options:
    //xPosition - Horizontal position of the element
    //inertia - speed to move relative to vertical scroll. Example: 0.1 is one tenth the speed of scrolling, 2 is twice the speed of scrolling
    //outerHeight (true/false) - Whether or not jQuery should use it's outerHeight option to determine when a section is in the viewport
    $('#banner').parallax("50%", 0.3);
    $('#intro').parallax("50%", 0.3);
    $('#second').parallax("65%", 0.3);
    $('.bg').parallax("50%", 0.4);
    $('#third').parallax("60%", 0.0);
});(jQuery);

(function($) {
    $('#animatedElement').click(function() {
        $(this).addClass("slideUp");

    });
})(jQuery);

jQuery(function() {
    //jQuery('.subMenu').smint({
    //    'scrollSpeed' : 1000
    //});
    jQuery('.carousel').carousel({
        interval: 2000
    });

    //navigation menu on mobile hide
    $(".navbar-default .navbar-nav > li > a").click(function(){
        $(".navbar-collapse").removeClass('in');


    });


});

jQuery(document).ready(function(){
    jQuery('ul.da-thumbs > li').hoverdir();
    //smooth scroll to href value
    $(".scroll").click(function(event){
        event.preventDefault();
        //calculate destination place
        var dest=0;
        if($(this.hash).offset().top > $(document).height()-$(window).height()){
            dest=$(document).height()-$(window).height();
        }else{
            dest=$(this.hash).offset().top;
        }
        //go to destination
        $('html,body').animate({scrollTop:dest}, 1000,'swing');
    });
});(jQuery);

$(window).scroll(function() {
    $('#animatedElement').each(function(){
        var imagePos = $(this).offset().top;

        var topOfWindow = $(window).scrollTop();
        if (imagePos < topOfWindow+400) {
            $(this).addClass("slideUp");
        }
    });

    jQuery(document).ready(function(){
        jQuery('.skillbar').each(function(){
            jQuery(this).find('.skillbar-bar').animate({
                width:jQuery(this).attr('data-percent')
            },6000);
        });
    });
});(jQuery);

$(document).ready(function($) {
    $("#submit_btn").click(function() {
        //get input field values
        var user_name       = $('input[name=name]').val();
        var user_email      = $('input[name=email]').val();
        var user_message    = $('textarea[name=message]').val();

        //simple validation at client's end
        //we simply change border color to red if empty field using .css()
        var proceed = true;
        if(user_name==""){
            $('input[name=name]').css('border-color','red');
            proceed = false;
        }
        if(user_email==""){
            $('input[name=email]').css('border-color','red');
            proceed = false;
        }
        if(user_message=="") {
            $('textarea[name=message]').css('border-color','red');
            proceed = false;
        }

        //everything looks good! proceed...
        if(proceed)
        {
            //data to be sent to server
            post_data = {'userName':user_name, 'userEmail':user_email, 'userMessage':user_message};

            //Ajax post data to server
            $.post('contact_me.php', post_data, function(response){

                //load json data from server and output message
                if(response.type == 'error')
                {
                    output = '<div class="error">'+response.text+'</div>';
                }else{
                    output = '<div class="success">'+response.text+'</div>';

                    //reset values in all input fields
                    $('#contact_form input').val('');
                    $('#contact_form textarea').val('');
                }

                $("#result").hide().html(output).slideDown();
            }, 'json');

        }
    });

    //reset previously set border colors and hide all message on .keyup()
    $("#contact_form input, #contact_form textarea").keyup(function() {
        $("#contact_form input, #contact_form textarea").css('border-color','');
        $("#result").slideUp();
    });

});(jQuery);

$(document).ready(function($) {
    /*
     *  Simple image gallery. Uses default settings
     */

    $('.fancybox').fancybox();

    /*
     *  Different effects
     */

    $(document).ready(function() {
        $('.fancybox-media').fancybox({
            openEffect  : 'none',
            closeEffect : 'none',
            helpers : {
                media : {}
            }
        });
    });

});(jQuery);

(function($) {
    QueryLoader.init();
})(jQuery);

(function($) {
    if (screen.width <720 ){
        $('div, img, input, textarea, button, a').removeClass('animate'); // to remove transition
    }
})(jQuery);