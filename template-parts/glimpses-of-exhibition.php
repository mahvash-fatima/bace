<div class="row">
	<h2>Glimpses of Exhibition</h2>
	<div class="row">
		<div class="col-md-3">
			<a href="">
				<img src="<?php echo get_template_directory_uri(); ?>/img/golf.jpg" alt="Golf">
				<h3>Golf</h3>
			</a>
		</div>
		<div class="col-md-3">
			<a href="">
				<img src="<?php echo get_template_directory_uri(); ?>/img/basketball.jpg" alt="BasketBall">
				<h3>BasketBall</h3>
			</a>
		</div>
		<div class="col-md-3">
			<a href="">
				<img src="<?php echo get_template_directory_uri(); ?>/img/tennis.jpg" alt="Tennis">
				<h3>Tennis</h3>
			</a>
		</div>
		<div class="col-md-3">
			<a href="">
				<img src="<?php echo get_template_directory_uri(); ?>/img/football.jpg" alt="FootBall">
				<h3>FootBall</h3>
			</a>
		</div>
		<div class="col-md-3">
			<a href="">
				<img src="<?php echo get_template_directory_uri(); ?>/img/football.jpg" alt="FootBall">
				<h3>FootBall</h3>
			</a>
		</div>
		<div class="col-md-3">
			<a href="">
				<img src="<?php echo get_template_directory_uri(); ?>/img/tennis.jpg" alt="Tennis">
				<h3>Tennis</h3>
			</a>
		</div>
		<div class="col-md-3">
			<a href="">
				<img src="<?php echo get_template_directory_uri(); ?>/img/golf.jpg" alt="Golf">
				<h3>Golf</h3>
			</a>
		</div>
		<div class="col-md-3">
			<a href="">
				<img src="<?php echo get_template_directory_uri(); ?>/img/basketball.jpg" alt="BasketBall">
				<h3>BasketBall</h3>
			</a>
		</div>
	</div>
</div>

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

		while ( $get_posts->have_posts() ) { $get_posts->the_post();

			$post_categories = wp_get_post_categories( get_the_ID() );

			foreach( $post_categories as $c ){
				$category_link = get_category_link( $c );
				$cat = get_category( $c );
				$cats[ $i ] = $cat->slug ;
				$cat_links[ $i ] = $category_link;
				$i++;
			}

		} //endwhile

		$result = array_unique( $cats );
		$result_two = array_unique( $cat_links );

		echo '<ul class="row">';

		foreach ( $result as $index => $category ) {
			echo '<li class="col-md-3"><a href=' . $result_two[ $index ] . '>' . $category . '</a></li>';
		}


		echo '</ul>';

	} //endif

	wp_reset_postdata();

?>
