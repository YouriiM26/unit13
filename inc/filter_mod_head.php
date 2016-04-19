<?php
	// Viewport meta
	function dt_viewport_meta_tag() {
		echo '<meta name="viewport" content="width=device-width, initial-scale=1.0"/>';
	}
	add_action( 'wp_head', 'dt_viewport_meta_tag' );

	// add ie conditional html5 shim to header
	function add_ie_html5_shim () {
		if(preg_match('/MSIE [1-8]/i',$_SERVER['HTTP_USER_AGENT'])){
			echo "<!--[if lt IE 9]>\n";
			echo '<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>'."\n";
			echo "<![endif]-->\n";
		}
	}
	add_action('wp_head', 'add_ie_html5_shim', 50);;

	// Add favicon
	function blog_favicon() {
	  echo '<link rel="Shortcut Icon" type="image/x-icon" href="'.DT_THEME_DIR.'/favicon.ico" />';
	}
	add_action('wp_head', 'blog_favicon');

	// Clean the head
	add_action('after_setup_theme','start_cleanup');

	function start_cleanup() {
		// Initialize the cleanup
		add_action('init', 'cleanup_head');
	} 

	// WordPress cleanup function
	function cleanup_head() {
		// EditURI link
		remove_action( 'wp_head', 'rsd_link' );

		// Category feed links
		remove_action( 'wp_head', 'feed_links_extra', 3 );

		// Post and comment feed links
		remove_action( 'wp_head', 'feed_links', 2 );
		  
		// Windows Live Writer
		remove_action( 'wp_head', 'wlwmanifest_link' );

		// Index link
		remove_action( 'wp_head', 'index_rel_link' );

		// Previous link
		remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );

		// Start link
		remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );

		// Canonical
		remove_action('wp_head', 'rel_canonical', 10, 0 );

		// Shortlink
		remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );

		// Links for adjacent posts
		remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

		// WP version
		remove_action( 'wp_head', 'wp_generator' );	

		// all actions related to emojis
		remove_action( 'admin_print_styles', 'print_emoji_styles' );
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
		remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
		remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

		// filter to remove TinyMCE emojis
		add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
	}