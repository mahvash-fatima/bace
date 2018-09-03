<?php
	$the_query = new WP_Query( array(
		'category_name' => 'featured-posts',
		'posts_per_page' => 7,
		'post_type' => 'post',
		'post_status' => 'publish',
	));
?>

<div class="bace-banner row">
	<div class="bace-banner__slider-container col-md-9">
		<ul class="bace-banner__slider bace-banner__slider-for slider-for">
			<?php
				if ( $the_query->have_posts() ) :
					while ( $the_query->have_posts() ) : $the_query->the_post();
			?>
					<li>
						<?php
							if ( has_post_thumbnail() ) {
								the_post_thumbnail();
							} else { ?>
								<img src="<?php echo esc_attr( get_template_directory_uri() . '/img/no-thumbnail.png' ); ?>" alt="<?php the_title(); ?>" />
							<?php }
						?>
						<div class="bace-banner__slide-content">
							<h2 class="bace-banner__content-title"><?php the_title(); ?></h2>
							<?php the_excerpt(); ?>
						</div>
					</li>

			<?php
					endwhile;
					wp_reset_postdata();
				endif;
			?>
		</ul>
	</div>
	<div id="bace-banner__content" class="bace-banner__content col-md-3 bace-banner__sidebar">
		<div>
			<h2 class="bace-banner__content-title"><?php the_title(); ?></h2>
			<div id="bace-banner-excerpt"></div>
		</div>
	</div>
</div>

<ul class="bace-banner__slider bace-banner__slider-nav slider-nav">
	<?php
		if ( $the_query->have_posts() ) :
			while ( $the_query->have_posts() ) : $the_query->the_post();
	?>
				<li>
					<div class="bace-banner__slider-image">
						<?php
							if ( has_post_thumbnail() ) {
								the_post_thumbnail();
							} else { ?>
								<img src="<?php echo esc_attr( get_template_directory_uri() . '/img/no-thumbnail.png' ); ?>" alt="<?php the_title(); ?>" />
							<?php }
						?>
					</div>
				</li>
	<?php
			endwhile;
			wp_reset_postdata();
		endif;
	?>
</ul>
