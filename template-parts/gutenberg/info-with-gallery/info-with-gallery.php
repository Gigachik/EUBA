<?php
	$text = get_field('text');
	$audio = get_field('audio');
	$audio_title = get_field('audio_title');
	$images = get_field('gallery');

	$set_sticky = get_field('set_sticky');
    $sticky_left = '';
    $sticky_right = '';
    if($set_sticky){
        $sticky = get_field('sticky');
        $sticky ? $sticky_right = 'sticky' : $sticky_left = 'sticky';
    }

	if(get_field('top_bottom_spacing')){
        Helper_General::renderSpacings($block, get_field('top_bottom_spacing'));
    }
	if(get_field('container')){
        Helper_General::renderContainer($block, get_field('container'));
    }
?>

<section class="info_gallery" id="<?php echo esc_attr($block['id']); ?>">
    <div class="container_fluid">
        <div class="info_gallery-inner">
            <div class="info_gallery-block <?php echo $sticky_left; ?>">
				<?php if(!empty($text)){ ?>
					<div class="text">
						<?php echo $text; ?>
					</div>	
				<?php } ?>
				<?php if(!empty($audio)){ ?>
					<div class="info_gallery-audio">
						<?php if($audio_title) { ?>
							<h6 class="uppercase">
								<?php echo $audio_title; ?>
							</h6>
						<?php } ?>
						<?php echo $audio; ?>
					</div>
				<?php } ?>
            </div>
            <div class="info_gallery-imgs <?php echo $sticky_right; ?>">		
				<?php foreach( $images as $image ): ?>
					<figure>
						<?php Helper_General::renderImage($image['ID'], 'large', ['alt' => $image['alt'], 'caption' => $image['caption']]); ?>
					</figure>	
                <?php endforeach; ?>    
            </div>
        </div>
    </div>
</section>
