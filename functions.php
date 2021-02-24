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
				'Homepages Navigation' => esc_html__( 'Homepages', 'oxfam-e-commerce' ),
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

	$sliderPages = ['templates/homepage-customer.php', 'templates/homepage-retailer.php', 'templates/homepage-companies.php', 'templates/about.php'];

	if (is_page_template($sliderPages)) { 

		wp_enqueue_style('swiper-style', THEME_URI.'/assets/css/swiper.min.css', array(), _S_VERSION );

		wp_enqueue_script('swiper-script', THEME_URI.'/assets/js/swiper.min.js', array(), _S_VERSION, true );

	}

	wp_enqueue_style('site-fonts', THEME_URI.'/assets/css/fonts.css', array(), _S_VERSION );

	wp_enqueue_style('main-style', THEME_URI.'/assets/css/main.css', array(), _S_VERSION );

	wp_enqueue_style('custom-woo', THEME_URI.'/assets/css/site-woo.css', array(), _S_VERSION );

	wp_enqueue_script('main-script', THEME_URI.'/assets/js/main.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'oxfam-e-commerce-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
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
add_theme_support( 'woocommerce' );
// class Description_Walker extends Walker_Nav_Menu
// {
//     function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 )
//     {
//         $classes = empty($item->classes) ? array () : (array) $item->classes;
//         $class_names = join(' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
//         !empty ( $class_names ) and $class_names = ' class="'. esc_attr( $class_names ) . '"';
//         $output .= "<div id='menu-item-$item->ID' $class_names>";
//         $attributes  = '';
//         !empty( $item->attr_title ) and $attributes .= ' title="'  . esc_attr( $item->attr_title ) .'"';
//         !empty( $item->target ) and $attributes .= ' target="' . esc_attr( $item->target     ) .'"';
//         !empty( $item->xfn ) and $attributes .= ' rel="'    . esc_attr( $item->xfn        ) .'"';
//         !empty( $item->url ) and $attributes .= ' href="'   . esc_attr( $item->url        ) .'"';
//         $title = apply_filters( 'the_title', $item->title, $item->ID );
//         $item_output = $args->before
//         . "<a $attributes>"
//         . $args->link_before
//         . $title
//         . '</a></div>'
//         . $args->link_after
//         . $args->after;
//         $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
//     }
// }

add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );

function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	ob_start();
	?>
	<a class="cart-customlocation" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>">
		<?php
			$cart_total = $woocommerce->cart->get_cart_contents_count();
		?>
		<img src="<?php echo THEME_URI.'/assets/images/cart.svg'; ?>" alt="">
		<?php if(WC()->cart->get_cart_contents_count() > 0){
			echo '<div class="cart-count'.(WC()->cart->get_cart_contents_count() > 99 ? ' cart--big': '').'">
				<span>'.WC()->cart->get_cart_contents_count().'</span>
			</div>';
		} ?>
	</a>	
	<?php
	$fragments['a.cart-customlocation'] = ob_get_clean();
	return $fragments; 
}

function isUserAdmin(){
	$user = wp_get_current_user();
	$allowed_roles = array('administrator');
	if( array_intersect($allowed_roles, $user->roles ) || !is_user_logged_in()){
		return true;
	}
	return false;
}

add_filter('woocommerce_product_related_products_heading', 'custom_related_products_heading');
function custom_related_products_heading() {
	$siteOptions = get_field('products', 'options');
	$customheading = $siteOptions['related_products_heading'];
    if(!empty($customheading)){
		return $customheading;
	}
	return 'POTREBBE PIACERTI ANCHE 2';
}
function add_img_wrapper_start() {
	woocommerce_show_product_loop_sale_flash();
    echo '<div class="archive-img-wrap">';
}
add_action( 'woocommerce_before_shop_loop_item_title', 'add_img_wrapper_start', 5, 2 );

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash' );

function add_img_wrapper_close() {
    echo '</div>';
}
add_action( 'woocommerce_before_shop_loop_item_title', 'add_img_wrapper_close', 12, 2 );

add_filter( 'wc_add_to_cart_message_html', 'empty_wc_add_to_cart_message', 10, 2);
function empty_wc_add_to_cart_message( $message, $products ) { 
    return ''; 
}; 

function getProductCategoriesList() {
    $product_categories = get_terms( $args = array(
        'taxonomy'   => "product_cat",
        'hide_empty' => false,
        'parent'     => 0,
    ) );
    $list = array();
    foreach( $product_categories as $cat ){
		if($cat->slug !== 'uncategorized'){
			$bannerImage = get_field( 'banner_image', 'product_cat_'.$cat->term_id );
			$link = get_term_link( $cat->term_id, 'product_cat' );
			$term_description = strip_tags(term_description($cat->term_id ));
			$list[] = array( $cat->term_id, $cat->name, $link, $bannerImage, $term_description, $cat->slug );
		}		        
    }
    return $list;
}