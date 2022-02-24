<?php
/**
 * The template for displaying all pages
 *
 * @package ClubBlog
 */

get_header(); ?>

<section id="content" class="content content-page py-5">
	<div class="container">
		<div class="row">
		<?php if ( is_active_sidebar( 'primary_sidebar' ) ) : ?>
			<div class="col-12 col-md-8">
		<?php else : ?>
			<div class="col-12">
		<?php endif; ?>
				<div class="row">
					<div class="col-12">
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : ?>
						<?php the_post(); ?>	
						<div class="page-title">
							<h1 class="mb-3"><?php the_title(); ?></h1>
						</div>
						<div class="page-message w-100 d-inline-block">
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
						<div class="page-edit mb-4 clearfix">
							<?php edit_post_link( __( 'Edit', 'clubblog' ), '<span class="edit-link">', '</span>' ); ?>
						</div>
						<?php if ( comments_open() || '0' !== get_comments_number() ) : ?>
							<?php comments_template( '', true ); ?>
						<?php endif; ?>
					<?php endwhile; ?>
				<?php endif; ?>
					</div>
				</div>
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
