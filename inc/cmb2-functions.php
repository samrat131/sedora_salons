<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'sedora_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Demo_CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */

/**
 * Get the bootstrap! If using the plugin from wordpress.org, REMOVE THIS!
 */

if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/cmb2/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/CMB2/init.php';
}

/**
 * Conditionally displays a metabox when used as a callback in the 'show_on_cb' cmb2_box parameter
 *
 * @param  CMB2 object $cmb CMB2 object
 *
 * @return bool             True if metabox should show
 */
function sedora_show_if_front_page( $cmb ) {
	// Don't show this metabox if it's not the front page template
	if ( $cmb->object_id !== get_option( 'page_on_front' ) ) {
		return false;
	}
	return true;
}

/**
 * Conditionally displays a field when used as a callback in the 'show_on_cb' field parameter
 *
 * @param  CMB2_Field object $field Field object
 *
 * @return bool                     True if metabox should show
 */
function sedora_hide_if_no_cats( $field ) {
	// Don't show this field if not in the cats category
	if ( ! has_tag( 'cats', $field->object_id ) ) {
		return false;
	}
	return true;
}

/**
 * Conditionally displays a message if the $post_id is 2
 *
 * @param  array             $field_args Array of field parameters
 * @param  CMB2_Field object $field      Field object
 */
function sedora_before_row_if_2( $field_args, $field ) {
	if ( 2 == $field->object_id ) {
		echo '<p>Testing <b>"before_row"</b> parameter (on $post_id 2)</p>';
	} else {
		echo '<p>Testing <b>"before_row"</b> parameter (<b>NOT</b> on $post_id 2)</p>';
	}
}

//add_action( 'cmb2_init', 'sedora_register_demo_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_init' hook.
 */
