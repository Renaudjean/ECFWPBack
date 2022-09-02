<?php 
/*
Plugin Name: My CPT plugin
Plugin URI: 
Description: Example Plugin for youtube
Author: renaud
Author URI:
Version: 0.1
*/

function product_post_type() {
    register_post_type( 'products',
        array(
            'labels' => array(
                'name' => __( 'Products' ),
                'singular_name' => __( 'product' )
            ),
            'public' => true,
            'show_in_rest' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'has_archive' => true,
        'rewrite'   => array( 'slug' => 'my-products' ),
            'menu_position' => 5,
        'menu_icon' => 'dashicons-games',
        // 'taxonomies' => array('techs', 'post_tag') // this is IMPORTANT
        )
    );
}
add_action( 'init', 'product_post_type' );

//// Add cuisines taxonomy
function create_products_taxonomy() {
    register_taxonomy('techs','products',array(
        'hierarchical' => false,
        'labels' => array(
            'name' => _x( 'Techs', 'taxonomy general name' ),
            'singular_name' => _x( 'Tech', 'taxonomy singular name' ),
            'menu_name' => __( 'Techs' ),
            'all_items' => __( 'All Techs' ),
            'edit_item' => __( 'Edit Tech' ), 
            'update_item' => __( 'Update Tech' ),
            'add_new_item' => __( 'Add Tech' ),
            'new_item_name' => __( 'New Tech' ),
        ),
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    ));
    register_taxonomy('details','products',array(
        'hierarchical' => false,
        'labels' => array(
            'name' => _x( 'Details', 'taxonomy general name' ),
            'singular_name' => _x( 'Detail', 'taxonomy singular name' ),
            'menu_name' => __( 'Details' ),
            'all_items' => __( 'All Details' ),
            'edit_item' => __( 'Edit Detail' ), 
            'update_item' => __( 'Update Detail' ),
            'add_new_item' => __( 'Add Detail' ),
            'new_item_name' => __( 'New Detail' ),
        ),
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    ));
}
add_action( 'init', 'create_products_taxonomy', 0 );
?>