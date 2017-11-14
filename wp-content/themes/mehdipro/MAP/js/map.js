$(document).ready(function() {
    $('.navbar .nav li a').on('click', function() { // Au clic sur un élément
        var page = $(this).attr('href'); // Page cible

        if( page.length  == 0){
            $('html, body').animate( { scrollTop: $('body').offset().top }, speed ); // Go
            return false;
        }
        console.log('smooth clicking to : '+page);
        var speed = 750; // Durée de l'animation (en ms)
        $('html, body').animate( { scrollTop: $(page).offset().top }, speed ); // Go
        $('.navbar .nav li').removeClass('active');
        console.log('active removed');
        $(this).parent().addClass('active');

        return false;
    });
});