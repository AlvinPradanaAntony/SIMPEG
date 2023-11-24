<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
  <footer class="footer py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="d-flex gap-2 align-items-center mb-3">
            <img src="img/logo-pabar.png" alt="" height="50" />
            <span class="brand-text">
              Helpdesk Kepegawaian
              <small>Pemerintahan Provinsi Papua Barat</small>
            </span>
          </div>
          <p class="mt-4 pe-lg-5">Helpdesk Kepegawaian Provinsi Papua Barat adalah mitra yang siap membantu dalam berbagai
            kebutuhan kepegawaian, mulai dari penyelesaian tiket dan permintaan, hingga memberikan solusi terkait
            administrasi dan manajemen kepegawaian.</p>
          <ul class="social-list list-inline mt-3">
            <li class="list-inline-item text-center">
              <a href="#" class="social-list-item border-primary text-primary">
                <i class="bx bxl-facebook"></i>
              </a>
            </li>
            <li class="list-inline-item text-center">
              <a href="#" class="social-list-item border-danger text-danger">
                <i class="bx bxl-google"></i>
              </a>
            </li>
            <li class="list-inline-item text-center">
              <a href="#" class="social-list-item border-info text-info">
                <i class="bx bxl-twitter"></i>
              </a>
            </li>
            <li class="list-inline-item text-center">
              <a href="#" class="social-list-item border-secondary text-secondary">
                <i class="bx bxl-linkedin"></i>
              </a>
            </li>
          </ul>
        </div>
        <div class="col-lg-2 mt-3 mt-lg-0">
          <h5 class="mb-3">Link</h5>
          <ul class="nav flex-column">
            <li class="nav-item"><a href="https://simpeg.bkdpapuabarat.cloud/" class="nav-link px-0 py-1">SIMPEG</a></li>
            <li class="nav-item"><a href="http://45.32.102.16/dms/login" class="nav-link px-0 py-1">DMS</a></li>
            <li class="nav-item"><a href="http://45.32.102.16/sikkepo" class="nav-link px-0 py-1">SIKKEPO</a></li>
            <li class="nav-item"><a href="http://bkd.papuabaratprov.go.id/bkd/penilaian-layanan-kepegawaian/"
                class="nav-link px-0 py-1">Penilaian Layanan</a></li>
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
            <li class="nav-item"><a href="#" class="nav-link px-0 py-1">Bidang Penilaian Kinerja Aparatur dan
                Penghargaan</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-0 py-1">Bidang Pengadaan, Pemberhentian dan Informasi
                Kepegawaian</a></li>
          </ul>
        </div>
        <div class="col-lg-2 mt-3 mt-lg-0">
          <h5 class="mb-3">Bantuan</h5>
          <ul class="nav flex-column">
            <li class="nav-item"><a href="#" class="nav-link px-0 py-1">FAQ</a></li>
            <li class="nav-item">
              <Link href="/formticket" class="nav-link px-0 py-1">Buat Tiket Baru</Link>
            </li>
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
  </footer>
</template>