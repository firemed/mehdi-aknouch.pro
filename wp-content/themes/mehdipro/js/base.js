/**
 * Core
 *
 * @package WP Portico
 * @subpackage JavaScript
 */

jQuery.noConflict();

(function($) {
	$(document).ready(function(){
		
		$('.flexslider').resize();

		/*-----------------------------------------------------------------------------------*/
		/* Slide Left Sidebar for Mobile */
		/*-----------------------------------------------------------------------------------*/
		
		$('#left-sidebar').addClass('cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left');
		
		var menuLeft = document.getElementById( 'left-sidebar' );
		body = document.body;
		
		showLeft.onclick = function() {
			classie.toggle( this, 'active' );
			classie.toggle( menuLeft, 'cbp-spmenu-open' );
			disableOther( 'showLeft' );
		};
		
		function disableOther( button ) {
				if( button !== 'showLeft' ) {
					classie.toggle( showLeft, 'disabled' );
				}
			}
		
		/*-----------------------------------------------------------------------------------*/
		/* Add Zoom Class to Default WordPress Gallery */
		/*-----------------------------------------------------------------------------------*/
		
		$(".gallery-icon").addClass("zoom");
		
		/*-----------------------------------------------------------------------------------*/
		/* Remove Zoom Class from Woo Main Image */
		/*-----------------------------------------------------------------------------------*/
		
		$(".woocommerce-main-image").removeClass("zoom");
		
		/*-----------------------------------------------------------------------------------*/
		/* FitVids */
		/*-----------------------------------------------------------------------------------*/
		
		$("article").fitVids();
		
		/*-----------------------------------------------------------------------------------*/
		/* Testimonials Widget */
		/*-----------------------------------------------------------------------------------*/
		
		$('.widget_ct_testimonials .testimonials').cycle({ 
			fx:     'fade', 
			speed:  'fast', 
			timeout: 0, 
			next:   '.next.test', 
			prev:   '.prev.test' 
		});
		
		/*-----------------------------------------------------------------------------------*/
		/* Portfolio Widget */
		/*-----------------------------------------------------------------------------------*/
		
		$('.widget_ct_portfolio .portfolio').cycle({ 
			fx:     'fade', 
			speed:  'fast', 
			timeout: 0, 
			next:   '.next.port-item', 
			prev:   '.prev.port-item' 
		});
		
		/*-----------------------------------------------------------------------------------*/
		/* Testimonials Block */
		/*-----------------------------------------------------------------------------------*/
		
		$('.aq-block-aq_testimonial_block .testimonials').flexslider({
			animation: "fade",
			animationLoop: true,
			animationSpeed: 600,
			slideshowSpeed: 4000,
			directionNav: false,  
			controlNav: false,
			smoothHeight: true,
		});
		
		/*-----------------------------------------------------------------------------------*/
		/* Symple Skillbar Shortcode */
		/*-----------------------------------------------------------------------------------*/
		
		$('.symple-skillbar').each(function(){
			$(this).find('.symple-skillbar-bar').animate({ width: $(this).attr('data-percent') }, 1500 );
		});
		
		/*-----------------------------------------------------------------------------------*/
		/* Review Bar Animate */
		/*-----------------------------------------------------------------------------------*/
		
		$('.bar-overlay').each(function(){
			$(this).find('.bar-ani').animate({ width: $(this).attr('data-percent') }, 1500 );
		});
		
		/*-----------------------------------------------------------------------------------*/
		/* Initialize FitVids */
		/*-----------------------------------------------------------------------------------*/
		
		$(".container").fitVids();
		
		/*-----------------------------------------------------------------------------------*/
		/* Add class for prev/next icons */
		/*-----------------------------------------------------------------------------------*/
		
		$('.prev-next .nav-prev a').addClass('icon-arrow-left');
		$('.prev-next .nav-next a').addClass('icon-arrow-right');
		
		/*-----------------------------------------------------------------------------------*/
		/* Add Font Awesome Icon to Sitemap list */
		/*-----------------------------------------------------------------------------------*/
		
		$('.page-template-template-sitemap-php #main-content li a').before('<i class="icon-caret-right"></i>');
		
		/*-----------------------------------------------------------------------------------*/
		/* Isotope for portfolio filtering */
		/*-----------------------------------------------------------------------------------*/
		
		var $container = $('#isotope-container');
		$container.imagesLoaded( function(){
			$container.isotope();
		});
		$container.isotope({
			itemSelector: '.item',
			layoutMode: 'fitRows',
			animationOptions: {
				duration: 400,
				easing: 'swing',
				queue: false
			}
		});
		
		// filter items when filter link is clicked
		$('#tags-nav a').click(function(e){
			e.preventDefault();
			var t = $(this);

			if(!t.hasClass('selected')) {
				var selector = t.attr('data-filter');
				$container.isotope({ filter: selector });
				$('#tags-nav a').removeClass('selected');
				t.addClass('selected');
			}
		});
		
		function ctPortfolioIsotope() {
			var $container = $('#isotope-container');
				$container.isotope({
				itemSelector: '.item'
			});
		} ctPortfolioIsotope();
	   
		// Resize
		var isIE8 = $.browser.msie && +$.browser.version === 8;
		if (!isIE8) {
			$(window).resize(function () {
				ctPortfolioIsotope();
			});
		}
	   
		// Orientation change
		if (window.addEventListener) {
			window.addEventListener("orientationchange", function() {
				ctPortfolioIsotope();
			});
		}
		
		/*-----------------------------------------------------------------------------------*/
		/* Add last class to every third related item, and every second testimonial */
		/*-----------------------------------------------------------------------------------*/
		
		$("li.related:nth-child(3n+3), .testimonial-home li:nth-child(2n+1)").addClass("last");
		
	});
	
	
})(jQuery);

/*-----------------------------------------------------------------------------------*/
/* Social Popups */
/*-----------------------------------------------------------------------------------*/
	
function popup(pageURL,title,w,h) {
	var left = (screen.width/2)-(w/2);
	var top = (screen.height/2)-(h/2);
	var targetWin = window.open (pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
}