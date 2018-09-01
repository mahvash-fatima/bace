<?php

if( ! function_exists( 'bace_our_partners_default_slides' ) ) :
	function bace_our_partners_default_slides() {
		return apply_filters( 'bace_default_slides_array', array(
			get_template_directory_uri() . '/img/addidas.png',
			get_template_directory_uri() . '/img/coca-cola.png',
			get_template_directory_uri() . '/img/visa.png',
			get_template_directory_uri() . '/img/visa.png',
			get_template_directory_uri() . '/img/sony.png',
			get_template_directory_uri() . '/img/emirates.png',
			get_template_directory_uri() . '/img/visa.png',
			get_template_directory_uri() . '/img/visa.png',
			get_template_directory_uri() . '/img/coca-cola.png',
			get_template_directory_uri() . '/img/sony.png',
			get_template_directory_uri() . '/img/emirates.png',
		) );
	}
endif; //bace_our_partners_default_slides

/**
 * Get news posts.
 *
 * @param int $paged $paged.
 *
 * @return array
 */
function bace_get_news_posts( $paged = 1 ) {

	$query = new WP_Query( array(
		'post_type'      => 'post',
		'post_status'    => 'publish',
		'paged'           => $paged,
		//'category' => 'news',
		'posts_per_page' => 8
	) );

	return $query->posts;
}

function bace_get_news_slide( $paged = 1 ) {

	set_query_var( 'news_page', $paged );
	get_template_part( 'template-parts/widget', 'news' );
}
