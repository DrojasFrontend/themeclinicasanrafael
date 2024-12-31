<?php

/**
 * Genera una etiqueta de imagen responsive con mejor calidad.
 *
 * @param int    $image_id   ID de la imagen en la biblioteca de medios.
 * @param string $resolucion Tamaño de la imagen que se va a obtener.
 * @param string $sitename   Nombre del sitio para usar en el atributo alt.
 * @param string $clase      Clase CSS que se aplicará a la etiqueta img.
 * @param string $titulo     Título que se aplicará si el alt está vacío.
 *
 * @return string
 */
function generar_image_responsive($image_id, $resolucion, $sitename, $clase, $titulo = '') {
    if (empty($image_id)) {
        return '';
    }

    $image_src    = wp_get_attachment_image_url($image_id, $resolucion);
    $image_srcset = wp_get_attachment_image_srcset($image_id, $resolucion);
    $image_sizes  = wp_get_attachment_image_sizes($image_id, $resolucion);
    $image_meta   = wp_get_attachment_metadata($image_id);
    $image_alt    = get_post_meta($image_id, '_wp_attachment_image_alt', true);
    $image_title  = get_the_title($image_id);

    // Si $image_alt está vacío, usar $titulo, y si $titulo está vacío, usar una cadena vacía
    $alt_text = !empty($image_alt) ? $image_alt . ' - ' . $sitename : (!empty($titulo) ? $titulo : '');

    // Si $image_title está vacío, usar una cadena vacía
    $title_text = !empty($image_title) ? $image_title : '';

    // Asegurarse de que tenemos dimensiones válidas
    $image_width  = isset($image_meta['width']) ? $image_meta['width'] : '';
    $image_height = isset($image_meta['height']) ? $image_meta['height'] : '';

    $output = sprintf(
        '<img class="%s" width="%s" height="%s" src="%s" srcset="%s" sizes="%s" alt="%s" title="%s" loading="lazy" decoding="async">',
        esc_attr($clase),
        esc_attr($image_width),
        esc_attr($image_height),
        esc_url($image_src),
        esc_attr($image_srcset),
        esc_attr($image_sizes),
        esc_attr($alt_text),
        esc_attr($title_text)
    );

    return $output;
}


function custom_the_excerpt($post_id, $word_limit = 20) {
    $excerpt = get_the_content(null, false, $post_id);
    $words = explode(' ', $excerpt, $word_limit + 1);
    if (count($words) > $word_limit) {
			array_pop($words);
			$excerpt = implode(' ', $words);
			$excerpt .= '...';
    }
    echo esc_html($excerpt); 
}

add_filter('wp_nav_menu_objects', 'remove_current_class_from_hash_links', 10, 2);

function remove_current_class_from_hash_links($items, $args) {
    foreach ($items as $item) {
        if (strpos($item->url, '#') !== false) {
            $item->classes = array_filter($item->classes, function($class) {
                return !in_array($class, ['current-menu-item', 'current-menu-ancestor', 'current-menu-parent', 'current_page_parent', 'current_page_ancestor']);
            });
        }
    }
    return $items;
}

function lg_remove_auto_p ($content) {
    $content = preg_replace('/^<p>/', '', $content);
    $content = preg_replace('/<\/p>$/', '', $content);
    return $content;
}
add_filter('the_content', 'lg_remove_auto_p');