<?php 
$sitename        = get_bloginfo('name');
$grupo_servicios = get_field('grupo_servicios');
$subtitulo       = !empty($grupo_servicios['subtitulo']) ? esc_html($grupo_servicios['subtitulo']) : '';
$titulo          = !empty($grupo_servicios['titulo']) ? esc_html($grupo_servicios['titulo']) : '';
$cta             = !empty($grupo_servicios['cta']) ? $grupo_servicios['cta'] : [];
$cta_text        = !empty($cta['title']) ? esc_html($cta['title']) : '';
$cta_url         = !empty($cta['url']) ? esc_url($cta['url']) : '';
$cta_target      = !empty($cta['target']) ? esc_attr($cta['target']) : '';
?>

<section class="seccionServicios position-relative overflow-hidden pt-lg-72 pt-42 px-lg-60">
    <div class="container position-relative">
        <div class="d-flex justify-lg-between justify-center align-end gap-lg-8 mb-lg-72 mb-30">
            <div>
                <?php if ($subtitulo) { ?>
                    <p class="subtitulo text-purple mb-12 text-lg-start text-center"><?php echo $subtitulo; ?></p>
                <?php } ?>
                
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
        <div class="row">
            <div class="position-static">
                <div class="swiper serviciosSwiper extended-swiper ms-lg-n60 overflow-lg-inherit">
                    <div class="swiper-wrapper ps-lg-60 pb-lg-90">
                        <?php
                        $args = array(
                            'post_type' => 'servicios',
                            'posts_per_page' => -1,
                            'post_status' => 'publish'
                        );
                        
                        $servicios = new WP_Query($args);
                        
                        if($servicios->have_posts()):
                            while($servicios->have_posts()): $servicios->the_post();
                            ?>
                            <div class="swiper-slide">
                                <div class="seccionServicios__tarjeta rounded overflow-hidden clickeable hover hover-tarjeta">
                                    <?php if(has_post_thumbnail()): ?>
                                        <div class="d-flex">
                                            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" class="w-100" alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>">
                                        </div>
                                    <?php endif; ?>
                                    
                                    <div class="p-24 bg-white">
                                        <h3 class="h5 text-secondary-100 mb-12"><?php the_title(); ?></h3>
                                        <a href="<?php the_permalink(); ?>" class="font-sans p text-primary fw-bold d-flex align-center gap-6">
                                            <span class="hover-link">Conoce más</span>
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
                </div>
                <div class="swiper-button-azul swiper-button-prev-not"></div>
                <div class="swiper-button-azul swiper-button-next-not"></div>
                <div class="d-flex justify-center gap-24 pt-lg-0 pt-30">
                    <div class="swiper-fraction swiper-fraction-ser d-flex"></div>
                    <div class="custom-pagination swiper-pagination-ser"></div>
                </div>
            </div>
        </div>
        <div class="d-lg-none">
            <?php if($cta_text) { ?>
                <a class="font-sans p text-primary fw-bold d-flex justify-center gap-6 mt-30 hover" href="<?php echo $cta_url; ?>" target="<?php echo $cta_target;?>" title="<?php echo $cta_text; ?>">
                    <span class="hover-link"><?php echo $cta_text; ?></span>
                    <i class="icono icono-flecha"></i>
                </a>
            <?php } ?>
        </div>
    </div>
</section>