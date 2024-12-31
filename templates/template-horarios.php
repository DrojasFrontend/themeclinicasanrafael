<?php
/**
 * Template Name: Página Horarios
 * 
 * @package ThemeClinicaSanRafael
 */

if (!defined('ABSPATH')) {
  exit;
}

get_header();

$mostrar_horarios               = get_field('mostrar_horarios');
$mostrar_texto_cta_imagen_fondo = get_field('mostrar_texto_cta_imagen_fondo');
$contentGlobal                  = get_page_by_path('contenido-global')->ID;
$mostrar_contacto               = ($contentGlobal) ? get_field('mostrar_contacto', $contentGlobal) : null;
$mostrar_documentacion          = get_field('mostrar_documentacion');

?>
  <main>

    <?php get_template_part('template-parts/componentes/componente', 'banner-titulo', array('titulo' => get_the_title())) ?>

    <?php if($mostrar_horarios) { ?>
    <!-- Tabs -->
      <?php get_template_part('template-parts/secciones/horarios/seccion', 'tabs') ?>
    <!-- Fin Tabs -->
     <?php } ?>

    <?php if($mostrar_texto_cta_imagen_fondo) { ?>
    <!-- Texto cta imagen fondo -->
      <?php get_template_part('template-parts/secciones/horarios/seccion', 'texto-cta-imagen-fondo') ?>
    <!-- Fin Texto cta imagen fondo -->
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