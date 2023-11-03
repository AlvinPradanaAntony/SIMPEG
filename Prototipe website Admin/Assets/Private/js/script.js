/*========== SIDEBAR ACTIVE/DEACTIVATE ==========*/
$(document).ready(function () {
  $("#menu").click(function (e) {
    $("#sidebar").toggleClass("close");
  });
});

/*========== COLLAPSE/ACCORDION ==========*/
$(document).ready(function () {
  $(".collapse").on("show.bs.collapse", function () {
    $(".collapse.show").each(function () {
      $(this).collapse("hide");
    });
  });
});
$(document).ready(function () {
  // Tambahkan class ketika collapse di klik
  $(".collapse")
    .on("show.bs.collapse", function () {
      $(this).parent().addClass("nav-item-active");
    })
    .on("hide.bs.collapse", function () {
      $(".nav-item").removeClass("nav-item-active");
    });
});
$(document).ready(function () {});

/*==================== DARK LIGHT THEME ====================*/
$(document).ready(function () {
  var darkMode;

  if (localStorage.getItem("dark-mode")) {
    // if dark mode is in storage, set variable with that value
    darkMode = localStorage.getItem("dark-mode");
  } else {
    // if dark mode is not in storage, set variable to 'light'
    darkMode = "light";
  }

  // set new localStorage value
  localStorage.setItem("dark-mode", darkMode);

  if (localStorage.getItem("dark-mode") == "dark") {
    $("body").addClass("dark-theme");
    $("#dark-dropdownItem").removeClass("uil-moon");
    $("#dark-dropdownItem").addClass("uil-sun");
    $(".nameItem-profile").text("My Profile");
    $(".nameItem-logout").text("Logout");
    $("#theme-button").removeClass("uil-moon");
    $("#theme-button").addClass("uil-sun");
    $("#logo_sidebar").attr("src", "Assets/Private/img/logo.png");
    $("#img_login").attr("src", "Assets/Private/img/auth-img-dark.png");
    $("#logo_sidebar").css("margin-left", "50px");
    

    if ($("#sidebar").hasClass("close")) {
      $("#logo_sidebar")
        .fadeOut(150, function () {
          $("#logo_sidebar").attr("src", "Assets/Private/img/logo-pabar.png");
          $("#logo_sidebar").attr("width", "40");
          $("#logo_sidebar").css("margin-left", "1px"); //notfounf
        })
        .fadeIn(150);
    } else {

      // pertama dark
      $("#logo_sidebar")
        .fadeOut(150, function () {
          $("#logo_sidebar").attr("src", "Assets/Private/img/logo1.png");
          $("#logo_sidebar").attr("width", "200");
          $("#logo_sidebar").css("margin-left", "1px");
        })
        .fadeIn(150);
      $("#img_login")
        .fadeOut(100, function () {
          $("#img_login").attr("src", "Assets/Private/img/auth-img-dark.png");
        })
        .fadeIn(100);
    }
  }

  $("#theme-button, #theme-button2").on("click", function () {
    if ($("body").hasClass("dark-theme")) {
      $("#dark-dropdownItem").removeClass("uil-sun");
      $("#dark-dropdownItem").addClass("uil-moon");
      $(".nameItem-profile").text("My profile");
      $(".nameItem-logout").text("Logout");
      $("#theme-button").removeClass("uil-sun");
      $("#theme-button").addClass("uil-moon");
      $("body").removeClass("dark-theme");

      if ($("#sidebar").hasClass("close")) {
        $("#logo_sidebar")
          .fadeOut(150, function () {
            $("#logo_sidebar").attr("src", "Assets/Private/img/logo-pabar.png");
            $("#logo_sidebar").attr("width", "40");
            $("#logo_sidebar").css("margin-left", "10px");
          })
          .fadeIn(150);

          // ini terakhir
      } else {
        $("#logo_sidebar")
          .fadeOut(150, function () {
            $("#logo_sidebar").attr("src", "Assets/Private/img/logo.png");
            $("#logo_sidebar").attr("width", "200");
            $("#logo_sidebar").css("margin-left", "1px");
          })
          .fadeIn(150);
        $("#img_login")
          .fadeOut(100, function () {
            $("#img_login").attr("src", "Assets/Private/img/auth-img.png");
          })
          .fadeIn(100);
      }
      // set stored value to 'light'
      localStorage.setItem("dark-mode", "light");
    } else {
      $("#dark-dropdownItem").removeClass("uil-moon");
      $("#dark-dropdownItem").addClass("uil-sun");
      $(".nameItem-profile").text("My profile");
      $(".nameItem-logout").text("Logout");
      $("#theme-button").removeClass("uil-moon");
      $("#theme-button").addClass("uil-sun");
      $("body").addClass("dark-theme");

      if ($("#sidebar").hasClass("close")) {
        $("#logo_sidebar")
          .fadeOut(150, function () {
            $("#logo_sidebar").attr("src", "Assets/Private/img/logo-pabar.png");
            $("#logo_sidebar").attr("width", "40");
            $("#logo_sidebar").css("margin-right", "1px"); //first dark
          })
          .fadeIn(100);
      } else {
        $("#logo_sidebar")
          .fadeOut(150, function () {
            $("#img_login").attr("src", "Assets/Private/img/auth-img-dark.png");
            $("#logo_sidebar").attr("src", "Assets/Private/img/logo1.png");
            $("#logo_sidebar").attr("width", "200");
            
          })
          .fadeIn(150);
        $("#img_login")
          .fadeOut(100, function () {
            $("#img_login").attr("src", "Assets/Private/img/auth-img-dark.png");
          })
          .fadeIn(100);
      }
      // set stored value to 'dark'
      localStorage.setItem("dark-mode", "dark");
    }
  });
  $("#menu").click(function (e) {
    e.preventDefault();
    $("#logo_sidebar")
      .fadeOut(150, function () {
        if ($("#sidebar").hasClass("close")) {
          if ($("body").hasClass("dark-theme")) {
            $("#logo_sidebar").attr("src", "Assets/Private/img/logo-pabar.png");
            $("#logo_sidebar").attr("width", "40");
            $("#logo_sidebar").css("margin-left", "10px"); // pertama dark
          } else {
            
            $("#logo_sidebar").attr("src", "Assets/Private/img/logo-pabar.png");
            $("#logo_sidebar").attr("width", "40");
            $("#logo_sidebar").css("margin-left", "10px"); // pertama light
          }
        } else {
          // kedua dark
          if ($("body").hasClass("dark-theme")) {
            $("#img_login").attr("src", "Assets/Private/img/auth-img-dark.png");
            $("#logo_sidebar").attr("src", "Assets/Private/img/logo1.png");
            $("#logo_sidebar").attr("width", "200");
            $("#logo_sidebar").css("margin-left", "20px");
          } else {

            // kedua light
            $("#img_login").attr("src", "Assets/Private/img/auth-img.png");
            $("#logo_sidebar").attr("src", "Assets/Private/img/logo.png");
            $("#logo_sidebar").attr("width", "200");
            $("#logo_sidebar").css("margin-left", "1px");
          }
        }
      })
      .fadeIn(150);
  });
});

