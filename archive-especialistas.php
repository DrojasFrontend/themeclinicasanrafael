<?php 
get_header(); 

$contentGlobal          = get_page_by_path('contenido-global')->ID;
$mostrar_contacto       = ($contentGlobal) ? get_field('mostrar_contacto', $contentGlobal) : null;

$contentGlobalArchives  = get_page_by_path('paginas-archives')->ID;
$grupo_especialistas    = ($contentGlobalArchives) ? get_field('grupo_especialistas', $contentGlobalArchives) : null;
$titulo                 = !empty($grupo_especialistas['titulo']) ? esc_html($grupo_especialistas['titulo']) : '';
$descripcion_izq        = !empty($grupo_especialistas['descripcion_izq']) ? esc_html($grupo_especialistas['descripcion_izq']) : '';
$descripcion_der        = !empty($grupo_especialistas['descripcion_der']) ? esc_html($grupo_especialistas['descripcion_der']) : '';
$imagen_id              = !empty($grupo_especialistas['imagen']['ID']) ? intval($grupo_especialistas['imagen']['ID']) : '';
$texto_noresultados     = !empty($grupo_especialistas['texto_noresultados']) ? esc_html($grupo_especialistas['texto_noresultados']) : '';
?>

<main>
    <section class="bg-secondary-100 pt-42 pb-lg-90 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="col-lg-10">
                        <?php if($titulo) { ?>
                            <h1 class="h1 text-white mb-lg-24 mb-12"><?php echo $titulo; ?></h1>
                        <?php } else { ?>
                            <h1 class="h1 text-white mb-lg-24 mb-12"><?php post_type_archive_title(); ?></h1>
                        <?php } ?>

                        <?php if($descripcion_izq) { ?>
                        <p class="p text-white mb-lg-60 mb-42"><?php echo $descripcion_izq; ?></p>
                        <?php } ?>

                        <div class="position-relative d-none d-lg-block ">
                            <input class="font-sans p w-100 bg-white border-0 rounded-tr-6 rounded-tl-6 py-12 px-12" type="text" id="searchEspecialistas" placeholder="Ingresa servicio o especialidad ">
                            <i class="icono icono-buscar position-absolute top-50 right-18 translate-middle-y ms-12"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <?php if($descripcion_der) { ?>
                        <p class="p text-white mb-18"><?php echo $descripcion_der; ?></p>
                    <?php } ?>
                    <div id="letterFilterEsp" class="mb-lg-0 mb-42">
                        <?php 
                        foreach(range('A', 'Z') as $letra) : ?>
                            <button class="font-sans p text-secondary w-lg-54 w-40 h-lg-54 h-40 me-2 mb-12 rounded-6 border-0" data-letra="<?php echo $letra; ?>"><?php echo $letra; ?></button>
                        <?php endforeach; ?>
                    </div>
                    <div class="position-relative d-lg-none">
                        <input class="font-sans p w-100 bg-white border-0 rounded-tr-6 rounded-tl-6 py-12 px-12" type="text" id="searchEspecialistasMobile" placeholder="Ingresa servicio o especialidad ">
                        <i class="icono icono-buscar position-absolute top-50 right-18 translate-middle-y ms-12"></i>
                    </div>
                </div>
            </div>
            
        </div>
    </section>

    <section class="pt-lg-72 pt-60">
        <div class="container">
            <div id="resultados" class="row">
            <?php get_template_part('template-parts/componentes/componente', 'titulo-h2', array(
                'titulo' => 'Nuestros especialistas',
                'clase' => 'm-0 mb-lg-72 mb-42 text-secondary',
            ))?>
                <?php if(have_posts()) : ?>
                    <?php while(have_posts()) : the_post(); ?>
                        <div class="col-lg-3 mb-36">
                            <div class="rounded overflow-hidden clickeable h-lg-100 hover">
                                <?php if(has_post_thumbnail()) : ?>
                                    <img class="img-fluid d-flex" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>">
                                <?php endif; ?>
                                <div class="p-24 bg-white h-lg-100">
                                    <h3 class="h5 text-secondary-100 mb-12"><?php the_title(); ?></h3>
                                    <a href="<?php echo esc_url(the_permalink()); ?>" class="font-sans p text-primary fw-bold d-flex align-center">
                                        <span class="hover-link">	 
                                            Conoce más
                                        </span>
                                        <i class="icono icono-flecha"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else : ?>
                    <h3 class="h3 m-0 mb-lg-72 mb-42 text-secondary">No se encontraron especialistas/h3>
                <?php endif; ?>
            </div>
            <div id="loading" class="loading" style="display: none;">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Cargando...</span>
                </div>
            </div>
        </div>
    </section>
    
    <?php if($mostrar_contacto) { ?>
        <!-- Contacto -->
        <?php get_template_part('template-parts/componentes/componente', 'contacto-bottom') ?>
        <!-- Fin Contacto -->
    <?php } ?>
</main>

<?php get_footer(); ?>