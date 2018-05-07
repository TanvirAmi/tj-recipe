// Avoid `console` errors in browsers that lack a console.
  $ = jQuery;
$(document).ready(function() {

  var $window = $(window);

     // :: 11.0 Preloader active code
     $window.on('load', function () {
         $('#preloader').fadeOut('slow', function () {
             $(this).remove();
         });
     });

     // :: 4.0 ScrollUp Active JS
       if ($.fn.scrollUp) {
           $.scrollUp({
               scrollSpeed: 1500,
               scrollText: '<i class="fa fa-arrow-up" aria-hidden="true"></i>'
           });
       }

     // :: 9.0 wow Active Code
    if ($.fn.init) {
        new WOW().init();
    }
      // :: 10.0 matchHeight Active JS
      if ($.fn.matchHeight) {
          $('.item').matchHeight();
      }
     // :: 7.0 Search Form Active Code
  $(".searchBtn").on('click', function () {
      $(".search-hidden-form").toggleClass("search-form-open");
  });

  $( function( $ ) {
			$( document ).ready( function() {
				$('ul.sf-menu').supersubs( {
					minWidth   : 16, // minimum width of sub-menus in em units
					maxWidth   : 40, // maximum width of sub-menus in em units
					extraWidth : 1   // extra width can ensure lines don't sometimes turn over
				} ).superfish();
			} );
		} );
    //activate mobile menu
    $(function(){
      $('#primary-menu').slicknav({
        label: "hdfjsf",
        prependTo: '#top',
        allowParentLinks: true
      });
    });


});
