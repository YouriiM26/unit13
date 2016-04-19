<?php
add_action('wp_dashboard_setup', 'divtag_custom_dashboard_widgets');

function divtag_custom_dashboard_widgets() {
global $wp_meta_boxes;

wp_add_dashboard_widget('custom_help_widget', 'Website Support', 'custom_dashboard_help');
}

function custom_dashboard_help() {
echo 	'
			<p><img src="'.THEME_DIR.'/assets/img/min/admin/logo.png" style="width:30%; height:auto; float:left;" />Voor support aangaande het gebruik van deze website:<br /><a href="mailto:support@divtag.nl">Stuur ons een e-mail</a> of neem telefonisch contact op via <a href="tel:+31737114775">+31 (0)73 - 7114 775</a>.<br /><br /><a href="http://www.divtag.nl" target="_blank">www.divtag.nl</a></p><div style="clear:both;"></div>
		';
}