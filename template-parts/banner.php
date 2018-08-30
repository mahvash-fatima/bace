<?php
	$the_query = new WP_Query( array(
		'category_name' => 'featured-posts',
		'posts_per_page' => 6,
		'post_type' => 'post',
		'post_status' => 'publish',
	));
	$the_query_two = new WP_Query( array(
		'category_name' => 'featured-posts',
		'posts_per_page' => 1,
		'post_type' => 'post',
		'post_status' => 'publish',
	));
//	echo "<pre>";
//	print_r($the_query);
//	echo "</pre>";
?>

<div class="bace-banner row">
	<div class="bace-banner__slider-container col-md-9">
		<ul class="bace-banner__slider bace-banner__slider-for slider-for">
			<?php
				if ( $the_query->have_posts() ) :
					while ( $the_query->have_posts() ) : $the_query->the_post();
			?>
					<li>
						<?php the_post_thumbnail(); ?>
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
		<?php
		if ( $the_query_two->have_posts() ) :
			while ( $the_query_two->have_posts() ) : $the_query_two->the_post();
				?>
				<div>
					<h2 class="bace-banner__content-title"><?php the_title(); ?></h2>
					<?php the_post_thumbnail(); ?>
					<?php the_excerpt(); ?>
				</div>

			<?php
			endwhile;
			wp_reset_postdata();
		endif;
		?>
	</div>
</div>

<ul class="bace-banner__slider bace-banner__slider-nav slider-nav">
	<?php
		if ( $the_query->have_posts() ) :
			while ( $the_query->have_posts() ) : $the_query->the_post();
	?>
				<li><div class="bace-banner__slider-image"><?php the_post_thumbnail(); ?></div></li>
	<?php
			endwhile;
			wp_reset_postdata();
		endif;
	?>
</ul>
