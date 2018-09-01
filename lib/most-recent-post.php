<?php
	if( ! function_exists( 'bace_most_recent_post' ) ) :
		function bace_most_recent_post()
		{
		$args = array( 'posts_per_page' => '1' );
		$recent_posts = new WP_Query( $args );

		while( $recent_posts->have_posts() )
		{
			$recent_posts->the_post() ; ?>

			<article class="bace-most-recent-post">
				<?php if ( has_post_thumbnail() ) { ?>

					<figure class="bace-most-recent-post__thumbnail">
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<?php echo  get_the_post_thumbnail('', 'post-thumbnail' ); ?>
						</a>
					</figure>

				<?php } ?>

				<div class="bace-most-recent-post__content">
					<h3 class="bace-most-recent-post__title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
					<span class="bace-most-recent-post__date"><?php echo get_the_date(); ?></span>
				</div>
			</article>

		<?php }

		wp_reset_postdata();
		}
	endif; //bace_most_recent_post

?>


