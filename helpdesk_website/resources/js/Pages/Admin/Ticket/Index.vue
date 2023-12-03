<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import Layout from './Layout.vue';
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
      </div>
      <div class="card-body px-4 custom">
        <div class="table-responsive">
          <Link :href="route('admin.tiket.edit')" class="btn btn-primary text-white custShadow2 mb-3">Edit Data</Link>
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
  </Layout>
</template>