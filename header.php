<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>

	

</head>

<body <?php body_class(); ?>>

	<header class="header">
		<div class="container">
			<div class="header_inner">
				<a class="header_logo" href="<?php echo get_home_url(); ?>">
					<?php
						$logo = get_field('logo', 'option');
						Helper_General::renderImage($logo['ID'], 'full', ['alt' => $logo['alt']]); 
					?>
				</a>
				<div class="search_form">
					<?php echo do_shortcode('[ivory-search id="467" title="Default Search Form"]'); ?>
				</div>
				<?php if(is_user_logged_in()){ ?>
					<div class="header_burger">
						<button class="burger">
							<span class="burger_item"></span>
						</button>
					</div>
				<?php } ?>
			</div>
		</div>
		<div class="header_navigation">
			<div class="container">
				<div class="header_navigation-inner">				
					<nav>
						<?php 
							$tags = get_terms(array(
								'taxonomy' => 'tag-interviews',
							));
						?>
						<ul>
							<li>
								<a href="<?php echo home_url('/aktuelles'); ?>"> Aktuelles </a>
							</li>
							<li class="menu-item-has-children">
								<a href="<?php echo home_url('/campus'); ?>"> CAMPUS </a>
								<span></span>
								<ul>
									<?php  
										if ( !empty( $tags ) && !is_wp_error( $tags ) ){
											foreach ( $tags as $tag ) {
												$color = get_field('color', 'tag-interviews_' . $tag->term_id);
												if($color === '#002851') $color = '#F6F1FF';
												echo '<li><a href="' . get_term_link($tag->term_id) . '" style="color: ' . $color . '; --text-color: ' . $color . ';">#' . $tag->name . '</a></li>';
											}
										}
									?>
								</ul>
							</li>
							<?php 
								$args = array(
									'public'   => true,
									'_builtin' => false,
								);
								$post_types = get_post_types( $args, 'objects' );
								
								foreach ( $post_types  as $post_type ) { ?>
									<li class="menu-item-has-children">
										<?php 
											
											$post_obj = get_page_by_path($post_type->name);
										?>
										<a href="<?php echo esc_url(get_permalink($post_obj->ID)); ?>"> <?php echo $post_type->labels->singular_name; ?> </a>
										<span></span>
										<ul>
											<?php  
												if ($post_type->name === 'von-azubis-fur-azubi') {
													$tags = get_terms(array(
														'taxonomy' => 'tag-azubi',
													));
												}else{
													$tags = get_terms(array(
														'taxonomy' => 'tag-interviews',
													));
												}
												if ( !empty( $tags ) && !is_wp_error( $tags ) ){
													foreach ( $tags as $tag ) {
														$color = get_field('color', 'tag-interviews_' . $tag->term_id);
														if ($post_type->name === 'von-azubis-fur-azubi') $color = get_field('color', 'tag-azubi_' . $tag->term_id);
														
														if($color === '#002851') $color = '#F6F1FF';
														echo '<li><a href="' . get_term_link($tag->term_id) . '" style="color: ' . $color . '; --text-color: ' . $color . ';">#' . $tag->name . '</a></li>';
													}
												}
											?>
										</ul>
									</li>
								<?php }
							?>
							
						</ul>					
					</nav>
					<div class="header_navigation-logout">
						<a href="<?php echo wp_logout_url( home_url() ); ?>">
							<img src="<?php bloginfo('template_url'); ?>/assets/app/svg/logout.svg" alt="logout" />
							LOG-OUT
						</a>
					</div>
				</div>
			</div>
		</div>
	</header>

