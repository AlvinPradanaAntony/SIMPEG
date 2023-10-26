<script setup>
import { ref } from 'vue';
import { Head, Link, router } from "@inertiajs/vue3";
import Banner from "./Banner.vue";
import Dropdown from "./Dropdown.vue";
import DropdownLink from "./DropdownLink.vue";
import NavLink from "./NavLink.vue";
import ResponsiveNavLink from "./ResponsiveNavLink.vue";

defineProps({
  canLogin: Boolean,
});

const showingNavigationDropdown = ref(false);

const logout = () => {
    router.post(route('logout'));
};
</script>

<template>
  <Banner></Banner>
  <div class="bg-gray-100 fixed-top shadow">
    <nav class="bg-white border-b border-gray-100">
      <div class="container max-w 7 xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-15">
          <div class="flex">
            <div class="shrink-0 items-center p-1">
              <img src="./../../assets/images/logo.png" alt="logo-pabar" width="34">
            </div>
            <div class="space-x-8 sm:-my-px sm:ml-1 sm:flex">
              <div class="text-wrap ">
                <h6 class="mt-2 mb-0">Helpdesk Kepegawaian</h6>
                <small>Pemerintah Provinsi Papua Barat</small>
              </div>
            </div>
          </div>

          <div class=" sm:flex sm:items-center sm:ml-6">
            <NavLink :href="route('dashboard')" :active="route().current('dashboard')">Beranda</NavLink>
            <div class="ml-3 relative">
              <Dropdown align="right" width="48">
                <template #trigger>
                  <span class="inline-flex rounded-md">
                    <button type="button" class="inline-flex items-center px-3 py-2 text-sm leading-4 font-medium text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150"> Tiket
                      <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                      </svg>  
                    </button>
                  </span>
                </template>

                <template #content>
                  <div class="block px-4 py-2 text-xs text-gray-400">
                    Tiket
                  </div>
                  <div class="border-t border-gray-200"></div>
                  <DropdownLink><i class="uil uil-ticket me-1"></i> Semua Tiket</DropdownLink>
                  <div class="border-t border-gray-200"></div>
                  <DropdownLink><i class="uil uil-envelope-add me-1"></i>Buat Tiket Baru</DropdownLink>
                </template>
              </Dropdown>
            </div>
            <div class="ml-3 relative">
              <Dropdown align="right" width="48">
                <template #trigger>
                  <button class="flex text-sm border-1 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                  </button>
                  <span class="inline-flex rounded-md px-4 py-1 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                    <img src="./../../assets/images/profile.png" alt="profile" class="h-8 w-8 rounded-full object-cover">
                    <button type="button" class="inline-flex items-center">
                      Pegawai
                    </button>
                  </span>
                </template>
                <template #content>
                  <div class="block px-4 py-2 text-xs text-gray-400">
                    Akun
                  </div>
                  <DropdownLink :href="route('profile.show')">Profile</DropdownLink>
                  <div class="border-t border-gray-200"></div>
                  <form @submit.prevent="logout">
                    <DropdownLink as="button">Keluar</DropdownLink>
                  </form>
                </template>
              </Dropdown>
            </div>
          </div>
                            
          <div class="-mr-2 flex items-center sm:hidden">
            <button class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out" @click="showingNavigationDropdown = ! showingNavigationDropdown">
              <svg
                class="h-6 w-6"
                stroke="currentColor"
                fill="none"
                viewBox="0 0 24 24"
              >
              <path
                :class="{'hidden': showingNavigationDropdown, 'inline-flex': ! showingNavigationDropdown }"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M4 6h16M4 12h16M4 18h16"
              />
              <path
                :class="{'hidden': ! showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M6 18L18 6M6 6l12 12"
              />
              </svg>
            </button>
          </div>
        </div>
      </div>
      <div :class="{'block': showingNavigationDropdown, 'hidden': ! showingNavigationDropdown}" class="sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
          <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">Beranda</ResponsiveNavLink>
        </div>
        <div class="pt-4 pb-1 border-t border-gray-200">
          <div class="flex items-center px-4">
            <div class="shrink-0 mr-3">
              <img class="h-10 w-10 rounded-full object-cover" src="./../../assets/images/profile.png" alt="">
            </div>
            <div>
              <div class="font-medium text-base text-gray-800">Pegawai</div>
            </div>
          </div>
        </div>
        <div class="mt-3 space-y-1">
          <ResponsiveNavLink :href="route('profile.show')">Profile</ResponsiveNavLink>
          <form method="POST" @submit.prevent="logout">
            <ResponsiveNavLink as="button">Keluar</ResponsiveNavLink>
          </form>
        </div>
      </div>
    </nav>
  </div>
  <!-- <nav class="navbar navbar-expand-lg bg-white shadowNavbar">
    <div class="container">
      <div class="header-logo">
        <a class="navbar-brand p-0" href="#">
          <img class="me-1" src="./../../assets/images/logo.png" alt="logo" width="32"/>
          <span class="brand-text">
            Helpdesk Kepegawaian
            <small>Pemerintah Provinsi Papua Barat</small>
          </span>
        </a>
      </div>
      
      <div>
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link text-dark" aria-current="page" href="#">Beranda</a>
          </li>
          <template>
            <div class="block px-4 py-2 text-xs text-gray-400">Kelola Akun</div>
            <DropdownLink :href="route('profile.show')">Profil</DropdownLink>
            <div class="border-t border-gray-200" />
            <form @submit.prevent="logout">
              <DropdownLink as="button">Log Out</DropdownLink>
            </form>
          </template>
          <li class="nav-item dropdown">
            <a class="nav-link text-dark dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Dukungan</a>
            <ul class="dropdown-menu dropdown-menu-end custom-rounded border-0">
              <li>
                <a class="dropdown-item" href="#">
                  <i class="uil uil-ticket me-1"></i>
                  <span>Tiket</span>
                </a>
              </li>
              <li><hr class="dropdown-divider" /></li>
              <li>
                <a class="dropdown-item" href="#">
                  <i class="uil uil-envelope-add me-1"></i>
                  <span>Buat Tiket Baru</span>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item dropdown ms-2 me-4">
            <a class="nav-link h-100 p-0" role="button">
              <div class="nav__notif h-100 d-flex align-items-center">
                <i class="bx bx-bell bell"></i>
                <span class="position-absolute bg-danger badge rounded-pill pb-1"> 2 </span>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-center custom-rounded border-0 notification pb-3 shadow-lg">
              <div class="dropdown-item noti-title">
                <h5 class="m-0 text-dark">
                  <span class="float-end">
                    <a href="#" class="text-decoration-none">
                      <small>Bersihkan Semua</small>
                    </a>
                  </span>Notifikasi
                </h5>
              </div>
              <div class="noti-body" id="simple-bar">
                <a href="#" class="dropdown-item notify-item">
                  <div class="notify-icon bg-warning">
                    <i class="uil uil-info-circle fs-5"></i>
                  </div>
                  <p class="notify-details">
                    <strong>Ticket #123:</strong> Surat Tugas, <span class="badge text-bg-warning">Terbalas</span>
                    <small class="text-muted">
                      <i class="uil uil-clock"></i>
                      3 menit yang lalu
                    </small>
                  </p>
                </a>
                <a href="#" class="dropdown-item notify-item">
                  <div class="notify-icon bg-success">
                    <i class="uil uil-info-circle fs-5"></i>
                  </div>
                  <p class="notify-details">
                    <strong>Ticket #123:</strong> Surat Tugas, <strong>berhasil</strong> dibuat
                    <small class="text-muted">
                      <i class="uil uil-clock"></i>
                      1 menit yang lalu
                    </small>
                  </p>
                </a>
              </div>
            </div>
          </li>
          <li class="nav-item" id="btn_login">
            <a class="nav-link d-flex align-items-center account-container login" aria-current="page" href="#">Masuk</a>
          </li>
          <li class="nav-item dropdown d-none" id="account_login">
            <a class="nav-link h-100 d-flex align-items-center p-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <div class="account-container d-flex gap-1">
                <img class="rounded-circle object-fit-cover" src="./../../assets/images/placeholder_profile.png" width="28" height="28" alt="logo-profile" />
                <span class="align-self-center user-name pe-2" id="user_account"> User </span>
              </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end custom-rounded border-0">
              <li>
                <a class="dropdown-item" href="#">
                  <i class="uil uil-user me-1"></i>
                  <span>Lihat Profil</span>
                </a>
              </li>
              <li><hr class="dropdown-divider" /></li>
              <li>
                <a class="dropdown-item" href="#" onclick="logout()">
                  <i class="uil uil-sign-out-alt me-1"></i>
                  <span>Keluar</span>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav> -->
</template>