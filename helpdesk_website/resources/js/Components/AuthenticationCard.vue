<script setup>
import { Link } from '@inertiajs/vue3';

</script>
<template>
  <div class="login__background w-100 min-vh-100 d-flex flex-column justify-content-center align-items-center px-3 px-sm-0 py-3">
    <div class="card px-3" id="panel-login">
      <div class="card-header pt-4 ps-2">
        <Link href="/" class="nav-link d-flex align-items-center">
        <img src="img/logo-pabar.png" alt="logo" height="75" />
        <div>
          <p class="m-0 logo-title">SIMPEG</p>
          <p class="m-0 logo-subtitle">Sistem Informasi Kepegawaian</p>
        </div>
        </Link>
      </div>
      <div class="card-body">
        <div>
          <p class="m-0 mt-2 txt-login">Masuk</p>
          <p class="mt-0 mb-4 txt-desc">Silakan isi dengan data Anda yang terdaftar.</p>
        </div>
        <slot />
      </div>
    </div>
  </div>
</template>
