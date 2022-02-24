<?php
/**
 * Added lively Page.
*/

/**
 * Add a new page under Appearance
 */
function lively_menu() {
	add_theme_page( __( 'Lively Options', 'lively' ), __( 'Lively Options', 'lively' ), 'edit_theme_options', 'lively-theme', 'lively_page' );
}
add_action( 'admin_menu', 'lively_menu' );

/**
 * Enqueue styles for the help page.
 */
function lively_admin_scripts( $hook ) {
	if ( 'appearance_page_lively-theme' !== $hook ) {
		return;
	}
	wp_enqueue_style( 'lively-admin-style', get_template_directory_uri() . '/templatesell/about/about.css', array(), '' );
}
add_action( 'admin_enqueue_scripts', 'lively_admin_scripts' );

/**
 * Add the theme page
 */
function lively_page() {
	?>
	<div class="das-wrap">
		<div class="lively-panel">
			<div class="lively-logo">
				<img class="ts-logo" src="<?php echo esc_url( get_template_directory_uri() . '/templatesell/about/images/lively.png' ); ?>" alt="Logo">
			</div>
			<a href="https://www.templatesell.com/item/lively-pro/" target="_blank" class="btn btn-success pull-right"><?php esc_html_e( 'Upgrade Pro $49', 'lively' ); ?></a>
			<p>
			<?php esc_html_e( 'A perfect theme for blog and magazine site. With masonry layout and multiple blog page layout, this theme is the awesome and minimal theme.', 'lively' ); ?></p>
			<a class="btn btn-primary" href="<?php echo esc_url (admin_url( '/customize.php?' ));
				?>"><?php esc_html_e( 'Theme Options - Click Here', 'lively' ); ?></a>
		</div>

		<div class="lively-panel">
			<div class="lively-panel-content">
				<div class="theme-title">
					<h3><?php esc_html_e( 'Looking for theme Documentation?', 'lively' ); ?></h3>
				</div>
				<a href="https://docs.templatesell.net/lively/" target="_blank" class="btn btn-secondary"><?php esc_html_e( 'Documentation - Click Here', 'lively' ); ?></a>
			</div>
		</div>
		<div class="lively-panel">
			<div class="lively-panel-content">
				<div class="theme-title">
					<h3><?php esc_html_e( 'If you like the theme, please leave a review', 'lively' ); ?></h3>
				</div>
				<a href="https://wordpress.org/support/theme/lively/reviews/#new-post" target="_blank" class="btn btn-secondary"><?php esc_html_e( 'Rate this theme', 'lively' ); ?></a>
			</div>
		</div>
	</div>
	<?php
}
