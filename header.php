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
	<!-- menu for mobile-->
	<nav class="dc_nav_mobile" style="display: none">
		<ul class="dc_menu">
			<?php wp_nav_menu( array( 'menu' =>'menu_top', 'container' => false, 'items_wrap' => '%3$s' ) ); ?>
		</ul>
	</nav>
	<div class="dc_main dc_main_shadow">
		
		<header id="dc_header">
			<div class="clearfix top-header">
				<div class="mobile-toggle" style="display: none">
					<span></span>
					<span></span>
					<span></span>
				</div>
				<div class="dc_connect">
					<ul>
						<li class="dcs_search"><i class="fa fa-search"></i></li>
						<li class="dch_search" style="display: none">
							<form method="get" id="searchform" action="<?php bloginfo('url'); ?>">
								<input name="s" type="text" onfocus="if(this.value=='Search...') this.value='';" onblur="if(this.value=='') this.value='Search...';" value="Search..." />
								<button type="submit">Search</button>
							</form>
						</li>
						<?php if( get_field('dc_facebook', option) ): ?><li><a href="<?php the_field('dc_facebook', option) ?>" title="Youtube"><i class="fa fa-facebook" aria-hidden="true"></i></a></li><?php endif; ?>
						<?php if( get_field('dc_twitter', option) ): ?><li><a href="<?php the_field('dc_twitter', option) ?>" title="Youtube"><i class="fa fa-twitter" aria-hidden="true"></i></a></li><?php endif; ?>
						<?php if( get_field('dc_youtube', option) ): ?><li><a href="<?php the_field('dc_youtube', option) ?>" title="Youtube"><i class="fa fa-youtube" aria-hidden="true"></i></a></li><?php endif; ?>
					</ul>
				</div>
				<div class="logo">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php the_field('logo', option) ?>" alt="Logo"></a>
				</div>
				<nav class="dc_nav">
					<ul class="dc_menu">
						<?php wp_nav_menu( array( 'menu' =>'menu_top', 'container' => false, 'items_wrap' => '%3$s' ) ); ?>
					</ul>
				</nav>
			

			</div>
			<div class="dc_trending" style="height: 25px;background: #4b73b9"></div>

		</header>