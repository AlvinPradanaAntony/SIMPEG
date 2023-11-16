/*========== SHOW/HIDE PASSWORD INPUT ==========*/
import $ from "jquery";

const customScript = () => {
  $("#passInput").keyup(function () {
    var inputs = $("#passInput").val();
    $("#spanEye").fadeIn("fast");
    if (inputs == "") {
      $("#spanEye").fadeOut("fast");
      $("#spanEye").removeClass("show");
      $("#spanEye").addClass("hidden");
    } else {
      $("#spanEye").fadeIn("fast");
      $("#spanEye").removeClass("hidden");
      $("#spanEye").addClass("show");
    }
  });
  $(".show-hide").click(function () { 
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
  });
};

export default customScript;


