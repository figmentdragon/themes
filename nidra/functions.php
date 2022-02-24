<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// Overwrite parent theme background defaults and registers support for WordPress features.
add_action( 'after_setup_theme', 'lalita_background_setup' );
function lalita_background_setup() {
	add_theme_support( "custom-background",
		array(
			'default-color' 		 => '1b1b1b',
			'default-image'          => '',
			'default-repeat'         => 'repeat',
			'default-position-x'     => 'left',
			'default-position-y'     => 'top',
			'default-size'           => 'auto',
			'default-attachment'     => '',
			'wp-head-callback'       => '_custom_background_cb',
			'admin-head-callback'    => '',
			'admin-preview-callback' => ''
		)
	);
}

// Overwrite theme URL
function lalita_theme_uri_link() {
	return 'https://wpkoi.com/nidra-wpkoi-wordpress-theme/';
}

// Overwrite parent theme's blog header function
add_action( 'lalita_after_header', 'lalita_blog_header_image', 11 );
function lalita_blog_header_image() {

	if ( ( is_front_page() && is_home() ) || ( is_home() ) ) { 
		$blog_header_image 			=  lalita_get_setting( 'blog_header_image' ); 
		$blog_header_title 			=  lalita_get_setting( 'blog_header_title' ); 
		$blog_header_text 			=  lalita_get_setting( 'blog_header_text' ); 
		$blog_header_button_text 	=  lalita_get_setting( 'blog_header_button_text' ); 
		$blog_header_button_url 	=  lalita_get_setting( 'blog_header_button_url' ); 
		if ( $blog_header_image != '' ) { ?>
		<div class="page-header-image grid-parent page-header-blog" style="background-image: url('<?php echo esc_url($blog_header_image); ?>') !important;">
        	<div class="page-header-noiseoverlay"></div>
        	<div class="page-header-blog-inner">
                <div class="page-header-blog-content-h grid-container">
                    <div class="page-header-blog-content">
                    <?php if ( $blog_header_title != '' ) { ?>
                        <div class="page-header-blog-text">
                            <?php if ( $blog_header_title != '' ) { ?>
                            <h2><?php echo wp_kses_post( $blog_header_title ); ?></h2>
                            <div class="clearfix"></div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                    </div>
                </div>
                <div class="page-header-blog-content page-header-blog-content-b">
                	<?php if ( $blog_header_text != '' ) { ?>
                	<div class="page-header-blog-text">
						<?php if ( $blog_header_title != '' ) { ?>
                        <p><?php echo wp_kses_post( $blog_header_text ); ?></p>
                        <div class="clearfix"></div>
                        <?php } ?>
                    </div>
                    <?php } ?>
                    <div class="page-header-blog-button">
                        <?php if ( $blog_header_button_text != '' ) { ?>
                        <a class="read-more button" href="<?php echo esc_url( $blog_header_button_url ); ?>"><?php echo esc_html( $blog_header_button_text ); ?></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
		</div>
		<?php
		}
	}
}

// Extra cutomizer functions
if ( ! function_exists( 'nidra_customize_register' ) ) {
	add_action( 'customize_register', 'nidra_customize_register' );
	function nidra_customize_register( $wp_customize ) {
				
		// Add Nidra customizer section
		$wp_customize->add_section(
			'nidra_layout_effects',
			array(
				'title' => __( 'Nidra Effects', 'nidra' ),
				'priority' => 24,
			)
		);
		
		
		// Header border
		$wp_customize->add_setting(
			'nidra_settings[header_border]',
			array(
				'default' => 'enable',
				'type' => 'option',
				'sanitize_callback' => 'nidra_sanitize_choices'
			)
		);

		$wp_customize->add_control(
			'nidra_settings[header_border]',
			array(
				'type' => 'select',
				'label' => __( 'Header border', 'nidra' ),
				'choices' => array(
					'enable' => __( 'Enable', 'nidra' ),
					'disable' => __( 'Disable', 'nidra' )
				),
				'settings' => 'nidra_settings[header_border]',
				'section' => 'nidra_layout_effects',
				'priority' => 1
			)
		);
		
		// Sidebar border
		$wp_customize->add_setting(
			'nidra_settings[sidebar_border]',
			array(
				'default' => 'enable',
				'type' => 'option',
				'sanitize_callback' => 'nidra_sanitize_choices'
			)
		);

		$wp_customize->add_control(
			'nidra_settings[sidebar_border]',
			array(
				'type' => 'select',
				'label' => __( 'Sidebar border', 'nidra' ),
				'choices' => array(
					'enable' => __( 'Enable', 'nidra' ),
					'disable' => __( 'Disable', 'nidra' )
				),
				'settings' => 'nidra_settings[sidebar_border]',
				'section' => 'nidra_layout_effects',
				'priority' => 2
			)
		);
		
		// Header type effect
		$wp_customize->add_setting(
			'nidra_settings[type_effect]',
			array(
				'default' => 'enable',
				'type' => 'option',
				'sanitize_callback' => 'nidra_sanitize_choices'
			)
		);

		$wp_customize->add_control(
			'nidra_settings[type_effect]',
			array(
				'type' => 'select',
				'label' => __( 'Header type effect', 'nidra' ),
				'choices' => array(
					'enable' => __( 'Enable', 'nidra' ),
					'disable' => __( 'Disable', 'nidra' )
				),
				'settings' => 'nidra_settings[type_effect]',
				'section' => 'nidra_layout_effects',
				'priority' => 3
			)
		);
		
		// Unique scrollbar
		$wp_customize->add_setting(
			'nidra_settings[unique_scrollbar]',
			array(
				'default' => 'enable',
				'type' => 'option',
				'sanitize_callback' => 'nidra_sanitize_choices'
			)
		);

		$wp_customize->add_control(
			'nidra_settings[unique_scrollbar]',
			array(
				'type' => 'select',
				'label' => __( 'Unique scrollbar', 'nidra' ),
				'choices' => array(
					'enable' => __( 'Enable', 'nidra' ),
					'disable' => __( 'Disable', 'nidra' )
				),
				'settings' => 'nidra_settings[unique_scrollbar]',
				'section' => 'nidra_layout_effects',
				'priority' => 4
			)
		);
		
		// Nidra effect colors
		$wp_customize->add_setting(
			'nidra_settings[nidra_color_1]', array(
				'default' => '#cccccc',
				'type' => 'option',
				'sanitize_callback' => 'nidra_sanitize_hex_color',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'nidra_settings[nidra_color_1]',
				array(
					'label' => __( 'Border color', 'nidra' ),
					'section' => 'nidra_layout_effects',
					'settings' => 'nidra_settings[nidra_color_1]',
					'priority' => 30
				)
			)
		);
		
	}
}

//Sanitize choices.
if ( ! function_exists( 'nidra_sanitize_choices' ) ) {
	function nidra_sanitize_choices( $input, $setting ) {
		// Ensure input is a slug
		$input = sanitize_key( $input );

		// Get list of choices from the control
		// associated with the setting
		$choices = $setting->manager->get_control( $setting->id )->choices;

		// If the input is a valid key, return it;
		// otherwise, return the default
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	}
}

// Sanitize colors. Allow blank value.
if ( ! function_exists( 'nidra_sanitize_hex_color' ) ) {
	function nidra_sanitize_hex_color( $color ) {
	    if ( '' === $color ) {
	        return '';
		}

	    // 3 or 6 hex digits, or the empty string.
	    if ( preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) ) {
	        return $color;
		}

	    return '';
	}
}

// Nidra effects colors css
if ( ! function_exists( 'nidra_effect_colors_css' ) ) {
	function nidra_effect_colors_css() {
		// Get Customizer settings
		$nidra_settings = get_option( 'nidra_settings' );
		
		$nidra_color_1  	 = '#cccccc';
		if ( isset( $nidra_settings['nidra_color_1'] ) ) {
			$nidra_color_1 = $nidra_settings['nidra_color_1'];
		}
		
		$lalita_settings = wp_parse_args(
			get_option( 'lalita_settings', array() ),
			lalita_get_color_defaults()
		);
		
		$nidra_extracolors = '.nidra-header-border .header-content-h, .nidra-sidebar-border #right-sidebar, .nidra-sidebar-border #left-sidebar {border-color: ' . esc_attr( $nidra_color_1 ) . ';}';
		
		return $nidra_extracolors;
	}
}


// The dynamic styles of the parent theme added inline to the parent stylesheet.
// For the customizer functions it is better to enqueue after the child theme stylesheet.
if ( ! function_exists( 'nidra_remove_parent_dynamic_css' ) ) {
	add_action( 'init', 'nidra_remove_parent_dynamic_css' );
	function nidra_remove_parent_dynamic_css() {
		remove_action( 'wp_enqueue_scripts', 'lalita_enqueue_dynamic_css', 50 );
	}
}

// Enqueue this CSS after the child stylesheet, not after the parent stylesheet.
if ( ! function_exists( 'nidra_enqueue_parent_dynamic_css' ) ) {
	add_action( 'wp_enqueue_scripts', 'nidra_enqueue_parent_dynamic_css', 50 );
	function nidra_enqueue_parent_dynamic_css() {
		$css = lalita_base_css() . lalita_font_css() . lalita_advanced_css() . lalita_spacing_css() . lalita_no_cache_dynamic_css() .nidra_effect_colors_css();

		// escaped secure before in parent theme
		wp_add_inline_style( 'lalita-child', $css );
	}
}

//Adds custom classes to the array of body classes.
if ( ! function_exists( 'nidra_body_classes' ) ) {
	add_filter( 'body_class', 'nidra_body_classes' );
	function nidra_body_classes( $classes ) {
		// Get Customizer settings
		$nidra_settings = get_option( 'nidra_settings' );
		
		$header_border 	   = 'enable';
		$unique_scrollbar  = 'enable';
		$type_effect  	   = 'enable';
		$sidebar_border    = 'enable';
		
		if ( isset( $nidra_settings['header_border'] ) ) {
			$header_border = $nidra_settings['header_border'];
		}
		
		if ( isset( $nidra_settings['unique_scrollbar'] ) ) {
			$unique_scrollbar = $nidra_settings['unique_scrollbar'];
		}
		
		if ( isset( $nidra_settings['type_effect'] ) ) {
			$type_effect = $nidra_settings['type_effect'];
		}
		
		if ( isset( $nidra_settings['sidebar_border'] ) ) {
			$sidebar_border = $nidra_settings['sidebar_border'];
		}
		
		// Header border
		if ( $header_border != 'disable' ) {
			$classes[] = 'nidra-header-border';
		}
		
		// Unique scrollbar
		if ( $unique_scrollbar != 'disable' ) {
			$classes[] = 'nidra-unique-scrollbar';
		}
		
		// Header type effect
		if ( $type_effect != 'disable' ) {
			$classes[] = 'nidra-type-effect';
		}
		
		// Sidebar border
		if ( $sidebar_border != 'disable' ) {
			$classes[] = 'nidra-sidebar-border';
		}
		
		return $classes;
	}
}

if ( ! function_exists( 'nidra_scripts' ) ) {
	add_action( 'wp_enqueue_scripts', 'nidra_scripts' );
	/**
	 * Enqueue script
	 */
	function nidra_scripts() {
		
		$nidra_settings = get_option( 'nidra_settings' );
		
		$type_effect		 = 'enable';
		if ( isset( $nidra_settings['type_effect'] ) ) {
			$type_effect = $nidra_settings['type_effect'];
		}
		
		if ( $type_effect != 'disable' ) {
			wp_enqueue_script( 'nidra-t', esc_url( get_stylesheet_directory_uri() ) . "/js/t.min.js", array( 'jquery'), LALITA_VERSION, true );
		}

	}
}
