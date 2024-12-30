<?php
$grupo_sedes = get_field('grupo_sedes');
$posicion    = !empty($grupo_sedes['posicion']) ? esc_html($grupo_sedes['posicion']) : '';
$titulo      = !empty($grupo_sedes['titulo']) ? esc_html($grupo_sedes['titulo']) : '';

$args = array(
    'post_type' => 'sedes',
    'posts_per_page' => -1,
    'post_status' => 'publish'
);

$todas_las_sedes = get_posts($args);

$sedes_seleccionadas = array();
if($grupo_sedes && isset($grupo_sedes['sedes'])) {
    foreach($grupo_sedes['sedes'] as $sede) {
        $sedes_seleccionadas[] = $sede->ID;
    }
}
?>

<section class="bg-primary-150 py-60" style="order: <?php echo $posicion; ?>">
    <div class="container">
        <?php get_template_part('template-parts/componentes/componente', 'titulo-h2', array(
          'titulo' => $titulo,
          'clase' => 'mb-24 mb-lg-42 text-white text-center',
        ))?>
        
        <div class="d-flex justify-center flex-wrap gap-12">
            <?php foreach($todas_las_sedes as $sede): 
                $esta_seleccionada = in_array($sede->ID, $sedes_seleccionadas);
                $clase = $esta_seleccionada ? 'btn btn-primary-100' : 'btn btn-gray-200';
                $disabled = !$esta_seleccionada ? 'disabled' : '';
            ?>
                <button class="<?php echo esc_attr($clase); ?>" <?php echo $disabled; ?>>
                    <?php echo esc_html($sede->post_title); ?>
                </button>
            <?php endforeach; ?>
        </div>

        <?php if(empty($todas_las_sedes)): ?>
            <p class="text-gray-500">No hay sedes disponibles en este momento.</p>
        <?php endif; ?>
    </div>
</section>