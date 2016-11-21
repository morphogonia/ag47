
var arr = [ "", "Green", "Hippie Chic", "Tudor", "Vintage", "Industrial", "Cross Universe", "Org&aacute;nica" ];

var $$ = $.fn;

$$.extend({
  SplitID : function()
  {
    return this.attr('id').split('-').pop();
  },

  Fadeshow : {
    Ready : function()
    {
      $('div.tmpFadeshowControl')
        .hover(
          function() {
            $(this).addClass('tmpFadeshowControlOn');
          },
          function() {
            $(this).removeClass('tmpFadeshowControlOn');
          }
        )
        .click(
          function() {
         	$$.Fadeshow.Interrupted = true;

            $('div.tmpFade').hide();
            $('div.tmpFadeshowControl').removeClass('tmpFadeshowControlActive');

            $('div#tmpFade-' + $(this).SplitID()).fadeIn('slow');
            
            $(this).addClass('tmpFadeshowControlActive');
			
			$('div#fadeCap').html('<h2>' + arr[$(this).SplitID()] + '</h2>');
            
          }
        );

      this.Counter = 1;
      this.Interrupted = false;

      this.Transition();
    },

    Transition : function()
    {
      if (this.Interrupted) {
        return;
      }

      this.Last = this.Counter - 1;

      if (this.Last < 1) {
        this.Last = 7;
      }

      $('div#tmpFade-' + this.Last).fadeOut(
        'slow',
        function() {
          $('div#tmpFadeshowControl-' + $$.Fadeshow.Last).removeClass('tmpFadeshowControlActive');
          $('div#tmpFadeshowControl-' + $$.Fadeshow.Counter).addClass('tmpFadeshowControlActive');
                    
          $('div#fadeCap').html('<h2>' + arr[$$.Fadeshow.Counter] + '</h2>');
          
          $('div#tmpFade-' + $$.Fadeshow.Counter).fadeIn('slow');

          $$.Fadeshow.Counter++;

          if ($$.Fadeshow.Counter > 7) {
            $$.Fadeshow.Counter = 1;
          }

          setTimeout('$$.Fadeshow.Transition();', 9000);
        }
      );
    }
  }
});

$(document).ready(
  function() {
    $$.Fadeshow.Ready();
  }
);

