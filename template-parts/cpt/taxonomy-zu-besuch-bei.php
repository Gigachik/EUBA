<?php
add_action( 'taxonomy-besuch', 'render_taxonomy_besuch', 10, 2);

function render_taxonomy_besuch($queryObject, $selected_post) { ?>    
    <section>
        <div class="interviews">
            <div class="container">
                <div class="interviews_inner">
                    <?php 
                        $args = array(
                            'post_type' => $queryObject->post_name,
                            'posts_per_page' => 3,
                            'post__not_in'   => (isset($selected_post) && is_object($selected_post) && isset($selected_post->ID)) ? array($selected_post->ID) : array(),
                        );

                        $interviews_query = new WP_Query($args);
                        $post_count1 = $interviews_query->post_count;

                        if(!empty($interviews_query->posts)) :
                            if ($interviews_query->have_posts()) :
                                while ($interviews_query->have_posts()) : $interviews_query->the_post();
                                    
                                    do_action('card-besuch', $queryObject->post_name, $interviews_query->post);    
                        
                                endwhile; 
                                wp_reset_postdata(); 
                            endif;
                        endif;
                        ?>                             
                </div>
            </div>
        </div>
        <?php      
            if($selected_post){
                do_action('selected-card', $queryObject->post_name, $selected_post); 
            }
        ?>
        <?php
            $args = array(
                'post_type' => $queryObject->post_name,
                'posts_per_page' => 6,
                'offset' => 3,
                'post__not_in'   => (isset($selected_post) && is_object($selected_post) && isset($selected_post->ID)) ? array($selected_post->ID) : array(),
            );

            $interviews_query = new WP_Query($args);
            $post_count2 = $interviews_query->post_count;
            if($post_count2 > 0){
        ?>
            <div class="interviews">
                <div class="container">
                    <div class="interviews_inner" id="post-container">
                        <?php   
                            if(!empty($interviews_query->posts)) :
                                if ($interviews_query->have_posts()) :
                                    while ($interviews_query->have_posts()) : $interviews_query->the_post();

                                        do_action('card-besuch', $queryObject->post_name, $interviews_query->post);    
                            
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
                        <button class="more" id="load-more-posts" data-slug="" data-type="<?php echo $queryObject->post_name; ?>" data-exclude="<?php if($selected_post) echo $selected_post->ID; ?>">WEITERE ARTIKEL anzeigen</button>
                        <input type="hidden" id="offset" value="<?php echo $total; ?>">
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </section>
<?php }