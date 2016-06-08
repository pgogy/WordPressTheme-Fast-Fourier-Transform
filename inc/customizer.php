<?php

function fast_fourier_transform_sanitize_text($str){
	return sanitize_text_field($str);
}

function fast_fourier_transform_customize_register_modify( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
	$wp_customize->remove_section( 'header_image' );
	$wp_customize->remove_section( 'colors' );
	
}

function fast_fourier_transform_customize_register_home_page_layout( $wp_customize ){

	$wp_customize->add_section( 'home_page_layout' , array(
		'title'      => __( 'Home Page', 'fast-fourier-transform' ),
		'priority'   => 2,
	) );

	$wp_customize->add_setting(
		'home_page',
		array(
			'default' => 'center',
			'sanitize_callback' => 'fast_fourier_transform_sanitize_text'
		)
	);
	 
	$wp_customize->add_control(
		'home_page',
		array(
			'type' => 'radio',
			'label' => 'Home page layout',
			'section' => 'home_page_layout',
			'choices' => array(
				'left' => 'left',
				'center' => 'Centre',	
			),
		)
	);

}

function fast_fourier_transform_customize_register_page_layout( $wp_customize ){

	$wp_customize->add_section( 'page_layout' , array(
		'title'      => __( 'Page Layout', 'fast-fourier-transform' ),
		'priority'   => 2,
	) );
	
	$wp_customize->add_setting(
		'pagination',
		array(
			'default' => 'on',
			'sanitize_callback' => 'fast_fourier_transform_sanitize_text'
		)
	);
	 
	$wp_customize->add_control(
		'pagination',
		array(
			'type' => 'radio',
			'label' => 'Display pagination',
			'section' => 'page_layout',
			'choices' => array(
				'on' => 'On',
				'off' => 'Off'		
			),
		)
	);
	
	$wp_customize->add_setting(
		'search',
		array(
			'default' => 'on',
			'sanitize_callback' => 'fast_fourier_transform_sanitize_text'
		)
	);
	 
	$wp_customize->add_control(
		'search',
		array(
			'type' => 'radio',
			'label' => 'Display Search',
			'section' => 'page_layout',
			'choices' => array(
				'on' => 'On',
				'off' => 'Off'		
			),
		)
	);
	
	$wp_customize->add_setting(
		'comments',
		array(
			'default' => 'on',
			'sanitize_callback' => 'fast_fourier_transform_sanitize_text'
		)
	);
	 
	$wp_customize->add_control(
		'comments',
		array(
			'type' => 'radio',
			'label' => 'Display Comments',
			'section' => 'page_layout',
			'choices' => array(
				'on' => 'On',
				'off' => 'Off'		
			),
		)
	);
	
	$wp_customize->add_setting(
		'author',
		array(
			'default' => 'on',
			'sanitize_callback' => 'fast_fourier_transform_sanitize_text'
		)
	);
	 
	$wp_customize->add_control(
		'author',
		array(
			'type' => 'radio',
			'label' => 'Display Author',
			'section' => 'page_layout',
			'choices' => array(
				'on' => 'On',
				'off' => 'Off'		
			),
		)
	);
	
}

function fast_fourier_transform_customize_register_fav_icon( $wp_customize ){
	
	$wp_customize->add_section( 'fav_icon' , array(
		'title'      => __( 'Fav Icon', 'fast-fourier-transform' ),
		'priority'   => 2,
	) );

	$wp_customize->add_setting(
		'fav_icon_url',
		array(
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	 
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'fav_icon_url',
			array(
				'label' => 'Fav Icon',
				'section' => 'fav_icon',
				'settings' => 'fav_icon_url'
			)
		)
	);
	
}

function fast_fourier_transform_customize_register_add_site_colours( $wp_customize ) {
	
	$wp_customize->add_section( 'site_colours' , array(
		'title'      => __( 'Site Colours', 'fast-fourier-transform' ),
		'priority'   => 30,
	) );
	
	$wp_customize->add_setting(
		'site_allsite_background_colour',
		array(
			'default' => '',
			'transport' => 'postMessage',
			'sanitize_callback' => 'fast_fourier_transform_sanitize_text'
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'site_allsite_background_colour',
			array(
				'label' => 'Site background colour',
				'section' => 'site_colours',
				'settings' => 'site_allsite_background_colour'
			)
		)
	);
	
	$wp_customize->add_setting(
		'site_alllink_colour',
		array(
			'default' => '',
			'transport' => 'postMessage',
			'sanitize_callback' => 'fast_fourier_transform_sanitize_text'
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'site_alllink_colour',
			array(
				'label' => 'Home Page Link Colour',
				'section' => 'site_colours',
				'settings' => 'site_alllink_colour'
			)
		)
	);
	
	$wp_customize->add_setting(
		'site_line_colour',
		array(
			'default' => '',
			'transport' => 'postMessage',
			'sanitize_callback' => 'fast_fourier_transform_sanitize_text'
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'site_line_colour',
			array(
				'label' => 'Line Colour',
				'section' => 'site_colours',
				'settings' => 'site_line_colour'
			)
		)
	);
	
	$wp_customize->add_setting(
		'site_text_colour',
		array(
			'default' => '',
			'transport' => 'postMessage',
			'sanitize_callback' => 'fast_fourier_transform_sanitize_text'
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'site_text_colour',
			array(
				'label' => 'Site Text Colour',
				'section' => 'site_colours',
				'settings' => 'site_text_colour'
			)
		)
	);
	
	$wp_customize->add_setting(
		'site_post_link_colour',
		array(
			'default' => '',
			'transport' => 'postMessage',
			'sanitize_callback' => 'fast_fourier_transform_sanitize_text'
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'site_post_link_colour',
			array(
				'label' => 'Site Post link Colour',
				'section' => 'site_colours',
				'settings' => 'site_post_link_colour'
			)
		)
	);
	
	$wp_customize->add_setting(
		'site_button_colour',
		array(
			'default' => '',
			'transport' => 'postMessage',
			'sanitize_callback' => 'fast_fourier_transform_sanitize_text'
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'site_button_colour',
			array(
				'label' => 'Site Button Colour',
				'section' => 'site_colours',
				'settings' => 'site_button_colour'
			)
		)
	);
	
	$wp_customize->add_setting(
		'site_button_text_colour',
		array(
			'default' => '',
			'transport' => 'postMessage',
			'sanitize_callback' => 'fast_fourier_transform_sanitize_text'
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'site_button_text_colour',
			array(
				'label' => 'Site Button Text Colour',
				'section' => 'site_colours',
				'settings' => 'site_button_text_colour'
			)
		)
	);
	
}

function fast_fourier_transform_customize_register( $wp_customize ) {

	fast_fourier_transform_customize_register_modify( $wp_customize );
	fast_fourier_transform_customize_register_add_site_colours( $wp_customize );
	fast_fourier_transform_customize_register_page_layout( $wp_customize );
	fast_fourier_transform_customize_register_home_page_layout( $wp_customize );
	fast_fourier_transform_customize_register_fav_icon( $wp_customize );
	
}
add_action( 'customize_register', 'fast_fourier_transform_customize_register' );


function fast_fourier_transform_customize_preview_js() {
	wp_enqueue_script( 'fast_fourier_transform_customizer', get_template_directory_uri() . '/js/fast_fourier_transform_customiser.js', array( 'customize-preview' ), '20131205', true );
}
add_action( 'customize_preview_init', 'fast_fourier_transform_customize_preview_js' );
