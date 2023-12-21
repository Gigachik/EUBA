<?php
    $title = get_field('title');
	$text = get_field('text');
    $image = get_field('image');

    if(get_field('top_bottom_spacing')){
        Helper_General::renderSpacings($block, get_field('top_bottom_spacing'));
    }
    if(get_field('container')){
        Helper_General::renderContainer($block, get_field('container'));
    }
?>

<section class="text_image" id="<?php echo esc_attr($block['id']); ?>">
    <div class="container_fluid">
        <div class="text_image-inner">
            <div class="text_image-top uppercase">
                <h6><?php echo $title; ?></h6>
            </div>
            <div class="text_image-block">
                <div class="text">
                    <?php echo $text; ?>
                </div>
                <?php if(!empty($image)){ ?>
                    <figure>
                        <?php Helper_General::renderImage($image['ID'], 'large', ['alt' => $image['alt'], 'caption' => $image['caption']]); ?>
                    </figure>
                <?php } ?>
               
            </div>
        </div>
    </div>
</section>
