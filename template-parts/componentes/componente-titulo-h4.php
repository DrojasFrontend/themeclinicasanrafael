<?php 
  $titulo = !empty($args['titulo']) ? $args['titulo'] : '';
  $clase  = !empty($args['clase']) ? $args['clase'] : '';
?>
<h3 class="h4 text-secondary <?php echo $clase; ?>"><?php echo $titulo; ?></h3>