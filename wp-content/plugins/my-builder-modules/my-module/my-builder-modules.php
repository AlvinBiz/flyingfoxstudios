<?php
/**
 * Plugin Name: My Custom Modules
 * Plugin URI: http://www.mywebsite.com
 * Description: Custom modules for the Beaver Builder Plugin.
 * Version: 1.0
 * Author: Rafael
 * Author URI: http://www.mywebsite.com
 */

// define( 'MY_BUILDER_MODULES_DIR', plugin_dir_path( __FILE__ ) );
// define( 'MY_BUILDER_MODULES_DIR', plugins_url( '/', __FILE__ ) );

class AnchorModule extends FLBuilderModule {

  public function __construct()
  {
    parent::__construct(array(
      'name'            => __( 'Anchor Module', 'fl-builder' ),
      'description'     => __( 'A module to nest anchors.', 'fl-builder' ),
      'group'           => __( 'My Group', 'fl-builder' ),
      'category'        => __( 'My Category', 'fl-builder' ),
      'dir'             => MY_BUILDER_MODULES_DIR . 'my-module/',
      'url'             => MY_BUILDER_MODULES_URL . 'my-module/',
      'icon'            => 'button.svg',
      'editor_export'   => true, // Defaults to true and can be omitted.
      'enabled'         => true, // Defaults to true and can be omitted.
      'partial_refresh' => false, // Defaults to false and can be omitted.
    ));
  }
}

function my_load_module_examples() {
  if ( class_exists( 'FLBuilder' ) ) {
      require_once 'my-module/my-module.php';
  }
}

add_action( 'init', 'my_load_module_examples' );

FLBuilder::register_module( 'AnchorModule', array(
  'my-tab-1'      => array(
    'title'         => __( 'Tab 1', 'fl-builder' ),
    'sections'      => array(
      'my-section-1'  => array(
        'title'         => __( 'Section 1', 'fl-builder' ),
        'fields'        => array(
          'my-field-1'     => array(
            'type'          => 'text',
            'label'         => __( 'Text Field 1', 'fl-builder' ),
          ),
          'my-field-2'     => array(
            'type'          => 'text',
            'label'         => __( 'Text Field 2', 'fl-builder' ),
          )
        )
      )
    )
  )
) );
