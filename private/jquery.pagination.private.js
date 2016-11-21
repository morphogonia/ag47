
$(document).ready(function() {
	
	function Display_Load() {
		$('div#loading').fadeIn('slow');
		$('div#loading').html('<h3>Cargando contenido...</h3>');
		$('div#content').hide();
	};
	
	function Hide_Load() {
		$('div#loading').fadeOut('slow');
		$('div#content').fadeIn('fast');
	};

	//Default Starting Page Results
	$('ul#pagination li:first').css({'color' : '#fff'}).css({'background-position' : '0 -36px'}).css({'text-shadow' : 'none'});
	Display_Load();
	
	$('div#content').load('private_data.php?page=1', Hide_Load());

	$('ul#pagination li').click(function(){
		Display_Load();

		$('ul#pagination li').css({'color' : '#000'}).css({'background-position' : '0 0'});
		$(this).css({'color' : '#fff'}).css({'background-position' : '0 -36px'});

		var pageNum = this.id;
		$('div#content').load('private_data.php?&page=' + pageNum, Hide_Load());	
		
	});
	
});
