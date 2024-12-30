<?php 
$sitename           = get_bloginfo('name');
$grupo_hero         = get_field('grupo_hero');
$fondo              = !empty($grupo_hero['fondo']) ? $grupo_hero['fondo'] : '';
$slides             = !empty($grupo_hero['slides']) ? $grupo_hero['slides'] : [];
?>

<section class="seccionHeroCarusel position-relative px-lg-60 pt-lg-0 pt-60 overflow-hidden" style="background: url(<?php echo $fondo; ?>); background-size: cover;">
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
                    <?php if($key == 0 ) { ?>
                        <?php get_template_part('template-parts/componentes/componente', 'titulo-h1', array(
                        'titulo' => $titulo,
                        'clase' => 'mb-24 text-white',
                        ))?>
                    <?php } else {?>
                        <h2 class="h1 mb-24 text-white"><?php echo $titulo; ?></h2>
                    <?php } ?>
      
                    <div class="linea linea--normal linea--blanca mb-24"></div>
      
                    <?php if ($descripcion) { ?>
                    <p class="p text-white">
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
        <div class="swiper-fraction swiper-fraction swiper-fraction-blanco d-flex"></div>
        <div class="custom-pagination swiper-pagination swiper-pagination-blanco"></div>
        </div>
      </div>
    </div>
    
  <?php } ?>
</section>
