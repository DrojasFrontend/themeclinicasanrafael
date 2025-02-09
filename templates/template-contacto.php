<?php
/**
 * Template Name: Página Contáctanos
 * 
 * @package ThemeClinicaSanRafael
 */

if (!defined('ABSPATH')) {
  exit;
}

get_header();
$grupo_contacto     = get_field('grupo_contacto');
$descripcion        = !empty($grupo_contacto['descripcion']) ? $grupo_contacto['descripcion'] : '';
$mostrar_formulario = get_field('mostrar_formulario');
$contentGlobal      = get_page_by_path('contenido-global')->ID;
$mostrar_contacto   = ($contentGlobal) ? get_field('mostrar_contacto', $contentGlobal) : null;

?>
  <main>

    <?php get_template_part('template-parts/componentes/componente', 'banner-titulo-desc', array(
      'titulo' => get_the_title(),
      'descripcion' => $descripcion,
      )) ?>

    <?php if($mostrar_formulario) { ?>
      <!-- Formulario Contacto -->
      <?php get_template_part('template-parts/componentes/componente', 'formulario') ?>
      <!-- Fin Formulario Contacto -->
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