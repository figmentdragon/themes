<?php
/**
 * The template for displaying image attachments
 * @package Storytime
 */

get_header(); ?>

<div id="page-content">

    <?php while ( have_posts() ) : the_post(); ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <header class="post-header">
            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        </header>

        <div id="attachment-wrapper">
            <?php
				$image_size = apply_filters( 'storytime_attachment_size', 'full' );
				echo wp_get_attachment_image( get_the_ID(), $image_size );
            ?>
        </div>

        <?php if ( has_excerpt() ) : ?>
        <div class="gallery-post-caption">
            <?php the_excerpt(); ?>
        </div>
        <?php endif; ?>

        <div id="attachment-description">
            <?php the_content();	?>
        </div>

        <footer class="post-footer">
            <nav id="image-navigation" class="image-navigation">

                <div class="prev-image attachment-button">
                    <?php previous_image_link( false, __( 'Previous Image', 'storytime' ) ); ?>
                </div>
                <div class="next-image attachment-button">
                    <?php next_image_link( false, __( 'Next Image', 'storytime' ) ); ?>
                </div>

            </nav>
        </footer>

    </article>

    <?php
    // If comments are open or we have at least one comment, load up the comment template
    if ( esc_attr(get_theme_mod( 'storytime_attachment_comments', true ) ) && comments_open() || get_comments_number() ) {
    comments_template();
    }
    // End the loop.
    endwhile;
    ?>

</div>

<?php get_footer(); ?>
