<?php
    $title = get_field('title');
    $text1 = get_field('text1');
    $text1active = get_field('text1active');
    $text2 = get_field('text2');
    $text2active = get_field('text2active');

    if(get_field('top_bottom_spacing')){
        Helper_General::renderSpacings($block, get_field('top_bottom_spacing'));
    }

    if(get_field('container')){
        Helper_General::renderContainer($block, get_field('container'));
    }
?>


<section class="round_slider" id="<?php echo esc_attr($block['id']); ?>">
    <div class="container_fluid">
        <?php if($title){ ?>
            <h3><?php echo $title; ?></h3>
        <?php } ?>
        
        <div class="round_slider-slider"></div>
        <!-- <div class="round_slider-response"></div> -->
        <div class="round_slider-bottom">
            <div class="round_slider-item">
                <h3><?php echo $text1; ?></h3>
                <h3 class="round_slider-hidden">
                    <?php echo $text1active; ?>
                </h3>
            </div>
            <div class="round_slider-item">
                <h3><?php echo $text2; ?></h3>
                <h3 class="round_slider-hidden">
                    <?php echo $text2active; ?>
                </h3>
            </div>
        </div>
    </div>
</section>

