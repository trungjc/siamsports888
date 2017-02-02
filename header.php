<!doctype html>
<html <?php language_attributes(); ?>>
<head>

<title><?php wp_title(); ?></title>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>

<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />

</head>
<body <?php body_class(); ?>>

<div class="dc_main dc_main_shadow clearfix">
	
<header id="dc_header" class="clearfix">
	<div class="logo">
		<a href="#"><img src="http://images.thepostgame.com/sites/all/themes/the_magazine_2/inc/images/global-v2/TPG2.0-full-noball-logo.svg" alt=""></a>
	</div>
	<nav class="dc_nav">
		<ul class="dc_menu">
			<?php wp_nav_menu( array( 'menu' =>'menu_top', 'container' => false, 'items_wrap' => '%3$s' ) ); ?>
		</ul>
	</nav>
	<div class="dc_connect">
		
	</div>
<?php if( have_rows('trending_item', option) ) { ?>
	<div class="dc_trending clearfix">
		<ul>
<?php while ( have_rows('trending_item', option) ) { the_row(); ?>
<?php $trend_id = get_sub_field(); ?>
			<li><a href="<?php the_permalink($trend_id) ?>" title="<?php the_title($trend_id); ?>"><?php the_title($trend_id); ?></a></li>
<?php } ?>
		</ul>
	</div>
<?php } ?>

</header>