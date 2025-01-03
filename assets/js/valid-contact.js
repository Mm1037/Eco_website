(function ($) {
    ("use strict");
  
    //===== Name
    $("#name").blur(function(){

        if($(this).val().length < 3 ){
            console.log("Less Than");
            $(this).parent().find(".custom-alert").fadeIn(300);
        }else {
            console.log("Greater Than");
            $(this).parent().find(".custom-alert").fadeOut(300);
        }

    });

  
  })(jQuery);