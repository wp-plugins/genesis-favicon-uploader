<?php
add_action( 'admin_menu', 'wds_theme_menu' );

//theme menu option
function wds_theme_menu() {

  add_theme_page( 'WDS Theme Options', 'WDS Theme Options', 'manage_options', 'wds-theme', 'wds_theme_options' );

}

//theme settings page
function wds_theme_options() {

    if ( !current_user_can( 'manage_options' ) )  {
    wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
    }

    ?>
    <div class="wrap">
		<h2><?php _e( 'WDS Theme Settings', 'wds-theme' ); ?></h2>
		<form method="post" action="options.php">
			<?php settings_fields( '' ); ?>
			<?php $options = get_option( '' ); ?>
			
		</form>
	</div>
    <?php
}

add_action( 'admin_init', 'wds_settings_init' );

function wds_settings_init() {

	register_setting( 'wds_theme_options', 'b_theme_options', 'b_theme_options_validate' );

}

function b_theme_options_validate( $input ) {


	return $input;

}