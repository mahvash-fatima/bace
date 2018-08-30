<?php
/**
 * Tempate part used in home.php for showing slick
 * @package bace
 */
$slides = get_theme_mod( 'bace_slides', bace_our_partners_default_slides() );

?>

<section id="bace-our-partners__slider" class="bace-our-partners__slider">

	<?php if( is_array( $slides ) ) : foreach ( $slides as $slide ) : ?>

		<?php $slide_image = isset( $slide['image'] ) ? $slide['image'] : false;

		if( ! trim( $slide_image ) ) continue; ?>

		<img src='<?php echo esc_url( $slide_image ); ?>' alt='image'>

	<?php endforeach; endif; ?>

</section>
