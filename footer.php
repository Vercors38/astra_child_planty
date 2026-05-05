<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>
<?php astra_content_bottom(); ?>
	</div> <!-- ast-container -->
	</div><!-- #content -->
<?php
	astra_content_after();

	astra_footer_before();

	//astra_footer();// désactive le footer par défaut d'Astra, que nous allons remplacer par notre footer personnalisé

	astra_footer_after();
?>

<!-- ajout du footer personalisé -->

<footer id="custom-footer" class="site-footer">
	<div class="footer-container">
		<a href="#">Mentions légales</a>
	</div>
</footer>

	</div><!-- #page -->
	
<script> /* Script pour le menu hamburger */
document.addEventListener('DOMContentLoaded', function() {
    const nav = document.getElementById('site-navigation');
    const button = nav.querySelector('.menu-toggle');
    const menu = document.getElementById('primary-menu');

    if (!button) return;

    button.addEventListener('click', function() {
        // Alterne la classe 'is-active' sur le parent <nav>
        nav.classList.toggle('is-active');

        // Met à jour l'attribut ARIA pour l'accessibilité
        const expanded = nav.classList.contains('is-active');
        button.setAttribute('aria-expanded', expanded);
    });
});
</script>
<?php
	astra_body_bottom();
	wp_footer();
?>
	</body>
</html>
