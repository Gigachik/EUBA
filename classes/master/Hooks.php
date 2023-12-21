<?php

class Enable_Hooks {

	public function __construct() {
		add_action('init', [$this, 'enable_hooks']);
	}

	public function enable_hooks(){
		$hooks = [];
		$hooks[] = glob( get_template_directory() . '/hooks/**/*.php' );
		$hooks[] = glob( get_template_directory() . '/hooks/*.php' );

		foreach ( $hooks as $hook ) {

			if(empty($hook)){
				continue;
			}

			if(is_array($hook)){
				foreach ($hook as $h){
					include( $h );
				}
			}else{
				include( $hook );
			}

		}
	}

}

new Enable_Hooks();