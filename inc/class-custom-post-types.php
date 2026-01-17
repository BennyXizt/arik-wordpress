<?php

class Custom_Post_Type {
    private $types = [
        'testimonial' => [
            'labels' => [
                'name'          => 'Testimonials',
                'singular_name' => 'Testimonial',
            ],
            'supports'      => ['title', 'editor', 'thumbnail'],
            'menu_icon'     => 'dashicons-testimonial',
        ],
        'work_cpt' => [
            'labels' => [
                'name' => 'Works',
                'singular_name' => 'Work',
            ],
            'supports'      => ['title', 'editor', 'thumbnail'],
            'menu_icon'     => 'dashicons-portfolio',
        ]
    ];

    public function __construct() {
        add_action('init', [$this, 'init']);
    }
    public function init() {
        foreach($this->types as $slug => $config) {
            register_post_type($slug, array_merge($config, [
                'public'        => true,
                'show_in_rest'  => true, 
                'has_archive'   => true,
            ]));
        }
    }
}