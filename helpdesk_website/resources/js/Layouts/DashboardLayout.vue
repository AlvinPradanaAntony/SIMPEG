<script setup>
import { Head, Link, router } from '@inertiajs/vue3';
import "../../../public/css/dashboard.css";


defineProps({
  title: String,
});

const logout = () => {
  router.post(route('logout'));
};
const handleImageError = (event) => {
  event.target.src = '/img/placeholder_profile.png'
};
</script>
<script>
import scriptDashboard from '@js/dashboard';

export default {
  mounted() {
    scriptDashboard();
  }
};
</script>

<template>
  <div>

    <Head :title="title" />
    <div class="sidebar me-0" id="sidebar">
      <div class="logo-details">
        <img src="/img/dashboard/logo.png" width="200" alt="Logo" id="logo_sidebar" />
      </div>
      <ul class="nav-links m-0" id="main">
        <li class="nav-item" :class="{ 'active': (title === 'Beranda') }">
          <Link :href="route('admin.dashboard')" class="nav-link">
          <unicon name="apps" class="me-2 unicon" width="20" height="30" />
          <span style="vertical-align: middle" class="link_name"> Beranda </span>
          </Link>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="#">Beranda</a></li>
          </ul>
        </li>
        <li class="nav-item"  :class="{ 'active': (title === 'Pegawai') }">
          <a data-bs-toggle="collapse" href="#data" aria-expanded="false" aria-controls="data" class="nav-link">
            <unicon name="users-alt" class="me-2 unicon" width="20" height="30" />
            <span style="vertical-align: middle" class="link_name"> Pengguna </span>
            <span class="menu-arrow uil-angle-right"></span>
          </a>
          <div class="collapse" id="data">
            <ul class="sub-menu">
              <li><a class="link_name" href="#">Pengguna</a></li>
              <li>
                <Link :href="route('admin.pegawai')" :class="{ 'active': (title === 'Pegawai') }">Pegawai</Link>
              </li>
              <li>
                <Link :href="route('admin.petugas')" :class="{ 'active': (title === 'Petugas') }">Petugas (Bidang)</Link>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item" :class="{ 'active': (title === 'Tiket') }">
          <Link :href="route('admin.tiket')" class="nav-link">
          <unicon name="ticket" class="me-2 unicon" width="20" height="30" />
          <span style="vertical-align: middle" class="link_name"> Tiket </span>
          </Link>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="#">Tiket</a></li>
          </ul>
        </li>
        <li class="nav-item" :class="{ 'active': (title === 'FAQ') }">
          <Link :href="route('admin.faq')" class="nav-link">
          <unicon name="question-circle" class="me-2 unicon" width="20" height="30" />
          <span style="vertical-align: middle" class="link_name"> FAQ </span>
          </Link>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="#">FAQ</a></li>
          </ul>
        </li>
        <li class="nav-item" :class="{ 'active': (title === 'Dukungan') }">
          <Link :href="route('admin.dukungan')" class="nav-link">
          <unicon name="bell-school" class="me-2 unicon" width="20" height="30" />
          <span style="vertical-align: middle" class="link_name"> Dukungan </span>
          </Link>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="#">Dukungan</a></li>
          </ul>
        </li>
        <div class="setting mt-5">
          <hr class="sidebar-divider">
          <li class="nav-item sign-out">
            <a href="#" class="nav-link">
              <unicon name="sign-out-alt" class="me-2 unicon" width="20" height="30" />
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
                    <span class="account-user-avatar d-inline-block">
                      <img class="rounded-circle object-fit-cover" :src="$page.props.auth.user.profile_photo_url"
                        :alt="$page.props.auth.user.name" @error="handleImageError" />
                    </span>
                    <span class="account-user-name">{{ $page.props.auth.user.name }}</span><span
                      class="account-position">Administrator</span>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end me-1 border border-0 custom-rounded"
                    aria-labelledby="navbarDropdown" style="">
                    <li>
                      <a class="text-decoration-none" href="/profile">
                        <div class="dropdown-item custom-item-dropdown d-flex align-items-center">
                          <unicon name="user" class="me-2 unicon" width="14" height="14" />
                          <span class="nameItem">My Profile</span>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a class="text-decoration-none" href="/profile">
                        <div class="dropdown-item custom-item-dropdown d-flex align-items-center">
                          <unicon name="sign-out-alt" class="me-2 unicon" width="14" height="14" />
                          <span class="nameItem">Logout</span>
                        </div>
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