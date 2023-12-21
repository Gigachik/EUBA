<?php
    $image = get_field('image');

    if(get_field('top_bottom_spacing')){
        Helper_General::renderSpacings($block, get_field('top_bottom_spacing'));
    }
?>

<section class="full_image" id="<?php echo esc_attr($block['id']); ?>">
    <?php 
        if($image) Helper_General::renderImage($image['ID'], 'full', ['alt' => $image['alt'], 'caption' => $image['caption']]); 
    ?>
</section>
