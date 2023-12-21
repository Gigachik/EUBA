<?php
    $title = get_field('title');
    $image = get_field('image');
    $text = get_field('text');

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


<section class="choices" id="<?php echo esc_attr($block['id']); ?>">
    <div class="container_fluid">
        <div class="choices_inner">
            <div class="choices_inner-form">
                <?php
                    if( have_rows('choices') ):
                        while( have_rows('choices') ) : the_row(); ?>
                            <div class="choices_inner-item <?php echo $sticky_left; ?>">
                                <h4 class="<?php if(!get_sub_field('active')) echo 'active'; ?>">
                                    <span></span>
                                    <?php the_sub_field('choice1'); ?>
                                </h4>
                                <h4 class="<?php if(get_sub_field('active')) echo 'active'; ?>">
                                    <span></span>
                                    <?php the_sub_field('choice2'); ?>
                                </h4>
                            </div>
                        <?php
                        endwhile;
                    endif;
                ?>              
            </div>
            <?php if($title && $image && $text){ ?>
                <div class="choices_inner-block <?php echo $sticky_right; ?>">
                    <div class="choices_inner-top">
                        <h5 class="uppercase"><?php echo $title; ?></h5>
                        <?php 
                            if(!empty($image)){
                                Helper_General::renderImage($image['ID'], 'full', ['alt' => $image['alt']]); 
                            }
                        ?>
                    </div>
                    <div class="text">
                        <?php echo $text; ?>
                    </div>
                </div>
           <?php } ?>
            
        </div>
    </div>
</section>
