<?php
/**
 * Upgrade Control for the Customizer
 * @package Storytime
*
 * Control type.
 * For Upsell content in the customizer
 */
 
// Displays the upgrade teasers in thhe Pro Version / More Features section.
if ( class_exists( 'WP_Customize_Control' ) ) {
	
	class Storytime_Customize_Static_Text_Control extends WP_Customize_Control {
		// Render Control
		public function render_content() {
	?>

    <div class="upgrade-pro-version">		

    <p class="rp-pro-heading"><?php esc_html_e('Storytime Pro - Save $10', 'storytime') ?></p>
    <p class="rp-discount"><?php esc_html_e('Save $10 (Limited Time Offer!) if you purchase the Pro version with this discount code on checkout:', 'storytime') ?>
        <span class="rp-discount-code"><?php esc_html_e('STORYTIME10', 'storytime') ?></span></p>
    <p class="rp-pro-title"><?php esc_html_e('Pro Features:', 'storytime') ?></p>

		
			<ul class="rp-pro-list">
				<li><?php esc_html_e('&bull; 5 Blog Styles', 'storytime')?></li>
				<li><?php esc_html_e('&bull; 10 Dynamic Sidebar Positions', 'storytime')?></li>
				<li><?php esc_html_e('&bull; Add Multiple Splash Page Images', 'storytime')?></li>
				<li><?php esc_html_e('&bull; 3 Full Post Layouts', 'storytime')?></li>
				<li><?php esc_html_e('&bull; 5 Menu Locations', 'storytime')?></li>
				<li><?php esc_html_e('&bull; Thumbnail Creation for the Blogs', 'storytime')?></li>
				<li><?php esc_html_e('&bull; Recent Posts Widget w/thumbnails', 'storytime')?></li>				
				<li><?php esc_html_e('&bull; An About Me Widget', 'storytime')?></li>
				<li><?php esc_html_e('&bull; A Social Links Widget', 'storytime')?></li>
				<li><?php esc_html_e('&bull; Customize the Read More Button Text', 'storytime')?></li>
				<li><?php esc_html_e('&bull; Custom Styled Archive Titles', 'storytime')?></li>
				<li><?php esc_html_e('&bull; Custom Styled WordPress Login Page', 'storytime')?></li>
				<li><?php esc_html_e('&bull; Add a Custom Blog Title with Introduction', 'storytime')?></li>
				<li><?php esc_html_e('&bull; We Made the Customizer Look Better', 'storytime')?></li>
				<li><?php esc_html_e('&bull; Show or Hide the Featured Post Label', 'storytime')?></li>
				<li><?php esc_html_e('&bull; Premium Support', 'storytime')?></li>
			</ul>

    <p><a class="rp-get-pro button" href="<?php echo esc_url('https://www.roughpixels.com/blogging-themes/storytime/'); ?>" target="_blank"><?php esc_html_e( 'Go Pro Now', 'storytime' ); ?></a></p>			

    </div>

    <?php
		}
	}
}
