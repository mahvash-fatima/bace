<?php $slides = array( 'slide-1.jpg', 'slide-2.jpg', 'slide-3.jpg', 'slide-4.jpg', 'slide-5.jpg', 'slide-6.jpg' ); ?>

<div class="bace-banner row">
	<div class="bace-banner__slider-container col-md-9">
		<ul class="bace-banner__slider bace-banner__slider-for slider-for">
			<?php
			foreach ( $slides as $slide ) {
				echo "<li><img src=" . get_template_directory_uri() . "/img/" . $slide . "></li>";
			}
			?>
		</ul>
	</div>
	<div class="bace-banner__content col-md-3">
		<h2>Welcome to rtPanel</h2>
		<img src="<?php echo get_template_directory_uri(); ?>/img/user.jpg" alt="User">
		<p>Vel adipiscing lectus lundium. Dapibus amet turpis adipiscing ridiculus porta, aenean tempor phasellus cras ultrices urna, ut in  turpis auctor, dignissim odio porttitor mus egestas dapibus diam urna phasellus! Amet adipiscing enim, odio odio? Massa eros, ut pulvinar magnis dis, penatibus urna est penatibus turpis egestas non pulvinar, ac lectus sit, habitasse etiam nisi sed habitasse, risus nisi, amet etiam? Pulvinar dis ac vel!</p>
	</div>
</div>

<ul class="bace-banner__slider bace-banner__slider-nav slider-nav">
	<?php
	foreach ( $slides as $slide ) {
		echo "<li><div class='bace-banner__slider-image'><img src=" . get_template_directory_uri() . "/img/" . $slide . "></div></li>";
	}
	?>
</ul>
