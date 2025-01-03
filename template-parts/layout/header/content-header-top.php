<?php 
$contentGlobal    = get_page_by_path('contenido-heade-footer')->ID;
$grupo_header_top = ($contentGlobal) ? get_field('grupo_header_top', $contentGlobal) : null;
$items            = !empty($grupo_header_top['enlaces']) ? $grupo_header_top['enlaces'] : [];

$grupo_header     = ($contentGlobal) ? get_field('grupo_header', $contentGlobal) : null;
$redes            = !empty($grupo_header['redes']) ? $grupo_header['redes'] : [];
?>
<div class="header__top d-none d-lg-block bg-purple py-10">
  <div class="header__top-container">
    <div class="row">
      <div class="col-lg-9">
        <div class="d-flex gap-30">
          <?php foreach ($items as $key => $item) { 
            $cta = !empty($item['cta']) ? $item['cta'] : '';
          ?>
            <?php echo $cta; ?>
          <?php }?>
        </div>
      </div>
      <div class="col-lg-3 d-flex justify-end gap-24">
        <?php foreach ($redes as $key => $red) { 
          $red_icono = !empty($red['icono']) ? esc_url($red['icono']) : '';
          $red_text = !empty($red['cta']['title']) ? esc_html($red['cta']['title']) : '';
          ?>
          <a href="<?php echo $red_text; ?>" target="_blank" title="<?php echo $red_text; ?>">
            <span class="sr-only"><?php echo $red_text; ?></span>
            <img src="<?php echo $red_icono; ?>" alt="">
          </a>
        <?php } ?>
      </div>
    </div>
  </div>
</div>