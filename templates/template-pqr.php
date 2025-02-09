<?php
/**
 * Template Name: Página PQR
 * 
 * @package ThemeClinicaSanRafael
 */

if (!defined('ABSPATH')) {
  exit;
}

get_header();
$grupo_pqr          = get_field('grupo_pqr');
$descripcion        = !empty($grupo_pqr['descripcion']) ? $grupo_pqr['descripcion'] : '';
$mostrar_formulario = get_field('mostrar_formulario');
$grupo_formulario   = get_field('grupo_formulario');


$contentGlobal      = get_page_by_path('contenido-global')->ID;
$mostrar_contacto   = ($contentGlobal) ? get_field('mostrar_contacto', $contentGlobal) : null;

?>
  <main>

    <?php get_template_part('template-parts/componentes/componente', 'banner-titulo-desc', array(
      'titulo' => get_the_title(),
      'descripcion' => $descripcion,
      'color' => 'mb-12'
      )) ?>

    <?php if($mostrar_formulario) { ?>
      <!-- Formulario PQR -->
      <?php get_template_part('template-parts/componentes/componente', 'formulario') ?>
      <!-- Fin Formulario PQR -->
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