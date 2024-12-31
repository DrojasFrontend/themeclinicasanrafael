<?php 
get_header();

$mostrar_hero_texto_desc_img                = get_field('mostrar_hero_texto_desc_img');
$mostrar_sedes                              = get_field('mostrar_sedes');
$mostrar_texto_cta_imagen_fondo             = get_field('mostrar_texto_cta_imagen_fondo');
$mostrar_especialidades                     = get_field('mostrar_especialidades');
$mostrar_texto_cta_imagen_fondo_invertido   = get_field('mostrar_texto_cta_imagen_fondo_invertido');
$mostrar_texto_cta_fondo                    = get_field('mostrar_texto_cta_fondo');
$mostrar_tarjeta_imagen_titulo_estadistica  = get_field('mostrar_tarjeta_imagen_titulo_estadistica');
$mostrar_beneficios                         = get_field('mostrar_beneficios');
$mostrar_items                              = get_field('mostrar_items');

$contentGlobal                            = get_page_by_path('contenido-global')->ID;
$mostrar_contacto                         = ($contentGlobal) ? get_field('mostrar_contacto', $contentGlobal) : null;

?>
<main class="singleServicios d-flex flex-column">

  <?php if($mostrar_hero_texto_desc_img) { ?>
    <!-- Hero Texto Descripcion Image -->
    <?php get_template_part('template-parts/single/servicios/seccion', 'hero-text-desc-img') ?>
    <!-- Fin Hero Texto Descripcion Image -->
  <?php } ?>

  <?php if($mostrar_sedes) { ?>
    <!-- Seleccion Sedes -->
    <?php get_template_part('template-parts/single/servicios/seccion', 'seleccion-sedes') ?>
    <!-- Fin Seleccion Sedes -->
  <?php } ?>

  <?php if($mostrar_texto_cta_imagen_fondo) { ?>
    <!-- Texto Cta Imagen Fondo -->
    <?php get_template_part('template-parts/single/servicios/seccion', 'texto-cta-imagen-fondo') ?>
    <!-- Fin Texto Cta Imagen Fondo -->
  <?php } ?>

  <?php if($mostrar_especialidades) { ?>
    <!-- Tarjetas Especialidades -->
    <?php get_template_part('template-parts/componentes/componente', 'tarjeta-especialidades') ?>
    <!-- Fin Tarjetas Especialidades -->
  <?php } ?>

  <?php if($mostrar_texto_cta_imagen_fondo_invertido) { ?>
    <!-- Texto Cta Imagen Fondo Invertido -->
    <?php get_template_part('template-parts/single/servicios/seccion', 'texto-cta-imagen-fondo-invertido') ?>
    <!-- Fin Texto Cta Imagen Fondo Invertido -->
  <?php } ?>

  <?php if($mostrar_texto_cta_fondo) { ?>
    <!-- Texto Cta Fondo -->
    <?php get_template_part('template-parts/single/servicios/seccion', 'texto-cta-fondo') ?>
    <!-- Fin Texto Cta Fondo -->
  <?php } ?>

  <?php if($mostrar_tarjeta_imagen_titulo_estadistica) { ?>
    <!-- Texto Cta Fondo -->
    <?php get_template_part('template-parts/single/servicios/seccion', 'tarjeta-estadisticas') ?>
    <!-- Fin Texto Cta Fondo -->
  <?php } ?>

  <?php if($mostrar_beneficios) { ?>
    <!-- Texto Cta Fondo -->
    <?php get_template_part('template-parts/single/servicios/seccion', 'beneficios') ?>
    <!-- Fin Texto Cta Fondo -->
  <?php } ?>

  <?php if($mostrar_items) { ?>
    <!-- Texto Cta Fondo -->
    <?php get_template_part('template-parts/single/servicios/seccion', 'items-icono') ?>
    <!-- Fin Texto Cta Fondo -->
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