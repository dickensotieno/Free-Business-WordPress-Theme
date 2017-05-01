(function ($) {
 "use strict";
    
	//---------------------------------------------
	//Nivo slider
	//---------------------------------------------
	    var autoplay =scriptParams.autoplay;
	    var speed =scriptParams.speed;
	    var seffects =scriptParams.seffects;
	    var slidespeed =scriptParams.slidespeed;
	
		 $('#ensign-nivoslider').nivoSlider({
			effect: seffects,
			slices: 15,
			boxCols: 8,
			boxRows: 4,
			animSpeed: speed,
			pauseTime: slidespeed,
			startSlide: 0,
			directionNav: true,
			controlNavThumbs: false,
			pauseOnHover: false,
			manualAdvance: autoplay
		 });
		 
			 
})(jQuery); 