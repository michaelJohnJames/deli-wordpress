<?php
function deli_files() {
  wp_enqueue_script('main-deli-javascript', get_template_directory_uri() .'/js/scripts-bundled.js', array('jquery'), null, true);
  wp_enqueue_script('bootstrap-javascript', '//stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js', NULL, microtime(), true);
  wp_enqueue_script('jquery', '//code.jquery.com/jquery-3.3.1.slim.min.js');
  wp_enqueue_script('bootstrap-build', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js');
  wp_enqueue_style('bootstrap', '//stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css');
  wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css?family=Pacifico|Satisfy');
  wp_enqueue_style('font-awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
  wp_enqueue_style('deli_main_styles', get_stylesheet_uri());


}

add_action('wp_enqueue_scripts', 'deli_files');

function deli_features() {
  add_theme_support('post-thumbnails');
  add_image_size('homeCategory', 450, 303, true);
  add_image_size('homeLocation', 293, 195, true);
  add_image_size('homeSlider', 1154, 368, true);
  add_image_size('menuItem', 291, 200, true);
  add_image_size('superSlider', 1500, 368, true);
}

add_action('after_setup_theme', 'deli_features');


function menu_custom_rest() {
  register_rest_field('menuitem', 'price', array(
    'get_callback' => function() {return get_field('item_price');}
  ));
}



add_action ('rest_api_init', 'menu_custom_rest');
