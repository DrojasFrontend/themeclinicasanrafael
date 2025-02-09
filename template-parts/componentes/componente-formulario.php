<?php 
$sitename         = get_bloginfo('name');
$grupo_formulario = get_field('grupo_formulario');
$imagen_id        = !empty($grupo_formulario['imagen']['ID']) ? intval($grupo_formulario['imagen']['ID']) : '';
$id_formulario    = !empty($grupo_formulario['id_formulario']) ? $grupo_formulario['id_formulario'] : '';
?>
<section class="pt-36">
  <div class="container">
    <div class="d-flex flex-column-reverse flex-lg-row">
      <div class="col-lg-6">
        <?php echo do_shortcode('[contact-form-7 id="' . $id_formulario . '"]'); ?>
      </div>
      <div class="col-lg-6">
        <div class="mt-lg-n120 mt-n90 ps-lg-72">
          <?php echo generar_image_responsive($imagen_id, 'custom-size', $sitename, 'img-fluid mb-lg-0 mb-24 rounded'); ?>
        </div>
      </div>
    </div>
  </div>
</section>