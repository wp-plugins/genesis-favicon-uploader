<?php 
add_custom_background();

add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'automatic-feed-links' );

//include theme plugins


// Set some default structure to our widget areas.
function wds_register_sidebar( $args ) {
	$defaults = array(
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => "</div>\n",
		'before_title'  => '<h4 class="widgettitle">',
		'after_title'   => "</h4>\n"
	);

	$args = wp_parse_args( $args, $defaults );

	return register_sidebar( $args );
}

define( 'WDS_CORE_DIR', TEMPLATEPATH.'/core' );
define( 'WDS_FUNCTIONS_DIR', WDS_CORE_DIR.'/functions' );


require_once( WDS_CORE_DIR .'/custom-header.php' );
require_once( WDS_CORE_DIR .'/settings.php' );