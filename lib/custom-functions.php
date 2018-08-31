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

	if( ! function_exists( 'bace_my_load_more_scripts' ) ) :
		function bace_my_load_more_scripts() {

			global $wp_query;

			// register our main script but do not enqueue it yet
			wp_register_script( 'my_loadmore', get_stylesheet_directory_uri() . '/js/myloadmore.js', array('jquery') );

			// now the most interesting part
			// we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
			// you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
			wp_localize_script( 'my_loadmore', 'bace_loadmore_params', array(
				'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
				'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
				'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
				'max_page' => $wp_query->max_num_pages
			) );

			print_r($wp_query->query_vars);

			wp_enqueue_script( 'my_loadmore' );
		}

		add_action( 'wp_enqueue_scripts', 'bace_my_load_more_scripts' );
	endif; //bace_my_load_more_scripts

	if( ! function_exists( 'bace_loadmore_ajax_handler' ) ) :
		function bace_loadmore_ajax_handler(){

			// prepare our arguments for the query
			$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

			$recent_posts = new WP_Query( 'cat=1&paged=' . $paged );

			$args = json_decode( stripslashes( $recent_posts ), true );
			$args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
			$args['post_status'] = 'publish';

			// it is always better to use WP_Query but not here
			query_posts( $args );

			echo '<ul>';

				if( have_posts() ) :

					// run the loop
					while( have_posts() ): the_post();

						// look into your theme code how the posts are inserted, but you can use your own HTML of course
						// do you remember? - my example is adapted for Twenty Seventeen theme
						// get_template_part( 'template-parts/post/content', get_post_format() );
						// for the test purposes comment the line above and uncomment the below one?>
						<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

					<?php endwhile;

				endif;
			echo '</ul>';
				die; // here we exit the script and even no wp_reset_query() required!
				}



		add_action('wp_ajax_loadmore', 'bace_loadmore_ajax_handler'); // wp_ajax_{action}
		add_action('wp_ajax_nopriv_loadmore', 'bace_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}
	endif; //bace_loadmore_ajax_handler

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

			wp_reset_postdata(); ?>

			<ul class="bace-recent-post__list">
				<?php

				$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

				$recent_posts = new WP_Query( 'cat=1&paged=' . $paged );

				while( $recent_posts->have_posts() )
				{
					$recent_posts->the_post() ;

					if( get_the_ID() === $first_post_id ) {
						continue;
					} ?>

					<li><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>

				<?php } ?>
			</ul>
			<div class="nav-previous alignleft"><?php echo get_next_posts_link( 'Older Entries', $recent_posts->max_num_pages ); ?></div>
			<div class="nav-next alignright"><?php echo get_previous_posts_link( 'Newer Entries' ); ?></div>
			<?php
				if ( $recent_posts->max_num_pages > 1 )
					echo '<div class="bace_loadmore">' . __( 'More posts', 'bace' ) . '</div>';
			?>
			<?php wp_reset_postdata();
		}
	endif; //bace_recent_posts

?>
