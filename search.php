<?php 
    get_header(); 
    $queryObject = get_queried_object();

 
?>
<section class="title_category" style="padding-bottom: 0">
    <div class="container">
        <?php if(get_search_query()){ ?>
            <h1 class="border_text"><?php echo get_search_query(); ?></h1>      
        <?php } ?>
    </div>
</section>
<section class="interviews">
    <div class="container">
        <div class="interviews_inner" id="post-container">
            <?php   
                class CustomSearchObj {
                    public $ID;
                
                    public function __construct($post_id) {
                        $this->ID = $post_id;
                    }
                }
            
                if ( have_posts() ) : 
                    while ( have_posts() ) : the_post(); 
                        $current_post = get_post();

                        $search_obj = new CustomSearchObj($current_post->ID);
                        
                        if($current_post->post_type === 'von-azubis-fur-azubi'){
                            do_action('card-azubi', $current_post->post_type, $search_obj);    
                        }else{
                            do_action('card', $current_post->post_type, $search_obj);    
                        }
                         
                    endwhile; 
                endif; 
            ?>                             
        </div>
    </div>
</section>

<?php

    get_footer(); 
?>	