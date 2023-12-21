<?php
   $type1 = get_field('custom_post_type_select');
   $title = get_field('title');

    if(get_field('top_bottom_spacing')){
        Helper_General::renderSpacings($block, get_field('top_bottom_spacing'));
    }

    if(get_field('container')){
        Helper_General::renderContainer($block, get_field('container'));
    }
?>


<section class="news_slider" id="<?php echo esc_attr($block['id']); ?>">
    <div class="container_fluid">
        <?php if($title){ ?>
            <div class="text">
                <?php echo $title; ?>
            </div>
        <?php } ?>
        <div class="swiper news_swiper">
            <div class="swiper-wrapper">
                <?php 
                    $args = array(
                        'post_type' => $type1,
                        'posts_per_page' => 6
                    );

                    $interviews_query = new WP_Query($args);
                    if ($interviews_query->have_posts()) :
                        while ($interviews_query->have_posts()) : $interviews_query->the_post(); ?>
                            <div class="swiper-slide">                         
                                <a href="<?php echo esc_url(get_permalink(get_the_ID())); ?>" class="news_slider-img">
                                    <?php the_post_thumbnail('large'); ?>
                                    <span class="news_slider-zoom">ZUM ARTIKEL</span>
                                </a>
                                <h3>
                                    <a href="<?php echo esc_url(get_permalink()); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>
                                
                                <div class="text">
                                    <?php the_excerpt(); ?>
                                </div>     
                            </div>     
                        <?php endwhile; 
                        wp_reset_postdata(); 
                    endif;
                ?>                   
            </div>

            <div class="swiper-button-prev news-button-prev"></div>
            <div class="swiper-button-next news-button-next"></div>
        </div>
    </div>
</section>
