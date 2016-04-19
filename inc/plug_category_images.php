<?php
/**
 * Plugin Name: Categories Images
 * Plugin URI: http://zahlan.net/blog/2012/06/categories-images/
 * Description: Categories Images Plugin allow you to add an image to category or any custom term.
 * Author: Muhammad Said El Zahlan
 * Version: 2.4.2
 * Author URI: http://zahlan.net/
 */
?>
<?php
if (!defined('DT_PLUGIN_URL'))
	define('DT_PLUGIN_URL', THEME_DIR.'/assets/catimg/');

	define('DT_IMAGE_PLACEHOLDER', DT_PLUGIN_URL."placeholder.png");

// l10n
load_plugin_textdomain('dt', FALSE, 'categories-images/languages');

add_action('admin_init', 'dt_init');
function dt_init() {
	$dt_taxonomies = get_taxonomies();
	if (is_array($dt_taxonomies)) {
		$dt_options = get_option('dt_options');
		if (empty($dt_options['excluded_taxonomies']))
			$dt_options['excluded_taxonomies'] = array();
		
		foreach ($dt_taxonomies as $dt_taxonomy) {
			if (in_array($dt_taxonomy, $dt_options['excluded_taxonomies']))
				continue;
			add_action($dt_taxonomy.'_add_form_fields', 'dt_add_texonomy_field');
			add_action($dt_taxonomy.'_edit_form_fields', 'dt_edit_texonomy_field');
			add_filter( 'manage_edit-' . $dt_taxonomy . '_columns', 'dt_taxonomy_columns' );
			add_filter( 'manage_' . $dt_taxonomy . '_custom_column', 'dt_taxonomy_column', 10, 3 );
		}
	}
}

