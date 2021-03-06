
$(document).ready(function () {

/* HISTORIA */
var $panels = $('div#historia .scrollContainer > div');
var $container = $('div#historia .scrollContainer');
var horizontal = true;

$('ul.tabs li:first').addClass('selected');

if (horizontal) {
	$panels.css({
		'float' : 'left',
		'position' : 'relative'
  	});
	$container.css('width', $panels[0].offsetWidth * $panels.length);
}

var $scroll = $('div#historia .scroll').css('overflow', 'hidden');

$('div#historia ul.tabs li').click(function(){
	$('ul.tabs li').removeClass('selected');
	$(this).addClass('selected');
});

function trigger(data) {
  var el = $('div#historia .tabs').find('a[href$="' + data.id + '"]').get(0);
  selectNav.call(el);
}

if (window.location.hash) {
  trigger({ id : window.location.hash.substr(1) });
} else {
  $('ul.tabs a:first').click();
}

// offset is used to move to *exactly* the right place, since I'm using
// padding on my example, I need to subtract the amount of padding to
// the offset.  Try removing this to get a good idea of the effect
var offset = parseInt((horizontal ? 
  $container.css('paddingTop') : 
  $container.css('paddingLeft')) 
  || 0) * -1;


var scrollOptions = {
  target: $scroll, // the element that has the overflow
  
  // can be a selector which will be relative to the target
  items: $panels,
  
  navigation: 'ul.tabs a',
  
  // selectors are NOT relative to document, i.e. make sure they're unique
  prev: 'img.left', 
  next: 'img.right',
  
  // allow the scroll effect to run both directions
  axis: 'xy',
  
  
  offset: offset,
  
  // duration of the sliding effect
  duration: 500,
  
  // easing - can be used with the easing plugin: 
  // http://gsgd.co.uk/sandbox/jquery/easing/
  easing: 'swing'
};

// apply serialScroll to the slider - we chose this plugin because it 
// supports// the indexed next and previous scroll along with hooking 
// in to our navigation.
$('div#historia').serialScroll(scrollOptions);

// now apply localScroll to hook any other arbitrary links to trigger 
// the effect
$.localScroll(scrollOptions);

// finally, if the URL has a hash, move the slider in to position, 
// setting the duration to 1 because I don't want it to scroll in the
// very first page load.  We don't always need this, but it ensures
// the positioning is absolutely spot on when the pages loads.
scrollOptions.duration = 1;
$.localScroll.hash(scrollOptions);

});
















