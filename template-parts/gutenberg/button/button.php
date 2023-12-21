<?php
    $link = get_field('link');

    if(get_field('top_bottom_spacing')){
        Helper_General::renderSpacings($block, get_field('top_bottom_spacing'));
    }

    if(get_field('container')){
        Helper_General::renderContainer($block, get_field('container'));
    }
?>

<section class="button" id="<?php echo esc_attr($block['id']); ?>">
    <div class="container_fluid">
        <?php 
            if($link){
                Helper_General::renderLink($link, 'btn'); 
            }      
        ?>
    </div>
</section>
