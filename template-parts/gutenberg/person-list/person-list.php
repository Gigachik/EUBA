<?php
    if(get_field('top_bottom_spacing')){
        Helper_General::renderSpacings($block, get_field('top_bottom_spacing'));
    }

    if(get_field('container')){
        Helper_General::renderContainer($block, get_field('container'));
    }
?>

<section class="person_list" id="<?php echo esc_attr($block['id']); ?>">
    <div class="container_fluid">
        <div class="person_list-inner">
            <?php
                if( have_rows('person') ):
                    while( have_rows('person') ) : the_row(); ?>
                        <?php
                            $title = get_sub_field('title');
                            $image = get_sub_field('image');
                            $text = get_sub_field('text');
                        ?>
                        <div class="person_list-item">
                            <div class="person_list-top">
                                <h6><?php echo $title; ?></h6>
                                <?php Helper_General::renderImage($image['ID'], 'full', ['alt' => $image['alt']]); ?>
                            </div>
                            <div class="person_list-block">
                                <div class="text">
                                    <?php echo $text; ?>
                                </div>
                            </div>
                        </div>
                    <?php
                    endwhile;
                endif;
            ?>             
        </div>
    </div>
</section>

