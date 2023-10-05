<?php
/*
Plugin Name: Timeline Block
Plugin URI: https://creatorcourses.com Description: Icreates a simple block using ACF for Gutenberg for Freelancers course
Version: 1.0.0
Author: Autor
Author URI: https://casabona.org
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html

*/

if (!defined('ABSPATH')) {
    exit;
}

define('PREFIX', 'cc_');
define('CC_VERSION', '1.0.0');
define('CC_PATH', plugin_dir_path(__FILE__));

add_action('acf/init', 'cc_define_block');
function cc_define_block()
{


    if (function_exists('acf_register_block')) {
        acf_register_block(array(
            'name'              => 'timeline',
            'title'             => __('Timeline'),
            'description'       => __('A custom timeline block.'),
            'render_callback'   => 'cc_render_timeline_block',
            'category'          => 'layout',
            'icon'              => 'backup',
            'keywords'          => array('timeline', 'events', 'acf'),
        ));
    }
}

function cc_render_timeline_block($block)
{
    $slug = str_replace('acf/', '', $block['name']);
    if (file_exists(CC_PATH . "template-parts/block/content-{$slug}.php")) {
        include(CC_PATH . "template-parts/block/content-{$slug}.php");
    }
}
