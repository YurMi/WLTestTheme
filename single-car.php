<?php get_header( )?>

<?php 


$Car_color = get_post_meta(get_the_id(),'custom_input_metabox_colorYourCar',true);
$Car_fuel = get_post_meta(get_the_id(),'custom_input_metabox_fuelYourCar',true);
$Car_power = get_post_meta(get_the_id(),'custom_input_metabox_powerYourCar',true);
$Car_price = get_post_meta(get_the_id(),'custom_input_metabox_priceYourCar',true);
?>

<article class='single_car'>
    <div class="container">
        <div class="single_car__title">
            <h1><?php  the_title(); ?></h1>
        </div>
        <div class="single_car__body">
            <?php if(get_the_content()) : ?>
            <div class="single_car__text">
                <?php echo get_the_content(); ?>
            </div>
            <?php endif;?>
            <div class="single_car__ul">
                <div class='single_car__image'>
                    <?php echo $default_image = '<img class="no-image" src="'. get_template_directory_uri() .'/assets/img/no-image.svg">';?>
                    <?php the_post_thumbnail( 'full' ) ? the_post_thumbnail( 'full' ) : $default_image ;?>
                </div>
                <nav class='single_car__info'>
                    <ul>
                        <li class="single_car__item">
                            <p class='single_car__color'>Car Color: <span
                                    style='background-color: <?= $Car_color?>'></span>
                            </p>
                        </li>
                        <li class="single_car__item">
                            <p>Fuel for your Car: <span><?= $Car_fuel; ?></span></p>
                        </li>
                        <li class="single_car__item">
                            <p>Car Power: <span><?= $Car_power ?></span></p>
                        </li>
                        <li class="single_car__item">
                            <p>Car Price: <span>$ <?= $Car_price ?></span></p>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</article>


<?php get_footer( )?>