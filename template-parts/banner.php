<?php $slides = array( 'slide-1.jpg', 'slide-2.jpg' ); ?>

<ul class="bace-slider">
	<?php
		foreach ( $slides as $slide ) {
			echo "<li><img src=" . get_template_directory_uri() . "/img/" . $slide . "></li>";
		}
	?>
</ul>
