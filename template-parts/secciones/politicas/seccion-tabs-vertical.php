<?php 
$grupo_politicas 	= get_field('grupo_politicas');
$items 						= !empty($grupo_politicas['items']) ? $grupo_politicas['items'] : [];
?>
<section class="pt-lg-72 pt-60 d-none d-lg-block">
	<div class="container">
		<div class="row">
			<div class="col-lg-5">
				<ul class="d-flex flex-column gap-18 pe-xl-100" id="sedesTabs" role="tablist"> 
					<?php foreach ($items as $key => $item) { 
						$tab_titulo 	= !empty($item['tab_titulo']) ? esc_html($item['tab_titulo']) : '';
					?>
						<li class="tab-vertical" role="presentation">
								<button class="position-relative font-sans p text-primary border-0 p-24 pe-42 rounded-6 w-100 text-start <?php echo $key == 0 ? 'show active fw-bold' : ''; ?>" 
									id="tab-<?php echo $key; ?>" 
									data-bs-toggle="tab" 
									data-bs-target="#content-<?php echo $key; ?>" 
									type="button" 
									role="tab" 
									aria-controls="content1" 
									aria-selected="true">
									<?php echo $tab_titulo; ?>
									<span class="tab-vertical__icono position-absolute top-50 right-18 translate-middle-y">
									<i class="icono icono-flecha"></i>
									</span>
								</button>
						</li>
					<?php } ?>
				</ul>
			</div>
			<div class="col-lg-7">
				<div class="tab-content" id="sedesTabsContent">
					<?php foreach ($items as $key => $item) { 
						$titulo 			= !empty($item['titulo']) ? esc_html($item['titulo']) : '';
						$descripcion 	= !empty($item['descripcion']) ? esc_html($item['descripcion']) : '';
					?>
						<div class="tab-pane fade <?php echo $key == 0 ? 'show active' : ''; ?>" 
							id="content-<?php echo $key; ?>" 
							role="tabpanel" 
							aria-labelledby="tab-<?php echo $key; ?>">
							<?php if($titulo) { ?>
								<?php get_template_part('template-parts/componentes/componente', 'titulo-h2', array(
									'titulo' => $titulo,
									'clase' => 'mb-24',
								))?>
							<?php } ?>

							<?php if($descripcion) { ?>
								<p class="p text-secondary">
									<?php echo $descripcion; ?>
								</p>
							<?php } ?>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="pt-lg-72 pt-60 d-lg-none">
	<div class="container">
		<div class="accordion accordion-mobile" id="accordionExample">
				<?php foreach ($items as $key => $item) { 
					$tab_titulo = !empty($item['tab_titulo']) ? esc_html($item['tab_titulo']) : '';
					$titulo = !empty($item['titulo']) ? esc_html($item['titulo']) : '';
					$descripcion = !empty($item['descripcion']) ? esc_html($item['descripcion']) : '';
				?>
					<div class="accordion-item mb-18">
						<h2 class="accordion-header" id="heading-<?php echo $key; ?>">
						<button class="accordion-button position-relative font-sans p text-primary border-0 p-24 rounded-6 w-100 text-start bg-primary-15 <?php echo $key == 0 ? '' : 'collapsed'; ?>" 
							type="button" 
							data-bs-toggle="collapse" 
							data-bs-target="#collapse-<?php echo $key; ?>" 
							aria-expanded="<?php echo $key == 0 ? 'true' : 'false'; ?>" 
							aria-controls="collapse-<?php echo $key; ?>">
								<?php echo $tab_titulo; ?>
								<span class="tab-vertical__icono position-absolute top-50 right-18 translate-middle-y">
									<i class="icono icono-flecha"></i>
								</span>
							</button>
						</h2>
						<div id="collapse-<?php echo $key; ?>" 
  						class="accordion-collapse collapse <?php echo $key == 0 ? 'show' : ''; ?>" 
  						aria-labelledby="heading-<?php echo $key; ?>" 
  						data-bs-parent="#accordionExample">
							<div class="accordion-body pt-24">
								<?php if($titulo) { ?>
									<?php get_template_part('template-parts/componentes/componente', 'titulo-h2', array(
										'titulo' => $titulo,
										'clase' => 'mb-24',
									))?>
								<?php } ?>
			
								<?php if($descripcion) { ?>
									<p class="p text-secondary">
										<?php echo $descripcion; ?>
									</p>
								<?php } ?>
							</div>
						</div>
					</div>
				<?php } ?>
		</div>
	</div>
</section>
	

