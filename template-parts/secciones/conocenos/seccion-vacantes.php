<?php 
$sitename        = get_bloginfo('name');
$grupo_vacantes  = get_field('grupo_vacantes');
$subtitulo       = !empty($grupo_vacantes['subtitulo']) ? esc_html($grupo_vacantes['subtitulo']) : '';
$titulo          = !empty($grupo_vacantes['titulo']) ? esc_html($grupo_vacantes['titulo']) : '';
$cta             = !empty($grupo_vacantes['cta']) ? $grupo_vacantes['cta'] : [];
$cta_text        = !empty($cta['title']) ? esc_html($cta['title']) : '';
$cta_url         = !empty($cta['url']) ? esc_url($cta['url']) : '';
$cta_target      = !empty($cta['target']) ? esc_attr($cta['target']) : '';
?>

<section class="seccionVacantes position-relative overflow-hidden pt-lg-72 pt-42 px-lg-60">
    <div class="container px-md-24 pe-0">
        <div class="text-center mb-lg-60 mb-30">
            <?php get_template_part('template-parts/componentes/componente', 'titulo-h2', array(
                'titulo' => $titulo,
                'clase' => '',
            ))?>

            <?php if ($subtitulo) { ?>
                <p class="p text-secondary mb-12"><?php echo $subtitulo; ?></p>
            <?php } ?>
        </div>
        <div class="position-relative">
            <div class="swiper vacantesSwiper">
                <div class="swiper-wrapper">
                    <?php
                    $args = array(
                        'post_type' => 'vacantes',
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
                                
                                <div class="pt-24">
                                    <h3 class="h5 text-secondary-100 mb-12"><?php the_title(); ?></h3>
                                    <p class="p fw-bold text-secondary mb-12">Requisitos</p>
                                    <p class="p text-secondary mb-42">
                                        <?php echo wp_trim_words(get_the_excerpt(), 50, '[...]'); ?>
                                    </p>

                                    <a href="<?php the_permalink(); ?>" class="font-sans p text-primary fw-bold d-flex align-center gap-6">
                                        <span class="hover-link">Aplicar a vacante</span>
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
                <div class="d-flex justify-center gap-24 pt-lg-60 pt-30">
                    <div class="swiper-fraction swiper-fraction-vac d-flex"></div>
                    <div class="custom-pagination swiper-pagination-vac"></div>
                </div>
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
</section>