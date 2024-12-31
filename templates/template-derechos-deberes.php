<?php
/**
 * Template Name: Página Derechos y Deberes
 * 
 * @package ThemeClinicaSanRafael
 */

if (!defined('ABSPATH')) {
  exit;
}

get_header();

$mostrar_texto_video            = get_field('mostrar_texto_video');
$mostrar_texto_cta_imagen_fondo = get_field('mostrar_texto_cta_imagen_fondo');

$contentGlobal                  = get_page_by_path('contenido-global')->ID;
$mostrar_contacto               = ($contentGlobal) ? get_field('mostrar_contacto', $contentGlobal) : null;

?>
  <main>

    <?php get_template_part('template-parts/componentes/componente', 'banner-titulo', array('titulo' => get_the_title())) ?>

    <?php if($mostrar_texto_video) { ?>
      <!-- Texto y Video -->
      <?php get_template_part('template-parts/componentes/componente', 'texto-video') ?>
      <!-- Fin Texto y Video -->
    <?php } ?>

    <?php if($mostrar_texto_cta_imagen_fondo) { ?>
      <!-- Texto cta imagen -->
      <?php get_template_part('template-parts/secciones/derechos-deberes/seccion', 'texto-cta-imagen-fondo') ?>
      <!-- Fin Texto cta imagen -->
    <?php } ?>

    <?php if($mostrar_contacto) { ?>
      <!-- Contacto -->
      <?php get_template_part('template-parts/componentes/componente', 'contacto-bottom') ?>
      <!-- Fin Contacto -->
    <?php } ?>

  </main>  
<?php 
get_footer();
?>