<?php
/**
 * The template for displaying post meta (post date, post author and post comments)
 *
 * @package ClubBlog
 */

?>
<?php if ( 'post' === get_post_type() ) : ?>
<div class="post-meta mb-4 text-uppercase">
	<?php echo esc_attr( the_time( get_option( 'date_format' ) ) ); ?> /
	<?php // translators: %s containing the name of the author. ?>
	<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php sprintf( esc_attr__( 'View all posts by %s', 'clubblog' ), get_the_author() ); ?>"><?php echo get_the_author(); ?> </a>
	<?php if ( post_password_required() !== true ) : ?>
	/ <?php comments_number( __( '0 Comments', 'clubblog' ), __( '1 Comment', 'clubblog' ), __( '% Comments', 'clubblog' ) ); ?>
	<?php endif; ?>
</div>
<?php endif; ?>
