<?php 

//Create custom post type Car
add_action('init', 'my_custom_init');
function my_custom_init(){
    register_post_type('car', array(
    'labels' => array(
    'menu_name' => 'Car',
    'name' => 'Cars', // Основное название типа записи
    'singular_name' => 'car', // отдельное название записи типа Book
    'add_new' => 'Add new Car',
    'add_new_item' => 'Add new Car',
    'edit_item' => 'Edit Car',
    'new_item' => 'New Car',
    'view_item' => 'Preview Car',
    'search_items' => 'Search Car',
    'not_found' => 'No Cars found',
    'not_found_in_trash' => 'No Cars',
    'parent_item_colon' => '',

    ),
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => true,
    'menu_icon' => 'dashicons-car',
    'hierarchical' => false,
    'menu_position' => 100,
    'supports' => array('title','editor','thumbnail',)
    ) );
}

//Meta-box file
require_once get_template_directory() . '/function-blocks/custom-post-types/Car/option-for-post-type/car-metabox.php';


//Taxonomy file
require_once get_template_directory() . '/function-blocks/custom-post-types/Car/option-for-post-type/car-taxonomy.php';