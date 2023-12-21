<?php
    $audio = get_field('audio');
    $image = get_field('image');
    $title = get_field('title');
    $text = get_field('text');

    if(get_field('top_bottom_spacing')){
        Helper_General::renderSpacings($block, get_field('top_bottom_spacing'));
    }

    if(get_field('container')){
        Helper_General::renderContainer($block, get_field('container'));
    }
?>

<section class="audio_image" id="<?php echo esc_attr($block['id']); ?>">
    <div class="container_fluid">
        <div class="audio_image-inner">
            <div class="audio_image-block">
                <div class="audio_image-top">
                    <h6 class="uppercase"><?php echo $title; ?></h6>
                </div>
                <?php if($text) { ?>
                    <div class="audio_image-info">
                        <div class="text">
                            <?php echo $text; ?>
                        </div>
                    </div>
                <?php } ?>
                <?php if(!empty($audio)){ 
					echo $audio;
                } ?>
            </div>
            <?php if($image){ ?>
                <div class="audio_image-img">
                    <figure>
                        <?php Helper_General::renderImage($image['ID'], 'large', ['alt' => $image['alt'], 'caption' => $image['caption']]); ?>
                    </figure>
                </div>
            <?php } ?>
           
        </div>
    </div>
</section>
