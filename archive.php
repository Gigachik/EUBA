<?php 
    /* Template name: Aktuelles */
    get_header(); 
    $queryObject = get_queried_object();
?>
<section class="news_list">
    <div class="container">
        <h1 class="border_text"><?php the_title(); ?></h1>
        <div class="news_list-inner" id="post-container">
            <?php   
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 6,
                );

                $interviews_query = new WP_Query($args);
                $post_count = $interviews_query->post_count;

                if ($interviews_query->have_posts()) :
                    while ($interviews_query->have_posts()) : $interviews_query->the_post(); ?>
                        <div class="news_list-item">
                            <div class="news_list-img">
                                <?php the_post_thumbnail('medium'); ?>
                            </div>
                            <h3>
                                <a href="<?php echo esc_url(get_permalink()); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h3>
                            <div class="text">
                                <?php the_excerpt(); ?>
                                <p><?php echo get_the_date(); ?></p>
                            </div>
                        </div>
                    <?php
                    endwhile; 
                    wp_reset_postdata(); 
                endif;
            ?>         
            
            
        </div>
        <?php  
            if($post_count > 5){
        ?>
            <button class="more" id="load-more-posts" data-type='post' data-exclude="" data-slug="">WEITERE ARTIKEL anzeigen</button>
            <input type="hidden" id="offset" value="<?php echo $post_count; ?>">
        <?php } ?>
    </div>
</section>

<?php

    the_content();

    get_footer(); 
?>	