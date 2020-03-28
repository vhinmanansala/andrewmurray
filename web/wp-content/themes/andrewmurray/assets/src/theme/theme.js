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
		nextHtml: "<span class='next'></span>"
	});

	$('.search-icon').click(function() {
		$('#search-modal-container').fadeIn();
	});

	$('.close-search').click(function() {
		$('#search-modal-container').fadeOut();
	});
});