(function ( $ ) {

	"use strict";

	window.Base = {

		init: function () {
			var _this = this;

			this.slideForSidebarContent = $('#bace-banner__content');

			this.bannerSlider();
			this.ourPartnersSlider();
			this.recentPostsSlider();
			newsSlider.init();

			this.timestampDate = $( '#timestamp-date' );
			this.timestampTime = $( '#timestamp-time' );

			if ( this.timestampDate.length ) {
				setInterval( function() {
					_this.createDateTimeWidget();
				}, 1000 );
			}

		},

		bannerSlider: function (  ) {
			var _this = this,
				sliderFor = $('.bace-banner__slider-for');

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

			this.updateSlideContent();

			sliderFor.on('beforeChange', function(){
				_this.updateSlideContent();
			});
		},

		updateSlideContent: function() {
			var slideForCurrentContent = $('.bace-banner__slider-for .slick-current .bace-banner__slide-content'),
				a = slideForCurrentContent.html();

			this.slideForSidebarContent.html( a );
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
		},

		createDateTimeWidget: function() {
			var date = new Date(),
				todayDate = date.getDate(),
				month = date.getMonth(),
				weekDay = date.getDay(),
				year = date.getFullYear(),
				hours = date.getHours(),
				minutes = date.getMinutes(),
				seconds = date.getSeconds(),
				today = todayDate + ' ' + year,
				monthNames = [ 'January', 'February', 'March', 'April', 'May', 'June',
					'July', 'August', 'September', 'October', 'November', 'December'
				],
				weekDayNames = [ 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Friday', 'Saturday' ];

				month = monthNames[ month ];
				weekDay = weekDayNames[ weekDay ];

			var dateString = weekDay +  ', ' + todayDate + ' ' + month,
				timeString = this.paddZero( hours ) + ':' + this.paddZero( minutes ) + ':' + this.paddZero( seconds );


			this.timestampDate.html( dateString );
			this.timestampTime.html( timeString );

		},

		paddZero( number ) {
			return number < 10 ? '0' + number : number;
		}
	};

	var newsSlider = {

		init: function() {

			this.nextButton = $('#bace-next-news');
			this.prevButton = $('#bace-prev-news');
			this.newsSlider = $( '#bace-news-slider__slick' );

			this.newsSlider.slick( {
				nextArrow: this.nextButton,
				prevArrow: this.prevButton
			} );

		}
	}

})( jQuery );

window.Base.init();
