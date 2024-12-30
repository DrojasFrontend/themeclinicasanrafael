<?php

function display_sedes_tabs() {
    $args = array(
        'post_type'      => 'sedes',
        'posts_per_page' => -1,
        'orderby'        => 'title',
        'order'          => 'DESC'
    );

    $query = new WP_Query($args);

    if (!$query->have_posts()) {
        echo '<p>No se encontraron sedes.</p>';
        return;
    }
	?>
	<div class="bg-purple-100 pt-lg-72 pt-60 overflow-x-auto overflow-y-hidden">
		<div class="container px-0">
			<ul class="tab-link d-flex justify-lg-center gap-2 ps-24 ps-lg-0" id="sedesTabs" role="tablist">
				<?php $first = true; while ($query->have_posts()) { $query->the_post();
					$slug = sanitize_title(get_the_title());
				?>
					<li class="" role="presentation">
						<button class="p text-primary fw-bold py-16 px-30 bg-white border-0 rounded-tr-18 <?php echo $first ? 'active' : ''; ?>" id="<?php echo esc_attr($slug); ?>-tab" data-bs-toggle="tab" data-bs-target="#<?php echo esc_attr($slug); ?>" type="button" role="tab" aria-controls="<?php echo esc_attr($slug); ?>" aria-selected="<?php echo $first ? 'true' : 'false'; ?>">
							<?php the_title(); ?>
						</button>
					</li>
				<?php $first = false; } ?>
			</ul>
		</div>
	</div>

	<div class="tab-content py-lg-72 pt-60" id="sedesTabsContent">
		<?php $query->rewind_posts();
			$first = true;
			
			while ($query->have_posts()) {
				$query->the_post();
				$slug = sanitize_title(get_the_title());
				?>
				<div class="tab-pane fade <?php echo $first ? 'show active' : ''; ?>" id="<?php echo esc_attr($slug); ?>" role="tabpanel" aria-labelledby="<?php echo esc_attr($slug); ?>-tab">
					<?php
						$grupo_horarios = get_field('grupo_horarios');
						if (!empty($grupo_horarios['horario'])) { ?>
							<div class="container">
								<div class="d-grid grid-cols-lg-3 grid-cols-md-2 grid-cols-1 gap-lg-36 gap-md-24 gap-36">
									<?php foreach ($grupo_horarios['horario'] as $horario) {
										$sede 		= !empty($horario['sede']) ? esc_html($horario['sede']) : '';
										$icono 		= !empty($horario['icono']) ? esc_url($horario['icono']) : '';
										$detalle	= !empty($horario['detalle']) ? $horario['detalle'] : '';
									?>
										<div class="d-flex align-start gap-6">
											<img class="d-lg-flex d-none" src="<?php echo $icono; ?>" alt="<?php echo $sede; ?>" title="<?php echo $sede; ?>">
											<div class="d-flex flex-column gap-6">
												<p class="d-flex align-end gap-6 p fw-semibold text-secondary mb-lg-0 mb-12">
													<img class="d-lg-none" src="<?php echo $icono; ?>" alt="<?php echo $sede; ?>" title="<?php echo $sede; ?>">
													<?php echo $sede; ?>
												</p>
												<?php echo $detalle; ?>
											</div>
										</div>
									<?php } ?>
								</div>
							</div>
						<?php } else { ?>
							<div class="container">
								<h2 class="h5 d-block heading--24 text-black text-center">No hay horarios disponibles para esta sede.</h2>
							</div>
						<?php }
					?>
				</div>
				<?php
				$first = false;
			}
		?>
    </div>

    <?php wp_reset_postdata(); 
}

display_sedes_tabs();
?>