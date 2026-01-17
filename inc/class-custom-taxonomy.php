<?php

class Custom_Taxonomy {
    private $types = [
        'work_category' => [
            'postTypes'     => ['work'],
            'labels'        => [
                'name'              => 'Categories',
                'singular_name'     => 'Category',
                'search_items'      => 'Search Categories',
                'all_items'         => 'All Categories',
                'edit_item'         => 'Edit Category',
                'add_new_item'      => 'Add New Category',
                'menu_name'         => 'Categories',
            ],
            'hierarchical' => false,
            'rewrite' => ['slug' => 'services/type']
        ],
    ];

    public function __construct() {
        add_action('init', [$this, 'init']);
    }
    public function init() {
        foreach($this->types as $slug => $config) {
            register_taxonomy($slug, $config['postTypes'], [
                'labels' => $config['labels'],
                'hierarchical' => $config['hierarchical'],
                'show_ui'      => true,
                'show_admin_column' => true,
                'rewrite'      => $config['rewrite'],
                'show_in_rest' => true, 
            ]);
        }
    }
}