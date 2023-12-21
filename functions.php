<?php
/**
* Require Theme Setup Settings
*/
 
require_once ('theme-setup/theme-setup.php');

/**
 * Start Master Classes
 */
require_once ('classes/master/Hooks.php');
require_once ('classes/Helpers/Helper_General.php');
require_once ('classes/Styles/Styles.php');
require_once ('classes/Other/Files.php');
require_once ('classes/master/ENQUEUE_SETUP.php');
require_once ('classes/master/Gutenberg.php');

require_once ('metaboxes/metaboxes.php');

require_once('template-parts/cards/card.php');
require_once('template-parts/cards/card-besuch.php');
require_once('template-parts/cards/card-azubi.php');
require_once('template-parts/cards/selected-card.php');

require_once('ajax/load-more.php');
require_once('ajax/slider-value.php');

require_once('template-parts/cpt/archive-taxonomy.php');
require_once('template-parts/cpt/taxonomy-category.php');
require_once('template-parts/cpt/taxonomy-category-azubi.php');
require_once('template-parts/cpt/taxonomy-zu-besuch-bei.php');

remove_theme_support( 'core-block-patterns' );

function enqueue_scripts() {

    wp_enqueue_script('load-more', get_template_directory_uri() . '/ajax/load-more.js', array('jquery'), null, true);

    $ajax_params = array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'ajax_nonce' => wp_create_nonce('load-more-nonce') 
    );


	$ajax_params2 = array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'ajax_nonce' => wp_create_nonce('round-slider-nonce') 
    );

    wp_localize_script('load-more', 'ajax_params', $ajax_params);

	wp_localize_script('round-slider', 'ajax_params', $ajax_params2);
}
add_action('wp_enqueue_scripts', 'enqueue_scripts');


add_filter( 'jpeg_quality', function( $quality ){ return 100; } );
add_filter( 'big_image_size_threshold', '__return_false' );


add_theme_support('menus');

add_filter('wpcf7_autop_or_not', '__return_false');


function getTplPageID ( $template_name ){
	$pages = get_pages(array(
		'meta_key' => '_wp_page_template',
		'meta_value' => $template_name . '.php'
	));
	foreach($pages as $page){
		return $page->ID ;
	}
}

function getTplPageURL( $template_name ){
	$page = get_pages(array(
		'meta_key' => '_wp_page_template',
		'meta_value' => $template_name . '.php'
	));
	if(!empty($page)){
		return get_permalink( $page[0]->ID );
	}
}

function dynamic_custom_post_types_choices($field) {
    $field['choices'] = array();

    $post_types = get_post_types(array('public' => true, '_builtin' => false), 'names');

    foreach ($post_types as $post_type) {
        $field['choices'][$post_type] = $post_type;
    }

    return $field;
}

add_filter('acf/load_field/name=custom_post_type_select', 'dynamic_custom_post_types_choices');
add_filter('acf/load_field/name=custom_post_type_select2', 'dynamic_custom_post_types_choices');
add_filter('acf/load_field/name=custom_post_type_select3', 'dynamic_custom_post_types_choices');

add_theme_support('align-wide');

function custom_image_block_markup($content, $block) {
    if ($block['blockName'] === 'core/image' || $block['blockName'] === 'core/heading' || $block['blockName'] === 'core/paragraph') {
        $content = '<div class="info"><div class="container">' . $content . '</div></div>';
    }
    return $content;
}

add_filter('render_block', 'custom_image_block_markup', 10, 2);


function redirect_to_welcome() {
    if (!is_user_logged_in() && !is_page(array('welcome', 'impressum', 'datenschutz'))) {
        $redirect_url = home_url('/welcome/');
        wp_redirect($redirect_url);
        exit;
    }elseif(is_404()){
        $redirect_url = home_url('/page-404/');
        wp_redirect($redirect_url);
        exit;
    }
}
add_action('template_redirect', 'redirect_to_welcome');