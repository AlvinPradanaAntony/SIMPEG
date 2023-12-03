<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import { ref, onMounted, computed, defineProps } from 'vue';
import axios from 'axios';

const users = ref([]);

const fetchDataByLevelId = async (levelId) => {
  try {
    const response = await axios.get('/users', {
      params: { level_id: levelId },
    });
    users.value = response.data.data;
  } catch (error) {
    console.error('Error fetching users by level_id:', error);
  }
};

onMounted(async () => {
  await fetchDataByLevelId(1);

  // const response = await axios.get('/users');
  // users.value = response.data.data;
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
  <DashboardLayout title="Pegawai">
    <div class="card custom mb-3 px-2">
      <div class="card-body">
        <h3 class="m-0 fw-bold fs-5">Halaman Manajemen Pegawai</h3>
      </div>
    </div>
    <div class="card custom">
      <div class="card-header px-4 py-4">
        <h3 class="m-0 fw-bold fs-5">Data Pengguna</h3>
        <span>level_id : {{  }}</span>
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
                  <button class="btn btn-warning text-white btn-circle custShadow2 me-2" data-bs-toggle="modal" data-bs-target="#editDataAdministrator">Edit</button>
                  <button class="btn btn-danger text-white btn-circle custShadow2 me-2" data-bs-toggle="modal" data-bs-target="#hapusDataAdministrator">Hapus</button>
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
                <td>{{ user.department }}</td>
                <td>{{ user.position }}</td>
                <td>{{ user.phone }}</td>
                <td>{{ user.address }}</td>
                <td>{{ user.email }}</td>
                <td>{{ user.level_name }}</td>
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