jQuery(document).ready(function($) {
	//When a user clicks a side-tab, the page needs to scroll up.
	$('.nav-tab').click(function(){
		$('body,html').animate({
	        scrollTop: $('body').offset().top -32
	    }, 250);
	    $('#setting-error-save_options').remove();
	});
	//Once everything is loaded, remove the body's im_still_loading class
	$(window).load(function(){
		$('#optionsframework-wrap').removeClass('im_still_loading');
	});
});
