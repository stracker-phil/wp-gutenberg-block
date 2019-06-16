<?php
/**
 * Enqueue the Gutenberg JS/CSS files to wp-admin and front end.
 *
 * @package ClientName\PluginName
 */

namespace ClientName\PluginName;

add_action(
	'enqueue_block_editor_assets',
	__NAMESPACE__ . '\enqueue_block_editor_assets'
);

/**
 * Enqueue block editor only JavaScript and CSS.
 */
function enqueue_block_editor_assets() {
	$style_path  = '/assets/css/blocks.editor.css';
	$script_path = '/assets/js/blocks.editor.js';

	// Enqueue the bundled block JS file.
	wp_enqueue_script(
		'wpblock-block-editor',
		_get_plugin_url() . $script_path,
		[ 'wp-i18n', 'wp-element', 'wp-blocks', 'wp-components', 'wp-editor' ],
		filemtime( _get_plugin_directory() . $script_path )
	);

	// Enqueue optional editor only styles.
	wp_enqueue_style(
		'wpblock-block-editor',
		_get_plugin_url() . $style_path,
		[],
		filemtime( _get_plugin_directory() . $style_path )
	);
}

add_action(
	'enqueue_block_assets',
	__NAMESPACE__ . '\enqueue_assets'
);

/**
 * Enqueue front end and editor JavaScript and CSS assets.
 */
function enqueue_assets() {
	$style_path = '/assets/css/blocks.common.css';

	wp_enqueue_style(
		'wpblock-block-common',
		_get_plugin_url() . $style_path,
		null,
		filemtime( _get_plugin_directory() . $style_path )
	);
}

add_action(
	'enqueue_block_assets',
	__NAMESPACE__ . '\enqueue_frontend_assets'
);

/**
 * Enqueue frontend JavaScript and CSS assets.
 */
function enqueue_frontend_assets() {
	// If in the backend, bail out.
	if ( is_admin() ) {
		return;
	}

	$style_path  = '/assets/css/blocks.frontend.css';
	$script_path = '/assets/js/blocks.frontend.js';

	wp_enqueue_script(
		'wpblock-block-front',
		_get_plugin_url() . $script_path,
		[],
		filemtime( _get_plugin_directory() . $script_path )
	);

	wp_enqueue_style(
		'wpblock-block-front',
		_get_plugin_url() . $style_path,
		null,
		filemtime( _get_plugin_directory() . $style_path )
	);
}
