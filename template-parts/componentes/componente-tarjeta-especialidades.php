<?php
$grupo_especialidades   = get_field('grupo_especialidades');
$posicion               = !empty($grupo_especialidades['posicion']) ? esc_html($grupo_especialidades['posicion']) : '';
$titulo_especialidad    = !empty($grupo_especialidades['titulo']) ? esc_html($grupo_especialidades['titulo']) : '';
$especialidades         = !empty($grupo_especialidades['especialidades']) ? $grupo_especialidades['especialidades'] : [];

if( $especialidades ): ?>
    <section class="pt-lg-140 pb-lg-60 pt-60 pb-30" style="order: <?php echo $posicion; ?>;">
        <div class="container">
            <div class="text-lg-center">
                <?php get_template_part('template-parts/componentes/componente', 'titulo-h2', array(
                    'titulo' => $titulo_especialidad,
                    'clase' => 'mb-lg-60 mb-42',
                ))?>
            </div>
            <div class="row">
                <?php foreach( $especialidades as $especialidad ): 
                    $permalink      = get_permalink( $especialidad->ID );
                    $title          = get_the_title( $especialidad->ID );
                    $custom_field   = get_field( 'field_name', $especialidad->ID );
                    ?>
                    <article class="col-lg-3 mb-36">
                        <div class="rounded overflow-hidden clickeable h-lg-100 hover">
                            <?php if(has_post_thumbnail($especialidad->ID)) : ?>
                                <img class="img-fluid d-flex" src="<?php echo get_the_post_thumbnail_url($especialidad->ID, 'full'); ?>" alt="<?php echo esc_attr($title); ?>" title="<?php echo esc_attr($title); ?>">
                            <?php endif; ?>

                            <div class="p-24 bg-white h-lg-100">
                                <h3 class="h5 text-secondary-100 mb-12"><?php echo $title; ?></h3>
                                <a href="<?php the_permalink(); ?>" class="font-sans p text-primary fw-bold d-flex align-center gap-6">
                                    <span class="hover-link">Conoce más</span>
                                    <i class="icono icono-flecha"></i>
                                </a>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>