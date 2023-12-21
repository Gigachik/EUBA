<?php
    $date = get_field('date');

    if(get_field('top_bottom_spacing')){
        Helper_General::renderSpacings($block, get_field('top_bottom_spacing'));
    }

    if(get_field('container')){
        Helper_General::renderContainer($block, get_field('container'));
    }
?>


<section class="date" id="<?php echo esc_attr($block['id']); ?>">
    <div class="container_fluid">
        <p class="uppercase date_text">Datum: <?php echo esc_html ( $date ); ?></p>
    </div>
</section>
