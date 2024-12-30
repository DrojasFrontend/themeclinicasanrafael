<?php 
$sitename       = get_bloginfo('name');
$grupo_tarjeta  = get_field('grupo_tarjeta');
$fondo          = !empty($grupo_tarjeta['fondo']) ? esc_html($grupo_tarjeta['fondo']) : '';
$subtitulo      = !empty($grupo_tarjeta['subtitulo']) ? esc_html($grupo_tarjeta['subtitulo']) : '';
$titulo         = !empty($grupo_tarjeta['titulo']) ? esc_html($grupo_tarjeta['titulo']) : '';
$tarjetas       = !empty($grupo_tarjeta['tarjetas']) ? $grupo_tarjeta['tarjetas'] : [];

?>

<section class="seccionTarjetaTexto py-lg-72 pt-60 px-lg-60 overflow-hidden" <?php echo (isset($fondo) && !empty($fondo)) ? 'style="background-image: url(\'' . $fondo . '\');"' : ''; ?>>
  <div class="container px-0 px-lg-18">
    <div class="position-relative text-center">
      <?php if ($subtitulo) { ?>
        <p class="subtitulo text-purple mb-12"><?php echo $subtitulo; ?></p>
      <?php } ?>
      
      <?php get_template_part('template-parts/componentes/componente', 'titulo-h2', array(
        'titulo' => $titulo,
        'clase' => 'mb-24',
      ))?>
    </div>
    <div class="swiper tarjetaTextoSwiper overflow-lg-inherit">
      <div class="swiper-wrapper d-lg-grid grid-cols-lg-2 gap-lg-36">
        <?php foreach ($tarjetas as $key => $tarjeta) {
          $titulo       = !empty($tarjeta['titulo']) ? esc_html($tarjeta['titulo']) : ''; 
          $descripcion  = !empty($tarjeta['descripcion']) ? esc_html($tarjeta['descripcion']) : ''; 
        ?>
          <div class="swiper-slide w-lg-100 rounded bg-white shadow-lg-tarjeta h-auto">
            <div class="h-100 px-36 py-42">
  
              <?php if ($titulo) { ?>
                <h3 class="h4 text-purple mb-24"><?php echo $titulo; ?></h3>
              <?php } ?>
  
              <?php if ($descripcion) { ?>
                <p class="p text-secondary">
                  <?php echo $descripcion; ?>
                </p>
              <?php } ?>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>

    <div class="d-lg-none pb-lg-30 position-relative z-1">
      <div class="container">
        <div class="d-flex justify-center justify-lg-start gap-24 pt-lg-0 pt-24 pb-lg-0 pb-60 translate-y--80">
        <div class="swiper-fraction-tar swiper-fraction-blanco d-flex font-sans"></div>
        <div class="custom-pagination swiper-pagination-tar swiper-pagination-blanco"></div>
        </div>
      </div>
    </div>
  </div>
</section>