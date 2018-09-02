<?php
/**
 * Contains options for Customizer Admin
 * @package bace
 * @since bace 1.0
 */
class Bace_Customizer {
	public function __construct()
	{
		// Setup the Theme Customizer settings and controls...
		add_action( 'customize_register' , array( $this , 'register' ) );
		// Enqueue live preview javascript in Theme Customizer admin screen
		add_action( 'customize_preview_init' , array( $this , 'live_preview' ) );
	}
	/**
	 * Add postMessage support for site title and description for the Customizer.
	 * @param WP_Customize_Manager $wp_customize Customizer object.
	 */
	public static function register ( $wp_customize ) {
		do_action('bace_customize_starts' , $wp_customize );

		/*==============================
				  SLIDER
		===============================*/
		global $bace_theme;

		$wp_customize->add_panel( 'bace_slider_pannel', array(
			'capability'     => 'edit_theme_options',
			'title'          => __( 'Slider Options', 'bace' ),
			'priority'       => 30,
		) );

		$wp_customize->add_section( 'bace_slider_title_section', array(
			'capability'  => 'edit_theme_options',
			'title'       => __( 'Slider Title' , 'bace' ),
			'panel'       => 'bace_slider_pannel',
		) );
		$wp_customize->add_setting( 'bace_slider_title_setting', array(
			'default'           => __( 'Our Partners', 'bace' ),
			'sanitize_callback' => 'sanitize_text_field',
			'capability'        => 'edit_theme_options',
			'transport'         => 'postMessage',
		) );

		$wp_customize->add_control( new WP_Customize_Image_Control ( $wp_customize, 'bace_slider_title_setting', array(
			'type'        => 'text',
			'section'     => 'bace_slider_title_section',
			'label'       => __( 'Slider Title', 'bace' ),
		) ) );

		$default_slides = get_theme_mod( 'bace_slides', bace_our_partners_default_slides() );

		for ( $i = 0; $i <= apply_filters( 'bace_increase_slides', 9 ); $i++ ) {
			$wp_customize->add_section( 'bace_slider_section_' . $i, array(
				'capability'  => 'edit_theme_options',
				'title'       => sprintf( __( 'Slide %s' , 'bace' ), $i+1 ),
				'description' => __( 'Note: All default slide values will be discarded, the moment you make any changes to the slide.', 'bace' ),
				'panel'       => 'bace_slider_pannel',
			) );
			$wp_customize->add_setting( 'bace_slides['.$i.'][image]', array(
				'default'           => isset( $default_slides[$i]['image'] ) ? esc_url($default_slides[$i]['image']) : '',
				'sanitize_callback' => 'esc_url_raw',
				'capability'        => 'edit_theme_options',
			) );
			$wp_customize->add_control( new WP_Customize_Image_Control ( $wp_customize, 'bace_slides['.$i.'][image]', array(
				'section'     => 'bace_slider_section_' . $i,
				'label'       => __( 'Image', 'bace' ),
				'settings'    => 'bace_slides['.$i.'][image]',
			) ) );

		}

		/*==============================
			  Edit Text
		===============================*/

		// Category Title
		$wp_customize->add_panel( 'bace_edit_text_pannel', array(
			'capability'     => 'edit_theme_options',
			'title'          => __( 'Edit Text', 'bace' ),
			'priority'       => 30,
		) );

		$wp_customize->add_section( 'bace_category_text_section', array(
			'capability'  => 'edit_theme_options',
			'title'       => __( 'Category Title' , 'bace' ),
			'panel'       => 'bace_edit_text_pannel',
		) );
		$wp_customize->add_setting( 'bace_category_text_setting', array(
			'default'           => __( 'Glimpses of Exhibition', 'bace' ),
			'sanitize_callback' => 'sanitize_text_field',
			'capability'        => 'edit_theme_options',
			'transport'         => 'postMessage',
		) );

		$wp_customize->add_control( new WP_Customize_Image_Control ( $wp_customize, 'bace_category_text_setting', array(
			'type'        => 'text',
			'section'     => 'bace_category_text_section',
			'label'       => __( 'Footer Text', 'bace' ),
		) ) );

		// Tweets Title
		$wp_customize->add_section( 'bace_latest_tweets_text_section', array(
			'capability'  => 'edit_theme_options',
			'title'       => __( 'Tweets Title' , 'bace' ),
			'panel'       => 'bace_edit_text_pannel',
		) );

		$wp_customize->add_setting( 'bace_latest_tweets_text_setting', array(
			'default'           => __( 'Latest Tweets', 'bace' ),
			'sanitize_callback' => 'sanitize_text_field',
			'capability'        => 'edit_theme_options',
			'transport'         => 'postMessage',
		) );

		$wp_customize->add_control( new WP_Customize_Image_Control ( $wp_customize, 'bace_latest_tweets_text_setting', array(
			'type'        => 'text',
			'section'     => 'bace_latest_tweets_text_section',
			'label'       => __( 'Tweets Text', 'bace' ),
		) ) );

		// Facebook Title
		$wp_customize->add_section( 'bace_facebook_text_section', array(
			'capability'  => 'edit_theme_options',
			'title'       => __( 'Facebook Title' , 'bace' ),
			'panel'       => 'bace_edit_text_pannel',
		) );

		$wp_customize->add_setting( 'bace_facebook_text_setting', array(
			'default'           => __( 'Follow us on Facebook', 'bace' ),
			'sanitize_callback' => 'sanitize_text_field',
			'capability'        => 'edit_theme_options',
			'transport'         => 'postMessage',
		) );

		$wp_customize->add_control( new WP_Customize_Image_Control ( $wp_customize, 'bace_facebook_text_setting', array(
			'type'        => 'text',
			'section'     => 'bace_facebook_text_section',
			'label'       => __( 'Facebook Text', 'bace' ),
		) ) );

		// Footer Disclaimer
		$wp_customize->add_section( 'bace_footer_text_section', array(
			'capability'  => 'edit_theme_options',
			'title'       => __( 'Footer Text' , 'bace' ),
			'panel'       => 'bace_edit_text_pannel',
		) );
		$wp_customize->add_setting( 'bace_footer_text_setting', array(
			'default'           => __( 'Sit arcu nec cras elit? Vut sagittis magna nisi vel integer arcu? Dis 
			pulvinar scelerisque pulvinar rhoncus integer, integer in? Ac, cum etiam tortor duis placerat mid 
			nunc cras integer, aliquam porttitor. Dis pulvinar scelerisque pulvinar rhoncus integer, integer 
			in? Ac, cum etiam tortor duis placerat mid nunc cras integer, aliquamporttitor.', 'bace' ),
			'sanitize_callback' => 'sanitize_text_field',
			'capability'        => 'edit_theme_options',
			'transport'         => 'postMessage',
		) );

		$wp_customize->add_control( new WP_Customize_Image_Control ( $wp_customize, 'bace_footer_text_setting', array(
			'type'        => 'text',
			'section'     => 'bace_footer_text_section',
			'label'       => __( 'Footer Text', 'bace' ),
		) ) );

		// Footer Copyright
		$wp_customize->add_section( 'bace_footer_copyright_text_section', array(
			'capability'  => 'edit_theme_options',
			'title'       => __( 'Footer Copyright Text' , 'bace' ),
			'panel'       => 'bace_edit_text_pannel',
		) );
		$wp_customize->add_setting( 'bace_footer_copyright_text_setting', array(
			'default'           => __( 'All rights reserved.', 'bace' ),
			'sanitize_callback' => 'sanitize_text_field',
			'capability'        => 'edit_theme_options',
			'transport'         => 'postMessage',
		) );

		$wp_customize->add_control( new WP_Customize_Image_Control ( $wp_customize, 'bace_footer_copyright_text_setting', array(
			'type'        => 'text',
			'section'     => 'bace_footer_copyright_text_section',
			'label'       => __( 'Footer Text', 'bace' ),
		) ) );

		// We can also change built-in settings by modifying properties. For instance, let's make some stuff use live preview JS...
		$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
		do_action('bace_customize_ends' , $wp_customize );
	}
	/**
	 * This outputs the javascript needed to automate the live settings preview.
	 * Also keep in mind that this function isn't necessary unless your settings
	 * are using 'transport'=>'postMessage' instead of the default 'transport'
	 * @since bace 1.0
	 */
	public static function live_preview() {
		wp_enqueue_script(
			'bace-themecustomizer', // Give the script a unique ID
			get_template_directory_uri() . '/js/customizer.js', // Define the path to the JS file
			array(  'jquery', 'customize-preview' ), // Define dependencies
			'1.0', // Define a version (optional)
			true // Specify whether to put in footer (leave this true)
		);
	}
}
new Bace_Customizer();
