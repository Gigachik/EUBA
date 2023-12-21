<?php
    $link = get_field('link');

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

<section class="image_video" id="<?php echo esc_attr($block['id']); ?>">
    <div class="container_fluid">
        <div class="image_video-inner">
            <?php
            if( have_rows('content') ):
                while ( have_rows('content') ) : the_row();
                    if( get_row_layout() == 'image-with-text' ):
                        $image = get_sub_field('image');
                        $text = get_sub_field('text'); ?>
                        <div class="image_video-item <?php echo $sticky_right; ?>">
                            <?php if($image){ 
                                Helper_General::renderImage($image['ID'], 'full', ['alt' => $image['alt']]);
                            }
                            if($text){ ?>
                                <div class="text">
                                   <?php echo $text; ?>
                                </div>
                            <?php } ?>
                        </div>
                    <?php
                    elseif( get_row_layout() == 'video' ): 
                        $title = get_sub_field('title'); 
                        $image2 = get_sub_field('image2');
                        $text2 = get_sub_field('text2'); 
                        $link = get_sub_field('link'); ?>
                        <div class="image_video-item popup <?php echo $sticky_left; ?>">
                            <div class="image_video-top">
                                <h6 class="uppercase"><?php echo $title; ?></h6>
                            </div>
                            <div class="image_video-popup">
                                <?php Helper_General::renderImage($image2['ID'], 'full', ['alt' => $image2['alt']]); ?>
                                <a
                                    data-fancybox
                                    href="<?php echo esc_url($link['url']); ?>"
                                    title="<?php echo esc_attr($link['title']); ?>"
                                >
                                    <img class="image_video-play" src="<?php bloginfo('template_url'); ?>/assets/app/svg/play.svg" alt=""
                                /></a>
                            </div>
                            <?php
                            if($text2){ ?>
                                <div class="text">
                                   <?php echo $text2; ?>
                                </div>
                            <?php } ?>
                        </div>
                    <?php 
                    endif;
                endwhile;
            endif; ?>

           
        </div>
    </div>
</section>

