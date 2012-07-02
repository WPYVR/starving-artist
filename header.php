<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package _s
 * @since _s 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', '_s' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); ?>

<link rel="stylesheet" href="styles/jquery.maximage.css" type="text/css" media="screen" title="CSS" charset="utf-8" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.cycle.all.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.easing.1.3.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.maximage.min.js" type="text/javascript"></script>

</head>

<body <?php body_class(); ?>>


<?php
/*
    $bgs = get_posts('post_type=background');
    foreach($bgs as $k => $v) {
        if ( $feat_image = wp_get_attachment_url( get_post_thumbnail_id($v->ID) ) )
            echo '<img src="'.$feat_image.'" />';
    }
*/
?>


<div id="page" class="hfeed site ">
	<?php do_action( 'before' ); ?>
	<header id="masthead" class="site-header container_12" role="banner">
		<hgroup class="grid_7">
			<h1 class="site-title"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
<!--
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
-->
		</hgroup>

		<nav role="navigation" class="site-navigation main-navigation grid_5">
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav>
	</header><!-- #masthead .site-header -->

	<div id="main" class="container_12">