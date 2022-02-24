<?php
/**
 * The template for displaying the footer
 *
 * @package ClubBlog
 */

?>
<footer>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="footer-main py-3">
					<div class="row">
						<div class="col-12 text-center">
							<p class="mb-0">
								<?php esc_html_e( 'Theme by', 'clubblog' ); ?> 
							<?php if ( is_home() && ! is_paged() ) : ?>
								<a href="<?php echo esc_url( __( 'https://www.thewpclub.com', 'clubblog' ) ); ?>" title="The WP Club" target="_blank">
							<?php endif; ?>
								The WP Club
							<?php if ( is_home() && ! is_paged() ) : ?>
								</a>
							<?php endif; ?> 
								<span class="sep"> | </span> 
								<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'clubblog' ) ); ?>" target="_blank"><?php printf( esc_attr( 'Proudly powered by %s', 'clubblog' ), 'WordPress' ); ?></a>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
