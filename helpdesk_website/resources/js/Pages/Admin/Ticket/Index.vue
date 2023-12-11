<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import Layout from './Layout.vue';

defineProps({
  tickets: Array,
  totalNewTickets: Number,
  totalAnsweredTickets: Number,
  totalRepliedTickets: Number,
  totalClosedTickets: Number,
});

</script>
<template>
  <Layout>
    <div class="card custom mb-3 px-2">
      <div class="card-body">
        <h3 class="m-0 fw-bold fs-5">Halaman Manajemen Tiket</h3>
      </div>
    </div>
    <div class="card custom">
      <div class="card-header px-4 py-4">
        <h3 class="m-0 fw-bold fs-5">Data Tiket</h3>
        <p>{{ totalNewTickets }}</p>
        <p>{{ totalAnsweredTickets }}</p>
        <p>{{ totalRepliedTickets }}</p>
        <p>{{ totalClosedTickets }}</p>
      </div>
      <div class="card-body px-4 custom">
        <div class="table-responsive">
          <table id="table_user" class="table custom" style="width:100%">
            <thead>
              <tr>
                <th>ID Tiket</th>
                <th>Pegawai</th>
                <th>Petugas</th>
                <th>Subjek</th>
                <th>Status</th>
                <th>Kategori</th>
                <th>Bidang</th>
                <th>Tanggal Dibuat</th>
                <th>Tanggal Diubah</th>
              </tr>
            </thead>
            <tbody v-for="ticket in tickets" :key="ticket.id">
              <tr>
                <td>{{ ticket.id }}</td>
                <td>{{ ticket.users_employee.name }}</td>
                <td>{{ ticket.users_department.name }}</td>
                <td>{{ ticket.subject }}</td>
                <td>{{ ticket.statuses.status }}</td>
                <td>{{ ticket.categories.category }}</td>
                <td>{{ ticket.categories.department.department }}</td>
                <td>{{ ticket.created_at }}</td>
                <td>{{ ticket.updated_at }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </Layout>
</template>