function sedora_register_demo_metabox() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_sedora_demo_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => __( 'Test Metabox', 'cmb2' ),
		'object_types'  => array( 'page', ), // Post type
		// 'show_on_cb' => 'sedora_show_if_front_page', // function should return a bool value
		// 'context'    => 'normal',
		// 'priority'   => 'high',
		// 'show_names' => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
	) );

	$cmb_demo->add_field( array(
		'name'       => __( 'Test Text', 'cmb2' ),
		'desc'       => __( 'field description (optional)', 'cmb2' ),
		'id'         => $prefix . 'text',
		'type'       => 'text',
		'show_on_cb' => 'sedora_hide_if_no_cats', // function should return a bool value
		// 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
		// 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
		// 'on_front'        => false, // Optionally designate a field to wp-admin only
		// 'repeatable'      => true,
	) );

	$cmb_demo->add_field( array(
		'name' => __( 'Test Text Small', 'cmb2' ),
		'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'textsmall',
		'type' => 'text_small',
		// 'repeatable' => true,
	) );

	$cmb_demo->add_field( array(
		'name' => __( 'Test Text Medium', 'cmb2' ),
		'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'textmedium',
		'type' => 'text_medium',
		// 'repeatable' => true,
	) );

	$cmb_demo->add_field( array(
		'name' => __( 'Website URL', 'cmb2' ),
		'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'url',
		'type' => 'text_url',
		// 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
		// 'repeatable' => true,
	) );

	$cmb_demo->add_field( array(
		'name' => __( 'Test Text Email', 'cmb2' ),
		'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'email',
		'type' => 'text_email',
		// 'repeatable' => true,
	) );

	$cmb_demo->add_field( array(
		'name' => __( 'Test Time', 'cmb2' ),
		'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'time',
		'type' => 'text_time',
	) );

	$cmb_demo->add_field( array(
		'name' => __( 'Time zone', 'cmb2' ),
		'desc' => __( 'Time zone', 'cmb2' ),
		'id'   => $prefix . 'timezone',
		'type' => 'select_timezone',
	) );

	$cmb_demo->add_field( array(
		'name' => __( 'Test Date Picker', 'cmb2' ),
		'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'textdate',
		'type' => 'text_date',
	) );

	$cmb_demo->add_field( array(
		'name' => __( 'Test Date Picker (UNIX timestamp)', 'cmb2' ),
		'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'textdate_timestamp',
		'type' => 'text_date_timestamp',
		// 'timezone_meta_key' => $prefix . 'timezone', // Optionally make this field honor the timezone selected in the select_timezone specified above
	) );

	$cmb_demo->add_field( array(
		'name' => __( 'Test Date/Time Picker Combo (UNIX timestamp)', 'cmb2' ),
		'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'datetime_timestamp',
		'type' => 'text_datetime_timestamp',
	) );

	// This text_datetime_timestamp_timezone field type
	// is only compatible with PHP versions 5.3 or above.
	// Feel free to uncomment and use if your server meets the requirement
	// $cmb_demo->add_field( array(
	// 	'name' => __( 'Test Date/Time Picker/Time zone Combo (serialized DateTime object)', 'cmb2' ),
	// 	'desc' => __( 'field description (optional)', 'cmb2' ),
	// 	'id'   => $prefix . 'datetime_timestamp_timezone',
	// 	'type' => 'text_datetime_timestamp_timezone',
	// ) );

	$cmb_demo->add_field( array(
		'name' => __( 'Test Money', 'cmb2' ),
		'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'textmoney',
		'type' => 'text_money',
		// 'before_field' => '£', // override '$' symbol if needed
		// 'repeatable' => true,
	) );

	$cmb_demo->add_field( array(
		'name'    => __( 'Test Color Picker', 'cmb2' ),
		'desc'    => __( 'field description (optional)', 'cmb2' ),
		'id'      => $prefix . 'colorpicker',
		'type'    => 'colorpicker',
		'default' => '#ffffff',
	) );

	$cmb_demo->add_field( array(
		'name' => __( 'Test Text Area', 'cmb2' ),
		'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'textarea',
		'type' => 'textarea',
	) );

	$cmb_demo->add_field( array(
		'name' => __( 'Test Text Area Small', 'cmb2' ),
		'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'textareasmall',
		'type' => 'textarea_small',
	) );

	$cmb_demo->add_field( array(
		'name' => __( 'Test Text Area for Code', 'cmb2' ),
		'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'textarea_code',
		'type' => 'textarea_code',
	) );

	$cmb_demo->add_field( array(
		'name' => __( 'Test Title Weeeee', 'cmb2' ),
		'desc' => __( 'This is a title description', 'cmb2' ),
		'id'   => $prefix . 'title',
		'type' => 'title',
	) );

	$cmb_demo->add_field( array(
		'name'             => __( 'Test Select', 'cmb2' ),
		'desc'             => __( 'field description (optional)', 'cmb2' ),
		'id'               => $prefix . 'select',
		'type'             => 'select',
		'show_option_none' => true,
		'options'          => array(
			'standard' => __( 'Option One', 'cmb2' ),
			'custom'   => __( 'Option Two', 'cmb2' ),
			'none'     => __( 'Option Three', 'cmb2' ),
		),
	) );

	$cmb_demo->add_field( array(
		'name'             => __( 'Test Radio inline', 'cmb2' ),
		'desc'             => __( 'field description (optional)', 'cmb2' ),
		'id'               => $prefix . 'radio_inline',
		'type'             => 'radio_inline',
		'show_option_none' => 'No Selection',
		'options'          => array(
			'standard' => __( 'Option One', 'cmb2' ),
			'custom'   => __( 'Option Two', 'cmb2' ),
			'none'     => __( 'Option Three', 'cmb2' ),
		),
	) );

	$cmb_demo->add_field( array(
		'name'    => __( 'Test Radio', 'cmb2' ),
		'desc'    => __( 'field description (optional)', 'cmb2' ),
		'id'      => $prefix . 'radio',
		'type'    => 'radio',
		'options' => array(
			'option1' => __( 'Option One', 'cmb2' ),
			'option2' => __( 'Option Two', 'cmb2' ),
			'option3' => __( 'Option Three', 'cmb2' ),
		),
	) );

	$cmb_demo->add_field( array(
		'name'     => __( 'Test Taxonomy Radio', 'cmb2' ),
		'desc'     => __( 'field description (optional)', 'cmb2' ),
		'id'       => $prefix . 'text_taxonomy_radio',
		'type'     => 'taxonomy_radio',
		'taxonomy' => 'category', // Taxonomy Slug
		// 'inline'  => true, // Toggles display to inline
	) );

	$cmb_demo->add_field( array(
		'name'     => __( 'Test Taxonomy Select', 'cmb2' ),
		'desc'     => __( 'field description (optional)', 'cmb2' ),
		'id'       => $prefix . 'taxonomy_select',
		'type'     => 'taxonomy_select',
		'taxonomy' => 'category', // Taxonomy Slug
	) );

	$cmb_demo->add_field( array(
		'name'     => __( 'Test Taxonomy Multi Checkbox', 'cmb2' ),
		'desc'     => __( 'field description (optional)', 'cmb2' ),
		'id'       => $prefix . 'multitaxonomy',
		'type'     => 'taxonomy_multicheck',
		'taxonomy' => 'post_tag', // Taxonomy Slug
		// 'inline'  => true, // Toggles display to inline
	) );

	$cmb_demo->add_field( array(
		'name' => __( 'Test Checkbox', 'cmb2' ),
		'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'checkbox',
		'type' => 'checkbox',
	) );

	$cmb_demo->add_field( array(
		'name'    => __( 'Test Multi Checkbox', 'cmb2' ),
		'desc'    => __( 'field description (optional)', 'cmb2' ),
		'id'      => $prefix . 'multicheckbox',
		'type'    => 'multicheck',
		// 'multiple' => true, // Store values in individual rows
		'options' => array(
			'check1' => __( 'Check One', 'cmb2' ),
			'check2' => __( 'Check Two', 'cmb2' ),
			'check3' => __( 'Check Three', 'cmb2' ),
		),
		// 'inline'  => true, // Toggles display to inline
	) );

	$cmb_demo->add_field( array(
		'name'    => __( 'Test wysiwyg', 'cmb2' ),
		'desc'    => __( 'field description (optional)', 'cmb2' ),
		'id'      => $prefix . 'wysiwyg',
		'type'    => 'wysiwyg',
		'options' => array( 'textarea_rows' => 5, ),
	) );

	$cmb_demo->add_field( array(
		'name' => __( 'Test Image', 'cmb2' ),
		'desc' => __( 'Upload an image or enter a URL.', 'cmb2' ),
		'id'   => $prefix . 'image',
		'type' => 'file',
	) );

	$cmb_demo->add_field( array(
		'name'         => __( 'Multiple Files', 'cmb2' ),
		'desc'         => __( 'Upload or add multiple images/attachments.', 'cmb2' ),
		'id'           => $prefix . 'file_list',
		'type'         => 'file_list',
		'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
	) );

	$cmb_demo->add_field( array(
		'name' => __( 'oEmbed', 'cmb2' ),
		'desc' => __( 'Enter a youtube, twitter, or instagram URL. Supports services listed at <a href="http://codex.wordpress.org/Embeds">http://codex.wordpress.org/Embeds</a>.', 'cmb2' ),
		'id'   => $prefix . 'embed',
		'type' => 'oembed',
	) );

	$cmb_demo->add_field( array(
		'name'         => 'Testing Field Parameters',
		'id'           => $prefix . 'parameters',
		'type'         => 'text',
		'before_row'   => 'sedora_before_row_if_2', // callback
		'before'       => '<p>Testing <b>"before"</b> parameter</p>',
		'before_field' => '<p>Testing <b>"before_field"</b> parameter</p>',
		'after_field'  => '<p>Testing <b>"after_field"</b> parameter</p>',
		'after'        => '<p>Testing <b>"after"</b> parameter</p>',
		'after_row'    => '<p>Testing <b>"after_row"</b> parameter</p>',
	) );

}

