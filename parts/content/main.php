<?php
	//(A form of getting the content that eliminates empty paragraphs.)			
	$content = get_the_content();
	$content = do_shortcode($content);
	$content = apply_filters('the_content',$content);
	$content = force_balance_tags($content);
	$content = preg_replace('#<p>\s*+(<br\s*/*>)?\s*</p>#i', '', $content);
	echo $content;
?>
