<?php $id = get_the_ID(); ?>


<?php
add_action( 'selected-card', 'render_selected_card', 10, 2);

function render_selected_card($type, $post) { ?>
    <?php
        $categories = wp_get_post_terms($post->ID, 'category-'. $type . '');

        $color = get_field('color', $post->ID);
    ?>
	<section class="selected_news">
        <div class="container">
            <div class="selected_news-inner">
                <div class="selected_news-img">
                    <?php
                        $image = get_the_post_thumbnail( $post->ID, 'full', array( 'class' => 'selected_news-image' ) );
                        echo $image;
                    ?>
                    
                    <div class="selected_news-flex">
                    <?php
                        if ( !empty( $categories ) && !is_wp_error( $categories ) ){
                            foreach ( $categories as $category ) {
                            echo '<a href="' . get_term_link($category->term_id) . '" class="border_text" style="color: #f6f1ff; border-color: #f6f1ff; --text-color: #f6f1ff;">' . $category->name . '</a>';
                            }
                        }
                    
                        $content_type = get_post_meta($post->ID, 'content_type', true);
                        if (ucfirst($content_type) === 'Audio') { ?>
                            <div
                                class="audio_icon"
                                style="
                                    --background-color: #f6f1ff;
                                    --text-color: #002851;
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
                                <rect x="0.769531" y="0.0742188" width="42.3028" height="42.3028" rx="21.1514" fill="#f6f1ff"/>
                                <path d="M31.7187 21.4219L16.7187 30.0821L16.7187 12.7616L31.7187 21.4219Z" fill="#002851"/>
                            </svg>
                        <?php
                        }
                    ?>
                    </div>
                </div>
                <div class="selected_news-block">
                    <div class="text">
                        <h3>
                            <?php echo $post->post_title; ?>
                        </h3>
                        <?php echo $post->post_excerpt; ?>
                    </div>
                    <?php 
                        $tags = wp_get_post_terms($post->ID, 'tag-interviews');
                        echo $type;
                        if ( !empty( $tags ) && !is_wp_error( $tags ) ){
                            foreach ( $tags as $tag ) {
                            echo '<a href="' . get_term_link($tag->term_id) . '" class="tag" style="color: #f6f1ff; --text-color: #f6f1ff;">#' . $tag->name . '</a>';
                            }
                        }
                    ?>  
                    <a class="link" href="<?php echo esc_url(get_permalink($post->ID)); ?>">
                        ZUM ARTIKEL
                    </a>
                </div>
            </div>
        </div>
    </section>
<?php }