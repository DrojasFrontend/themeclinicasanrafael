<?php 
$sitename              = get_bloginfo('name');
$grupo_texto_cta_fondo = get_field('grupo_texto_cta_fondo');
$fondo                 = !empty($grupo_texto_cta_fondo['fondo']) ? esc_html($grupo_texto_cta_fondo['fondo']) : '';
$subtitulo             = !empty($grupo_texto_cta_fondo['subtitulo']) ? esc_html($grupo_texto_cta_fondo['subtitulo']) : '';
$titulo                = !empty($grupo_texto_cta_fondo['titulo']) ? $grupo_texto_cta_fondo['titulo'] : '';
$descripcion           = !empty($grupo_texto_cta_fondo['descripcion']) ? esc_html($grupo_texto_cta_fondo['descripcion']) : '';
$cta                   = !empty($grupo_texto_cta_fondo['cta']) ? $grupo_texto_cta_fondo['cta'] : [];
$cta_text              = !empty($cta['title']) ? esc_html($cta['title']) : '';
$cta_url               = !empty($cta['url']) ? esc_url($cta['url']) : '';
$cta_target            = !empty($cta['target']) ? esc_attr($cta['target']) : '';
?>

<section class="seccionTextoCTAFondo" style="background-image: url(<?php echo $fondo; ?>); background-repeat: no-repeat; background-size: cover">
  <div class="pt-lg-120 pt-80">
    <div class="container">
      <div class="row justify-center">
        <div class="col-lg-8 m-auto">
          <div class="pb-lg-72 mb-42 mb-lg-0 text-center">
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
              <a class="btn btn-white btn-center" href="<?php echo $cta_url; ?>" target="<?php echo $cta_target;?>" title="<?php echo $cta_text; ?>">
                <?php echo $cta_text; ?>
              </a>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>