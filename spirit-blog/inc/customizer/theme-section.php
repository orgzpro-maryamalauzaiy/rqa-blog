<?php
/**
 * Theme Options.
 *
 * @package Spirit Blog
 */

$default = spirit_blog_get_default_theme_options();

// Add Panel.
$wp_customize->add_panel( 'theme_option_panel',
	array(
	'title'      => __( 'Theme Options', 'spirit-blog' ),
	'priority'   => 150,
	'capability' => 'edit_theme_options',
	)
);

// Highlighted Posts Section
$wp_customize->add_section('highlighted_posts_section', array(    
	'title'       => __('Highlighted Posts Section', 'spirit-blog'),
	'panel'       => 'theme_option_panel'    
));

// Enable / Disable
$wp_customize->add_setting('highlighted_posts', 
	array(
		'default' 			=> true,
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'spirit_blog_sanitize_checkbox',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control('highlighted_posts', 
	array(		
		'label' 	=> __('Enable Highlighted Posts Section', 'spirit-blog'),
		'section' 	=> 'highlighted_posts_section',
		'settings'  => 'highlighted_posts',
		'type' 		=> 'checkbox',
	)
);

// Number of items
$wp_customize->add_setting('number_of_highlighted_posts_items', 
	array(
	'default' 			=> 5,
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'spirit_blog_sanitize_number_range'
	)
);

$wp_customize->add_control('number_of_highlighted_posts_items', 
	array(
	'label'       => __('Number of Items (Max: 50)', 'spirit-blog'),
	'section'     => 'highlighted_posts_section',   
	'settings'    => 'number_of_highlighted_posts_items',		
	'type'        => 'number',
	'input_attrs' => array(
			'min'	=> 1,
			'max'	=> 50,
			'step'	=> 1,
		),
	)
);

// Category Dropdown
$wp_customize->add_setting('highlighted_posts_category', 
	array(
		'default' 			=> '',
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'spirit_blog_sanitize_select',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control('highlighted_posts_category', 
	array(		
		'label' 	=> __('Select Categories', 'spirit-blog'),
		'section' 	=> 'highlighted_posts_section',
		'settings'  => 'highlighted_posts_category',
		'type' 		=> 'select',
		'choices' 	=> spirit_blog_get_post_categories(),
	)
);

// Enable / Disable Date
$wp_customize->add_setting('highlighted_posts_meta_date', 
	array(
		'default' 			=> true,
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'spirit_blog_sanitize_checkbox',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control('highlighted_posts_meta_date', 
	array(		
		'label' 	=> __('Enable Date', 'spirit-blog'),
		'section' 	=> 'highlighted_posts_section',
		'settings'  => 'highlighted_posts_meta_date',
		'type' 		=> 'checkbox',
	)
);

// Enable / Disable Category
$wp_customize->add_setting('highlighted_posts_meta_category', 
	array(
		'default' 			=> true,
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'spirit_blog_sanitize_checkbox',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control('highlighted_posts_meta_category', 
	array(		
		'label' 	=> __('Enable Category', 'spirit-blog'),
		'section' 	=> 'highlighted_posts_section',
		'settings'  => 'highlighted_posts_meta_category',
		'type' 		=> 'checkbox',
	)
);

// Enable / Disable Read More
$wp_customize->add_setting('highlighted_posts_read_more', 
	array(
		'default' 			=> true,
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'spirit_blog_sanitize_checkbox',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control('highlighted_posts_read_more', 
	array(		
		'label' 	=> __('Enable Read More', 'spirit-blog'),
		'section' 	=> 'highlighted_posts_section',
		'settings'  => 'highlighted_posts_read_more',
		'type' 		=> 'checkbox',
	)
);

// Featured Posts Section
$wp_customize->add_section('featured_posts_section', array(    
	'title'       => __('Featured Posts Section', 'spirit-blog'),
	'panel'       => 'theme_option_panel'    
));

// Enable / Disable Section
$wp_customize->add_setting('featured_posts', 
	array(
		'default' 			=> true,
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'spirit_blog_sanitize_checkbox',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control('featured_posts', 
	array(		
		'label' 	=> __('Enable Featured Posts Section', 'spirit-blog'),
		'section' 	=> 'featured_posts_section',
		'settings'  => 'featured_posts',
		'type' 		=> 'checkbox',
	)
);

// Section Title
$wp_customize->add_setting('featured_posts_section_title', 
	array(
		'default'           => esc_html__('Featured posts', 'spirit-blog'),
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('featured_posts_section_title', 
	array(
		'label'       => __('Section Title', 'spirit-blog'),
		'section'     => 'featured_posts_section',   
		'settings'    => 'featured_posts_section_title',	
		'type'        => 'text'
	)
);

// Number of items
$wp_customize->add_setting('number_of_featured_posts_items', 
	array(
	'default' 			=> 4,
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'spirit_blog_sanitize_number_range'
	)
);

$wp_customize->add_control('number_of_featured_posts_items', 
	array(
	'label'       => __('Number of Items (Max: 50)', 'spirit-blog'),
	'section'     => 'featured_posts_section',   
	'settings'    => 'number_of_featured_posts_items',		
	'type'        => 'number',
	'input_attrs' => array(
			'min'	=> 1,
			'max'	=> 50,
			'step'	=> 1,
		),
	)
);

// Category Dropdown
$wp_customize->add_setting('featured_posts_category', 
	array(
		'default' 			=> '',
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'spirit_blog_sanitize_select',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control('featured_posts_category', 
	array(		
		'label' 	=> __('Select Categories', 'spirit-blog'),
		'section' 	=> 'featured_posts_section',
		'settings'  => 'featured_posts_category',
		'type' 		=> 'select',
		'choices' 	=> spirit_blog_get_post_categories(),
	)
);

// Enable / Disable Category
$wp_customize->add_setting('featured_posts_meta_category', 
	array(
		'default' 			=> true,
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'spirit_blog_sanitize_checkbox',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control('featured_posts_meta_category', 
	array(		
		'label' 	=> __('Enable Category', 'spirit-blog'),
		'section' 	=> 'featured_posts_section',
		'settings'  => 'featured_posts_meta_category',
		'type' 		=> 'checkbox',
	)
);

// Sidebar Layout
$wp_customize->add_section('section_sidebar_layout', array(    
	'title'       => __('Sidebar Layout', 'spirit-blog'),
	'panel'       => 'theme_option_panel'    
));

// Blog Layout
$wp_customize->add_setting('theme_options[layout_options_blog]', 
	array(
	'default' 			=> $default['layout_options_blog'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'spirit_blog_sanitize_select'
	)
);

$wp_customize->add_control(new spirit_blog_Image_Radio_Control($wp_customize, 'theme_options[layout_options_blog]', 
	array(		
	'label' 	=> __('Blog Layout', 'spirit-blog'),
	'section' 	=> 'section_sidebar_layout',
	'settings'  => 'theme_options[layout_options_blog]',
	'type' 		=> 'radio-image',
	'choices' 	=> array(		
		'left-sidebar' 	=> get_template_directory_uri() . '/assets/images/left-sidebar.png',						
		'right-sidebar' => get_template_directory_uri() . '/assets/images/right-sidebar.png',
		'no-sidebar' 	=> get_template_directory_uri() . '/assets/images/no-sidebar.png',
		),	
	))
);

// Archive Layout
$wp_customize->add_setting('theme_options[layout_options_archive]', 
	array(
	'default' 			=> $default['layout_options_archive'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'spirit_blog_sanitize_select'
	)
);

$wp_customize->add_control(new spirit_blog_Image_Radio_Control($wp_customize, 'theme_options[layout_options_archive]', 
	array(		
	'label' 	=> __('Archive Layout', 'spirit-blog'),
	'section' 	=> 'section_sidebar_layout',
	'settings'  => 'theme_options[layout_options_archive]',
	'type' 		=> 'radio-image',
	'choices' 	=> array(		
		'left-sidebar' 	=> get_template_directory_uri() . '/assets/images/left-sidebar.png',						
		'right-sidebar' => get_template_directory_uri() . '/assets/images/right-sidebar.png',
		'no-sidebar' 	=> get_template_directory_uri() . '/assets/images/no-sidebar.png',
		),	
	))
);


// Page Layout
$wp_customize->add_setting('theme_options[layout_options_page]', 
	array(
	'default' 			=> $default['layout_options_page'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'spirit_blog_sanitize_select'
	)
);

$wp_customize->add_control(new spirit_blog_Image_Radio_Control($wp_customize, 'theme_options[layout_options_page]', 
	array(		
	'label' 	=> __('Page Layout', 'spirit-blog'),
	'section' 	=> 'section_sidebar_layout',
	'settings'  => 'theme_options[layout_options_page]',
	'type' 		=> 'radio-image',
	'choices' 	=> array(		
		'left-sidebar' 	=> get_template_directory_uri() . '/assets/images/left-sidebar.png',						
		'right-sidebar' => get_template_directory_uri() . '/assets/images/right-sidebar.png',
		'no-sidebar' 	=> get_template_directory_uri() . '/assets/images/no-sidebar.png',
		),	
	))
);

// Single Post Layout
$wp_customize->add_setting('theme_options[layout_options_single]', 
	array(
	'default' 			=> $default['layout_options_single'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'spirit_blog_sanitize_select'
	)
);

$wp_customize->add_control(new spirit_blog_Image_Radio_Control($wp_customize, 'theme_options[layout_options_single]', 
	array(		
	'label' 	=> __('Single Post Layout', 'spirit-blog'),
	'section' 	=> 'section_sidebar_layout',
	'settings'  => 'theme_options[layout_options_single]',
	'type' 		=> 'radio-image',
	'choices' 	=> array(		
		'left-sidebar' 	=> get_template_directory_uri() . '/assets/images/left-sidebar.png',						
		'right-sidebar' => get_template_directory_uri() . '/assets/images/right-sidebar.png',
		'no-sidebar' 	=> get_template_directory_uri() . '/assets/images/no-sidebar.png',
		),	
	))
);

// Blog Post Option
$wp_customize->add_section('section_blog_posts', 
	array(    
	'title'       => __('Blog Post Option', 'spirit-blog'),
	'panel'       => 'theme_option_panel'    
	)
);

$wp_customize->add_setting( 'theme_options[excerpt_length]', array(
	'default'           => $default['excerpt_length'],
	'sanitize_callback' => 'spirit_blog_sanitize_number_range',
) );
$wp_customize->add_control( 'theme_options[excerpt_length]', array(
	'label'       => esc_html__( 'Excerpt Length', 'spirit-blog' ),
	'section'     => 'section_blog_posts',
	'type'        => 'number',
	'input_attrs' => array( 'min' => 1, 'max' => 200, 'style' => 'width: 80px;' ),
) );

// Read More Section
$wp_customize->add_section('section_read_more', 
	array(    
	'title'       => __('Read More Text', 'spirit-blog'),
	'panel'       => 'theme_option_panel'    
	)
);

// Setting Read More Text.
$wp_customize->add_setting( 'theme_options[readmore_text]',
	array(
	'default'           => $default['readmore_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'spirit_blog_sanitize_textarea_content',
	'transport'         => 'refresh',
	)
);
$wp_customize->add_control( 'theme_options[readmore_text]',
	array(
	'label'    => __( 'Read More Text', 'spirit-blog' ),
	'section'  => 'section_read_more',
	'type'     => 'text',
	'priority' => 100,
	)
);

// Footer Setting Section starts
$wp_customize->add_section('section_footer', 
	array(    
	'title'       => __('Footer Setting', 'spirit-blog'),
	'panel'       => 'theme_option_panel'    
	)
);

// Setting copyright_text.
$wp_customize->add_setting( 'theme_options[copyright_text]',
	array(
	'default'           => $default['copyright_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	'transport'         => 'refresh',
	)
);
$wp_customize->add_control( 'theme_options[copyright_text]',
	array(
	'label'    => __( 'Copyright Text', 'spirit-blog' ),
	'section'  => 'section_footer',
	'type'     => 'text',
	'priority' => 100,
	)
);

// Enable Header Image on Front Page
$wp_customize->add_setting( 'theme_options[enable_frontpage_header_image]', array(
	'default'             => $default['enable_frontpage_header_image'],
	'sanitize_callback'   => 'spirit_blog_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[enable_frontpage_header_image]', array(
	'label'       	=> esc_html__( 'Enable in Home Page', 'spirit-blog' ),
	'section'     	=> 'header_image',
	'type'        	=> 'checkbox',
) );