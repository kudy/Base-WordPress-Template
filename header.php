<!DOCTYPE html>
<html>
	<head>
		<title><?php echo wp_title(); ?></title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
		<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
		<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
		<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php
wp_head();
?>
	</head>
	<body>
		<div id="main">
			<div id="wrapper">
				<div id="header" role="banner">
					<a id="logo" href="<?php echo get_permalink('home'); ?>" title=""></a>
					<div id="navigation_box" role="navigation">
						<ul id="navigation">
								<?php wp_nav_menu( array( 'theme_location' => 'top' ) ); ?>
						</ul>
					</div>
				</div>
