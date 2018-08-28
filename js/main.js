(function ( $ ) {

	"use strict";

	window.Base = {
		init: function () {
			this.slider();
		},

		slider: function (  ) {
			$('.bace-slider').slick({
				dots: true,
			});
		}
	}

})( jQuery );

window.Base.init();
