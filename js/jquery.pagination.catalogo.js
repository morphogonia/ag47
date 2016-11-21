
$(document).ready(function() {
	
	function getUrlVars() {
    	var vars = [], hash;
    	var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    	for(var i = 0; i < hashes.length; i++) {
       		hash = hashes[i].split('=');
        	vars.push(hash[0]);
        	vars[hash[0]] = hash[1];
    	}
   		return vars;
	}
	
	function Display_Load() {
		$('div#loading').fadeIn('slow');
		$('div#loading').html('<h3>Cargando contenido...</h3>');
		$('div#content').hide();
	};
	
	function Hide_Load() {
		$('div#loading').fadeOut('slow');
		$('div#content').fadeIn('fast');
	};

	//	
	var cat = getUrlVars()['id'];
	
	var page = getUrlVars()['page'];
	if (page < 1 || page == null) {
		page = 1;
	}
	
	//Default Starting Page Results
	$('ul#pagination li#'+page).css({'color' : '#fff'}).css({'background-position' : '0 -36px'}).css({'text-shadow' : 'none'});
	Display_Load();
	
	$('div#content').load('subcategoria_data.php?id='+cat+'&page='+page, Hide_Load());

	$('ul#pagination li').click(function(){
		Display_Load();

		$('ul#pagination li').css({'color' : '#000'}).css({'background-position' : '0 0'});
		$(this).css({'color' : '#fff'}).css({'background-position' : '0 -36px'});

		var pageNum = this.id;
		$('div#content').load('subcategoria_data.php?id='+cat+'&page=' + pageNum, Hide_Load());	
		
	});
	
});
