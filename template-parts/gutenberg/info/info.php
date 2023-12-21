<?php
	$bg_color = '';
	$text_color = '';
	
	if(isset($block['style'])){	
		$bg_color = $block['style']['color']['background'];
		$text_color = $block['style']['color']['text'];
	}
	
	
	$text = get_field('text');

	if(get_field('top_bottom_spacing')){
        Helper_General::renderSpacings($block, get_field('top_bottom_spacing'));
    }

	if(get_field('container')){
        Helper_General::renderContainer($block, get_field('container'));
    }

	
?>
<section class="info" id="<?php echo esc_attr($block['id']); ?>" style="background: <?php echo esc_attr($bg_color); ?>">
    <div class="container_fluid">
        <div class="text" style="color: <?php echo esc_attr($text_color); ?>">
			<?php echo $text; ?>
        </div>
    </div>
</section>
