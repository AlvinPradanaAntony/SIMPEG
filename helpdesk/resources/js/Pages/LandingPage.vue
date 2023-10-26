<script setup>
import { Head, Link } from "@inertiajs/vue3";
import Navbar from "../Components/Navbar.vue";
import Accordion from "../Components/Accordion.vue";
import('./../../assets/css/bootstrap/bootstrap.min.css');
import("./../../assets/css/style.css");
import("./../../assets/js/custom.js");
import ("https://cdnjs.cloudflare.com/ajax/libs/simplebar/6.2.5/simplebar.min.js");

defineProps({
  canLogin: Boolean,
  canRegister: Boolean,
  laravelVersion: String,
  phpVersion: String,
});

</script>

<template>
  <Head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>FAQ | SIMPEG</title>
  </Head>
  <body>
    <Navbar></Navbar>
    <main>
      <!-- Search Banner -->
      <div class="search-banner has-bg">
        <div class="bg-cover" data-paroller="true" data-paroller-factor="0.5" data-paroller-factor-xs="0.01"></div>
        <div class="container">
          <h1 class="text-center mt-5">Hai, Ada yang bisa kami bantu?</h1>
          <div class="input-group">
            <input type="text" class="form-control form-control-lg" placeholder="Cari informasi anda disini...." />
            <button type="submit" class="btn btn-lg" title="Search" @click="search"><i class="ui uil-search"></i></button>
          </div>
        </div>
      </div>
      <!-- Faq -->
      <Accordion></Accordion>
      <div class="create-tiket py-5">
          <div class="justify-content-center text-center">
            <h2>Ada pertanyaan lain ?</h2>
            <p>Anda dapat bertanya pertanyaan yang belum tersedia di FAQ dan meminta bantuan dengan tiket.</p>
            <a href="#" class="btn btn-create-ticket d-inline-block position-relative">Buat Tiket Baru</a>
          </div>
        </div>
    </main>
    <footer>
      <div class="about py-5">
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <div class="d-flex gap-2 align-items-center mb-3">
                <img src="./../../assets/images/logo.png" alt="" height="50" width="40"/>
                <span class="brand-text">
                  Helpdesk Kepegawaian
                  <small>Pemerintahan Provinsi Papua Barat</small>
                </span>
              </div>
              <p class="mt-4 pe-lg-5">Helpdesk Kepegawaian Provinsi Papua Barat adalah mitra yang siap membantu dalam berbagai kebutuhan kepegawaian, mulai dari penyelesaian tiket dan permintaan, hingga memberikan solusi terkait administrasi dan manajemen kepegawaian.</p>
              <ul class="social-list list-inline mt-3">
                <li class="list-inline-item text-center">
                  <a href="#" class="social-list-item border-primary text-primary"><i class="uil uil-facebook-f"></i></a>
                </li>
                <li class="list-inline-item text-center">
                  <a href="#" class="social-list-item border-danger text-danger"><i class="bx bxl-google"></i></a>
                </li>
                <li class="list-inline-item text-center">
                  <a href="#" class="social-list-item border-info text-info"><i class="bx bxl-twitter"></i></a>
                </li>
                <li class="list-inline-item text-center">
                  <a href="#" class="social-list-item border-secondary text-secondary"><i class="bx bxl-linkedin"></i></a>
                </li>
              </ul>
            </div>
            <div class="col-lg-2 mt-3 mt-lg-0">
              <h5 class="mb-3">Link</h5>
              <ul class="nav flex-column">
                <li class="nav-item"><a href="https://simpeg.bkdpapuabarat.cloud/" class="nav-link px-0 py-1">SIMPEG</a></li>
                <li class="nav-item"><a href="http://45.32.102.16/dms/login" class="nav-link px-0 py-1">DMS</a></li>
                <li class="nav-item"><a href="http://45.32.102.16/sikkepo" class="nav-link px-0 py-1">SIKKEPO</a></li>
                <li class="nav-item"><a href="http://bkd.papuabaratprov.go.id/bkd/penilaian-layanan-kepegawaian/" class="nav-link px-0 py-1">Penilaian Layanan</a></li>
                <li class="nav-item"><a href="https://kinerja.bkn.go.id/login" class="nav-link px-0 py-1">E-KINERJA</a></li>
                <li class="nav-item"><a href="https://www.lapor.go.id/" class="nav-link px-0 py-1">LAPOR</a></li>
              </ul>
            </div>
            <div class="col-lg-2 mt-3 mt-lg-0">
              <h5 class="mb-3">Bidang</h5>
              <ul class="nav flex-column">
                <li class="nav-item"><a href="#" class="nav-link px-0 py-1">Sekretariat</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-0 py-1">Bidang Pengembangan Aparatur</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-0 py-1">Bidang Mutasi dan Promosi</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-0 py-1">Bidang Penilaian Kinerja Aparatur dan Penghargaan</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-0 py-1">Bidang Pengadaan, Pemberhentian dan Informasi Kepegawaian</a></li>
              </ul>
            </div>
            <div class="col-lg-2 mt-3 mt-lg-0">
              <h5 class="mb-3">Bantuan</h5>
              <ul class="nav flex-column">
                <li class="nav-item"><a href="#" class="nav-link px-0 py-1">FAQ</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-0 py-1">Buat Tiket Baru</a></li>
              </ul>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="mt-5">
                <p class="text-muted mt-4 text-center mb-0">©2023 - Integra Multi Solusindo | VIPER TEAM</p>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </footer>
  </body>
</template>

<style>
.bg-dots-darker {
    background-image: url("../../images/background.jpg");
}
@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("../../images/background.jpg");
    }
}
</style>
