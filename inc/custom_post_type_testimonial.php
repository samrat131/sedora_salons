<?php
function ss_cpt_testimonial()
{
  $name = 'Testimonial';
  $slug = 'testimonial';
  $labels = array(
    'name' => _x($name, 'post type general name'),  
    'singular_name' => _x($name, 'post type singular name'), 
    'add_new' => _x('Add New', 'post type singular name'),  
    'add_new_item' => __('Add New '.$name), 
    'edit_item' => __('Edit '.$name),
    'new_item' => __('New '.$name),  
    'view_item' => __('View '.$name),  
    'search_items' => __('Search '.$name),  
    'not_found' =>  __('No '.$name.' found'),  
    'not_found_in_trash' => __('No '.$name.' found in Trash'),  
    'parent_item_colon' => ''  
   );  
  $args = array(  
    'labels' => $labels,  
    //'public' => true,  
    //'publicly_queryable' => false,  
	//'query_var' => true,
    'show_ui' => true,  
	'rewrite' => false,
	'_builtin' => false,
    'capability_type' => 'post',  
    'hierarchical' => false,
    'menu_position' => null,
	'menu_icon' => 'dashicons-testimonial',
    'supports' => array('title','thumbnail','editor','page-attributes')
  );
   register_post_type($slug,$args);
}
add_action('init', 'ss_cpt_testimonial');