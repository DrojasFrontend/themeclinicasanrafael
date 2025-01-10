<?php 
$sitename         = get_bloginfo('name');
$group_card_icons = get_field('grupo_tarjetas_iconos');
$titulo           = !empty($group_card_icons['titulo']) ? esc_html($group_card_icons['titulo']) : '';
$items            = !empty($group_card_icons['tarjetas']) ? $group_card_icons['tarjetas'] : [];
?>
<section class="seccionTarjetaIcono pt-lg-72 pt-60 pb-lg-90 bg-white">
  <div class="container">
    <?php get_template_part('template-parts/componentes/componente', 'titulo-h2', array(
      'titulo' => $titulo,
      'clase' => 'text-center mb-60',
    ))?>

    <div class="row">
      <?php foreach ($items as $key => $item) { 
        $icono        = !empty($item['icono']) ? $item['icono'] : '';
        $titulo       = !empty($item['titulo']) ? esc_html($item['titulo']) : '';
        $cta          = !empty($item['cta']) ? $item['cta'] : '';
        $cta_titulo   = !empty($cta['title']) ? esc_html($cta['title']) : '';
        $cta_url      = !empty($cta['url']) ? esc_url($cta['url']) : '';
        $cta_target   = !empty($cta['target']) ? $cta['target'] : '';
      ?>
        <div class="col-xl-3 col-md-6 mb-36">
          <a class="d-block px-xl-24 px-18 pt-xl-42 pb-xl-38 pt-30 pb-30 border rounded hover-tarjeta" href="<?php echo $cta_url; ?>" target="<?php echo $cta_target; ?>">
            <div class="d-flex flex-lg-column flex-row gap-lg-8 gap-18">
              <span>
                <img src="<?php echo $icono; ?>" alt="<?php echo $cta_titulo; ?>" title="<?php echo $cta_titulo . ' - ' . $sitename; ?>">
              </span>
              <div>
                <?php get_template_part('template-parts/componentes/componente', 'titulo-h4', array(
                  'titulo' => $titulo,
                  'clase' => 'text-start mb-6',
                ))?>
                <p class="p">
                  <?php echo $cta_titulo; ?>
                </p>
              </div>
            </div>
          </a>
        </div>
      <?php } ?>
    </div>
  </div>
</section>