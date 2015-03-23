(function ($) {
  // Explain link in query log
  Drupal.behaviors.eviews = {
    attach: function(context, settings) {
      $('#superfish-2 li.menuparent, #superfish-1 li.menuparent').each(function(){
        
        parent_width = $(this).width();
        child_width = $(this).find('ul:first').width();
        
        margin_left = (child_width - parent_width)/2;

        $(this).find('ul:first').css( { "margin-left" : -margin_left } );
      });

      /*var main_wrapper_h = $('.content-wrapper #main-content-box').height();
      var aside_wrapper_h = $('.content-wrapper aside').height();

      if (main_wrapper_h > aside_wrapper_h) {
        //$('.content-wrapper aside').height(main_wrapper_h);
        alert('main mayor '+ main_wrapper_h);
        alert('aside mayor '+ aside_wrapper_h);
        $('.content-wrapper aside .region').height(main_wrapper_h);
      } else {
        alert('aside mayor '+ aside_wrapper_h);
        //$('.content-wrapper #main-content-box').height(aside_wrapper_h);
      }*/
      if ($(window).width() > 719) {
        $('.content-wrapper').equalHeights();
      }
    }
  }

  $.fn.equalHeights = function(px) {
    $(this).each(function(){
      var currentTallest = 0;
      $(this).children().each(function(i){
      if ($(this).height() > currentTallest) { 
        currentTallest = $(this).height(); }
      });
      if (!px && Number.prototype.pxToEm) currentTallest = currentTallest.pxToEm(); //use ems unless px is specified
      // for ie6, set height since min-height isn't supported
      if ($.browser.msie && $.browser.version == 6.0) { 
        $(this).children().css({'height': currentTallest}); 
      }
      $(this).children().css({'min-height': currentTallest});
    });
    return this;
  };  
})(jQuery);