/*==================== Waktu ====================*/
$(document).ready(function () {
  var interval = setInterval(function () {
    var momentNow = moment();
    $("#date-part").html(momentNow.format("dddd").substring(0, 20) + ", " + momentNow.format("DD MMMM YYYY"));
    $("#time-part").html(momentNow.format("hh:mm:ss A"));
  }, 100);
});

/*========== SHOW/HIDE PASSWORD INPUT ==========*/
$("#passInput").keyup(function () {
  var inputs = $("#passInput").val();
  $("#spanEye").fadeIn("slow");
  if (inputs == "") {
    $("#spanEye").fadeOut("slow");
    $("#spanEye").removeClass("show");
    $("#spanEye").addClass("hidden");
  } else {
    $("#spanEye").fadeIn("slow");
    $("#spanEye").removeClass("hidden");
    $("#spanEye").addClass("show");
  }
});
$(".show-hide").click(function () {
  $(this).toggleClass("uil-eye-slash uil-eye");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
    $("#iconShowHide").css("color", "var(--first-color)");
  } else {
    input.attr("type", "password");
    $("#iconShowHide").css("color", "var(--text-color-light)");
  }
});

/*========== GET CURRENT YEAR ==========*/
var currentYear = new Date().getFullYear();
$(document).ready(function () {
  $("#year").text(new Date().getFullYear());
});

