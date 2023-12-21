<?php
    $type1 = get_field('custom_post_type_select');
    $type2 = get_field('custom_post_type_select2');
    $title = get_field('title');

    if(get_field('top_bottom_spacing')){
        Helper_General::renderSpacings($block, get_field('top_bottom_spacing'));
    }

    if(get_field('container')){
        Helper_General::renderContainer($block, get_field('container'));
    }
?>

<section>
    <div class="interviews" id="<?php echo esc_attr($block['id']); ?>">
        <div class="container_fluid">
            <?php if($title){ ?>
                <div class="text">
                    <?php echo $title; ?>
                </div>
            <?php } ?>
        
            <div class="interviews_inner">
                <?php 
                    $custom_post_types = array('interviews', 'meinungen', 'reportagen', 'reports', 'veranstaltungen', 'zu-besuch-bei');
                    for ($i = 0; $i < 3; $i++) {
                        $args = array(
                            'post_type' => $custom_post_types[$i],
                            'posts_per_page' => 1
                        );
        
                        $interviews_query = new WP_Query($args);
                        if ($interviews_query->have_posts()) :
                            while ($interviews_query->have_posts()) : $interviews_query->the_post();
                                
                                do_action('card', $custom_post_types[$i], $interviews_query->post);    
                    
                            endwhile; 
                            wp_reset_postdata(); 
                        endif;
                    }              
                ?>                             
            </div>
        </div>
    </div>
    <?php 
        $selected_post = get_field('selected_post'); 
        $selected_post = $selected_post[0];
        do_action('selected-card', $selected_post->post_type, $selected_post); 
    ?>
    <div class="interviews" id="<?php echo esc_attr($block['id']); ?>">
        <div class="container_fluid">
            <div class="interviews_inner">
                <?php 
                    for ($i = 3; $i < 6; $i++) {
                        $args = array(
                            'post_type' => $custom_post_types[$i],
                            'posts_per_page' => 1
                        );
        
                        $interviews_query = new WP_Query($args);
                        if ($interviews_query->have_posts()) :
                            while ($interviews_query->have_posts()) : $interviews_query->the_post();
                                
                                if($custom_post_types[$i] === 'zu-besuch-bei'){
                                    do_action('card-besuch', $custom_post_types[$i], $interviews_query->post);    
                                }else{
                                    do_action('card', $custom_post_types[$i], $interviews_query->post);    

                                }
                        
                            endwhile; 
                            wp_reset_postdata(); 
                        endif;
                    }              
                ?>                                 
            </div>
        </div>
    </div>
</section>