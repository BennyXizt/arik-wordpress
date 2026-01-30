<?php

class Custom_Post_Type {
    private $types = [
        'testimonial' => [
            'labels' => [
                'name'          => 'Testimonials',
                'singular_name' => 'Testimonial',
            ],
            'menu_icon'     => 'dashicons-testimonial',
        ],
        'work_cpt' => [
            'labels' => [
                'name' => 'Works',
                'singular_name' => 'Work',
            ],
            'menu_icon'     => 'dashicons-portfolio',
            'taxonomies' => ['category'],
            'has_archive' => false,
            'rewrite'       => [
                'slug'       => 'work',
            ],
        ],
        'service_list' => [
            'labels' => [
                'name'          => 'Services',
                'singular_name' => 'Service',
            ],
            'taxonomies' => ['category'],
            'has_archive' => false,
            'publicly_queryable' => true,
            'rewrite'       => [
                'slug'       => 'services',
            ],
        ]
    ];

    public function __construct() {
        add_action('init', [$this, 'init']);
        add_filter('post_type_link', [$this, 'redirect_to_page'], 10, 4);
    }
    public function redirect_to_page($link, $post, $leavename, $sample) {
        if ($post->post_type === 'service_list' ) {
            if(!empty($terms = get_the_terms($post->ID, 'category'))) {
                return home_url('/services#' . $terms[0]->slug);
            }
            return home_url('/services');
        }
        return $link;
    }
    public function init() {
        foreach($this->types as $slug => $config) {
            register_post_type($slug, array_merge([
                'public'        => true,
                'show_in_rest'  => true, 
                'has_archive'   => true,
                'supports'      => ['title', 'editor', 'thumbnail'],
                'menu_icon'     => 'dashicons-editor-ul',
            ], $config));
        }
    }
}