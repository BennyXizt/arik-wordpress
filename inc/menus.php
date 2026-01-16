<?php
function register_my_menus() {
    register_nav_menus([
        'header_menu' => __('Header Menu', W_THEME),
        'header_buttons' => __('Header Buttons', W_THEME),
        'socials' => __('Socials', W_THEME),
        'footer_menu' => __('Footer Menu', W_THEME)
    ]);
}


add_action('after_setup_theme', 'register_my_menus');
