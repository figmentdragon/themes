<?php
/**
 * The error 404 template file
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package Storytime
 */
 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
	
get_header(); ?>

<div id="page-content">

    <section id="error404" class="hentry">
        <h1 id="error-title">
            <?php esc_html_e( '404', 'storytime' ); ?>
        </h1>
        <h3 id="error-sub-title">
            <?php esc_html_e( 'Our Apologies. The page requested cannot be found.', 'storytime' ); ?>
        </h3>
        <p>
            <?php esc_html_e( 'It appears we messed up somewhere with a broken link or the page has been removed from our website.', 'storytime' ); ?>
        </p>
        <p id="error-button">
            <a class="more-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                <?php esc_html_e( 'Return Home', 'storytime' ); ?>
            </a>
        </p>

        <div class="search-form-container">
            <?php get_search_form(); ?>
        </div>

    </section>

</div>

<?php
get_footer();
