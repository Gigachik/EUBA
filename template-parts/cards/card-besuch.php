


<?php
add_action( 'card-besuch', 'render_card_besuch', 10, 2);

function render_card_besuch($type, $post) { ?>
   
    <div class="interviews_item besuch" data-type="<?php echo $type; ?>">
        <a href="<?php echo esc_url(get_permalink(get_the_ID())); ?>" class="interviews_item-img">
            <?php the_post_thumbnail('large'); ?>
            <span class="interviews_item-zoom">ZUM ARTIKEL</span>
        </a>
        <h3>
            <a href="<?php echo esc_url(get_permalink()); ?>">
                <?php the_title(); ?>
            </a>
        </h3>
        
        <div class="text">
            <?php the_excerpt(); ?>
        </div>                               
    </div>
<?php }