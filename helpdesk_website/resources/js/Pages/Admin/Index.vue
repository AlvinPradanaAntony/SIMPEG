<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/DashboardLayout.vue';

</script>
<template>
  <AppLayout title="Beranda">
    <div class="row">

      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card" id="data1">
          <div class="card-body p-4">
            <div class="d-flex align-items-center">
              <div class="card-icon text-white">
                <i class="uil uil-users-alt"></i>
              </div>
              <div class=" ms-auto card-detail">
                <p class="mb-0 card-detail_text">Data Mahasiswa</p>
                <h4 class="my-1 card-detail_data">0</h4>
              </div>
            </div>
          </div>
          <div class="abstract1"></div>
          <div class="abstract2"></div>
        </div>
      </div>

      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card" id="data2">
          <div class="card-body p-4">
            <div class="d-flex align-items-center">
              <div class="card-icon text-white">
                <i class="uil uil-database"></i>
              </div>
              <div class=" ms-auto card-detail">
                <p class="mb-0 card-detail_text">Data Latih</p>
                <h4 class="my-1 card-detail_data">0</h4>
              </div>
            </div>
          </div>
          <div class="abstract1"></div>
          <div class="abstract2"></div>
        </div>
      </div>

      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card" id="data3">
          <div class="card-body p-4">
            <div class="d-flex align-items-center">
              <div class="card-icon text-white">
                <i class="uil uil-server-connection"></i>
              </div>
              <div class=" ms-auto card-detail">
                <p class="mb-0 card-detail_text">Data Uji</p>
                <h4 class="my-1 card-detail_data">0</h4>
              </div>
            </div>
          </div>
          <div class="abstract1"></div>
          <div class="abstract2"></div>
        </div>
      </div>

      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card" id="data4">
          <div class="card-body p-4">
            <div class="d-flex align-items-center">
              <div class="card-icon text-white">
                <i class="uil uil-percentage"></i>
              </div>
              <div class=" ms-auto card-detail">
                <p class="mb-0 card-detail_text">Akurasi</p>
                <h4 class="my-1 card-detail_data">0 <span>%</span></h4>
              </div>
            </div>
          </div>
          <div class="abstract1"></div>
          <div class="abstract2"></div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>