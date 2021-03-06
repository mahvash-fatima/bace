<?php
/**
 * Tempate part used in home.php for showing slick
 * @package bace
 */
$slides = get_theme_mod( 'bace_slides', bace_our_partners_default_slides() );

?>

<section class="bace-our-partners__section">
	<h2 class="bace-title bace-our-partners__title">
		<?php echo esc_textarea( get_theme_mod( 'bace_slider_title_setting', 'Our Partners' ) ); ?>
	</h2>

	<div id="bace-our-partners__slider" class="bace-our-partners__slider">

		<?php if( is_array( $slides ) ) : foreach ( $slides as $slide ) : ?>

			<?php $slide_image = isset( $slide['image'] ) ? $slide['image'] : false;

			if( ! trim( $slide_image ) ) continue; ?>

			<img src='<?php echo esc_url( $slide_image ); ?>' alt='image'>

		<?php endforeach; endif; ?>

	</div>
</section>
