<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package OXFAM_e-Commerce
 */

?>

	<footer class="site-footer">
		<div class="footer-bg">
			<div class="container">
				<div class="row">
					<div class="col">
						<?php
							if(have_rows('footer', 'options')):
								while(have_rows('footer', 'options')): the_row();
									if(have_rows('contact_details', 'options')):
										while(have_rows('contact_details', 'options')): the_row();
											$footerContactTitle = get_sub_field('title');
											$footercontactNo = get_sub_field('contact_no');
											$footerEmail = get_sub_field('email');
										endwhile;
									endif;
								endwhile;
							endif;							
						?>
						<h3><?php echo $footerContactTitle; ?></h3>
						<ul class="unstyled-list">
							<?php
								if(!empty($footercontactNo)){
									echo '<li><a href="tel:'.$footercontactNo.'">'.$footercontactNo.'</a></li>';
									echo '<li><a href="mailto:'.$footerEmail.'">'.$footerEmail.'</a></li>';
								}
							?>
						</ul>
					</div>
					<div class="col">
						<h3>oxfam shop</h3>
						<ul class="unstyled-list">
							<li>
								<a href="javscript:void(0)">Chi siamo</a>
							</li>
							<li>
								<a href="javscript:void(0)">I nostri negozi</a>
							</li>
							<li>
								<a href="javscript:void(0)">Contattaci</a>
							</li>
						</ul>
					</div>
					<div class="col">
						<h3>domande frequenti</h3>
						<ul class="unstyled-list">
							<li>
								<a href="javscript:void(0)">Rintraccia ordine</a>
							</li>
							<li>
								<a href="javscript:void(0)">Spedizioni e pagamenti</a>
							</li>
							<li>
								<a href="javscript:void(0)">Resi e rimborsi</a>
							</li>
						</ul>
					</div>
					<div class="col">
						<h3>area legale</h3>
						<ul class="unstyled-list">
							<li>
								<a href="javscript:void(0)">Privacy Policy</a>
							</li>
							<li>
								<a href="javscript:void(0)">Cookie Policy</a>
							</li>
							<li>
								<a href="javscript:void(0)">Termini e condizioni</a>
							</li>
						</ul>
					</div>
					<div class="col">
						<h3>ISCRIVITI ALLA NEWSLETTER</h3>
						<ul class="unstyled-list">
							<li>
								<a href="javscript:void(0)">Chi siamo</a>
							</li>
							<li>
								<a href="javscript:void(0)">I nostri negozi</a>
							</li>
							<li>
								<a href="javscript:void(0)">Contattaci</a>
							</li>
						</ul>
					</div>
					<div class="col">
						<h3></h3>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="copyright-footer">
					<?php 
						$copyright = get_field('footer', 'options')
					?>
					&copy; <?php echo date('Y').' '.$copyright['copyright_section']; ?>
				</div>
			</div>
		</div>
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
