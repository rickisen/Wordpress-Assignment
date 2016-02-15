<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <link href='https://fonts.googleapis.com/css?family=Source+Code+Pro' rel='stylesheet' type='text/css'>
	<?php endif; ?>
	<?php wp_head(); ?>
</head>
<body>
<div class="wrapper window-colors">
  <div class="header">

    <div class="home">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
        <h1> <?php bloginfo( 'name' ) ?> </h1> 
      </a>
    </div>

    <div class="header-widget-area float-right"> <?php dynamic_sidebar( 'header-widgets' ); ?> </div>

    <div class="horizontal-list float-right ">
      <?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'container_class' => 'header-nav-menu' ) ); ?>
    </div>

    <div class="clear"></div>

  </div>
