<?php get_header( )?>

<?php
$args = array('post_type'=> 'car','posts_per_page' => -1); //all posts
$loop = new WP_Query($args); ?>


<section class='archive_car'>
    <div class='container'>
        <div class="archive_car__body">
            <nav>
                <ul class='archive_car__ul'>
                    <?php while ( $loop->have_posts() ) : $loop->the_post();?>
                    <li class='archive_car__item'>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </li>
                    <?php endwhile;?>
                </ul>
            </nav>
        </div>
    </div>
</section>

<?php get_footer( )?>