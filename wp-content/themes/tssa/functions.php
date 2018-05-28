<?php
/**
 * herrmanandherrman functions and definitions
 *
 * @package herrmanandherrman
 * @since herrmanandherrman 2.0
 * @license GPL 2.0
 */

define( 'JS_VERS', '1.0.1' );
define( 'CSS_VERS', '1.0.0' );

require_once STYLESHEETPATH . '/includes/cws-theme-class.php';
require_once STYLESHEETPATH . '/includes/cws-hooks.php';
require_once STYLESHEETPATH . '/includes/cws-filters.php';
require_once STYLESHEETPATH . '/includes/cws-custom-functions.php';
require_once STYLESHEETPATH . '/includes/cws-shortcodes.php';
require_once STYLESHEETPATH . '/includes/walker.php';
require_once STYLESHEETPATH . '/includes/post-types.php';
require_once STYLESHEETPATH . '/includes/sidebar-hooks.php';
require_once STYLESHEETPATH . '/includes/front-page-hooks.php';
require_once STYLESHEETPATH . '/includes/acf.php';

/**Remove unnecessary WP items**/

remove_action( 'wp_head', 'print_emoji_detection_script', 7 ); 
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' ); 
remove_action( 'wp_print_styles', 'print_emoji_styles' ); 
remove_action( 'admin_print_styles', 'print_emoji_styles' );

/**
 * Load scripts and styles for the theme
 *
 * @action wp_enqueue_scripts
 *
 * @return void
 */
function cws_enqueue_scripts() {
	wp_enqueue_style  ( 'cws-main',      get_template_directory_uri() . '/assets/compiled/css/theme.css', false, CSS_VERS );
	//wp_enqueue_style  ( 'css-map',       get_template_directory_uri() . '/css/app.css.map', false, CSS_VERS );
	wp_enqueue_script ( 'cws-theme-js',  get_template_directory_uri() . '/assets/compiled/js/app.js', array( 'jquery' ), JS_VERS, true );
}
add_action( 'wp_enqueue_scripts', 'cws_enqueue_scripts' );


/**
 * Add theme support for sidebar widgets
 */
function cws_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'CWS Primary Sidebar', 'set-slug' ),
		'id'            => 'set-sidebar',
		'description'   => __( 'Widgets in this area will be shown on all posts and pages, except frontpage.', 'theme-slug' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'CWS Secondary Sidebar', 'set-slug' ),
		'id'            => 'set-sidebar-two',
		'description'   => __( 'This is a secondary sidebar to house widgets after a page break.', 'theme-slug' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'cws_widgets_init' );

/**
 * Add header and footer menus
 *
 * @add_action init
 */
function cws_register_menus() {
	register_nav_menus(
		array(
			'header-menu'     => __( 'Header Menu' ),
			'footer-menu'     => __( 'Footer Menu' ),
			//'sub-footer-menu' => __( 'Sub Footer Menu' ),
			'mobile-menu'     => __( 'Mobile Menu' )
		)
	);
}
add_action( 'init', 'cws_register_menus' );

/**
 * Add an acf options page
 */
if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page();
}

/**
* Add excerpt support to pages
*/

add_post_type_support( 'page', 'excerpt' );

/**
 * Add featured images
 */

function wpse_setup_theme() {
   add_theme_support( 'post-thumbnails' );
	add_image_size( 'blog-sm', 91, 58, true );
	add_image_size('attorney-sb', 360,458, true);
	add_image_size('attorney-feature', 264,343, true);
	add_image_size('attorney-md', 390,431, true);
}

add_action( 'after_setup_theme', 'wpse_setup_theme' );

