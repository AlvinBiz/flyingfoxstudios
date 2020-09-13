<?php

// Defines
define( 'FL_CHILD_THEME_DIR', get_stylesheet_directory() );
define( 'FL_CHILD_THEME_URL', get_stylesheet_directory_uri() );

require 'vendor/autoload.php';

// Classes
require_once 'classes/class-fl-child-theme.php';


// Actions
add_action( 'wp_enqueue_scripts', 'FLChildTheme::enqueue_scripts', 1000 );

add_action( 'fl_after_content', 'fl_footer_email_form');
add_action( 'fl_contact_open', 'fl_footer_email_form');

function fl_footer_email_form() {
  if(is_front_page() || is_single())  {
    echo do_shortcode('[fl_builder_insert_layout slug="contact-form" type="fl-builder-template"]');
  }
}

// add_action( 'fl_page_data_add_properties', function() {
//
//     FLPageData::add_post_property( 'my_connection', array(
//       'css'    => 'https://www.mysite.com/path-to-settings.css',
//       'js'     => 'https://www.mysite.com/path-to-settings.js',
//         'label'   => 'My Connection',
//         'group'   => 'author',
//         'type'    => 'url',
//         'getter'  => 'my_connection_getter',
//     ) );
// } );
//
// function my_connection_getter() {
//     return 'My text';
// }

add_filter( 'fl_builder_register_settings_form', function( $form, $form_slug ) {

  if( 'pricing_column_form' === $form_slug ) {
    $form[ 'tabs' ][ 'general' ][ 'sections' ][ 'image' ] = [
      'title' => 'Image',
      'fields' => [
        'image' => [
        'label' => 'image',
        'type' => 'photo'
        ]
      ]
    ];
  }

  return $form;
}, 10, 2 );


add_filter( 'fl_builder_render_module_content', function( $html, $module ) {
  if( 'pricing-table' !== $module->slug ) {

    return $html;
  }

  $column_images = [];



  foreach( $module->settings->pricing_columns as $i => $column ) {
    if( isset( $column->image_src ) ) {
      $column_images[ $i ] = $column->image_src;
    }
  }


  $content = new \Wa72\HtmlPageDom\HtmlPageCrawler( $html );

  $columns = $content->filter( '.fl-pricing-table-column' );

  foreach( $columns as $i => $column ) {
    $column = new \Wa72\HtmlPageDom\HtmlPageCrawler( $column );



    if( isset($column_images[ $i ]) && ! empty( $column_images[ $i ] ) ) {
      $column->filter('h2')->after('<img style="padding: 10px;" src="' . $column_images[ $i ] . '" class="pricing-column-image" />');
    }
  }

  $content->saveHTML();

  return $content;
}, 10, 2);


add_filter( 'fl_builder_register_settings_form', function( $form, $form_slug ) {

  if( 'photo' === $form_slug ) {
    $form[ 'general' ][ 'sections' ][ 'text_overlay' ] = [
      'title' => 'Text Overlay',
      'fields' => [
        'overlay' => [
        'label' => 'Text',
        'type' => 'text',
        'default'       => '',
        'maxlength'     => '12',
        'size'          => '50',
        'placeholder'   => __( 'Your text here', 'fl-builder' ),
        'class'         => 'photo-text-overlay',
        'description'   => __( 'Add text that will appear on top of your image', 'fl-builder' ),
        'connections'   => array( 'string' )
      ],
        'color' => [
        'label' => 'Text Color',
        'type' => 'text',
        'default'       => '',
        'maxlength'     => '12',
        'size'          => '50',
        'placeholder'   => __( 'Color here', 'fl-builder' ),
        'description'   => __( 'Choose your text color using HEX or RGBA', 'fl-builder' ),
      ],
        'font_size' => [
        'label' => 'Font Size',
        'type' => 'unit',
        'units' => [ 'px', 'vw', '%' ],
        'default_unit'       => 'px',
        'preview'    => [
          'type'          => 'css',
          'selector'      => '.column-image-text-overlay',
          'property'      => 'font-size',
          ],
        ]
      ]
    ];
  }

  return $form;
}, 10, 2 );


add_filter( 'fl_builder_render_module_content', function( $html, $module ) {
  if( 'photo' !== $module->slug ) {

    return $html;
  }

  $column_overlays = [];
  $column_colors = [];
  $column_font_sizes = [];
  $column_font_size_units = [];



  foreach( $module as $i => $setting ) {

    if( isset( $setting->overlay ) ) {
      $column_overlays[ $i ] = $setting->overlay;
      if( isset( $setting->color ) ) {
        $column_colors[ $i ] = $setting->color;
        if( isset( $setting->font_size ) ) {
          $column_font_sizes[ $i ] = $setting->font_size;
          if( isset( $setting->font_size_unit ) ) {
            $column_font_size_units[ $i ] = $setting->font_size_unit;
          }
        }
      }
    }
  }

  $column_overlays = array_values($column_overlays);
  $column_colors = array_values($column_colors);
  $column_font_sizes = array_values($column_font_sizes);
  $column_font_size_units = array_values($column_font_size_units);



  $content = new \Wa72\HtmlPageDom\HtmlPageCrawler( $html );

  $elements = $content->filter( '.fl-photo' );


  foreach( $elements as $i => $element ) {
    $element = new \Wa72\HtmlPageDom\HtmlPageCrawler( $element );




    if( isset($column_overlays[ $i ]) && ! empty( $column_overlays[ $i ] ) ) {
      $element->filter('img')->after('<h4 style="
        position: absolute;
        width: 100%;
        height: 20px;
        top: 50%;
        margin-top: -10px;
        font-size:' . $column_font_sizes[ $i ] . $column_font_size_units[ $i ] . ';
        text-align: center;
        color: ' . $column_colors[ $i ] . '
        "class="column-image-text-overlay">' . $column_overlays[ $i ] . '</h4>');
    }
  }

  $content->saveHTML();

  return $content;
}, 10, 2);



add_action( 'fl_page_data_add_properties', 'demo_add_properties' );

function demo_add_properties(){

	FLPageData::add_group( 'page_url_group', array(
		'label' => 'Featured Links'
	) );


	FLPageData::add_post_property( 'featured_site', array(
		'label'   => 'Featured Site',
		'group'   => 'page_url_group',
		'type'    => array('url'),
		'getter'  => 'url_getter',
	) );


}

write_log(get_permalink(42));


function url_getter() {

	global $post;

	return get_post_meta($post->ID, 'featured_website', true);

}
