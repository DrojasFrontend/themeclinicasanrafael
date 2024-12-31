<?php
function display_sedes_tabs() {
    $categories = get_terms(array(
        'taxonomy' => 'categoria_sedes',
        'hide_empty' => false,
        'orderby' => 'name',
        'order' => 'DESC'
    ));

    if (empty($categories) || is_wp_error($categories)) {
        echo '<p>No se encontraron categorías de sedes.</p>';
        return;
    }
    $grupo_nuestras_sedes   = get_field('grupo_nuestras_sedes');
    $fondo                  = !empty($grupo_nuestras_sedes['fondo']) ? $grupo_nuestras_sedes['fondo'] : '';
    $subtitulo              = !empty($grupo_nuestras_sedes['subtitulo']) ? $grupo_nuestras_sedes['subtitulo'] : '';
    $titulo                 = !empty($grupo_nuestras_sedes['titulo']) ? $grupo_nuestras_sedes['titulo'] : '';
    ?>
    <div class="seccionTabsTarjetas bg-primary-1 pt-lg-72 pt-60 overflow-x-auto overflow-y-hidden">
        <div class="container px-0">

        <div class="pb-60 text-center">
            <?php if ($subtitulo) { ?>
                <p class="subtitulo text-purple mb-12"><?php echo $subtitulo; ?></p>
            <?php } ?>
            
            <?php get_template_part('template-parts/componentes/componente', 'titulo-h2', array(
                'titulo' => $titulo,
                'clase' => '',
            ))?>
        </div>

            <ul class="tab-link d-flex justify-lg-center gap-2 ps-24 ps-lg-0" id="sedesTabs" role="tablist">
                <?php 
                $first = true;
                foreach ($categories as $category) {
                    $slug = $category->slug;
                ?>
                    <li class="" role="presentation">
                        <button class="p text-primary fw-bold py-16 px-30 bg-white border-0 rounded-tr-18 <?php echo $first ? 'active' : ''; ?>" 
                                id="<?php echo esc_attr($slug); ?>-tab" 
                                data-bs-toggle="tab" 
                                data-bs-target="#<?php echo esc_attr($slug); ?>" 
                                type="button" 
                                role="tab" 
                                aria-controls="<?php echo esc_attr($slug); ?>" 
                                aria-selected="<?php echo $first ? 'true' : 'false'; ?>">
                            <?php echo esc_html($category->name); ?>
                        </button>
                    </li>
                <?php 
                    $first = false;
                } 
                ?>
            </ul>
        </div>
    </div>

    <div class="tab-content py-lg-72 pt-60" id="sedesTabsContent" style="background: url(<?php echo $fondo; ?>); background-size: cover;">
        <?php
        $first = true;
        foreach ($categories as $category) {
            $slug = $category->slug;
            
            $args = array(
                'post_type' => 'sedes',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'categoria_sedes',
                        'field' => 'term_id',
                        'terms' => $category->term_id,
                    ),
                ),
                'posts_per_page' => -1,
            );
            
            $query = new WP_Query($args);
            ?>
            <div class="tab-pane fade <?php echo $first ? 'show active' : ''; ?>" 
                 id="<?php echo esc_attr($slug); ?>" 
                 role="tabpanel" 
                 aria-labelledby="<?php echo esc_attr($slug); ?>-tab">
                <?php
                if ($query->have_posts()) {
                    ?>
                    <div class="container px-0 px-lg-18">
                        <div class="swiper tarjetaTextoSwiper overflow-lg-inherit">
                            <div class="swiper-wrapper d-lg-grid grid-cols-lg-3 gap-lg-36">
                                <?php
                                while ($query->have_posts()) {
                                    $query->the_post();
                                    ?>
                                    <div class="swiper-slide w-lg-100 rounded bg-white shadow-lg-tarjeta overflow-hidden">
                                        <div class="h-100 clickeable hover">
                                            <?php if (has_post_thumbnail()): ?>
                                                <div class="seccionTabsTarjetas__img">
                                                    <?php the_post_thumbnail('large', array('class' => 'img-fluid d-flex')); ?>
                                                </div>
                                            <?php endif; ?>
                                            <div class="p-24">
                                                <h3 class="h4 text-purple mb-12"><?php the_title(); ?></h3>
                                                <a href="<?php the_permalink(); ?>" class="font-sans p text-primary fw-bold d-flex align-center gap-6">
                                                    <span class="hover-link">Conoce más</span>
                                                    <i class="icono icono-flecha"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="d-lg-none pb-lg-30 position-relative z-1">
                        <div class="container">
                            <div class="d-flex justify-center justify-lg-start gap-24 pt-lg-0 pt-24 pb-lg-0 pb-60 translate-y--80">
                                <div class="swiper-fraction-tar swiper-fraction-blanco d-flex font-sans"></div>
                                <div class="custom-pagination swiper-pagination-tar swiper-pagination-blanco"></div>
                            </div>
                        </div>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="container">
                        <p class="h5 text-center">No hay sedes disponibles en esta categoría.</p>
                    </div>
                    <?php
                }
                wp_reset_postdata();
                ?>
            </div>
            <?php
            $first = false;
        }
        ?>
    </div>
    <?php
}

display_sedes_tabs();
