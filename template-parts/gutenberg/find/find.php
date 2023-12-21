<?php
    $title = get_field('title');
    $gif = get_field('gif');

    if(get_field('top_bottom_spacing')){
        Helper_General::renderSpacings($block, get_field('top_bottom_spacing'));
    }

    if(get_field('container')){
        Helper_General::renderContainer($block, get_field('container'));
    }
?>

<section class="find" id="<?php echo esc_attr($block['id']); ?>">
    <div class="container_fluid">
        <div class="find_top">
            <h2><?php echo $title; ?></h2>
            <img class="find_top-gif" src="<?php echo $gif; ?>" alt="gif" />
        </div>
        <div class="find_inner">    
            <?php
            $featured_posts = get_field('links');
            if( $featured_posts ): ?>
                <?php foreach( $featured_posts as $featured_post ): 
                    $permalink = get_permalink( $featured_post->ID );
                    $title = get_the_title( $featured_post->ID );
                    ?>
                        <a class="find_link" href="<?php echo esc_url( $permalink ); ?>"><?php echo esc_html( $title ); ?></a>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
