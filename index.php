<?php
	get_header();
	if(have_posts()){		
			?>
			<header class="entry-header loop">
				<div class="row">
					<?php
						get_template_part('parts/content/header');								
					?>
				</div>
			</header>				
			<div class="row">
				<section class="entry-main loop-section large-9 medium-12 small-12 columns mainfont">
					
					<?php
						while(have_posts()){
							the_post();
							global $post;
							$title = get_the_title();
							$excerpt = get_the_excerpt();
							$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'loop_preview' );
							$image = $image[0];
							$link = get_the_permalink();							
								
							echo "	<article class='entry-loop-item looped row'>";
								if(!empty($image)){
									echo "	<div class='featured_image'>
												<img src='".$image."' alt='".$title." Featured Image' data-border='primary'/>
											</div>
											<div class='post_preview'>
												<a href='".$link."' data-color='primary'><h3 data-border='primary'>". $title."</h3></a>
												<div class='date'>".get_the_time('F jS, Y')."</div>
												<p>". $excerpt."</p>
												<a href='".$link."' class='wwm_2015_button' data-bg='primary'>Read on</a>
											</div>";
									
								}else{
									echo "	<div class='post_preview'>
												<a href='".$link."' data-color='primary'><h3 data-border='primary'>". $title."</h3></a>
												<div class='date'>".get_the_time('F jS, Y')."</div>
												<p>". $excerpt."</p>
												<a href='".$link."' class='wwm_2015_button' data-bg='primary'>Read on</a>
											</div>";
								}
								
								echo "</article>";
						}
						wp_reset_postdata();
					?>
					<!-- Pagination -->
                <div class="pagination">
                	<?php
                		$big = 999999999; // need an unlikely integer
                		echo paginate_links( array(
							'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
							'format' => '?paged=%#%',
							'current' => max( 1, get_query_var('paged') ),
							'total' => $wp_query->max_num_pages,
							'prev_text'=>'<i class="fa fa-angle-left"></i>',
							'next_text'=>'<i class="fa fa-angle-right"></i>'
						) );
					?>                            
                </div>
	            <!-- End Pagination -->
				</section>

				<?php get_template_part('parts/sidebars/right_sidebar');?>
			</div>				
		<?php
	}
	get_footer();
?>