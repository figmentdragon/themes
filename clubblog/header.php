<?php
/**
 * The header for our theme including the navigation and the photo header
 *
 * @package ClubBlog
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open() ) : ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
if ( function_exists( 'wp_body_open' ) ) {
	wp_body_open();
}
?>

<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'clubblog' ); ?></a>

<nav class="navbar navbar-expand-lg navbar-light static-top">
	<div class="container">
		<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<?php
			$clubblog_custom_logo_id = get_theme_mod( 'custom_logo' );
			$clubblog_logo           = wp_get_attachment_image_src( $clubblog_custom_logo_id, 'full' );
			$clubblog_description    = get_bloginfo( 'description', 'display' );
			?>
			<?php if ( has_custom_logo() ) : ?>
				<img src="<?php echo esc_url( $clubblog_logo[0] ); ?>" class="img-fluid">
			<?php else : ?>
				<span class="site-title font-weight-bold"><?php bloginfo( 'name' ); ?></span>
				<?php if ( $clubblog_description || is_customize_preview() ) : ?>
					<span class="site-description d-table"><?php echo esc_html( $clubblog_description ); ?></span>
				<?php endif; ?>
			<?php endif; ?>
		</a>
		<button class="navbar-toggler ms-auto border-0 rounded-circle collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-line position-relative mb-1 bg-white rounded d-block"></span>
			<span class="navbar-toggler-line position-relative mb-1 bg-white rounded d-block"></span>
			<span class="navbar-toggler-line position-relative bg-white rounded d-block"></span>
		</button>
		<div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
			<?php clubblog_bootstrap_menu(); ?>
		</div>
	</div>
</nav>

<?php if ( get_header_image() ) : ?>
<div class="site-header position-relative" style="background-image:url('<?php header_image(); ?>');">
	<div class="container h-100">
		<div class="row h-100">
			<div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3 h-100 d-flex align-items-center text-center">
				<?php if ( is_active_sidebar( 'header-sidebar' ) ) : ?>
					<?php if ( is_front_page() || is_home() ) : ?>
						<?php dynamic_sidebar( 'header-sidebar' ); ?>
					<?php endif; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>
