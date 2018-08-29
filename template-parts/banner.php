<?php $slides = array( 'slide-1.jpg', 'slide-2.jpg', 'slide-3.jpg', 'slide-4.jpg', 'slide-5.jpg', 'slide-6.jpg' ); ?>

<?php
	$the_query = new WP_Query( array(
		'category_name' => 'featured-posts',
		'posts_per_page' => 6,
	));
?>


<div class="bace-banner row">
	<div class="bace-banner__slider-container col-md-9">
		<ul class="bace-banner__slider bace-banner__slider-for slider-for">
			<?php
				if ( $the_query->have_posts() ) :
					while ( $the_query->have_posts() ) : $the_query->the_post();
			?>
					<li><?php the_post_thumbnail(); ?></li>

			<?php
					endwhile;
					wp_reset_postdata();
				endif;
			?>
		</ul>
	</div>
	<div class="bace-banner__content col-md-3">
		<h2 class="bace-banner__content-title">Welcome to rtPanel</h2>
		<img src="<?php echo get_template_directory_uri(); ?>/img/user.jpg" alt="User" class="bace-banner__content-image">
		<p>Vel adipiscing lectus lundium. Dapibus amet turpis adipiscing ridiculus porta, aenean tempor phasellus cras ultrices urna, ut in  turpis auctor, dignissim odio porttitor mus egestas dapibus diam urna phasellus! Amet adipiscing enim, odio odio? Massa eros, ut pulvinar magnis dis, penatibus urna est penatibus turpis egestas non pulvinar, ac lectus sit, habitasse etiam nisi sed habitasse, risus nisi, amet etiam? Pulvinar dis ac vel!</p>
		<a href="" class="bace-banner__read-more">Read More...</a>
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
