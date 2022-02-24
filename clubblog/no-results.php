<?php
/**
 * The template for displaying when there is no result
 *
 * @package ClubBlog
 */

?>
<h2><?php esc_html_e( 'Oops..! No Results Found.', 'clubblog' ); ?></h2>
<p><?php esc_html_e( 'Perhaps, Try searching with different keywords.', 'clubblog' ); ?></p>
<?php get_search_form(); ?>
