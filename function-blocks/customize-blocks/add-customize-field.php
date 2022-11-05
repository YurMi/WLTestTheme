<?php 

function theme_customized_fn($wp_customize){
    $wp_customize->add_panel('header_panel', array(
        'title'        => 'Header Panel',
        'priority'     => 10,
        'capability'   => 'edit_theme_options',
    ));

    $wp_customize->add_section('header_section', array(
        'title'        => 'Header Section',
        'description'  => __('Header Section'),
        'panel'        => 'header_panel',
    ));

    $wp_customize->add_setting('header_phone', array());
    $wp_customize->add_control('header_phone', array(
        'label'     => 'Phone Number',
        'section'   => 'header_section',
        'priority'  => 1,
    ));

    $wp_customize->add_setting('my_logo', array());
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'my_logo', array(
        'label'     => 'My Logo',
        'section'   => 'header_section',
        'priority'  => 2,
    )));

}
add_action('customize_register' ,'theme_customized_fn');