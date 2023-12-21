<?php
    $text = get_field('text');
	$text2 = get_field('text_2');
    $image = get_field('image');

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

<section class="sticky_info" id="<?php echo esc_attr($block['id']); ?>">
    <div class="container_fluid">
        <div class="sticky_info-inner">
            <div class="sticky_info-item <?php echo $sticky_left; ?>">
                <?php Helper_General::renderImage($image['ID'], 'large', ['alt' => $image['alt']]); ?>
                <div class="text">
                    <?php echo $text; ?>
                </div>
            </div>
            <div class="sticky_info-item <?php echo $sticky_right; ?>">
                <div class="text">
                    <?php echo $text2; ?>
                </div>
            </div>
        </div>
    </div>
</section>
