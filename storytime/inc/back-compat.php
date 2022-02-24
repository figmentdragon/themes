<?php
/**
 * Storytime back compat functionality
 *
 * Prevents Storytime from running on WordPress versions prior to 5,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 5.
 *
 * @package Storytime
 */

/**
 * Prevent switching to Storytime on old versions of WordPress.
 * Switches to the default theme.
 */
function storytime_switch_theme() {
	switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'storytime_upgrade_notice' );
}
add_action( 'after_switch_theme', 'storytime_switch_theme' );

/**
 * Add message for unsuccessful theme switch.
 * Prints an update nag after an unsuccessful attempt to switch to Storytime on WordPress versions prior to 5.
 */
function storytime_upgrade_notice() {
	/* translators: %s: version number */
	$message = sprintf( esc_html__( 'Storytime requires at least WordPress version 5. You are running version %s. Please upgrade and try again.', 'storytime' ), esc_attr($GLOBALS['wp_version'] ) );
	printf( '<div class="error"><p>%s</p></div>', esc_html($message ));
}

/**
 * Prevent the Customizer from being loaded on WordPress versions prior to 5.
 */
function storytime_customize() {
	wp_die(
	/* translators: %s: version number */
		sprintf( esc_html__( 'Storytime requires at least WordPress version 5. You are running version %s. Please upgrade and try again.', 'storytime' ), esc_attr($GLOBALS['wp_version'] )), '', array(
			'back_link' => true,
		)
	);
}
add_action( 'load-customize.php', 'storytime_customize' );

/**
 * Prevent the Theme Preview from being loaded on WordPress versions prior to 5.
 */
function storytime_preview() {
	if ( isset( $_GET['preview'] ) ) {
		/* translators: %s: version number */
		wp_die( sprintf( esc_html__( 'Storytime requires at least WordPress version 5. You are running version %s. Please upgrade and try again.', 'storytime' ), esc_attr($GLOBALS['wp_version'] ) ) );
	}
}
add_action( 'template_redirect', 'storytime_preview' );
