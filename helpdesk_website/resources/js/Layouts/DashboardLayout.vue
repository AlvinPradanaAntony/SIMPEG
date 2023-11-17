<script setup>
import { Head, Link, router } from '@inertiajs/vue3';
import "../../../public/css/dashboard.css";

defineProps({
  title: String,
});

const logout = () => {
  router.post(route('logout'));
};
</script>
<script>
import dasboardScript from '@js/dashboard';

export default {
  mounted() {
    dasboardScript();
  }
};
</script>

<template>
  <div>

    <Head :title="title" />
    <div class="sidebar me-0" id="sidebar">
      <div class="logo-details">
        <img src="/img/dashboard/logo.png" width="135" alt="Logo" id="logo_sidebar" />
      </div>
      <ul class="nav-links m-0" id="main">
        <li class="nav-item active">
          <a href="#" class="nav-link">
            <i class="uil-apps"></i>
            <span style="vertical-align: middle" class="link_name"> Beranda </span>
          </a>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="#">Beranda</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#data" aria-expanded="false" aria-controls="data" class="nav-link">
            <i class="uil uil-database"></i>
            <span style="vertical-align: middle" class="link_name"> Pengguna </span>
            <span class="menu-arrow uil-angle-right"></span>
          </a>
          <div class="collapse" id="data">
            <ul class="sub-menu">
              <li><a class="link_name" href="#">DATA</a></li>
              <li>
                <a href="dataset.php">Lihat Dataset</a>
              </li>
              <li>
                <a href="apps-ecommerce-products-details.html">Import Dataset</a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="uil uil-ticket"></i>
            <span style="vertical-align: middle" class="link_name"> Tiket </span>
          </a>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="#">TIKET</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="uil uil-question-circle"></i>
            <span style="vertical-align: middle" class="link_name"> FAQ </span>
          </a>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="#">FAQ</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="uil uil-bell-school"></i>
            <span style="vertical-align: middle" class="link_name"> Dukungan </span>
          </a>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="#">Dukungan</a></li>
          </ul>
        </li>
        <div class="setting mt-5">
          <hr class="sidebar-divider">
          <li class="nav-item">
            <a href="#" class="nav-link sign-out">
              <i class="uil uil-sign-out-alt"></i>
              <span style="vertical-align: middle" class="link_name">Logout</span>
            </a>
            <ul class="sub-menu blank">
              <li><a class="link_name" href="#">Logout</a></li>
            </ul>
          </li>
        </div>
      </ul>
    </div>
    <section class="home-section">
      <div class="home-navbar sticky-top mb-4" id="sticky-element">
        <nav class="navbar-custom navbar-expand-lg shadowNavbar">
          <div class="container-fluid d-flex align-items-center">
            <div class="menu" id="menu"><i class="bx bx-menu menu-collapse"></i></div>
            <div class="collapse navbar-collapse justify-content-end " id="navbarSupportedContent">
              <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item d-flex align-items-center">
                  <div class="time-frame me-3">
                    <div id="date-part"></div>
                    <div id="time-part"></div>
                  </div>
                  <span class="seperatorVertikal me-3"></span>
                  <div class="nav__btns">
                    <i class="uil uil-moon change-theme" id="theme-button"></i>
                  </div>
                </li>
                <li class="nav-item dropdown frameProfile">
                  <a class="nav-link dropdown-toggle nav-user" href="/#" id="navbarDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="account-user-avatar d-inline-block"><img
                        src="https://lh3.googleusercontent.com/a-/AFdZucqo6Dh9Ac4R3nu0r3zqSf_tTEckvSc_0Vpdv8VGZA=s96-c"
                        class="cust-avatar img-fluid rounded-circle" /></span>
                    <span class="account-user-name">Alvin Pradana Antony</span><span
                      class="account-position">Student</span>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end me-1 border border-0 custom-rounded"
                    aria-labelledby="navbarDropdown" style="">
                    <li>
                      <a class="text-decoration-none" href="/profile">
                        <div class="dropdown-item custom-item-dropdown d-flex align-items-center">
                          <i class="uil uil-user me-2"></i>
                          <span class="nameItem">My Profile</span>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item custom-item-dropdown d-flex align-items-center" href="/#">
                        <i class="uil uil-sign-out-alt me-2"></i>
                        <span class="nameItem">Sign Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>

      <div class="content">
        <main>
          <slot />
        </main>
      </div>
    </section>
  </div>
</template>