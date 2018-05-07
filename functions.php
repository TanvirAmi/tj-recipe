<?php
/**
 * TJ Recipe functions and definitions
 *
 * Contains all of the Theme's setup functions, custom functions,
 * custom hooks & Theme settings.
 *
 * @package TJ_Recipe
 * @author Theme Junkie
 * @copyright Copyright (c) 2009-2018, Theme Junkie
 * @license http://www.gnu.org/licenses/gpl-2.0.html
 * @since 1.0.0
 */

if ( ! function_exists( 'tj_recipe_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function tj_recipe_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on TJ Recipe, use a find and replace
		 * to change 'tj-recipe' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'tj-recipe', get_template_directory() . '/languages' );

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
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// Declare featured image size
		add_image_size( 'tj-recipe-thumb', 730, 486, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary' => __( 'Primary Menu', 'tj-recipe' ),
				'footer'	=> __('Footer Menu', 'tj-recipe')
			)
		);

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

		// Set up the WordPress core custom background feature.
		// add_theme_support( 'custom-background', apply_filters( 'tj_recipe_custom_background_args', array(
		// 	'default-color' => 'ffffff',
		// 	'default-image' => '',
		// ) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		// add_theme_support( 'custom-logo', array(
		// 	'height'      => 250,
		// 	'width'       => 250,
		// 	'flex-width'  => true,
		// 	'flex-height' => true,
		// ) );
	}
endif;
add_action( 'after_setup_theme', 'tj_recipe_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function tj_recipe_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'tj_recipe_content_width', 730 );
}
add_action( 'after_setup_theme', 'tj_recipe_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function tj_recipe_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'tj-recipe' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'tj-recipe' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
	) );
}
add_action( 'widgets_init', 'tj_recipe_widgets_init' );

/**
 * Implement the styles and scripts.
 */
require get_template_directory() . '/inc/scripts.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * FeedBurner widget.
 */
require get_template_directory() . '/inc/widgets/widget-feedburner.php';

/**
 * About widget.
 */
require get_template_directory() . '/inc/widgets/widget-about.php';

/**
* Popular post widget_title
*/
require get_template_directory() . '/inc/widgets/widget-popular-post.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Breadcrumb trail additions.
 */
require get_template_directory() . '/inc/hybrid/breadcrumb-trail.php';

/**
 * include loop pagination by htbrid core
 */
require get_template_directory() . '/inc/hybrid/loop-pagination.php';

/**
 * include attributes by htbrid core
 */
require get_template_directory() . '/inc/hybrid/attr.php';

/**
 * Customizer Library.
 */
require get_template_directory() . '/admin/customizer-library.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


/**
 * Custom customizer function.
 *
 * @since  1.0.0
 */
function tj_recipe_remove_default_customizer( $wp_customize ) {

	// Move section to new panel
	//$wp_customize->get_section( 'title_tagline' )->panel       = 'header';
	//$wp_customize->get_section( 'header_image' )->panel        = 'header';
	//$wp_customize->get_section( 'static_front_page' )->panel   = 'general';
	//$wp_customize->get_section( 'colors' )->panel              = 'color';
	//$wp_customize->get_section( 'background_image' )->panel    = 'color';

	// Move the Theme Layout
	// $wp_customize->get_section( 'layout' )->panel              = 'layouts';
	// $wp_customize->get_section( 'layout' )->title              = esc_html__( 'Global Layout', 'reviewpro' );
	// $wp_customize->get_section( 'layout' )->priority           = 1;

	// Change the title/description/priority
	//$wp_customize->get_section( 'title_tagline' )->title       = esc_html__( 'Site Title', 'reviewpro' );
	//$wp_customize->get_section( 'title_tagline' )->description = esc_html__( 'Site title will automatically disapear if you upload a logo.', 'reviewpro' );
	// $wp_customize->get_section( 'colors' )->title              = esc_html__( 'Background', 'reviewpro' );
	// $wp_customize->get_section( 'colors' )->priority           = 1;
	// $wp_customize->get_section( 'background_image' )->priority = 2;
	// $wp_customize->get_section( 'header_image' )->priority     = 1;

	// Live preview
	// $wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	// $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	// Remove default section from customizer
	$wp_customize->get_panel( 'nav_menus' )->priority          = 16;
	$wp_customize->remove_section('header_image');
	$wp_customize->remove_section('title_tagline');
	$wp_customize->remove_section('static_front_page');
	$wp_customize->remove_section('colors');

}
add_action( 'customize_register', 'tj_recipe_remove_default_customizer', 99 );
