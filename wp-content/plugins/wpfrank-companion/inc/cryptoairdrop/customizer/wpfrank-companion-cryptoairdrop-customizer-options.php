<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Extend customizer section.
 *
 * @package Crypto Airdrop
 *
 * @see     WP_Customize_Section
 * @access  public
 */

function wpfrank_cryptoairdrop_frontpage_sections_settings( $wp_customize ) {
	// Diffrent Themes.
	$activate_theme_data = wp_get_theme(); // getting current theme data.
	$activate_theme      = $activate_theme_data->name;

	$active_callback = isset( $array['active_callback'] ) ? $array['active_callback'] : null;

	/* Frontpage panel */
	$wp_customize->add_panel(
		'cryptoairdrop_frontpage_settings',
		array(
			'priority'   => 8,
			'capability' => 'edit_theme_options',
			'title'      => __( 'Frontpage Sections', 'cryptoairdrop' ),
		)
	);

	/* Slider Settings */
	$wp_customize->add_section(
		'cryptoairdrop_main_theme_slider',
		array(
			'title'    => __( 'Slider Settings', 'cryptoairdrop' ),
			'panel'    => 'cryptoairdrop_frontpage_settings',
			'priority' => 2,
		)
	);

		// Slider Image.
		$wp_customize->add_setting(
			'cryptoairdrop_slider_image',
			array(
				'default'           => get_template_directory_uri() . '/assets/img/token/crypto-slider.png',
				'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'cryptoairdrop_slider_image',
				array(
					'label'           => __( 'Slider Image', 'cryptoairdrop' ),
					'section'         => 'cryptoairdrop_main_theme_slider',
					'settings'        => 'cryptoairdrop_slider_image',
					'priority'        => 9,
					'active_callback' => 'cryptoairdrop_main_slider_media_image',
				)
			)
		);

	/* About Settings  */
	$wp_customize->add_section(
		'cryptoairdrop_theme_about',
		array(
			'title'    => __( 'About Settings', 'cryptoairdrop' ),
			'panel'    => 'cryptoairdrop_frontpage_settings',
			'priority' => 3,
		)
	);

		// About Image.
		$wp_customize->add_setting(
			'cryptoairdrop_about_image',
			array(
				'default'           => get_template_directory_uri() . '/assets/img/token/about-us.jpg',
				'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'cryptoairdrop_about_image',
				array(
					'label'    => __( 'Background Image', 'cryptoairdrop' ),
					'section'  => 'cryptoairdrop_theme_about',
					'settings' => 'cryptoairdrop_about_image',
				)
			)
		);

	/* Features Settings */
	$wp_customize->add_section(
		'cryptoairdrop_theme_top_info',
		array(
			'title'    => __( 'Tokenomics Settings', 'cryptoairdrop' ),
			'panel'    => 'cryptoairdrop_frontpage_settings',
			'priority' => 3,
		)
	);

	if ( class_exists( 'cryptoairdrop_Repeater' ) ) {
		$wp_customize->add_setting( 'cryptoairdrop_top_info_content', array() );
		$wp_customize->add_control(
			new cryptoairdrop_Repeater(
				$wp_customize,
				'cryptoairdrop_top_info_content',
				array(
					'label'                             => esc_html__( 'Tokenomics Content', 'cryptoairdrop' ),
					'section'                           => 'cryptoairdrop_theme_top_info',
					'priority'                          => 10,
					'add_field_label'                   => esc_html__( 'Add New Tokenomics', 'cryptoairdrop' ),
					'item_name'                         => esc_html__( 'Tokenomics Item', 'cryptoairdrop' ),
					'customizer_repeater_image_control' => true,
					'customizer_repeater_icon_control'  => true,
					'customizer_repeater_title_control' => true,
					'customizer_repeater_text_control'  => true,
				)
			)
		);
	}

	// Feature Image.
	$wp_customize->add_setting(
		'cryptoairdrop_feature_image',
		array(
			'default'           => wpfrank_companion_plugin_url . '/inc/cryptoairdrop/img/tokenomics.png',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'cryptoairdrop_feature_image',
			array(
				'label'    => __( 'Image', 'cryptoairdrop' ),
				'priority' => 11,
				'section'  => 'cryptoairdrop_theme_top_info',
				'settings' => 'cryptoairdrop_feature_image',
			)
		)
	);

	/* FAQ Settings */
	$wp_customize->add_section(
		'cryptoairdrop_theme_faq',
		array(
			'title'    => __( 'FAQ Settings', 'cryptoairdrop' ),
			'panel'    => 'cryptoairdrop_frontpage_settings',
			'priority' => 3,
		)
	);

	if ( class_exists( 'cryptoairdrop_Repeater' ) ) {
		$wp_customize->add_setting( 'cryptoairdrop_faqs_content', array() );
		$wp_customize->add_control(
			new cryptoairdrop_Repeater(
				$wp_customize,
				'cryptoairdrop_faqs_content',
				array(
					'label'                             => esc_html__( 'FAQ Items Content', 'cryptoairdrop' ),
					'section'                           => 'cryptoairdrop_theme_faq',
					'priority'                          => 13,
					'add_field_label'                   => esc_html__( 'Add New FAQ', 'cryptoairdrop' ),
					'item_name'                         => esc_html__( 'FAQ Item', 'cryptoairdrop' ),
					'customizer_repeater_title_control' => true,
					'customizer_repeater_text_control'  => true,
				)
			)
		);
	}

		// Image.
		$wp_customize->add_setting(
			'cryptoairdrop_faq_image',
			array(
				'default'           => wpfrank_companion_plugin_url . '/inc/cryptoairdrop/img/faq.png',
				'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'cryptoairdrop_faq_image',
				array(
					'label'    => __( 'Image', 'cryptoairdrop' ),
					'priority' => 11,
					'section'  => 'cryptoairdrop_theme_faq',
					'settings' => 'cryptoairdrop_faq_image',
				)
			)
		);

	/* Roadmap Settings */
	$wp_customize->add_section(
		'cryptoairdrop_theme_roadmap',
		array(
			'title'    => __( 'Roadmap Settings', 'cryptoairdrop' ),
			'panel'    => 'cryptoairdrop_frontpage_settings',
			'priority' => 3,
		)
	);

	if ( class_exists( 'cryptoairdrop_Repeater' ) ) {
		$wp_customize->add_setting( 'cryptoairdrop_roadmap_content', array() );
		$wp_customize->add_control(
			new cryptoairdrop_Repeater(
				$wp_customize,
				'cryptoairdrop_roadmap_content',
				array(
					'label'                             => esc_html__( 'Roadmap Items Content', 'cryptoairdrop' ),
					'section'                           => 'cryptoairdrop_theme_roadmap',
					'priority'                          => 10,
					'add_field_label'                   => esc_html__( 'Add New Roadmap', 'cryptoairdrop' ),
					'item_name'                         => esc_html__( 'Roadmap Item', 'cryptoairdrop' ),
					'customizer_repeater_title_control' => true,
					'customizer_repeater_text_control'  => true,
					'customizer_repeater_date_control'  => true,
					// 'customizer_repeater_roadmap_checkbox_control'  => true,
				)
			)
		);
	}

	/* Docs Settings */
	$wp_customize->add_section(
		'cryptoairdrop_theme_docs',
		array(
			'title'    => __( 'Documentation Settings', 'cryptoairdrop' ),
			'panel'    => 'cryptoairdrop_frontpage_settings',
			'priority' => 3,
		)
	);

	if ( class_exists( 'cryptoairdrop_Repeater' ) ) {
		$wp_customize->add_setting( 'cryptoairdrop_docs_content', array() );
		$wp_customize->add_control(
			new cryptoairdrop_Repeater(
				$wp_customize,
				'cryptoairdrop_docs_content',
				array(
					'label'                             => esc_html__( 'Documentation', 'cryptoairdrop' ),
					'section'                           => 'cryptoairdrop_theme_docs',
					'priority'                          => 10,
					'add_field_label'                   => esc_html__( 'Add New Docs', 'cryptoairdrop' ),
					'item_name'                         => esc_html__( 'Docs Item', 'cryptoairdrop' ),
					'customizer_repeater_title_control' => true,
					'customizer_repeater_text_control'  => true,
					'customizer_repeater_link_control'  => true,
					'customizer_repeater_image_control' => true,
					'customizer_repeater_icon_control'  => true,
					'customizer_repeater_token_checkbox_control' => true,
				)
			)
		);
	}

	/* Blog Settings */
	$wp_customize->add_section(
		'cryptoairdrop_theme_blog',
		array(
			'title'    => __( 'Blog Settings', 'cryptoairdrop' ),
			'panel'    => 'cryptoairdrop_frontpage_settings',
			'priority' => 12,
		)
	);

	/* Contact Settings */
	$wp_customize->add_section(
		'cryptoairdrop_theme_contact',
		array(
			'title'    => __( 'Contact Settings', 'cryptoairdrop' ),
			'panel'    => 'cryptoairdrop_frontpage_settings',
			'priority' => 12,
		)
	);

	if ( class_exists( 'cryptoairdrop_Repeater' ) ) {
		$wp_customize->add_setting( 'cryptoairdrop_contact_content', array() );
		$wp_customize->add_control(
			new cryptoairdrop_Repeater(
				$wp_customize,
				'cryptoairdrop_contact_content',
				array(
					'label'                             => esc_html__( 'Contact Content', 'cryptoairdrop' ),
					'section'                           => 'cryptoairdrop_theme_contact',
					'priority'                          => 10,
					'add_field_label'                   => esc_html__( 'Add new Item', 'cryptoairdrop' ),
					'item_name'                         => esc_html__( 'Contact Item', 'cryptoairdrop' ),
					'customizer_repeater_image_control' => true,
					'customizer_repeater_icon_control'  => true,
					'customizer_repeater_title_control' => true,
					'customizer_repeater_text_control'  => true,
				)
			)
		);
	}

	if ( class_exists( 'WooCommerce' ) ) {
		/* Woocommerce Settings  */
		$wp_customize->add_section(
			'cryptoairdrop_theme_woocommerce',
			array(
				'title'    => __( 'Woocoomerce Settings', 'cryptoairdrop' ),
				'panel'    => 'cryptoairdrop_frontpage_settings',
				'priority' => 30,
			)
		);

	}

}
add_action( 'customize_register', 'wpfrank_cryptoairdrop_frontpage_sections_settings' );


