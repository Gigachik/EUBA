<?php

class ENQUEUE_SETUP {

	public function __construct() {
		add_action( 'wp_enqueue_scripts', [$this, 'setup_styles'], 20);
		add_action( 'wp_enqueue_scripts', [$this, 'setup_scripts'], 20);
		add_action( 'wp_enqueue_scripts', [$this, 'setup_libs_js'], 10 );
		add_action( 'wp_enqueue_scripts', [$this, 'setup_libs_styles'], 10 );
		add_action( 'wp_enqueue_scripts', [$this, 'setup_blocks_js'] );
	}

	public function setup_styles(){

		wp_enqueue_style( 'theme-style', get_stylesheet_uri(), array(), _S_VERSION );
		wp_style_add_data( TEXTDOMAIN . '-style', 'rtl', 'replace' );

		$css_files = Helper_General::getFiles(get_template_directory() . '/assets/app/css/');

		$i = 1;
		foreach ( $css_files as $file ) {
			wp_enqueue_style(TEXTDOMAIN . '-style-' . $i, get_template_directory_uri() . '/assets/app/css/' . $file, [], _S_VERSION);
			$i++;
		}

	}

	public function setup_scripts(){

		wp_enqueue_script("jquery");

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		$js_files = Helper_General::getFiles(get_template_directory() . '/assets/app/js/');

		$i = 1;
		foreach ( $js_files as $file ) {

			$in_footer = ($file === 'libs.min.js') ? false : true;
			wp_enqueue_script(TEXTDOMAIN . '-js-' . $i, get_template_directory_uri() . '/assets/app/js/' . $file, [], _S_VERSION, $in_footer);

			$i++;
		}

	}

	public function setup_libs_js(){
		
		wp_enqueue_script(TEXTDOMAIN . '-jquery', get_template_directory_uri() . '/assets/app/libs/jquery/jquery.min.js', ['jquery'], _S_VERSION, false);
		wp_enqueue_script(TEXTDOMAIN . '-fancybox', get_template_directory_uri() . '/assets/app/libs/fancybox/fancy.js', ['jquery'], _S_VERSION, false);
		wp_enqueue_script(TEXTDOMAIN . '-roundslider', get_template_directory_uri() . '/assets/app/libs/roundSlider/roundslider.js', ['jquery'], _S_VERSION, false);
		wp_enqueue_script(TEXTDOMAIN . '-swiper', get_template_directory_uri() . '/assets/app/libs/swiper/swiper-bundle.min.js', ['jquery'], _S_VERSION, false);

	}

	public function setup_libs_styles(){
		wp_enqueue_style(TEXTDOMAIN . '-fancybox', get_template_directory_uri() . '/assets/app/libs/fancybox/fancy.css', [], _S_VERSION);
		wp_enqueue_style(TEXTDOMAIN . '-roundslider', get_template_directory_uri() . '/assets/app/libs/roundSlider/roundslider.css', [], _S_VERSION);
		wp_enqueue_style(TEXTDOMAIN . '-swiper', get_template_directory_uri() . '/assets/app/libs/swiper/swiper-bundle.min.css', [], _S_VERSION);

	}
	

	public function setup_blocks_js(){
		$js_blocks = Helper_General::getFiles(get_template_directory() . '/template-parts/gutenberg/');

		if(!empty($js_blocks)){
			foreach ($js_blocks as $js_block){

				if(strpos($js_block, '.js') !== false){
					if(strpos($js_block, '-admin') !== false){
						continue;
					}
					wp_enqueue_script(TEXTDOMAIN . '-block-' . str_replace('.js', '', $js_block), get_template_directory_uri() . '/template-parts/gutenberg/' . str_replace('.js', '', $js_block) . '/' . $js_block, [], _S_VERSION, true);
				}

			}
		}

	}

}

new ENQUEUE_SETUP();