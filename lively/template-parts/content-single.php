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
		<div class="the-content">
			<?php
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'lively' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'lively' ),
					'after'  => '</div>',
				)
			);
			?>
		</div>
		<div class="post-footer">
			<?php do_action( 'incies_social_sharing' ,get_the_ID() ); ?>
			<div class="post-share-wrap">
				<?php do_action('lively_social_sharing'); ?>
			</div>

			<div class="post-details">
				<?php lively_entry_footer(); ?>
			</div>
		</div>
		<?php
			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'lively' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'lively' ) . '</span> <span class="nav-title">%title</span>',
				)
			);

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
