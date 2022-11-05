<?php 
// Taxonomy =========================
add_action( 'init', 'create_cars_taxonomies' );
function create_cars_taxonomies(){

	// Добавляем древовидную таксономию 'genre' (как категории)
	register_taxonomy('car_brand', array('car'), array(
		'hierarchical'  => true,
		'labels'        => array(
			'name'              => _x( 'Car Brands', 'taxonomy general name' ),
			'singular_name'     => _x( 'Car Brand', 'taxonomy singular name' ),
			'search_items'      =>  __( 'Search Car Brands' ),
			'all_items'         => __( 'All Car Brands' ),
			'parent_item'       => __( 'Parent Car Brand' ),
			'parent_item_colon' => __( 'Parent Car Brand:' ),
			'edit_item'         => __( 'Edit Car Brand' ),
			'update_item'       => __( 'Update Car Brand' ),
			'add_new_item'      => __( 'Add New Car Brand' ),
			'new_item_name'     => __( 'New Car Brand Name' ),
			'menu_name'         => __( 'Car Brand' ),
		),
		'show_ui'       => true,
		'query_var'     => true,
		//'rewrite'       => array( 'slug' => 'the_genre' ), // свой слаг в URL
	));

	register_taxonomy('producing_country', array('car'),array(
		'hierarchical'  => true,
		'labels'        => array(
			'name'                        => _x( 'Producing Countries', 'taxonomy general name' ),
			'singular_name'               => _x( 'Producing Country', 'taxonomy singular name' ),
			'search_items'                =>  __( 'Search Producing Country' ),
            'all_items'                   => __( 'All Producing Countries' ),
			'parent_item'                 => __( 'Parent Producing Country:' ),
			'parent_item_colon'           => __( 'Parent Producing Country:' ),
			'edit_item'                   => __( 'Edit Producing Country' ),
			'update_item'                 => __( 'Update Producing Country' ),
			'add_new_item'                => __( 'Add New Producing Country' ),
			'new_item_name'               => __( 'New Producing Country Name' ),
			'menu_name'                   => __( 'Producing Country' ),
		),
		'show_ui'       => true,
		'query_var'     => true,
		//'rewrite'       => array( 'slug' => 'the_writer' ), // свой слаг в URL
	));
}

//Taxonomy filter =============
add_action('restrict_manage_posts', 'wpl_taxonomy_filter_box');
function wpl_taxonomy_filter_box(){

    global $typenow;

    $show_taxonomy = 'car_brand';
    $show_taxonomy_2 = 'producing_country';
    if($typenow == 'car') {

        $selected_car_category = isset($_GET[$show_taxonomy]) ? intval($_GET[$show_taxonomy]) : '';
        wp_dropdown_categories( array(
            'show_option_all'   => 'Show All Brands',
            'name'              => $show_taxonomy,
            'taxonomy'          => $show_taxonomy,
            'selected'          => $selected_car_category,
            'show_count'        => true,
        ) );

        $selected_car_category_2 = isset($_GET[$show_taxonomy_2]) ? intval($_GET[$show_taxonomy_2]) : '';
        wp_dropdown_categories( array(
            'show_option_all'   => 'Show All Producing Country',
            'name'              => $show_taxonomy_2,
            'taxonomy'          => $show_taxonomy_2,
            'selected'          => $selected_car_category_2,
            'show_count'        => true,
        ) );
    }

    

    
}

//Show what is find taxonomy filter 
add_filter('parse_query', 'wpl_parse_category_fn' );
function wpl_parse_category_fn($query){
    global $typenow;
    global $pagenow;
    $post_type = 'car';
    $taxonomy = 'car_brand';

    $query_variables = &$query->query_vars;

    $if_param1 = $typenow == $post_type;
    $if_param2 = $pagenow == 'edit.php';
    $if_param3 = isset($query_variables[$taxonomy]);
    $if_param4 = is_numeric($query_variables[$taxonomy]);

    if($if_param1 && $if_param2 && $if_param3 && $if_param4){

        $term_details = get_term_by('id',$query_variables[$taxonomy],$taxonomy);

        $query_variables[$taxonomy] = $term_details->slug;
    }


    $taxonomy_2 = 'producing_country';

    $query_variables_2 = &$query->query_vars;

    $if_param_3 = isset($query_variables_2[$taxonomy_2]);
    $if_param_4 = is_numeric($query_variables_2[$taxonomy_2]);

    if($if_param1 && $if_param2 && $if_param_3 && $if_param_4){

        $term_details = get_term_by('id',$query_variables_2[$taxonomy_2],$taxonomy_2);

        $query_variables_2[$taxonomy_2] = $term_details->slug;
    }


}