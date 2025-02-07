<?php 

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?=get_the_title()?></title>

  <!-- meta tag header includes -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Taylor Callsen" />
  <meta name="description" content="<?=get_the_excerpt()?>" /> 
  <meta name="keywords" content="<?=$metaTags?>">
  <link rel="canonical" href="<?=wp_get_canonical_url()?>">
  <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon.ico" />
  <meta name="robots" content="index, follow">

  <!-- compatability header includes -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  

   <!-- SEO METADATOS -->
   <?php 
     $titulo_principal = get_field('titulo_principal') ?: '';
     $seo_titulo      = get_field('seo_titulo') ?: '';
     $seo_keywords    = get_field('seo_keywords') ?: '';
     $seo_description = get_field('seo_description') ?: '';
     $seo_author      = get_field('seo_author') ?: '';
     $seo_publisher   = get_field('seo_publisher') ?: '';
     $seo_opengraph   = get_field('seo_opengraph');
     
     if (is_array($seo_opengraph)) {
        $image       = isset($seo_opengraph['image']) ? $seo_opengraph['image'] : '';
        $titulo      = isset($seo_opengraph['titulo']) ? $seo_opengraph['titulo'] : '';
        $description = isset($seo_opengraph['description']) ? $seo_opengraph['description'] : '';
        $url         = isset($seo_opengraph['url']) ? $seo_opengraph['url'] : '';
        $site_name   = isset($seo_opengraph['site_name']) ? $seo_opengraph['site_name'] : '';
     } else {
        $image = $titulo = $description = $url = $site_name = '';
     }
     
     $canonical = get_field('canonical') ?: '';
      
    ?>    
    
	<title><?php echo $titulo_principal; ?></title>
    <meta name="title" content="<?php echo esc_attr($seo_titulo); ?>" />
    <meta name="keywords" content="<?php echo esc_attr($seo_keywords); ?>" />
    <meta name="description" content="<?php echo esc_attr($seo_description); ?>" />
    <meta name="author" content="<?php echo esc_attr($seo_author); ?>" />

    <meta name="robots" content="index,follow" />
    <meta property="og:locale" content="es_CO" />
    <meta property="og:type" content="object" />
    <?php if (!empty($image)): ?>
    <meta property="og:image" content="<?php echo esc_url($image); ?>" />
    <?php endif; ?>
    <?php if (!empty($titulo)): ?>
    <meta property="og:title" content="<?php echo esc_attr($titulo); ?>" />
    <?php endif; ?>
    <?php if (!empty($description)): ?>
    <meta property="og:description" content="<?php echo esc_attr($description); ?>" />
    <?php endif; ?>
    <?php if (!empty($url)): ?>
    <meta property="og:url" content="<?php echo $url; ?>" />
    <?php endif; ?>
    <?php if (!empty($site_name)): ?>
    <meta property="og:site_name" content="<?php echo esc_attr($site_name); ?>" />
    <?php endif; ?>
    <?php if (!empty($canonical)): ?>
    <link rel="canonical" href="<?php echo esc_url($canonical); ?>" />
    <?php endif; ?>

  <link href="https://fonts.googleapis.com/css2?family=Gilda+Display&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+3:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">

  <!-- wordpress header includes -->
  <?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>

  <!-- Header Top -->
  <?php get_template_part('template-parts/layout/header/content', 'header-top') ?>
  <!-- Fin Header Top -->

  <header class="header position-sticky top-0 left-0 w-100 d-flex align-center z-10 bg-white-300">
    <?php get_template_part('template-parts/layout/header/content', 'header') ?>
  </header>

  <!-- Menu Mobile -->
  <section class="menu-sidebar position-fixed top-84 w-100 h-100 z-10 bg-white-300">
    <?php get_template_part('template-parts/layout/header/content', 'nav-mobile') ?>
  </section>
  <!-- Fin Menu Mobile -->

  <!-- Whatsapp -->
  <?php mostrar_boton_whatsapp(); ?>
  <!-- Fin Whatsapp -->