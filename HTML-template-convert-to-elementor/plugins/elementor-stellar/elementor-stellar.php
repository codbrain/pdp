<?php

/**
 * Plugin Name: Elementor Stellar
 * Description: Auto embed any embbedable content from external URLs into Elementor.
 * Plugin URI:  https://elementor.com/
 * Version:     1.0.0
 * Author:      Elementor Developer
 * Author URI:  https://developers.elementor.com/
 * Text Domain: elementor-stellar
 *
 * Elementor tested up to: 3.16.0
 * Elementor Pro tested up to: 3.16.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Register Stellar Widget.
 *
 * Include widget file and register widget class.
 *
 * @since 1.0.0
 * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
 * @return void
 */
function register_stellar_widget($widgets_manager)
{

    require_once(__DIR__ . '/widgets/about-widget.php');
    require_once(__DIR__ . '/widgets/services-widget.php');

    $widgets_manager->register(new \Elementor_About_Widget());
    $widgets_manager->register(new \Elementor_Services_Widget());
}
add_action('elementor/widgets/register', 'register_stellar_widget');
