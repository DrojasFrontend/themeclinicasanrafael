<?php 
$sitename         = get_bloginfo('name');
$contentGlobal    = get_page_by_path('contenido-global')->ID;
/* Contacto */
$grupo_contacto   = ($contentGlobal) ? get_field('grupo_contacto', $contentGlobal) : null;
$subtitulo        = !empty($grupo_contacto['subtitulo']) ? esc_html($grupo_contacto['subtitulo']) : '';
$titulo           = !empty($grupo_contacto['titulo']) ? esc_html($grupo_contacto['titulo']) : '';
$tarjetas         = !empty($grupo_contacto['tarjetas']) ? $grupo_contacto['tarjetas'] : [];

/* Visítanos */
$grupo_visitanos  = ($contentGlobal) ? get_field('grupo_visitanos', $contentGlobal) : null;
$titulo_visitanos = !empty($grupo_visitanos['titulo']) ? esc_html($grupo_visitanos['titulo']) : '';
$items            = !empty($grupo_visitanos['items']) ? $grupo_visitanos['items'] : [];
?>

<section class="seccionContactoBottom overflow-hidden pt-lg-72 pt-80 px-lg-60" style="order: 10">
  <div class="container">
    <div class="text-center">
      <?php if ($subtitulo) { ?>
        <p class="subtitulo text-purple mb-12"><?php echo $subtitulo; ?></p>
      <?php } ?>

      <?php get_template_part('template-parts/componentes/componente', 'titulo-h2', array(
        'titulo' => $titulo,
        'clase' => 'mb-lg-72 mb-42',
      ))?>
    </div>
  </div>

  <div class="container position-relative">
    <div class="row">
      <div class="swiper d-block d-lg-grid contactoBottomSwiper extended-swiper overflow-lg-inherit">
        <div class="swiper-wrapper d-block d-lg-flex">
          <?php foreach ($tarjetas as $tarjeta) { 
            $imagen_id   = !empty($tarjeta['imagen']['ID']) ? intval($tarjeta['imagen']['ID']) : '';
            $tarjeta_titulo      = !empty($tarjeta['titulo']) ? esc_html($tarjeta['titulo']) : '';
            $tarjeta_descripcion = !empty($tarjeta['descripcion']) ? esc_html($tarjeta['descripcion']) : '';
            $cta                 = !empty($tarjeta['cta']) ? $tarjeta['cta'] : [];
            $cta_text            = esc_html($cta['title']);
            $cta_url             = esc_url($cta['url']);
            $cta_target          = esc_attr($cta['target']);
            ?>
            <div class="swiper-slide h-auto h-lg-100 mb-lg-0 mb-30">
              <div class="row">
                <div class="col-lg-6 mb-lg-0 mb-24">
                  <?php echo generar_image_responsive($imagen_id, 'custom-size', $sitename, 'img-fluid rounded'); ?>
                </div>
                <div class="col-lg-6">
                  <div class="d-flex flex-column justify-between h-lg-100 gap-24">
                    <div>
                      <?php if ($tarjeta_titulo) { ?>
                        <h3 class="h5 text-secondary mb-12"><?php echo $tarjeta_titulo; ?></h3>
                      <?php } ?>
    
                      <?php if ($tarjeta_descripcion) { ?>
                        <p class="p text-secondary"><?php echo $tarjeta_descripcion; ?></p>
                      <?php } ?>
                    </div>
                    <?php if($cta_text) { ?>
                      <a class="font-sans p text-primary fw-bold d-flex align-center gap-6 hover" href="<?php echo $cta_url; ?>" target="<?php echo $cta_target;?>" title="<?php echo $cta_text; ?>">
                        <span class="hover-link"><?php echo $cta_text; ?></span>
                        <i class="icono icono-flecha"></i>
                      </a>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
    <div class="swiper-button-azul swiper-button-prev-con"></div>
    <div class="swiper-button-azul swiper-button-next-con"></div>
  </div>

  <div class="container">
    <div class="text-center pt-lg-90">
      <?php get_template_part('template-parts/componentes/componente', 'titulo-h2', array(
        'titulo' => $titulo_visitanos,
        'clase' => 'mb-lg-72 mb-24',
      ))?>
    </div>

    <div class="seccionContactoBottom__visitanos pb-lg-72">
      <ul class="row">
        <?php foreach ($items as $item) { 
          $sede       = !empty($item['sede']) ? esc_html($item['sede']) : '';
          $cta        = !empty($item['direccion']) ? $item['direccion'] : [];
          $cta_text   = esc_html($cta['title']);
          $cta_url    = esc_url($cta['url']);
          $cta_target = esc_attr($cta['target']);
          $telefono   = !empty($item['telefono']) ? esc_html($item['telefono']) : '';
        ?>
          <li class="col-lg-3 col-6 mb-lg-42 mb-24">
            <p class="p text-secondary fw-semibold"><?php echo $sede; ?></p>
  
            <?php if($cta_text) { ?>
              <a class="d-block font-sans text-primary" href="<?php echo $cta_url; ?>" target="<?php echo $cta_target;?>" title="<?php echo $cta_text; ?>">
                <?php echo $cta_text; ?>
              </a>
            <?php } ?>
  
            <?php if($telefono) { ?>
              <a class="d-block font-sans text-secondary" href="tel:<?php echo $telefono; ?>" target="_blank" title="<?php echo $telefono; ?>">
              <?php echo $telefono; ?>
              </a>
            <?php } ?>
          </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</section>