add_action( 'cmb2_init', 'sedora_register_giftcert_metabox' );
/**
 * Hook in and add a metabox that only appears on the 'About' page
 */
function sedora_register_giftcert_metabox() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_ss_giftcert_';

	/**
	 * Metabox to be displayed on a single page ID
	 */
	$cmb_metabox = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => __( 'Other Info', 'cmb2' ),
		'object_types' => array( 'page', ), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
		'show_on'      => array( 'id' => array( 111, ) ), // Specific post IDs to display this metabox
	) );

	$cmb_metabox->add_field( array(
		'name' => __( 'Header Text', 'cmb2' ),
		//'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'header_text',
		'type' => 'textarea_small',
	) );

}

add_action( 'cmb2_init', 'sedora_register_gallery_metabox' );
/**
 * Hook in and add a metabox that only appears on the 'About' page
 */
function sedora_register_gallery_metabox() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_ss_gallery_';

	/**
	 * Metabox to be displayed on a single page ID
	 */
	$cmb_metabox = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => __( 'Gallery Image', 'cmb2' ),
		'object_types' => array( 'page', ), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
		'show_on'      => array( 'id' => array( 13, ) ), // Specific post IDs to display this metabox
	) );

	$cmb_metabox->add_field( array(
		'name' => __( 'Images', 'cmb2' ),
		//'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'image',
		'type' => 'file_list',
	) );

}

