jQuery(function($){
	$('.bace_loadmore').click(function(){

		var button = $(this),
			data = {
				'action': 'loadmore',
				'query': bace_loadmore_params.posts, // that's how we get params from wp_localize_script() function
				'page' : bace_loadmore_params.current_page
			};

		$.ajax({
			url : bace_loadmore_params.ajaxurl, // AJAX handler
			data : data,
			type : 'POST',

			beforeSend : function ( xhr ) {
				button.text('Loading...'); // change the button text, you can also add a preloader image
				// console.log(data);
			},
			success : function( data ){
				if( data ) {
					button.text( 'More posts' ).prev().before(data); // insert new posts
					bace_loadmore_params.current_page++;
					if ( bace_loadmore_params.current_page === bace_loadmore_params.max_page )
						button.remove(); // if last page, remove the button

					// you can also fire the "post-load" event here if you use a plugin that requires it
					// $( document.body ).trigger( 'post-load' );
				} else {
					button.remove(); // if no data, remove the button as well
				}
			}
		});
	});
});
