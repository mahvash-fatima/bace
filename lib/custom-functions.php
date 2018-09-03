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
 * @return array
 */
function bace_get_news_posts() {

	$query = new WP_Query( array(
		'post_type'      => 'post',
		'post_status'    => 'publish',
		'category_name'  => 'news',
		'posts_per_page' => 24,
		'fields'         => 'ids'
	) );

	$post_ids = array();
	$set = 0;

	if ( ! empty( $query->posts ) ) {
		foreach ( $query->posts as $key => $post_id ) {
			if ( $key % 8 === 0 ) {
				$set++;
				$post_ids[ $set ] = array();
			}

			$post_ids[ $set ][] = $post_id;
		}
	}

	return $post_ids;
}
