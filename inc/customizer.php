<?php
/**
 * owt Theme Customizer
 *
 * @package owt
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function owt_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'owt_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'owt_customize_partial_blogdescription',
		) );
	}
	/* Added for testing panel
			$wp_customize->add_panel('some_panel',array(
			    'title'=>'Panel1',
			    'description'=> 'This is panel Description',
			    'priority'=> 10,
			));


			$wp_customize->add_section('section',array(
			    'title'=>'section',
			    'priority'=>10,
			    'panel'=>'some_panel',
			));


			$wp_customize->add_setting('setting_demo',array(
			    'default'=>'a',
			));


			$wp_customize->add_control('contrl_demo',array(
			    'label'=>'Text',
			    'type'=>'text',
			    'section'=>'section',
			    'settings'=>'setting_demo',
			));
	*/
}
add_action( 'customize_register', 'owt_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function owt_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function owt_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function owt_customize_preview_js() {
	wp_enqueue_script( 'owt-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'owt_customize_preview_js' );
