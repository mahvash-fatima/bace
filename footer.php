<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bace
 */

?>
	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="bace-footer-content">
			<div class="container">
				<div class="row">
					<div class="bace-site-footer-widgets">
						<?php
							if ( is_active_sidebar( 'sidebar-2' ) ){
								dynamic_sidebar( 'sidebar-2' );
							}
						?>
					</div>
					<div class="site-info col-md-4">
						<figure class="bace-site-footer-logo">
							<?php the_custom_logo(); ?>
						</figure>
						<?php
							printf( esc_html__( '%s', 'bace' ),
							'<span>Copyrights &copy 2012. All rights reserved.</span>' );
						?>
						<br />
						<?php
							printf( esc_html__( '%1$s %2$s %3$s %4$s %5$s', 'bace' ),
								'<a href="https://rtcamp.com/privacy-policy">Terms of Use</a>',
								'<span class="sep">|</span>',
								'<a href="https://rtcamp.com/privacy-policy">Privacy Policy</a>',
								'<span>Designed by',
								'<a href="https://rtcamp.com">rtCamp</a></span>' );
						?>
					</div>
				</div>
			</div>
		</div><!-- .bace-footer-widgets-->

		<div class="bace-site-footer-disclaimer">
			<div class="container">
				<p class="bace-site-footer-disclaimer-para">
					<?php
					echo sprintf( esc_html__( '%1$s %2$s', 'bace' ),
						'<strong>Disclaimer: </strong>', 'Sit arcu nec cras elit? Vut sagittis magna nisi vel 
						integer arcu? Dis pulvinar scelerisque pulvinar rhoncus integer, integer in? Ac, cum etiam 
						tortor duis placerat mid nunc cras integer, aliquam porttitor. Dis pulvinar scelerisque pulvinar
						rhoncus integer, integer in? Ac, cum etiam tortor duis placerat mid nunc cras integer, aliquam
						porttitor.' );
					?>
				</p>
			</div>
		</div><!-- .bace-footer-site-disclaimer-->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
