
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

            $('div#tmpFade-' + $(this).SplitID()).show()
            $(this).addClass('tmpFadeshowControlActive');
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
        this.Last = 3;
      }

      $('div#tmpFade-' + this.Last).fadeOut(
        'slow',
        function() {
          $('div#tmpFadeshowControl-' + $$.Fadeshow.Last).removeClass('tmpFadeshowControlActive');
          $('div#tmpFadeshowControl-' + $$.Fadeshow.Counter).addClass('tmpFadeshowControlActive');
          $('div#tmpFade-' + $$.Fadeshow.Counter).fadeIn('slow');

          $$.Fadeshow.Counter++;

          if ($$.Fadeshow.Counter > 3) {
            $$.Fadeshow.Counter = 1;
          }

          setTimeout('$$.Fadeshow.Transition();', 5000);
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

