<?php 
$sitename              = get_bloginfo('name');
$grupo_texto_cta_items = get_field('grupo_texto_cta_items');
$subtitulo             = !empty($grupo_texto_cta_items['subtitulo']) ? esc_html($grupo_texto_cta_items['subtitulo']) : '';
$titulo                = !empty($grupo_texto_cta_items['titulo']) ? $grupo_texto_cta_items['titulo'] : '';
$descripcion           = !empty($grupo_texto_cta_items['descripcion']) ? esc_html($grupo_texto_cta_items['descripcion']) : '';
$texto_adicional       = !empty($grupo_texto_cta_items['texto_adicional']) ? $grupo_texto_cta_items['texto_adicional'] : '';
$cta                   = !empty($grupo_texto_cta_items['cta']) ? $grupo_texto_cta_items['cta'] : [];
$cta_text              = !empty($cta['title']) ? esc_html($cta['title']) : '';
$cta_url               = !empty($cta['url']) ? esc_url($cta['url']) : '';
$cta_target            = !empty($cta['target']) ? esc_attr($cta['target']) : '';
?>

<section class="seccionTextoCTAItems">
  <div class="pt-lg-72 pt-60 pb-lg-0 pb-60 mb-lg-72">
    <div class="container">
      <div class="row flex-lg-row flex-column-reverse">
        <div class="col-lg-6">
          <div class="">
            <?php if ($subtitulo) { ?>
              <p class="subtitulo text-purple mb-12"><?php echo $subtitulo; ?></p>
            <?php } ?>
            
            <?php get_template_part('template-parts/componentes/componente', 'titulo-h2', array(
              'titulo' => $titulo,
              'clase' => 'mb-lg-24 mb-18 text-secondary',
            ))?>

            <span class="linea linea--normal linea--negra my-lg-24 my-12"></span>
  
            <?php if ($descripcion) { ?>
              <p class="p mb-lg-42 mb-30 text-secondary">
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
        <div class="col-lg-6 pe-lg-150">
          <div class="">
            <?php if ($texto_adicional) { ?>
              <div class="p text-secondary texto-adicional">
                <?php echo $texto_adicional; ?>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>