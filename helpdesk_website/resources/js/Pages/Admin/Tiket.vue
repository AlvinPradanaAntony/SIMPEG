<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import StatusCard from '@/Pages/Admin/Partials/StatusCard.vue';
import { ref, onMounted, computed, defineProps } from 'vue';
import axios from 'axios';

const tickets = ref([]);

onMounted(async() => {
  const response = await axios.get('/tickets');
  tickets.value = response.data.data;
  $('#table_user').DataTable({
    dom: 'Bfrtip',
    lengthMenu: [
      [10, 25, 50],
      ['10 data', '25 data', '50 data']
    ],
    buttons: [
      'pageLength'
    ],
    language: {
      search: "Cari:",
      buttons: {
        pageLength: {
          _: "Tampilkan <strong>%d</strong> data",
          '-1': "Tampilkan Semua"
        }
      },
      zeroRecords: "Data tidak ditemukan",
      info: "Menampilkan _START_ hingga _END_ dari total _TOTAL_ data",
      paginate: {
        next: "Selanjutnya",
        previous: "Sebelumnya"
      },
    },
  });
});
</script>
<template>
  <DashboardLayout title="Tiket">
    <div class="row">
      <div class="col-xl-3 col-md-6 mb-4">
        <StatusCard icon="bring-front" title="Tiket Baru" data="0" color1="#29bb89" color2="#66e7ba" />
      </div>
      <div class="col-xl-3 col-md-6 mb-4">
        <StatusCard icon="users-alt" title="Tiket Terjawab" data="0" color1="#bba329" color2="#e7d266" />
      </div>
      <div class="col-xl-3 col-md-6 mb-4">
        <StatusCard icon="ticket" title="Tiket Terbalas" data="0" color1="#2951bb" color2="#6678e7" />
      </div>
      <div class="col-xl-3 col-md-6 mb-4">
        <StatusCard icon="notebooks" title="Tiket Tertutup" data="0" color1="#bb2929" color2="#e76666" />
      </div>
    </div>
    <div class="card custom mb-3 px-2">
      <div class="card-body">
        <h3 class="m-0 fw-bold fs-5">Halaman Manajemen Tiket</h3>
      </div>
    </div>
    <div class="card custom">
      <div class="card-header px-4 py-4">
        <h3 class="m-0 fw-bold fs-5">Data Tiket</h3>
      </div>
      <div class="card-body px-4 custom">
        <div class="table-responsive">
          <table id="table_user" class="table custom" style="width:100%">
            <thead>
              <tr>
                <th>Aksi</th>
                <th>ID Tiket</th>
                <th>Pegawai</th>
                <th>Petugas</th>
                <th>Subjek</th>
                <th>Status</th>
                <th>Kategori</th>
                <th>Tanggal Dibuat</th>
                <th>Tanggal Diubah</th>
              </tr>
            </thead>
            <tbody v-for="ticket in tickets" :key="ticket.id">
              <tr>
                <td>
                  <button class="btn btn-warning text-white btn-circle custShadow2 me-2" data-bs-toggle="modal" data-bs-target="#editDataAdministrator">Edit</button>
                  <button class="btn btn-danger text-white btn-circle custShadow2 me-2" data-bs-toggle="modal" data-bs-target="#hapusDataAdministrator">Hapus</button>
                </td>
                <td>{{ ticket.id }}</td>
                <td>{{ ticket.name_employee }}</td>
                <td>{{ ticket.name_department }}</td>
                <td>{{ ticket.subject }}</td>
                <td>{{ ticket.status }}</td>
                <td>{{ ticket.category }}</td>
                <td>{{ ticket.created_at }}</td>
                <td>{{ ticket.updated_at }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </DashboardLayout>
</template>