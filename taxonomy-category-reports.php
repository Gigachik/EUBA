<?php 
    get_header(); 
    $queryObject = get_queried_object();
?>

<?php
    do_action('category', $queryObject);   


    get_footer(); 
?>	