<?php

//Example Post-type

// function register_foo_post_type(){
// 	register_post_type('foo', array(
// 	    'show_ui' => true,
// 	    'exclude_from_search' => false,
// 	    'supports' => array('title','revisions','comments'),
// 	    'public' => true,
// 	    'capability_type' => 'post',
// 	    'hierarchical' => true,
// 	    'has_archive' => true,
// 	    'publicly_queryable' => true,
// 	    'query_var' => true,
// 	    'rewrite' => true,
// 	    'rewrite' => array('slug' => 'foo_slug'),
// 	    'labels' => array(
// 	        'name' => __('name'),
// 	        'singular_name' => __('singular_name'),
// 	        'add_new' => __('add_new'),
// 	        'add_new_item' => __('add_new_item'),
// 	        'edit' => __('edit'),
// 	        'edit_item' => __('edit_item'),
// 	        'new_item' => __('new_item'),
// 	        'view' => __('view'),
// 	        'view_item' => __('view_item'),
// 	        'search_items' => __('search_items'),
// 	        'not_found' => __('not_found'),
// 	        'not_found_in_trash' => __('not_found_in_trash'),
// 	        'parent' => __('parent'),
// 	        ))
// 	);
	
// }



// Example Category



// function create_category_taxonomies() {
//   $labels = array(
//     'name' => _x( 'Category', 'taxonomy general name' ),
//     'singular_name' => _x( 'Category', 'taxonomy singular name' ),
//     'search_items' =>  __( 'search_items' ),
//     'all_items' => __( 'all_items' ),
//     'parent_item' => __( 'parent_item' ),
//     'parent_item_colon' => __( 'parent_item_colon' ),
//     'edit_item' => __( 'edit_item' ), 
//     'update_item' => __( 'update_item' ),
//     'add_new_item' => __( 'add_new_item' ),
//     'new_item_name' => __( 'new_item_name' ),
//     'menu_name' => __( 'menu_name' ),
//   );  



//   register_taxonomy('category',
//     array( 'foo'),
//     array(
//     'hierarchical' => true,
//     'labels' => $labels,
//     'show_ui' => true,
//     'query_var' => true,
//     'rewrite' => array( 'slug' => 'category' ),
//   ));

// }


// Example: tags


// function create_tag_taxonomies() {
//   $labels = array(
//     'name' => _x( 'Tags', 'taxonomy general name' ),
//     'singular_name' => _x( 'Tag', 'taxonomy singular name' ),
//     'search_items' =>  __( 'search_items' ),
//     'all_items' => __( 'all_items' ),
//     'parent_item' => __( 'parent_item' ),
//     'parent_item_colon' => __( 'parent_item_colon' ),
//     'edit_item' => __( 'edit_item' ), 
//     'update_item' => __( 'update_item' ),
//     'add_new_item' => __( 'add_new_item' ),
//     'new_item_name' => __( 'new_item_name' ),
//     'menu_name' => __( 'menu_name' ),
//   ); 	

//   register_taxonomy('tag',
//   	array( 'foo'),
//    	array(
//     'hierarchical' => false,
//     'labels' => $labels,
//     'show_ui' => true,
//     'query_var' => true,
//     'rewrite' => array( 'slug' => 'tag' ),
//   ));
// }







//  add Post Type

// add_action( 'init', 'register_foo_post_type');
// add_action( 'init', 'create_category_taxonomies', 0);
// add_action( 'init', 'create_tag_taxonomies', 0);


