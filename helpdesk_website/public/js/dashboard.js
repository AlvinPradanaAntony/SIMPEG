/*========== SHOW/HIDE PASSWORD INPUT ==========*/
import moment from "moment";

const scriptDashboard = () => {
  /*========== SIDEBAR ACTIVE/DEACTIVATE ==========*/
  $("#menu").click(function (e) {
    $("#sidebar").toggleClass("close");
  });

  /*========== COLLAPSE/ACCORDION ==========*/
  $(".nav-link").click(function () {
    if ($(this).attr("data-bs-toggle") == "collapse") {
      if ($(this).hasClass("collapsed")) {
        $(this).parent().removeClass("nav-item-active");
      } else {
        $(this).parent().addClass("nav-item-active");
        $(".accordion-item").not($(this).parent()).removeClass("nav-item-active");
      }
    }
  });

  /*==================== DARK LIGHT THEME ====================*/
  var darkMode;
  if (localStorage.getItem("dark-mode")) {
    darkMode = localStorage.getItem("dark-mode");
  } else {
    darkMode = "light";
  }
  localStorage.setItem("dark-mode", darkMode);

  if (localStorage.getItem("dark-mode") == "dark") {
    $("body").addClass("dark-theme");
    $("#dark-dropdownItem").removeClass("uil-moon");
    $("#dark-dropdownItem").addClass("uil-sun");
    $(".nameItem").text("Tema Terang");
    $("#theme-button").removeClass("uil-moon");
    $("#theme-button").addClass("uil-sun");
    $("#logo_sidebar").attr("src", "/img/dashboard/logo1.png");

    if ($("#sidebar").hasClass("close")) {
      $("#logo_sidebar")
        .fadeOut(150, function () {
          $("#logo_sidebar").attr("src", "/img/dashboard/logo-pabar.png");
          $("#logo_sidebar").attr("width", "40");
        })
        .fadeIn(150);
    } else {
      $("#logo_sidebar")
        .fadeOut(150, function () {
          $("#logo_sidebar").attr("src", "/img/dashboard/logo1.png");
          $("#logo_sidebar").attr("width", "200");
        })
        .fadeIn(150);
    }
  }

  $("#theme-button, #theme-button2").on("click", function () {
    if ($("body").hasClass("dark-theme")) {
      $("#dark-dropdownItem").removeClass("uil-sun");
      $("#dark-dropdownItem").addClass("uil-moon");
      $(".nameItem").text("Tema Gelap");
      $("#theme-button").removeClass("uil-sun");
      $("#theme-button").addClass("uil-moon");
      $("body").removeClass("dark-theme");

      if ($("#sidebar").hasClass("close")) {
        $("#logo_sidebar")
          .fadeOut(150, function () {
            $("#logo_sidebar").attr("src", "/img/logo-pabar.png");
            $("#logo_sidebar").attr("width", "40");
          })
          .fadeIn(150);
      } else {
        $("#logo_sidebar")
          .fadeOut(150, function () {
            $("#logo_sidebar").attr("src", "/img/dashboard/logo.png");
            $("#logo_sidebar").attr("width", "200");
          })
          .fadeIn(150);
      }
      localStorage.setItem("dark-mode", "light");
    } else {
      $("#dark-dropdownItem").removeClass("uil-moon");
      $("#dark-dropdownItem").addClass("uil-sun");
      $(".nameItem").text("Tema Terang");
      $("#theme-button").removeClass("uil-moon");
      $("#theme-button").addClass("uil-sun");
      $("body").addClass("dark-theme");

      if ($("#sidebar").hasClass("close")) {
        $("#logo_sidebar")
          .fadeOut(150, function () {
            $("#logo_sidebar").attr("src", "/img/logo-pabar.png");
            $("#logo_sidebar").attr("width", "40");
          })
          .fadeIn(100);
      } else {
        $("#logo_sidebar")
          .fadeOut(150, function () {
            $("#logo_sidebar").attr("src", "/img/dashboard/logo1.png");
            $("#logo_sidebar").attr("width", "200");
          })
          .fadeIn(150);
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
            $("#logo_sidebar").attr("src", "/img/dashboard/logo-pabar.png");
            $("#logo_sidebar").attr("width", "40");
          } else {
            $("#logo_sidebar").attr("src", "/img/dashboard/logo-pabar.png");
            $("#logo_sidebar").attr("width", "40");
          }
        } else {
          if ($("body").hasClass("dark-theme")) {
            $("#logo_sidebar").attr("src", "/img/dashboard/logo1.png");
            $("#logo_sidebar").attr("width", "200");
          } else {
            $("#logo_sidebar").attr("src", "/img/dashboard/logo.png");
            $("#logo_sidebar").attr("width", "200");
          }
        }
      })
      .fadeIn(150);
  });

  /*==================== Waktu ====================*/
  setInterval(function () {
    var momentNow = moment();
    $("#date-part").html(momentNow.format("dddd").substring(0, 20) + ", " + momentNow.format("DD MMMM YYYY"));
    $("#time-part").html(momentNow.format("hh:mm:ss A"));
  }, 100);

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
      customNavbar.addClass("sticky-pinned");
    } else {
      customNavbar.removeClass("sticky-pinned");
    }
  });
};

export default scriptDashboard;
