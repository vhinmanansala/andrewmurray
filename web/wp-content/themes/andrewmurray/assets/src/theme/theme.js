// Main CSS.
import './theme.scss';

// Boostrap plugins.
import 'bootstrap/js/dist/modal';

// Hooks.
import './hooks';

// Parent theme JS.
import '../../../../boylen-plus/assets/src/theme/blocks';

import 'lightslider';

$(document).ready(function() {
	$(".featured-content-slider").lightSlider({
		item: 3,
		auto: true,
		loop: true,
		pager: false,
		prevHtml: "<span class='prev'></span>",
		nextHtml: "<span class='next'></span>",
		speed: 600,
		responsive : [
            {
                breakpoint:768,
                settings: {
                    item: 1,
              	}
            },
        ]
	});

	$('.search-icon').click(function() {
		$('#search-modal-container').fadeIn();
	});

	$('.close-search').click(function() {
		$('#search-modal-container').fadeOut();
	});

	$(window).scroll(function() {
		if ($(window).scrollTop() > 110) {
			$('#header-container').addClass('sticky');
		} else {
			$('#header-container').removeClass('sticky');
		} 
	});

	$('.mobile .arrow-icon').click(function() {
	    /*define what element will be toggling display*/
	    $(this).closest('li').find('.sub-menu').slideDown();
	    $(this).closest('li').siblings().find('.sub-menu').slideUp();

	    $(this).addClass('active');
	    $(this).closest('li').siblings().find('span').removeClass('active');
 	 });

	$('.menu-icon').click(function() {
		$('#mobile-menu-container').fadeIn();
	});

	$('.close-menu').click(function() {
		$('#mobile-menu-container').fadeOut();
	});
});