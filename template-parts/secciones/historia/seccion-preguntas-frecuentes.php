<?php 
$sitename               = get_bloginfo('name');
$grupo_documentacion    = get_field('grupo_documentacion');
$titulo                 = !empty($grupo_documentacion['titulo']) ? esc_html($grupo_documentacion['titulo']) : '';
$preguntas              = !empty($grupo_documentacion['preguntas']) ? $grupo_documentacion['preguntas'] : [];
?>
<section class="seccionAccordion pt-72 pb-140">
    <div class="container">
        <div>
        <?php get_template_part('template-parts/componentes/componente', 'titulo-h2', array(
            'titulo' => $titulo,
            'clase' => 'mb-lg-24 mb-18',
        ))?>
        </div>
        <div class="accordion" id="accordionPanelsStayOpenExample">
            <?php foreach ($preguntas as $key => $pregunta) { ?>
                <div class="accordion-item col-12 py-42 px-24 bg-white rounded border border-primary-100">
                    <div class="">
                        <h2 class="accordion-header position-relative mb-30 pe-30" id="panelsStayOpen-heading<?php echo $key; ?>">
                            <button class="accordion-button collapsed font-gilda h5 text-secondary p-0 text-start bg-white border-none" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse<?php echo $key; ?>" aria-expanded="false" aria-controls="panelsStayOpen-collapse<?php echo $key; ?>">
                                <?php echo $pregunta['pregunta']; ?>
                                <img class="position-absolute top-0 right-0" src="<?php echo THEME_IMG . 'iconos/icono-arrow-down-azul.svg'?>" alt="">
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapse<?php echo $key; ?>" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-heading<?php echo $key; ?>">
                            <div class="accordion-body">
                                <?php echo $pregunta['respuesta']; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
