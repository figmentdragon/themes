<?php
/**
 * The template for displaying all single posts
 *
 * @package ClubBlog
 */

get_header(); ?>

<section id="content" class="content content-single py-5">
	<div class="container">
		<div class="row">
		<?php if ( is_active_sidebar( 'primary_sidebar' ) ) : ?>
			<div class="col-12 col-md-8">
		<?php else : ?>
			<div class="col-12">
		<?php endif; ?>
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : ?>
					<?php the_post(); ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="post-item">
							<div class="post-title">
								<h1 class="mb-3"><?php the_title(); ?></h1>
							</div>
							<?php get_template_part( 'inc/post', 'meta' ); ?>
						<?php if ( has_post_thumbnail() ) : ?>
							<div class="post-image mb-4 position-relative">	
								<a href="<?php the_permalink(); ?>">
									<?php
										the_post_thumbnail(
											'medium_large',
											[
												'class' => 'rounded shadow',
											]
										);
									?>
								</a>
						<?php endif; ?>
							<?php if ( has_post_thumbnail() ) : ?>
								<div class="post-categories-list p-4 position-absolute">
									<?php echo wp_kses_post( get_the_category_list() ); ?>
								</div>
							<?php else : ?>
								<div class="post-categories-list mb-4">
									<?php echo wp_kses_post( get_the_category_list() ); ?>
								</div>
							<?php endif; ?>
						<?php if ( has_post_thumbnail() ) : ?>
							</div>
						<?php endif; ?>
							<div class="post-message">
								<?php the_content(); ?>
								<?php
								wp_link_pages(
									array(
										'before' => '<div class="page-link">' . __( 'Pages:', 'clubblog' ),
										'after'  => '</div>',
									)
								);
								?>
							</div>
							<div class="post-edit mb-4 clearfix">
								<?php edit_post_link( __( 'Edit', 'clubblog' ), '<span class="edit-link">', '</span>' ); ?>
							</div>
							<div class="post-tags mb-4">
								<?php the_tags( '<p class="tags">', ' ', '</p>' ); ?>
							</div>
							<?php if ( comments_open() || '0' !== get_comments_number() ) : ?>
								<?php comments_template( '', true ); ?>
							<?php endif; ?>
							<div class="post-navigation mb-4">
								<div class="row">
									<div class="col-12 col-sm-6 mb-2 mb-sm-0">
										<?php previous_post_link(); ?>
									</div>
									<div class="col-12 col-sm-6 text-sm-right">
										<?php next_post_link(); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
			</div>
		<?php if ( is_active_sidebar( 'primary_sidebar' ) ) : ?>
			<div class="col-12 col-md-4">
				<?php get_sidebar(); ?>
			</div>
		<?php endif; ?>
		</div>
	</div>
</section>

<?php get_footer(); ?>
