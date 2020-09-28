require('./bootstrap');

(function ($) {
		$(function () {

			$('.main-slider > .slider').slick({
				fade: true,
				autoplaySpeed: 4000,
				autoplay: true,
				lazyLoad: "progressive",
				speed: 1000,
				arrows: false,
				dots: false,
				cssEase: "cubic-bezier(0.87, 0.03, 0.41, 0.9)"
			});


			$('.product-category-slider > .slider').slick({
				fade: false,
				autoplaySpeed: 200,
				autoplay: true,
				lazyLoad: "progressive",
				speed: 1000,
				arrows: true,
				dots: false,
				slidesToShow: 5,
				slidesToScroll: 1,
				infinite: true,
				cssEase: "cubic-bezier(0.87, 0.03, 0.41, 0.9)"
			});
		});
} (jQuery));