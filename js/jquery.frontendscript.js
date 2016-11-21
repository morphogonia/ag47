
$(document).ready(function(){

	$('ul#nav li a').addClass('js');
	$('ul#nav li a').hover(
      function () {
        $(this).stop(true,true).animate({backgroundPosition:'(50% 0)'}, 200);
        $(this).animate({backgroundPosition:'(50% 0)'}, 120);
      },
      function () {
        $(this).animate({backgroundPosition:'(50% -60px)'}, 200);

      }
    );
    
	$('a.top').click(function() {
		var targetOffset = $('body').offset().top;
		$('html, body').animate({scrollTop: targetOffset}, 250);
		return false;
	});	

});



