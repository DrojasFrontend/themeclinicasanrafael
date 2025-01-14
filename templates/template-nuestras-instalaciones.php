<?php
/**
 * Template Name: Página de Nuestras Instalaciones
 * 
 * @package ThemeClinicaSanRafael
 */

if (!defined('ABSPATH')) {
  exit;
}

get_header();

$mostrar_texto_cta_imagen_fondo = get_field('mostrar_texto_cta_imagen_fondo');
$mostrar_sedes                  = get_field('mostrar_sedes');
$mostrar_servicios_destacados   = get_field('mostrar_servicios_destacados');
$mostrar_texto_video            = get_field('mostrar_texto_video');
$contentGlobal                  = get_page_by_path('contenido-global')->ID;
$mostrar_contacto               = ($contentGlobal) ? get_field('mostrar_contacto', $contentGlobal) : null;

?>
  <main>
    
    <?php if($mostrar_texto_cta_imagen_fondo) { ?>
      <!-- Contacto -->
      <?php get_template_part('template-parts/componentes/componente', 'texto-cta-imagen-fondo', array(
        'clase_adicional' => 'paginaNuestrasInstalaciones'
      )) ?>
      <!-- Fin Contacto -->
    <?php } ?>

    <?php if($mostrar_sedes) { ?>
      <!-- Sedes -->
      <?php get_template_part('template-parts/secciones/instalaciones/seccion', 'tabs') ?>
      <!-- Fin Sedes -->
    <?php } ?>

    <?php if($mostrar_servicios_destacados) { ?>
      <!-- Texto y Video -->
      <?php get_template_part('template-parts/secciones/instalaciones/seccion', 'carusel-destacados') ?>
      <!-- Fin Texto y Video -->
    <?php } ?>

    <?php if($mostrar_texto_video) { ?>
      <!-- Texto y Video -->
      <?php get_template_part('template-parts/componentes/componente', 'texto-video') ?>
      <!-- Fin Texto y Video -->
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