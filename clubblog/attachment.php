<?php
/**
 * The template for displaying attachments
 *
 * @package ClubBlog
 */

get_header(); ?>

<section id="content" class="content content-attachment py-5">
	<div class="container">
		<div class="row">
		<?php if ( is_active_sidebar( 'primary_sidebar' ) ) : ?>
			<div class="col-12 col-md-8">
		<?php else : ?>
			<div class="col-12">
		<?php endif; ?>
				<div class="post-title mb-4">
					<h1 class="mb-3"><?php the_title(); ?></h1>
				</div>
			<?php $image_size = apply_filters( 'wporg_attachment_size', 'large' ); ?>
				<div class="entry-attachment mb-4">
					<?php
					echo wp_get_attachment_image(
						get_the_ID(),
						$image_size, 
						'', 
						[
							'class' => 'img-fluid rounded shadow',
						]
					);
					?>
				</div>
			<?php if ( has_excerpt() ) : ?>
				<div class="entry-caption">
					<?php the_excerpt(); ?>
				</div>
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
