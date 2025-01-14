<?php
/**
 * Template Name: Página Blog
 * 
 * @package ThemeClinicaSanRafael
 */

if (!defined('ABSPATH')) {
  exit;
}

$grupo_titulo        = get_field('grupo_titulo');
$subtitulo_pagina    = !empty($grupo_titulo['subtitulo_pagina']) ? esc_html($grupo_titulo['subtitulo_pagina']) : '';
$titulo_pagina       = !empty($grupo_titulo['titulo_pagina']) ? $grupo_titulo['titulo_pagina'] : '';

$mostrar_noticias    = get_field('mostrar_noticias');
$mostrar_recomendado = get_field('mostrar_recomendado');
$mostrar_contacto    = get_field('mostrar_contacto');

get_header();
?>
  <main>
    <?php get_template_part('template-parts/componentes/componente', 'banner-titulo-desc', array(
      'bg' => 'white-300',
      'color' => 'text-secondary text-center',
      'titulo' => $titulo_pagina,
      'subtitulo' => $subtitulo_pagina,
    )) ?>

    <?php if($mostrar_noticias) { ?>
      <!-- Entradas -->
      <?php get_template_part('template-parts/secciones/blog/seccion', 'posts') ?>
      <!-- Fin Entradas -->
    <?php } ?>

    <?php if($mostrar_recomendado) { ?>
      <!-- Noticias -->
      <?php get_template_part('template-parts/secciones/blog/seccion', 'noticias') ?>
      <!-- Fin Noticias -->
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