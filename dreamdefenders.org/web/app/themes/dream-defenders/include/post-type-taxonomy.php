<?php 
// custom post types - example

// add_action('init', 'team_post_type');
// function team_post_type() {
// 	register_post_type('employees',
// 		array(
// 			'labels' => array(
// 				'name' => __('Team'),
// 				'add_new'       => __( 'Add Member'),
// 				'singular_name' => __('Team'),
// 				'new_item'      => __( 'New Member' ),
//   			'edit_item'     => __( 'Edit Member'),
// 				'add_new_item'  => __( 'Add New Member'),
// 				'view_item'     => __( 'View Member'),
//   		  'all_items'     => __( 'View Team members'),
//   		  'search_items'  => __( 'Search Team'),
// 			),
// 			'public' => true,
// 			'has_archive' => true,
// 			'show_in_rest'=> true,
// 			'query_var' => true,
// 			'rest_base' => 'team-api',
//   		'rest_controller_class' => 'WP_REST_Posts_Controller',
// 		)
// 	);
// }
// example to add custom post types
// add_action('init', 'projects_post_type');
// function projects_post_type() {
// 	register_post_type('projects',
// 		array(
// 			'labels' => array(
// 				'name' => __('Projects'),
// 				'singular_name' => __('Project'),
// 				'add_new'       => __( 'Add Project'),
// 				'new_item'      => __( 'New Project'),
//   			'edit_item'     => __( 'Edit Project'),
// 				'add_new_item'  => __( 'Add New Project' ),
// 				'view_item'     => __( 'View Project'),
//   		  'all_items'     => __( 'View Projects'),
//   		  'search_items'  => __( 'Search Projects'),
// 			),
// 			'public' => true,
// 			'has_archive' => true,
// 			'show_in_rest'=> true,
// 			'query_var' => true,
// 			'rest_base' => 'projects-api',
//   		'rest_controller_class' => 'WP_REST_Posts_Controller',
// 			'supports'  => array( 'title', 'editor', 'thumbnail' )
// 		)
// 	);
// }

// custom taxanomy for projects - example

// add_action( 'init', 'projects_taxonomy', 30 );
//   function projects_taxonomy() {
//
//   	$labels = array(
//   		'name'              => _x( 'Project Categories', 'taxonomy general name' ),
//   		'singular_name'     => _x( 'Project Category', 'taxonomy singular name' ),
//   		'search_items'      => __( 'Search Project Categories' ),
//   		'all_items'         => __( 'All Project Categories' ),
//   		'parent_item'       => __( 'Parent Project Category' ),
//   		'parent_item_colon' => __( 'Parent Project Category:' ),
//   		'edit_item'         => __( 'Edit Project Category' ),
//   		'update_item'       => __( 'Update Project Category' ),
//   		'add_new_item'      => __( 'Add New Project Category' ),
//   		'new_item_name'     => __( 'New Project Category Name' ),
//   		'menu_name'         => __( 'Project Category' ),
//   	);
//
//   	$args = array(
//   		'hierarchical'      => true,
//   		'labels'            => $labels,
//   		'show_ui'           => true,
//   		'show_admin_column' => true,
//   		'query_var'         => true,
//   		'show_in_rest'       => true,
// 			'rest_base' => 'project-category',
//   		'rest_controller_class' => 'WP_REST_Terms_Controller',
//   	);
//
//   	register_taxonomy( 'project_category', array( 'projects' ), $args );
//
//   }
