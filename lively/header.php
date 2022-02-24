<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package lively
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
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary">
		<?php esc_html_e( 'Skip to content', 'lively' ); ?>
	</a>
	<?php $preloader = absint(get_theme_mod( 'lively-preloader', 0 )); 

	if($preloader == 1 ) { ?>
	<!-- Preload -->
	<div id="preload">
		<div class="ts-bounce">
			<div></div>
			<div></div>
		</div>
	</div>
	<!-- Preload -->
	<?php } ?>
	<!-- Mobile Menu -->
	<div class="container">
		<div class="block-mobile">
			<!-- Logo -->
			<div class="logo">
				<?php
				the_custom_logo();
				if ( is_front_page() && is_home() ) :
					?>
					<h1 class="site-title">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				else :
					?>
					<h2 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>
					<?php
				endif;
				$lively_description = get_bloginfo( 'description', 'display' );
				if ( $lively_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo $lively_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
				<?php endif; ?>
			</div>
			<!-- End Logo -->
			<!-- Mobile -->
			<div class="menu-mobile">
				<button> 
					<span class="item item-1"></span>
					<span class="item item-2"></span>
					<span class="item item-3"></span>
				</button>

			</div>
			<!-- End Mobile -->
		</div>
	</div>

	<div class="hide-menu"></div>
	<!-- End Mobile Menu -->
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<div class="header affix">
					<div class="table">
						<div class="table-cell">
							
							
							<!-- Logo -->
							<div class="logo">
								<?php
								the_custom_logo();
								if ( is_front_page() && is_home() ) :
									?>
									<h1 class="site-title">
										<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
									<?php
								else :
									?>
									<h2 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>
									<?php
								endif;
								$lively_description = get_bloginfo( 'description', 'display' );
								if ( $lively_description || is_customize_preview() ) :
									?>
									<p class="site-description"><?php echo $lively_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
								<?php endif; ?>
							</div>
							<!-- End Logo -->
							<!-- Navigation -->
							<div class="main-menu">
								<nav>
									<?php
										if (has_nav_menu('menu-1')) {
						                    wp_nav_menu( array(
												'theme_location' => 'menu-1',
												'menu_id'        => 'primary-menu',
												'container' => 'ul',
												'menu_class'      => 'menu-list'
											));
						                }
					                ?>
					            </nav>
					            </div>
							<!-- End Navigation -->
							<div class="mt-5 center d-flex justify-content-end align-items-center">
								<!-- Socials -->
								<div class="socials">
									<?php
									if (has_nav_menu('social')) {
										wp_nav_menu( array(
											'theme_location' => 'social',
											'menu_id'        => 'social-menu',
											'menu_class'     => 'lively-social-menu',
										) );
									}
									?>
								</div>
								<?php
									$lively_search = absint(get_theme_mod( 'lively-search-icon', 1 ));
									?>
								<?php if($lively_search == 1) { ?>
									<div class="search-box mr-2">
									  <?php get_search_form();?>
									</div>
								<?php } ?>
							</div>
							<!-- End Socials -->

							<div class="copyright">
								<p>	
									<?php
									$lively_copyright_text = get_theme_mod( 'lively-copyright-text', __( 'Lively @ 2021', 'lively' ) );
									?>
									<span class="copyright">
										<?php echo esc_html($lively_copyright_text); ?>
									</span>
									<?php
									/* translators: 1: Theme name, 2: Theme author. */
									printf( esc_html__( 'By %1$s : %2$s.', 'lively' ), '', '<a href="https://www.templatesell.com/">Template Sell</a>' );
									?>
								</p>
							</div>
							<div class="close-block">
								<a href="javascript:void(0)"><div class="btn-close"></div></a>
							</div>
						</div>
					</div>
				</div>
			</div>