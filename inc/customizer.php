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

/* Branding - Panel */
			$wp_customize->add_panel('site_branding',array(
			    'title'=>'Branding',
			    'description'=> 'Add your basic branding details here. These will be used throughout the site.',
			    'priority'=> 10,
			));

/* Branding - Section */
			$wp_customize->add_section('contact_details',array(
			    'title'=>'Contact Details',
			    'priority'=>10,
			    'panel'=>'site_branding',
			));

/* Branding - Settings */
			$wp_customize->add_setting('show_contact_bar',array(
					'default'=>true,
					'type'	=> 'theme_mod',
					'capabilitiy'	=> 'edit_theme_options',
					'transport'	=> 'postMessage',
			));
			$wp_customize->add_control('show_ct_bar',array(
					'label'=>'Show Contact Bar',
					'type'=>'checkbox',
					'section'=>'contact_details',
					'settings'=>'show_contact_bar',
			));

			function owt_sanitize_checkbox($checked){
				return ( ( isset( $checked ) && true == $checked ) ? true : false );
			}

			$wp_customize->add_setting('contact_phone',array(
					'default'=>'123 456 7890',
					'type'	=> 'option',
					'capabilitiy'	=> 'edit_theme_options',
					'transport'	=> 'postMessage',
			));
			$wp_customize->add_control('phone_number',array(
					'label'=>'Phone Number',
					'type'=>'text',
					'section'=>'contact_details',
					'settings'=>'contact_phone',
			));

			$wp_customize->add_setting('contact_email',array(
					'default'=>'siteadmin@abc.com',
					'type'	=> 'option',
					'capabilitiy'	=> 'edit_theme_options',
					'transport'	=> 'postMessage',
			));
			$wp_customize->add_control('email_address',array(
					'label'=>'Email Address',
					'type'=>'email',
					'section'=>'contact_details',
					'settings'=>'contact_email',
			));

			$wp_customize->add_setting('contact_address',array(
					'default'=>'123 ABC Street, New York, NY 12345',
					'type'	=> 'option',
					'capabilitiy'	=> 'edit_theme_options',
					'transport'	=> 'postMessage',
			));
			$wp_customize->add_control('contact_location',array(
					'label'=>'Location',
					'type'=>'text',
					'section'=>'contact_details',
					'settings'=>'contact_address',
					'sanitize_callback'	=> 'sanitize_text_field',
			));


			$wp_customize->add_section('social_links',array(
			    'title'=>'Social Links',
			    'priority'=>10,
			    'panel'=>'site_branding',
			));

			$wp_customize->add_setting('facebook_url',array(
			    'default'=>'',
					'type'	=> 'option',
					'capabilitiy'	=> 'edit_theme_options',
					'transport'	=> 'postMessage',
					'sanitize_callback'	=> 'owt_sanitize_social_links',
			));
			$wp_customize->add_control('fb_url',array(
			    'label'=>'Facebook',
			    'type'=>'url',
			    'section'=>'social_links',
			    'settings'=>'facebook_url',
			));

			$wp_customize->add_setting('twitter_url',array(
			    'default'=>'',
					'type'	=> 'option',
					'capabilitiy'	=> 'edit_theme_options',
					'transport'	=> 'postMessage',
					'sanitize_callback'	=> 'owt_sanitize_social_links',
			));
			$wp_customize->add_control('tw_url',array(
			    'label'=>'Twitter',
			    'type'=>'url',
			    'section'=>'social_links',
			    'settings'=>'twitter_url',
			));

			$wp_customize->add_setting('linkedin_url',array(
			    'default'=>'',
					'type'	=> 'option',
					'capabilitiy'	=> 'edit_theme_options',
					'transport'	=> 'postMessage',
					'sanitize_callback'	=> 'owt_sanitize_social_links',
			));
			$wp_customize->add_control('li_url',array(
			    'label'=>'LinkedIn',
			    'type'=>'url',
			    'section'=>'social_links',
			    'settings'=>'linkedin_url',
			));

			$wp_customize->add_setting('pinterest_url',array(
			    'default'=>'',
					'type'	=> 'option',
					'capabilitiy'	=> 'edit_theme_options',
					'transport'	=> 'postMessage',
					'sanitize_callback'	=> 'owt_sanitize_social_links',
			));
			$wp_customize->add_control('pi_url',array(
			    'label'=>'Pinterest',
			    'type'=>'url',
			    'section'=>'social_links',
			    'settings'=>'pinterest_url',
			));

			$wp_customize->add_setting('instagram_url',array(
			    'default'=>'',
					'type'	=> 'option',
					'capabilitiy'	=> 'edit_theme_options',
					'transport'	=> 'postMessage',
					'sanitize_callback'	=> 'owt_sanitize_social_links',
			));
			$wp_customize->add_control('ig_url',array(
			    'label'=>'Instagram',
			    'type'=>'url',
			    'section'=>'social_links',
			    'settings'=>'instagram_url',
			));

			function owt_sanitize_social_links($input, $setting){
				$url = esc_url($input);
				$url_params = parse_url($url);
				if(empty($url_params["scheme"]))
					$url = "https://".$url;
				return $url;
			}
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
