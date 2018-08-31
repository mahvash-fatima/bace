<?php
	if( ! function_exists( 'bace_our_partners_default_slides' ) ) :
		function bace_our_partners_default_slides() {
			return apply_filters('bace_default_slides_array', array(
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

	if( ! function_exists( 'bace_recent_posts' ) ) :
		function bace_recent_posts()
		{
			$first_post_id = false;
			$args = array( 'posts_per_page' => '1' );
			$recent_posts = new WP_Query( $args );

			while( $recent_posts->have_posts() )
			{
				$recent_posts->the_post() ;
				$first_post_id = get_the_ID(); ?>

				<article class="bace-recent-post">
					<?php if ( has_post_thumbnail() ) { ?>

						<figure class="bace-recent-post__thumbnail">
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
								<?php echo  get_the_post_thumbnail(); ?>
							</a>
						</figure>

					<?php } ?>

					<div class="bace-recent-post__content">
						<h3 class="bace-recent-post__title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
						<span class="bace-recent-post__date"><?php echo get_the_date(); ?></span>
					</div>
				</article>
			<?php }

			wp_reset_postdata();

			$args = array( 'posts_per_page' => '3' );
			$recent_posts = new WP_Query( $args );
			while( $recent_posts->have_posts() )
			{
				$recent_posts->the_post() ;

				if( get_the_ID() === $first_post_id ) {
					continue;
				} ?>

				<article class="bace-recent-post">
					<h3 class="bace-recent-post__title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
				</article>

			<?php }

			wp_reset_postdata();
		}
	endif; //bace_recent_posts
?>
