<?php
	get_header();
	if(have_posts()){
		while(have_posts()){
			the_post();
			global $post;
			if(has_post_thumbnail( $post->ID )){
		        $banner_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "full" );
				$banner_image = $banner_image[0];
			}
			?>
			<header class="main_banner" data-bg="primary">
				<?php if(!empty($banner_image)){?>
					<div class="silhouette" style="background-image:url(<?php echo $banner_image;?>);"></div>
				<?php } ?>
				<div class="row banner_content">
				<?php
					if(!empty($banner_image)){
						?>
						<div class="large-3 medium-4 small-12 columns">
							<div class="content_inner">
								<div class="featured_img_wrapp">
									<img src="<?php echo $banner_image;?>" alt="<?php echo get_the_title();?> Preview Image"/>
								</div>
							</div>							
						</div>
						<div class="large-9 medium-8 small-12 columns">
							<div class="content_inner">
								<?php
									$title_alternate = get_post_meta($post->ID, 'wwm_2015_alternate_heading_meta_value_key', true);
									if(!empty($title_alternate)){
										echo "<h2>".$title_alternate."</h2>";
									}else{
										echo "<h2>".get_the_title()."</h2>";
									}
									the_excerpt();
								?>
							</div>
						</div>						
						<?php
					}else{
						?>
						<div class="large-12 medium-12 small-12 columns">
							<div class="content_inner">
								<?php
									$title_alternate = get_post_meta($post->ID, 'wwm_2015_alternate_heading_meta_value_key', true);
									if(!empty($title_alternate)){
										echo "<h2>".$title_alternate."</h2>";
									}else{
										echo "<h2>".get_the_title()."</h2>";
									}
								?>
								<?php the_excerpt();?>
							</div>
						</div>
						<?php
					}
				?>			
			</header>				
			<div class="row">
				<section class="entry-main large-9 medium-12 small-12 columns mainfont">					
					<article class="entry-content contain-vid">
						<?php get_template_part('parts/content/main');?>
					</article>
				</section>
				<?php get_template_part('parts/sidebars/right_sidebar');?>
			</div>				
			<?php
		}
	}
	get_footer();
?>