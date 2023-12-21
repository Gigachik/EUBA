<?php 
    /* Template name: VON AZUBIS FÜR AZUBIS */
    get_header(); 
    $queryObject = get_queried_object();
?>
<section class="title_category" style="padding-bottom: 0">
    <div class="container">
        <h1 class="border_text"><?php the_title(); ?></h1>
        <div class="title_category-inner">
            <?php  
                $terms = get_terms('category-' . $queryObject->post_name . '');
                if ($terms) {
                    foreach ($terms as $term) {
                    echo '<a class="border_text" href="' . get_term_link($term) . '">' . $term->name . '</a>';
                    }
                }
            ?>
        </div>
    </div>
</section>
<section class="interviews">
    <div class="container">
        <div class="interviews_inner" id="post-container">
            <?php   
                $args = array(
                    'post_type' => $queryObject->post_name,
                    'posts_per_page' => 8,                 
                );
           
                $interviews_query = new WP_Query($args);
                $post_count = $interviews_query->post_count;

                if(!empty($interviews_query->posts)) :
                    if ($interviews_query->have_posts()) :
                        while ($interviews_query->have_posts()) : $interviews_query->the_post();            
                        
                            do_action('card-azubi', $interviews_query->post->post_type, $interviews_query->post);

                        endwhile; 
                        wp_reset_postdata(); 
                    endif;
                endif;                
            ?>    
            <?php   
                $args = array(
                    'post_type' => $queryObject->post_name,
                    'posts_per_page' => 1,  
                    'offset' => 8,               
                );
           
                $interviews_query = new WP_Query($args);

                if(!empty($interviews_query->posts)) :
                    if ($interviews_query->have_posts()) :
                        while ($interviews_query->have_posts()) : $interviews_query->the_post();            
                        
                            ?>
                            <div class="trainees_inner-block">
                                <div class="trainees_inner-top">
                                    <img src="<?php bloginfo('template_url'); ?>/assets/app/svg/bulb.svg" alt="" />
                                    <h6 class="uppercase">Veranstaltung ...</h6>
                                </div>
                                <div class="trainees_inner-info">
                                    <h3>
                                        <a href="<?php echo esc_url(get_permalink(get_the_ID())); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h3>
                                    
                                    <div class="text">
                                        <?php the_excerpt(); ?>
                                    </div>
                                    <a href="<?php echo esc_url(get_permalink(get_the_ID())); ?>" class="link">mehr erfahren</a>
                                </div>
                            </div>     
                            <?php

                        endwhile; 
                        wp_reset_postdata(); 
                    endif;
                endif;                
            ?> 
                   
        </div>
        <?php  
            if($post_count >= 8){
        ?>
            <button class="more" id="load-more-posts" data-type='<?php echo $queryObject->post_name; ?>' data-exclude="all-azubi" data-slug="<?php echo $queryObject->slug; ?>">WEITERE ARTIKEL anzeigen</button>
            <input type="hidden" id="offset" value="<?php echo $post_count + 1; ?>">
        <?php } ?>
    </div>
</section>

<?php

    the_content();

    get_footer(); 
?>	