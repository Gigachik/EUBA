<?php
add_action( 'after_setup_theme', 'setup_textdomain' );

function setup_textdomain(){
	load_theme_textdomain( TEXTDOMAIN, get_template_directory() . '/languages' );
}