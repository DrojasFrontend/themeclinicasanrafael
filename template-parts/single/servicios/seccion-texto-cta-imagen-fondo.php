<?php 
$sitename                       = get_bloginfo('name');
$grupo_imagen_texto_descripcion = get_field('grupo_imagen_texto_descripcion');
$posicion                       = !empty($grupo_imagen_texto_descripcion['posicion']) ? esc_html($grupo_imagen_texto_descripcion['posicion']) : '';
$fondo                          = !empty($grupo_imagen_texto_descripcion['fondo']) ? esc_html($grupo_imagen_texto_descripcion['fondo']) : '';
$subtitulo                      = !empty($grupo_imagen_texto_descripcion['subtitulo']) ? esc_html($grupo_imagen_texto_descripcion['subtitulo']) : '';
$titulo                         = !empty($grupo_imagen_texto_descripcion['titulo']) ? $grupo_imagen_texto_descripcion['titulo'] : '';
$descripcion                    = !empty($grupo_imagen_texto_descripcion['descripcion']) ? esc_html($grupo_imagen_texto_descripcion['descripcion']) : '';
$cta                            = !empty($grupo_imagen_texto_descripcion['cta']) ? $grupo_imagen_texto_descripcion['cta'] : [];
$cta_text                       = !empty($cta['title']) ? esc_html($cta['title']) : '';
$cta_url                        = !empty($cta['url']) ? esc_url($cta['url']) : '';
$cta_target                     = !empty($cta['target']) ? esc_attr($cta['target']) : '';
$imagen_id                      = !empty($grupo_imagen_texto_descripcion['imagen']['ID']) ? intval($grupo_imagen_texto_descripcion['imagen']['ID']) : '';
?>

<section class="seccionTextoCTAImagenFondo" style="order: <?php echo $posicion; ?>; background-image: url(<?php echo $fondo; ?>); background-repeat: no-repeat; background-size: cover">
  <div class="pt-lg-72 pt-60">
    <div class="container">
      <div class="row flex-lg-row flex-column">
        <div class="col-lg-6">
          <div class="pe-lg-72 mb-lg-n72">
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
              <p class="p mb-lg-0 mb-30 text-secondary">
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
      </div>
    </div>
  </div>
</section>