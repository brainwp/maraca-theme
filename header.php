<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package maraca
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>

<!-- COISAS ESPECIFICAS DO TEMA MARACA -->
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic,700italic' rel='stylesheet' type='text/css'>

</head>

<body <?php body_class(); ?>>

<script type="text/javascript">
$.noConflict();
$('.thumb-projetos').imageFill();
</script>

<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<header id="masthead" class="site-header" role="banner">
		
		<div id="site-navigation-opacity"></div>
		
		<nav id="site-navigation" class="navigation-main" role="navigation">
			<h1 class="menu-toggle"><?php _e( 'Menu', 'maraca' ); ?></h1>
			<div class="screen-reader-text skip-link">
            	<a href="#content" title="<?php esc_attr_e( 'Skip to content', 'maraca' ); ?>"><?php _e( 'Skip to content', 'maraca' ); ?></a>
            </div>
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #site-navigation -->

		<div class="site-branding">
				<div id="logo">
				<a class="a-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"></a>
				</div><!-- #logo -->

			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</div><!-- #site-branding -->
	</header><!-- #masthead -->

	<div id="main" class="site-main">
