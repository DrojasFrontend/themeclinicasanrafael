<?php 
$sitename                     = get_bloginfo('name');
$contentGlobalServicios       = get_page_by_path('paginas-archives')->ID;
$grupo_servicios              = ($contentGlobalServicios) ? get_field('grupo_servicios', $contentGlobalServicios) : null;

$fondo                        = !empty($grupo_servicios['texto_cta_imagen_fondo']) ? esc_html($grupo_servicios['texto_cta_imagen_fondo']) : '';
$subtitulo                    = !empty($grupo_servicios['texto_cta_imagen_subtitulo']) ? esc_html($grupo_servicios['texto_cta_imagen_subtitulo']) : '';
$titulo                       = !empty($grupo_servicios['texto_cta_imagen_titulo']) ? $grupo_servicios['texto_cta_imagen_titulo'] : '';
$descripcion                  = !empty($grupo_servicios['texto_cta_imagen_descripcion']) ? esc_html($grupo_servicios['texto_cta_imagen_descripcion']) : '';
$cta                          = !empty($grupo_servicios['texto_cta_imagen_cta']) ? $grupo_servicios['texto_cta_imagen_cta'] : [];
$cta_text                     = !empty($cta['title']) ? esc_html($cta['title']) : '';
$cta_url                      = !empty($cta['url']) ? esc_url($cta['url']) : '';
$cta_target                   = !empty($cta['target']) ? esc_attr($cta['target']) : '';
$imagen_id                    = !empty($grupo_servicios['texto_cta_imagen_imagen']['ID']) ? intval($grupo_servicios['texto_cta_imagen_imagen']['ID']) : '';
?>

<section class="seccionTextoCTAImagenFondo mt-140" style="background-image: url(<?php echo $fondo; ?>); background-repeat: no-repeat; background-size: cover">
  <div class="container">
    <div class="row flex-lg-row flex-column-reverse">
      <div class="col-lg-6">
        <div class="py-lg-72 mb-42 mb-lg-0">
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
        <div class="ps-lg-72 mt-n72 pb-lg-72 pb-0">
          <?php echo generar_image_responsive($imagen_id, 'custom-size', $sitename, 'img-fluid mb-lg-0 mb-42 rounded'); ?>
        </div>
      </div>
    </div>
  </div>
</section>