<div class="row">
  <div class="col-lg-5 pe-xl-36 mb-lg-0 mb-36">
    <?php the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid rounded overflow-hidden', 'title' => get_the_title()]);; ?>
  </div>
  <div class="col-lg-7 ps-xl-0">
    <div>
      <?php get_template_part('template-parts/componentes/componente', 'titulo-h2', array(
        'titulo' => get_the_title(),
        'clase' => 'h4 mb-24',
      ))?>
      <p class="p text-secondary mb-12">Requisitos</p>
      <p class="p text-sedondary"><?php echo  get_the_content();?></p>
    </div>
  </div>
</div>