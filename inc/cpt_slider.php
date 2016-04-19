<?php

register_post_type( 'post_type_slider',
	array(
		'labels' => array(
			'name' => __( 'Slider' ),
			'singular_name' => __( 'Slide' ),
			'add_new' => __( 'Nieuwe slide' ),
			'add_new_item' => __( 'Voeg nieuwe slide toe' ),
			'edit' => __( 'Bewerken' ),
			'edit_item' => __( 'Bewerk slide' ),
			'new_item' => __( 'Nieuwe slide' ),
			'view' => __( 'Bekijk slide' ),
			'view_item' => __( 'Bekijk slide' ),
			'search_items' => __( 'Zoek slide' ),
			'not_found' => __( 'Whoops! Geen slide gevonden' ),
			'not_found_in_trash' => __( 'Geen slide in prullebak' ),
			'parent' => __( 'Hoofd slide' ),
		),
		'menu_icon' => 'dashicons-images-alt2',
		'public' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'menu_position' => 26,
		'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
		'rewrite' =>  array( 'slug' => 'slides', 'with_front' => false ),
		'exclude_from_search' => false,
		'taxonomies' =>  array('category')
	)
);

?>