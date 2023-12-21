    <footer class="footer">
        <div class="container">
            <a class="footer_logo" href="<?php echo get_home_url(); ?>">
                <?php
                    $logo = get_field('logo', 'option');
                    Helper_General::renderImage($logo['ID'], 'full', ['alt' => $logo['alt']]); 
                ?>
            </a>
            <div class="footer_inner">
                <div class="footer_socials">
                    <?php
                        if( have_rows('socials', 'option') ):
                            while( have_rows('socials', 'option') ) : the_row(); 
                                $link = get_sub_field('socials_link', 'option');
                                $image = get_sub_field('socials_icon', 'option'); ?>
                                <a href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target']); ?>" title="<?php echo esc_attr($link['title']); ?>">
                                    <?php Helper_General::renderImage($image['ID'], 'full', ['alt' => $image['alt']]); ?>
                                </a>
                            <?php
                            endwhile;
                        endif;
                    ?>
                </div>
                <div class="footer_nav">
                    <nav>
                        <?php wp_nav_menu( array( 'menu'  => 'footer' ) ); ?>
                    </nav>
                </div>
            </div>
        </div>
    </footer>
<?php wp_footer(); ?>

</body>
</html>
