$(document).ready(function(){
	$(window).scroll(function() { // check if scroll event happened
		if ($(document).scrollTop() > 80) { // check if user scrolled more than 50 from top of the browser window
		    $(".navbar-fixed-top").css("background-color", "#66d9ff"); // if yes, then change the color of class
		    } else {
		        $(".navbar-fixed-top").css("background-color", "transparent"); // if not, change it back to transparent
		    }
	});
});


 $(function () {
          $('#datetimepicker1').datetimepicker();
  });
     