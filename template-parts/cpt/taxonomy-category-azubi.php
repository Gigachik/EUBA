<?php
add_action( 'category-azubi', 'render_category_azubi', 10, 1);

function render_category_azubi($queryObject) { ?>     
<?php
    $string = $queryObject->taxonomy;
    $position = strpos($string, '-');
    
    $cpt = substr($string, $position + 1);

?>     
    <section class="title_category" style="padding-bottom: 0">
        <div class="container">
            <h1 class="border_text"><?php echo $queryObject->name; ?></h1>
            <div class="title_category-inner">
                <?php  
                    $terms = get_terms($queryObject->taxonomy);
                    if ($terms) {
                        foreach ($terms as $term) {
                        echo '<a class="border_text ' . (($queryObject->name === $term->name) ? 'active' : '') . '" href="' . get_term_link($term) . '">' . $term->name . '</a>';
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
                        'post_type' => $cpt,
                        'posts_per_page' => 6,
                        'tax_query' => array(
                            array(
                                'taxonomy' => $queryObject->taxonomy,
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
                <button class="more" id="load-more-posts" data-type='<?php echo $cpt; ?>' data-exclude="category-azubi" data-slug="<?php echo $queryObject->slug; ?>">WEITERE ARTIKEL anzeigen</button>
                <input type="hidden" id="offset" value="<?php echo $post_count; ?>">
            <?php } ?>
        </div>
    </section>

<?php }