<?php
$sitename = get_bloginfo('name');

if (!empty($args['servicio'])) {
  $servicio = $args['servicio'];
  $servicio_id = !empty($servicio->ID) ? intval($servicio->ID) : '';
  $titulo = get_the_title($servicio_id);
  $link = get_permalink($servicio_id);
  $imagen_id = get_post_thumbnail_id($servicio_id);

  if ($servicio_id) : ?>
    <div class="swiper-slide">
      <div class="seccionServicios__tarjeta rounded overflow-hidden clickeable hover">
        <?php if ($imagen_id) : ?>
          <?php echo generar_image_responsive($imagen_id, 'custom-size', $sitename, 'img-fluid d-flex'); ?>
        <?php endif; ?>
        <div class="p-24 bg-white">
          <h3 class="h5 text-secondary-100 mb-12"><?php echo esc_html($titulo); ?></h3>
          <a href="<?php echo esc_url($link); ?>" class="font-sans p text-primary fw-bold d-flex align-center gap-6">
            <span class="hover-link">Conoce más</span>
            <i class="icono icono-flecha"></i>
          </a>
        </div>
      </div>
    </div>
  <?php endif;
}
?>