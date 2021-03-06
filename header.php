<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bace
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'bace' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="bace-site-header-wrapper container">
			<div class="bace-site-branding-wrapper">
				<div class="site-branding">
					<button class="bace-secondary-navbar-toggle navbar-toggle" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
						<i class="navbar-toggle-icon fas fa-bars"></i>
					</button>
					<?php
					the_custom_logo();
					if ( is_front_page() && is_home() ) :
						?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
					else :
						?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
					endif;

					$bace_description = get_bloginfo( 'description', 'display' );
					if ( $bace_description || is_customize_preview() ) :
						?>
						<p class="site-description"><?php echo $bace_description; /* WPCS: xss ok. */ ?></p>
					<?php endif; ?>
					<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
						<i class="navbar-toggle-icon fas fa-bars"></i>
					</button>
				</div><!-- .site-branding -->

				<div class="bace-header-search-form">
					<?php echo get_search_form(); ?>
				</div><!-- .bace-search-form -->
			</div>

			<nav class="bace-primary-navbar navbar navbar-expand-md navbar-light bg-light" role="navigation">
				<?php
				wp_nav_menu( array(
					'theme_location'    => 'primary',
					'depth'             => 2,
					'container'         => 'div',
					'container_class'   => 'collapse navbar-collapse',
					'container_id'      => 'bs-example-navbar-collapse-1',
					'menu_class'        => 'nav navbar-nav bace-primary-navbar-nav',
					'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
					'walker'            => new WP_Bootstrap_Navwalker(),
				) );
				?>
			</nav>
		</div><!-- .container -->
		<nav class="bace-secondary-navbar navbar navbar-expand-md navbar-light bg-light" role="navigation">
			<div class="container">
				<?php
				wp_nav_menu( array(
					'theme_location'    => 'secondary',
					'depth'             => 2,
					'container'         => 'div',
					'container_class'   => 'collapse navbar-collapse',
					'container_id'      => 'bs-example-navbar-collapse-2',
					'menu_class'        => 'nav navbar-nav bace-secondary-navbar-nav',
					'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
					'walker'            => new WP_Bootstrap_Navwalker(),
				) );
				?>
			</div>
		</nav>
	</header><!-- #masthead -->

	<div id="content" class="site-content container">
