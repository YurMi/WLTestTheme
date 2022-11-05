<!DOCTYPE html>
<html <?php language_attributes(  )?>>

<head>
    <meta charset="<?php bloginfo( 'charset' )?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head( )?>
</head>

<body class='body'>
    <div class="wrapper">
        <header class="header">
            <div class="container">
                <nav class='header__nav'>
                    <div class="header__logo">
                        <a href='<?php echo home_url(); ?>'>
                            <?php  $default_img = '<img src="'. get_template_directory_uri() .'/assets/img/01-def-img.svg">';?>
                            <?php  $img_from_customize = '<img src="'. get_theme_mod("my_logo") .'">';?>

                            <?php echo get_theme_mod("my_logo") ? $img_from_customize : $default_img ;?>
                        </a>
                    </div>
                    <div class="header__phone">
                        <a
                            href="tel:<?php echo clean(get_theme_mod('header_phone'));?>"><?php echo get_theme_mod('header_phone');?></a>
                    </div>
                </nav>
            </div>
        </header>
        <div class="main">