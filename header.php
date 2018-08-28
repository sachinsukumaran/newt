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
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'owt' ); ?></a>
	<?php
		$header_image = get_header_image();
	 ?>

<?php
	if(!empty(get_theme_mod('show_contact_bar'))){
 ?>
<!-- Contact Header -->
<?php
	$phone = get_option('contact_phone');
	$address = get_option('contact_address');
	$email = get_option('contact_email');
?>
<header id="masthead" style="background:url(<?php echo $header_image;?>) no-repeat fixed center;background-size:cover;">
<!-- Contact Header -->
<div id="#contact-banner" class="contact-banner container-fluid">
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-7">
			<div class="container contact-details">
				<div class="row">
					<div class="col-md-3">
						<?php
							if(!empty($phone))
								echo '<i class="fa fa-phone"></i> '.$phone;
						?>
					</div>
					<div class="col-md-5">
						<?php
								if(!empty($address))
								echo '<i class="fa fa-map-marker"></i> '.$address;
						?>
					</div>
					<div class="col-md-4">
						<?php
							if(!empty($email))
							echo '<i class="fa fa-envelope"></i> '.$email;
						?>
				</div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="container social-details">
				<?php
					$facebook_url = filter_var(get_option('facebook_url'), FILTER_VALIDATE_URL, FILTER_SANITIZE_URL);
					$twitter_url = filter_var(get_option('twitter_url'), FILTER_VALIDATE_URL, FILTER_SANITIZE_URL);
					$linkedin_url = filter_var(get_option('linkedin_url'), FILTER_VALIDATE_URL, FILTER_SANITIZE_URL);
					$instagram_url = filter_var(get_option('instagram_url'), FILTER_VALIDATE_URL, FILTER_SANITIZE_URL);
					$pinterest_url = filter_var(get_option('pinterest_url'), FILTER_VALIDATE_URL, FILTER_SANITIZE_URL);
			  ?>
				<div class="row">
					<div class="d-flex flex-row align-right">
						<?php if(!empty($facebook_url)) {?>
								<div class="social_links"><a href="<?php echo $facebook_url;?>" target="_blank"><i class="fa fa-facebook"></i></a></div>
						<?php
									}
								if(!empty($twitter_url))	{?>
								<div class="social_links"><a href="<?php echo $twitter_url;?>" target="_blank"><i class="fa fa-twitter"></i></a></div>
						<?php
									}
								if(!empty($linkedin_url))	{?>
								<div class="social_links"><a href="<?php echo $linkedin_url;?>" target="_blank"><i class="fa fa-linkedin"></i></a></div>
						<?php
									}
								if(!empty($instagram_url)) {?>
								<div class="social_links"><a href="<?php echo $instagram_url;?>" target="_blank"><i class="fa fa-instagram"></i></a></div>
						<?php
									}
								if(!empty($pinterest_url)) {?>
								<div class="social_links"><a href="<?php echo $pinterest_url;?>" target="_blank"><i class="fa fa-pinterest"></i></a></div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-1"></div>
	</div>
</div><!-- Contact Header -->

<!-- Logo + Nav -->
<?php
		$logo_id = get_theme_mod( 'custom_logo' );
		$image_src = wp_get_attachment_image_src( $logo_id, 'full' );
		$owt_logo_image = $image_src[0];
		$owt_description = get_bloginfo( 'description', 'display' );
 ?>
<div id="#logonav" class="site-header container-fluid">
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-4">
			<?php if(is_front_page() && is_home()): ?>
				<div class="row site-text-branding">
					<div class="site-logo col-md-5">
						<?php if(!empty($owt_logo_image)){ ?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
								<img src="<?php echo $owt_logo_image; ?>" alt="" />
							</a>
						<?php } ?>
					</div>
					<div class="col-md-7">
						<div class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>
						<?php
							//if ( $owt_description || is_customize_preview() ) :
						?>
						<div class="site-description"><?php echo $owt_description; /* WPCS: xss ok. */ ?></div>
					</div>
				</div>
			<?php endif;?>
		</div><!-- Logo and Branding -->

			<nav class="navbar navbar-expand-md navbar-light bg-faded col-md-7" role="navigation">
			  <!div class="container">
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
		    <!/div>
			</nav>
	</div>
</div>
<!-- Logo + Nav -->
<?php
	}
?>
<!-- Site Hero -->
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
<!-- Site Hero -->
</header><!-- Header -->




	<div id="content" class="site-content container">
