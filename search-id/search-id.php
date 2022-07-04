<?php
/**
 * Plugin Name: Search ID
 * Description: Search any post with their ID.
 * Plugin URI: ...
 * Author: Alberto Filho
 * Version: 1.0.0
 * Author URI: ...
 */

 if (! defined ('ABSPATH')) {
    exit; // Exit if accessed directly.
 }

 /**
  * 
  * Include widget file and register widget class.
  *
  * @since 1.0.0
  * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager
  * @return void
  */

  function register_search_id ($widgets_manager) {

    require_once(__DIR__ . '/widgets/card-widget.php');

    $widgets_manager->register( new \Essential_Elementor_Card_Widget() );

  }

  add_action('elementor/widgets/register', 'register_search_id');