add_action( 'cmb2_init', 'sedora_register_directory_metabox' );
/**
 * Hook in and add a metabox that only appears on the 'About' page
 */
function sedora_register_directory_metabox() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_ss_directory_';

	/**
	 * Metabox to be displayed on a single page ID
	 */
	$cmb_metabox = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => __( 'Salon Information', 'cmb2' ),
		'object_types' => array( 'directory', ), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
		//'show_on'      => array( 'id' => array( 2, ) ), // Specific post IDs to display this metabox
	) );
	
	$cmb_metabox->add_field( array(
		'name' => __( 'Salon Name', 'cmb2' ),
		//'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'salon_name',
		'type' => 'text',
	) );
	
	$cmb_metabox->add_field( array(
		'name' => __( 'Owner First Name', 'cmb2' ),
		//'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'owner_first_name',
		'type' => 'text_medium',
	) );
	
	$cmb_metabox->add_field( array(
		'name' => __( 'Owner Last Name', 'cmb2' ),
		//'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'owner_last_name',
		'type' => 'text_medium',
	) );
	
	$cmb_metabox->add_field( array(
		'name' => __( 'Suite Number', 'cmb2' ),
		//'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'suite_number',
		'type' => 'text_small',
	) );
	
	$cmb_metabox->add_field( array(
		'name' => __( 'Telephone', 'cmb2' ),
		//'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'telephone',
		'type' => 'text_medium',
	) );
	
	$cmb_metabox->add_field( array(
		'name' => __( 'Email', 'cmb2' ),
		//'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'email',
		'type' => 'text_email',
	) );
	$cmb_metabox->add_field( array(
		'name' => __( 'Online Booking & Website', 'cmb2' ),
		//'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'website',
		'type' => 'text_url',
	) );
	$cmb_metabox->add_field( array(
		'name' => __( 'Hours of Operation', 'cmb2' ),
		//'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'hour_operation',
		'type' => 'textarea_small',
	) );
	$cmb_metabox->add_field( array(
		'name' => __( 'Methods of Payment', 'cmb2' ),
		//'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'payment_methods',
		'type' => 'text',
	) );
	$cmb_metabox->add_field( array(
		'name' => __( 'OUR SERVICES', 'cmb2' ),
		//'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'our_services',
		'type' => 'wysiwyg',
	) );
	
	$cmb_metabox->add_field( array(
		'name' => __( 'Coupon', 'cmb2' ),
		//'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'coupon',
		'type' => 'select',
		'show_option_none' => true,
		'options'          => 'coupon_options',
	) );
	
}

function coupon_options(){
	//return array('a'=>1,'b'=>2);
	// WP_Query arguments
	$args = array (
		'post_type'             => 'coupon',
		'post_status'           => 'publish',
		'orderby'				=> 'menu_order',
		'order'					=> 'ASC',
		'posts_per_page'		=> -1
	);
	
	// The Query
	$query = new WP_Query( $args );
	
	$dir =  array();
	// The Loop
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();
			$dir[get_the_ID()] = get_the_title();
		}
	} 
	// Restore original Post Data
	wp_reset_postdata();
	return $dir;
	
}

add_action( 'cmb2_init', 'sedora_register_testimonial_metabox' );
/**
 * Hook in and add a metabox that only appears on the 'About' page
 */
function sedora_register_testimonial_metabox() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_ss_testimonial_';

	/**
	 * Metabox to be displayed on a single page ID
	 */
	$cmb_metabox = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => __( 'Testimonial Info', 'cmb2' ),
		'object_types' => array( 'testimonial', ), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
		//'show_on'      => array( 'id' => array( 2, ) ), // Specific post IDs to display this metabox
	) );

	$cmb_metabox->add_field( array(
		'name'             => 'Select Type',
		//'desc'             => 'Select an option',
		'id'               => $prefix . 'type',
		'type'             => 'select',
		'show_option_none' => true,
		'default'          => 'regular',
		'options'          => array(
			'regular' => __( 'Regular', 'cmb' ),
			'slide'   => __( 'Slide', 'cmb' ),
			'featured'=> __( 'Featured', 'cmb' ),
		),
	) );	
	
	$cmb_metabox->add_field( array(
		'name' => __( 'Image', 'cmb2' ),
		'desc' => __( 'Upload rounded small image', 'cmb2' ),
		'id'   => $prefix . 'round_image',
		'type' => 'file',
	) );	
	
	$cmb_metabox->add_field( array(
		'name' => __( 'Show on Homepage', 'cmb2' ),
		//'desc' => __( 'Upload rounded small image', 'cmb2' ),
		'id'   => $prefix . 'show_home',
		'type' => 'checkbox',
	) );	
	

}

