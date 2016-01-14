<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
	<title>Patriot Computer Care</title>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url') ?>">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div id="fb-root"></div>
	<div id="header" class="clearfix">
		<div class="wrapper">
			<a id="logo" href="<?php bloginfo('url'); ?>">
				<h1 class="title">Patriot Computer Care</h1>
			</a>
		</div>
	
		<div id="border">
			<div class="wrapper">
				<?php wp_nav_menu(array(
					'theme_location' 	=> 'main_nav',
					'menu'				=> 'main_nav',
					'container_id' 		=> 'nav',
					'menu_id' 			=> 'nav',
					'container'			=> false,
				)); ?>

				<a href="#" class="toggleMobileNav">
					<i class="fa fa-bars"></i>
				</a>
				<?php get_search_form(); ?>
			</div>
		</div>

		<ul id="socialMedia">
			<li><a href=""><i class="fa fa-facebook-official"></i></a></li>
			<li><a href=""><i class="fa fa-twitter-square"></i></a></li>
			<li><a href=""><i class="fa fa-google-plus-square"></i></a></li>
			<li><a href=""><i class="fa fa-youtube-square"></i></a></li>
		</ul>
	</div>