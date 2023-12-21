<?php 
    get_header(); 
    $image = get_field('image');
    $queryObject = get_queried_object();
?>
<section class="full_image">
    <?php 
        if(!empty($image)){
            Helper_General::renderImage($image['ID'], 'full', ['alt' => $image['alt'], 'caption' => $image['caption']]); 
        }
    ?>
</section>
<main class="single_page">
    <section class="category_tag" style="padding-top: 0;">
        <div class="container">
            <div class="category_tag-inner">
                <h3 class="border_text">Aktuelles</h3>
            </div>
            <h1 style="margin-bottom: 0;"><?php the_title(); ?></h1>
        </div>
    </section>
    <?php the_content(); ?>
</main>
<?php
    get_footer(); 
?>	