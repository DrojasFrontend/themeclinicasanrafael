<?php
/**
 * Template Name: Página Nuestras políticas
 * 
 * @package ThemeClinicaSanRafael
 */

if (!defined('ABSPATH')) {
  exit;
}

get_header();

$contentGlobal                  = get_page_by_path('contenido-global')->ID;
$mostrar_contacto               = ($contentGlobal) ? get_field('mostrar_contacto', $contentGlobal) : null;

?>
  <main>

    <?php get_template_part('template-parts/componentes/componente', 'banner-titulo', array(
      'titulo' => get_the_title(),
      'bg' => 'bg-primary-100',
      'color' => 'text-secondary text-center',
    )) ?>

    <?php get_template_part('template-parts/secciones/politicas/seccion', 'tabs-vertical') ?>
    
    <?php if($mostrar_contacto) { ?>
      <!-- Contacto -->
      <?php get_template_part('template-parts/componentes/componente', 'contacto-bottom') ?>
      <!-- Fin Contacto -->
    <?php } ?>

  </main>  
<?php 
get_footer();
?>