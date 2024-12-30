<?php 
$sitename                                 = get_bloginfo('name');
$grupo_tarjeta_imagen_titulo_estadistica  = get_field('grupo_tarjeta_imagen_titulo_estadistica');
$posicion                                 = !empty($grupo_tarjeta_imagen_titulo_estadistica['posicion']) ? esc_html($grupo_tarjeta_imagen_titulo_estadistica['posicion']) : '';
$fondo                                    = !empty($grupo_tarjeta_imagen_titulo_estadistica['fondo']) ? esc_html($grupo_tarjeta_imagen_titulo_estadistica['fondo']) : '';
$subtitulo                                = !empty($grupo_tarjeta_imagen_titulo_estadistica['subtitulo']) ? esc_html($grupo_tarjeta_imagen_titulo_estadistica['subtitulo']) : '';
$titulo                                   = !empty($grupo_tarjeta_imagen_titulo_estadistica['titulo']) ? $grupo_tarjeta_imagen_titulo_estadistica['titulo'] : '';
$descripcion                              = !empty($grupo_tarjeta_imagen_titulo_estadistica['descripcion']) ? esc_html($grupo_tarjeta_imagen_titulo_estadistica['descripcion']) : '';
$estadisticas                             = !empty($grupo_tarjeta_imagen_titulo_estadistica['estadisticas']) ? $grupo_tarjeta_imagen_titulo_estadistica['estadisticas'] : [];
$imagen_id                                = !empty($grupo_tarjeta_imagen_titulo_estadistica['imagen']['ID']) ? intval($grupo_tarjeta_imagen_titulo_estadistica['imagen']['ID']) : '';
?>

<section class="seccionTarjetaEspecialidades" style="order: <?php echo $posicion; ?>; background-image: url(<?php echo $fondo; ?>); background-repeat: no-repeat; background-size: cover">
  <div class="py-lg-60 pt-60">
    <div class="container">
      <div class="row flex-lg-row flex-column">
        <div class="col-lg-6">
          <div class="pe-lg-72">
            <?php echo generar_image_responsive($imagen_id, 'custom-size', $sitename, 'img-fluid mb-lg-0 mb-42 rounded'); ?>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="pb-lg-42 mb-42 mb-lg-0">
            <?php if ($subtitulo) { ?>
              <p class="subtitulo text-purple mb-12"><?php echo $subtitulo; ?></p>
            <?php } ?>
            
            <?php get_template_part('template-parts/componentes/componente', 'titulo-h2', array(
              'titulo' => $titulo,
              'clase' => 'mb-lg-24 mb-18 text-secondary',
            ))?>
  
            <?php if ($descripcion) { ?>
              <p class="p mb-lg-42 mb-30 text-secondary">
                <?php echo $descripcion; ?>
              </p>
            <?php } ?>

            <?php if ($estadisticas) { ?>
              <?php foreach ($estadisticas as $key => $estadistica) { 
                $numero   = !empty($estadistica['numero']) ? esc_html($estadistica['numero']) : '';
                $detalle  = !empty($estadistica['detalle']) ? esc_html($estadistica['detalle']) : '';
              ?>
                <div class="row flex align-center py-12 px-24 border-bottom">
                  <div class="col-2 col-lg-2 ps-lg-24"><span class="d-block h4 text-secondary text-center"><?php echo $numero; ?></span></div>
                  <div class="col-10 p-0"><p class="p color-secondary"><?php echo $detalle; ?></p></div>
                </div>
              <?php } ?>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>