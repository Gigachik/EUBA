<?php 

    $queryObject = get_queried_object();

    $id = get_the_ID();
    get_header(); 

    $categories = wp_get_post_terms($post->ID, 'category-' . $queryObject->post_type . '');
    $tags = wp_get_post_terms($id, 'tag-azubi');

    $color = get_field('color', 'tag-azubi_' . $tags[0]->term_id);  

    $image = get_field('image');

    $bg_color = get_field('bg_color');
    $set_background = get_field('set_background');

?>
<section class="full_image <?php if($set_background) echo 'background_only'; ?>" style="background: <?php echo esc_attr($bg_color); ?>">
    <?php 
        if(!empty($image)){
            Helper_General::renderImage($image['ID'], 'full', ['alt' => $image['alt'], 'caption' => $image['caption']]); 
        }
    ?>
</section>
<section class="category_tag sec">
    <div class="container_fluid">
        <div class="category_tag-inner">
            <?php
            if ( !empty( $categories ) && !is_wp_error( $categories ) ){
                foreach ( $categories as $category ) {
                echo '<a href="' . get_term_link($category->term_id) . '" class="border_text" style="color: ' . $color . '; border-color: ' . $color . '; --text-color: ' . $color . ';">' . $category->name . '</a>';
                }
            } 
            if 
            ( !empty( $tags ) && !is_wp_error( $tags ) ){
                foreach ( $tags as $tag ) {
                echo '<a href="' . get_term_link($tag->term_id) . '" class="tag" style="color: ' . $color . '; --text-color: ' . $color . ';">#' . $tag->name . '</a>';
                }
            } ?>         
        </div>
    </div>
</section>

<?php

    the_content();

    get_footer(); 
?>	