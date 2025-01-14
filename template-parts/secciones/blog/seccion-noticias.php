<?php 
$sitename           = get_bloginfo('name');
$grupo_recomendado  = get_field('grupo_recomendado');
$titulo             = !empty($grupo_recomendado['titulo']) ? esc_html($grupo_recomendado['titulo']) : '';
$cta                = !empty($grupo_recomendado['cta']) ? $grupo_recomendado['cta'] : [];
$cta_text           = !empty($cta['title']) ? esc_html($cta['title']) : '';
$cta_url            = !empty($cta['url']) ? esc_url($cta['url']) : '';
$cta_target         = !empty($cta['target']) ? esc_attr($cta['target']) : '';
?>

<section class="seccionNoticias position-relative overflow-hidden pt-lg-72 pt-42 px-lg-60 bg-white-100">
    <div class="container px-md-24 pe-0">
        <div class="d-flex justify-between align-end gap-lg-8 mb-lg-60 mb-30">
            <div>
                <?php get_template_part('template-parts/componentes/componente', 'titulo-h2', array(
                    'titulo' => $titulo,
                    'clase' => 'text-lg-start text-center',
                ))?>
            </div>
            <div class="d-lg-block d-none">
                <?php if($cta_text) { ?>
                    <a class="font-sans p text-primary fw-bold d-flex align-center gap-6 hover" href="<?php echo $cta_url; ?>" target="<?php echo $cta_target;?>" title="<?php echo $cta_text; ?>">
                        <span class="hover-link"><?php echo $cta_text; ?></span>
                        <i class="icono icono-flecha"></i>
                    </a>
                <?php } ?>
            </div>
        </div>
        <div class="position-relative">
            <div class="swiper noticiasSwiper">
                <div class="swiper-wrapper">
                    <?php
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => -1,
                        'post_status' => 'publish'
                    );
                    
                    $noticias = new WP_Query($args);
                    
                    if($noticias->have_posts()):
                        while($noticias->have_posts()): $noticias->the_post();
                        ?>
                        <div class="swiper-slide">
                            <div class="seccionNoticias__tarjeta clickeable hover">
                                <?php if(has_post_thumbnail()): ?>
                                    <div class="d-flex">
                                        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" class="w-100 rounded overflow-hidden" alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>">
                                    </div>
                                <?php endif; ?>
                                
                                <div class="py-24">
                                    <h3 class="h5 text-secondary-100 mb-12"><?php the_title(); ?></h3>
                                    <p class="p text-secondary mb-12">
                                        <?php echo wp_trim_words(get_the_excerpt(), 25, '...'); ?>
                                    </p>
                                    <p class="fs-p-small text-gray mb-lg-50 mb-50">
                                        <?php $fecha = date_i18n('j \d\e F', strtotime(get_the_date())); echo $fecha; ?> | 6 minutos de lectura
                                    </p>
                                    <a href="<?php the_permalink(); ?>" class="font-sans p text-primary fw-bold d-flex align-center gap-6">
                                        <span class="hover-link">Seguir leyendo</span>
                                        <i class="icono icono-flecha"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
                <div class="d-flex justify-center gap-24 pt-lg-30 pt-30">
                    <div class="swiper-fraction swiper-fraction-not d-flex"></div>
                    <div class="custom-pagination swiper-pagination-not"></div>
                </div>
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
</section>