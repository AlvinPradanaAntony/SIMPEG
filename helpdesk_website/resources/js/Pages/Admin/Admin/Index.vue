<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import { ref, onMounted, computed, defineProps } from 'vue';

defineProps({
  users: Array,
});

const form = useForm({
  nip: '',
  name: '',
  gender: '',
  birth_place: '',
  birth_date: '',
  religion: '',
  marital_status: '',
  department_id: '',
  position_id: '',
  role_id: 1,
  phone: '',
  address: '',
  email: '',
  password: '',
});

const toEdit = (id) => {
  form.get(route('admin.petugas.edit', { id }), {
    preserveScroll: true,
    onSuccess: () => {
    },
    onError: (error) => {
      console.log(error);
    },
  });
};

const deleteAdmin = (id) => {
  form.delete(route('admin.petugas.destroy', { id }), {
    preserveScroll: true,
    onSuccess: () => {
    },
    onError: (error) => {
      console.log(error);
    },
  });
};
onMounted(async() => {
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
  <DashboardLayout title="Petugas">
    <div class="card custom mb-3">
      <div class="card-body">
        <h3 class="m-0 fw-bold fs-5">Halaman Manajemen Petugas</h3>
      </div>
    </div>
    <div class="card custom">
      <div class="card-header px-4 py-4">
        <h3 class="m-0 fw-bold fs-5">Data Petugas</h3>
        <Link :href="route('admin.petugas.create')" class="btn btn-primary text-white custShadow2 mb-3"><unicon name="plus" fill="white" width="20" class="me-2" />Buat baru</Link>
      </div>
      <div class="card-body px-4 custom">
        <div class="table-responsive">
          <table id="table_user" class="table custom" style="width:100%">
            <thead>
              <tr>
                <th>Aksi</th>
                <th>Foto</th>
                <th>ID User</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Agama</th>
                <th>Status Perkawinan</th>
                <th>Bidang</th>
                <th>Jabatan</th>
                <th>Telepon</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>Hak Akses</th>
                <th>Tanggal Dibuat</th>
                <th>Tanggal Diubah</th>
              </tr>
            </thead>
            <tbody v-for="user in users" :key="user.id">
              <tr>
                <td>
                  <button @click="toEdit(user)" class="btn btn-warning text-white custShadow2 mb-3">Ubah</button>
                  <button @click="deleteAdmin(user)" class="btn btn-danger text-white btn-circle custShadow2 me-2">Hapus</button>
                </td>
                <td>Foto</td>
                <td>{{ user.id }}</td>
                <td>{{ user.nip }}</td>
                <td>{{ user.name }}</td>
                <td>{{ user.gender }}</td>
                <td>{{ user.birth_place }}</td>
                <td>{{ user.birth_date }}</td>
                <td>{{ user.religion }}</td>
                <td>{{ user.marital_status }}</td>
                <td>{{ user.departments.department }}</td>
                <td>{{ user.positions.position }}</td>
                <td>{{ user.phone }}</td>
                <td>{{ user.address }}</td>
                <td>{{ user.email }}</td>
                <td>{{ user.roles.role }}</td>
                <td>{{ user.created_at }}</td>
                <td>{{ user.updated_at }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </DashboardLayout>
</template>