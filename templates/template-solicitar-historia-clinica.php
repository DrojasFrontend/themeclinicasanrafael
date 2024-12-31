<?php
/**
 * Template Name: Página cómo solicitar historia clínica
 * 
 * @package ThemeClinicaSanRafael
 */

if (!defined('ABSPATH')) {
  exit;
}

get_header();

$mostrar_texto_cta_imagen       = get_field('mostrar_texto_cta_imagen');
$contentGlobal                  = get_page_by_path('contenido-global')->ID;
$mostrar_contacto               = ($contentGlobal) ? get_field('mostrar_contacto', $contentGlobal) : null;
$mostrar_documentacion          = get_field('mostrar_documentacion');
$mostrar_texto_cta_imagen_fondo = get_field('mostrar_texto_cta_imagen_fondo');

?>
  <main>

    <?php get_template_part('template-parts/componentes/componente', 'banner-titulo', array('titulo' => get_the_title())) ?>

    <?php if($mostrar_texto_cta_imagen) { ?>
      <!-- Texto cta imagen -->
      <?php get_template_part('template-parts/secciones/historia/seccion', 'texto-cta-imagen') ?>
      <!-- Fin Texto cta imagen -->
    <?php } ?>

    <?php if($mostrar_documentacion) { ?>
      <!-- Documentacion -->
      <?php get_template_part('template-parts/secciones/historia/seccion', 'preguntas-frecuentes') ?>
      <!-- Fin Documentacion -->
    <?php } ?>

    <?php if($mostrar_texto_cta_imagen_fondo) { ?>
      <!-- Texto cta imagen -->
      <?php get_template_part('template-parts/secciones/historia/seccion', 'texto-cta-imagen-fondo') ?>
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