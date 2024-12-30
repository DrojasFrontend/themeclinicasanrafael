<?php 
$sitename                   = get_bloginfo('name');
$grupo_hero_texto_desc_img  = get_field('grupo_hero_texto_desc_img');
$posicion                   = !empty($grupo_hero_texto_desc_img['posicion']) ? esc_html($grupo_hero_texto_desc_img['posicion']) : '';
$fondo                      = !empty($grupo_hero_texto_desc_img['fondo']) ? esc_html($grupo_hero_texto_desc_img['fondo']) : '';
$titulo                     = !empty($grupo_hero_texto_desc_img['titulo']) ? esc_html($grupo_hero_texto_desc_img['titulo']) : '';
$descripcion                = !empty($grupo_hero_texto_desc_img['descripcion']) ? esc_html($grupo_hero_texto_desc_img['descripcion']) : '';
$imagen_id                  = !empty($grupo_hero_texto_desc_img['imagen']['ID']) ? intval($grupo_hero_texto_desc_img['imagen']['ID']) : '';

?>

<section class="seccionHeroTextoDescImagen py-lg-72 py-60 overflow-lg-hidden" style="order: <?php echo $posicion; ?>; background-image: url(<?php echo $fondo; ?>); background-repeat: no-repeat; background-size: cover">
  <div class="container">
    <div class="row flex-lg-row flex-column-reverse">
      <div class="col-lg-6 pt-lg-30">
        
        <?php get_template_part('template-parts/componentes/componente', 'titulo-h1', array(
          'titulo' => $titulo ?: get_the_title(),
          'clase' => 'mb-24',
        )); ?>

        <?php if ($descripcion) { ?>
        <p class="p">
          <?php echo $descripcion; ?>
        </p>
        <?php } ?>
      </div>
      <div class="col-lg-6">
        <div class="ps-lg-60">
          <?php echo generar_image_responsive($imagen_id, 'custom-size', $sitename, 'img-fluid rounded mb-lg-0 mb-24 shadow-tarjeta'); ?>
        </div>
      </div>
    </div>
  </div>
</section>