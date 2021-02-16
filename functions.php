<?php
/**
 * OXFAM e-Commerce functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package OXFAM_e-Commerce
 */

define('THEME_URI', get_template_directory_uri());

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'oxfam_e_commerce_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function oxfam_e_commerce_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on OXFAM e-Commerce, use a find and replace
		 * to change 'oxfam-e-commerce' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'oxfam-e-commerce', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'Primary Navigation' => esc_html__( 'Primary', 'oxfam-e-commerce' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'oxfam_e_commerce_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'oxfam_e_commerce_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function oxfam_e_commerce_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'oxfam_e_commerce_content_width', 640 );
}
add_action( 'after_setup_theme', 'oxfam_e_commerce_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function oxfam_e_commerce_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'oxfam-e-commerce' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'oxfam-e-commerce' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'oxfam_e_commerce_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function oxfam_e_commerce_scripts() {
	wp_enqueue_style( 'oxfam-e-commerce-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'oxfam-e-commerce-style', 'rtl', 'replace' );

	wp_enqueue_style('site-fonts', THEME_URI.'/assets/css/fonts.css', array(), _S_VERSION );

	wp_enqueue_style('main-style', THEME_URI.'/assets/css/main.css', array(), _S_VERSION );

	wp_enqueue_script('main-script', THEME_URI.'/assets/js/main.js', array(), _S_VERSION );

	wp_enqueue_script( 'oxfam-e-commerce-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}	

	$homepages = ['templates/homepage-customer.php', 'templates/homepage-retailer.php'];

	if (is_page_template($homepages)) { 

		wp_enqueue_style('swiper-style', THEME_URI.'/assets/css/swiper.min.css', array(), _S_VERSION );

		wp_enqueue_script('swiper-script', THEME_URI.'/assets/js/swiper.min.js', array(), _S_VERSION );

	}
}
add_action( 'wp_enqueue_scripts', 'oxfam_e_commerce_scripts' );

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
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Site General Settings',
		'menu_title'	=> 'Site Settings',
		'menu_slug' 	=> 'site-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
}