<?php
function register_my_menus() {
    register_nav_menus([
        'header_menu' => __('Header Menu', W_THEME),
        'footer_menu' => __('Footer Menu', W_THEME)
    ]);
}


add_action('after_setup_theme', 'register_my_menus');
