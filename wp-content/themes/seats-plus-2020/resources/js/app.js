import Swiper from 'swiper/bundle';
import selectize from 'selectize';

(function ($) {
	$(function () {

		$(document).on('click', '.menu-toggle', function () {
			$('.menu-toggle').each(function () {
				$(this).toggleClass('active');
			})
			$('html').toggleClass('menu-active');
		});

		let mainSlider = new Swiper('.main-slider .swiper-container', {
			direction: 'vertical',
			loop: true,
			speed: 500,
			effect: 'fade',
			fadeEffect: {
				crossFade: true
			},
			autoplay: {
				delay: 4000,
			},
			navigation: {
				nextEl: '.main-slider-nav .swiper-button-next',
				prevEl: '.main-slider-nav .swiper-button-prev'
			},
			pagination: {
				el: '.swiper-pagination',
				type: 'custom',
				renderCustom: function (swiper, current, total) {
					return `<i class="curr">${pad(current, 2)}</i><i class="tot">${pad(total, 2)}</i>`;
				}
			}
		});

		let productCategorySlider = new Swiper('.product-category-slider .swiper-container', {
			autoplay: {
				delay: 4000,
			},
			speed: 500,
			loop: false,
			slidesPerView: 1,
			spaceBetween: 30,
			navigation: {
				nextEl: '.product-category-slider-nav .swiper-button-next',
				prevEl: '.product-category-slider-nav .swiper-button-prev'
			},
			breakpoints: {
				768: {
					slidesPerView: 2,
					spaceBetween: 30,
				},
				1024: {
					slidesPerView: 3,
					spaceBetween: 30,
				}
			}
		});

		let productImageSlider = new Swiper('.product-image-slider .swiper-container', {
			autoplay: {
				delay: 4000,
			},
			speed: 500,
			loop: false,
			slidesPerView: 1,
			navigation: {
				nextEl: '.product-image-slider-nav .swiper-button-next',
				prevEl: '.product-image-slider-nav .swiper-button-prev'
			}
		});

		let relatedProductSlider = new Swiper('.product-slider .swiper-container', {
			autoplay: {
				delay: 4000,
			},
			speed: 500,
			loop: false,
			slidesPerView: 2,
			spaceBetween: 30,
			navigation: {
				nextEl: '.product-slider-nav .swiper-button-next',
				prevEl: '.product-slider-nav .swiper-button-prev'
			},
			breakpoints: {
				768: {
					slidesPerView: 2,
					spaceBetween: 30,
				},
				1024: {
					slidesPerView: 3,
					spaceBetween: 30,
				}
			}
		});

		let relatedProjectSlider = new Swiper('.project-slider .swiper-container', {
			autoplay: {
				delay: 4000,
			},
			speed: 500,
			loop: false,
			slidesPerView: 2,
			spaceBetween: 30,
			navigation: {
				nextEl: '.project-slider-nav .swiper-button-next',
				prevEl: '.project-slider-nav .swiper-button-prev'
			},
			breakpoints: {
				768: {
					slidesPerView: 2,
					spaceBetween: 30,
				},
				1024: {
					slidesPerView: 3,
					spaceBetween: 30,
				}
			}
		});


		let projectImageSlider = new Swiper('.project-image-slider .swiper-container', {
			autoplay: {
				delay: 4000,
			},
			speed: 500,
			loop: false,
			slidesPerView: 'auto',
			spaceBetween: 30,
			navigation: {
				nextEl: '.project-image-slider-nav .swiper-button-next',
				prevEl: '.project-image-slider-nav .swiper-button-prev'
			}
		});

		// $('select').selectize();

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
			let $qty = parseInt($('.add-to-cart .quantity input.qty').val());
			if ($(this).hasClass('qty-dec')) {
				$('.add-to-cart .quantity input.qty').val($qty - 1 > 0 ? $qty - 1 : 1);
			} else {
				$('.add-to-cart .quantity input.qty').val($qty + 1);
			}
			$('.add-to-cart .quantity .pseudo-qty input').val($('.add-to-cart .quantity input.qty').val());
		});

		$(document).on('click', 'ul.accordion li > .title', function () {
			$(this).parent('li').toggleClass('active');
		});

		$(document).on('change', '#billing_country', function (e) {
			if (e.target.value.length) {
				setTimeout(function () {
					window.location.reload();
				}, 1000);
			}
		});

		window.addEventListener('message', event => {
			console.warn(event.data);
			if (event.data.type === 'hsFormCallback' && event.data.eventName === 'onFormReady') {
				$('body > footer .hbspt-form .hs_email input').attr('placeholder', 'Your email *').attr('tabindex', 3);
				$('body > footer .hbspt-form .hs_firstname input').attr('placeholder', 'First name').attr('tabindex', 1);
				$('body > footer .hbspt-form .hs_lastname input').attr('placeholder', 'Last name').attr('tabindex', 2);
			}
		});
	});

	function pad(n, width, z) {
		z = z || '0';
		n = n + '';
		return n.length >= width ? n : new Array(width - n.length + 1).join(z) + n;
	}

} (jQuery));