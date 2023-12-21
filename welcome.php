<?php 
    /* Template name: Welcome */
    get_header(); 
    $queryObject = get_queried_object();

    $image = get_field('image');
    $image_mob = get_field('image_mob');
    $title = get_field('title');
    $text = get_field('text');
?>
<style>
    @media (max-width: 480px) {
        .welcome_bg {
            background-image: url(<?php echo $image_mob; ?>) !important;
        }
    }
</style>
<section class="welcome">
    <div
        class="welcome_bg"
        style="background-image: url(<?php echo $image; ?>)"
    >
        <div class="container_fluid">
            <div class="welcome_inner">
                <?php if($title) { ?>
                    <span class="border_text"><?php echo $title; ?></span>
                <?php } ?>
                <?php if($text) { ?>
                    <div class="text">
                        <?php echo $text; ?>
                    </div>
                <?php } ?>
                <?php 
                    $link = get_field('link');
                    Helper_General::renderLink($link, 'link') 
                ?>
            </div>
            <a href="<?php echo esc_url(wp_login_url()); ?>" class="welcome_link">
                <span><img src="<?php bloginfo('template_url'); ?>/assets/app/svg/lock.svg" alt="" /></span>
                ZUM LOGIN BEREICH
            </a>
        </div>
    </div>
</section>


<?php
    the_content();

    get_footer('lock'); 
?>	