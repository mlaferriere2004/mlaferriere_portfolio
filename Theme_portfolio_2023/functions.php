<?php

// Ajoute le support pour les images à la une au thème personnalisé
add_theme_support('post-thumbnails');

// Menu
function pw_creer_menu() {
	register_nav_menu('menu_principal', 'Menu principal');
}
add_action('init', 'pw_creer_menu');

//cpt recettes
function create_cpt_recipes() {

	$labels = array(
		'name'                  => _x( 'Recipes', 'Post Type General Name', 'Recette e.tim' ),
		'singular_name'         => _x( 'Recipe', 'Post Type Singular Name', 'Recette e.tim' ),
		'menu_name'             => __( 'Recettes', 'Recette e.tim' ),
		'name_admin_bar'        => __( 'Post Type', 'Recette e.tim' ),
		'archives'              => __( 'Item Archives', 'Recette e.tim' ),
		'attributes'            => __( 'Item Attributes', 'Recette e.tim' ),
		'parent_item_colon'     => __( 'Parent Item:', 'Recette e.tim' ),
		'all_items'             => __( 'All Items', 'Recette e.tim' ),
		'add_new_item'          => __( 'Add New Item', 'Recette e.tim' ),
		'add_new'               => __( 'ajouter recette', 'Recette e.tim' ),
		'new_item'              => __( 'nouvelle recette', 'Recette e.tim' ),
		'edit_item'             => __( 'éditer recette', 'Recette e.tim' ),
		'update_item'           => __( 'Update Item', 'Recette e.tim' ),
		'view_item'             => __( 'View Item', 'Recette e.tim' ),
		'view_items'            => __( 'View Items', 'Recette e.tim' ),
		'search_items'          => __( 'Search Item', 'Recette e.tim' ),
		'not_found'             => __( 'Not found', 'Recette e.tim' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'Recette e.tim' ),
		'featured_image'        => __( 'Featured Image', 'Recette e.tim' ),
		'set_featured_image'    => __( 'Set featured image', 'Recette e.tim' ),
		'remove_featured_image' => __( 'Remove featured image', 'Recette e.tim' ),
		'use_featured_image'    => __( 'Use as featured image', 'Recette e.tim' ),
		'insert_into_item'      => __( 'Insert into item', 'Recette e.tim' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'Recette e.tim' ),
		'items_list'            => __( 'Items list', 'Recette e.tim' ),
		'items_list_navigation' => __( 'Items list navigation', 'Recette e.tim' ),
		'filter_items_list'     => __( 'Filter items list', 'Recette e.tim' ),
	);
	$args = array(
		'label'                 => __( 'Recipe', 'Recette e.tim' ),
		'description'           => __( 'Post Type Description', 'Recette e.tim' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-food',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'recipe', $args );

}
add_action( 'init', 'create_cpt_recipes', 0 );

if(function_exists('acf_add_options_page')) {

	//on ajoute une page d'option
	acf_add_options_page(array(
		'page_title' => 'Options générales',
		'menu_title' => 'Options générales',
		'menu_slug' => 'theme-options-generales',
		'capability' => 'edit_posts',
		'redirect' => false
	));
}