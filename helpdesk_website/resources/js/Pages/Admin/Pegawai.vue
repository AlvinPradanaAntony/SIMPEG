<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import StatusCard from '@/Pages/Admin/Partials/StatusCard.vue';

</script>
<template>
  <DashboardLayout title="Pegawai">
    <div class="card custom mb-3">
      <div class="card-body">
        <h3 class="m-0 fw-bold fs-5">Halaman Manajemen Pegawai</h3>
      </div>
    </div>
    <div class="card custom">
      <div class="card-body">
        <table id="myTable" class="display">
          <thead>
            <tr>
              <th>Column 1</th>
              <th>Column 2</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Row 1 Data 1</td>
              <td>Row 1 Data 2</td>
            </tr>
            <tr>
              <td>Row 2 Data 1</td>
              <td>Row 2 Data 2</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </DashboardLayout>
</template>