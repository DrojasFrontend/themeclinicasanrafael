<?php 
$sitename                   = get_bloginfo('name');
$grupo_servicios_destacados = get_field('grupo_servicios_destacados');
$fondo                      = !empty($grupo_servicios_destacados['fondo']) ? esc_html($grupo_servicios_destacados['fondo']) : '';
$titulo                     = !empty($grupo_servicios_destacados['titulo']) ? esc_html($grupo_servicios_destacados['titulo']) : '';
$cta                        = !empty($grupo_servicios_destacados['cta']) ? $grupo_servicios_destacados['cta'] : [];
$cta_text                   = !empty($cta['title']) ? esc_html($cta['title']) : '';
$cta_url                    = !empty($cta['url']) ? esc_url($cta['url']) : '';
$cta_target                 = !empty($cta['target']) ? esc_attr($cta['target']) : '';
$servicios                  = !empty($grupo_servicios_destacados['servicios']) ? $grupo_servicios_destacados['servicios'] : [];
?>

<section class="py-lg-72 py-60 px-lg-60 overflow-hidden" <?php echo (isset($fondo) && !empty($fondo)) ? 'style="background-color: ' . $fondo . '"' : ''; ?>>
  <div class="container">
    <div class="d-lg-flex justify-lg-between mb-lg-42 mb-30">
      <?php get_template_part('template-parts/componentes/componente', 'titulo-h2', array(
        'titulo' => $titulo,
        'clase' => 'text-center text-lg-left',
      ))?>
  
      <?php if($cta_text) { ?>
        <div class="d-none d-lg-block">
          <a class="font-sans p text-primary fw-bold d-flex align-center gap-6 hover" href="<?php echo $cta_url; ?>" target="<?php echo $cta_target;?>" title="<?php echo $cta_text; ?>">
            <span class="hover-link"><?php echo $cta_text; ?></span>
            <i class="icono icono-flecha"></i>
          </a>
        </div>
      <?php } ?>
    </div>
  </div>

  <div class="container pe-0 pe-lg-18">
    <div class="position-relative">
      <div class="swiper serviciosDestacadosSwiper">
        <div class="swiper-wrapper">
          <?php if ($servicios) :
            foreach ($servicios as $servicio) {
              get_template_part('template-parts/componentes/componente', 'tarjeta-img-titulo', ['servicio' => $servicio]);
            }
            endif;
          ?>
        </div>
        <div class="d-flex justify-center gap-24 pt-lg-60 pt-30">
          <div class="swiper-fraction swiper-fraction-ser d-flex"></div>
          <div class="custom-pagination swiper-pagination-ser"></div>
        </div>
      </div>
      <div class="swiper-button-prev swiper-button-blanco"></div>
      <div class="swiper-button-next swiper-button-blanco"></div>
    </div>
  </div>
</section>