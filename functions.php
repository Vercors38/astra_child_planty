<?php
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

function theme_enqueue_styles()
{
 /* chargement du fichier style parent */
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
 /* chargement du fichier style enfant */
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/theme.css',
 /* aucune dépendance, le fichier est chargé après le style parent */
    array(),
 /* le navigateur recharge le CSS à chaque fois que le fichier est modifié, pour éviter les problèmes de cache */
  filemtime(get_stylesheet_directory() . '/theme.css'));
}

