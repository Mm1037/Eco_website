(function ($) {
    ("use strict");
  
    //===== Prealoder
  
    $(window).on("load", function () {
      $("#preloader").addClass("zoom-out");
      setTimeout(function () {
        $("#preloader").hide();
        $("#main").show();
      }, 500);
    });
  
    //===== Initialize AOS
    
    AOS.init();
    
    //===== Toggle dropright
    $('#dropright').click(function(){
      $(".dropright-menu").toggle(500);
    });
    
    //===== Toggle Nav in Moblie
    $('#nav-toggle').click(function(){
      $(".nav-menu").toggle(500);
    });
  
  
  })(jQuery);