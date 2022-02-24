<?php
/**
 * The template for displaying all the posts
 *
 * @package ClubBlog
 */

?>
<div class="posts">
	<div class="row">
<?php $i = 1; ?>
<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<?php if ( 1 === $i || 2 === $i ) : ?>
		<div class="col-12 col-lg-6 mb-4 pb-3">
		<?php else : ?>
		<div class="col-12 mb-4 pb-3">
		<?php endif; ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php if ( 1 === $i || 2 === $i ) : ?>
				<?php if ( has_post_thumbnail() ) : ?>
					<?php $backgroundimg = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium_large' ); ?>
					<div class="post-item post-item-<?php echo esc_attr( $i ); ?> position-relative rounded shadow" style="background-image: url('<?php echo esc_url( $backgroundimg[0] ); ?>');">
				<?php else : ?>
					<?php $backgroundimg = get_template_directory_uri() . '/images/no-image.jpg'; ?>
					<div class="post-item post-item-<?php echo esc_attr( $i ); ?> position-relative rounded shadow" style="background-image: url('<?php echo esc_url( $backgroundimg ); ?>');">
				<?php endif; ?>		
			<?php else : ?>
				<div class="post-item post-item-<?php echo esc_attr( $i ); ?> position-relative">
			<?php endif; ?>
				<?php if ( 1 === $i || 2 === $i ) : ?>
					<div class="post-categories-list p-4 position-absolute">
						<?php echo wp_kses_post( get_the_category_list() ); ?>
					</div>
				<?php endif; ?>
				<?php if ( 1 === $i || 2 === $i ) : ?>
					<div class="post-info position-absolute px-4">
				<?php else : ?>
					<div class="post-info">
				<?php endif; ?>
						<div class="post-title">
							<?php if ( 1 === $i || 2 === $i ) : ?>
								<h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>" class="text-white"><?php the_title(); ?></a></h2>
							<?php else : ?>
								<h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
							<?php endif; ?>
						</div>
						<?php get_template_part( 'inc/post', 'meta' ); ?>
				<?php if ( 1 !== $i && 2 !== $i ) : ?>
					<?php if ( has_post_thumbnail() ) : ?>
						<div class="post-image mb-4 position-relative">	
							<a href="<?php the_permalink(); ?>">
							<?php
								the_post_thumbnail(
									'large',
									[
										'class' => 'rounded shadow',
									]
								);
							?>
							</a>
					<?php endif; ?>
				<?php endif; ?>
					<?php if ( 1 !== $i && 2 !== $i ) : ?>
						<?php if ( has_post_thumbnail() ) : ?>
							<div class="post-categories-list p-4 position-absolute">
								<?php echo wp_kses_post( get_the_category_list() ); ?>
							</div>
						<?php else : ?>
							<div class="post-categories-list mb-4">
								<?php echo wp_kses_post( get_the_category_list() ); ?>
							</div>
						<?php endif; ?>
					<?php endif; ?>
					<?php if ( has_post_thumbnail() ) : ?>
						<?php if ( 1 !== $i && 2 !== $i ) : ?>
						</div>
						<?php endif; ?>
					<?php endif; ?>
					<?php if ( 1 !== $i && 2 !== $i ) : ?>
						<div class="post-message">
							<?php the_excerpt(); ?>
						</div>
					<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		<?php $i++; ?>
	<?php endwhile; ?>
<?php else : ?>
	<?php get_template_part( 'no-results' ); ?>
<?php endif; ?>
	</div>
</div>
<div class="page-nav mb-5 mb-md-0">
	<?php the_posts_pagination(); ?>
</div>
