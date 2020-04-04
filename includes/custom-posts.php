<?php

if ( ! function_exists('suppke_custom_post_type') ) {
	
    /**
     * Register a custom post type.
     *
     * @link http://codex.wordpress.org/Function_Reference/register_post_type
     */
    function suppke_custom_post_type() {

        //portfolio
        register_post_type(
            'portfolio', array(
            'labels'                 => array(
                'name'               => _x( 'Portfolio', 'post type general name', 'suppke' ),
                'singular_name'      => _x( 'Portfolio', 'post type singular name', 'suppke' ),
                'menu_name'          => _x( 'Portfolio', 'admin menu', 'suppke' ),
                'name_admin_bar'     => _x( 'Portfolio', 'add new on admin bar', 'suppke' ),
                'add_new'            => _x( 'Add New', 'Portfolio', 'suppke' ),
                'add_new_item'       => __( 'Add New Portfolio', 'suppke' ),
                'new_item'           => __( 'New Portfolio', 'suppke' ),
                'edit_item'          => __( 'Edit Portfolio', 'suppke' ),
                'view_item'          => __( 'View Portfolio', 'suppke' ),
                'all_items'          => __( 'All Portfolio', 'suppke' ),
                'search_items'       => __( 'Search Portfolio', 'suppke' ),
                'parent_item_colon'  => __( 'Parent Portfolio:', 'suppke' ),
                'not_found'          => __( 'No Portfolio found.', 'suppke' ),
                'not_found_in_trash' => __( 'No Portfolio found in Trash.', 'suppke' )
            ),

            'description'        => __( 'Description.', 'suppke' ),
            'menu_icon'          => 'dashicons-layout',
            'public'             => true,
            'show_in_menu'       => true,
            'has_archive'        => false,
            'hierarchical'       => true,
            'rewrite'            => array( 'slug' => 'portfolio' ),
            'supports'           => array( 'title', 'editor', 'thumbnail' )
        ));

        // portfolio taxonomy
        register_taxonomy(
            'portfolio_category',
            'portfolio',
            array(
                'labels' => array(
                    'name' => __( 'Portfolio Category', 'suppke' ),
                    'add_new_item'      => __( 'Add New Category', 'suppke' ),
                ),
                'hierarchical' => true,
                'show_admin_column'     => true
        ));
    }

    add_action( 'init', 'suppke_custom_post_type' );

}