<?php


/**
 * AS creative functions and definitions
 *
 */


add_action( 'widgets_init', 'wpb_load_widget_c' );

require( get_template_directory() . '/lib/custom-widget.php' );
require( get_template_directory() . '/lib/theme-options.php' );

require( get_template_directory() . '/lib/as-custom-functions.php' );

/**
 * This is register new post type for slider. custom_post_type()
 *
 */
function custom_post_type() {

	$labels = array(
		'name'                => _x( 'Based Slider', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Based Slider', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Based Slider', 'text_domain' ),
		'name_admin_bar'      => __( 'Based Slider', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
		'all_items'           => __( 'All Items', 'text_domain' ),
		'add_new_item'        => __( 'Add New Item', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'new_item'            => __( 'New Item', 'text_domain' ),
		'edit_item'           => __( 'Edit Item', 'text_domain' ),
		'update_item'         => __( 'Update Item', 'text_domain' ),
		'view_item'           => __( 'View Item', 'text_domain' ),
		'search_items'        => __( 'Search Item', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'Based_Slider', 'text_domain' ),
		'description'         => __( 'Post Type Description', 'text_domain' ),
		'labels'              => $labels,
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ,'post-formats','page-attributes'),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'based_slider', $args );

}
add_action( 'init', 'custom_post_type', 0 );
/**
 * This function for get menu. get_menu()
 *
 */
function get_menu($menu,$container_id,$themelocation){
	$defaults = array(
	'menu'            => $menu,
	'container_id'    => $container_id,
	'theme_location' => $themelocation,
);
return wp_nav_menu( $defaults );
}
/**
 * This function for get theme option data. get_custom_data()
 *
 */
function get_custom_data($key){
	$saved = (array) get_option( 'as_theme_options' );
	$defaults = array(
			$key			=> '',
	);
	$defaults = apply_filters( 'as_default_theme_options', $defaults );
	$Theme_options = wp_parse_args( $saved, $defaults );
	$Theme_options = array_intersect_key( $Theme_options, $defaults );

	if($Theme_options[$key]=="" && $key=="upload_header_logo"){
	$Theme_options[$key]=get_template_directory_uri()."/images/logo.png";
	}else if($Theme_options[$key]=="" && $key=="upload_Footer_logo"){
	$Theme_options[$key]=get_template_directory_uri()."/images/footer-logo.png";
	}else if($Theme_options[$key]=="" && $key=="as_footer_area_text"){
	$Theme_options[$key]="Footer copywrite text";
	}


	return $Theme_options[$key];
}
function get_parent_page_data($parentid){
$args = array(
                        'sort_order' => 'ASC',
                        'sort_column' => 'post_title',
                        'hierarchical' => 1,
                        'child_of' => 0,
                        'parent' => $parentid,
                        'offset' => 0,
                        'post_type' => 'page',
                        'post_status' => 'publish'
                    );
                   return get_pages($args);

}
function my_custom_init() {
	add_post_type_support( 'page', 'excerpt' );
}
add_action('init', 'my_custom_init');
function get_post_content_img($Post_content){
                	$matches="";
	                preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $Post_content, $matches);
	  				$feat_image = $matches[1][0];
	  				return $feat_image;
                }
                function get_post_limit_content($Post_content){
                	return  wp_trim_words( $Post_content, $num_words = 15, $more = null );
                }
