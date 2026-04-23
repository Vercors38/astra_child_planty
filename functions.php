<?php
// Hook pour charger les styles du thème enfant
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

function theme_enqueue_styles() {
    // 1. Chargement du style du thème PARENT
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');

    // 2. Chargement du style du thème ENFANT
    wp_enqueue_style(
        'child-theme-style', // Identifiant unique
        get_stylesheet_directory_uri() . '/theme.css', // Chemin vers votre fichier
        array('parent-style'), // force le chargement après le style parent
        filemtime(get_stylesheet_directory() . '/theme.css') // Version anti-cache
    );
}

// Cette fonction ajoute un lien "Admin" au menu de navigation principal et mobile pour les administrateurs connectés.
function add_admin_link_to_menu($items, $args) 
{
   if (
      is_user_logged_in() && current_user_can('administrator') &&
      ($args->theme_location == 'primary' || $args->theme_location == 'mobile_menu')
   )// Vérifie si l'utilisateur est connecté, s'il a le rôle d'administrateur et si le menu est celui de la navigation principale ou du menu mobile
    {
      $admin_url = esc_url(admin_url());// Récupère l'URL du tableau de bord d'administration de WordPress
      $admin_item = "<li><a href='$admin_url'>Admin</a></li>";// Il crée la structure HTML <li> prête à être insérée dans le menu de navigation

      $items_array = explode('</li>', $items);// Transforme la chaîne de caractères $items en un tableau en utilisant </li> comme séparateur, ce qui permet de manipuler les éléments du menu individuellement
      array_splice($items_array, 1, 0, $admin_item);// Insère le lien "Admin" dans le tableau des éléments du menu à la position souhaitée (ici, après le premier élément)

      $items = implode('</li>', $items_array);// Transforme à nouveau le tableau en une chaîne de caractères en utilisant </li> comme séparateur, ce qui permet de reconstruire la structure HTML du menu avec le lien "Admin" inclus
   }
   return $items;
}
add_filter('wp_nav_menu_items', 'add_admin_link_to_menu', 10, 2);//Hook pour ajouter le lien "Admin" au menu de navigation principal et mobile pour les administrateurs connectés