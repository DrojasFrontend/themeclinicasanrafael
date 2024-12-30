<?php 
$sitename                 = get_bloginfo('name');
$grupo_textos_enumerados  = get_field('grupo_textos_enumerados');
$subtitulo                = !empty($grupo_textos_enumerados['subtitulo']) ? esc_html($grupo_textos_enumerados['subtitulo']) : '';
$titulo                   = !empty($grupo_textos_enumerados['titulo']) ? esc_html($grupo_textos_enumerados['titulo']) : '';
$textos                   = !empty($grupo_textos_enumerados['textos']) ? $grupo_textos_enumerados['textos'] : [];

?>

<section class="py-lg-72 pb-60 px-lg-60">
  <div class="container">
    <div class="text-center mb-lg-72 mb-42">
      <?php if ($subtitulo) { ?>
        <p class="subtitulo text-purple mb-12"><?php echo $subtitulo; ?></p>
      <?php } ?>
      
      <?php get_template_part('template-parts/componentes/componente', 'titulo-h2', array(
        'titulo' => $titulo,
        'clase' => '',
      ))?>
    </div>
    <div class="d-grid grid-cols-lg-3 grid-cols-md-2 grid-cols-1 gap-lg-36 gap-md-24 gap-36">
      <?php 
      foreach ($textos as $key => $texto) { 
        $key++;
        $texto = !empty($texto['texto']) ? $texto['texto'] : '';
      ?>
        <p class="p text-secondary">
          <span class="font-gilda d-block h3 mb-12"><?php echo $key; ?>.</span>
          <?php echo $texto; ?>
        </p>
      <?php } ?>
    </div>
  </div>
</section>