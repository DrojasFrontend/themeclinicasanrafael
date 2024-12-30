<?php
function create_servicios_post_type() {
    register_post_type('servicios', array(
        'labels' => array(
            'name' => 'Servicios',
            'singular_name' => 'Servicio'
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-list-view'
    ));
}
add_action('init', 'create_servicios_post_type');

// Funciones de búsqueda y ordenamiento
function search_servicios() {
    $search = $_POST['search'];
    $order = isset($_POST['order']) ? $_POST['order'] : 'ASC';
    
    $args = array(
        'post_type' => 'servicios',
        'posts_per_page' => -1,
        's' => $search,
        'orderby' => 'title',
        'order' => $order
    );

    $query = new WP_Query($args);
    $filtered_posts = array();

    if($query->have_posts()) {
        while($query->have_posts()) {
            $query->the_post();
            $filtered_posts[] = array(
                'post_title' => get_the_title(),
                'post_excerpt' => get_the_excerpt(),
                'permalink' => get_permalink(),
                'thumbnail' => get_the_post_thumbnail_url(get_the_ID(), 'full')
            );
        }
    }
    wp_reset_postdata();
    
    wp_send_json($filtered_posts);
    wp_die();
}
add_action('wp_ajax_search_servicios', 'search_servicios');
add_action('wp_ajax_nopriv_search_servicios', 'search_servicios');

function order_servicios() {
    $order = isset($_POST['order']) ? $_POST['order'] : 'ASC';
    
    $args = array(
        'post_type' => 'servicios',
        'posts_per_page' => -1,
        'orderby' => 'title',
        'order' => $order
    );

    $query = new WP_Query($args);
    $ordered_posts = array();

    if($query->have_posts()) {
        while($query->have_posts()) {
            $query->the_post();
            $ordered_posts[] = array(
                'post_title' => get_the_title(),
                'post_excerpt' => get_the_excerpt(),
                'permalink' => get_permalink(),
                'thumbnail' => get_the_post_thumbnail_url(get_the_ID(), 'full')
            );
        }
    }
    wp_reset_postdata();
    
    wp_send_json($ordered_posts);
    wp_die();
}
add_action('wp_ajax_order_servicios', 'order_servicios');
add_action('wp_ajax_nopriv_order_servicios', 'order_servicios');