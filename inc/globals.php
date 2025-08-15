<?php


function mytheme_define_theme_constants() {
    define('W_THEME_ROOT', get_template_directory_uri());
    define('W_MEDIA_DIR', W_THEME_ROOT . '/assets/media');
    define('W_THEME', sanitize_key(wp_get_theme()->get('Name')));
}

add_action('after_setup_theme', 'mytheme_define_theme_constants');