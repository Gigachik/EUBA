<?php
add_action( 'after_setup_theme', 'setup_menus' );

function setup_menus() {

	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', TEXTDOMAIN ),
		)
	);

}
