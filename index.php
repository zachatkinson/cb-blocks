<?php

/**
 * Plugin Name: CB Gutenberg Blocks
 * Plugin URI: https://creativebranding.ca
 * Description: A collection of handy Gutenberg blocks for content creation.
 * Version: 1.0.0
 * Author: Zach Atkinson
 *
 * @package cb-blocks
 */

defined( 'ABSPATH' ) || exit;

function cb_block_categories( $categories, $post ) {
    if ( $post->post_type !== 'post' ) {
        return $categories;
    }
    return array_merge(
        $categories,
        array(
            array(
                'slug' => 'cb-blocks',
                'title' => __( 'Creative Branding Blocks', 'cb-blocks' ),
            ),
        )
    );
}
add_filter( 'block_categories', 'cb_block_categories', 10, 2 );

include 'hello-world/index.php';
include 'album-art/index.php';

