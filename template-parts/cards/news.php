<?php $id = get_the_ID(); ?>

<div class="news_item">
    <h3>
        <a href="<?php echo get_permalink($id); ?>">
            <?php echo get_the_title($id); ?>
        </a>
    </h3>
    <div class="text">
        <?php the_excerpt(); ?>
    </div>
</div>