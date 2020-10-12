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

			$('.project-slider > .slider').slick({
				fade: false,
				autoplaySpeed: 2000,
				autoplay: true,
				speed: 2000,
				arrows: true,
				dots: false,
				slidesToShow: 1,
				slidesToScroll: 1,
				infinite: true,
				// centerMode: true,
				prevArrow: ".project-slider-nav a.previous",
				nextArrow: ".project-slider-nav a.next",
				cssEase: "cubic-bezier(0.87, 0.03, 0.41, 0.9)"
			});

			$('select').selectize();

			// Custom qty field
			$('.add-to-cart .qty').hide();

			$('.add-to-cart .quantity')
				.append($('<div class="pseudo-qty"></div>'));

			$('.add-to-cart .quantity .pseudo-qty')
				.append($('<button class="qty-dec">&minus;</button>'));

			$('.add-to-cart .quantity .pseudo-qty')
				.append($('<input type="text" />'));

			$('.add-to-cart .quantity .pseudo-qty')
				.append($('<button class="qty-inc">&plus;</button>'));

			$('.add-to-cart .quantity .pseudo-qty input').attr('readonly', true).attr('value', $('.add-to-cart .quantity input.qty').val());

			$(document).on('click', '.add-to-cart .quantity .pseudo-qty button', function (e) {
				e.preventDefault();
				$qty = parseInt($('.add-to-cart .quantity input.qty').val());
				if ($(this).hasClass('qty-dec')) {
					$('.add-to-cart .quantity input.qty').val($qty - 1 > 0 ? $qty - 1 : 1);
				} else {
					$('.add-to-cart .quantity input.qty').val($qty + 1);
				}
				$('.add-to-cart .quantity .pseudo-qty input').val($('.add-to-cart .quantity input.qty').val());
			});
		});

} (jQuery));