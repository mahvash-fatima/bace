/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );

	// Our Partners Slider Title
	wp.customize( 'bace_slider_title_setting', function( value ) {
		value.bind( function( to ) {
			$( '.bace-our-partners__title' ).text( to );
		} );
	} );

	// Footer Text
	wp.customize( 'bace_footer_text_setting', function( value ) {
		value.bind( function( to ) {
			$( '.bace-site-footer-disclaimer-para' ).text( to );
		} );
	} );

	// Category Title
	wp.customize( 'bace_category_text_setting', function( value ) {
		value.bind( function( to ) {
			$( '.bace-content__category-title' ).text( to );
		} );
	} );

	// Latest Tweets Text
	wp.customize( 'bace_latest_tweets_text_setting', function( value ) {
		value.bind( function( to ) {
			$( '.bace-content__twitter-title' ).text( to );
		} );
	} );

	// Facebook Title
	wp.customize( 'bace_facebook_text_setting', function( value ) {
		value.bind( function( to ) {
			$( '.bace-content__facebook-title' ).text( to );
		} );
	} );

	// Facebook Copyright Text
	wp.customize( 'bace_footer_copyright_text_setting', function( value ) {
		value.bind( function( to ) {
			$( '.bace-footer__copyright' ).text( to );
		} );
	} );

} )( jQuery );
