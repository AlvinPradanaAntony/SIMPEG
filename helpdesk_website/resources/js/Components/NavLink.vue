<script setup>
import { Link, router } from '@inertiajs/vue3';
import DropdownLink from '@/Components/DropdownLink.vue';

defineProps({
  canLogin: Boolean,
});

const logout = () => {
  router.post(route('logout'));
};
</script>
<template>
  <div>
    <ul class="navbar-nav">
      <li class="nav-item">
        <Link class="nav-link" :href="route('landingpage')">Beranda</Link>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Dukungan </a>
        <ul class="dropdown-menu dropdown-menu-end custom-rounded border-0">
          <li>
            <Link class="dropdown-item" href="/trackingticket">
            <unicon name="ticket" class="me-1" width="18" />
            <span>Tiket</span>
            </Link>
          </li>
          <li>
            <hr class="dropdown-divider" />
          </li>
          <li>
            <Link class="dropdown-item" href="/formticket">
            <unicon name="envelope-add" class="me-1" width="18" />
            <span>Buat tiket baru</span>
            </Link>
          </li>
        </ul>
      </li>
      <li class="nav-item dropdown ms-2 me-4">
        <a class="nav-link h-100 p-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <div class="nav__notif h-100 d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
              style="fill: var(--text-color);transform: ;msFilter:;">
              <path
                d="M19 13.586V10c0-3.217-2.185-5.927-5.145-6.742C13.562 2.52 12.846 2 12 2s-1.562.52-1.855 1.258C7.185 4.074 5 6.783 5 10v3.586l-1.707 1.707A.996.996 0 0 0 3 16v2a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-2a.996.996 0 0 0-.293-.707L19 13.586zM19 17H5v-.586l1.707-1.707A.996.996 0 0 0 7 14v-4c0-2.757 2.243-5 5-5s5 2.243 5 5v4c0 .266.105.52.293.707L19 16.414V17zm-7 5a2.98 2.98 0 0 0 2.818-2H9.182A2.98 2.98 0 0 0 12 22z">
              </path>
            </svg>
            <span class="position-absolute bg-danger badge rounded-pill pb-1"> 2 </span>
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-center custom-rounded border-0 notification pb-3">
          <div class="dropdown-item noti-title">
            <h5 class="m-0 text-dark">
              <span class="float-end">
                <Link href="/" class="text-decoration-none">
                <small>Bersihkan Semua</small>
                </Link>
              </span>Notifikasi
            </h5>
          </div>
          <div class="noti-body" id="simple-bar">
            <!-- item-->
            <Link href="/" class="dropdown-item notify-item">
            <div class="notify-icon bg-warning d-flex justify-content-center">
              <unicon name="info-circle" width="24" fill="white" />
            </div>
            <p class="notify-details">
              <strong>Ticket #123:</strong> Surat Tugas, <span class="badge text-bg-warning">Terbalas</span>
              <small class="text-muted">
                <unicon name="clock" width="12" />
                3 menit yang lalu
              </small>
            </p>
            </Link>
            <!-- item-->
            <Link href="/" class="dropdown-item notify-item">
            <div class="notify-icon bg-success d-flex justify-content-center">
              <unicon name="info-circle" class="d-flex h-100" width="24" fill="white" />
            </div>
            <p class="notify-details">
              <strong>Ticket #123:</strong> Surat Tugas, <strong>berhasil</strong> dibuat
              <small class="text-muted">
                <unicon name="clock" width="12" />
                1 menit yang lalu
              </small>
            </p>
            </Link>
          </div>
        </div>
      </li>
      <div v-if="canLogin">
        <li v-if="$page.props.auth.user" class="nav-item dropdown" id="account_login">
          <a class="nav-link h-100 d-flex align-items-center p-0" href="#" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            <div class="account-container d-flex gap-1">
              <img class="rounded-circle object-fit-cover" :src="$page.props.auth.user.profile_photo_url"
                :alt="$page.props.auth.user.name" width="28" height="28"
                onerror="this.onerror=null; this.src='img/placeholder_profile.png';" />
              <span class="align-self-center user-name pe-2" id="user_account"> {{ $page.props.auth.user.name }} </span>
            </div>
          </a>
          <ul class="dropdown-menu dropdown-menu-end custom-rounded border-0" id="settings">
            <li>
              <a class="dropdown-item" href="#">
                <i class="uil uil-user me-1"></i>
                <span>Lihat Profil</span>
            </a>
          </li>
          <li>
              <hr class="dropdown-divider" />
            </li>
            <li>
              <form @submit.prevent="logout">
                <button class="dropdown-item" type="submit" id="logout">
                    <i class="uil uil-sign-out-alt me-1"></i>
                    <span>Keluar</span>
                </button>
              </form>
            </li>
          </ul>
        </li>
        <li v-else class="nav-item" id="btn_login">
          <Link class="nav-link d-flex align-items-center account-container login" href="/login">Masuk</Link>
        </li>
      </div>
    </ul>
  </div>
</template>
  
