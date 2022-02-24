<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package lively
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-media">
	<?php lively_post_thumbnail(); ?> 
	</div>
	<div class="post-content">
		
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="title">', '</h1>' );
			else :
				the_title( '<h2 class="title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;

			if ( 'post' === get_post_type() ) : ?>
				<!-- Post Details -->
				<div class="post-details">
					<?php lively_posted_on(); ?>
					<?php lively_posted_by(); ?>
				</div>
				<!-- End Post Details -->
			<?php endif; ?>

		<div class="the-excerpt">
			<?php
			if (is_singular()) {
	               the_content();
	            } else {
	               the_excerpt();
	        }
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'lively' ),
					'after'  => '</div>',
				)
			);
			?>
		</div><!-- .entry-content -->
		<div class="post-details">
			<?php lively_entry_footer(); ?>
		</div><!-- .entry-footer -->
	</div>
</article><!-- #post-<?php the_ID(); ?> -->

