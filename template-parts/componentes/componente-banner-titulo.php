<?php 
$titulo = !empty($args['titulo']) ? esc_html($args['titulo']) : '';
$bg     = !empty($args['bg']) ? $args['bg'] : 'bg-purple ';
$color  = !empty($args['color']) ? $args['color'] : 'text-white ';
?>

<section class="<?php echo $bg; ?> text-white text-lg-center text-start py-lg-120 py-60">
  <div class="container">
    <?php get_template_part('template-parts/componentes/componente', 'titulo-h1', array(
      'titulo' => $titulo,
      'clase' => $color,
    ))?>
  </div>
</section>