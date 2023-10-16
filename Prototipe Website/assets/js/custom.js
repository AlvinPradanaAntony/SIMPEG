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

// login
function buttonSubmit() {
  var nipInput = $("#nipInput").val();
  var passInput = $("#passInput").val();
  localStorage.setItem("nip", nipInput);

  if (nipInput == "superadmin") {
    if (passInput == "superadmin") {
      Swal.fire({
        icon: "success",
        title: "Login Berhasil",
        text: "Selamat Datang Super Admin",
      }).then((result) => {
        if (result.isConfirmed) {
          localStorage.setItem("role", "admin");
          window.location.href = "faq.html";
        }
      });
      return false;
    } else {
      Swal.fire({
        icon: "error",
        title: "Kata Sandi Salah",
        text: "Masukan Kata Sandi Dengan Benar",
      });
      return false;
    }
  } else if (nipInput == "pegawai") {
    if (passInput == "pegawai") {
      Swal.fire({
        icon: "success",
        title: "Login Berhasil",
        text: "Selamat Datang Pegawai",
      }).then((result) => {
        if (result.isConfirmed) {
          localStorage.setItem("role", "basic");
          window.location.href = "faq.html";
        }
      });
      // localStorage.setItem("role", "basic");
      // window.location.href = "faq.html";
      // return false;
    } else {
      Swal.fire({
        icon: "error",
        title: "Kata Sandi Salah",
        text: "Masukan Kata Sandi Dengan Benar",
      });
      return false;
    }
  } else if (nipInput == "" && passInput == "") {
    Swal.fire({
      icon: "warning",
      title: "NIP atau Kata Sandi Kosong",
      text: "Masukan NIP dan Kata Sandi Dengan Benar",
    });
    return false;
  } else if (nipInput == "") {
    Swal.fire({
      icon: "warning",
      title: "NIP Kosong",
      text: "Masukan NIP Dengan Benar",
    });
    return false;
  } else if (passInput == "") {
    Swal.fire({
      icon: "warning",
      title: "Kata Sandi Kosong",
      text: "Masukan kata sandi dengan Benar",
    });
    return false;
  } else {
    Swal.fire({
      icon: "error",
      title: "Gagal Login",
      text: "Akun Tidak Ditemukan",
    });
    return false;
  }
  return false;
}
function checkLogin() {
  if (localStorage.getItem("nip")) {
    if (localStorage.getItem("role") == "admin") {
      window.location.href = "faq.html";
    } else if (localStorage.getItem("role") == "basic") {
      window.location.href = "faq.html";
    }
  }
}
