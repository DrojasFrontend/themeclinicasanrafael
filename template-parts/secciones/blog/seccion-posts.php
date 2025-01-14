<?php 
$grupo_noticias  = get_field('grupo_noticias');
$titulo          = !empty($grupo_noticias['titulo']) ? esc_html($grupo_noticias['titulo']) : '';
?>
<div class="bg-white-100 pt-lg-36 pt-42">
    <div class="container">
        <div class="row">
            <?php 
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 4
            );
            
            $query = new WP_Query($args);
            $first_post = true;
            
            if($query->have_posts()) : ?>
                <!-- Post Principal -->
                <div class="col-lg-7">
                    <?php $query->the_post(); ?>
                    <article class="clickeable hover">
                        <?php if(has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('full', array(
                                'class' => 'img-fluid rounded shadow-tarjeta',
                                'alt' => get_the_title()
                            ));?>
                        <?php endif; ?>
                        <div class="pt-24 pb-lg-0 pb-42 px-lg-36 px-6">
                            <h2 class="h4 mb-6"><?php the_title(); ?></h2>
                            <div class="p mb-24">
                                <?php the_excerpt(); ?>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="font-sans p text-primary fw-bold d-flex align-center gap-6">
                                <span class="hover-link">Seguir leyendo</span>
                                <i class="icono icono-flecha"></i>
                            </a>
                        </div>
                    </article>
                </div>

                <!-- Posts Secundarios -->
                <div class="col-lg-5">
                    <?php if($titulo) { ?>
                        <h2 class="h3 mb-lg-52 mb-30"><?php echo $titulo; ?></h2>
                    <?php } ?>
                    
                    <?php while($query->have_posts()) : $query->the_post(); ?>
                        <article class="row mb-18 clickeable">
                            <div class="col-lg-7 col-6">
                                <a href="<?php the_permalink(); ?>">
                                    <h3 class="p mb-18"><?php the_title(); ?></h3>
                                </a>
                                <span class="d-block font-sans p-small text-gray-50"><?php echo ucwords(get_the_date('j F Y')); ?></span>
                            </div>
                            <div class="col-lg-5 col-6">
                                <?php if(has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('full', array(
                                        'class' => 'img-fluid rounded shadow-tarjeta',
                                        'alt' => get_the_title()
                                    ));?>
                                <?php endif; ?>
                            </div>
                           
                        </article>
                    <?php endwhile; ?>
                </div>
                <?php 
                wp_reset_postdata();
            endif; ?>
        </div>
    </div>
</div>