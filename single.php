<?php
	get_header();
	if(have_posts()){
		while(have_posts()){
			the_post();
			global $post;
			if(has_post_thumbnail( $post->ID )){
		        $banner_image_desktop = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "full_banner" );
				$banner_image_desktop = $banner_image_desktop[0];
				$banner_image_tablet = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "full_banner_tablet" );
				$banner_image_tablet = $banner_image_tablet[0];
				$banner_image_mobile = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "full_banner_mobile" );
				$banner_image_mobile = $banner_image_mobile[0];
			}
			?>
			<div class="main_banner">				
				<div class="row banner_content">
					<?php
					if(!empty($banner_image_desktop)){
						?>
						<div class="content_inner">
							<div class="featured_img_wrapp">
								<img src="<?php echo $banner_image_desktop;?>" class="show-for-large-up" alt="<?php echo get_the_title();?> Preview Image"/>
								<img src="<?php echo $banner_image_tablet;?>" class="show-for-medium-only" alt="<?php echo get_the_title();?> Preview Image"/>
								<img src="<?php echo $banner_image_mobile;?>" class="show-for-small-only" alt="<?php echo get_the_title();?> Preview Image"/>
							</div>
						</div>							
						<?php
					}
					?>					
				</div>
			</div>				
			<div class="row single-template">
				<section class="entry-main large-9 medium-12 small-12 columns mainfont">	
					<header>
						<div class="content_inner mainfont">
							<?php
								echo "<h2 class='entry-title'>".get_the_title()."</h2>";
							?>
						</div>
					</header>				
					<article class="entry-content contain-vid">
						<?php get_template_part('parts/content/main');?>
					</article>
					<div class='content_area_trailing_info row' data-color="primary">
						<div class="large-6 medium-12 small-12 columns">
							Moving Towards Your Financial Success!
						</div>
						<div class="large-6 medium-12 small-12 columns">
							Member Service: (734) 721-5700
						</div>
					</div>
				</section>
				<?php get_template_part('parts/sidebars/right_sidebar');?>
			</div>				
			<?php
		}
	}
	get_footer();
?>