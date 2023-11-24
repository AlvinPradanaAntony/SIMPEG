<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import StatusCard from '@/Pages/Admin/Partials/StatusCard.vue';

</script>
<template>
  <DashboardLayout title="Beranda">
    <div class="row">
      <div class="col-xl-3 col-md-6 mb-4">
        <StatusCard icon="bring-front" title="Tiket Baru" data="0" color1="#29bb89" color2="#66e7ba"/>
      </div>
      <div class="col-xl-3 col-md-6 mb-4">
        <StatusCard icon="users-alt" title="Jumlah Pegawai" data="0" color1="#8364e8" color2="#d397fa"/>
      </div>
      <div class="col-xl-3 col-md-6 mb-4">
        <StatusCard icon="ticket" title="Jumlah Tiket" data="0" color1="#307bf4" color2="#19b0ec"/>
      </div>
      <div class="col-xl-3 col-md-6 mb-4">
        <StatusCard icon="notebooks" title="Jumlah Kategori" data="0" color1="#f64c18" color2="#ee9539"/>
      </div>
    </div>
    <div class="card custom">
      <div class="card-body">
        <h3 class="m-0 fw-bold fs-5">Halaman Dashboard</h3>
      </div>
    </div>
  </DashboardLayout>
</template>