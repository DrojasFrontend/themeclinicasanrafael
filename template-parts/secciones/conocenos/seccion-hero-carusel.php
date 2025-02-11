<?php 
$sitename           = get_bloginfo('name');
$grupo_hero_carusel = get_field('grupo_hero_carusel');
$fondo              = !empty($grupo_hero_carusel['fondo']) ? $grupo_hero_carusel['fondo'] : '';
$slides             = !empty($grupo_hero_carusel['slide']) ? $grupo_hero_carusel['slide'] : [];
?>

<section class="seccionHeroCarusel position-relative px-lg-60 pt-lg-0 pt-60 overflow-hidden" style="background: url(<?php echo $fondo; ?>)">
  <?php if($slides) { ?>
    <div class="container position-relative">
      <div class="swiper heroCaruselSwiper pt-lg-52">
        <div class="swiper-wrapper">
          <?php foreach ($slides as $key => $slide) { 
            $subtitulo   = !empty($slide['subtitulo']) ? esc_html($slide['subtitulo']) : '';
            $titulo      = !empty($slide['titulo']) ? esc_html($slide['titulo']) : '';
            $descripcion = !empty($slide['descripcion']) ? esc_html($slide['descripcion']) : '';
            $imagen_id   = !empty($slide['imagen']['ID']) ? intval($slide['imagen']['ID']) : '';
          ?>
            <div class="swiper-slide">
                <div class="row flex-lg-row flex-column-reverse">
                  <div class="col-lg-6 pt-lg-72 pt-0 pe-lg-120 pb-lg-90">
      
                    <?php if ($subtitulo) { ?>
                      <p class="subtitulo p-medium mb-24"><?php echo $subtitulo; ?></p>
                    <?php } ?>
                    
                    <?php get_template_part('template-parts/componentes/componente', 'titulo-h2', array(
                      'titulo' => $titulo,
                      'clase' => 'mb-24',
                    ))?>
      
                    <div class="linea linea--normal linea--negra bg-secondary-50 mb-24"></div>
      
                    <?php if ($descripcion) { ?>
                    <p class="p">
                      <?php echo $descripcion; ?>
                    </p>
                    <?php } ?>
                  </div>
                  <div class="col-lg-6">
                    <?php echo generar_image_responsive($imagen_id, 'custom-size', $sitename, 'img-fluid mb-lg-0 mb-24'); ?>
                  </div>
                </div>
            </div>
          <?php } ?>
        </div>
      </div>
      <div class="swiper-button-blanco swiper-button-prev"></div>
      <div class="swiper-button-blanco swiper-button-next"></div>
    </div>
    <div class="pb-lg-30 position-relative z-1">
      <div class="container">
        <div class="d-flex justify-center justify-lg-start gap-24 pt-lg-0 pt-24 pb-lg-0 pb-60 translate-y--80">
        <div class="swiper-fraction swiper-fraction swiper-fraction-negro d-flex"></div>
        <div class="custom-pagination swiper-pagination swiper-pagination-negro"></div>
        </div>
      </div>
    </div>
    
  <?php } ?>
</section>
