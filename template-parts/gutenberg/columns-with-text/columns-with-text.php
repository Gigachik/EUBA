<?php
 

    if(get_field('top_bottom_spacing')){
        Helper_General::renderSpacings($block, get_field('top_bottom_spacing'));
    }

    if(get_field('container')){
        Helper_General::renderContainer($block, get_field('container'));
    }
?>


<section class="columns_text" id="<?php echo esc_attr($block['id']); ?>">
    <div class="container_fluid">
        <div class="columns_text-inner">
            <?php
                if( have_rows('columns') ):
                    while( have_rows('columns') ) : the_row();
                        $title = get_sub_field('title');
                        $border = get_sub_field('border');
                        $text1 = get_sub_field('text1');
                        $image = get_sub_field('image');
                        $image2 = get_sub_field('person_image');
                        $text2 = get_sub_field('text2'); ?>
                        <div class="columns_text-item">
                            <div class="columns_text-top">
                                <?php if($title){ ?>
                                    <h3><?php echo $title; ?></h3>
                                <?php } ?>
                                <?php if($border){ ?>
                                    <h3 class="border_text"><?php echo $border; ?></h3>
                                <?php } ?>
                            </div>
                            <div class="text">
                                <?php echo $text1; ?>
                            </div>
                            <figure>
                                <?php Helper_General::renderImage($image['ID'], 'full', ['alt' => $image['alt'], 'caption' => $image['caption']]); ?>
                            </figure>
                            <div class="text">
                                <?php echo $text2; ?>
                            </div>
                        </div>
                        <?php
                    endwhile;
                endif;
            ?>
        </div>
    </div>
</section>
