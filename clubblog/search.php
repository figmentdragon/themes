<?php
/**
 * The template for displaying search results pages
 *
 * @package ClubBlog
 */

get_header(); ?>

<section id="content" class="content content-search py-5">
	<div class="container">
		<div class="row">
		<?php if ( is_active_sidebar( 'primary_sidebar' ) ) : ?>
			<div class="col-12 col-md-8">
		<?php else : ?>
			<div class="col-12">
		<?php endif; ?>
				<div class="row">
					<div class="col-12">
						<div class="page-title">
							<h1 class="mb-3"><?php esc_html_e( 'Search Results For:', 'clubblog' ); ?> <strong><?php echo get_search_query(); ?></strong></h1>
						</div>
						<p><?php echo category_description(); ?></p>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<?php get_template_part( 'loop' ); ?>
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
