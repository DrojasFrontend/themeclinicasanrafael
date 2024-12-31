<?php 
$sitename                     = get_bloginfo('name');
$grupo_texto_cta_imagen_fondo = get_field('grupo_texto_cta_imagen_fondo');
$fondo                        = !empty($grupo_texto_cta_imagen_fondo['fondo']) ? esc_html($grupo_texto_cta_imagen_fondo['fondo']) : '';
$clase_adicional              = !empty($args['clase_adicional']) ? esc_html($args['clase_adicional']) : '';
$subtitulo                    = !empty($grupo_texto_cta_imagen_fondo['subtitulo']) ? esc_html($grupo_texto_cta_imagen_fondo['subtitulo']) : '';
$titulo                       = !empty($grupo_texto_cta_imagen_fondo['titulo']) ? $grupo_texto_cta_imagen_fondo['titulo'] : '';
$etiqueta_titulo              = !empty($grupo_texto_cta_imagen_fondo['etiqueta_titulo']) ? $grupo_texto_cta_imagen_fondo['etiqueta_titulo'] : '';
$descripcion                  = !empty($grupo_texto_cta_imagen_fondo['descripcion']) ? esc_html($grupo_texto_cta_imagen_fondo['descripcion']) : '';
$cta                          = !empty($grupo_texto_cta_imagen_fondo['cta']) ? $grupo_texto_cta_imagen_fondo['cta'] : [];
$cta_text                     = !empty($cta['title']) ? esc_html($cta['title']) : '';
$cta_url                      = !empty($cta['url']) ? esc_url($cta['url']) : '';
$cta_target                   = !empty($cta['target']) ? esc_attr($cta['target']) : '';
$imagen_id                    = !empty($grupo_texto_cta_imagen_fondo['imagen']['ID']) ? intval($grupo_texto_cta_imagen_fondo['imagen']['ID']) : '';

?>

<section class="seccionTextoCTAImagenFondo <?php echo $clase_adicional; ?>" style="background-image: url(<?php echo $fondo; ?>); background-repeat: no-repeat; background-size: cover">
  <div class="py-lg-52 py-42">
    <div class="container">
      <div class="row flex-lg-row flex-column-reverse">
        <div class="col-lg-6">
          <div class="pt-lg-52 pe-lg-90">
            <?php if ($subtitulo) { ?>
              <p class="subtitulo text-secondary mb-12"><?php echo $subtitulo; ?></p>
            <?php } ?>
            
            <?php
              if ($etiqueta_titulo === 'h1') {
                get_template_part('template-parts/componentes/componente', 'titulo-h1', array(
                  'titulo' => $titulo,
                  'clase' => 'mb-lg-24 mb-18 text-secondary',
                ));
              } else if ($etiqueta_titulo === 'h2') {
                get_template_part('template-parts/componentes/componente', 'titulo-h2', array(
                  'titulo' => $titulo,
                  'clase' => 'mb-lg-24 mb-18 text-secondary',
                ));
              }
            ?>

            <span class="linea linea--normal linea--negra my-lg-24 my-12"></span>
  
            <?php if ($descripcion) { ?>
              <p class="p text-secondary">
                <?php echo $descripcion; ?>
              </p>
            <?php } ?>
  
            <?php if($cta_text) { ?>
              <div class="mt-lg-42 mt-30">
                <a class="btn btn-primary" href="<?php echo $cta_url; ?>" target="<?php echo $cta_target;?>" title="<?php echo $cta_text; ?>">
                  <?php echo $cta_text; ?>
                </a>
              </div>
            <?php } ?>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="">
            <?php echo generar_image_responsive($imagen_id, 'custom-size', $sitename, 'img-fluid mb-lg-0 mb-24 rounded-18'); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>