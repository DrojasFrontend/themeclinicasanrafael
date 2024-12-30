<?php
wp_nav_menu(array(
    'theme_location' => 'menu-principal',
    'container_class' => 'd-flex',
    'menu_class' => 'd-flex flex-column w-100 px-24 pt-42',
    'walker' => new Menu_Mobile_Personalizado()
));
?>