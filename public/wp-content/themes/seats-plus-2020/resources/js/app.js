require('./bootstrap');

(function ($) {
		$(function () {

			$('.main-slider > .slider').slick({
				fade: false,
				autoplaySpeed: 4000,
				autoplay: true,
				vertical: true,
				speed: 1000,
				arrows: true,
				dots: false,
				cssEase: "cubic-bezier(0.87, 0.03, 0.41, 0.9)",
				slide: ".slide",
				prevArrow: ".main-slider-nav a.previous",
				nextArrow: ".main-slider-nav a.next",
			});


			$('.product-category-slider > .slider').slick({
				fade: false,
				autoplaySpeed: 2000,
				autoplay: true,
				speed: 2000,
				arrows: true,
				dots: false,
				slidesToShow: 3,
				slidesToScroll: 1,
				infinite: true,
				// centerMode: true,
				prevArrow: ".product-category-slider-nav a.previous",
				nextArrow: ".product-category-slider-nav a.next",
				cssEase: "cubic-bezier(0.87, 0.03, 0.41, 0.9)"
			});
		});

		$('select').selectize();
} (jQuery));