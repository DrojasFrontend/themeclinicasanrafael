<?php 
$sitename                                 = get_bloginfo('name');
$grupo_texto_cta_imagen_fondo_invertido   = get_field('grupo_texto_cta_imagen_fondo_invertido');
$posicion                                 = !empty($grupo_texto_cta_imagen_fondo_invertido['posicion']) ? esc_html($grupo_texto_cta_imagen_fondo_invertido['posicion']) : '';
$fondo                                    = !empty($grupo_texto_cta_imagen_fondo_invertido['fondo']) ? esc_html($grupo_texto_cta_imagen_fondo_invertido['fondo']) : '';
$subtitulo                                = !empty($grupo_texto_cta_imagen_fondo_invertido['subtitulo']) ? esc_html($grupo_texto_cta_imagen_fondo_invertido['subtitulo']) : '';
$titulo                                   = !empty($grupo_texto_cta_imagen_fondo_invertido['titulo']) ? $grupo_texto_cta_imagen_fondo_invertido['titulo'] : '';
$descripcion                              = !empty($grupo_texto_cta_imagen_fondo_invertido['descripcion']) ? esc_html($grupo_texto_cta_imagen_fondo_invertido['descripcion']) : '';
$cta                                      = !empty($grupo_texto_cta_imagen_fondo_invertido['cta']) ? $grupo_texto_cta_imagen_fondo_invertido['cta'] : [];
$cta_text                                 = !empty($cta['title']) ? esc_html($cta['title']) : '';
$cta_url                                  = !empty($cta['url']) ? esc_url($cta['url']) : '';
$cta_target                               = !empty($cta['target']) ? esc_attr($cta['target']) : '';
$imagen_id                                = !empty($grupo_texto_cta_imagen_fondo_invertido['imagen']['ID']) ? intval($grupo_texto_cta_imagen_fondo_invertido['imagen']['ID']) : '';
?>

<section class="seccionTextoCTAImagenFondoInvertido" style="order: <?php echo $posicion; ?>; background-image: url(<?php echo $fondo; ?>); background-repeat: no-repeat; background-size: cover">
  <div class="pt-lg-72 pt-60">
    <div class="container">
      <div class="row flex-lg-row flex-column">
        <div class="col-lg-6">
          <div class="pb-lg-72 mb-42 mb-lg-0">
            <?php if ($subtitulo) { ?>
              <p class="subtitulo text-white mb-12"><?php echo $subtitulo; ?></p>
            <?php } ?>
            
            <?php get_template_part('template-parts/componentes/componente', 'titulo-h2', array(
              'titulo' => $titulo,
              'clase' => 'mb-lg-24 mb-18 text-white',
            ))?>
  
            <?php if ($descripcion) { ?>
              <p class="p mb-lg-42 mb-30 text-white">
                <?php echo $descripcion; ?>
              </p>
            <?php } ?>
  
            <?php if($cta_text) { ?>
              <a class="btn btn-primary" href="<?php echo $cta_url; ?>" target="<?php echo $cta_target;?>" title="<?php echo $cta_text; ?>">
                <?php echo $cta_text; ?>
              </a>
            <?php } ?>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="ps-lg-72 mb-n72">
            <?php echo generar_image_responsive($imagen_id, 'custom-size', $sitename, 'img-fluid mb-lg-0 mb-42 rounded'); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>