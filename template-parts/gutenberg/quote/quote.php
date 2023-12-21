<?php
    $image = get_field('image');
    $text = get_field('text');

    if(get_field('top_bottom_spacing')){
        Helper_General::renderSpacings($block, get_field('top_bottom_spacing'));
    }
    if(get_field('container')){
        Helper_General::renderContainer($block, get_field('container'));
    }
?>

<section class="image_quote" id="<?php echo esc_attr($block['id']); ?>">
    <div class="container_fluid">
        <div class="image_quote-inner <?php if(empty($image)) echo 'alone' ?>">
            <?php if(!empty($image)){ ?>
                <div class="image_quote-img">
                    <?php Helper_General::renderImage($image['ID'], 'full', ['alt' => $image['alt']]); ?>
                </div>
            <?php } ?>
            <div class="image_quote-block">
                <?php echo $text; ?>
            </div>
        </div>
    </div>
</section>
