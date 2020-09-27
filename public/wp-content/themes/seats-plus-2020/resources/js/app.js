require('./bootstrap');

(function ($) {
		$(function () {
			var slideWrapper = $('.main-slider');
			//start the slider
			slideWrapper.slick({
				fade: true,
				autoplaySpeed: 4000,
				autoplay: true,
				lazyLoad: "progressive",
				speed: 1000,
				arrows: false,
				dots: false,
				cssEase: "cubic-bezier(0.87, 0.03, 0.41, 0.9)"
			});
		});
} (jQuery));