add_action( 'cmb2_init', 'sedora_register_slider_metabox' );
/**
 * Hook in and add a metabox that only appears on the 'About' page
 */
function sedora_register_slider_metabox() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_ss_slider_';

	/**
	 * Metabox to be displayed on a single page ID
	 */
	$cmb_metabox = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => __( 'Call to Action', 'cmb2' ),
		'object_types' => array( 'slider', ), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
		//'show_on'      => array( 'id' => array( 2, ) ), // Specific post IDs to display this metabox
	) );

	$cmb_metabox->add_field( array(
		'name' => __( 'Link URL', 'cmb2' ),
		//'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'link',
		'type' => 'text',
	) );
	
	$cmb_metabox->add_field( array(
		'name' => __( 'Button Text', 'cmb2' ),
		//'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'button_text',
		'type' => 'text',
	) );	

}

add_action( 'cmb2_init', 'sedora_register_own_salon_metabox' );
/**
 * Hook in and add a metabox that only appears on the 'About' page
 */
function sedora_register_own_salon_metabox() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_own_salon_';

	/**
	 * Metabox to be displayed on a single page ID
	 */
	$cmb_metabox = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => __( 'Own Your Salon: Sections', 'cmb2' ),
		'object_types' => array( 'page', ), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
		'show_on'      => array( 'id' => array( 9, ) ), // Specific post IDs to display this metabox
	) );

	$cmb_metabox->add_field( array(
		'name' => __( 'Section 1', 'cmb2' ),
		//'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'section_1',
		'type' => 'wysiwyg',
	) );
	
	$cmb_metabox->add_field( array(
		'name' => __( 'Section 1 Image', 'cmb2' ),
		//'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'image_1',
		'type' => 'file',
	) );	
	
	$cmb_metabox->add_field( array(
		'name' => __( 'Section 2', 'cmb2' ),
		//'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'section_2',
		'type' => 'wysiwyg',
	) );
	
	$cmb_metabox->add_field( array(
		'name' => __( 'Section 2 Image', 'cmb2' ),
		//'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'image_2',
		'type' => 'file',
	) );	
	
	$cmb_metabox->add_field( array(
		'name' => __( 'Section 3', 'cmb2' ),
		//'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'section_3',
		'type' => 'wysiwyg',
	) );
	
	$cmb_metabox->add_field( array(
		'name' => __( 'Section 4', 'cmb2' ),
		//'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'section_4',
		'type' => 'wysiwyg',
	) );
	
	$cmb_metabox->add_field( array(
		'name' => __( 'Section 4 Image', 'cmb2' ),
		//'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'image_4',
		'type' => 'file',
	) );	
	
	

}

add_action( 'cmb2_init', 'sedora_register_repeatable_group_field_metabox_own_salon_header' );
/**
 * Hook in and add a metabox to demonstrate repeatable grouped fields
 */
function sedora_register_repeatable_group_field_metabox_own_salon_header() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_own_salon_header_';

	/**
	 * Repeatable Field Groups
	 */
	$cmb_group = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => __( 'Header', 'cmb2' ),
		'object_types' => array( 'page', ),
		'show_on'      => array( 'id' => array( 9,111 ) ),
	) );
	
	$cmb_group->add_field( array(
		'name' => __( 'Header Backgound', 'cmb2' ),
		//'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'image',
		'type' => 'file',
	) );	

	// $group_field_id is the field id string, so in this case: $prefix . 'demo'
	$group_field_id = $cmb_group->add_field( array(
		'id'          => $prefix . 'caption',
		'type'        => 'group',
		//'description' => __( 'Generates reusable form entries', 'cmb2' ),
		'options'     => array(
			'group_title'   => __( 'Caption {#}', 'cmb2' ), // {#} gets replaced by row number
			'add_button'    => __( 'Add More', 'cmb2' ),
			'remove_button' => __( 'Remove', 'cmb2' ),
			'sortable'      => true, // beta
			// 'closed'     => true, // true to have the groups closed by default
		),
	) );

	/**
	 * Group fields works the same, except ids only need
	 * to be unique to the group. Prefix is not needed.
	 *
	 * The parent field's id needs to be passed as the first argument.
	 */
	/*$cmb_group->add_group_field( $group_field_id, array(
		'name'       => __( 'Entry Title', 'cmb2' ),
		'id'         => 'title',
		'type'       => 'text',
		// 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );

	$cmb_group->add_group_field( $group_field_id, array(
		'name'        => __( 'Description', 'cmb2' ),
		'description' => __( 'Write a short description for this entry', 'cmb2' ),
		'id'          => 'description',
		'type'        => 'textarea_small',
	) );

	$cmb_group->add_group_field( $group_field_id, array(
		'name' => __( 'Entry Image', 'cmb2' ),
		'id'   => 'image',
		'type' => 'file',
	) );*/

	$cmb_group->add_group_field( $group_field_id, array(
		'name' => __( 'Image Caption', 'cmb2' ),
		'id'   => 'image_caption',
		'type' => 'textarea_small',
	) );

}

