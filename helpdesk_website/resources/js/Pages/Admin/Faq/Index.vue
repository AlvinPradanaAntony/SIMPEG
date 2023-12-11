<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import { ref, onMounted, computed, defineProps } from 'vue';

defineProps({
  faqs: Array,
});

const form = useForm({
  question: '',
  answer: '',
});

const toEdit = (id) => {
  form.get(route('admin.faq.edit', { id }), {
    preserveScroll: true,
    onSuccess: () => {
    },
    onError: (error) => {
      console.log(error);
    },
  });
};

const deleteFaq = (id) => {
  form.delete(route('admin.faq.destroy', { id }), {
    preserveScroll: true,
    onSuccess: () => {
    },
    onError: (error) => {
      console.log(error);
    },
  });
};

onMounted(async () => {
  $('#table_faq').DataTable({
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
  <DashboardLayout title="FAQ">
    <div class="card custom mb-3 px-2">
      <div class="card-body">
        <h3 class="m-0 fw-bold fs-5">Halaman Manajemen FAQ</h3>
      </div>
    </div>
    <div class="card custom">
      <div class="card-header px-4 py-4">
        <h3 class="m-0 fw-bold fs-5">Data FAQ</h3>
        <Link :href="route('admin.faq.create')" class="btn btn-primary text-white custShadow2 mb-3"><unicon name="plus" fill="white" width="20" class="me-2" />Buat baru</Link>
      </div>
      <div class="card-body px-4 custom">
        <div class="table-responsive">
          <table id="table_faq" class="table custom" style="width:100%">
            <thead>
              <tr>
                <th>Aksi</th>
                <th>ID FAQ</th>
                <th>Pertanyaan</th>
                <th>Jawaban</th>
                <th>Tanggal Dibuat</th>
                <th>Tanggal Diubah</th>
              </tr>
            </thead>
            <tbody v-for="faq in faqs" :key="faq.id">
              <tr>
                <td>
                  <button @click="toEdit(faq)" class="btn btn-warning text-white custShadow2 mb-3">Ubah</button>
                  <button @click="deleteFaq(faq)" class="btn btn-danger text-white btn-circle custShadow2 me-2">Hapus</button>
                </td>
                <td>{{ faq.id }}</td>
                <td>{{ faq.question }}</td>
                <td>{{ faq.answer }}</td>
                <td>{{ faq.created_at }}</td>
                <td>{{ faq.updated_at }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </DashboardLayout>
</template>