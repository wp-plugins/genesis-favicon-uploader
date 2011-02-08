<?php
add_action( 'after_setup_theme', 'wdsheader_setup' );

if ( ! function_exists( 'wdsheader_setup' ) ):

function wdsheader_setup() {

define( 'HEADER_TEXTCOLOR', '' );
define( 'HEADER_IMAGE', '%s/images/headers/green-gradient-header.jpg' );

define( 'HEADER_IMAGE_WIDTH', apply_filters( 'wds_header_image_width', 960 ) );
define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'wds_header_image_height', 85 ) );

define( 'NO_HEADER_TEXT', true );

add_custom_image_header( '', 'wds_admin_header_style' );

}
endif;

if ( ! function_exists( 'wds_admin_header_style' ) ) :

function wds_admin_header_style() {
?>
<style type="text/css">
#headimg {
height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
}
#headimg h1, #headimg #desc {
display: none;
}
</style>
<?php
}
endif;
?>