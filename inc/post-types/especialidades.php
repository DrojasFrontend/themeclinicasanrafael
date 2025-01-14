<?php
function search_especialidades() {
    $search = $_POST['search'];
    
    $args = array(
        'post_type' => 'especialidades',
        'posts_per_page' => -1,
        's' => $search
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
add_action('wp_ajax_search_especialidades', 'search_especialidades');
add_action('wp_ajax_nopriv_search_especialidades', 'search_especialidades');

function filter_especialidades() {
    $letra = $_POST['letra'];
    
    $args = array(
        'post_type' => 'especialidades',
        'posts_per_page' => -1,
        'orderby' => 'title',
        'order' => 'ASC',
    );

    $query = new WP_Query($args);
    $filtered_posts = array();

    if($query->have_posts()) {
        while($query->have_posts()) {
            $query->the_post();
            $first_letter = mb_strtoupper(mb_substr(get_the_title(), 0, 1));
            if($first_letter === $letra) {
                $filtered_posts[] = array(
                    'post_title' => get_the_title(),
                    'post_excerpt' => get_the_excerpt(),
                    'permalink' => get_permalink(),
                    'thumbnail' => get_the_post_thumbnail_url(get_the_ID(), 'full')
                );
            }
        }
    }
    wp_reset_postdata();
    
    wp_send_json($filtered_posts);
    wp_die();
}
add_action('wp_ajax_filter_especialidades', 'filter_especialidades');
add_action('wp_ajax_nopriv_filter_especialidades', 'filter_especialidades');

function filter_where_title($where) {
  global $wpdb;
  if($letra = get_query_var('title_filter')) {
      $where .= $wpdb->prepare(" AND $wpdb->posts.post_title LIKE %s", $letra . '%');
  }
  return $where;
}