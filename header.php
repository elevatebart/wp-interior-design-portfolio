<?php 
/**
 * The header of every page
 *
 * @package WordPress
 * @subpackage Interior Design
 */?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400" rel="stylesheet">
	<?php wp_head(); ?>
    <script type="text/javascript">
    (function($){
        $(function(){
            $('.homepage-image').each(function(){
                var $this = $(this);
                var src = $this.attr('src');
                var $replaced = $('<div>', {'class': 'homepage-image'});
                $this.replaceWith($replaced);
                $replaced.parallax({imageSrc: src, positionY: '-230px', speed: 0.85});
            });
        });
    })(jQuery);
    </script>
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