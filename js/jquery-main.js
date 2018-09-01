(function ( $ ) {

	"use strict";

	window.Base = {
		init: function () {
			this.bannerSlider();
			this.ourPartnersSlider();
			this.recentPostsSlider();
		},

		bannerSlider: function (  ) {
			var sliderFor = $('.bace-banner__slider-for');

			sliderFor.slick({
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: false,
				fade: true,
				asNavFor: '.slider-nav',
				dots: true,
			});

			$('.bace-banner__slider-nav').slick({
				slidesToShow: 5,
				slidesToScroll: 1,
				asNavFor: '.slider-for',
				centerMode: true,
				focusOnSelect: true,
				centerPadding: 0,
				responsive: [
					{
						breakpoint: 1024,
						settings: {
							slidesToShow: 3,
						}
					},
					{
						breakpoint: 600,
						settings: {
							slidesToShow: 2,
						}
					},
				]
			});

			sliderFor.on('beforeChange', function(event, slick, currentSlide, nextSlide){
				var sliderFor = $('.bace-banner__slider-for'),
					slideForCurrentContent = $('.bace-banner__slider-for .slick-current .bace-banner__slide-content'),
					slideForSidebarContent = $('#bace-banner__content'),
					a = slideForCurrentContent.html();
				slideForSidebarContent.html(a);
			});
		},

		ourPartnersSlider: function (  ) {
			$('#bace-our-partners__slider').slick({
				infinite: true,
				slidesToShow: 5,
				slidesToScroll: 5,
				responsive: [
					{
						breakpoint: 1024,
						settings: {
							slidesToShow: 3,
						}
					},
					{
						breakpoint: 600,
						settings: {
							slidesToShow: 2,
						}
					},
				]
			});
		},

		recentPostsSlider: function () {
			$('.bace-recent-post__container').slick({
				infinite: true,
				slidesToShow: 1,
				slidesToScroll: 1,
			});
		}
	}

})( jQuery );

window.Base.init();
