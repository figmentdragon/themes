<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package ClubBlog
 */

get_header(); ?>

<section id="content" class="content content-404 py-5">
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
							<h1 class="mb-3"><?php esc_html_e( 'The Page You Are Looking For Doesn&rsquo;t Exist.', 'clubblog' ); ?></h1>
						</div>
						<h2><?php esc_html_e( 'We are very sorry for the inconvenience.', 'clubblog' ); ?></h2>
						<p><?php esc_html_e( 'Perhaps, Try using the search box below.', 'clubblog' ); ?></p>
						<?php get_search_form(); ?>
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
