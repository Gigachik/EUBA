<?php
add_action( 'after_setup_theme', 'supports_setup' );

function supports_setup(){

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'customize-selective-refresh-widgets' );

	remove_image_size('1536x1536');
	remove_image_size('2048x2048');

}

/**
 * @return int
 * Disable srcset for images
 */
function disable_wp_responsive_images() {
	return 1;
}
add_filter('max_srcset_image_width', 'disable_wp_responsive_images');