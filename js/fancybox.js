$(document).ready(function(){


	/* HISTORIA - FANCY BOX */
	$('a[rel=hist]').fancybox({
		'transitionIn'		: 'fade',
		'transitionOut'		: 'fade',
		'titlePosition' 	: 'outside',
		'cyclic' 			: 'true',
		'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
		return '<span id="fancybox-title-over">' + (title.length ? '' + title : '') + '</span>';}
	});
	
	/* CAT�LOGO - FANCY BOX */
	$('a[rel=groups]').fancybox({
		'transitionIn'		: 'fade',
		'transitionOut'		: 'fade',
		'titlePosition' 	: 'outside',
		'cyclic' 			: 'true',
		'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
		return '<span id="fancybox-title-over">' + (title.length ? '' + title : '') + '</span>';}
	});
	
	
	
	
	
});




















