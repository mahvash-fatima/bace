<?php
	if( ! function_exists( 'bace_our_partners_default_slides' ) ) :
		function bace_our_partners_default_slides()
		{
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
?>
