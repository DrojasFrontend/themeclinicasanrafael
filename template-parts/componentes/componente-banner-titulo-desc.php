<?php 
$titulo       = !empty($args['titulo']) ? esc_html($args['titulo']) : '';
$bg           = !empty($args['bg']) ? $args['bg'] : 'bg-purple ';
$color        = !empty($args['color']) ? $args['color'] : 'text-white ';
$subtitulo    = !empty($args['subtitulo']) ? $args['subtitulo'] : '';
$descripcion  = !empty($args['descripcion']) ? $args['descripcion'] : '';
?>

<section class="<?php echo $bg; ?> text-white py-lg-80 pt-60 pb-80">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">

        <?php if($subtitulo) { ?>
          <p class="subtitulo mb-12 <?php echo $color; ?>">
            <?php echo $subtitulo; ?>
          </p>
        <?php } ?>

        <?php get_template_part('template-parts/componentes/componente', 'titulo-h1', array(
          'titulo' => $titulo,
          'clase' => $color,
        ))?>
      </div>
      <?php if($descripcion) { ?>
        <div class="col-md-5">
          <p><?php echo $descripcion; ?></p>
        </div>
      <?php } ?>
    </div>
  </div>
</section>