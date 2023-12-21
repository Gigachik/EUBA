<?php	
    $posts = get_field('posts');


    if(get_field('top_bottom_spacing')){
        Helper_General::renderSpacings($block, get_field('top_bottom_spacing'));
    }
    if(get_field('container')){
        Helper_General::renderContainer($block, get_field('container'));
    }

?>


<section class="quotes" id="<?php echo esc_attr($block['id']); ?>">
    <div class="swiper quotes_swiper">
        <div class="swiper-wrapper">        
            <?php
            if( $posts ): ?>
                <?php foreach( $posts as $post ): 
                    $image = get_field('image', $post->ID);
                    $image_mob = get_field('image_mob', $post->ID);
                    setup_postdata($post); ?>
                    <style>
                        @media (max-width: 480px) {
                            #quotes_bg-<?php echo $post->ID; ?> {
                                background-image: url(<?php echo $image_mob; ?>) !important;
                            }
                        }
                    </style>
                    <div
                        class="swiper-slide"
                        id="quotes_bg-<?php echo $post->ID; ?>"
                        style="background-image: url(<?php echo $image; ?>)"
                    >
                        <div class="container_fluid">
                            <div class="quotes_item">
                                <?php  
                                    $categories = wp_get_post_terms($post->ID, 'category-'. $post->post_type . '');
                                    $tags = wp_get_post_terms($post->ID, 'tag-interviews');
                                    $color = get_field('color', 'tag-interviews_' . $tags[0]->term_id);
                                    if ( !empty( $categories ) && !is_wp_error( $categories ) ){
                                        foreach ( $categories as $category ) {
                                        echo '<a href="' . get_term_link($category->term_id) . '" class="border_text" style="color: ' . $color . '; border-color: ' . $color . '; --text-color: ' . $color . ';">' . $category->name . '</a>';
                                        }
                                    }
                                ?>
                                <h2>
                                    <a href="<?php the_permalink($post->ID); ?>">
                                        <?php echo $post->post_title; ?>
                                    </a>
                                </h2>
                                <div class="quotes_item-flex">
                                    <?php  
                                        if ( !empty( $tags ) && !is_wp_error( $tags ) ){
                                            foreach ( $tags as $tag ) {
                                                echo '<a href="' . get_term_link($tag->term_id) . '" class="tag" style="color: ' . $color . '; --text-color: ' . $color . ';">#' . $tag->name . '</a>';
                                            }
                                        }
                                    ?>
                                    <a href="<?php the_permalink($post->ID); ?>" class="link">ZUM ARTIKEL</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php 
                wp_reset_postdata(); ?>
            <?php endif; ?>        
        </div>
        <div class="swiper-pagination"></div>
    </div>
</section>
