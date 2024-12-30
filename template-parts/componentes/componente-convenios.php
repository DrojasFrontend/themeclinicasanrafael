<?php 
$sitename        = get_bloginfo('name');
$grupo_convenios = get_field('grupo_convenios');
$titulo          = !empty($grupo_convenios['titulo']) ? esc_html($grupo_convenios['titulo']) : '';
$images          = !empty($grupo_convenios['galeria']) ? $grupo_convenios['galeria'] : [];
?>
<section class="pt-lg-72 pt-60">
  <div class="container">
    <div>
      <?php get_template_part('template-parts/componentes/componente', 'titulo-h2', array(
        'titulo' => $titulo,
        'clase' => 'mb-lg-52 mb-42',
      ))?>
    </div>
    <?php 
      if( $images ): ?>
        <ul class="d-grid grid-cols-lg-4 grid-cols-md-3 grid-cols-1 gap-lg-36 gap-md-24 gap-18">
          <?php foreach( $images as $image ): ?>
            <li class="d-flex justify-center align-center bg-white rounded-6 shadow-thumbnails overflow-hidden">
              <img class="d-flex img-fluid" src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
            </li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
  </div>
</section>