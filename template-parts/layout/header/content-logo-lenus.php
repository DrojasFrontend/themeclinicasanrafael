<?php 
$logo_imagen = get_theme_mod('logo_secundario_imagen');
$logo_link = get_theme_mod('logo_secundario_link');

if ($logo_imagen) : ?>
    <a href="<?php echo esc_url($logo_link); ?>" class="logo-lenus d-flex align-center" target="_blank">
        <img src="<?php echo esc_url($logo_imagen); ?>" alt="Logo Secundario">
    </a>
<?php endif; ?>