<?php
    $title = get_field('title');
    $slider = get_field('setup_slider');
    $queryObject = get_queried_object();

    if(get_field('top_bottom_spacing')){
        Helper_General::renderSpacings($block, get_field('top_bottom_spacing'));
    }
    if(get_field('container')){
        Helper_General::renderContainer($block, get_field('container'));
    }
?>


<section class="interviews_slider" id="<?php echo esc_attr($block['id']); ?>">
    <div class="container_fluid">
        <?php if($title){ ?>
            <div class="text">
                <?php echo $title; ?>
            </div>
        <?php } ?>
        <div class="swiper interviews_swiper">
            <div class="swiper-wrapper">            
                <?php 
                    if($slider){
                        $slider_arr = [];
                        foreach($slider as $slide){ 
                            array_push($slider_arr, $slide->ID); 
                        }
                        $args = array(
                            'post_type' => $slider[0]->post_type,
                            'posts_per_page' => 3,
                            'post__in' => $slider_arr
                        );
                    }else{
                        $args = array(
                            'post_type' => $queryObject->post_type,
                            'posts_per_page' => 3,
                            'post__not_in' => array( $queryObject->ID )
                        );
                       
                    }

                    $interviews_query = new WP_Query($args);
                    if ($interviews_query->have_posts()) :
                        while ($interviews_query->have_posts()) : $interviews_query->the_post(); ?>
                            <div class="swiper-slide">
                                <?php 
                                    if($queryObject->post_type === 'von-azubis-fur-azubi'){
                                        do_action('card-azubi', $queryObject->post_type, $interviews_query->post); 
                                    }else{
                                        do_action('card', $queryObject->post_type, $interviews_query->post); 
                                    }
                                ?> 
                            </div> 
                        <?php endwhile; 
                        wp_reset_postdata(); 
                    endif;
                ?>                   
            </div>
        </div>
    </div>
</section>
