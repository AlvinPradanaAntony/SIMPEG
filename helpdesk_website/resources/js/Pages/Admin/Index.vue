<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/DashboardLayout.vue';
import StatusCard from '@/Pages/Admin/Partials/StatusCard.vue';

</script>
<template>
  <AppLayout title="Beranda">
    <div class="row">
      <div class="col-xl-3 col-md-6 mb-4">
        <StatusCard icon="bring-front" title="Tiket Baru" data="0" id="data1"/>
      </div>
      <div class="col-xl-3 col-md-6 mb-4">
        <StatusCard icon="users-alt" title="Jumlah Pegawai" data="0" id="data2"/>
      </div>
      <div class="col-xl-3 col-md-6 mb-4">
        <StatusCard icon="ticket" title="Jumlah Tiket" data="0" id="data3"/>
      </div>
      <div class="col-xl-3 col-md-6 mb-4">
        <StatusCard icon="notebooks" title="Jumlah Kategori" data="0" id="data4"/>
      </div>
    </div>
  </AppLayout>
</template>