<?php 
get_header();

$mostrar_biografia        = get_field('mostrar_biografia');
$mostrar_area_interes     = get_field('mostrar_area_interes');
$mostrar_reconocimientos  = get_field('mostrar_reconocimientos');
$mostrar_especialida      = get_field('mostrar_especialida');
$mostrar_idiomas          = get_field('mostrar_idiomas');
$mostrar_social           = get_field('mostrar_social');

$genero_field           = get_field('genero', get_the_ID());
$genero                 = !empty($genero_field) ? esc_html($genero_field) : '';

$grupo_biografia        = get_field('grupo_biografia', get_the_ID());
$biografia              = !empty($grupo_biografia['descripcion']) ? $grupo_biografia['descripcion'] : '';

$grupo_area_interes     = get_field('grupo_area_interes', get_the_ID());
$area_interes           = !empty($grupo_area_interes['descripcion']) ? $grupo_area_interes['descripcion'] : '';

$grupo_reconocimientos  = get_field('grupo_reconocimientos', get_the_ID());
$reconocimientos        = !empty($grupo_reconocimientos['descripcion']) ? $grupo_reconocimientos['descripcion'] : '';

$grupo_especialidad     = get_field('grupo_especialidad', get_the_ID());
$especialidad           = !empty($grupo_especialidad['especialidad']) ? $grupo_especialidad['especialidad'] : '';

$grupo_idiomas          = get_field('grupo_idiomas', get_the_ID());
$idiomas                = !empty($grupo_idiomas['idiomas']) ? $grupo_idiomas['idiomas'] : '';

$grupo_social           = get_field('grupo_social', get_the_ID());
$items                  = !empty($grupo_social['items']) ? $grupo_social['items'] : [];

$contentGlobal          = get_page_by_path('contenido-global')->ID;
$mostrar_contacto       = ($contentGlobal) ? get_field('mostrar_contacto', $contentGlobal) : null;

?>
<main class="singleServicios d-flex flex-column">

  <article class="">
    <header class="pt-lg-90 bg-secondary-100">
      <div class="container">
        <div class="row flex-lg-row flex-column-reverse">
          <div class="col-lg-3 mb-n60">
            <?php the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid rounded-18 shadow-tarjeta overflow-hidden', 'title' => get_the_title()]);; ?>
          </div>
          <div class="col-lg-9 pt-24">
            <div class="col-lg-6 pb-lg-60">
              <?php get_template_part('template-parts/componentes/componente', 'titulo-h2', array(
                'titulo' => $genero . ' ' . get_the_title(),
                'clase' => 'h2 mb-12 mb-lg-0 text-white',
              ))?>
            </div>
          </div>
        </div>
      </div>
    </header>

    <footer class="py-lg-60 pt-60 bg-white">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <?php if($mostrar_idiomas) { ?>
              <!-- Idioma -->
              <p class="idioma mt-42">Idiomas</p>
              <div class="p font-sans text-secondary fw-semibold mb-30">
                <?php echo $idiomas; ?>
              </div>
              <!-- Fin Idioma -->
            <?php } ?>

            <?php foreach ($items as $key => $item) { 
              $cta_icono  = !empty($item['icono']) ? esc_html($item['icono']) : '';
              $cta_text   = !empty($item['link']['title']) ? esc_html($item['link']['title']) : '';
              $cta_url    = !empty($item['link']['url']) ? esc_url($item['link']['url']) : '';
              $cta_target = !empty($item['link']['target']) ? esc_attr($item['link']['target']) : '';
            ?>

              <a class="d-flex align-center gap-6 h5" href="<?php echo $cta_url; ?>" target="<?php echo $cta_target;?>" title="<?php echo $cta_text; ?>">
                <img width="24" height="24" src="<?php echo $cta_icono; ?>" alt="<?php echo $cta_text; ?>">
                <?php echo $cta_text; ?>
              </a>
              
            <?php }?>

          </div>
          <div class="col-lg-9 py-lg-0 pt-42 pb-60">
            <?php if($mostrar_biografia) { ?>
              <!-- Biografía -->
              <?php get_template_part('template-parts/componentes/componente', 'titulo-h2', array(
                'titulo' => 'Biografía',
                'clase' => 'h4 mb-30',
              ))?>
              <div class="p font-sans text-secondary">
                <?php echo $biografia; ?>
              </div>
              <!-- Fin Biografía -->
            <?php } ?>

            <?php if($mostrar_area_interes) { ?>
              <div class="pt-42">
                <!-- Áreas de interés -->
                <?php get_template_part('template-parts/componentes/componente', 'titulo-h2', array(
                  'titulo' => 'Áreas de interés',
                  'clase' => 'h4 mb-30',
                ))?>
                <div class="p text-secondary font-sans area-interes">
                  <?php echo $area_interes; ?>
                </div>
                <!-- Fin Áreas de interés -->
              </div>
            <?php } ?>

            <?php if($mostrar_reconocimientos) { ?>
              <div class="pt-42">
                <!-- Reconocimientos -->
                <?php get_template_part('template-parts/componentes/componente', 'titulo-h2', array(
                  'titulo' => 'Reconocimientos',
                  'clase' => 'h4 mb-30',
                ))?>
                <div class="p text-secondary font-sans area-interes">
                  <?php echo $reconocimientos; ?>
                </div>
                <!-- Fin Reconocimientos -->
              </div>
            <?php } ?>

            <?php if($mostrar_especialida) { ?>
              <div class="pt-42">
                <!-- Especialidad -->
                <?php get_template_part('template-parts/componentes/componente', 'titulo-h2', array(
                  'titulo' => 'Especialidad',
                  'clase' => 'h4 mb-30',
                ))?>
                <div class="p text-secondary font-sans fw-semibold">
                  <?php echo $especialidad; ?>
                </div>
                <!-- Fin Especialidad -->
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </footer>
  </article>

  <?php if($mostrar_contacto) { ?>
    <!-- Contacto -->
    <?php get_template_part('template-parts/componentes/componente', 'contacto-bottom') ?>
    <!-- Fin Contacto -->
  <?php } ?>


</main>
<?php 
get_footer();
?>