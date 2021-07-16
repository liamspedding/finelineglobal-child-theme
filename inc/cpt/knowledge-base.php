<?php

// Register Custom Post Type
function finelineglobal_job_knowledge_base_custom_post_type() {

    $single = 'Knowledge Base Article';
    $plural = 'Knowledge Base Articles';

	$labels = array(
		'name'                  => _x( $plural, 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( $single, 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Knowledge Base', 'text_domain' ),
		'name_admin_bar'        => __( $single, 'text_domain' ),
		'archives'              => __( $single.' Archives', 'text_domain' ),
		'attributes'            => __( $single.' Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent '.$single.':', 'text_domain' ),
		'all_items'             => __( 'All '.$plural, 'text_domain' ),
		'add_new_item'          => __( 'Add New '.$single, 'text_domain' ),
		'add_new'               => __( 'Add New '. $single, 'text_domain' ),
		'new_item'              => __( 'New Item '.$single, 'text_domain' ),
		'edit_item'             => __( 'Edit Item '.$single, 'text_domain' ),
		'update_item'           => __( 'Update Item '.$single, 'text_domain' ),
		'view_item'             => __( 'View Item '.$single, 'text_domain' ),
		'view_items'            => __( 'View '.$plural, 'text_domain' ),
		'search_items'          => __( 'Search Item '.$single, 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into '.$single, 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this '.$single, 'text_domain' ),
		'items_list'            => __( $plural.' list', 'text_domain' ),
		'items_list_navigation' => __( $plural.' list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter '.$single.' list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( $single, 'text_domain' ),
		'description'           => __( $single, 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
        'menu_icon'             => 'dashicons-grid-view',
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'knowledge-base', $args );

}
add_action( 'init', 'finelineglobal_job_knowledge_base_custom_post_type', 0 );

?>