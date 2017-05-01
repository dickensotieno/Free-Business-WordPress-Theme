(function ($) {
 "use strict";

$(".single-post .single-news-page .post-navigation .nav-links .nav-previous").prepend('<span class="meta-nav" aria-hidden="true">Previous Post: </span>');
$(".single-post .single-news-page .post-navigation .nav-links .nav-next").prepend('<span class="meta-nav" aria-hidden="true">Next Post: </span>');
// pagination 
$(".pagination-area .nav-links").unwrap();
$(".screen-reader-text").remove();

// comment form
$(".leave-comments-area .comment-respond form.comment-form p").wrapAll("<fieldset></fieldset>");
$(".leave-comments-area .comment-respond form.comment-form p.comment-form-author").wrapAll("<div class=\"col-sm-6\"></div>");
$(".leave-comments-area .comment-respond form.comment-form p.comment-form-email").wrapAll("<div class=\"col-sm-6\"></div>");
$(".leave-comments-area .comment-respond form.comment-form p.comment-form-comment").wrapAll("<div class=\"col-sm-12\"></div>");
$(".leave-comments-area .comment-respond form.comment-form p.form-submit").wrapAll("<div class=\"col-sm-12\"></div>");

$(".comment-reply-link").click(function(){
	$(".author-comment .about-author-comment ul div.comment-respond").wrap("<div class=\"leave-comments-area\"></div>");
});

$(".leave-comments-area .comment-respond form.comment-form p.form-submit .submit").addClass("btn-send");

// Footer Widget Custom Menu
$(".footer-top-area .main-footer .widget_nav_menu .single-footer ul").unwrap();
$(".footer-top-area .main-footer .jadonai_address .single-footer").addClass('footer-three');
$(".footer-top-area .main-footer .jadonai_instagram .single-footer").addClass('footer-four');
$(".footer-top-area .main-footer .widget_nav_menu .single-footer ul").removeAttr("class");
$(".footer-top-area .main-footer .widget_nav_menu .single-footer ul li").removeAttr("id");
$(".footer-top-area .main-footer .widget_nav_menu .single-footer ul li").removeAttr("class");
$(".footer-top-area .main-footer .widget_nav_menu .single-footer ul").removeAttr("id");
$(".footer-top-area .main-footer .widget_nav_menu .single-footer ul").wrap("<nav></nav>");
$(".footer-top-area .main-footer .widget_nav_menu .single-footer ul li a").prepend("<i class=\"fa fa-arrow-circle-right\" aria-hidden=\"true\"></i>");

// search widget prepend icon
$(".sidebar-area .widget_search .search-form").append('<i class="fa fa-search"></i>');
$(".sidebar-area .widget_tag_cloud .tagcloud a").wrap("<li></li>");
$(".sidebar-area .widget_tag_cloud .tagcloud li").wrapAll("<ul></ul>");

// faq add-on of VC 
$(".home-faq-area .faq-area .panel-group .panel:nth-child(1) .panel-collapse").addClass('in'); 
$(".home-faq-area .faq-area .panel-group .panel .panel-heading h4.panel-title a").addClass('collapsed '); 
$(".home-faq-area .faq-area .panel-group .panel:nth-child(1) .panel-heading h4.panel-title a").removeClass('collapsed '); 
// footer  testimonial conditional css added
if ($(".home-testimonial-area").length > 0) {
	$("footer .footer-top-area").css("padding-top","150px");
}

/*----------------------------
 jQuery MeanMenu
------------------------------ */
	jQuery('nav#dropdown').meanmenu();	
	
/*----------------------------
 wow js active
------------------------------ */
 new WOW().init();
 
/*----------------------------
 owl active
------------------------------ */  
  $(".total-team").owlCarousel({
      autoPlay: true, 
	  slideSpeed:2000,
	  pagination:true,
	  navigation:false,	  
      items : 4,
	  /* transitionStyle : "fade", */    /* [This code for animation ] */
	  navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
      itemsDesktop : [1199,4],
	  itemsDesktopSmall : [980,3],
	  itemsTablet: [768,1],
	  itemsMobile : [479,1],
  });
 
/*----------------------------
Home Testimonial
------------------------------ */  
  $(".home-testimonial").owlCarousel({
      autoPlay: true, 
	  slideSpeed:2000,
	  pagination:true,
	  navigation:false,	  
      items : 1,
	  /* transitionStyle : "fade", */    /* [This code for animation ] */
	  navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
      itemsDesktop : [1199,1],
	  itemsDesktopSmall : [980,1],
	  itemsTablet: [768,1],
	  itemsMobile : [479,1],
  });

 /*----------------------------
 Sidebar Testimonial
 ------------------------------ */  
   $(".sidebar-testimonial").owlCarousel({
       autoPlay: true, 
 	  slideSpeed:2000,
 	  pagination:true,
 	  navigation:false,	  
       items : 1,
 	  /* transitionStyle : "fade", */    /* [This code for animation ] */
 	  navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
       itemsDesktop : [1199,1],
 	  itemsDesktopSmall : [980,1],
 	  itemsTablet: [768,1],
 	  itemsMobile : [479,1],
   });

 /*----------------------------
 Single Project Image Slider
 ------------------------------ */  
   $(".single-project-slider").owlCarousel({
       autoPlay: true, 
 	  slideSpeed:2000,
 	  pagination:false,
 	  navigation:true,	  
       items : 1,
 	  /* transitionStyle : "fade", */    /* [This code for animation ] */
 	  navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
       itemsDesktop : [1199,1],
 	  itemsDesktopSmall : [980,1],
 	  itemsTablet: [768,1],
 	  itemsMobile : [479,1],
   });

/*----------------------------
 price-slider active
------------------------------ */  
	  $( "#slider-range" ).slider({
	   range: true,
	   min: 40,
	   max: 600,
	   values: [ 60, 570 ],
	   slide: function( event, ui ) {
		$( "#amount" ).val( "£" + ui.values[ 0 ] + " - £" + ui.values[ 1 ] );
	   }
	  });
	  $( "#amount" ).val( "£" + $( "#slider-range" ).slider( "values", 0 ) +
	   " - £" + $( "#slider-range" ).slider( "values", 1 ) );  
	   
/*--------------------------
 scrollUp
---------------------------- */	
	$.scrollUp({
        scrollText: '<i class="fa fa-angle-up"></i>',
        easingType: 'linear',
        scrollSpeed: 900,
        animation: 'fade'
    });
/*-------------------------------
Counter Up
---------------------------------*/     
	$('.about-counter').counterUp({
	delay: 50,
	time: 3000
	}); 


  
 
})(jQuery); 