<?php
/* Backgrounds */
function team4_post_type_backgrounds() {

    register_post_type( 'background',
            array(
                'label' => __('Backgrounds'),
                'public' => true,
//                'taxonomies' => array('post_tag'),
                'show_ui' => true,
                'show_in_nav_menus' => true,
                'hierarchical' => false,
                'menu_position' => 5,
                'supports' => array(
                    'title',
                    'editor',
                    'thumbnail',
                    'excerpt',
                    'custom-fields',
                ))
            );
/*
    register_taxonomy('regions', 'artwork', 
        array('hierarchical' => true, 
                    'label' => __('Project Regions'), 
                    'singular_name' => 'region',
                    'rewrite' => false,
            ));

    register_taxonomy('services', 'artwork', 
        array('hierarchical' => true, 
                    'label' => __('Project Service Types'), 
                    'singular_name' => 'service',
                    'rewrite' => false,
            ));

    flush_rewrite_rules();
*/
}
add_action('init', 'team4_post_type_backgrounds');