<?php
    $image = get_field('image');
    $title = get_field('title');
    $text = get_field('text');
    $align = get_field('align');

    if(get_field('top_bottom_spacing')){
        Helper_General::renderSpacings($block, get_field('top_bottom_spacing'));
    }
    if(get_field('container')){
        Helper_General::renderContainer($block, get_field('container'));
    }

    
?>

<section class="info_icon" id="<?php echo esc_attr($block['id']); ?>">
    <div class="container_fluid">
        <div class="info_icon-item <?php if($align) echo 'right'; ?>">
            <div class="info_icon-top">
                <?php Helper_General::renderImage($image['ID'], 'full', ['alt' => $image['alt']]); ?>
                <h6 class="uppercase"><?php echo $title; ?></h6>
            </div>
            <div class="text">
                <?php echo $text; ?>
            </div>
        </div>
    </div>
</section>
