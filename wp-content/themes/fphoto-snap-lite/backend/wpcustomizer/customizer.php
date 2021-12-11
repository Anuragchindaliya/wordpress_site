<?php 
function fphoto_snap_lite_customize_register($wp_customize){

    // Register custom section types.
    $wp_customize->register_section_type( 'fphoto_snap_lite_Customize_Section_Pro' );

    // Register sections.
    $wp_customize->add_section( new FPhoto_Snap_Lite_Customize_Section_Pro(
        $wp_customize,
        'theme_go_pro',
        array(
            'priority' => 1,
            'title'    => esc_html__( 'FPhoto Snap Pro', 'fphoto-snap-lite' ),
            'pro_text' => esc_html__( 'Upgrade To Pro', 'fphoto-snap-lite' ),
            'pro_url'  => 'https://www.featherthemes.com/themes/wordpress-fphoto-snap-camera/',
        )
    ) );
    $wp_customize->add_section('fphoto_snap_lite_header', array(
        'title'    => esc_html__('Header Phone and Email', 'fphoto-snap-lite'),
        'description' => '',
        'priority' => 30,
    ));
     $wp_customize->add_section('fphoto_snap_lite_social', array(
        'title'    => esc_html__('Social Section', 'fphoto-snap-lite'),
        'description' => '',
        'priority' => 35,
    ));


    //  =============================
    //  = Text Input phone number                =
    //  =============================
    $wp_customize->add_setting('fphoto_snap_lite_phone', array(
        'default'        => '',
        'sanitize_callback' => 'fphoto_snap_lite_sanitize_phone_number'
    ));
 
    $wp_customize->add_control('fphoto_snap_lite_phone', array(
        'label'      => esc_html__('Phone Number', 'fphoto-snap-lite'),
        'section'    => 'fphoto_snap_lite_header',
        'setting'   => 'fphoto_snap_lite_phone',
        'type'    => 'text'
    ));
    
     //  =============================
    //  = Text Input address              =
    //  =============================
    $wp_customize->add_setting('fphoto_snap_lite_full_address', array(
        'default'        => '',
        'sanitize_callback' => 'sanitize_textarea_field'
    ));
 
    $wp_customize->add_control('fphoto_snap_lite_full_address', array(
        'label'      => esc_html__('Add full address', 'fphoto-snap-lite'),
        'section'    => 'fphoto_snap_lite_header',
        'setting'   => 'fphoto_snap_lite_full_address',
        'type'    => 'textarea'
    ));
    
    //  =============================
    //  = Text Input Email                =
    //  =============================
    $wp_customize->add_setting('fphoto_snap_lite_address', array(
        'default'        => '',
        'sanitize_callback' => 'sanitize_email'       
    ));
 
    $wp_customize->add_control('fphoto_snap_lite_address', array(
        'label'      => esc_html__('Email Address', 'fphoto-snap-lite'),
        'section'    => 'fphoto_snap_lite_header',
        'setting'   => 'fphoto_snap_lite_address',
        'type'    => 'email'
    ));

    //  =============================
    //  = slider section              =
    //  =============================
    $wp_customize->add_section('business_multi_lite_banner', array(
        'title'    => esc_html__('Home Banner Text', 'fphoto-snap-lite'),
        'description' => esc_html__('add home banner text here.','fphoto-snap-lite'),
        'priority' => 36,
    ));
   
// Banner heading Text
    $wp_customize->add_setting('banner_heading',array(
            'default'   => null,
            'sanitize_callback' => 'sanitize_text_field'    
    ));
    
    $wp_customize->add_control('banner_heading',array( 
            'type'  => 'text',
            'label' => esc_html__('Add Banner heading here','fphoto-snap-lite'),
            'section'   => 'business_multi_lite_banner',
            'setting'   => 'banner_heading'
    )); // Banner heading Text

    // Banner heading Text
    $wp_customize->add_setting('banner_sub_heading',array(
            'default'   => null,
            'sanitize_callback' => 'sanitize_text_field'    
    ));
    
    $wp_customize->add_control('banner_sub_heading',array( 
            'type'  => 'text',
            'label' => esc_html__('Add Banner sub heading here','fphoto-snap-lite'),
            'section'   => 'business_multi_lite_banner',
            'setting'   => 'banner_sub_heading'
    )); // Banner heading Text

    //  =============================
    //  = box section              =
    //  =============================
    $wp_customize->add_section('fphoto_snap_lite_box', array(
        'title'    => esc_html__('Resource Section', 'fphoto-snap-lite'),
        'description' => esc_html__('Upload image, it will auto crop with 400*250.','fphoto-snap-lite'),
        'priority' => 36,
    ));
   
    $wp_customize->add_setting('fphoto_snap_lite_box1',array(
            'default'   => '0',         
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'fphoto_snap_lite_sanitize_page'
    ));
    
    $wp_customize->add_control('fphoto_snap_lite_box1',array(
            'type'  => 'dropdown-pages',
            'label' => esc_html__('Select page for Resource first:','fphoto-snap-lite'),
            'section'   => 'fphoto_snap_lite_box'
    )); 

    $wp_customize->add_setting('fphoto_snap_lite_box2',array(
            'default'   => '0',         
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'fphoto_snap_lite_sanitize_page'
    ));
    
    $wp_customize->add_control('fphoto_snap_lite_box2',array(
            'type'  => 'dropdown-pages',
            'label' => esc_html__('Select page for Resource second:','fphoto-snap-lite'),
            'section'   => 'fphoto_snap_lite_box'
    )); 

    $wp_customize->add_setting('fphoto_snap_lite_box3',array(
            'default'   => '0',         
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'fphoto_snap_lite_sanitize_page'
    ));
    
    $wp_customize->add_control('fphoto_snap_lite_box3',array(
            'type'  => 'dropdown-pages',
            'label' => esc_html__('Select page for Resource third:','fphoto-snap-lite'),
            'section'   => 'fphoto_snap_lite_box'
    )); 

//  =============================
    //  = box section              =
    //  =============================

  //  =============================
    //  = Footer              =
    //  =============================

    $wp_customize->add_section('fphoto_snap_lite_footer', array(
        'title'    => esc_html__('Footer', 'fphoto-snap-lite'),
        'description' => '',
        'priority' => 37,
    ));

	// Footer design and developed
	 $wp_customize->add_setting('fphoto_snap_lite_design', array(
        'default'        => '',
		'sanitize_callback' => 'sanitize_textarea_field'
    ));
 
    $wp_customize->add_control('fphoto_snap_lite_design', array(
        'label'      => esc_html__('Design and developed', 'fphoto-snap-lite'),
        'section'    => 'fphoto_snap_lite_footer',
        'setting'   => 'fphoto_snap_lite_design',
		'type'	   =>'textarea'
    ));
	// Footer copyright
	 $wp_customize->add_setting('fphoto_snap_lite_copyright', array(
        'default'        => '',
		'sanitize_callback' => 'sanitize_textarea_field'       
    ));
 
    $wp_customize->add_control('fphoto_snap_lite_copyright', array(
        'label'      => esc_html__('Copyright', 'fphoto-snap-lite'),
        'section'    => 'fphoto_snap_lite_footer',
        'setting'   => 'fphoto_snap_lite_copyright',
		'type'	   =>'textarea'
    ));	
}
add_action('customize_register', 'fphoto_snap_lite_customize_register');

function fphoto_snap_lite_sanitize_phone_number( $phone ) {
	return preg_replace( '/[^\d+]/', '', $phone );
}