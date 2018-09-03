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

	<footer id="colophon" class="bace-footer site-footer">
		<div class="bace-footer__content">
			<div class="container">
				<div class="row">
					<div class="bace-footer__widgets">
						<?php
							if ( is_active_sidebar( 'sidebar-2' ) ){
								dynamic_sidebar( 'sidebar-2' );
							}
						?>
					</div>
					<div class="site-info col-md-4">
						<figure class="bace-footer__logo">
							<?php the_custom_logo(); ?>
						</figure>
						<span>
							<?php
							printf( esc_html__( '%1$s %2$s %3$s', 'bace' ),
								'<span>Copyrights', '&copy', date('Y.')  );
							?>
							<span class="bace-footer__copyright">
								<?php echo esc_textarea( get_theme_mod( 'bace_footer_copyright_text_setting', 'All rights reserved.' ) ); ?>
							</span>
						</span>
						<br />
						<?php
							printf( esc_html__( '%1$s %2$s %3$s %4$s %5$s', 'bace' ),
								'<a href="https://rtcamp.com/privacy-policy">Terms of Use</a>',
								'<span class="sep">|</span>',
								'<a href="https://rtcamp.com/privacy-policy">Privacy Policy</a>',
								'<span>Designed by', '<a href="https://rtcamp.com">rtCamp</a></span>' );
						?>
					</div>
				</div>
			</div>
		</div><!-- .bace-footer-widgets-->

		<div class="bace-footer-disclaimer">
			<div class="container">
				<p class="bace-footer-disclaimer__para">
					<?php echo esc_textarea( get_theme_mod( 'bace_footer_text_setting', 'Sit arcu nec cras elit? 
					Vut sagittis magna nisi vel integer arcu? Dis pulvinar scelerisque pulvinar rhoncus integer, 
					integer in? Ac, cum etiam tortor duis placerat mid nunc cras integer, aliquam porttitor. Dis 
					pulvinar scelerisque pulvinar rhoncus integer, integer in? Ac, cum etiam tortor duis placerat 
					mid nunc cras integer, aliquamporttitor.' ) ); ?>
				</p>
			</div>
		</div><!-- .bace-footer-site-disclaimer-->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
