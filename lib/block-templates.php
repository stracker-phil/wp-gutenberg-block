<?php
/**
 * Block templates allow to specify a default initial state for an editor session.
 *
 * Enable the filter if you want to define such a default state for any post type.
 *
 * @package ClientName\PluginName
 */

namespace ClientName\PluginName;

/*
add_filter(
	'register_post_type_args',
	__NAMESPACE__ . '\add_template_to_post_type',
	20, 2
);
*/

/**
 * A custom post type can register its own template during registration:
 * https://developer.wordpress.org/block-editor/developers/block-api/block-templates/#custom-post-types
 *
 * @param array  $args      Post type args.
 * @param string $post_type Post type name.
 * @return array Modified post type args.
 */
function add_template_to_post_type( $args, $post_type ) {

	if ( 'post' !== $post_type ) {
		return $args;
	}

	$args['template_lock'] = true;
	$args['template']      = [
		[
			'core/image',
			[
				'align' => 'left',
			],
		],
		[
			'core/paragraph',
			[
				'placeholder' => 'The only thing you can add',
			],
		],
	];

	return $args;
}