//add_action( 'cmb2_init', 'sedora_register_user_profile_metabox' );
/**
 * Hook in and add a metabox to add fields to the user profile pages
 */
function sedora_register_user_profile_metabox() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_sedora_user_';

	/**
	 * Metabox for the user profile screen
	 */
	$cmb_user = new_cmb2_box( array(
		'id'               => $prefix . 'edit',
		'title'            => __( 'User Profile Metabox', 'cmb2' ),
		'object_types'     => array( 'user' ), // Tells CMB2 to use user_meta vs post_meta
		'show_names'       => true,
		'new_user_section' => 'add-new-user', // where form will show on new user page. 'add-existing-user' is only other valid option.
	) );

	$cmb_user->add_field( array(
		'name'     => __( 'Extra Info', 'cmb2' ),
		'desc'     => __( 'field description (optional)', 'cmb2' ),
		'id'       => $prefix . 'extra_info',
		'type'     => 'title',
		'on_front' => false,
	) );

	$cmb_user->add_field( array(
		'name'    => __( 'Avatar', 'cmb2' ),
		'desc'    => __( 'field description (optional)', 'cmb2' ),
		'id'      => $prefix . 'avatar',
		'type'    => 'file',
	) );

	$cmb_user->add_field( array(
		'name' => __( 'Facebook URL', 'cmb2' ),
		'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'facebookurl',
		'type' => 'text_url',
	) );

	$cmb_user->add_field( array(
		'name' => __( 'Twitter URL', 'cmb2' ),
		'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'twitterurl',
		'type' => 'text_url',
	) );

	$cmb_user->add_field( array(
		'name' => __( 'Google+ URL', 'cmb2' ),
		'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'googleplusurl',
		'type' => 'text_url',
	) );

	$cmb_user->add_field( array(
		'name' => __( 'Linkedin URL', 'cmb2' ),
		'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'linkedinurl',
		'type' => 'text_url',
	) );

	$cmb_user->add_field( array(
		'name' => __( 'User Field', 'cmb2' ),
		'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'user_text_field',
		'type' => 'text',
	) );

}

//add_action( 'cmb2_init', 'sedora_register_theme_options_metabox' );
/**
 * Hook in and register a metabox to handle a theme options page
 */
function sedora_register_theme_options_metabox() {

	// Start with an underscore to hide fields from custom fields list
	$option_key = '_sedora_theme_options';

	/**
	 * Metabox for an options page. Will not be added automatically, but needs to be called with
	 * the `cmb2_metabox_form` helper function. See wiki for more info.
	 */
	$cmb_options = new_cmb2_box( array(
		'id'      => $option_key . 'page',
		'title'   => __( 'Theme Options Metabox', 'cmb2' ),
		'hookup'  => false, // Do not need the normal user/post hookup
		'show_on' => array(
			// These are important, don't remove
			'key'   => 'options-page',
			'value' => array( $option_key )
		),
	) );

	/**
	 * Options fields ids only need
	 * to be unique within this option group.
	 * Prefix is not needed.
	 */
	$cmb_options->add_field( array(
		'name'    => __( 'Site Background Color', 'cmb2' ),
		'desc'    => __( 'field description (optional)', 'cmb2' ),
		'id'      => 'bg_color',
		'type'    => 'colorpicker',
		'default' => '#ffffff',
	) );

}
