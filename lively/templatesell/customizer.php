<?php
/**
 * lively Theme Customizer
 *
 * @package lively
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function lively_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'lively_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'lively_customize_partial_blogdescription',
			)
		);

		/*Main custom panel for theme settings*/
		$wp_customize->add_panel(
			'lively_panel',
			array(
				'priority'   => 10,
				'capability' => 'edit_theme_options',
				'title'      => __( 'Theme Options', 'lively' ),
			)
		);

		/*Header Options*/
		$wp_customize->add_section(
			'header_section',
			array(
				'title' => __( 'Header Options', 'lively' ),
				'panel' => 'lively_panel',
			)
		);

		/*Search Icon*/
		$wp_customize->add_setting(
			'lively-search-icon',
			array(
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'default'           => 1,
				'sanitize_callback' => 'lively_sanitize_checkbox',
			)
		);

		$wp_customize->add_control(
			'lively-search-icon',
			array(
				'label'       => __( 'Show Search Icon', 'lively' ),
				'description' => __( 'Checked to show the search icon.', 'lively' ),
				'section'     => 'header_section',
				'type'        => 'checkbox',
			)
		);

		/*Preloader Options*/
		$wp_customize->add_section(
			'preloader_option',
			array(
				'title' => __( 'Preloader Options', 'lively' ),
				'panel' => 'lively_panel',
			)
		);

		/*Search Icon*/
		$wp_customize->add_setting(
			'lively-preloader',
			array(
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'default'           => 0,
				'sanitize_callback' => 'lively_sanitize_checkbox',
			)
		);

		$wp_customize->add_control(
			'lively-preloader',
			array(
				'label'       => __( 'Enable Preloader', 'lively' ),
				'description' => __( 'Checked to enable preloader.', 'lively' ),
				'section'     => 'preloader_option',
				'type'        => 'checkbox',
			)
		);

		/*Footer Options*/
		$wp_customize->add_section(
			'copyright_option',
			array(
				'title' => __( 'Copyright Options', 'lively' ),
				'panel' => 'lively_panel',
			)
		);


		/*Copyright Text*/
		$wp_customize->add_setting(
			'lively-copyright-text',
			array(
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'default'           => __( '© 2021', 'lively' ),
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			'lively-copyright-text',
			array(
				'label'       => __( 'Copyright Text', 'lively' ),
				'description' => __( 'Enter your copyright text here.', 'lively' ),
				'section'     => 'copyright_option',
				'type'        => 'text',
			)
		);
	}
}
add_action( 'customize_register', 'lively_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function lively_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function lively_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function lively_customize_preview_js() {
	wp_enqueue_script( 'lively-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), LIVELY_S_VERSION, true );
}
add_action( 'customize_preview_init', 'lively_customize_preview_js' );
