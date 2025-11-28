<?php
/**
 * Plugin Name: Cards Grid Block
 * Description: A block that displays a grid of cards with a title and description.
 * Version: 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Скрипт и стили для редактора (где Gutenberg)
 */
function cards_grid_block_editor_assets() {
	wp_enqueue_script(
		'cards-grid-block-editor',
		plugin_dir_url( __FILE__ ) . 'build/index.js',
		array( 'wp-blocks', 'wp-element', 'wp-editor', 'wp-components', 'wp-i18n', 'wp-block-editor' ),
		filemtime( plugin_dir_path( __FILE__ ) . 'build/index.js' ),
		true
	);

	wp_enqueue_style(
		'cards-grid-block-editor-style',
		plugin_dir_url( __FILE__ ) . 'build/style-index.css',
		array(),
		filemtime( plugin_dir_path( __FILE__ ) . 'build/style-index.css' )
	);
}
add_action( 'enqueue_block_editor_assets', 'cards_grid_block_editor_assets' );

/**
 * Стили на фронте
 */
function cards_grid_block_front_assets() {
	wp_enqueue_style(
		'cards-grid-block-style',
		plugin_dir_url( __FILE__ ) . 'build/style-index.css',
		array(),
		filemtime( plugin_dir_path( __FILE__ ) . 'build/style-index.css' )
	);
}
add_action( 'enqueue_block_assets', 'cards_grid_block_front_assets' );


/**
 * Регистрация категории паттерна и самого паттерна
 */
function cards_grid_block_register_patterns() {
	if ( ! function_exists( 'register_block_pattern' ) ) {
		return; // старая версия WP
	}

	// Категория для наших паттернов
	register_block_pattern_category(
		'cards-grid-block',
		array(
			'label' => __( 'Cards Grid', 'cards-grid-block' ),
		)
	);

	// Паттерн с одним нашим блоком
	register_block_pattern(
		'cards-grid-block/cards-grid-pattern',
		array(
			'title'       => __( 'Cards Grid section', 'cards-grid-block' ),
			'description' => __( 'Section with cards grid', 'cards-grid-block' ),
			'categories'  => array( 'cards-grid-block' ),
			'content'     =>
				'<!-- wp:cards-grid-block/cards-grid /-->'
		)
	);
}
add_action( 'init', 'cards_grid_block_register_patterns' );