function dt_add_style() {
	echo '<style type="text/css" media="screen">
	th.column-thumb {width:60px;}
	.form-field img.taxonomy-image {border:1px solid #eee;max-width:300px;max-height:300px;}
	.inline-edit-row fieldset .thumb label span.title {width:48px;height:48px;border:1px solid #eee;display:inline-block;}
	.column-thumb span {width:48px;height:48px;border:1px solid #eee;display:inline-block;}
	.inline-edit-row fieldset .thumb img,.column-thumb img {width:48px;height:48px;}
</style>';
}

// add image field in add form
function dt_add_texonomy_field() {
	if (get_bloginfo('version') >= 3.5)
		wp_enqueue_media();
	else {
		wp_enqueue_style('thickbox');
		wp_enqueue_script('thickbox');
	}
	
	echo '<div class="form-field">
	<label for="taxonomy_image">' . __('Image', 'dt') . '</label>
	<input type="text" name="taxonomy_image" id="taxonomy_image" value="" />
	<br/>
	<button class="dt_upload_image_button button">' . __('Upload/Add image', 'dt') . '</button>
</div>'.dt_script();
}

// add image field in edit form
function dt_edit_texonomy_field($taxonomy) {
	if (get_bloginfo('version') >= 3.5)
		wp_enqueue_media();
	else {
		wp_enqueue_style('thickbox');
		wp_enqueue_script('thickbox');
	}
	
	if (dt_taxonomy_image_url( $taxonomy->term_id, NULL, TRUE ) == DT_IMAGE_PLACEHOLDER) 
		$image_text = "";
	else
		$image_text = dt_taxonomy_image_url( $taxonomy->term_id, NULL, TRUE );
	echo '<tr class="form-field">
	<th scope="row" valign="top"><label for="taxonomy_image">' . __('Image', 'dt') . '</label></th>
	<td><img class="taxonomy-image" src="' . dt_taxonomy_image_url( $taxonomy->term_id, NULL, TRUE ) . '"/><br/><input type="text" name="taxonomy_image" id="taxonomy_image" value="'.$image_text.'" /><br />
		<button class="dt_upload_image_button button">' . __('Upload/Add image', 'dt') . '</button>
		<button class="dt_remove_image_button button">' . __('Remove image', 'dt') . '</button>
	</td>
</tr>'.dt_script();
}
// upload using wordpress upload
function dt_script() {
	return '<script type="text/javascript">
	jQuery(document).ready(function($) {
		var wordpress_ver = "'.get_bloginfo("version").'", upload_button;
		$(".dt_upload_image_button").click(function(event) {
			upload_button = $(this);
			var frame;
			if (wordpress_ver >= "3.5") {
				event.preventDefault();
				if (frame) {
					frame.open();
					return;
				}
				frame = wp.media();
				frame.on( "select", function() {
						// Grab the selected attachment.
					var attachment = frame.state().get("selection").first();
					frame.close();
					if (upload_button.parent().prev().children().hasClass("tax_list")) {
						upload_button.parent().prev().children().val(attachment.attributes.url);
						upload_button.parent().prev().prev().children().attr("src", attachment.attributes.url);
					}
					else
						$("#taxonomy_image").val(attachment.attributes.url);
				});
frame.open();
}
else {
	tb_show("", "media-upload.php?type=image&amp;TB_iframe=true");
	return false;
}
});

$(".dt_remove_image_button").click(function() {
	$("#taxonomy_image").val("");
	$(this).parent().siblings(".title").children("img").attr("src","' . DT_IMAGE_PLACEHOLDER . '");
	$(".inline-edit-col :input[name=\'taxonomy_image\']").val("");
	return false;
});

if (wordpress_ver < "3.5") {
	window.send_to_editor = function(html) {
		imgurl = $("img",html).attr("src");
		if (upload_button.parent().prev().children().hasClass("tax_list")) {
			upload_button.parent().prev().children().val(imgurl);
			upload_button.parent().prev().prev().children().attr("src", imgurl);
		}
		else
			$("#taxonomy_image").val(imgurl);
		tb_remove();
	}
}

$(".editinline").live("click", function(){  
	var tax_id = $(this).parents("tr").attr("id").substr(4);
	var thumb = $("#tag-"+tax_id+" .thumb img").attr("src");
	if (thumb != "' . DT_IMAGE_PLACEHOLDER . '") {
		$(".inline-edit-col :input[name=\'taxonomy_image\']").val(thumb);
	} else {
		$(".inline-edit-col :input[name=\'taxonomy_image\']").val("");
	}
	$(".inline-edit-col .title img").attr("src",thumb);
	return false;  
});  
});
</script>';
}

// save our taxonomy image while edit or save term
add_action('edit_term','dt_save_taxonomy_image');
add_action('create_term','dt_save_taxonomy_image');
function dt_save_taxonomy_image($term_id) {
	if(isset($_POST['taxonomy_image']))
		update_option('dt_taxonomy_image'.$term_id, $_POST['taxonomy_image']);
}

// get attachment ID by image url
function dt_get_attachment_id_by_url($image_src) {
	global $wpdb;
	$query = "SELECT ID FROM {$wpdb->posts} WHERE guid = '$image_src'";
	$id = $wpdb->get_var($query);
	return (!empty($id)) ? $id : NULL;
}

// get taxonomy image url for the given term_id (Place holder image by default)
function dt_taxonomy_image_url($term_id = NULL, $size = NULL, $return_placeholder = FALSE) {
	if (!$term_id) {
		if (is_category())
			$term_id = get_query_var('cat');
		elseif (is_tax()) {
			$current_term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
			$term_id = $current_term->term_id;
		}
	}
	
	$taxonomy_image_url = get_option('dt_taxonomy_image'.$term_id);
	if(!empty($taxonomy_image_url)) {
		$attachment_id = dt_get_attachment_id_by_url($taxonomy_image_url);
		if(!empty($attachment_id)) {
			if (empty($size))
				$size = 'full';
			$taxonomy_image_url = wp_get_attachment_image_src($attachment_id, $size);
			$taxonomy_image_url = $taxonomy_image_url[0];
		}
	}

	if ($return_placeholder)
		return ($taxonomy_image_url != '') ? $taxonomy_image_url : DT_IMAGE_PLACEHOLDER;
	else
		return $taxonomy_image_url;
}

function dt_quick_edit_custom_box($column_name, $screen, $name) {
	if ($column_name == 'thumb') 
		echo '<fieldset>
	<div class="thumb inline-edit-col">
		<label>
			<span class="title"><img src="" alt="Thumbnail"/></span>
			<span class="input-text-wrap"><input type="text" name="taxonomy_image" value="" class="tax_list" /></span>
			<span class="input-text-wrap">
				<button class="dt_upload_image_button button">' . __('Upload/Add image', 'dt') . '</button>
				<button class="dt_remove_image_button button">' . __('Remove image', 'dt') . '</button>
			</span>
		</label>
	</div>
</fieldset>';
}

/**
 * Thumbnail column added to category admin.
 *
 * @access public
 * @param mixed $columns
 * @return void
 */
function dt_taxonomy_columns( $columns ) {
	$new_columns = array();
	$new_columns['cb'] = $columns['cb'];
	$new_columns['thumb'] = __('Image', 'dt');

	unset( $columns['cb'] );

	return array_merge( $new_columns, $columns );
}

/**
 * Thumbnail column value added to category admin.
 *
 * @access public
 * @param mixed $columns
 * @param mixed $column
 * @param mixed $id
 * @return void
 */
function dt_taxonomy_column( $columns, $column, $id ) {
	if ( $column == 'thumb' )
		$columns = '<span><img src="' . dt_taxonomy_image_url($id, NULL, TRUE) . '" alt="' . __('Thumbnail', 'dt') . '" class="wp-post-image" /></span>';
	
	return $columns;
}

// change 'insert into post' to 'use this image'
function dt_change_insert_button_text($safe_text, $text) {
	return str_replace("Insert into Post", "Use this image", $text);
}

// style the image in category list
if ( strpos( $_SERVER['SCRIPT_NAME'], 'edit-tags.php' ) > 0 ) {
	add_action( 'admin_head', 'dt_add_style' );
	add_action('quick_edit_custom_box', 'dt_quick_edit_custom_box', 10, 3);
	add_filter("attribute_escape", "dt_change_insert_button_text", 10, 2);
}

// New menu submenu for plugin options in Settings menu
add_action('admin_menu', 'dt_options_menu');
function dt_options_menu() {
	add_options_page(__('Categories Images settings', 'dt'), __('Categories Images', 'dt'), 'manage_options', 'dt-options', 'dt_options');
	add_action('admin_init', 'dt_register_settings');
}

// Register plugin settings
function dt_register_settings() {
	register_setting('dt_options', 'dt_options', 'dt_options_validate');
	add_settings_section('dt_settings', __('Categories Images settings', 'dt'), 'dt_section_text', 'dt-options');
	add_settings_field('dt_excluded_taxonomies', __('Excluded Taxonomies', 'dt'), 'dt_excluded_taxonomies', 'dt-options', 'dt_settings');
}

// Settings section description
function dt_section_text() {
	echo '<p>'.__('Please select the taxonomies you want to exclude it from Categories Images plugin', 'dt').'</p>';
}

// Excluded taxonomies checkboxs
function dt_excluded_taxonomies() {
	$options = get_option('dt_options');
	$disabled_taxonomies = array('nav_menu', 'link_category', 'post_format');
	foreach (get_taxonomies() as $tax) : if (in_array($tax, $disabled_taxonomies)) continue; ?>
	<input type="checkbox" name="dt_options[excluded_taxonomies][<?php echo $tax ?>]" value="<?php echo $tax ?>" <?php checked(isset($options['excluded_taxonomies'][$tax])); ?> /> <?php echo $tax ;?><br />
<?php endforeach;
}

// Validating options
function dt_options_validate($input) {
	return $input;
}

// Plugin option page
function dt_options() {
	if (!current_user_can('manage_options'))
		wp_die(__( 'You do not have sufficient permissions to access this page.', 'dt'));
	$options = get_option('dt_options');
	?>
	<div class="wrap">
		<?php screen_icon(); ?>
		<h2><?php _e('Categories Images', 'dt'); ?></h2>
		<form method="post" action="options.php">
			<?php settings_fields('dt_options'); ?>
			<?php do_settings_sections('dt-options'); ?>
			<?php submit_button(); ?>
		</form>
	</div>
	<?php
}