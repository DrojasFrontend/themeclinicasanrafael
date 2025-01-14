<?php 
    $sitename         = get_bloginfo('name');
    $contentGlobal    = get_page_by_path('contenido-heade-footer')->ID;
    $grupo_footer     = ($contentGlobal) ? get_field('grupo_footer', $contentGlobal) : null;
    $logo_secundario  = !empty($grupo_footer['logo_secundario']) ? $grupo_footer['logo_secundario'] : '';
    $texto            = !empty($grupo_footer['texto']) ? $grupo_footer['texto'] : '';
    ?>
<div class="col-lg-2 mb-lg-0 mb-12 text-lg-start text-center">
    <?php if($texto) { ?>
        <p class="p-small text-white ps-lg-24"><?php echo $texto; ?></p>
    <?php } ?>
    <img class="w-auto" src="<?php echo $logo_secundario; ?>" alt="logo lenus - <?php echo $sitename; ?>" title="logo lenus">
</div>