function wpfrank_cryptoairdrop_Customizer_selective_refresh_settings( $wp_customize ) {

	$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';

	// Slider Title.
	$wp_customize->add_setting(
		'cryptoairdrop_slider_title',
		array(
			'default'           => __( 'Deflationary Token With A Difference', 'cryptoairdrop' ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => $selective_refresh,
		)
	);
	$wp_customize->add_control(
		'cryptoairdrop_slider_title',
		array(
			'label'    => esc_html__( 'Title', 'cryptoairdrop' ),
			'section'  => 'cryptoairdrop_main_theme_slider',
			'priority' => 7,
			'type'     => 'text',
		)
	);

	// Slider Subtitle.
	$wp_customize->add_setting(
		'cryptoairdrop_slider_subtitle',
		array(
			'default'           => __( 'The Moon Token Protocol is a community driven, fair launched DeFi Token.', 'cryptoairdrop' ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => $selective_refresh,
		)
	);
	$wp_customize->add_control(
		'cryptoairdrop_slider_subtitle',
		array(
			'label'    => esc_html__( 'Description', 'cryptoairdrop' ),
			'section'  => 'cryptoairdrop_main_theme_slider',
			'priority' => 7,
			'type'     => 'textarea',
		)
	);

	// Slider Video Link.
	$wp_customize->add_setting(
		'cryptoairdrop_slider_video_link',
		array(
			'default'           => __( 'https://www.youtube.com/watch?v=arTftDPx5ko&list=PLOeoids2h7nKEX31CniGQbjHXZauj_ftQ', 'cryptoairdrop' ),
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'cryptoairdrop_slider_video_link',
		array(
			'label'           => esc_html__( 'Video URL', 'cryptoairdrop' ),
			'section'         => 'cryptoairdrop_main_theme_slider',
			'priority'        => 9,
			'type'            => 'textarea',
			'active_callback' => 'cryptoairdrop_main_slider_media_video',
		)
	);

	// Slider Custom Button Text.
	$wp_customize->add_setting(
		'cryptoairdrop_slider_custom_text',
		array(
			'default'           => __( 'Learn More', 'cryptoairdrop' ),
			'sanitize_callback' => 'sanitize_text_field',
		// 'transport'       => $selective_refresh,
		)
	);
	$wp_customize->add_control(
		'cryptoairdrop_slider_custom_text',
		array(
			'label'    => esc_html__( 'Button Text', 'cryptoairdrop' ),
			'section'  => 'cryptoairdrop_main_theme_slider',
			'priority' => 10,
			'type'     => 'text',
		)
	);

	// Slider Custom Button Url.
	$wp_customize->add_setting(
		'cryptoairdrop_slider_custom_url',
		array(
			'default'           => __( '#', 'cryptoairdrop' ),
			'sanitize_callback' => 'sanitize_text_field',
		// 'transport'       => $selective_refresh,
		)
	);
	$wp_customize->add_control(
		'cryptoairdrop_slider_custom_url',
		array(
			'label'    => esc_html__( 'Button URL', 'cryptoairdrop' ),
			'section'  => 'cryptoairdrop_main_theme_slider',
			'priority' => 10,
			'type'     => 'text',
		)
	);

	// About Title.
	$wp_customize->add_setting(
		'cryptoairdrop_about_title',
		array(
			'default'           => __( 'We have right solutions to grow your businesses.', 'cryptoairdrop' ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => $selective_refresh,
		)
	);
	$wp_customize->add_control(
		'cryptoairdrop_about_title',
		array(
			'label'    => esc_html__( 'Title', 'cryptoairdrop' ),
			'section'  => 'cryptoairdrop_theme_about',
			'priority' => 6,
			'type'     => 'text',
		)
	);

	// About Subtitle.
	$wp_customize->add_setting(
		'cryptoairdrop_about_subtitle',
		array(
			'default'           => __( 'WORDPRESS THEME', 'cryptoairdrop' ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => $selective_refresh,
		)
	);
	$wp_customize->add_control(
		'cryptoairdrop_about_subtitle',
		array(
			'label'    => esc_html__( 'Subtitle', 'cryptoairdrop' ),
			'section'  => 'cryptoairdrop_theme_about',
			'priority' => 6,
			'type'     => 'text',
		)
	);

	// About Description.
	$wp_customize->add_setting(
		'cryptoairdrop_about_desc',
		array(
			'default'           => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.Sed ut perspiciatis unde omnis iste natus error sit volup tatem accusan tium dolor emque totam rem.', 'cryptoairdrop' ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => $selective_refresh,
		)
	);
	$wp_customize->add_control(
		'cryptoairdrop_about_desc',
		array(
			'label'    => esc_html__( 'Description', 'cryptoairdrop' ),
			'section'  => 'cryptoairdrop_theme_about',
			'priority' => 6,
			'type'     => 'textarea',
		)
	);

	// Features.
	$wp_customize->add_setting(
		'cryptoairdrop_feature_title',
		array(
			'default'           => __( 'Tokenomics', 'cryptoairdrop' ),
			'sanitize_callback' => 'sanitize_text_field',
		// 'transport'           => $selective_refresh,
		)
	);
	$wp_customize->add_control(
		'cryptoairdrop_feature_title',
		array(
			'label'    => esc_html__( 'Title', 'cryptoairdrop' ),
			'section'  => 'cryptoairdrop_theme_top_info',
			'priority' => 7,
			'type'     => 'text',
		)
	);

	// FAQ.
	$wp_customize->add_setting(
		'cryptoairdrop_faq_title',
		array(
			'default'           => __( 'Frequently Asked Questions', 'cryptoairdrop' ),
			'sanitize_callback' => 'sanitize_text_field',
		// 'transport'           => $selective_refresh,
		)
	);
	$wp_customize->add_control(
		'cryptoairdrop_faq_title',
		array(
			'label'    => esc_html__( 'Title', 'cryptoairdrop' ),
			'section'  => 'cryptoairdrop_theme_faq',
			'priority' => 7,
			'type'     => 'text',
		)
	);

	// Roadmap Title.
	$wp_customize->add_setting(
		'cryptoairdrop_roadmap_title',
		array(
			'default'           => __( 'Road Map', 'cryptoairdrop' ),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'cryptoairdrop_roadmap_title',
		array(
			'label'    => esc_html__( 'Section Title', 'cryptoairdrop' ),
			'section'  => 'cryptoairdrop_theme_roadmap',
			'priority' => 4,
			'type'     => 'text',
		)
	);

	// Documentation Title.
	$wp_customize->add_setting(
		'cryptoairdrop_docs_title',
		array(
			'default'           => __( 'Documentation', 'cryptoairdrop' ),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'cryptoairdrop_docs_title',
		array(
			'label'    => esc_html__( 'Section Title', 'cryptoairdrop' ),
			'section'  => 'cryptoairdrop_theme_docs',
			'priority' => 4,
			'type'     => 'text',
		)
	);

	// Blog Title.
	$wp_customize->add_setting(
		'cryptoairdrop_blog_area_title',
		array(
			'default'           => __( 'Latest News', 'cryptoairdrop' ),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'cryptoairdrop_blog_area_title',
		array(
			'label'    => esc_html__( 'Section Title', 'cryptoairdrop' ),
			'section'  => 'cryptoairdrop_theme_blog',
			'priority' => 4,
			'type'     => 'text',
		)
	);

	// Contact Title.
	$wp_customize->add_setting(
		'cryptoairdrop_contact_area_title',
		array(
			'default'           => __( 'Contact Us', 'cryptoairdrop' ),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'cryptoairdrop_contact_area_title',
		array(
			'label'    => esc_html__( 'Section Title', 'cryptoairdrop' ),
			'section'  => 'cryptoairdrop_theme_contact',
			'priority' => 4,
			'type'     => 'text',
		)
	);

	// Contact Form.
	$wp_customize->add_setting(
		'cryptoairdrop_contact_form',
		array(
			'default'           => __( '', 'cryptoairdrop' ),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'cryptoairdrop_contact_form',
		array(
			'label'       => esc_html__( 'Contact Form', 'cryptoairdrop' ),
			'description' => esc_html__( 'Paste your contact form shortcode here.', 'cryptoairdrop' ),
			'section'     => 'cryptoairdrop_theme_contact',
			'priority'    => 12,
			'type'        => 'textarea',
		)
	);

	// Woocommerce Title.
	$wp_customize->add_setting(
		'cryptoairdrop_woocommerce_area_title',
		array(
			'default'           => 'Featured products',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => $selective_refresh,
		)
	);
	$wp_customize->add_control(
		'cryptoairdrop_woocommerce_area_title',
		array(
			'label'    => esc_html__( 'Featured Products', 'cryptoairdrop' ),
			'section'  => 'cryptoairdrop_theme_woocommerce',
			'priority' => 6,
			'type'     => 'text',
		)
	);

}
add_action( 'customize_register', 'wpfrank_cryptoairdrop_Customizer_selective_refresh_settings' );
