/*========== SHOW/HIDE PASSWORD INPUT ==========*/
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

let buttonLogout = document.getElementById("buttonLogout");
let textUsername = document.getElementById("textUsername");
let textPassword = document.getElementById("textPassword");
let showContent = document.getElementById("showContent");

function termscheck() {
  terms.checked = true;
}

// Sign-In
function buttonSubmit() {
  let nipInput = document.getElementById("nipInput");
  let passInput = document.getElementById("passInput");
  localStorage.setItem("nip", nipInput.value);

  if (nipInput.value == "superadmin" && passInput.value == "superadmin") {
    localStorage.setItem("role", "admin");
    window.location.href = "faq.html";
  } else if (nipInput.value == "pegawai" && passInput.value == "pegawai") {
    localStorage.setItem("role", "basic");
  } else if (nipInput.value == "" || passInput.value == "") {
    alert("Tolong Masukan NIP Dan Kata Sandi Anda");
  } else {
    alert("NIP Atau Kata Sandi Anda Salah");
  }
}

if (localStorage.getItem("nip")) {
  if (localStorage.getItem("role") == "admin") {
    window.location.href = "faq.html";
    //    showContent.textContent = '"Superadmin"';
    // showContent.style.display = "block";
  }  else if (localStorage.getItem("role") == "basic") {
    if (nipInput.value == "pegawai") {
      // showContent.textContent = "Pegawai 1";
      // showContent.style.display = "block";
    }
  }
}

// logout
function logout() {
  localStorage.clear();
  location.reload();
}
