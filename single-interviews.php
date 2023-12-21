<?php 

    $queryObject = get_queried_object();
    $id = get_the_ID();
    get_header(); 

    $categories = wp_get_post_terms($post->ID, 'category-' . $queryObject->post_type . '');
    $tags = wp_get_post_terms($id, 'tag-interviews');

    $color = get_field('color', 'tag-interviews_' . $tags[0]->term_id);  

    $image = get_field('image');
    $image_mob = get_field('image_mob');
    $text = get_field('text');
?>

<style>
    @media (max-width: 480px) {
        .intro {
            background-image: url(<?php echo $image_mob; ?>) !important;
        }
    }
</style>
<section
    class="intro"
    style="background-image: url(<?php echo $image; ?>)"
>
    <div class="container_fluid">
        <div class="intro_inner">        
            <div class="text">
                <?php echo $text; ?>
            </div>
        </div>
    </div>
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