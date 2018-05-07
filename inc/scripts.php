<?php
/**
 * Enqueue scripts and styles.
 *
 * @package    Tj Recipe
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2018, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */

/**
 * Loads the theme styles & scripts.
 *
 * @since 1.0.0
 * @link  http://codex.wordpress.org/Function_Reference/wp_enqueue_script
 * @link  http://codex.wordpress.org/Function_Reference/wp_enqueue_style
 */

 /**
  * Enqueue scripts and styles.
  */
 function tj_recipe_scripts() {
 	wp_enqueue_style( 'tj-recipe-style', get_stylesheet_uri() );

 	//wp_enqueue_script( 'tj-recipe-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

 	//wp_enqueue_script( 'tj-recipe-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
    // Main js file
    wp_enqueue_script( 'tj-recipe-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), 'null', true );
    wp_enqueue_script( 'tj-bootstrap-js', get_template_directory_uri() . '/assets/js/devs/bootstrap.min.js', array('jquery'), 'null', true );
    wp_enqueue_script( 'tj-matchHeight-js', get_template_directory_uri() . '/assets/js/devs/jquery.matchHeight.js', array('jquery'), 'null', true );
    wp_enqueue_script( 'tj-scrollUp-js', get_template_directory_uri() . '/assets/js/devs/jquery.scrollUp.js', array('jquery'), 'null', true );
    wp_enqueue_script( 'tj-popper-js', get_template_directory_uri() . '/assets/js/devs/popper.min.js', array('jquery'), 'null', true );
    wp_enqueue_script( 'tj-wow-js', get_template_directory_uri() . '/assets/js/devs/wow.min.js', array(), 'null', true );
    wp_enqueue_script( 'tj-superfish-js', get_template_directory_uri() . '/assets/js/devs/superfish.js', array('jquery'), 'null', true );
    wp_enqueue_script( 'tj-supersubs-js', get_template_directory_uri() . '/assets/js/devs/supersubs.js', array('jquery'), 'null', true );
    wp_enqueue_script( 'tj-mobile-nav', get_template_directory_uri() . '/assets/js/devs/jquery.slicknav.js', array('jquery'), 'null', true );
    //wp_enqueue_script('jquery');
    // Main css file
    wp_enqueue_style('tj-css-main', get_template_directory_uri(). '/assets/css/plugins.min.css');
    wp_enqueue_style('tj-animate-main', get_template_directory_uri(). '/assets/css/devs/animate.css');
    wp_enqueue_style('tj-bootstrap-css', get_template_directory_uri(). '/assets/css/devs/bootstrap.min.css');
    wp_enqueue_style('tj-fontawesome-css', get_template_directory_uri(). '/assets/css/devs/font-awesome.min.css');
    wp_enqueue_style('tj-magnific-popup', get_template_directory_uri(). '/assets/css/devs/magnific-popup.css');
    wp_enqueue_style('tj-responsive-css', get_template_directory_uri(). '/assets/css/devs/responsive.css');

 	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
 		wp_enqueue_script( 'comment-reply' );
 	}
 }
 add_action( 'wp_enqueue_scripts', 'tj_recipe_scripts' );
 ?>
