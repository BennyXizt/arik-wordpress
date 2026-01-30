<?php

class Custom_Customize {
    private $theme_id;
    public function __construct($theme_id = null) {
        if(!$theme_id) {
            $theme_id = sanitize_key(wp_get_theme()->get('Name'));
        }
        $this->theme_id = $theme_id;
        add_action('customize_register', [$this, 'init']);
    }
    public function init($wp_customize) {
        $this->site_identity_keywords_register($wp_customize);
        $this->site_identity_site_owner($wp_customize);
        $this->copyright_label($wp_customize);
        $this->copyright_button($wp_customize);
    }
    private function site_identity_keywords_register($wp_customize) {
        $wp_customize->add_setting($this->theme_id . '_header_keywords', [
            'default' => 'wordpress, blog',
            'sanitize_callback' => 'sanitize_text_field'
        ]);

        $wp_customize->add_control($this->theme_id . '_header_keywords', [
            'label' => __('Meta Keywords', $this->theme_id),
            'section' => 'title_tagline',
            'type' => 'text'
        ]);
    }
    private function site_identity_site_owner($wp_customize) {
        $wp_customize->add_setting($this->theme_id . '_header_site_owner', [
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        ]);

        $wp_customize->add_control($this->theme_id . '_header_site_owner', [
            'label' => __('Site Owner', $this->theme_id),
            'section' => 'title_tagline',
            'type' => 'text'
        ]);
    }
    private function copyright_label($wp_customize) {
        $wp_customize->add_panel('footer_panel', [
            'title' => __('Footer', $this->theme_id),
            'priority' => 120,
        ]);

        $wp_customize->add_section('copyright_section_label', [
            'title' => __('Copyright', $this->theme_id),
            'panel' => 'footer_panel'
        ]);

        $wp_customize->add_setting($this->theme_id . '_copyright_label', [
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        ]);

        $wp_customize->add_control($this->theme_id . '_copyright_label', [
            'label' => __('Copyright', $this->theme_id),
            'section' => 'copyright_section_label',
            'type' => 'text'
        ]);
    }
    private function copyright_button($wp_customize) {
        $wp_customize->add_section('copyright_section_button', [
            'title' => __('Button', $this->theme_id),
            'panel' => 'footer_panel'
        ]);

        $wp_customize->add_setting($this->theme_id . '_copyright_button_label', [
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        ]);

        $wp_customize->add_control($this->theme_id . '_copyright_button_label', [
            'label' => __('Label', $this->theme_id),
            'section' => 'copyright_section_button',
            'type' => 'text'
        ]);

        $wp_customize->add_setting($this->theme_id . '_copyright_button_icon_name', [
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        ]);

        $wp_customize->add_control($this->theme_id . '_copyright_button_icon_name', [
            'label' => __('Icon Name', $this->theme_id),
            'section' => 'copyright_section_button',
            'type' => 'text'
        ]);


        $wp_customize->add_setting($this->theme_id . '_copyright_button_scroll', [
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        ]);

        $wp_customize->add_control($this->theme_id . '_copyright_button_scroll', [
            'label' => __('Scroll To', $this->theme_id),
            'section' => 'copyright_section_button',
            'type' => 'text'
        ]);
    }
}
