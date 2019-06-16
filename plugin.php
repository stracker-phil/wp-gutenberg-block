<?php
/**
 * WordPress plugin template to create custom Gutenberg blocks.
 *
 * Based on Zac Gordons excellent Gutenberg Development course:
 * https://gutenberg.courses/development
 *
 * @package     ClientName\PluginName
 * @author      Philipp Stracker
 * @license     GPL2+
 *
 * Plugin Name: Gutenberg Block Templatee
 * Plugin URI:  https://philippstracker.com
 * Description: Plugin template for new Gutenberg blocks.
 * Version:     1.0.0
 * Author:      Philipp Stracker
 * Author URI:  https://philippstracker.com
 * Text Domain: wpblock
 * Domain Path: /languages
 * License:     GPL2+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

namespace ClientName\PluginName;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Gets this plugin's absolute directory path.
 *
 * @since  2.1.0
 * @ignore
 * @access private
 *
 * @return string
 */
function _get_plugin_directory() {
	return __DIR__;
}

/**
 * Gets this plugin's URL.
 *
 * @since  2.1.0
 * @ignore
 * @access private
 *
 * @return string
 */
function _get_plugin_url() {
	static $plugin_url;

	if ( empty( $plugin_url ) ) {
		$plugin_url = plugins_url( null, __FILE__ );
	}

	return $plugin_url;
}

// Enqueue JS and CSS.
require_once __DIR__ . '/lib/enqueue-scripts.php';

// Register meta boxes.
require_once __DIR__ . '/lib/meta-boxes.php';

// Block Templates.
require_once __DIR__ . '/lib/block-templates.php';

// Dynamic Blocks.
require_once __DIR__ . '/blocks/12-dynamic/index.php';
