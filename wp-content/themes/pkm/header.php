<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokemon Thème</title>
    <?php wp_head(); ?> <!-- pour charger des extensions, ou CDN... dans le head -->
</head>

<body>

    <?php wp_body_open(); ?> <!-- pour que certaines extensions comme Yoast puissent fonctionner correctement (en écrivant du code au dessus du body) -->

    <header>
        <!-- ! Navbar -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary px-lg-5 mx-lg-5">
            <div class="container-fluid">
                <a class="navbar-brand" href="/"><img src="/wp-content/themes/pkm/public/assets/img/pokemon-logo.png" alt="logo pokemon theme wordpress"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <div class="d-flex justify-content-end w-100">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'main-menu',
                            'container' => false,
                            'menu_class' => '',
                            'fallback_cb' => '__return_false',
                            'items_wrap' => '<ul id="%1$s" class="navbar-nav %2$s"><li class="nav-item">%3$s</li></ul>',
                            'depth' => 2,
                            'walker' => new bootstrap_5_wp_nav_menu_walker()
                        ));
                        ?>
                    </div>
                    <!-- <div class="d-flex justify-content-end w-100">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="/wp-content/themes/pkm/archive.php">Catégorie 1</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Catégorie 2</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pe-2" href="#">Catégorie 3</a>
                            </li>
                        </ul>
                    </div> -->
                </div>
            </div>
        </nav>