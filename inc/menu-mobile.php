<?php
class Menu_Mobile_Personalizado extends Walker_Nav_Menu {
    private $current_item_title;

    function start_el(&$output, $item, $depth = 0, $args = [], $id = 0) {
        $this->current_item_title = $item->title;
        
        $custom_classes = array();
        foreach($item->classes as $class) {
            if(strpos($class, 'menu-') === false && strpos($class, 'current-') === false) {
                $custom_classes[] = $class;
            }
        }
        
        // Agregar clase si tiene hijos
        if (in_array('menu-item-has-children', $item->classes)) {
            $custom_classes[] = 'has-submenu';
        }
        
        $class_names = join(' ', array_filter($custom_classes));
        
        // Para items de nivel 0 (padres), agregar botón de retroceso en móvil
        if ($depth === 0) {
            $output .= "<li class='position-relative" . esc_attr($class_names) . "' data-depth='" . $depth . "'>";
            if (in_array('menu-item-has-children', $item->classes)) {
                $output .= '<div class="menu-item-header position-relative d-flex justify-between align-center font-sans p text-primary fw-semibold">';
            }
        } else {
            $output .= "<li class='d-block" . esc_attr($class_names) . "' data-depth='" . $depth . "'>";
        }
        
        if ($item->url && $item->url != '#') {
            $output .= '<a class="menu-item position-relative d-block py-12 font-sans h5 text-primary" href="' . $item->url . '">';
            $output .= $item->title;
            $output .= '</a>';
        } else {
            $output .= '<span class="menu-item position-relative d-block py-12 font-sans h5 text-primary">';
            $output .= $item->title;
            $output .= '</span>';
        }

        // Agregar botón toggle para submenús en móvil
        if (in_array('menu-item-has-children', $item->classes)) {
            $output .= '<button class="submenu-toggle position-absolute top-0 left-0 w-100 d-flex justify-end border-0 py-14" aria-label="Toggle submenu">
                        <i class="icono icono-flecha"></i>
                       </button>';
            if ($depth === 0) {
                $output .= '</div>';
            }
        }
    }

    function start_lvl(&$output, $depth = 0, $args = null) {
        // En móvil, agregar el botón de retroceso
        $output .= "<div class='submenu-container position-fixed top-0 right-0 w-100 h-100 bg-white-300 z-2'>";
        $output .= "<div class='submenu-header d-flex gap-6 align-center px-24 bg-primary-300'>";
        $output .= "<button class='back-button d-flex w-100 py-10 px-0 border-0 bg-transparent z-1'><i class='icono icono-regresar'></i></button>";
        $output .= "<span class='submenu-title ps-60'>" . esc_html($this->current_item_title) . "</span>";
        $output .= "</div>";
        $output .= "<ul class='submenu nivel-" . $depth . "'>";
    }
    
    function end_lvl(&$output, $depth = 0, $args = null) {
        $output .= "</ul>";
        $output .= "</div>";
    }

    function end_el(&$output, $item, $depth = 0, $args = null) {
        $output .= "</li>";
    }
}