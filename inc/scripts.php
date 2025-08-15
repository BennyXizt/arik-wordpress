<?php


function mytheme_enqueue_assets_register() {
    wp_enqueue_style('theme-metadata', get_stylesheet_uri());
    wp_enqueue_style('custom-main-style', get_template_directory_uri() . '', [], wp_get_theme()->get('Version'));

    wp_enqueue_script('custom-main-js', get_template_directory_uri() . '', [], wp_get_theme()->get('Version'), true);
}


add_action('wp_enqueue_scripts', 'mytheme_enqueue_assets_register');