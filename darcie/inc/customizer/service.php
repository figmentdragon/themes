<?php
/**
 * Services options
 *
 * @package
 */

/**
 * Add services content options to theme options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function darcie_service_options( $wp_customize ) {
	// Add note to Jetpack Testimonial Section
    darcie_register_option( $wp_customize, array(
            'name'              => 'darcie_service_jetpack_note',
            'sanitize_callback' => 'sanitize_text_field',
            'custom_control'    => 'Darcie_Note_Control',
            'label'             => sprintf( esc_html__( 'For all Services Options, go %1$shere%2$s', 'darcie' ),
                '<a href="javascript:wp.customize.section( \'darcie_service\' ).focus();">',
                 '</a>'
            ),
           'section'            => 'services',
            'type'              => 'description',
            'priority'          => 1,
        )
    );

    $wp_customize->add_section( 'darcie_service', array(
			'title' => esc_html__( 'Services', 'darcie' ),
			'panel' => 'darcie_theme_options',
		)
	);

	$action = 'install-plugin';
    $slug   = 'essential-content-types';

    $install_url = wp_nonce_url(
        add_query_arg(
            array(
                'action' => $action,
                'plugin' => $slug
            ),
            admin_url( 'update.php' )
        ),
        $action . '_' . $slug
    );

    darcie_register_option( $wp_customize, array(
            'name'              => 'darcie_service_jetpack_note',
            'sanitize_callback' => 'sanitize_text_field',
            'custom_control'    => 'Darcie_Note_Control',
            'active_callback'   => 'darcie_is_ect_services_inactive',
            /* translators: 1: <a>/link tag start, 2: </a>/link tag close. */
            'label'             => sprintf( esc_html__( 'For Services, install %1$sEssential Content Types%2$s Plugin with Service Type Enabled', 'darcie' ),
                '<a target="_blank" href="' . esc_url( $install_url ) . '">',
                '</a>'

            ),
           'section'            => 'darcie_service',
            'type'              => 'description',
            'priority'          => 1,
        )
    );

	// Add color scheme setting and control.
	darcie_register_option( $wp_customize, array(
			'name'              => 'darcie_service_option',
			'default'           => 'disabled',
			'active_callback'   => 'darcie_is_ect_services_active',
			'sanitize_callback' => 'darcie_sanitize_select',
			'choices'           => darcie_section_visibility_options(),
			'label'             => esc_html__( 'Enable on', 'darcie' ),
			'section'           => 'darcie_service',
			'type'              => 'select',
		)
	);

    darcie_register_option( $wp_customize, array(
            'name'              => 'darcie_service_cpt_note',
            'sanitize_callback' => 'sanitize_text_field',
            'custom_control'    => 'Darcie_Note_Control',
            'active_callback'   => 'darcie_is_services_active',
            /* translators: 1: <a>/link tag start, 2: </a>/link tag close. */
			'label'             => sprintf( esc_html__( 'For CPT heading and sub-heading, go %1$shere%2$s', 'darcie' ),
                 '<a href="javascript:wp.customize.control( \'ect_service_title\' ).focus();">',
                 '</a>'
            ),
            'section'           => 'darcie_service',
            'type'              => 'description',
        )
    );

	darcie_register_option( $wp_customize, array(
			'name'              => 'darcie_service_number',
			'default'           => 4,
			'sanitize_callback' => 'darcie_sanitize_number_range',
			'active_callback'   => 'darcie_is_services_active',
			'description'       => esc_html__( 'Save and refresh the page if No. of Services is changed (Max no of Services is 20)', 'darcie' ),
			'input_attrs'       => array(
				'style' => 'width: 100px;',
				'min'   => 0,
			),
			'label'             => esc_html__( 'No of items', 'darcie' ),
			'section'           => 'darcie_service',
			'type'              => 'number',
			'transport'         => 'postMessage',
		)
	);

	$number = get_theme_mod( 'darcie_service_number', 4 );

	//loop for services post content
	for ( $i = 1; $i <= $number ; $i++ ) {
		darcie_register_option( $wp_customize, array(
				'name'              => 'darcie_service_cpt_' . $i,
				'sanitize_callback' => 'darcie_sanitize_post',
				'active_callback'   => 'darcie_is_services_active',
				'label'             => esc_html__( 'Services', 'darcie' ) . ' ' . $i ,
				'section'           => 'darcie_service',
				'type'              => 'select',
                'choices'           => darcie_generate_post_array( 'ect-service' ),
			)
		);

	} // End for().
}
add_action( 'customize_register', 'darcie_service_options', 10 );

/** Active Callback Functions **/
if ( ! function_exists( 'darcie_is_services_active' ) ) :
	/**
	* Return true if services content is active
	*
	* @since 1.0
	*/
	function darcie_is_services_active( $control ) {
		$enable = $control->manager->get_setting( 'darcie_service_option' )->value();

		//return true only if previewed page on customizer matches the type of content option selected
		return ( darcie_is_ect_services_active( $control ) && darcie_check_section( $enable ) );
	}
endif;

if ( ! function_exists( 'darcie_is_ect_services_inactive' ) ) :
    /**
    * Return true if service is active
    *
    * @since 1.0
    */
    function darcie_is_ect_services_inactive( $control ) {
        return ! ( class_exists( 'Essential_Content_Service' ) || class_exists( 'Essential_Content_Pro_Service' ) );
    }
endif;

if ( ! function_exists( 'darcie_is_ect_services_active' ) ) :
    /**
    * Return true if service is active
    *
    * @since 1.0
    */
    function darcie_is_ect_services_active( $control ) {
        return ( class_exists( 'Essential_Content_Service' ) || class_exists( 'Essential_Content_Pro_Service' ) );
    }
endif;
