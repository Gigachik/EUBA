<?php

class Helper_General{

	public static function getNews($count){

		return get_posts([
		    'numberposts' => $count,
		    'post_status' => 'publish',
		    'post_type' => 'post',
		]);

	}


	public static function renderImage($id, $size = 'thumbnail', $attr = []){
	    echo wp_get_attachment_image($id, $size, false, $attr);
		if(isset($attr['caption'])){ ?>
			<figcaption>
				<?php echo esc_html($attr['caption']); ?>
			</figcaption>
		<?php }
    }

    public static function renderSpacings($block, $spacings){
	
        $styles = new EUBA_Styles();
		
        $styles->spacingsDesktop($block, $spacings);
        $styles->spacingsTablet($block, $spacings);
        $styles->spacingsMobile($block, $spacings);


    }

	public static function renderContainer($block, $checked){
        $id = $block['id'];
		
        $styles = new container_Styles();

        $styles->container($id, $checked);


    }

	public static function renderLink($link, $classes = ''){
		?>
			<a class="<?php echo esc_attr($classes); ?>"
			   target="<?php echo esc_attr($link['target']); ?>"
			   href="<?php echo esc_url($link['url']); ?>"
			   title="<?php echo esc_attr($link['title']); ?>">
				<?php echo esc_html($link['title']); ?>		
			</a>
		<?php
	}

	public static function pvd($var){
		echo '<pre>';
		var_dump($var);
		echo '</pre>';
	}

	public static function getFiles($dir){
		return Files::scanDir($dir);
	}


}

new Helper_General();