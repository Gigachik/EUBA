<?php
	$text = get_field('text');
    $text2 = get_field('person_text');
    $title = get_field('person_title');
    $script = get_field('person_script');
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

<section class="text_person" id="<?php echo esc_attr($block['id']); ?>">
    <div class="container_fluid">
        <div class="text_person-inner">
            <div class="text_person-info <?php echo $sticky_left; ?>">
                <div class="text">
                    <?php echo $text; ?>
                </div>
            </div>
            <?php if($text2 && $image && $title){ ?>
                <div class="text_person-list <?php echo $sticky_right; ?>">
                    <div class="text_person-top">
                        <h6><?php echo $title; ?></h6>
                        <?php Helper_General::renderImage($image['ID'], 'medium', ['alt' => $image['alt']]); ?>
                    </div>
                    <div class="text_person-block">
                        <div class="text">
                            <?php echo $text2; ?>
                        </div>
                    </div>
                    <?php if($script){ ?>
                        <div class="text_person-script">
                            <?php echo $script; ?>
                        </div>
                    <?php } ?>                    
                </div>
            <?php } ?>
        </div>
    </div>
</section>
