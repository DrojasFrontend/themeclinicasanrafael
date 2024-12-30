<?php
/**
 * Template Name: Página Conocenos
 * 
 * @package ThemeClinicaSanRafael
 */

if (!defined('ABSPATH')) {
  exit;
}

get_header();


$mostrar_hero_carusel                     = get_field('mostrar_hero_carusel');
$mostrar_texto_cta_imagen                 = get_field('mostrar_texto_cta_imagen');
$mostrar_tarjeta                          = get_field('mostrar_tarjeta');
$mostrar_textos_enumerados                = get_field('mostrar_textos_enumerados');
$mostrar_texto_cta_imagen_fondo           = get_field('mostrar_texto_cta_imagen_fondo');
$mostrar_texto_cta_imagen_fondo_invertido = get_field('mostrar_texto_cta_imagen_fondo_invertido');
$mostrar_texto_cta_items                  = get_field('mostrar_texto_cta_items');
$mostrar_texto_cta_fondo                  = get_field('mostrar_texto_cta_fondo');
$contentGlobal                            = get_page_by_path('contenido-global')->ID;
$mostrar_contacto                         = ($contentGlobal) ? get_field('mostrar_contacto', $contentGlobal) : null;

?>
  <main>

    <?php if($mostrar_hero_carusel) { ?>
      <!-- Hero Carusel -->
      <?php get_template_part('template-parts/secciones/conocenos/seccion', 'hero-carusel') ?>
      <!-- Fin Hero Carusel -->
    <?php } ?>
  
    <?php if($mostrar_texto_cta_imagen) { ?>
      <!-- Texto Imagen -->
      <?php get_template_part('template-parts/secciones/conocenos/seccion', 'texto-cta-imagen') ?>
      <!-- Fin Texto Imagen -->
    <?php } ?>

    <?php if($mostrar_tarjeta) { ?>
      <!-- Tarjet Texto -->
      <?php get_template_part('template-parts/secciones/conocenos/seccion', 'tarjeta-texto') ?>
      <!-- Fin Tarjet Texto -->
    <?php } ?>

    <?php if($mostrar_textos_enumerados) { ?>
      <!-- Texto Enumerados -->
      <?php get_template_part('template-parts/secciones/conocenos/seccion', 'texto-numerado') ?>
      <!-- Fin Texto Enumerados -->
    <?php } ?>

    <?php if($mostrar_texto_cta_imagen_fondo) { ?>
    <!-- Texto cta imagen fondo -->
      <?php get_template_part('template-parts/secciones/conocenos/seccion', 'texto-cta-imagen-fondo') ?>
    <!-- Fin Texto cta imagen fondo -->
    <?php } ?>

    <?php if($mostrar_texto_cta_items) { ?>
    <!-- Texto cta items -->
      <?php get_template_part('template-parts/secciones/conocenos/seccion', 'texto-cta-items') ?>
    <!-- Fin Texto cta items -->
    <?php } ?>

    <?php if($mostrar_texto_cta_imagen_fondo_invertido) { ?>
    <!-- Texto cta imagen -->
      <?php get_template_part('template-parts/secciones/conocenos/seccion', 'texto-cta-imagen-fondo-invertido') ?>
    <!-- Fin Texto cta imagen -->
    <?php } ?>

    <?php if($mostrar_texto_cta_fondo) { ?>
    <!-- Texto cta imagen -->
      <?php get_template_part('template-parts/secciones/conocenos/seccion', 'texto-cta-fondo') ?>
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