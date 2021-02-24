<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package OXFAM_e-Commerce
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'oxfam-e-commerce' ); ?></a>

	<header id="main-header" class="site-header">
		<div class="container">
			<nav class="row">
				<div class="site-branding">
					<?php the_custom_logo(); ?>
				</div>
				<div class="site-navigation-wrap">
					<?php
						wp_nav_menu(
							array(
								'menu' => 'Main Menu',
								'container' => 'div',
								'menu_class' => 'unstyled-list'
							)
						);
					?>					
				</div>
				<button class="icon-btn">
					<img src="<?php echo THEME_URI.'/assets/images/search.svg'; ?>" alt="Search Icon">
				</button>
				<ul class="unstyled-list nav-list--2">
					<?php if(isUserAdmin()): ?>
					<li class="activeHomeWrap">
						<span id="activeHome">
							<span></span>
							<img src="<?php echo THEME_URI.'/assets/images/dropdown-arrow.svg'; ?>" alt="">
						</span>
						<?php
							wp_nav_menu(array(
								'menu' => 'Homepages Navigation',
								'container' => 'ul',
								'menu_class' => 'unstyled-list site-dropdown homepages-dropdown'
							));
						?>
					</li>
					<?php endif; ?>
					<li>
						<button class="icon-button cart">
							<?php global $woocommerce; ?>
							<a class="cart-customlocation" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php _e('View your shopping cart', 'Oxfam'); ?>">				
							<?php
								$cart_total = $woocommerce->cart->get_cart_contents_count();
							?>	
								<img src="<?php echo get_template_directory_uri().'/assets/images/cart.svg'; ?>" alt="">																	
								<?php if(WC()->cart->get_cart_contents_count() > 0){
									echo '<div class="cart-count'.(WC()->cart->get_cart_contents_count() > 99 ? ' cart--big': '').'">
										<span>'.WC()->cart->get_cart_contents_count().'</span>
									</div>';
								} ?>								
							</a>
						</button>
					</li>
				</ul>
			</nav>	
		</div>
	</header><!-- #masthead -->
