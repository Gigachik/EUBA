<?php
    $queryObject = get_queried_object();
    

    if(get_field('top_bottom_spacing')){
        Helper_General::renderSpacings($block, get_field('top_bottom_spacing'));
    }

    if(get_field('container')){
        Helper_General::renderContainer($block, get_field('container'));
    }
?>


<section class="category_tag" id="<?php echo esc_attr($block['id']); ?>">
    <div class="container_fluid">
        <div class="category_tag-inner">
            <a
                href="#"
                class="border_text"
                style="
                    color: #94b654;
                    border-color: #94b654;
                    --text-color: #94b654;
                "
                >REPORTAGE</a
            >
            <a
                href="#"
                class="tag"
                style="color: #94b654; --text-color: #94b654"
                >#management & it</a
            >
        </div>
    </div>
</section>
