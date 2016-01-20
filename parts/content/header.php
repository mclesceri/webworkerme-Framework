<div class="large-12 columns">
<?php
	$title_alternate = get_post_meta($post->ID, 'wwm_2015_alternate_heading_meta_value_key', true);
	if(is_singular()){
		if(!empty($title_alternate)){
			echo "<h2>".$title_alternate."</h2>";
		}else{
			echo "<h2>".get_the_title()."</h2>";
		}
		//If the queried object is a post, we need to echo some meta data. 
		if(is_singular('post')){
		/*
		Decided to Omit Categories from the heading for now. 
		$categories_str is what needs to be echo'd in order to present them on the front end, and uncomment this. 
		$categories = get_the_terms($post->ID,'category');
			//If there is a categories, then create the line for it. 
			if(!empty($categories)){
				$categories_str = "<div class='post_categories'><span class='fa fa-newspaper-o'></span><ul>";
				foreach($categories as $cat){
					$categories_str .= "<li><a href='".get_term_link($cat->slug,'category')."'>".$cat->name."</a></li>";
				}
				$categories_str .= "</ul></div>";
			}else{
				$categories_str = "";
			}
			*/
		//Tags
			$tags = get_the_terms($post->ID,'post_tag');
			//If there is a tags, then create the line for it. 
			if(!empty($tags)){
				$tags_str = "<div class='post_tags'><span class='fa fa-tags'></span><ul>";
				foreach($tags as $tag){
					$tags_str .= "<li><a href='".get_term_link($tag->slug,'post_tag')."'>".$tag->name."</a></li>";
				}
				$tags_str .= "</ul></div>";
			}else{
				$tags_str = "";
			}
			echo "	<div class='post_meta'>
					<div class='date'>".get_the_time('F jS, Y')."</div>
					".$tags_str."
				</div>";
		}
	}elseif(is_tag()){
		echo "<h2 class='results_header'>Other posts tagged: <span style='font-weight: 600;'>".get_queried_object()->name."</span></h2>";
	}elseif(is_category()){
		echo "<h2 class='results_header'>Other posts in the <span style='font-weight: 600;'>".get_queried_object()->name."</span> Category</h2>";
	}elseif(is_search()){
		$search_query = get_search_query();
		if(!empty($search_query)){
			echo "<h2 class='results_header'>Search Results for <strong>".$search_query."</strong>.";
		}		
	}
	
	
?>
</div>