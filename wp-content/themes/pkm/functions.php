<?php
function pkm_register_assets() {
    // déclarer le JS
    wp_enqueue_script(
        'pkm', // nom de mon thème
        get_template_directory_uri() . '/public/assets/js/script.js', // pour récupérer un fichier qui n'est pas à la racine
        array(), // si je dois charger dans un ordre précis
        '1.0', // version de mon thème
        true // pour mettre le script en pied de page
    );
    // déclarer le CSS
    wp_enqueue_style(
        'pkm',
        get_template_directory_uri() . '/public/assets/css/style.css',
        array('bootstrap-cdn-css'), // le CSS doit dépendre du style Bootstrap pour fonctionner correctement
        '1.0'
    );
    // déclarer le style Bootstrap
    wp_enqueue_style(
        'bootstrap-cdn-css',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css',
        array(),
        '1.0'
    );
    // déclarer le script Bootstrap
    wp_enqueue_script(
        'bootstrap-cdn-js',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js',
        array(),
        '1.0',
        true
    );
    // déclarer le style Google Fonts
    wp_enqueue_style(
        'font-bangers',
        'https://fonts.googleapis.com/css2?family=Bangers',
        array(),
        '1.0'
    );
    wp_enqueue_style(
        'font-lato',
        'https://fonts.googleapis.com/css2?family=Lato',
        array(),
        '1.0'
    );
    // déclarer le script font awesome
    wp_enqueue_script(
        'font-awesome',
        'https://kit.fontawesome.com/dce61209e7.js',
        array(),
        '1.0',
        true
    );
};

add_action('wp_enqueue_scripts', 'pkm_register_assets');
