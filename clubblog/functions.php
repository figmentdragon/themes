<?php
/**
 * ClubBlog functions and definitions
 *
 * @package ClubBlog
 */

/**
 * ClubBlog Theme Setup
 */
function clubblog_setup() {
	// Meta Title.
	add_theme_support( 'title-tag' );

	// Automatic Feed Links.
	add_theme_support( 'automatic-feed-links' );

	// Logo Support.
	add_theme_support(
		'custom-logo',
		array(
			'width'       => 215,
			'height'      => 38,
			'flex-width'  => true,
			'flex-height' => true,
			'header-text' => array( 'site-title', 'site-description' ),
		)
	);

	// Featured Image.
	add_theme_support( 'post-thumbnails' );

	// Language Support.
	load_theme_textdomain( 'clubblog', get_template_directory() . '/languages' );

	// Header Image.
	$clubblog_args = array(
		'flex-width'         => true,
		'width'              => 2100,
		'flex-height'        => true,
		'height'             => 900,
		'default-text-color' => '#333333',
	);
	add_theme_support( 'custom-header', $clubblog_args );

	// Content Width.
	if ( ! isset( $content_width ) ) {
		$content_width = 1170;
	}
}
add_action( 'after_setup_theme', 'clubblog_setup' );

/**
 * Color Customizer
 *
 * @param array $clubblog_wp_customize Theme Colors.
 */
function clubblog_customize_register( $clubblog_wp_customize ) {
	$clubblog_colors   = array();
	$clubblog_colors[] = array(
		'slug'    => 'default_color',
		'default' => '#f8859f',
		'label'   => __( 'Default Color ', 'clubblog' ),
	);
	$clubblog_colors[] = array(
		'slug'    => 'sub_color',
		'default' => '#3fe8cf',
		'label'   => __( 'Sub Color ', 'clubblog' ),
	);

	foreach ( $clubblog_colors as $clubblog_color ) {
		$clubblog_wp_customize->add_setting(
			$clubblog_color['slug'],
			array(
				'default'           => $clubblog_color['default'],
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$clubblog_wp_customize->add_control(
			new WP_Customize_Color_Control(
				$clubblog_wp_customize,
				$clubblog_color['slug'],
				array(
					'label'    => $clubblog_color['label'],
					'section'  => 'colors',
					'settings' => $clubblog_color['slug'],
				)
			)
		);
	}
}
add_action( 'customize_register', 'clubblog_customize_register' );

/**
 * Bootstrap 5.0.0
 */
function clubblog_bootstrap() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/bootstrap/bootstrap.min.css', array(), '1.1.6' );
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/fontawesome/css/fontawesome.min.css', array(), '1.1.6' );
	wp_enqueue_style( 'clubblog-googlefonts', clubblog_google_fonts_url(), array(), '1.1.6' );
	wp_enqueue_style( 'clubblog-style', get_stylesheet_uri(), array(), '1.1.6' );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/bootstrap/bootstrap.min.js', array( 'jquery' ), '1.1.6', true );
	wp_enqueue_script( 'clubblog-script', get_template_directory_uri() . '/js/script.min.js', array( 'jquery' ), '1.1.6', true );
}
add_action( 'wp_enqueue_scripts', 'clubblog_bootstrap' );

/**
 * Google Font
 */
function clubblog_google_fonts_url() {
	$font_families = array( 'Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i', 'Playfair Display:400,400i,700,700i,900,900' );
	$query_args    = array(
		'family' => rawurlencode( implode( '|', $font_families ) ),
		'subset' => rawurlencode( 'latin,latin-ext' ),
	);
	$fonts_url     = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
	return apply_filters( 'clubblog_google_fonts_url', $fonts_url );
}

/**
 * Navigation
 */
function clubblog_register_menu() {
	register_nav_menus(
		array(
			'primary' => esc_html__( 'Top Primary Menu', 'clubblog' ),
		)
	);
}
add_action( 'init', 'clubblog_register_menu' );

/**
 * Bootstrap Navigation
 */
function clubblog_bootstrap_menu() {
	wp_nav_menu(
		array(
			'theme_location' => 'primary',
			'depth'          => 2,
			'menu_class'     => 'nav navbar-nav',
			'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
			'walker'         => new WP_Bootstrap_Navwalker(),
		)
	);
}
require get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

/**
 * Header Style
 */
function clubblog_header_style() {
	if ( ! display_header_text() ) {
		echo '
		<style type="text/css">
			.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px 1px 1px 1px);
				clip: rect(1px, 1px, 1px, 1px);
			}
		</style>
		';
	}
}
add_action( 'wp_head', 'clubblog_header_style' );

/**
 * Custom Colors
 */
