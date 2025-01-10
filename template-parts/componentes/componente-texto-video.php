<?php 
$sitename                     = get_bloginfo('name');
$grupo_texto_video            = get_field('grupo_texto_video');
$fondo                        = !empty($grupo_texto_video['fondo']) ? esc_html($grupo_texto_video['fondo']) : '';
$subtitulo                    = !empty($grupo_texto_video['subtitulo']) ? esc_html($grupo_texto_video['subtitulo']) : '';
$titulo                       = !empty($grupo_texto_video['titulo']) ? $grupo_texto_video['titulo'] : '';
$descripcion                  = !empty($grupo_texto_video['descripcion']) ? esc_html($grupo_texto_video['descripcion']) : '';
$video_youtube                = !empty($grupo_texto_video['video']) ? $grupo_texto_video['video'] : '';
$video_upload                 = !empty($grupo_texto_video['video_medio']) ? $grupo_texto_video['video_medio'] : '';
$imagen_id                    = !empty($grupo_texto_video['imagen']['ID']) ? intval($grupo_texto_video['imagen']['ID']) : '';

?>
<section class="seccionTextoVideo py-lg-72 py-60" <?php echo (isset($fondo) && !empty($fondo)) ? 'style="background-color: ' . $fondo . '"' : ''; ?>>
  <div class="container">
    <div class="row flex-lg-row flex-column-reverse">
      <div class="col-lg-6">
        <div class="d-flex flex-column justify-center h-100">
          <?php if ($subtitulo) { ?>
            <p class="subtitulo text-purple mb-12"><?php echo $subtitulo; ?></p>
          <?php } ?>
          
          <?php get_template_part('template-parts/componentes/componente', 'titulo-h2', array(
            'titulo' => $titulo,
            'clase' => 'm-0 mb-lg-24 mb-18 text-secondary',
          ))?>
      
          <?php if ($descripcion) { ?>
            <p class="col-lg-10 p text-secondary">
              <?php echo $descripcion; ?>
            </p>
          <?php } ?>
        </div>
      </div>
      <div class="col-lg-6" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <?php echo generar_image_responsive($imagen_id, 'custom-size', $sitename, 'img-fluid mb-lg-0 mb-24 rounded'); ?>
      </div>
    </div>
  </div>
</section>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <i class="icono icono-cerrar"></i>
        </button>
      </div>
      <div class="modal-body">
        <?php if (!empty($video_youtube)) : ?>
          <div class="ratio ratio-16x9">
            <?php 
            // Extraer ID del video de YouTube
            $video_id = '';
            if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $video_youtube, $match)) {
                $video_id = $match[1];
            }
            ?>
            <iframe src="https://www.youtube.com/embed/<?php echo esc_attr($video_id); ?>" 
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
          </div>
        <?php elseif (!empty($video_upload)) : ?>
          <div class="ratio ratio-16x9">
            <video controls controlsList="nodownload">
              <source src="<?php echo esc_url($video_upload); ?>" type="video/mp4">
              Su navegador no soporta el formato de video.
            </video>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>