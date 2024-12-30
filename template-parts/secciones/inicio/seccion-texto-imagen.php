<?php 
$sitename           = get_bloginfo('name');
$grupo_texto_imagen = get_field('grupo_texto_imagen');
$subtitulo          = !empty($grupo_texto_imagen['subtitulo']) ? esc_html($grupo_texto_imagen['subtitulo']) : '';
$titulo             = !empty($grupo_texto_imagen['titulo']) ? esc_html($grupo_texto_imagen['titulo']) : '';
$descripcion        = !empty($grupo_texto_imagen['descripcion']) ? esc_html($grupo_texto_imagen['descripcion']) : '';
$imagen_id          = !empty($grupo_texto_imagen['imagen']['ID']) ? intval($grupo_texto_imagen['imagen']['ID']) : '';

?>
<section class="seccionTextoImagen pt-lg-72 pt-60 overflow-lg-hidden">
  <div class="container">
    <div class="row flex-lg-row flex-column-reverse">
      <div class="col-lg-5 pt-lg-72 pt-0 mb-lg-0 mb-42">

        <?php if ($subtitulo) { ?>
          <p class="subtitulo text-purple mb-12"><?php echo $subtitulo; ?></p>
        <?php } ?>
        
        <?php get_template_part('template-parts/componentes/componente', 'titulo-h2', array(
          'titulo' => $titulo,
          'clase' => 'mb-24',
        ))?>

        <?php if ($descripcion) { ?>
        <p class="p">
          <?php echo $descripcion; ?>
        </p>
        <?php } ?>
      </div>
      <div class="col-lg-7">
        <?php echo generar_image_responsive($imagen_id, 'custom-size', $sitename, 'd-flex img-fluid mb-lg-0 mb-24'); ?>
      </div>
    </div>
  </div>
</section>