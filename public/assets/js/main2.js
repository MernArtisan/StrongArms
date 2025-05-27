(function ($) {
	"use strict";
// Preloader 
jQuery(window).on('load', function() {
	jQuery("#status").fadeOut();
	jQuery("#preloader").delay(350).fadeOut("slow");
});


/*--- Responsive Menu Start ----*/
 
$(".navbar-toggler").on("click", function(){
	var w = $('#sidebar').width();
	var pos = $('#sidebar').offset().left;
   
	if(pos === 0){
	$("#sidebar").animate({"left": -w}, "slow");
	}
	else
	{
	$("#sidebar").animate({"left": "0"}, "slow");
	}
	
  });

(function($){
	 $(document).ready(function(){

	 $('#cssmenu li.active').addClass('open').children('ul').show();
	   $('#cssmenu li.has-sub>a').on('click', function(){
		 $(this).removeAttr('href');
		 var element = $(this).parent('li');
		 if (element.hasClass('open')) {
		   element.removeClass('open');
		   element.find('li').removeClass('open');
		   element.find('ul').slideUp(200);
		 }
		 else {
		   element.addClass('open');
		   element.children('ul').slideDown(200);
		   element.siblings('li').children('ul').slideUp(200);
		   element.siblings('li').removeClass('open');
		   element.siblings('li').find('li').removeClass('open');
		   element.siblings('li').find('ul').slideUp(200);
		 }
	   });

	 });
	 })(jQuery);

  $(function() {
//toggle class open on button
$('#sidebar').on('hide.bs.collapse', function () {
  $('.navbar-toggler').removeClass('open');
})
$('#sidebar').on('show.bs.collapse', function () {
  $('.navbar-toggler').addClass('open');
})
});

// search 
$(function () {
	$(".search-btn").on("click", function (e) {
		$(this).parent().children('input').addClass("active").focus;
		$(this).addClass("animate");
		e.stopPropagation()
	});
	$(document).on("click", function (e) {
		if ($(e.target).is(".input") === false) {
			$(".input").removeClass("active");
			$(".search-btn").removeClass("animate");
		}
	});
});
})(jQuery); 