<?php

/**
 * Plugin Name: Media Widget
 * Description: A custom Elementor widget that displays "Hello World"
 * Version: 1.0
 * Author: Author
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

function register_media_widget()
{
    require_once plugin_dir_path(__FILE__) . 'widget.php';
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Media_Widget());
}
add_action('elementor/widgets/widgets_registered', 'register_media_widget');