function clubblog_customizer_css() {
	$clubblog_default_color     = get_theme_mod( 'default_color' );
	$clubblog_sub_color         = get_theme_mod( 'sub_color' );
	$clubblog_header_text_color = get_header_textcolor();
	?>
	<style type="text/css">
		.navbar-toggler,
		.post-item .post-categories-list .post-categories li a,
		.post-item .post-tags .tags a,
		.nav-links .page-numbers.current {
			background-color: <?php echo esc_attr( $clubblog_default_color ); ?>;
		}

		.post-item .post-image img,
		.post-item-1,
		.post-item-2 {
			border-color: <?php echo esc_attr( $clubblog_default_color ); ?>;
		}

		a:hover,
		a:focus,
		.navbar-light .navbar-brand:hover,
		.navbar-light .navbar-brand:focus,
		.navbar-light .navbar-nav .active > .nav-link,
		.navbar-light .navbar-nav .nav-link.active,
		.navbar-light .navbar-nav .nav-link.show,
		.navbar-light .navbar-nav .show > .nav-link,
		footer a {
			color: <?php echo esc_attr( $clubblog_default_color ); ?>;
		}

		.btn-search,
		.btn-submit,
		.btn-search:hover,
		.btn-search:focus,
		.btn-submit:hover,
		.btn-submit:focus,
		.comment .reply a {
			background-color: <?php echo esc_attr( $clubblog_sub_color ); ?>;
		}

		.sidebar-item,
		.comment.depth-1 {
			border-color: <?php echo esc_attr( $clubblog_sub_color ); ?>;
		}

		.navbar-brand {
			color: #<?php echo esc_attr( $clubblog_header_text_color ); ?>;
		}
	</style>
	<?php
}
add_action( 'wp_head', 'clubblog_customizer_css' );

/**
 * Widgets
 */
function clubblog_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Primary Sidebar', 'clubblog' ),
			'id'            => 'primary_sidebar',
			'before_widget' => '<div class="sidebar-item mb-4 p-4 rounded shadow">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2>',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Header', 'clubblog' ),
			'id'            => 'header-sidebar',
			'before_widget' => '<div class="header w-100 position-relative text-white">',
			'after_widget'  => '</div>',
			'before_title'  => '<h1 class="mb-3 text-white">',
			'after_title'   => '</h1>',
		)
	);
}
add_action( 'widgets_init', 'clubblog_widgets_init' );

/**
 * Post Read More
 *
 * @param array $link Show more link.
 */
function clubblog_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}

	$link = sprintf(
		'<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		// translators: %s containing the title of the post or page.
		sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'clubblog' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'clubblog_excerpt_more' );

/**
 * Bootstrap Images img-fluid
 *
 * @param array $html Html code for image with Bootstrap class.
 */
function clubblog_bootstrap_responsive_images( $html ) {
	$classes = 'img-fluid';
	if ( preg_match( '/<img.*? class="/', $html ) ) {
		$html = preg_replace( '/(<img.*? class=".*?)(".*?\/>)/', '$1 ' . $classes . ' $2', $html );
	} else {
		$html = preg_replace( '/(<img.*?)(\/>)/', '$1 class="' . $classes . '" $2', $html );
	}
	return $html;
}
add_filter( 'the_content', 'clubblog_bootstrap_responsive_images', 10 );
add_filter( 'post_thumbnail_html', 'clubblog_bootstrap_responsive_images', 10 );

/**
 * Comment Reply
 */
function clubblog_comment_reply() {
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'clubblog_comment_reply' );

/**
 * Bootstrap Comment Form
 *
 * @param array $clubblog_fields Comment Form Fields.
 */
function clubblog_comment_form_fields( $clubblog_fields ) {
	$clubblog_commenter = wp_get_current_commenter();
	$clubblog_req       = get_option( 'require_name_email' );
	$clubblog_aria_req  = ( $clubblog_req ? " aria-required='true'" : '' );
	$clubblog_html5     = current_theme_supports( 'html5', 'comment-form' ) ? 1 : 0;
	$clubblog_fields    = array(
		'author' => '<div class="form-group comment-form-author"><input class="form-control" id="author" name="author" type="text" value="' . esc_attr( $clubblog_commenter['comment_author'] ) . '" placeholder="' . ( $clubblog_req ? '* ' : '' ) . __( 'Name', 'clubblog' ) . '..." size="30"' . $clubblog_aria_req . ' /></div>',
		'email'  => '<div class="form-group comment-form-email"><input class="form-control" id="email" name="email" ' . ( $clubblog_html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr( $clubblog_commenter['comment_author_email'] ) . '" placeholder="' . ( $clubblog_req ? '* ' : '' ) . __( 'Email', 'clubblog' ) . '..." size="30"' . $clubblog_aria_req . ' /></div>',
		'url'    => '<div class="form-group comment-form-url"><input class="form-control" id="url" name="url" ' . ( $clubblog_html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $clubblog_commenter['comment_author_url'] ) . '" placeholder="' . __( 'Website', 'clubblog' ) . '..." size="30" /></div>',
	);
	return $clubblog_fields;
}
add_filter( 'comment_form_default_fields', 'clubblog_comment_form_fields' );

/**
 * Bootstrap Comment Form
 *
 * @param array $clubblog_args Comment Form Fields.
 */
function clubblog_comment_form( $clubblog_args ) {
	$clubblog_args['comment_field'] = '<div class="form-group comment-form-comment"><textarea class="form-control" id="comment" name="comment" cols="45" rows="8" placeholder="' . __( 'Comment', 'clubblog' ) . '..." aria-required="true"></textarea></div>';
	$clubblog_args['class_submit']  = 'btn btn-default btn-submit';
	return $clubblog_args;
}
add_filter( 'comment_form_defaults', 'clubblog_comment_form' );
?>
