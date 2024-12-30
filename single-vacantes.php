<?php
/**
 * Template Name: Single vacante
 * 
 * @package ThemeClinicaSanRafael
 */

if (!defined('ABSPATH')) {
  exit;
}

get_header();

$contentGlobal                  = get_page_by_path('contenido-global')->ID;
$mostrar_contacto               = ($contentGlobal) ? get_field('mostrar_contacto', $contentGlobal) : null;
$mostrar_documentacion          = get_field('mostrar_documentacion');

?>
  <main>
    <?php while (have_posts()) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
          <?php get_template_part('template-parts/componentes/componente', 'banner-titulo', array(
              'titulo' => 'Aplicar a vacante',
              'bg' => 'bg-primary-100',
              'color' => 'text-secondary text-center',
            ))
          ?>
        </header>
        <div class="container">
          <div class="pt-lg-72 pt-60 px-xl-100">
            <!-- Tarjeta Horizontal -->
            <?php get_template_part('template-parts/secciones/conocenos/seccion', 'tarjeta-horizontal') ?>
            <!-- Fin Tarjeta Horizontal -->
          </div>
        </div>
      </article>
    <?php endwhile; ?>

    <section class="pt-lg-72 pt-60">
      <div class="container">
        <div class="text-center">
          <?php get_template_part('template-parts/componentes/componente', 'titulo-h2', array(
            'titulo' => 'Envíanos tu hoja de vida',
            'clase' => 'h2 mb-24',
          ))?>
          <p class="p text-secondary mb-42">Completa el formulario y envíanos tu solicitud. Pronto estaremos en contacto contigo.</p>
        </div>

        <div class="d-flex justify-center">
          <div class="col-lg-6 m-auto">
            <!-- Formulario de Vacante -->
            <?php get_template_part('template-parts/secciones/conocenos/formulario', 'vacante') ?>
            <!-- Fin Formulario de Vacante -->
          </div>
        </div>

      </div>
    </section>

    <?php if($mostrar_contacto) { ?>
      <!-- Contacto -->
      <?php get_template_part('template-parts/componentes/componente', 'contacto-bottom') ?>
      <!-- Fin Contacto -->
    <?php } ?>

  </main>  
<?php 
get_footer();
?>