


<?php
add_action( 'card', 'render_card', 10, 2);

function render_card($type, $post) { ?>
	<?php
        $categories = wp_get_post_terms($post->ID, 'category-'. $type . '');
        $tags = wp_get_post_terms($post->ID, 'tag-interviews');
        
        $color = get_field('color', 'tag-interviews_' . $tags[0]->term_id);
        
    ?>
    <div class="interviews_item" data-type="<?php echo $type; ?>">
        <a href="<?php echo esc_url(get_permalink(get_the_ID())); ?>" class="interviews_item-img">
            <?php the_post_thumbnail('large'); ?>
            <span class="interviews_item-zoom">ZUM ARTIKEL</span>
        </a>
        <?php
            if ( !empty( $categories ) && !is_wp_error( $categories ) ){ ?>
            <div class="interviews_item-flex">
                <?php
                    foreach ( $categories as $category ) {
                        echo '<a href="' . get_term_link($category->term_id) . '" class="border_text" style="color: ' . $color . '; border-color: ' . $color . '; --text-color: ' . $color . ';">' . $category->name . '</a>';
                    }
                  
                
                    $content_type = get_post_meta(get_the_ID(), 'content_type', true);
                    if (ucfirst($content_type) === 'Audio') { ?>
                        <div
                            class="audio_icon"
                            style="
                                --background-color: <?php echo $color; ?>;
                                --text-color: #f6f1ff;
                            "
                        >
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    <?php
                    }elseif(ucfirst($content_type) === 'Video'){ ?>
                        <svg width="44" height="43" viewBox="0 0 44 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.769531" y="0.0742188" width="42.3028" height="42.3028" rx="21.1514" fill="<?php echo $color; ?>"/>
                            <path d="M31.7187 21.4219L16.7187 30.0821L16.7187 12.7616L31.7187 21.4219Z" fill="#f6f1ff"/>
                        </svg>
                    <?php
                    }
                ?>
                
            </div>
        <?php } ?>
        <h3>
            <a href="<?php echo esc_url(get_permalink()); ?>">
                <?php the_title(); ?>
            </a>
        </h3>
        
        <div class="text">
            <?php the_excerpt(); ?>
        </div>
        <?php        
           

            if ( !empty( $tags ) && !is_wp_error( $tags ) ){
                foreach ( $tags as $tag ) {
                echo '<a href="' . get_term_link($tag->term_id) . '" class="tag" style="color: ' . $color . '; --text-color: ' . $color . ';">#' . $tag->name . '</a>';
                }
            }
        ?>                           
    </div>
<?php }