/*========== NAVBAR ==========*/
$(window).scroll(function () {
  var stickyElement = $("#sticky-element");
  var customNavbar = $(".navbar-custom");
  var stickyPosition = stickyElement.offset().top;

  if (stickyPosition <= $(window).scrollTop()) {
    // element has been pinned
    customNavbar.addClass("sticky-pinned");
  } else {
    // element is not pinned
    customNavbar.removeClass("sticky-pinned");
  }
});


//==========Chart=========

var handleInteractiveChart = function () {
	"use strict";
	$('#interactive-chart').empty();
	
	function showTooltip(x, y, contents) {
		$('<div id="tooltip" class="flot-tooltip">' + contents + '</div>').css( {
			top: y - 45,
			left: x - 55
		}).appendTo("body").fadeIn(200);
	}
	if ($('#interactive-chart').length !== 0) {
	
		var data1 = [ 
			[1, 40], [2, 50], [3, 60], [4, 60], [5, 60], [6, 65], [7, 75], [8, 90], [9, 100], [10, 105], 
			[11, 110], [12, 110], [13, 120], [14, 130], [15, 135],[16, 145], [17, 132], [18, 123], [19, 135], [20, 150] 
		];
		var data2 = [
			[1, 10],  [2, 6], [3, 10], [4, 12], [5, 18], [6, 20], [7, 25], [8, 23], [9, 24], [10, 25], 
			[11, 18], [12, 30], [13, 25], [14, 25], [15, 30], [16, 27], [17, 20], [18, 18], [19, 31], [20, 23]
		];
		var xLabel = [
			[1,''],[2,''],[3,'May 15'],[4,''],[5,''],[6,'May 19'],[7,''],[8,''],[9,'May 22'],[10,''],
			[11,''],[12,'May 25'],[13,''],[14,''],[15,'May 28'],[16,''],[17,''],[18,'May 31'],[19,''],[20,'']
		];
		
		$.plot($("#interactive-chart"), [{
				data: data1, 
				label: "Page Views", 
				color: app.color.blue,
				lines: { show: true, fill:false, lineWidth: 2 },
				points: { show: true, radius: 3, fillColor: app.color.componentBg },
				shadowSize: 0
			}, {
				data: data2,
				label: 'Visitors',
				color: app.color.green,
				lines: { show: true, fill:false, lineWidth: 2 },
				points: { show: true, radius: 3, fillColor: app.color.componentBg },
				shadowSize: 0
			}], {
			xaxis: {  ticks:xLabel, tickDecimals: 0, tickColor: 'rgba('+ app.color.darkRgb + ', .2)' },
			yaxis: {  ticks: 10, tickColor: 'rgba('+ app.color.darkRgb + ', .2)', min: 0, max: 200 },
			grid: { 
				hoverable: true, 
				clickable: true,
				tickColor: 'rgba('+ app.color.darkRgb + ', .2)',
				borderWidth: 1,
				backgroundColor: 'transparent',
				borderColor: 'rgba('+ app.color.darkRgb + ', .2)'
			},
			legend: {
				labelBoxBorderColor: 'rgba('+ app.color.darkRgb + ', .2)',
				margin: 10,
				noColumns: 1,
				show: true
			}
		});
		var previousPoint = null;
		$("#interactive-chart").bind("plothover", function (event, pos, item) {
			$("#x").text(pos.x.toFixed(2));
			$("#y").text(pos.y.toFixed(2));
			if (item) {
				if (previousPoint !== item.dataIndex) {
					previousPoint = item.dataIndex;
					$("#tooltip").remove();
					var y = item.datapoint[1].toFixed(2);

					var content = item.series.label + " " + y;
					showTooltip(item.pageX, item.pageY, content);
				}
			} else {
				$("#tooltip").remove();
				previousPoint = null;            
			}
			event.preventDefault();
		});
	}
};

