<?php 

add_shortcode( 'car-list', 'show_car_list' );
function show_car_list( $atts ) {
    ob_start();
    extract( shortcode_atts( array (

    ), $atts ) );
    $options = array(
            'post_type' => 'car',
            'posts_per_page' => 10,
    );
    $query = new WP_Query( $options );
    if ( $query->have_posts() ) { ?>
<div class='archive_car'>
    <div class='container'>
        <div class="archive_car__body">
            <nav>
                <ul class='archive_car__ul'>
                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <li class='archive_car__item'>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </li>
                    <?php endwhile;
                                wp_reset_postdata(); ?>
                </ul>
            </nav>
        </div>
    </div>
</div>
<?php $myvariable = ob_get_clean();
            return $myvariable;
    }   
}