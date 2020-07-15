<?php
/**
 * Plugin Name: CB Gutenberg Blocks Hello World
 * Plugin URI: https://creativebranding.ca
 * Description: This is a simple hello world block for the Gutenberg editor.
 * Version: 1.0.0
 * Author: Zach Atkinson
 *
 * @package cb-blocks
 */

defined( 'ABSPATH' ) || exit;

/**
 * Load all translations for our plugin from the MO file.
 */
add_action( 'init', 'cb_blocks_hello_world_load_textdomain' );

function cb_blocks_hello_world_load_textdomain () {
    load_plugin_textdomain( 'cb-blocks', false, basename( __DIR__ ) . '/languages' );

}

/**
 * Registers all block assets so that they can be enqueued through Gutenberg in
 * the corresponding context.
 *
 * Passes translations to JavaScript.
 */

function cb_blocks_hello_world_register_block()
{
    // automatically load dependencies and version
    $asset_file = include(plugin_dir_path(__FILE__) . 'build/index.asset.php');

    /* Register our script we will be using to develop the plugin. Most ouf our code will be going in here! */
    wp_register_script(
        'cb-blocks-hello-world',
        plugins_url('build/index.js', __FILE__),
        $asset_file['dependencies'],
        $asset_file['version']
    );

    /* Register a gutenberg block with the script we used above */
    register_block_type( 'cb-blocks/hello-world', array(
        'editor_script' => 'cb-blocks-hello-world',
    ) );

    if ( function_exists( 'wp_set_script_translations' ) ) {
        /**
         * May be extended to wp_set_script_translations( 'my-handle', 'my-domain',
         * plugin_dir_path( MY_PLUGIN ) . 'languages' ) ). For details see
         * https://make.wordpress.org/core/2018/11/09/new-javascript-i18n-support-in-wordpress/
         */
        wp_set_script_translations( 'cb-blocks-hello-world', 'cb-blocks' );
    }
}

add_action( 'init', 'cb_blocks_hello_world_register_block' );