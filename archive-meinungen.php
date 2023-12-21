<?php 
    /* Template name: Meinungen */
    get_header();  
    $queryObject = get_queried_object();
    $selected_post = get_field('post');
    if($selected_post) $selected_post = get_field('post')[0]
?>

<?php
    do_action('taxonomy', $queryObject, $selected_post);   

    the_content();

    get_footer(); 
?>	