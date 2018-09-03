<?php
$args = array(
	'post_status'=>'publish',
	'post_type'=>'post',
	'posts_per_page'=>-1
);

$get_posts = new WP_Query();

$i = 0;

$get_posts->query( $args );

if ( $get_posts->have_posts() ) {

	$cats = array();
	$cat_links = array();
	$cat_id = array();

	while ( $get_posts->have_posts() ) { $get_posts->the_post();

		$post_categories = wp_get_post_categories( get_the_ID() );

		$category_obj = get_term(get_the_ID());

		foreach( $post_categories as $c ){
			$category_link = get_category_link( $c );
			$cat = get_category( $c );
			$cats[ $i ] = $cat->slug ;
			$cat_id[ $i ] = $cat->cat_ID;
			$cat_links[ $i ] = $category_link;
			$i++;
		}

	} //endwhile

	$result = array_unique( $cats );
	$result_two = array_unique( $cat_links );

	foreach ( $result as $index => $category ) {
		echo '<div class="bace-content__category col-sm-3 col-xs-4">';
		if(has_category_thumbnail( $cat_id[ $index ] )) { ?>
			<figure class="bace-content__thumbnail">
				<a href="<?php echo $result_two[ $index ]; ?>" class="bace-content__thumbnail-link">
					<?php the_category_thumbnail( $cat_id[ $index ] ); ?>
				</a>
			</figure>
		<?php }
		echo '<h4 class="bace-content__title"><a href=' . $result_two[ $index ] . '>' . $category . '</a></h4>';
		echo '</div>';
	}

} //endif

wp_reset_postdata();

?>
