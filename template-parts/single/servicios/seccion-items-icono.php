<?php 
$sitename     = get_bloginfo('name');
$grupo_items  = get_field('grupo_items');
$posicion     = !empty($grupo_items['posicion']) ? esc_html($grupo_items['posicion']) : '';
$titulo       = !empty($grupo_items['titulo']) ? $grupo_items['titulo'] : '';
$items        = !empty($grupo_items['items']) ? $grupo_items['items'] : [];
?>

<section class="pt-lg-72 pb-lg-30 pt-42 pb-6 bg-white" style="order: <?php echo $posicion; ?>">
  <div class="container">
    <div>
      <?php get_template_part('template-parts/componentes/componente', 'titulo-h2', array(
        'titulo' => $titulo,
        'clase' => 'mb-42 text-secondary text-lg-center',
      ))?>
    </div>
    <div class="row justify-center">
      <?php 
        $indx = 0;
        foreach ($items as $key => $item) { 
        $key++;
        $detalle = !empty($item['detalle']) ? $item['detalle'] : '';
      ?>
        <div class="col-xl-3 col-lg-6">
          <div class="pe-lg-30 mb-lg-42 mb-36">
            <p class="d-flex flex-row gap-6 p text-secondary">
              <i class="icono icono-check"></i>
              <?php echo $detalle; ?>
            </p>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</section>