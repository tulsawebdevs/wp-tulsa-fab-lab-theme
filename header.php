<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php nice_title(); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

<link rel="icon" href="<?php bloginfo( 'stylesheet_directory' ); ?>/img/ico/fav_icon.ico" type="image/x-icon"/>

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link href='http://fonts.googleapis.com/css?family=Orbitron:regular,bold|Crimson+Text:regular,400italic,600,600italic,700,700italic|Arvo:regular,italic,bold,bolditalic|Droid+Sans:regular,bold|Arvo:regular,italic,bold,bolditalic' rel='stylesheet' type='text/css'>

<?php wp_head(); ?>

</head>

<body <?php body_class('no-js'); ?>>

	<div id="header">
		<div class="wrap">
			<div id="logo">
				<h1><a href="<?php echo get_option('home'); ?>/" title="<?php bloginfo( 'description' ); ?>"><?php bloginfo('name'); ?></a></h1>
			</div>
			<ul class="reg-log">
				<?php wp_register(); ?>
				<li><?php wp_loginout(); ?></li>
			</ul>
			<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
		</div>
	</div>
	
	<div class="wrap">
