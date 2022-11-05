<?php 

add_action( 'wp_enqueue_scripts', function(){
    wp_enqueue_style( 'null-style', get_stylesheet_directory_uri() . '/assets/css/null-style.css', array(), time());
    wp_enqueue_style( 'main', get_stylesheet_directory_uri() . '/assets/css/style.css', array(), time());
    wp_enqueue_script( 'jquery');
    
    //just for single car page
    if ( is_single() && 'car' == get_post_type() ) {
         wp_enqueue_style( 'style-single-car-page', get_stylesheet_directory_uri() . '/assets/css/style-single-car-page.css', array(), time());
    }
});



add_theme_support( 'post-thumbnails' ); 
add_theme_support ('title-tag');


/*
Desc: add custom post types
*/
require_once get_template_directory() . '/function-blocks/custom-post-types/Car/custom-post-type-car.php';

/*
Desc: add new fields to Customize
*/
require_once get_template_directory() . '/function-blocks/customize-blocks/add-customize-field.php';

/*
Create shortcode Car List
*/
require_once get_template_directory() . '/function-blocks/shortcodes/shortcod-car-list.php';



//=========================== Снимаем запрет с SVG img=============================
add_filter( 'upload_mimes', 'svg_upload_allow' );
# Добавляет SVG в список разрешенных для загрузки файлов.
function svg_upload_allow( $mimes ) {
    $mimes['svg']  = 'image/svg+xml';

    return $mimes;
}
add_filter( 'wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5 );
# Исправление MIME типа для SVG файлов.
function fix_svg_mime_type( $data, $file, $filename, $mimes, $real_mime = '' ){

    // WP 5.1 +
    if( version_compare( $GLOBALS['wp_version'], '5.1.0', '>=' ) )
        $dosvg = in_array( $real_mime, [ 'image/svg', 'image/svg+xml' ] );
    else
        $dosvg = ( '.svg' === strtolower( substr($filename, -4) ) );

    // mime тип был обнулен, поправим его
    // а также проверим право пользователя
    if( $dosvg ){

        // разрешим
        if( current_user_can('manage_options') ){

            $data['ext']  = 'svg';
            $data['type'] = 'image/svg+xml';
        }
        // запретим
        else {
            $data['ext'] = $type_and_ext['type'] = false;
        }

    }

    return $data;
}
//==================================================================================

//Clear string=================
function clean($string) {
   $string = str_replace('-', '', $string); // Replaces all - with hyphens.
   $string = str_replace(' ', '', $string); // Replaces all spaces with hyphens.

   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}
//===================================================================================