<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package lively
 */

?>
</div> <!-- End Row -->
</div> <!-- End Container -->
<!-- Footer -->
<footer id="footer" class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 offset-lg-3">
                <div class="footer-inner">
                    <div class="row">
                        <div class="col-sm-6">
                            <?php dynamic_sidebar( 'footer-1' ); ?>
                        </div>
                        <div class="col-sm-6">
                            <?php dynamic_sidebar( 'footer-2' ); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer -->
<?php wp_footer(); ?>
</body>
</html>