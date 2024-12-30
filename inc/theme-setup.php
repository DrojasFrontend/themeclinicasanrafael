<?php
/* 
*   Habilitación de menu
*/
function legger_menus()
{
    register_nav_menus(array(
        'menu-principal' => 'Menu Principal',
        'menu-servicios' => 'Menu Servicios',
        'menu-rapido' => 'Menu Rapido',
    ));
}
add_action('init', 'legger_menus');

/* 
*   Logo
*/
function theme_prefix_setup() {
    add_theme_support('custom-logo', array(
        'height'      => 100, 
        'width'       => 400, 
        'flex-height' => true,
        'flex-width'  => true,
    ));
}
add_action('after_setup_theme', 'theme_prefix_setup');

// Agregar en functions.php
function agregar_logo_secundario($wp_customize) {
    // Agregar sección
    $wp_customize->add_section('logo_secundario', array(
        'title'    => 'Logo Secundario',
        'priority' => 30,
    ));

    // Agregar campo para la imagen
    $wp_customize->add_setting('logo_secundario_imagen');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'logo_secundario_imagen', array(
        'label'    => 'Seleccionar Logo',
        'section'  => 'logo_secundario',
        'settings' => 'logo_secundario_imagen'
    )));

    // Agregar campo para el link
    $wp_customize->add_setting('logo_secundario_link');
    $wp_customize->add_control('logo_secundario_link', array(
        'label'    => 'URL del Logo',
        'section'  => 'logo_secundario',
        'type'     => 'url'
    ));
}
add_action('customize_register', 'agregar_logo_secundario');

/**
 * Habilitar imágenes destacadas para posts específicos
 */
function theme_setup() {
    add_theme_support('post-thumbnails', array('post', 'page', 'servicios'));
}
add_action('after_setup_theme', 'theme_setup');

/* 
*   Habilitación subida de SVG
*/
function add_file_types_to_uploads($file_types){
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes );
    return $file_types;
}
add_filter('upload_mimes', 'add_file_types_to_uploads');

/* 
*   Resoluciones de imagenes
*/
function img_setup_theme() {
    add_image_size('custom-size', 423, 519, true); // Normal resolution
    add_image_size('custom-size-2x', 846, 1038, true); // High resolution
}
add_action('after_img_setup_theme', 'setup_theme');

/* 
* Guarda archivos JSON de ACF en la carpeta '/acf-json' dentro del tema activo.
*/
function my_acf_json_save_point( $path ) {
	return get_stylesheet_directory() . '/acf-json';
}
add_filter( 'acf/settings/save_json', 'my_acf_json_save_point' );

/* 
* Eliminar las etiquetas <p>
*/
add_filter('wpcf7_autop_or_not', '__return_false');

/* 
* Whatsapp
*/
// Agregar menú en el panel de administración
function agregar_menu_whatsapp() {
    add_menu_page(
      'Configuración WhatsApp',
      'WhatsApp',
      'manage_options',
      'configuracion-whatsapp',
      'mostrar_pagina_configuracion',
      'dashicons-whatsapp',
      30
    );
  }
  add_action('admin_menu', 'agregar_menu_whatsapp');
  
  // Registrar configuraciones
  function registrar_configuraciones() {
      register_setting('whatsapp_opciones', 'whatsapp_numero');
  }
  add_action('admin_init', 'registrar_configuraciones');
  
  // Crear la página de configuración
  function mostrar_pagina_configuracion() {
      ?>
      <div class="wrap">
          <h1>Configuración de WhatsApp</h1>
          <form method="post" action="options.php">
              <?php
              settings_fields('whatsapp_opciones');
              do_settings_sections('whatsapp_opciones');
              ?>
              <table class="form-table">
                  <tr>
                      <th scope="row">Número de WhatsApp</th>
                      <td>
                          <input type="text" name="whatsapp_numero" value="<?php echo esc_attr(get_option('whatsapp_numero')); ?>" placeholder="Ejemplo: +34612345678"class="regular-text">
                          <p class="description">Ingresa el número con código de país (Ejemplo: +34612345678)</p>
                      </td>
                  </tr>
              </table>
              <?php submit_button(); ?>
          </form>
      </div>
      <?php
  }
  
  function obtener_whatsapp() {
      return get_option('whatsapp_numero');
  }
  
  function mostrar_boton_whatsapp() {
      $numero = obtener_whatsapp();
      if (!empty($numero)) {
        ?>
            <a href="https://wa.me/<?php echo esc_attr(preg_replace('/[^0-9]/', '', $numero)); ?>" target="_blank" class="icono-whatsapp-float">
                <span>Asistente virtual</span>
                <i class="icono-whatsapp"></i>
            </a>
        <?php
      }
  }