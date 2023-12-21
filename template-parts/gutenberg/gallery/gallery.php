<?php
    $title = get_field('title');
    $images = get_field('gallery');

    if(get_field('top_bottom_spacing')){
        Helper_General::renderSpacings($block, get_field('top_bottom_spacing'));
    }
    if(get_field('container')){
        Helper_General::renderContainer($block, get_field('container'));
    }
?>

<section class="gallery" id="<?php echo esc_attr($block['id']); ?>">
    <h2><?php echo $title; ?></h2>
    <div class="container_fluid">     
        <div class="swiper gallery_swiper">
            <div class="swiper-wrapper">
                <?php foreach( $images as $image ): ?>
                    <div class="swiper-slide">
                        <a href="<?php echo esc_url($image['url']); ?>" data-fancybox="gallery" data-caption="<?php echo $image['caption']; ?>">
                            <?php Helper_General::renderImage($image['ID'], 'full', ['alt' => $image['alt']]); ?>
                        </a>
                    </div>
                <?php endforeach; ?>               
            </div>

            <div class="swiper_controllers">
                <div class="swiper-button-prev gallery-button-prev"></div>
                <div class="swiper-pagination gallery-pagination"></div>
                <div class="swiper-button-next gallery-button-next"></div>
            </div>
        </div>
    </div>
</section>
