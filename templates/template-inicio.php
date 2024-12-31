<?php
/**
 * Template Name: Página de Inicio
 * 
 * @package ThemeClinicaSanRafael
 */

if (!defined('ABSPATH')) {
  exit;
}

get_header();

$mostrar_hero                   = get_field('mostrar_hero');
$mostrar_tarjetas_iconos        = get_field('mostrar_tarjetas_iconos');
$mostrar_servicios              = get_field('mostrar_servicios');
$mostrar_texto_imagen           = get_field('mostrar_texto_imagen');
$mostrar_texto_cta_imagen       = get_field('mostrar_texto_cta_imagen');
$mostrar_noticias               = get_field('mostrar_noticias');
$mostrar_texto_cta_imagen_fondo = get_field('mostrar_texto_cta_imagen_fondo');

$contentGlobal                  = get_page_by_path('contenido-global')->ID;
$mostrar_contacto               = ($contentGlobal) ? get_field('mostrar_contacto', $contentGlobal) : null;

?>
  <main>
    <?php if($mostrar_hero) { ?>
      <!-- Hero Carusel -->
      <?php get_template_part('template-parts/secciones/inicio/seccion', 'hero-carusel') ?>
      <!-- Fin Hero Carusel -->
    <?php } ?>

    <?php if($mostrar_tarjetas_iconos) { ?>
      <!-- Tarjeta Iconos -->
      <?php get_template_part('template-parts/secciones/inicio/seccion', 'tarjeta-iconos') ?>
      <!-- Fin tarjeta Iconos -->
    <?php } ?>

    <?php if($mostrar_servicios) { ?>
      <!-- Servicios -->
      <?php get_template_part('template-parts/secciones/inicio/seccion', 'servicios') ?>
      <!-- Fin Servicios -->
    <?php } ?>
    
    <?php if($mostrar_texto_imagen) { ?>
      <!-- Texto imagen -->
      <?php get_template_part('template-parts/secciones/inicio/seccion', 'texto-imagen') ?>
      <!-- Fin texto imagen -->
    <?php } ?>

    <?php get_template_part('template-parts/secciones/inicio/seccion', 'tabs') ?>
    
    <?php if($mostrar_texto_cta_imagen) { ?>
      <!-- Texto cta imagen -->
      <?php get_template_part('template-parts/secciones/inicio/seccion', 'texto-cta-imagen') ?>
      <!-- Fin Texto cta imagen -->
    <?php } ?>

    
    <?php if($mostrar_noticias) { ?>
      <!-- Noticias -->
      <?php get_template_part('template-parts/secciones/inicio/seccion', 'noticias') ?>
      <!-- Fin Noticias -->
    <?php } ?>

    <?php if($mostrar_texto_cta_imagen_fondo) { ?>
      <!-- Texto cta imagen -->
      <?php get_template_part('template-parts/secciones/inicio/seccion', 'texto-cta-imagen-fondo') ?>
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