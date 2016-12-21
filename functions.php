<?php
/**
 * sedora functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package sedora
 */

if ( ! function_exists( 'sedora_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function sedora_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on sedora, use a find and replace
	 * to change 'sedora' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'sedora', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'sedora' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	/*add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );*/

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'sedora_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	
	add_image_size ( 'gallery-thumb', 180, 129, true);
}
endif; // sedora_setup
add_action( 'after_setup_theme', 'sedora_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function sedora_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'sedora_content_width', 980 );
}
add_action( 'after_setup_theme', 'sedora_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function sedora_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'sedora' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'sedora_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function sedora_scripts() {
	
	wp_enqueue_style( 'sedora-css', get_template_directory_uri() . '/css/style.css' );
	
	wp_enqueue_style( 'sedora-font1', get_template_directory_uri() . '/fonts/DosisRegular/stylesheet.css' );
	wp_enqueue_style( 'sedora-font2', get_template_directory_uri() . '/fonts/DosisSemiBold/stylesheet.css' );
	wp_enqueue_style( 'sedora-font3', get_template_directory_uri() . '/fonts/DosisBold/stylesheet.css' );
	wp_enqueue_style( 'sedora-font4', get_template_directory_uri() . '/fonts/lato-regular/stylesheet.css' );
	wp_enqueue_style( 'sedora-font5', get_template_directory_uri() . '/fonts/lato-bold/stylesheet.css' );
	
	wp_enqueue_style( 'sedora-responsive-css', get_template_directory_uri() . '/css/media-queries.css' );
	
	wp_enqueue_style( 'sedora-style', get_stylesheet_uri() );
	
	wp_enqueue_script( 'sedora-navigation', get_template_directory_uri() . '/js/nav-script.js', array(), '20120206', true );
	
	wp_enqueue_script( 'sedora-jqueryslidemenu', get_template_directory_uri() . '/js/jqueryslidemenu.js', array('jquery'), '20140206', true );

	wp_enqueue_script( 'sedora-jquery-cycle2', get_template_directory_uri() . '/js/jquery.cycle2.js', array('jquery'), '20140306', true );
	//wp_enqueue_script( 'sedora-jquery-cycle2-carousel', get_template_directory_uri() . '/js/jquery.cycle2.carousel.js', array('jquery'), '20140306', true );
	
	wp_enqueue_script( 'sedora-jquery-jcarousel', get_template_directory_uri() . '/js/jquery.jcarousel.js', array('jquery'), '20140306', true );

	wp_enqueue_script( 'sedora-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	
	wp_enqueue_script('jquery-ui-tabs');

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sedora_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

require get_template_directory() . '/inc/custom_post_type_testimonial.php';
require get_template_directory() . '/inc/custom_post_type_slider.php';
require get_template_directory() . '/inc/custom_post_type_directory.php';
require get_template_directory() . '/inc/custom_post_type_coupon.php';

require get_template_directory() . '/inc/cmb2-functions.php';

/*function get_pm( $key, $autop = false, $before = '', $after = '' ){
	if($key=='') return;
	global $post;
	if($autop)
		return $before.wpautop(get_post_meta($post->ID, $key, true)).$after;
	else
		return $before.get_post_meta($post->ID, $key, true).$after;
}
*/

function get_pm( $key, $autop = false ){
	if($key=='') return;
	global $post;
	if($autop)
		return wpautop(get_post_meta($post->ID, $key, true));
	else
		return get_post_meta($post->ID, $key, true);
}

function get_img( $key ){
	if($key=='') return;
	global $post;
	$src = "";
	$src = get_post_meta($post->ID, $key, true);
	if($src=="") 
		return;
	else 
		return '<img src="'.$src.'" alt="image-'.$post->ID.'">';
}