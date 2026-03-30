<?php
/**
 * Plugin Name: Image Card Block
 * Description: Custom Gutenberg block: Image Card.
 * Version: 1.0.0
 * Author: You
 * Requires at least: 6.0
 * Requires PHP: 7.4
 */

if (!defined('ABSPATH')) {
	exit;
}
function icb_register_block() {
	register_block_type(__DIR__ . '/build/');

}

add_action('init', 'icb_register_block');
