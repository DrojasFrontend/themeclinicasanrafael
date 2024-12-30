<?php 
get_header(); 

$sitename           	= get_bloginfo('name');
$contentGlobalServicios = get_page_by_path('paginas-archives')->ID;
$grupo_servicios        = ($contentGlobalServicios) ? get_field('grupo_servicios', $contentGlobalServicios) : null;
$titulo        			= !empty($grupo_servicios['titulo']) ? esc_html($grupo_servicios['titulo']) : '';
$descripcion        	= !empty($grupo_servicios['descripcion']) ? esc_html($grupo_servicios['descripcion']) : '';
$imagen_id          	= !empty($grupo_servicios['imagen']['ID']) ? intval($grupo_servicios['imagen']['ID']) : '';

$contentGlobal    = get_page_by_path('contenido-global')->ID;
$mostrar_contacto = ($contentGlobal) ? get_field('mostrar_contacto', $contentGlobal) : null;
?>

<main>

<div class="bg-primary-100 py-60">
	<div class="container">
		<div class="row flex-column-reverse flex-lg-row">
			<div class="col-lg-6">
				<?php if ($titulo) { ?>
					<h1 class="h1 text-secondary mt-lg-24 mb-lg-24 mb-12"><?php echo $titulo; ?></h1>
				<?php } else { ?>
					<h1 class="h1 text-secondary mt-lg-24 mb-lg-24 mb-12"><?php post_type_archive_title(); ?></h1>
				<?php } ?>

				<?php if ($descripcion) { ?>
					<p class="p color-secondary">
						<?php echo $descripcion; ?>
					</p>
				<?php } ?>
			</div>
			<div class="col-lg-6 mb-24 mb-lg-0">
				<?php echo generar_image_responsive($imagen_id, 'custom-size', $sitename, 'img-fluid rounded shadow-tarjeta mb-lg-0 mb-24'); ?>
			</div>
		</div>
	</div>
</div>

  	

<div class="bg-primary-40 py-42">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 mb-lg-0 mb-24">
				<div class="position-relative">
					<input class="form-control servicios font-sans p w-100 bg-white border-0 rounded-tr-6 rounded-tl-6 py-12 px-12" type="text" id="searchServicios" placeholder="Ingresa el servicio que buscas">
					<i class="icono icono-buscar position-absolute top-50 right-18 translate-middle-y ms-12"></i>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="d-flex">
					<select id="orderServicios" class="form-select servicios w-100 rounded-tr-6 rounded-tl-6" style="width: auto;">
						<option value="">Ordenar por</option>
						<option value="ASC">A-Z</option>
						<option value="DESC">Z-A</option>
					</select>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Contenedor de resultados -->
 <div class="pt-lg-72 pt-60">
	 <div class="container">
	   <div id="resultados-servicios" class="row">
		 <?php if(have_posts()) : ?>
			 <?php while(have_posts()) : the_post(); ?>
				 <article class="col-lg-3 mb-36">
					 <div class="rounded overflow-hidden clickeable h-lg-100 hover">
						 <?php if(has_post_thumbnail()) : ?>
							 <img class="img-fluid d-flex" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>">
						 <?php endif; ?>
						 <div class="p-24 bg-white h-lg-100">
							 <h3 class="h5 text-secondary-100 mb-12"><?php the_title(); ?></h3>
							 <a href="<?php the_permalink(); ?>" class="font-sans p text-primary fw-bold d-flex align-center gap-6">
							 	<span class="hover-link">	 
							 		Conoce más
						 		</span>
								<i class="icono icono-flecha"></i>
							 </a>
						 </div>
					 </div>
				 </article>
			 <?php endwhile; ?>
		 <?php else : ?>
			 <div class="no-results">
				 <p>No se encontraron servicios</p>
			 </div>
		 <?php endif; ?>
	   </div>
	   <div class="d-flex justify-center">
		   <div id="loading-servicios" style="display: none;">Cargando...</div>
	   </div>
	 </div>
 </div>

  <?php if($mostrar_contacto) { ?>
    <!-- Contacto -->
    <?php get_template_part('template-parts/componentes/componente', 'contacto-bottom') ?>
    <!-- Fin Contacto -->
  <?php } ?>
    
</main>

<?php get_footer(); ?>