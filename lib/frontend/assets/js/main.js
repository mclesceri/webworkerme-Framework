jQuery(document).ready(function($){
	//The Main Scripts
	//Add Class to the body to signify touch screens
	if (Modernizr.touch) { 
	   	$('body').addClass('is_touch_screen');
	} 
	/*--------------
	 * Navigation. *
	 --------------*/
	 	/*
	 	 * Navigation Toggle Button (Three Bars)
	 	 */
		$('.menu-cont').on('click', function() {
			//add active class to the toggle, so that it does it's little animation.
			$('.menu_toggle').toggleClass('active');
			//add an active class to the off canvas menu, so that it pops out.
			$('.off-canvas').toggleClass('active');
			//and make sure that all sub-menus reset to the top-level menu position. 
			$('.sub-menu').closest('.has-dropdown').removeClass('active_dd');
		});

		/*
		 * Append a few elements.
		 */
			//Create an element within the navigation items for dropdown toggling.
			//Done this way, so that we may support touch-screen dropdowns.
			$('.has-dropdown>a').append('<span class="dd-toggle"></span>');
			//add the little arrow above the sub-menus for going back.
			$('.sub-menu').append('<span class="toggle-this-sub-menu"></span>');

		/*
		 * Sub Menu Activation
		 */ 
			//when the user clicks that arrow, the need to be brought back a level.
			$('.toggle-this-sub-menu').click(function(){
				var parent = $(this).closest('.has-dropdown');
				parent.removeClass('active_dd');
			});
			//When that specified element is clicked, we need to show the submenu, and prevent
			//the initial link from following through. 
			$('.dd-toggle').click(function(e){
				//Bind the click.
				e.preventDefault();
				//target the parent li element that has the class "has-dropdown"
				var parent = $(this).closest('.has-dropdown');
				//If the parent has the class of "active_dd" already?
				//Remove it.
				if(parent.hasClass('active_dd')==true){
					parent.removeClass('active_dd');
				//Else...
				}else{
					//remove the class from the currently active one,
					$(this).closest('.sub-menu').children('.active_dd').removeClass('active_dd');
					//and give it to the new one.
					parent.addClass('active_dd');
				}
			});
			$('.close_off_canvas').click(function(){
				$('.off-canvas').removeClass('active');
				$('.menu_toggle').removeClass('active');
			});
	/*------------------
	 * End Navigation. *
	 ------------------*/
 	
	/*-------------------------------------
    --Resize Youtube Vid On Screen Adjust--
    -------------------------------------*/
    // Find all YouTube videos
	var $allVideos = $("iframe")
	// Figure out and save aspect ratio for each video
	if($allVideos.length){
		$allVideos.each(function() {
			var $fluidEl = $(this).closest(".contain-vid");
			var newWidth = $fluidEl.width();
			var $el = $(this);
		  	$(this).data('aspectRatio', this.height / this.width).removeAttr('height').removeAttr('width');
		  	
			$el.width(newWidth).height(newWidth * $el.data('aspectRatio'));
		});
		// When the window is resized
		$(window).resize(function() {
			fluidVid();
		}).load(function(){
			fluidVid();
		});
	}
	
	
});