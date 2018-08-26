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
<div id="page" class="site container-fluid">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'owt' ); ?></a>
	<?php
		$header_image = get_header_image();
	 ?>
	<header id="masthead" class="row" style="background:url(<?php echo $header_image;?>) no-repeat fixed center;background-size:cover;">
		<div class="site-header row">
		<div class="col-md-1"></div>
		<div class="site-branding col-md-4">
			<?php
			//the_custom_logo();
			$custom_logo_id = get_theme_mod( 'custom_logo' );
			$image = wp_get_attachment_image_src( $custom_logo_id, 'full' );
			$custom_logo_image = $image[0];

			$owt_description = get_bloginfo( 'description', 'display' );
			if ( is_front_page() && is_home() ) :
				?>
			<div class="row">
				<?php
					if(!empty($custom_logo_image)){
			?>
				<div class="col-md-5 site-logo">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						<img src="<?php echo $custom_logo_image; ?>" alt="" />
					</a>
				</div>
				<div class="col-md-7 site-text-branding">
					<div class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>
				<?php
					if ( $owt_description || is_customize_preview() ) :
						?>
						<div class="site-description"><?php echo $owt_description; /* WPCS: xss ok. */ ?></div>
					<?php endif; ?>
				</div>
			<?php
					}
				?>
			</div>
				<?php
			else :
				?>
				<div class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>
				<div class="site-description"><?php echo $owt_description; /* WPCS: xss ok. */ ?></div>
				<?php
			//endif;
			//$owt_description = get_bloginfo( 'description', 'display' );
			//if ( $owt_description || is_customize_preview() ) :
				?>
				<!--<p class="site-description"><?php echo $owt_description; /* WPCS: xss ok. */ ?></p>-->
			<?php endif; ?>
		</div><!-- .site-branding -->

		<nav class="navbar navbar-expand-md navbar-light col-md-7" role="navigation">
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
	</div><!-- #site-header -->
	<div id="site-hero" class="site-hero container">
		<div class="row">
			<div class="col-md-9">
				<p class="hero-title">
					Think Positive<br>
					Attitude Is Everything
				</p>
				<p class="hero-text">
					You can live an amazing life, free from what is holding you down or holding you back. Be advised, you will be surprised by the big difference you will experience in your life!  Yes, we are here to help.
				</p>
			</div>
			<div class="col-md-3 hero-form">
				<?php wpforms_display( '1734', true );?>
			</div>

		</div>
	</div>
	</header><!-- #masthead -->
	<div id="content" class="site-content container">
