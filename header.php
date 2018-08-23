<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package owt
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
<div id="page" class="site container">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'owt' ); ?></a>

	<header id="masthead" class="site-header row">
		<div class="site-branding col-md-5" style="border:1px solid #000">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$owt_description = get_bloginfo( 'description', 'display' );
			if ( $owt_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $owt_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<nav class="navbar navbar-expand-md navbar-light bg-light col-md-7" role="navigation">
		  <div class="container">
		    <!-- Brand and toggle get grouped for better mobile display -->
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

		        <?php
		        wp_nav_menu( array(
								'menu'    => 'primary',
		            'theme_location'    => 'primary',
		            'depth'             => 2,
		            'container'         => 'div',
		            'container_class'   => 'collapse navbar-collapse',
		            'container_id'      => 'bs-example-navbar-collapse-1',
		            'menu_class'        => 'nav navbar-nav mr-auto',
		            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
		            'walker'            => new WP_Bootstrap_Navwalker()
							));
		        ?>
		    </div>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
