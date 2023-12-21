<?php
    $type1 = get_field('custom_post_type_select');
    $jsonData = json_encode($type1);
    $selected_post = get_field('selected_post'); 
    if($selected_post) $selected_post = get_field('selected_post')[0];

    if(get_field('top_bottom_spacing')){
        Helper_General::renderSpacings($block, get_field('top_bottom_spacing'));
    }

    if(get_field('container')){
        Helper_General::renderContainer($block, get_field('container'));
    }

   
?>


<section class="interviews" id="<?php echo esc_attr($block['id']); ?>">
    <div class="container">
        <div class="interviews_inner">
            <?php 
                $args = array(
                    'post_type' => $type1,
                    'posts_per_page' => 3,
                    'post__not_in'   => (isset($selected_post) && is_object($selected_post) && isset($selected_post->ID)) ? array($selected_post->ID) : array(),
                    
                );
                $interviews_query = new WP_Query($args);
                $post_count1 = $interviews_query->post_count;

                if(!empty($interviews_query->posts)) :                   
                    if ($interviews_query->have_posts()) :
                        while ($interviews_query->have_posts()) : $interviews_query->the_post();
                      
                            do_action('card', $interviews_query->post->post_type, $interviews_query->post);    
                
                        endwhile; 
                        wp_reset_postdata(); 
                    endif;
                endif;
                ?>                             
        </div>
    </div>
</section>
<?php  
    if($selected_post){
        do_action('selected-card', $selected_post->post_type, $selected_post); 
    }
?>
<section class="interviews" id="<?php echo esc_attr($block['id']); ?>">
    <div class="container">
        <div class="interviews_inner" id="post-container">
            <?php   
                $args = array(
                    'post_type' => $type1,
                    'posts_per_page' => 6,
                    'offset' => 3,
                    'post__not_in' => (isset($selected_post) && is_object($selected_post) && isset($selected_post->ID)) ? array($selected_post->ID) : array(),
                );
           
                $interviews_query = new WP_Query($args);
                $post_count2 = $interviews_query->post_count;

                if(!empty($interviews_query->posts)) :
                    if ($interviews_query->have_posts()) :
                        while ($interviews_query->have_posts()) : $interviews_query->the_post();            
                        
                            do_action('card', $interviews_query->post->post_type, $interviews_query->post);    
                
                        endwhile; 
                        wp_reset_postdata(); 
                    endif;
                endif;                
            ?>                             
        </div>
        <?php  
            $total = $post_count1 + $post_count2; 
            if($total > 8){
        ?>
            <button class="more" id="load-more-posts" data-type='<?php echo $jsonData; ?>' data-exclude="<?php if($selected_post) echo $selected_post->ID; ?>" data-slug="">WEITERE ARTIKEL anzeigen</button>
            <input type="hidden" id="offset" value="<?php echo $total; ?>">
        <?php } ?>
    </div>
</section>