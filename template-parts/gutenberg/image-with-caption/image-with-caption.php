<?php
    $image = get_field('image');

    if(get_field('top_bottom_spacing')){
        Helper_General::renderSpacings($block, get_field('top_bottom_spacing'));
    }
    if(get_field('container')){
        Helper_General::renderContainer($block, get_field('container'));
    }
?>

<section class="image_caption" id="<?php echo esc_attr($block['id']); ?>">
    <div class="container_fluid">
        <figure>
            <?php Helper_General::renderImage($image['ID'], 'full', ['alt' => $image['alt'], 'caption' => $image['caption']]); ?>
        </figure>
    </div>
</section>
