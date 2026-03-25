<?php
/**
 * Plugin Name: Cards Grid Block
 * Description: A block that displays a grid of cards with a title and description.
 * Version: 1.0.0
 */

if (!defined('ABSPATH')) {
	exit;
}

function cards_grid_block_load_textdomain() {
	load_plugin_textdomain(
		'cards-grid-block',
		false,
		dirname(plugin_basename(__FILE__)) . '/languages'
	);
}
add_action('plugins_loaded', 'cards_grid_block_load_textdomain');

function cards_grid_block_editor_assets() {
	$asset_path = plugin_dir_path(__FILE__) . 'build/index.asset.php';
	$asset      = file_exists($asset_path) ? require $asset_path : array('dependencies' => array(), 'version' => null);
	$script_ver = !empty($asset['version']) ? $asset['version'] : filemtime(plugin_dir_path(__FILE__) . 'build/index.js');

	$script_deps = !empty($asset['dependencies']) ? $asset['dependencies'] : array();

	$css_path = plugin_dir_path(__FILE__) . 'build/style-index.css';
	$css_ver  = file_exists($css_path) ? filemtime($css_path) : $script_ver;

	wp_enqueue_script(
		'cards-grid-block-editor',
		plugin_dir_url(__FILE__) . 'build/index.js',
		$script_deps,
		$script_ver,
		true
	);

	wp_enqueue_style(
		'cards-grid-block-editor-style',
		plugin_dir_url(__FILE__) . 'build/style-index.css',
		array(),
		$css_ver
	);
}
add_action('enqueue_block_editor_assets', 'cards_grid_block_editor_assets');


function cards_grid_block_front_assets() {
	$css_path = plugin_dir_path(__FILE__) . 'build/style-index.css';
	$css_ver  = file_exists($css_path) ? filemtime($css_path) : false;

	$masonry_path = plugin_dir_path(__FILE__) . 'js/masonry.js';
	$masonry_ver  = file_exists($masonry_path) ? filemtime($masonry_path) : false;

	wp_enqueue_style(
		'cards-grid-block-style',
		plugin_dir_url(__FILE__) . 'build/style-index.css',
		array(),
		$css_ver
	);

	if ($masonry_ver) {
		wp_enqueue_script(
			'cards-grid-block-masonry',
			plugin_dir_url(__FILE__) . 'js/masonry.js',
			array(),
			$masonry_ver,
			true
		);
	}
}
add_action('enqueue_block_assets', 'cards_grid_block_front_assets');



function cards_grid_block_register_patterns() {
	if (!function_exists('register_block_pattern')) {
		return;
	}


	register_block_pattern_category(
		'cards-grid-block',
		array(
			'label' => __('Cards Grid', 'cards-grid-block'),
		)
	);


	register_block_pattern(
		'cards-grid-block/cards-grid-pattern',
		array(
			'title' => __('Cards Grid section', 'cards-grid-block'),
			'description' => __('Section with cards grid', 'cards-grid-block'),
			'categories' => array('cards-grid-block'),
			'content' =>
				'<!-- wp:cards-grid-block/cards-grid /-->'
		)
	);
}
add_action('init', 'cards_grid_block_register_patterns');
