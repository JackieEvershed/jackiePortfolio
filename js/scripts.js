$(function(){

	console.log("It's working");
 //timer for 7 seconds
	var triggered = false;

	$(window).scroll(function(){
	    const timeToScroll = $('.skill:nth-of-type(3)').offset().top < $(this).height() + $(this).scrollTop();

	    if (timeToScroll) {
	    	if (triggered === false) {
		    	triggered = true;
		    	console.log('cycle images called');
		    	setInterval('cycleImages()', 1500);	    		
	    	}
	    }
	});



	$('.hamburger--spring').on('click', function() {
			console.log("i tapped on this ");

			$(this).toggleClass('is-active');
			$('nav ul').slideToggle();
	});

});

// every few seconds, grab an element from the dom.
// this element is one of the divs labeled "cycler"
// fade out one image and fade in the next image.

// function isScrolledIntoView(elem) {
// 	var docViewTop = $(window).scrollTop();
// 	var docViewBottom = docViewTop + $(window).height();
// 	var elemTop = $(elem).offset().top;
// 	var elemBottom = elemTop + $(elem).height();
// 	console.log(((elemBottom >= docViewTop) && (elemTop <= docViewBottom) && (elemBottom <= docViewBottom) && (elemTop >= docViewTop)));
// 	return ((elemBottom >= docViewTop) && (elemTop <= docViewBottom) && (elemBottom <= docViewBottom) && (elemTop >= docViewTop));

// }

var firstCall = false;


function cycleImages() {
	var $active = $('.cycler .active');
	var $next = ($active.next().length > 0) ? $active.next() : $('.cycler img:first-child'); //If the length of active.next is greater than 0 (it has a sibling) assign the next to that sibling, else go back to start
      $next.css('z-index',2);//move the next image up the pile
      $active.fadeOut(1500,function(){//fade out the top image
	  $active.css('z-index',1).show().removeClass('active');//reset the z-index and unhide the image
          $next.css('z-index',3).addClass('active');//make the next image the top one
      });

}
