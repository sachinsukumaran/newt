<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package owt
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="footer-section container">
			<div class="row">
				<div id="footer-section-1" class="footer-section col-md-3" style="border:1px solid #000">
					<?php
						if(is_active_sidebar('footer-1')){
						dynamic_sidebar('footer-1');
						}
					?>
				</div>
				<div id="footer-section-2" class="footer-section col-md-3" style="border:1px solid #000">
					<?php
						if(is_active_sidebar('footer-2')){
						dynamic_sidebar('footer-2');
						}
					?>
				</div>
				<div id="footer-section-3" class="footer-section col-md-3" style="border:1px solid #000">
					<?php
						if(is_active_sidebar('footer-3')){
						dynamic_sidebar('footer-3');
						}
					?>
				</div>
				<div id="footer-section-4" class="footer-section col-md-3" style="border:1px solid #000">
					<?php
						if(is_active_sidebar('footer-4')){
						dynamic_sidebar('footer-4');
						}
					?>
				</div>
			</div>
		</div>

		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'owt' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'owt' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'owt' ), 'owt', '<a href="http://underscores.me/">Underscores.me</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
