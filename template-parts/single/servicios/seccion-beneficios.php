<?php 
$sitename          = get_bloginfo('name');
$grupo_beneficios  = get_field('grupo_beneficios');
$posicion          = !empty($grupo_beneficios['posicion']) ? esc_html($grupo_beneficios['posicion']) : '';
$titulo            = !empty($grupo_beneficios['titulo']) ? $grupo_beneficios['titulo'] : '';
$beneficios        = !empty($grupo_beneficios['beneficio']) ? $grupo_beneficios['beneficio'] : [];
?>


<section class="pt-lg-72 pb-lg-30 pt-42 pb-6 bg-white" style="order: <?php echo $posicion; ?>">
  <div class="container">
    <div>
      <?php get_template_part('template-parts/componentes/componente', 'titulo-h2', array(
        'titulo' => $titulo,
        'clase' => 'mb-42 text-secondary text-lg-center',
      ))?>
    </div>
    <div class="px-lg-100">
      <div class="row justify-center">
        <?php 
          $indx = 0;
          foreach ($beneficios as $key => $beneficio) { 
          $key++;
          $descripcion = !empty($beneficio['descripcion']) ? $beneficio['descripcion'] : '';
        ?>
          <div class="col-lg-4">
            <div class="pe-lg-30 mb-lg-42 mb-36">
              <p class="p text-secondary">
                <span class="d-block font-gilda h3 text-primary-150 mb-6"><?php echo $key; ?>.</span>
                <?php echo $descripcion; ?>
              </p>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</section>