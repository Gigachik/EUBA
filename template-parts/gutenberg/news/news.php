<?php	
	$count = get_field('count');
	$title = get_field('title');
	$news = Helper_General::getNews($count);

	if(get_field('top_bottom_spacing')){
        Helper_General::renderSpacings($block, get_field('top_bottom_spacing'));
    }
	if(get_field('container')){
        Helper_General::renderContainer($block, get_field('container'));
    }
?>

<section class="news" id="<?php echo esc_attr($block['id']); ?>">
    <div class="container_fluid">
		<?php if($title){ ?>
            <div class="text">
                <?php echo $title; ?>
            </div>
        <?php } ?>
        <div class="news_inner">
			<?php Helper_General::getNews($count); ?>
			<?php if(!empty($news)){
				global $post;    
					foreach($news as $post){   
						setup_postdata($post);
						get_template_part('template-parts/cards/news');       
					}
					wp_reset_postdata();    
			} ?>         
            
        </div>
    </div>
</section>
