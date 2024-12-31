<?php
/**
 * Template Name: Página de Convenios
 * 
 * @package ThemeClinicaSanRafael
 */

if (!defined('ABSPATH')) {
  exit;
}

get_header();

$mostrar_texto_cta_imagen_fondo = get_field('mostrar_texto_cta_imagen_fondo');
$mostrar_convenios              = get_field('mostrar_convenios');
$contentGlobal                  = get_page_by_path('contenido-global')->ID;
$mostrar_contacto               = ($contentGlobal) ? get_field('mostrar_contacto', $contentGlobal) : null;

?>
  <main>
    
    <?php if($mostrar_texto_cta_imagen_fondo) { ?>
      <!-- Contacto -->
      <?php get_template_part('template-parts/componentes/componente', 'texto-cta-imagen-fondo', array('clase_adicional' => 'paginaConvenios')) ?>
      <!-- Fin Contacto -->
    <?php } ?>

    <?php if($mostrar_convenios) { ?>
      <!-- Contacto -->
      <?php get_template_part('template-parts/componentes/componente', 'convenios') ?>
      <!-- Fin Contacto -->
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