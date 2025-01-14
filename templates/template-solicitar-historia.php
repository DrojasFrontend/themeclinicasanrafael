<?php
/**
 * Template Name: Página Solicitar Historia Clínica
 * 
 * @package ThemeClinicaSanRafael
 */

if (!defined('ABSPATH')) {
  exit;
}

get_header();
$grupo_solicitar_historia = get_field('grupo_solicitar_historia');
$descripcion              = !empty($grupo_solicitar_historia['descripcion']) ? $grupo_solicitar_historia['descripcion'] : '';
$mostrar_formulario       = get_field('mostrar_formulario');
$contentGlobal            = get_page_by_path('contenido-global')->ID;
$mostrar_contacto         = ($contentGlobal) ? get_field('mostrar_contacto', $contentGlobal) : null;

?>
  <main>

    <?php get_template_part('template-parts/componentes/componente', 'banner-titulo-desc', array(
      'titulo' => get_the_title(),
      'descripcion' => $descripcion,
    )) ?>

    <?php if($mostrar_formulario) { ?>
      <!-- Formulario Historia Clinica -->
      <?php get_template_part('template-parts/secciones/historia/formulario', 'historia-clinica') ?>
      <!-- Fin Formulario Historia Clinica -->
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