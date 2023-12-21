<?php   
    add_action('wp_ajax_load_more_posts', 'load_more_posts');
    add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts');
    

    
    function load_more_posts() {
        $post_type = isset($_POST['post_type']) ? $_POST['post_type'] : NULL;
        $exclude = isset($_POST['exclude']) ? sanitize_text_field($_POST['exclude']) : NULL;
        $data_slug = isset($_POST['data_slug']) ? sanitize_text_field($_POST['data_slug']) : NULL;
        $offset = isset($_POST['offset']) ? intval($_POST['offset']) : 0;
        $posts_per_page = isset($_POST['posts_per_page']) ? intval($_POST['posts_per_page']) : 6;
    

        $args = array(
            'post_type' => $post_type,
            'posts_per_page' => $posts_per_page,
            'offset' => $offset,
        );
        if($exclude === 'all-cpt'){        
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'tag-interviews',
                    'field' => 'slug',
                    'terms' => $data_slug,
                ),
            );  
        }elseif($exclude === 'all-azubi'){         
            $args['post__not_in'] = array(
                $exclude
            );  
        }elseif($exclude === 'azubi'){      
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'tag-azubi', 
                    'field' => 'slug',
                    'terms' => $data_slug, 
                ),
            );  
        }elseif($exclude === 'category-cpt' || $exclude === 'category-azubi'){                
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'category-' . $post_type[0] . '', 
                    'field' => 'slug',
                    'terms' => $data_slug, 
                ),
            );  
        }else{           
            $args['post__not_in'] = array(
                $exclude
            );  
        }
       
        $interviews_query = new WP_Query($args);

        
    
        $total_posts = $interviews_query->found_posts;
    
        if ($total_posts > 0) {
            if($exclude === 'azubi' || $exclude === 'all-azubi' || $exclude === 'category-azubi'){
                while ($interviews_query->have_posts()) {
                    $interviews_query->the_post();
                    do_action('card-azubi', $interviews_query->post->post_type, $interviews_query->post);
                }
                wp_reset_postdata();
            }else{
                while ($interviews_query->have_posts()) {
                    $interviews_query->the_post();
                    do_action('card', $interviews_query->post->post_type, $interviews_query->post);
                }
                wp_reset_postdata();
            }
           
        }
    
        wp_die();
    }
    
?>     

