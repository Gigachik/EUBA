<?php
	$text = get_field('text');
	$scipt1 = get_field('scipt1');
	$scipt2 = get_field('scipt2');

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

<section class="text_script" id="<?php echo esc_attr($block['id']); ?>">
    <div class="container_fluid">
        <div class="text_script-inner">
            <div class="text_script-info <?php echo $sticky_left; ?>">
                <div class="text">
                    <?php echo $text; ?>
                </div>
            </div>
            <?php if($scipt1 || $scipt2){ ?>
                <div class="text_script-script <?php echo $sticky_right; ?>">
                    <div class="text_script-item">
                        <?php echo $scipt1; ?>
                    </div>
                    <div class="text_script-item">
                        <?php echo $scipt2; ?>
                    </div>
                </div>
            <?php } ?>
            
        </div>
    </div>
</section>
