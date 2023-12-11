<?php
// ! charger les scripts et styles
function pkm_register_assets()
{
    // déclarer le style Bootstrap
    wp_enqueue_style(
        'bootstrap-cdn-css', // id
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css', // lien de ce que je veux récupérer
        array(), // si je dois charger dans un ordre précis (optionnel)
        '5.3.2' // version affichée dans le code source (optionnel), ici la version de bootstrap utilisée
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
    // déclarer le CSS
    wp_enqueue_style(
        'pkm-css',
        get_template_directory_uri() . '/public/assets/css/style.css',
        array('bootstrap-cdn-css'), // pour être sur que Bootstrap soit chargé avant mon style et qu'il n'y ai pas de bug
        '1.0'
    );
    // déclarer le script Bootstrap
    wp_enqueue_script(
        'bootstrap-cdn-js',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js',
        array(),
        '5.3.2',
        true // pour mettre le script en pied de page
    );
    // déclarer le script font awesome
    wp_enqueue_script(
        'font-awesome',
        'https://kit.fontawesome.com/dce61209e7.js',
        array(),
        '1.0',
        true
    );
    // déclarer le JS
    wp_enqueue_script(
        'pkm-js', // nom de mon thème
        get_template_directory_uri() . '/public/assets/js/script.js', // pour récupérer un fichier qui n'est pas à la racine
        array(), // si je dois charger dans un ordre précis (optionnel)
        '1.0', // version de mon thème (optionnel)
        array('strategy' => 'defer', 'in_footer' => true) // si on veut ajouter defer (pour être sur que le script se lance une fois la page entièrement chargée, ce qui doit déjà être le cas par défaut vu qu'on a mis le script en dernier dans le footer)
        // true // pour mettre le script en pied de page
    );
};

add_action('wp_enqueue_scripts', 'pkm_register_assets');


// ! activer l'image mise en avant
add_theme_support('post-thumbnails'); // utilisé dans le single pour la grande photo mise en avant dans l'article

// ! définir d'autres tailles d'image
add_image_size('article-main-pic', 1076, 360, false);

// ! bootstrap wp_nav_menu walker
class bootstrap_5_wp_nav_menu_walker extends Walker_Nav_menu
{
    private $current_item;
    private $dropdown_menu_alignment_values = [
        'dropdown-menu-start',
        'dropdown-menu-end',
        'dropdown-menu-sm-start',
        'dropdown-menu-sm-end',
        'dropdown-menu-md-start',
        'dropdown-menu-md-end',
        'dropdown-menu-lg-start',
        'dropdown-menu-lg-end',
        'dropdown-menu-xl-start',
        'dropdown-menu-xl-end',
        'dropdown-menu-xxl-start',
        'dropdown-menu-xxl-end'
    ];

    function start_lvl(&$output, $depth = 0, $args = null)
    {
        $dropdown_menu_class[] = '';
        foreach ($this->current_item->classes as $class) {
            if (in_array($class, $this->dropdown_menu_alignment_values)) {
                $dropdown_menu_class[] = $class;
            }
        }
        $indent = str_repeat("\t", $depth);
        $submenu = ($depth > 0) ? ' sub-menu' : '';
        $output .= "\n$indent<ul class=\"dropdown-menu$submenu " . esc_attr(implode(" ", $dropdown_menu_class)) . " depth_$depth\">\n";
    }

    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $this->current_item = $item;

        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $li_attributes = '';
        $class_names = $value = '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;

        $classes[] = ($args->walker->has_children) ? 'dropdown' : '';
        $classes[] = 'nav-item';
        $classes[] = 'nav-item-' . $item->ID;
        if ($depth && $args->walker->has_children) {
            $classes[] = 'dropdown-menu dropdown-menu-end';
        }

        $class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = ' class="' . esc_attr($class_names) . '"';

        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
        $id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';

        $output .= $indent . '<li ' . $id . $value . $class_names . $li_attributes . '>';

        $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

        $active_class = ($item->current || $item->current_item_ancestor || in_array("current_page_parent", $item->classes, true) || in_array("current-post-ancestor", $item->classes, true)) ? 'active' : '';
        $nav_link_class = ($depth > 0) ? 'dropdown-item ' : 'nav-link ';
        $attributes .= ($args->walker->has_children) ? ' class="' . $nav_link_class . $active_class . ' dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"' : ' class="' . $nav_link_class . $active_class . '"';

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}
// ! créer le menu
register_nav_menus(array(
    'main-menu' => 'Menu Principal',
    'menu-footer' => 'Bas de page',
));
