<script setup>
import { Head, Link, router } from '@inertiajs/vue3';
import '../../../public/css/dashboard.css';
import '../../../public/vendor/jquery-3.7.1.min.js';
import '../../../public/vendor/datatables/DataTables-1.13.8/js/jquery.dataTables.min.js';
import '../../../public/vendor/datatables/DataTables-1.13.8/js/dataTables.bootstrap5.min.js';
import '../../../public/vendor/datatables/Buttons-2.4.2/js/dataTables.buttons.min.js';
import '../../../public/vendor/datatables/Buttons-2.4.2/js/buttons.bootstrap5.min.js';

defineProps({
  title: String,
  tickets: Array,
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
        <li class="nav-item">
          <Link :href="route('admin.dashboard')" class="nav-link" :class="{ 'active': (title === 'Beranda') }">
          <unicon name="apps" class="me-2 unicon" width="20" height="30" />
          <span style="vertical-align: middle" class="link_name"> Beranda </span>
          </Link>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="#">Beranda</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#user" aria-expanded="false" aria-controls="user" class="nav-link"
            :class="{ 'active': title === 'Pegawai' || title === 'Petugas' }">
            <unicon name="users-alt" class="me-2 unicon" width="20" height="30" />
            <span style="vertical-align: middle" class="link_name"> Pengguna </span>
            <span class="menu-arrow uil-angle-right"></span>
          </a>
          <div class="collapse" id="user">
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
        <li class="nav-item">
          <Link :href="route('admin.tiket')" class="nav-link" :class="{ 'active': (title === 'Tiket') }">
          <unicon name="ticket" class="me-2 unicon" width="20" height="30" />
          <span style="vertical-align: middle" class="link_name"> Tiket </span>
          </Link>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="#">Tiket</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <Link :href="route('admin.faq')" class="nav-link" :class="{ 'active': (title === 'FAQ') }">
          <unicon name="question-circle" class="me-2 unicon" width="20" height="30" />
          <span style="vertical-align: middle" class="link_name"> FAQ </span>
          </Link>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="#">FAQ</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#data" aria-expanded="false" aria-controls="data" class="nav-link"
            :class="{ 'active': title === 'Bidang' || title === 'Jabatan' || title === 'Kategori' || title === 'Status' || title === 'Ulasan' || title === 'Akses' }">
            <unicon name="notebooks" class="me-2 unicon" width="20" height="30" />
            <span style="vertical-align: middle" class="link_name"> Data </span>
            <span class="menu-arrow uil-angle-right"></span>
          </a>
          <div class="collapse" id="data">
            <ul class="sub-menu">
              <li><a class="link_name" href="#">Data</a></li>
              <li>
                <Link :href="route('admin.department')" :class="{ 'active': (title === 'Department') }">Bidang</Link>
              </li>
              <li>
                <Link :href="route('admin.position')" :class="{ 'active': (title === 'Position') }">Jabatan</Link>
              </li>
              <li>
                <Link :href="route('admin.category')" :class="{ 'active': (title === 'Category') }">Kategori</Link>
              </li>
              <li>
                <Link :href="route('admin.status')" :class="{ 'active': (title === 'Status') }">Status</Link>
              </li>
              <li>
                <Link :href="route('admin.review')" :class="{ 'active': (title === 'Review') }">Ulasan</Link>
              </li>
              <li>
                <Link :href="route('admin.role')" :class="{ 'active': (title === 'Role') }">Hak Akses</Link>
              </li>
            </ul>
          </div>
        </li>
        <!-- <li class="nav-item">
          <a data-bs-toggle="collapse" href="#user_management" aria-expanded="false" aria-controls="user" class="nav-link"
            :class="{ 'active': title === 'Pegawai' || title === 'Petugas' }">
            <unicon name="users-alt" class="me-2 unicon" width="20" height="30" />
            <span style="vertical-align: middle" class="link_name"> Manajemen Pengguna </span>
            <span class="menu-arrow uil-angle-right"></span>
          </a>
          <div class="collapse" id="user_management">
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
        </li> -->
        <li class="nav-item">
          <Link :href="route('admin.dukungan')" class="nav-link" :class="{ 'active': (title === 'Dukungan') }">
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
            <form @submit.prevent="logout">
              <button class="nav-link" type="submit" id="logout">
                <unicon name="sign-out-alt" class="me-2 unicon" width="20" height="30" fill="var(--text-color)" />
                <span style="vertical-align: middle" class="link_name">Keluar</span>
              </button>
            </form>
            <ul class="sub-menu blank">
              <li>
                <a class="link_name" href="#">Logout</a>
              </li>
            </ul>
          </li>
        </div>
      </ul>
    </div>
    <section class="home-section">
      <div class="home-navbar sticky-top mb-4" id="sticky-element">
        <nav class="navbar-custom navbar-expand-lg shadowNavbar">
          <div class="container-fluid d-flex align-items-center px-3">
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
                      <Link class="text-decoration-none" :href="route('admin.profile')">
                      <div class="dropdown-item custom-item-dropdown d-flex align-items-center">
                        <unicon name="user" class="me-2 unicon" width="14" height="14" fill="var(--text-color)" />
                        <span class="nameItem">My Profile</span>
                      </div>
                      </Link>
                    </li>
                    <li>
                      <form @submit.prevent="logout">
                        <button class="dropdown-item custom-item-dropdown d-flex align-items-center" type="submit"
                          id="logout">
                          <unicon name="sign-out-alt" class="me-2 unicon" width="14" height="14"
                            fill="var(--text-color)" />
                          <span>Keluar</span>
                        </button>
                      </form>
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