      $(document).ready(function(){
        $(window).scroll(function() { // check if scroll event happened
          if ($(document).scrollTop() > 70) { // check if user scrolled more than 50 from top of the browser window
              $(".navbar-fixed-top").css("background-color", "#c8c3cc"); // if yes, then change the color of class
              } else {
                  $(".navbar-fixed-top").css("background-color", "transparent"); // if not, change it back to transparent
              }
        });
      });