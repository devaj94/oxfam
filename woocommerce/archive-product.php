<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>

<?php 
	$productCategories = getProductCategoriesList();
	foreach($productCategories as $cat){
		ob_start();
	?>		
	<section class="category--wrap text-center" id="<?php echo strtolower($cat[1]).'-'.$cat[0]; ?>">
		<?php
			$bannerImage = (!empty($cat[3]) ? 'style="background-image: url('.$cat[3].')"' : 'style="background-color: var(--dark-green)"');
		?>
		<div class="category--banner has-bg" <?php echo $bannerImage; ?>>
			<div class="container">
				<h2><?php echo $cat[1]; ?></h2>
				<?php
					if(!empty($cat[4])){
						echo '<p>'.$cat[4].'</p>';
					}
				?>
			</div>
		</div>
		<div class="products-row">
			<div class="container">
				<?php  
					$productsList = do_shortcode('[products limit="4" columns="4" category="'.$cat[5].'"]');
					echo $productsList;
					unset($productsList);
				?>
			</div>			
		</div>
	</section>
	<?php }
	$html = ob_get_clean();
	echo $html;
?>

<?php
get_footer( 'shop' );
