<?php
function register_my_menus() {
  register_nav_menus(
    array(
    	'main-nav' => __( 'Main Nav' ),
        'categorie-nav' => __( 'Categorie Nav' ),
    	'footer-nav' => __( 'Footer Nav' ),
        'footermenu1-nav' => __( 'Footermenu1 Nav' ),
        'footermenu2-nav' => __( 'Footermenu2 Nav' ),
        'footermenu3-nav' => __( 'Footermenu3 Nav' ),
        'footermenu4-nav' => __( 'Footermenu4 Nav' )
	)
  );
}
add_action( 'init', 'register_my_menus' );