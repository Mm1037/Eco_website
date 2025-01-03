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

  /**
   * Animation on scroll
   */
  window.addEventListener("load", () => {
    AOS.init({
      duration: 1200,
      easing: "ease-in-out",
      once: true,
      mirror: false,
    });
  });
  //===== Switch Between Sign-in and sign-up

  $("#sign-in-btn").on("click", function () {
    $("#sign-in-form").addClass("active");
    $("#sign-up-form").removeClass("active");
    $("#forget-password-form").removeClass("active");
    $(this).addClass("active border-bottom border-success");
    $("#sign-up-btn").removeClass("active border-bottom border-success");
  });

  $("#sign-up-btn").on("click", function () {
    $("#sign-up-form").addClass("active");
    $("#sign-in-form").removeClass("active");
    $("#forget-password-form").removeClass("active");
    $(this).addClass("active border-bottom border-success");
    $("#sign-in-btn").removeClass("active border-bottom border-success");
  });

  $("#forget-link").on("click", function () {
    $("#forget-password-form").addClass("active");
    $("#sign-in-form").removeClass("active");
    $("#sign-in-btn").removeClass("active border-bottom border-success");
  });

  //======== Search

  function Search() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = $("#Search");
    filter = input.val().toUpperCase();
    table = $("#Table");
    tr = table.find("tr");

    // Loop through all table rows, and hide those who don't match the search query
    tr.each(function () {
      td = $(this).find("td").eq(0);
      if (td.length) {
        txtValue = td.text() || td.text();
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          $(this).show();
        } else {
          $(this).hide();
        }
      }
    });
  }

  $("#Search").on("keyup", Search);

  //============================chat bot start================================================
  // Disable Send Button until write message
  $("#chat-input").on("input", function() {
    $("#btn-send").attr("disabled", !$(this).val().trim());
});

  // Event handler for the chatbot toggle button click
  $("#chatbot_toggle").on("click", function () {
    var chatbot = $("#chatbot");
    var toggleChildren = $("#chatbot_toggle").children();

    // Check if the chatbot is collapsed
    if (chatbot.hasClass("main-card-collapsed")) {
      // Expand the chatbot
      chatbot.removeClass("main-card-collapsed");
      $(toggleChildren[0]).hide(); // Hide the collapse icon
      $(toggleChildren[1]).show(); // Show the expand icon
      // Optionally add a default response after expansion (currently commented out)

      $('#message-box').scrollTop($('#message-box')[0].scrollHeight);

      
    } else {
      // Collapse the chatbot
      chatbot.addClass("main-card-collapsed");
      $(toggleChildren[0]).show(); // Show the collapse icon
      $(toggleChildren[1]).hide(); // Hide the expand icon
      
    }
  });

  //============================chat bot end================================================

  //======== Password Eye

  $("#togglepassword").on("click", function () {
    var passwordField = $("#password");
    var type = passwordField.attr("type") === "password" ? "text" : "password";
    passwordField.attr("type", type);

    // Optionally change the icon based on the visibility state
    if (type === "password") {
      $(this).removeClass("ri-eye-close-line");
      $(this).addClass("ri-eye-line");
    } else {
      $(this).removeClass("ri-eye-line");
      $(this).addClass("ri-eye-close-line");
    }
  });

  //======== Show Only 3 Rows In The Table

  var rows = $("table tbody tr");
  rows.slice(3).hide();

  //======== Slider
  $("#recipeCarousel").carousel({
    interval: 10000,
  });

  $(".carousel .carousel-item").each(function () {
    var minPerSlide = 3;
    var next = $(this).next();
    if (!next.length) {
      next = $(this).siblings(":first");
    }
    next.children(":first-child").clone().appendTo($(this));

    for (var i = 0; i < minPerSlide; i++) {
      next = next.next();
      if (!next.length) {
        next = $(this).siblings(":first");
      }

      next.children(":first-child").clone().appendTo($(this));
    }
  });

  //======== Enable Edit on Profile
  $("#btn-profile-edit").on("click", function () {
    $("#profile-edit").show();
    $("#profile-info").hide(500);
  });
  $("#btn-profile-info, #btn-cancle").on("click", function () {
    $("#profile-edit").hide();
    $("#profile-info").show(500);
  });

  //==============contacct us ===========
  // Real-time validation next to the fields
  $("#contactForm").on("submit", function (event) {
    var isValid = true;

    // Validate name
    var name = $("#name").val();
    if (name === "") {
      $("#nameError").show();
      isValid = false;
    } else {
      $("#nameError").hide();
    }

    // Validate email
    var email = $("#email").val();
    var emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
    if (email === "" || !emailPattern.test(email)) {
      $("#emailError").show();
      isValid = false;
    } else {
      $("#emailError").hide();
    }

    // Validate feedback
    var feedback = $("#feedback").val();
    if (feedback === "") {
      $("#feedbackError").show();
      isValid = false;
    } else {
      $("#feedbackError").hide();
    }

    // Prevent submission if there are errors
    if (!isValid) {
      event.preventDefault();
    }
  });

  // Function for real-time validation while typing
  function validateField(fieldId, errorId) {
    var fieldValue = $("#" + fieldId).val();
    if (fieldValue === "") {
      $("#" + errorId).show();
    } else {
      $("#" + errorId).hide();
    }
  }

    // Listen for checkbox changes
    $("#approve").change(function() {
      $("#joinButton").attr("disabled", !this.checked);
  });

})(jQuery);
