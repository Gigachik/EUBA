<?php
class DT_Gutenberg {

	public function __construct() {
		add_action('init', [$this, 'enable_blocks']);
	}

	public function enable_blocks(){

		$blocks = glob( get_template_directory() . '/template-parts/gutenberg/**/*-registration.php' );

		foreach ( $blocks as $block_path ) {
			include( $block_path );
		}

	}

}

new DT_Gutenberg();