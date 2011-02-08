<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title>
<?php wp_title( '|', true, 'right' );?> 
</title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_uri(); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php
if ( is_singular() && get_option( 'thread_comments' ) )
	wp_enqueue_script( 'comment-reply' );
	
wp_head();
?>

</head>

<body <?php body_class(); ?>>

 <div id="wrapper">  
<?php /* style="background: url(<?php header_image(); ?>) no-repeat transparent; */ ?>
	<div id="header">
		<div id="header-left">	
			<?php if ( is_home() ) { ?>
			<h1 id="site-title"><?php bloginfo( 'name' ); ?></h1>
			<?php } else { ?>
			<h2 id="site-title"><a href="<?php echo home_url(); ?>/"><?php bloginfo( 'name' ); ?></a></h2>
			<?php } ?>
			<p class="description"><?php bloginfo( 'description' ); ?></p>
		</div>
		<div id="header-right">
		
		</div>

	</div>

	<div id="nav">
		<?php if( function_exists( 'wp_nav_menu' ) ) {
			wp_nav_menu( array('container_class' => 'main-menu', 'theme_location' => 'primary' ) ); 
		} else {
			wp_list_pages();
		} ?>
	</div>
	
	<div id="container">  
	