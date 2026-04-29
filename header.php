<?php
/**
 * The header for Astra Theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?><!DOCTYPE html>
<?php astra_html_before(); ?>
<html <?php language_attributes(); ?>>
	
<head>
<?php astra_head_top(); ?>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
if ( apply_filters( 'astra_header_profile_gmpg_link', true ) ) {
	?>
	<link rel="profile" href="https://gmpg.org/xfn/11"> 
	<?php
}
?>
<?php wp_head(); ?><!-- hook pour ajouter les scripts et styles -->
<?php astra_head_bottom(); ?><!-- hook pour ajouter des éléments à la fin de la section head -->
</head>

<body <?php astra_schema_body(); ?> <?php body_class(); ?>>
<?php astra_body_top(); ?>
<?php wp_body_open(); ?>

<a
	class="skip-link screen-reader-text"
	href="#content">
		<?php echo esc_html( astra_default_strings( 'string-header-skip-link', false ) ); ?>
</a>

<div
<?php
	echo wp_kses_post(
		astra_attr(
			'site',
			array(
				'id'    => 'page',
				'class' => 'hfeed site',
			)
		)
	);
	?>
>
	<?php
	astra_header_before();
	// astra_header(); <!-- IGNORE -->
?>
	 
<!-- Ajout du header personnalisé-->
<header id="custom-header" class="site-header">
    <div class="header-container">
        <div class="site-logo">
            <?php 
            if (has_custom_logo()) {
                the_custom_logo();
            } else {
                echo '<h1><a href="' . esc_url(home_url('/')) . '">' . get_bloginfo('name') . '</a></h1>';
            }
            ?>
        </div>

        <nav id="site-navigation" class="main-navigation">
			<!-- menu hamburger -->
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"> 
        		<span class="bar"></span>
        		<span class="bar"></span>
        		<span class="bar"></span>
    		</button>
			<!-- menu de navigation principal -->
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary', // Assurez-vous qu'un menu est assigné à "Menu principal" dans WP
                'menu_id'        => 'primary-menu',// ID pour le menu, utilisé pour le ciblage CSS
                'container'      => false,// Désactive le conteneur <div> par défaut autour du menu
                'fallback_cb'    => false,// Désactive le fallback pour éviter d'afficher une liste de pages si aucun menu n'est assigné
                'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',// Structure HTML personnalisée pour le menu, avec des classes spécifiques pour le ciblage CSS
            ));
            ?>
        </nav>
    </div>
</header>

<?php
	astra_header_after();

	astra_content_before();
	?>
	<div id="content" class="site-content">
		<div class="ast-container">
		<?php astra_content_top(); ?>
