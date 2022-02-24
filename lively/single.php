<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package lively
 */

get_header();
?>
<?php 
    $image_id = get_post_thumbnail_id();
    $image_url = wp_get_attachment_image_src( $image_id,'',true );
?>

<main id="primary"  class="col-lg-9 offset-lg-3">
		<div class="block-wrapper">
	<?php
		while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/content', 'single');

		

	endwhile; // End of the loop.
	?>
</div>
</main><!-- #main -->
<?php get_footer(); ?>
