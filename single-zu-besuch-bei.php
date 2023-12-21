<?php 

    $queryObject = get_queried_object();
    $id = get_the_ID();
    get_header(); 

  

    $image = get_field('image');
    $bg_color = get_field('bg_color');
    $set_background = get_field('set_background');

?>
<section class="full_image <?php if($set_background) echo 'background_only'; ?>" style="background: <?php echo esc_attr($bg_color); ?>">
    <?php 
        if(!empty($image)){
            Helper_General::renderImage($image['ID'], 'full', ['alt' => $image['alt'], 'caption' => $image['caption']]); 
        }
    ?>
</section>

<?php

    the_content();

    get_footer(); 
?>	