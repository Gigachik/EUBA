<?php 
    /* Template name: Campus */
    get_header(); 
    $queryObject = get_queried_object();

?>

<section class="title_category" style="padding-bottom: 0">
    <div class="container">
        <h1 class="border_text"><?php echo $queryObject->post_title; ?></h1>
        <div class="title_category-inner">
            <?php  
                $tags = get_terms(array(
                    'taxonomy' => 'tag-interviews',
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
<?php

    the_content();

    get_footer(); 
?>	