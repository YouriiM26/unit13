<?php
function divtag_widgets_init() {
    
	register_sidebar( array(
		'name' => 'Filters',
		'id' => 'filters',
        'class' => 'filters',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h5>',
		'after_title' => '</h5>'
	) );
    register_sidebar( array(
		'name' => 'Filters Responsive',
		'id' => 'filters_responsive',
        'class' => 'filters responsive',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h5>',
		'after_title' => '</h5>'
	) );
    
    register_sidebar( array(
		'name' => 'Categoriemenu',
		'id' => 'categoriemenu',
        'class' => 'categories',
		'before_widget' => '<nav>',
		'after_widget' => '</nav>'
	) );
    
    register_sidebar( array(
		'name' => 'Featured',
		'id' => 'featured',
        'class' => 'featured',
		'before_widget' => '<div class="featured_products">',
		'after_widget' => '</div>'
	) );
}
add_action( 'widgets_init', 'divtag_widgets_init' );