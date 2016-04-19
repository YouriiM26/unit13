<?php

function theme_scripts() {
	//wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_style('style', get_bloginfo('template_directory') . '/style.css', false, '1.0');
    wp_enqueue_style('slickstyle', DT_THEME_DIR .  '/bower_components/slick-carousel/slick/slick.css', false, '1.0');
	wp_deregister_script('jquery');
	//wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://code.jquery.com/jquery-latest.min.js", false, null);
	wp_enqueue_script('jquery', DT_THEME_DIR .  '/bower_components/jquery/dist/jquery.min.js', false, null);

	wp_enqueue_script('magnific-popup', DT_THEME_DIR .  '/bower_components/magnific-popup/dist/jquery.magnific-popup.min.js', false, null);

	wp_enqueue_script('bootstrap', DT_THEME_DIR .  '/bower_components/bootstrap-sass-official/assets/javascripts/bootstrap.min.js', false, null);
    
    wp_enqueue_script('slick', DT_THEME_DIR .  '/bower_components/slick-carousel/slick/slick.min.js', false, null);

	wp_enqueue_script( 'application-scripting', DT_THEME_DIR . '/assets/js/min/app.min.js', array(), '1.0.0', true );

	wp_enqueue_script( 'webfontloader', '//ajax.googleapis.com/ajax/libs/webfont/1.5.18/webfont.js', array(), '1.5.18', true );

	wp_enqueue_script( 'fonts', DT_THEME_DIR . '/assets/js/min/fonts.min.js', array(), '1.0.0', true );
}

add_action( 'wp_enqueue_scripts', 'theme_scripts' );

?>