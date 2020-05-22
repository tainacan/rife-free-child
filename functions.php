<?php
/**
 * Rife-free-child Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package rife-free-child
 */

add_action( 'wp_enqueue_scripts', 'rife_free_parent_theme_enqueue_styles' );

/**
 * Enqueue scripts and styles.
 */
function rife_free_parent_theme_enqueue_styles() {
	wp_enqueue_style( 'rife-free-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'rife-free-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		array( 'rife-free-style' )
	);

}

/**
 * Display in gutenberg plugin the full width for image
 */
function rife_free_child_setup() {
	add_theme_support( 'align-wide' );
}
add_action( 'after_setup_theme', 'rife_free_child_setup' );

/**
 * Enqueues JS scripts
 */
function rife_free_child_scripts() {
	wp_register_script( 'rife-free-child-scripts', get_stylesheet_directory_uri() . '/scripts.js', []);
	wp_enqueue_script( 'rife-free-child-scripts' );
}
add_action( 'wp_enqueue_scripts', 'rife_free_child_scripts' );  
