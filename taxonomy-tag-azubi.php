<?php 
    $queryObject = get_queried_object();
    get_header(); 

    $post_types = get_post_types(array('public' => true), 'names');

?>

<section class="title_category" style="padding-bottom: 0">
    <div class="container">
        <h1 class="border_text"><?php echo $queryObject->name; ?></h1>
        <div class="title_category-inner">
            <?php  
                $tags = get_terms(array(
                    'taxonomy' => 'tag-azubi',
                ));
                if ( !empty( $tags ) && !is_wp_error( $tags ) ){
                    foreach ( $tags as $tag ) {
                    echo '<a href="' . get_term_link($tag->term_id) . '" class="border_text ' . (($queryObject->name === $tag->name) ? 'active' : '') . '" style="color: #002851; border-color: #002851;">#' . $tag->name . '</a>';
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

                $custom_post_types = 'von-azubis-fur-azubi';

                $args = array(
                    'post_type' => $custom_post_types,
                    'posts_per_page' => 6,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'tag-azubi', 
                            'field' => 'slug',
                            'terms' => $queryObject->slug, 
                        ),
                    ),
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
        </div>
        <?php  
            if($post_count > 5){
        ?>
            <button class="more" id="load-more-posts" data-type='<?php echo $custom_post_types; ?>' data-exclude="azubi" data-slug="<?php echo $queryObject->slug; ?>">WEITERE ARTIKEL anzeigen</button>
            <input type="hidden" id="offset" value="<?php echo $post_count; ?>">
        <?php } ?>
    </div>
</section>


<?php

    get_footer(); 
?>	