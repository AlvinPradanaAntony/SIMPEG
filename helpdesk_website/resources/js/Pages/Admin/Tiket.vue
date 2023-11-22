<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import StatusCard from '@/Pages/Admin/Partials/StatusCard.vue';

</script>
<template>
  <DashboardLayout title="Tiket">
    <div class="row">
      <div class="col-xl-3 col-md-6 mb-4">
        <StatusCard icon="bring-front" title="Tiket Baru" data="0" color1="#29bb89" color2="#66e7ba"/>
      </div>
      <div class="col-xl-3 col-md-6 mb-4">
        <StatusCard icon="users-alt" title="Tiket Terjawab" data="0" color1="#bba329" color2="#e7d266"/>
      </div>
      <div class="col-xl-3 col-md-6 mb-4">
        <StatusCard icon="ticket" title="Tiket Terbalas" data="0" color1="#2951bb" color2="#6678e7"/>
      </div>
      <div class="col-xl-3 col-md-6 mb-4">
        <StatusCard icon="notebooks" title="Tiket Tertutup" data="0" color1="#bb2929" color2="#e76666"/>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <h3 class="m-0 fw-bold fs-5">Halaman Manajemen Tiket</h3>
      </div>
    </div>
  </DashboardLayout>
</template>