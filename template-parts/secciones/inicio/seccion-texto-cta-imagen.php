<?php 
$sitename               = get_bloginfo('name');
$grupo_texto_cta_imagen = get_field('grupo_texto_cta_imagen');
$subtitulo              = !empty($grupo_texto_cta_imagen['subtitulo']) ? esc_html($grupo_texto_cta_imagen['subtitulo']) : '';
$titulo                 = !empty($grupo_texto_cta_imagen['titulo']) ? esc_html($grupo_texto_cta_imagen['titulo']) : '';
$descripcion            = !empty($grupo_texto_cta_imagen['descripcion']) ? esc_html($grupo_texto_cta_imagen['descripcion']) : '';
$cta                    = !empty($grupo_texto_cta_imagen['cta']) ? $grupo_texto_cta_imagen['cta'] : [];
$cta_text               = !empty($cta['title']) ? esc_html($cta['title']) : '';
$cta_url                = !empty($cta['url']) ? esc_url($cta['url']) : '';
$cta_target             = !empty($cta['target']) ? esc_attr($cta['target']) : '';
$imagen_id              = !empty($grupo_texto_cta_imagen['imagen']['ID']) ? intval($grupo_texto_cta_imagen['imagen']['ID']) : '';
?>
<section class="seccionTextoCTAImagen">
  <div class="pt-lg-72 pt-60">
    <div class="container">
      <div class="row flex-lg-row flex-column-reverse">
        <div class="col-lg-6 pt-lg-72 pt-0">

          <?php if ($subtitulo) { ?>
            <p class="subtitulo text-purple mb-lg-24 mb-12"><?php echo $subtitulo; ?></p>
          <?php } ?>
          
          <?php get_template_part('template-parts/componentes/componente', 'titulo-h2', array(
            'titulo' => $titulo,
            'clase' => 'mb-lg-42 mb-18',
          ))?>

          <?php if ($descripcion) { ?>
            <p class="p mb-lg-60 mb-30">
              <?php echo $descripcion; ?>
            </p>
          <?php } ?>

          <?php if($cta_text) { ?>
            <a class="btn btn-primary" href="<?php echo $cta_url; ?>" target="<?php echo $cta_target;?>" title="<?php echo $cta_text; ?>">
              <?php echo $cta_text; ?>
            </a>
          <?php } ?>
        </div>
        <div class="col-lg-6">
          <div class="d-flex ps-lg-72">
            <?php echo generar_image_responsive($imagen_id, 'custom-size', $sitename, 'img-fluid mb-lg-0 mb-24 rounded'); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>