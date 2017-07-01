<?php 
/**
 * The header of every page
 *
 * @package WordPress
 * @subpackage THWP
 */?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400" rel="stylesheet">
	<?php wp_head(); ?>
</head>
<body>
<div class="site">
 <h1 class="site-name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
 <h2 class="site-name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'description' ); ?></a></h2>
 <nav id="site-navigation" class="main-navigation" role="navigation">
    <?php
        // navigation menu
        wp_nav_menu( array(
            'theme_location' => 'primary',
            'menu_class'     => 'primary-menu',
            ) );
    ?>
    <hr>
    <?php
        // contact and social menu
        wp_nav_menu( array(
            'theme_location' => 'contact',
            'menu_class'     => 'contact-menu',
            ) );
    ?>
 </nav>