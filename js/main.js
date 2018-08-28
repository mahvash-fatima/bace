(function ( $ ) {

	"use strict";

	window.Base = {
		init: function () {
			this.slider();
		},

		slider: function (  ) {
			$('.bace-banner__slider-for').slick({
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
		}
	}

})( jQuery );

window.Base.init();
