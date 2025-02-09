<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

// Definir constantes
// Definir constantes del tema
define('THEME_VERSION', '1.0.0');
define('THEME_PATH', get_template_directory());
define('THEME_URL', get_template_directory_uri());
define('THEME_IMG', THEME_URL . '/images/');

// Cargar archivos de funcionalidad
require_once THEME_PATH . '/inc/custom-functions.php';
require_once THEME_PATH . '/inc/styles-and-js.php';
require_once THEME_PATH . '/inc/theme-setup.php';
require_once THEME_PATH . '/inc/post-types/especialidades.php';
require_once THEME_PATH . '/inc/post-types/especialistas.php';
require_once THEME_PATH . '/inc/post-types/servicios.php';
require_once THEME_PATH . '/inc/menu.php';
require_once THEME_PATH . '/inc/menu-mobile.php';
require_once THEME_PATH . '/inc/pqrs-redirect.php';

add_filter('wpcf7_country_text', function() {
  return 'Selecciona el país';
});

add_filter('wpcf7_state_text', function() {
  return 'Selecciona el departamento';
});

add_filter('wpcf7_city_text', function() {
  return 'Selecciona la ciudad';
});

// Para forzar Colombia como único país
add_filter('wpcf7_country_dropdown', function($countries) {
  return array('CO' => 'Colombia');
});
