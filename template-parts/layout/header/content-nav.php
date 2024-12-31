<?php
wp_nav_menu(array(
    'theme_location' => 'menu-principal',
    'container_class' => 'd-none d-lg-flex justify-center align-center flex-1 w-100 px-xl-60 px-24',
    'menu_class' => 'd-flex justify-between gap-6 w-100 h-100',
    'walker' => new Menu_Simple_Personalizado()
));
?>