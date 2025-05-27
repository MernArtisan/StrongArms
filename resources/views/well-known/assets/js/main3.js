(function ($) {
	"use strict";

	// =============== Preloader js start  =================== //

	jQuery(window).on('load', function () {
		jQuery("#status").fadeOut();
		jQuery("#preloader").delay(350).fadeOut("slow");
	});


	// =============== Responsive Menujs start  =================== //

	/*--- Responsive Menu Start ----*/

	$(".navbar-toggler").on("click", function () {
		var w = $('#sidebar').width();
		var pos = $('#sidebar').offset().left;

		if (pos === 0) {
			$("#sidebar").animate({ "left": -w }, "slow");
		}
		else {
			$("#sidebar").animate({ "left": "0" }, "slow");
		}

	});

	(function ($) {
		$(document).ready(function () {

			$('#cssmenu li.active').addClass('open').children('ul').show();
			$('#cssmenu li.has-sub>a').on('click', function () {
				$(this).removeAttr('href');
				var element = $(this).parent('li');
				if (element.hasClass('open')) {
					element.removeClass('open');
					element.find('li').removeClass('open');
					element.find('ul').slideUp(200);
				}
				else {
					element.addClass('open');
					element.children('ul').slideDown(200);
					element.siblings('li').children('ul').slideUp(200);
					element.siblings('li').removeClass('open');
					element.siblings('li').find('li').removeClass('open');
					element.siblings('li').find('ul').slideUp(200);
				}
			});

		});
	})(jQuery);

	$(function () {
		//toggle class open on button
		$('#sidebar').on('hide.bs.collapse', function () {
			$('.navbar-toggler').removeClass('open');
		})
		$('#sidebar').on('show.bs.collapse', function () {
			$('.navbar-toggler').addClass('open');
		})
	});


})(jQuery);

// =============== menu fixed  =================== //

$(window).scroll(function () {
	var window_top = $(window).scrollTop() + 1;
	if (window_top > 100) {
		$('.menu-items-wrapper').addClass('menu-fixed animated fadeInDown');
	} else {
		$('.menu-items-wrapper').removeClass('menu-fixed animated fadeInDown');
	}
});

// =============== search-button  =================== //

$('#search-button').on("click", function (e) {
	$('#search-open').slideToggle();
	e.stopPropagation();
});
$(document).on("click", function (e) {
	if (!(e.target.closest('#search-open'))) {
		$("#search-open").slideUp();
	}
});


// ============== sidebar cart js start ================ //

$(document).ready(function () {
	// Function to toggle menu visibility
	function toggleMenu() {
		$(".js-menu__context").toggleClass("js-menu__expanded");
		$(".js-menu").toggleClass("js-menu__expanded");
	}

	// Click event for opening the menu
	$(".js-menu__open").click(function () {
		toggleMenu();
	});

	// Click event for closing the menu
	$(".js-menu__close").click(function () {
		toggleMenu();
	});

	// Click event to close the menu if clicked outside the menu area
	$(".js-menu__context").click(function (event) {
		if (!$(event.target).closest('.js-menu').length) {
			toggleMenu();
		}
	});
});


// ============== Products slider js start ================ //

$(".pro-sliders2").owlCarousel({
	margin: 10,
	autoPlay: true,
	slideSpeed: 2000,
	pagination: false,
	navigation: true,
	items: 3,
	/* transitionStyle : "fade", */    /* [This code for animation ] */
	navigationText: ["<i class='fas fa-long-arrow-alt-left'></i>", "<i class='fas fa-long-arrow-alt-right'></i>"],
	itemsDesktop: [1299, 3],
	itemsDesktop: [1199, 2],
	itemsDesktopSmall: [992, 1],
	itemsTablet: [768, 1],
	itemsMobile: [480, 1],
});


// ============== partner-slider js start ================ //

$(".partner-slider").owlCarousel({
	autoPlay: true,
	slideSpeed: 2000,
	pagination: false,
	navigation: false,
	items: 5,
	navigationText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
	itemsDesktop: [1920, 5],
	itemsDesktopSmall: [1700, 4],
	itemsTablet: [1199, 3],
	itemsMobile: [767, 1]
});
