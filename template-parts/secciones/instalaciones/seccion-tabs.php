<?php
$grupo_sedes = get_field('grupo_sedes');
$pagina_subtitulo   = !empty($grupo_sedes['subtitulo']) ? esc_html($grupo_sedes['subtitulo']) : '';
$pagina_titulo      = !empty($grupo_sedes['titulo']) ? $grupo_sedes['titulo'] : '';
?>

<div class="seccionTabsTarjetas bg-purple-100 pt-lg-72 pt-60">
    <div class="container px-0">
        <div class="pb-lg-60 pb-30 text-center">
            <?php if ($pagina_subtitulo) { ?>
                <p class="subtitulo text-purple mb-12"><?php echo $pagina_subtitulo; ?></p>
            <?php } ?>
            
            <?php get_template_part('template-parts/componentes/componente', 'titulo-h2', array(
                'titulo' => $pagina_titulo,
                'clase' => '',
            ))?>
        </div>
    </div>
</div>

<?php function display_sedes_tabs() {
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
    ?>
    <div class="bg-purple-100">
        <div class="container px-0">
            <ul class="tab-link d-flex justify-lg-center gap-2 ps-18 ps-lg-0" id="sedesTabs" role="tablist">
                <?php 
                $first = true;
                foreach ($categories as $category) {
                    $slug = $category->slug;
                ?>
                    <li class="" role="presentation">
                        <button class="p text-primary fw-bold py-16 px-30 bg-white border-0 rounded-tr-18 tab-button <?php echo $first ? 'active' : ''; ?>" 
                                id="<?php echo esc_attr($slug); ?>-tab" 
                                data-bs-toggle="tab" 
                                data-bs-target="#<?php echo esc_attr($slug); ?>" 
                                type="button" 
                                role="tab"
                                data-tab="<?php echo esc_html($category->name); ?>"
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

    <div class="tab-content py-lg-72 pt-60 px-lg-60 bg-white-100" id="sedesTabsContent">
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
                    <div class="container">
                        <div class="position-relative">
                            <div class="swiper tabSedesSwiper">
                                <div class="swiper-wrapper">
                                    <?php
                                        while ($query->have_posts()) {
                                            $query->the_post();
                                            $grupo_contacto  = get_field('grupo_contacto', get_the_ID());
                                            $items           = !empty($grupo_contacto['items']) ? $grupo_contacto['items'] : [];
    
                                            $cta             = !empty($grupo_contacto['conocer_horarios']) ? $grupo_contacto['conocer_horarios'] : [];
                                            $cta_text        = !empty($cta['title']) ? esc_html($cta['title']) : '';
                                            $cta_url         = !empty($cta['url']) ? esc_url($cta['url']) : '';
                                            $cta_target      = !empty($cta['target']) ? esc_attr($cta['target']) : '';
                                            ?>
    
                                            <div class="swiper-slide">
                                                <div class="row flex-lg-row flex-column-reverse">
                                                    <div class="col-lg-6 col-12 d-flex flex-column justify-center pt-lg-0 pt-42">
                                                        <h3 class="h2 text-purple mb-12"><?php the_title(); ?></h3>
        
                                                        <div class="d-grid mb-42 gap-12">
                                                            <?php foreach ($items as $key => $item) { 
                                                                $icono           = !empty($item['icono']) ? $item['icono'] : '';
                                                                $item_cta        = !empty($item['enlace']) ? $item['enlace'] : [];
                                                                $item_cta_texto  = !empty($item_cta['title']) ? esc_html($item_cta['title']) : '';
                                                                $item_cta_url    = !empty($item_cta['url']) ? esc_url($item_cta['url']) : '';
                                                                $item_cta_target = !empty($item_cta['target']) ? esc_attr($item_cta['target']) : '';
                                                            ?>
                                                                <a href="<?php echo $item_cta_url; ?>" target="<?php echo $item_cta_target; ?>" class="font-sans d-flex align-center gap-6 hover" title="<?php echo $item_cta_texto; ?>">
                                                                    <img src="<?php echo $icono; ?>" alt="<?php echo $item_cta_texto; ?>" title="<?php echo $item_cta_texto; ?>">
                                                                    <span class="hover-link hover-text-blue"><?php echo $item_cta_texto; ?></span>
                                                                </a>   
                                                            <?php } ?>
                                                        </div>
                                                        <?php if($cta_text) { ?>
                                                        <a class="btn btn-primary shadow-none" href="<?php echo $cta_text; ?>" target="<?php echo $cta_target; ?>" title="<?php echo $cta_text; ?>">
                                                            <?php echo $cta_text; ?>
                                                        </a>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="col-lg-6 col-12">
                                                        <?php
                                                        $imagen_secundaria = get_field('imagen_secundaria');
                                                        if ($imagen_secundaria): ?>
                                                            <img src="<?php echo esc_url($imagen_secundaria['url']); ?>" alt="<?php echo esc_attr($imagen_secundaria['alt']); ?>" class="img-fluid w-100 d-block rounded-18">
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="pt-lg-60 pt-60 pb-lg-0 pb-24 position-relative z-1">
                                <div class="container">
                                    <div class="d-flex justify-center gap-24">
                                        <div class="swiper-fraction swiper-fraction-tab d-flex"></div>
                                        <div class="custom-pagination swiper-pagination-tab"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-button-prev-tab swiper-button-blanco"></div>
                            <div class="swiper-button-next-tab swiper-button-blanco"></div>
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
