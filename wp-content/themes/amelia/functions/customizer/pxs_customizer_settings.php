<?php 
/**
 * @package     amelia
 * @version     2.0.1
 * @author      Pixelshow
 * @link        http://pixel-show.com
 * @copyright   Copyright (c) 2017 Pixelshow
 * @license     GPL v2
 */

/**
* Customizer - Add Custom Styling
*/
function pixelshow_customizer_style()
{
	wp_enqueue_style('customizer-css', get_template_directory_uri() . '/functions/customizer/css/customizer.css');
}
add_action('customize_controls_print_styles', 'pixelshow_customizer_style');

/**
* Customizer - Add Settings
*/
function pixelshow_register_theme_customizer( $wp_customize ) {
 	
	// Add Sections
	
	$wp_customize->add_section( 'pixelshow_new_section_custom_css' , array(
   		'title'      => esc_html__( 'Custom CSS', 'amelia' ),
   		'description'=> esc_html__( 'Add your custom CSS which will overwrite the theme CSS', 'amelia' ),
   		'priority'   => 103,
	) );
	
	$wp_customize->add_section( 'pixelshow_new_section_color_general' , array(
   		'title'      => esc_html__( 'Styling', 'amelia' ),
   		'description'=> '',
   		'priority'   => 102,
	) );
	
	$wp_customize->add_section( 'pixelshow_new_section_footer' , array(
   		'title'      => esc_html__( 'Footer Settings', 'amelia' ),
   		'description'=> '',
   		'priority'   => 98,
	) );
	
	$wp_customize->add_section( 'pixelshow_new_section_social' , array(
   		'title'      => esc_html__( 'Social Media Settings', 'amelia' ),
   		'description'=> esc_html__( 'Enter your social media usernames. Icons will not show if left blank.', 'amelia' ),
   		'priority'   => 97,
	) );
	
	$wp_customize->add_section( 'pixelshow_new_section_post' , array(
   		'title'      => esc_html__( 'Post Settings', 'amelia' ),
   		'description'=> '',
   		'priority'   => 95,
	) );
	
	$wp_customize->add_section( 'pixelshow_new_section_featured' , array(
		'title'      => esc_html__( 'Carousel Settings / Featured Area', 'amelia' ),
		'description'=> '',
		'priority'   => 94,
	) );
	
	$wp_customize->add_section( 'pixelshow_new_section_logo_header' , array(
   		'title'      => esc_html__( 'Logo & Header Settings', 'amelia' ),
   		'description'=> '',
   		'priority'   => 91,
	) );
	
	$wp_customize->add_section( 'pixelshow_new_section_general' , array(
   		'title'      => esc_html__( 'General Settings', 'amelia' ),
   		'description'=> '',
   		'priority'   => 90,
	) );
	
	// Add Setting

		// General
		$wp_customize->add_setting(
	        'pixelshow_pxs_home_layout',
	        array(
	            'default'     => 'full',
				'sanitize_callback'	=> 'esc_attr'
	        )
	    );
		$wp_customize->add_setting(
	        'pixelshow_pxs_archive_layout',
	        array(
	            'default'     => 'full',
				'sanitize_callback'	=> 'esc_attr'
	        )
	    );
		$wp_customize->add_setting(
	        'pixelshow_pxs_sidebar_homepage',
	        array(
	            'default'     => false,
				'sanitize_callback'	=> 'esc_attr'
	        )
	    );
		$wp_customize->add_setting(
	        'pixelshow_pxs_sidebar_post',
	        array(
	            'default'     => false,
				'sanitize_callback'	=> 'esc_attr'
	        )
	    );
		$wp_customize->add_setting(
	        'pixelshow_pxs_sidebar_archive',
	        array(
	            'default'     => false,
				'sanitize_callback'	=> 'esc_attr'
	        )
	    );
		
		// Header & Logo
		$wp_customize->add_setting(
	        'pixelshow_pxs_logo',
				array(
				'default'     => '',
				'sanitize_callback'	=> 'esc_attr'
			)
	    );
		$wp_customize->add_setting(
	        'pixelshow_pxs_header_padding_top',
	        array(
	            'default'     => '50',
				'sanitize_callback'	=> 'esc_attr'
	        )
	    );
		$wp_customize->add_setting(
	        'pixelshow_pxs_header_padding_bottom',
	        array(
	            'default'     => '50',
				'sanitize_callback'	=> 'esc_attr'
	        )
	    );
		$wp_customize->add_setting(
	        'pixelshow_pxs_header_logo_width',
	        array(
	            'default'     => '200',
				'sanitize_callback'	=> 'esc_attr'
	        )
	    );
		$wp_customize->add_setting(
	        'pixelshow_pxs_header_logo_height',
	        array(
	            'default'     => '60',
				'sanitize_callback'	=> 'esc_attr'
	        )
	    );
		$wp_customize->add_setting(
	        'pixelshow_pxs_header_view_style',
	        array(
	            'default'     => 'default',
				'sanitize_callback'	=> 'esc_attr'
	        )
	    );
		
		// Featured area
		$wp_customize->add_setting(
	        'pixelshow_pxs_featured_slider',
	        array(
	            'default'     => false,
				'sanitize_callback'	=> 'esc_attr'
	        )
	    );
		$wp_customize->add_setting(
	        'pixelshow_pxs_featured_cat',
				array(
				'default'     => '',
				'sanitize_callback'	=> 'esc_attr'
			)
	    );
		$wp_customize->add_setting(
	        'pixelshow_pxs_featured_cat_hide',
	        array(
	            'default'     => false,
				'sanitize_callback'	=> 'esc_attr'
	        )
	    );
		$wp_customize->add_setting(
	        'pixelshow_pxs_featured_slider_slides',
	        array(
	            'default'     => '5',
				'sanitize_callback'	=> 'esc_attr'
	        )
	    );
		$wp_customize->add_setting(
	        'pixelshow_pxs_featured_item_view',
	        array(
	            'default'     => 'one_item',
				'sanitize_callback'	=> 'esc_attr'
	        )
	    );
		
		// Post Settings
		$wp_customize->add_setting(
	        'pixelshow_pxs_post_tags',
	        array(
	            'default'     => false,
				'sanitize_callback'	=> 'esc_attr'
	        )
	    );
		$wp_customize->add_setting(
	        'pixelshow_pxs_post_author',
	        array(
	            'default'     => false,
				'sanitize_callback'	=> 'esc_attr'
	        )
	    );
		$wp_customize->add_setting(
	        'pixelshow_pxs_post_related',
	        array(
	            'default'     => false,
				'sanitize_callback'	=> 'esc_attr'
	        )
	    );
		$wp_customize->add_setting(
	        'pixelshow_pxs_post_share',
	        array(
	            'default'     => false,
				'sanitize_callback'	=> 'esc_attr'
	        )
	    );
		$wp_customize->add_setting(
	        'pixelshow_pxs_post_comment_link',
	        array(
	            'default'     => false,
				'sanitize_callback'	=> 'esc_attr'
	        )
	    );
		$wp_customize->add_setting(
	        'pixelshow_pxs_post_thumb',
	        array(
	            'default'     => false,
				'sanitize_callback'	=> 'esc_attr'
	        )
	    );
		$wp_customize->add_setting(
	        'pixelshow_pxs_post_cat',
	        array(
	            'default'     => false,
				'sanitize_callback'	=> 'esc_attr'
	        )
	    );
		
		// Social Media
		$wp_customize->add_setting(
	        'pixelshow_pxs_facebook',
	        array(
	            'default'     => '',
				'sanitize_callback'	=> 'esc_attr'
	        )
	    );
		$wp_customize->add_setting(
	        'pixelshow_pxs_twitter',
	        array(
	            'default'     => '',
				'sanitize_callback'	=> 'esc_attr'
	        )
	    );
		$wp_customize->add_setting(
	        'pixelshow_pxs_instagram',
	        array(
	            'default'     => '',
				'sanitize_callback'	=> 'esc_attr'
	        )
	    );
		$wp_customize->add_setting(
	        'pixelshow_pxs_pinterest',
	        array(
	            'default'     => '',
				'sanitize_callback'	=> 'esc_attr'
	        )
	    );
		$wp_customize->add_setting(
	        'pixelshow_pxs_tumblr',
	        array(
	            'default'     => '',
				'sanitize_callback'	=> 'esc_attr'
	        )
	    );
		$wp_customize->add_setting(
	        'pixelshow_pxs_bloglovin',
	        array(
	            'default'     => '',
				'sanitize_callback'	=> 'esc_attr'
	        )
	    );
		$wp_customize->add_setting(
	        'pixelshow_pxs_tumblr',
	        array(
	            'default'     => '',
				'sanitize_callback'	=> 'esc_attr'
	        )
	    );
		$wp_customize->add_setting(
	        'pixelshow_pxs_google',
	        array(
	            'default'     => '',
				'sanitize_callback'	=> 'esc_attr'
	        )
	    );
		$wp_customize->add_setting(
	        'pixelshow_pxs_youtube',
	        array(
	            'default'     => '',
				'sanitize_callback'	=> 'esc_attr'
	        )
	    );
	    $wp_customize->add_setting(
	        'pixelshow_pxs_dribbble',
	        array(
	            'default'     => '',
				'sanitize_callback'	=> 'esc_attr'
	        )
	    );
	    $wp_customize->add_setting(
	        'pixelshow_pxs_soundcloud',
	        array(
	            'default'     => '',
				'sanitize_callback'	=> 'esc_attr'
	        )
	    );
	    $wp_customize->add_setting(
	        'pixelshow_pxs_vimeo',
	        array(
	            'default'     => '',
				'sanitize_callback'	=> 'esc_attr'
	        )
	    );
		$wp_customize->add_setting(
	        'pixelshow_pxs_linkedin',
	        array(
	            'default'     => '',
				'sanitize_callback'	=> 'esc_attr'
	        )
	    );
		$wp_customize->add_setting(
	        'pixelshow_pxs_rss',
	        array(
	            'default'     => '',
				'sanitize_callback'	=> 'esc_attr'
	        )
	    );
		
		// Footer
		$wp_customize->add_setting(
	        'pixelshow_pxs_footer_copyright_left',
	        array(
	            'default'     => esc_html__( 'DESIGNED & DEVELOPED BY PIXELSHOW. AMELIA WORDPRESS THEME', 'amelia' ),
				'sanitize_callback'	=> 'esc_attr'
	        )
	    );
		$wp_customize->add_setting(
	        'pixelshow_pxs_footer_copyright_right',
	        array(
	            'default'     => esc_html__( '2017 - All Rights Reserved.', 'amelia' ),
				'sanitize_callback'	=> 'esc_attr'
	        )
	    );
		
		// Color general
		$wp_customize->add_setting(
			'pixelshow_pxs_color_accent',
			array(
				'default'     => '#C69F73',
				'sanitize_callback'	=> 'esc_attr'
			)
		);
		
		$wp_customize->add_setting(
			'pixelshow_pxs_color_more_bg',
			array(
				'default'     => '#f8f8f8',
				'sanitize_callback'	=> 'esc_attr'
			)
		);
		$wp_customize->add_setting(
			'pixelshow_pxs_color_more_border',
			array(
				'default'     => '#eee',
				'sanitize_callback'	=> 'esc_attr'
			)
		);
		$wp_customize->add_setting(
			'pixelshow_pxs_color_more_text',
			array(
				'default'     => '#111',
				'sanitize_callback'	=> 'esc_attr'
			)
		);
		$wp_customize->add_setting(
			'pixelshow_pxs_color_more_bg_hover',
			array(
				'default'     => '#fff',
				'sanitize_callback'	=> 'esc_attr'
			)
		);
		$wp_customize->add_setting(
			'pixelshow_pxs_background_image',
				array(
				'default'     => '',
				'sanitize_callback'	=> 'esc_attr'
			)
		);
		$wp_customize->add_setting(
			'pixelshow_pxs_color_more_text_hover',
			array(
				'default'     => 'repeat',
				'sanitize_callback'	=> 'esc_attr'
			)
		);
		$wp_customize->add_setting(
			'pixelshow_pxs_body_background_size',
			array(
				'default'     => 'cover',
				'sanitize_callback'	=> 'esc_attr'
			)
		);
		$wp_customize->add_setting(
			'pixelshow_pxs_body_background_attach',
			array(
				'default'     => 'scroll',
				'sanitize_callback'	=> 'esc_attr'
			)
		);
		
		// Custom CSS
			$wp_customize->add_setting(
				'pixelshow_pxs_custom_css',
					array(
					'default'     => '',
					'sanitize_callback'	=> 'esc_attr'
				)
			);
		

    // Add Control
	
		// General
		$wp_customize->add_control(
			new Pixelshow_Customize_Radio_Image_Control(
				$wp_customize,
				'home_layout',
				array(
					'label'          => esc_html__( 'Homepage Layout', 'amelia' ),
					'section'        => 'pixelshow_new_section_general',
					'settings'       => 'pixelshow_pxs_home_layout',
					'type'           => 'radio-image',
					'priority'	 => 3,
					'choices'        => array(
						'full'  => array(
							'title' => esc_html__( 'Full Post Layout', 'amelia' ),
							'image' => get_template_directory_uri() . '/functions/assets/post-style/default.png'
						),
						'grid'  => array(
							'title' => esc_html__( 'Grid Post Layout', 'amelia' ),
							'image' => get_template_directory_uri() . '/functions/assets/post-style/grid.png'
						),
						'full_grid'  => array(
							'title' => esc_html__( 'Full Post + Grid Layout', 'amelia' ),
							'image' => get_template_directory_uri() . '/functions/assets/post-style/full_grid.png'
						),
						'list'  => array(
							'title' => esc_html__( 'List Post Layout', 'amelia' ),
							'image' => get_template_directory_uri() . '/functions/assets/post-style/list.png'
						),
						'full_list'  => array(
							'title' => esc_html__( 'Full Post + List Layout', 'amelia' ),
							'image' => get_template_directory_uri() . '/functions/assets/post-style/full_list.png'
						)
					)
				)
			)
		);
		
		$wp_customize->add_control(
			new Pixelshow_Customize_Radio_Image_Control(
				$wp_customize,
				'archive_layout',
				array(
					'label'          => esc_html__( 'Archive Layout', 'amelia' ),
					'section'        => 'pixelshow_new_section_general',
					'settings'       => 'pixelshow_pxs_archive_layout',
					'type'           => 'radio-image',
					'priority'	 => 3,
					'choices'        => array(
						'full'  => array(
							'title' => esc_html__( 'Full Post Layout', 'amelia' ),
							'image' => get_template_directory_uri() . '/functions/assets/post-style/default.png'
						),
						'grid'  => array(
							'title' => esc_html__( 'Grid Post Layout', 'amelia' ),
							'image' => get_template_directory_uri() . '/functions/assets/post-style/grid.png'
						),
						'full_grid'  => array(
							'title' => esc_html__( 'Full Post + Grid Layout', 'amelia' ),
							'image' => get_template_directory_uri() . '/functions/assets/post-style/full_grid.png'
						),
						'list'  => array(
							'title' => esc_html__( 'List Post Layout', 'amelia' ),
							'image' => get_template_directory_uri() . '/functions/assets/post-style/list.png'
						),
						'full_list'  => array(
							'title' => esc_html__( 'Full Post + List Layout', 'amelia' ),
							'image' => get_template_directory_uri() . '/functions/assets/post-style/full_list.png'
						)
					)
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'sidebar_homepage',
				array(
					'label'      => esc_html__( 'Disable Sidebar on Homepage', 'amelia' ),
					'section'    => 'pixelshow_new_section_general',
					'settings'   => 'pixelshow_pxs_sidebar_homepage',
					'type'		 => 'checkbox',
					'priority'	 => 4
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'sidebar_post',
				array(
					'label'      => esc_html__( 'Disable Sidebar on Posts', 'amelia' ),
					'section'    => 'pixelshow_new_section_general',
					'settings'   => 'pixelshow_pxs_sidebar_post',
					'type'		 => 'checkbox',
					'priority'	 => 5
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'sidebar_archive',
				array(
					'label'      => esc_html__( 'Disable Sidebar on Archives', 'amelia' ),
					'section'    => 'pixelshow_new_section_general',
					'settings'   => 'pixelshow_pxs_sidebar_archive',
					'type'		 => 'checkbox',
					'priority'	 => 6
				)
			)
		);
		
		// Header and Logo
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'upload_logo',
				array(
					'label'      => esc_html__( 'Upload Logo', 'amelia' ),
					'section'    => 'pixelshow_new_section_logo_header',
					'settings'   => 'pixelshow_pxs_logo',
					'priority'	 => 20
				)
			)
		);
		
		$wp_customize->add_control(
			new Pixelshow_Customize_Number_Control(
				$wp_customize,
				'header_padding_top',
				array(
					'label'      => esc_html__( 'Top Logo Margin', 'amelia' ),
					'section'    => 'pixelshow_new_section_logo_header',
					'settings'   => 'pixelshow_pxs_header_padding_top',
					'type'		 => 'number',
					'priority'	 => 22
				)
			)
		);
		$wp_customize->add_control(
			new Pixelshow_Customize_Number_Control(
				$wp_customize,
				'header_padding_bottom',
				array(
					'label'      => esc_html__( 'Bottom Logo Margin', 'amelia' ),
					'section'    => 'pixelshow_new_section_logo_header',
					'settings'   => 'pixelshow_pxs_header_padding_bottom',
					'type'		 => 'number',
					'priority'	 => 23
				)
			)
		);
		$wp_customize->add_control(
			new Pixelshow_Customize_Number_Control(
				$wp_customize,
				'header_logo_width',
				array(
					'label'      => esc_html__( 'Logo Width (px)', 'amelia' ),
					'section'    => 'pixelshow_new_section_logo_header',
					'settings'   => 'pixelshow_pxs_header_logo_width',
					'type'		 => 'number',
					'priority'	 => 24
				)
			)
		);
		$wp_customize->add_control(
			new Pixelshow_Customize_Number_Control(
				$wp_customize,
				'header_logo_height',
				array(
					'label'      => esc_html__( 'Logo Height (px)', 'amelia' ),
					'section'    => 'pixelshow_new_section_logo_header',
					'settings'   => 'pixelshow_pxs_header_logo_height',
					'type'		 => 'number',
					'priority'	 => 25
				)
			)
		);
		$wp_customize->add_control(
			new Pixelshow_Customize_Radio_Image_Control(
				$wp_customize,
				'header_view_style',
				array(
					'label'          => esc_html__( 'Header Layout', 'amelia' ),
					'section'        => 'pixelshow_new_section_logo_header',
					'settings'       => 'pixelshow_pxs_header_view_style',
					'type'           => 'radio-image',
					'priority'	 => 21,
					'choices'        => array(
						'default'  => array(
							'title' => esc_html__( 'Logo (Center)', 'amelia' ),
							'image' => get_template_directory_uri() . '/functions/assets/logo/default.png'
						),
						'logo_socials'  => array(
							'title' => esc_html__( 'Logo/Socials', 'amelia' ),
							'image' => get_template_directory_uri() . '/functions/assets/logo/logo_socials.png'
						),
					)
				)
			)
		);
		
		// Featured area
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'featured_slider',
				array(
					'label'      => esc_html__( 'Enable Featured Slider', 'amelia' ),
					'section'    => 'pixelshow_new_section_featured',
					'settings'   => 'pixelshow_pxs_featured_slider',
					'type'		 => 'checkbox',
					'priority'	 => 2
				)
			)
		);
		$wp_customize->add_control(
			new Pixelshow_WP_Customize_Category_Control(
				$wp_customize,
				'featured_cat',
				array(
					'label'    => esc_html__( 'Select Featured Category', 'amelia' ),
					'settings' => 'pixelshow_pxs_featured_cat',
					'section'  => 'pixelshow_new_section_featured',
					'priority'	 => 3
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'featured_cat_hide',
				array(
					'label'      => esc_html__( 'Hide Slider Navigation', 'amelia' ),
					'section'    => 'pixelshow_new_section_featured',
					'settings'   => 'pixelshow_pxs_featured_cat_hide',
					'type'		 => 'checkbox',
					'priority'	 => 4
				)
			)
		);
		
		
		$wp_customize->add_control(
			new Pixelshow_Customize_Number_Control(
				$wp_customize,
				'featured_slider_slides',
				array(
					'label'      => esc_html__( 'Amount of Slides', 'amelia' ),
					'section'    => 'pixelshow_new_section_featured',
					'settings'   => 'pixelshow_pxs_featured_slider_slides',
					'type'		 => 'number',
					'priority'	 => 5
				)
			)
		);
		
		$wp_customize->add_control(
			new Pixelshow_Customize_Radio_Image_Control(
				$wp_customize,
				'featured_item_view',
				array(
					'label'          => esc_html__( 'Featured Items', 'amelia' ),
					'section'        => 'pixelshow_new_section_featured',
					'settings'       => 'pixelshow_pxs_featured_item_view',
					'type'           => 'radio-image',
					'priority'	 => 3,
					'choices'        => array(
						'one_item'  => array(
							'title' => esc_html__( '1 Item', 'amelia' ),
							'image' => get_template_directory_uri() . '/functions/assets/carousel/carousel-1.png'
						),
						'two_item'  => array(
							'title' => esc_html__( '2 Items', 'amelia' ),
							'image' => get_template_directory_uri() . '/functions/assets/carousel/carousel-2.png'
						),
						'three_item'  => array(
							'title' => esc_html__( '3 Items / Full Width', 'amelia' ),
							'image' => get_template_directory_uri() . '/functions/assets/carousel/carousel-3.png'
						),
						'one_full_item'  => array(
							'title' => esc_html__( '1 Item / Full Width', 'amelia' ),
							'image' => get_template_directory_uri() . '/functions/assets/carousel/carousel-4.png'
						),
						'two_full_item'  => array(
							'title' => esc_html__( '2 Items / Full Width', 'amelia' ),
							'image' => get_template_directory_uri() . '/functions/assets/carousel/carousel-5.png'
						)
					)
				)
			)
		);
		
		// Post Settings
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_cat',
				array(
					'label'      => esc_html__( 'Hide Category', 'amelia' ),
					'section'    => 'pixelshow_new_section_post',
					'settings'   => 'pixelshow_pxs_post_cat',
					'type'		 => 'checkbox',
					'priority'	 => 1
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_tags',
				array(
					'label'      => esc_html__( 'Hide Tags', 'amelia' ),
					'section'    => 'pixelshow_new_section_post',
					'settings'   => 'pixelshow_pxs_post_tags',
					'type'		 => 'checkbox',
					'priority'	 => 2
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_share',
				array(
					'label'      => esc_html__( 'Hide Share Buttons', 'amelia' ),
					'section'    => 'pixelshow_new_section_post',
					'settings'   => 'pixelshow_pxs_post_share',
					'type'		 => 'checkbox',
					'priority'	 => 5
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_comment_link',
				array(
					'label'      => esc_html__( 'Hide Comments', 'amelia' ),
					'section'    => 'pixelshow_new_section_post',
					'settings'   => 'pixelshow_pxs_post_comment_link',
					'type'		 => 'checkbox',
					'priority'	 => 6
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_author',
				array(
					'label'      => esc_html__( 'Hide Author Box', 'amelia' ),
					'section'    => 'pixelshow_new_section_post',
					'settings'   => 'pixelshow_pxs_post_author',
					'type'		 => 'checkbox',
					'priority'	 => 7
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_related',
				array(
					'label'      => esc_html__( 'Hide Related Posts Box', 'amelia' ),
					'section'    => 'pixelshow_new_section_post',
					'settings'   => 'pixelshow_pxs_post_related',
					'type'		 => 'checkbox',
					'priority'	 => 8
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_thumb',
				array(
					'label'      => esc_html__( 'Hide Featured Image from top of Post', 'amelia' ),
					'section'    => 'pixelshow_new_section_post',
					'settings'   => 'pixelshow_pxs_post_thumb',
					'type'		 => 'checkbox',
					'priority'	 => 9
				)
			)
		);
		
		// Social Media
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'facebook',
				array(
					'label'      => esc_html__( 'Facebook', 'amelia' ),
					'section'    => 'pixelshow_new_section_social',
					'settings'   => 'pixelshow_pxs_facebook',
					'type'		 => 'text',
					'priority'	 => 1
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'twitter',
				array(
					'label'      => esc_html__( 'Twitter', 'amelia' ),
					'section'    => 'pixelshow_new_section_social',
					'settings'   => 'pixelshow_pxs_twitter',
					'type'		 => 'text',
					'priority'	 => 2
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'instagram',
				array(
					'label'      => esc_html__( 'Instagram', 'amelia' ),
					'section'    => 'pixelshow_new_section_social',
					'settings'   => 'pixelshow_pxs_instagram',
					'type'		 => 'text',
					'priority'	 => 3
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'pinterest',
				array(
					'label'      => esc_html__( 'Pinterest', 'amelia' ),
					'section'    => 'pixelshow_new_section_social',
					'settings'   => 'pixelshow_pxs_pinterest',
					'type'		 => 'text',
					'priority'	 => 4
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'bloglovin',
				array(
					'label'      => esc_html__( 'Bloglovin', 'amelia' ),
					'section'    => 'pixelshow_new_section_social',
					'settings'   => 'pixelshow_pxs_bloglovin',
					'type'		 => 'text',
					'priority'	 => 5
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'google',
				array(
					'label'      => esc_html__( 'Google Plus', 'amelia' ),
					'section'    => 'pixelshow_new_section_social',
					'settings'   => 'pixelshow_pxs_google',
					'type'		 => 'text',
					'priority'	 => 6
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'tumblr',
				array(
					'label'      => esc_html__( 'Tumblr', 'amelia' ),
					'section'    => 'pixelshow_new_section_social',
					'settings'   => 'pixelshow_pxs_tumblr',
					'type'		 => 'text',
					'priority'	 => 7
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'youtube',
				array(
					'label'      => esc_html__( 'Youtube', 'amelia' ),
					'section'    => 'pixelshow_new_section_social',
					'settings'   => 'pixelshow_pxs_youtube',
					'type'		 => 'text',
					'priority'	 => 8
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'dribbble',
				array(
					'label'      => esc_html__( 'Dribbble', 'amelia' ),
					'section'    => 'pixelshow_new_section_social',
					'settings'   => 'pixelshow_pxs_dribbble',
					'type'		 => 'text',
					'priority'	 => 9
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'soundcloud',
				array(
					'label'      => esc_html__( 'Soundcloud', 'amelia' ),
					'section'    => 'pixelshow_new_section_social',
					'settings'   => 'pixelshow_pxs_soundcloud',
					'type'		 => 'text',
					'priority'	 => 10
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'vimeo',
				array(
					'label'      => esc_html__( 'Vimeo', 'amelia' ),
					'section'    => 'pixelshow_new_section_social',
					'settings'   => 'pixelshow_pxs_vimeo',
					'type'		 => 'text',
					'priority'	 => 11
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'linkedin',
				array(
					'label'      => esc_html__( 'Linkedin (Use full URL to your Linkedin profile)', 'amelia' ),
					'section'    => 'pixelshow_new_section_social',
					'settings'   => 'pixelshow_pxs_linkedin',
					'type'		 => 'text',
					'priority'	 => 12
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'rss',
				array(
					'label'      => esc_html__( 'RSS Link', 'amelia' ),
					'section'    => 'pixelshow_new_section_social',
					'settings'   => 'pixelshow_pxs_rss',
					'type'		 => 'text',
					'priority'	 => 13
				)
			)
		);
		
		// Footer
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'footer_copyright_left',
				array(
					'label'      => esc_html__( 'Footer Copyright Text (Glide Bar)', 'amelia' ),
					'section'    => 'pixelshow_new_section_footer',
					'settings'   => 'pixelshow_pxs_footer_copyright_left',
					'type'		 => 'text',
					'priority'	 => 2
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'footer_copyright_right',
				array(
					'label'      => esc_html__( 'Footer Copyright Text (Page)', 'amelia' ),
					'section'    => 'pixelshow_new_section_footer',
					'settings'   => 'pixelshow_pxs_footer_copyright_right',
					'type'		 => 'text',
					'priority'	 => 1
				)
			)
		);
		
		// Colors general
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'color_accent',
				array(
					'label'      => esc_html__( 'Accent Color', 'amelia' ),
					'section'    => 'pixelshow_new_section_color_general',
					'settings'   => 'pixelshow_pxs_color_accent',
					'priority'	 => 1
				)
			)
		);
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'color_more_bg',
				array(
					'label'      => esc_html__( 'Widgets / Page Title / Glide Nav Background', 'amelia' ),
					'section'    => 'pixelshow_new_section_color_general',
					'settings'   => 'pixelshow_pxs_color_more_bg',
					'priority'	 => 2
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'color_more_border',
				array(
					'label'      => esc_html__( 'Widget Title / Category / To Top / Post Background', 'amelia' ),
					'section'    => 'pixelshow_new_section_color_general',
					'settings'   => 'pixelshow_pxs_color_more_border',
					'priority'	 => 3
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'color_more_text',
				array(
					'label'      => esc_html__( 'Widget Title / Category / To Top / Post Color', 'amelia' ),
					'section'    => 'pixelshow_new_section_color_general',
					'settings'   => 'pixelshow_pxs_color_more_text',
					'priority'	 => 3
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'color_more_bg_hover',
				array(
					'label'      => esc_html__( 'Background Color', 'amelia' ),
					'section'    => 'pixelshow_new_section_color_general',
					'settings'   => 'pixelshow_pxs_color_more_bg_hover',
					'priority'	 => 4
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'background_image',
				array(
					'label'      => esc_html__( 'Background Image', 'amelia' ),
					'section'    => 'pixelshow_new_section_color_general',
					'settings'   => 'pixelshow_pxs_background_image',
					'priority'	 => 5
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'color_more_text_hover',
				array(
					'label'      => esc_html__( 'Background Repeat', 'amelia' ),
					'type'       => 'select',
					'section'    => 'pixelshow_new_section_color_general',
					'settings'   => 'pixelshow_pxs_color_more_text_hover',
					'priority'	 => 6,
					'choices'     => array(
						'repeat'    => esc_html__( 'Repeat', 'amelia' ),
						'repeat-x'  => esc_html__( 'Repeat X', 'amelia' ),
						'repeat-y'  => esc_html__( 'Repeat Y', 'amelia' ),
						'no-repeat' => esc_html__( 'No Repeat', 'amelia' )
					)
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'body_background_size',
				array(
					'label'      => esc_html__( 'Background Size', 'amelia' ),
					'type'       => 'select',
					'section'    => 'pixelshow_new_section_color_general',
					'settings'   => 'pixelshow_pxs_body_background_size',
					'priority'	 => 6,
					'choices'     => array(
						'auto'    => esc_html__( 'Auto', 'amelia' ),
						'cover'  => esc_html__( 'Cover', 'amelia' )
					)
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'body_background_attach',
				array(
					'label'      => esc_html__( 'Background Attachment', 'amelia' ),
					'type'       => 'select',
					'section'    => 'pixelshow_new_section_color_general',
					'settings'   => 'pixelshow_pxs_body_background_attach',
					'priority'	 => 6,
					'choices'     => array(
						'scroll'    => esc_html__( 'Scroll', 'amelia' ),
						'fixed'  => esc_html__( 'Fixed', 'amelia' )
					)
				)
			)
		);	
			
		// Custom CSS
		$wp_customize->add_control(
			new Pixelshow_Customize_CustomCss_Control(
				$wp_customize,
				'custom_css',
				array(
					'label'      => esc_html__( 'Custom CSS', 'amelia' ),
					'section'    => 'pixelshow_new_section_custom_css', 
					'settings'   => 'pixelshow_pxs_custom_css',
					'type'		 => 'custom_css',
					'priority'	 => 1
				)
			)
		);

	// Remove Sections
	$wp_customize->remove_section( 'nav');
	$wp_customize->remove_section( 'static_front_page');
	$wp_customize->remove_section( 'colors');
	$wp_customize->remove_section( 'background_image');
	
}

add_action( 'customize_register', 'pixelshow_register_theme_customizer' );

?>