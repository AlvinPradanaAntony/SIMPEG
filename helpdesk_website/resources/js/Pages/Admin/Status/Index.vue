<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import { ref, onMounted, computed, defineProps } from 'vue';
import DialogModal from '@/Components/DialogModal.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import axios from 'axios';

const statuses = ref([]);
const statusInput = ref(null);
const form = useForm({
  status: '',
});
const edit = useForm({
  _method: 'PUT',
  status: statuses,
});
const saveData = () => {
  form.post(route(''), {
    preserveScroll: true,
    onSuccess: () => closeModal(),
    onFinish: () => form.reset(),
    onError: (error) => {
      console.log(error);
      statusInput.value.focus();
    },
  });
};
const updateData = () => {
  form.post(route(''), {
    preserveScroll: true,
    onSuccess: () => closeModal(),
    onFinish: () => form.reset(),
    onError: (error) => {
      console.log(error);
      statusInput.value.focus();
    },
  });
};
const closeModal = () => {
  form.reset();
  const modalBootstrap = Modal.getOrCreateInstance('#modalLogoutSession')
  modalBootstrap.hide()
};
onMounted(async () => {
  const response = await axios.get('/statuses');
  statuses.value = response.data.data;
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
  <DashboardLayout title="Status">
    <div class="card custom mb-3 px-2">
      <div class="card-body">
        <h3 class="m-0 fw-bold fs-5">Halaman Manajemen Status</h3>
      </div>
    </div>
    <div class="card custom">
      <div class="card-header px-4 py-4">
        <h3 class="m-0 fw-bold fs-5">Data Status</h3>
        <button class="btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#formstatus">
          <unicon name="plus" fill="white" width="20" class="me-2" />
          <span>Buat Baru</span>
        </button>
      </div>
      <DialogModal target="formstatus" :hasErrors="form.hasErrors">
        <template #title>
          Buat Status Baru
        </template>

        <template #content>
          <form @submit.prevent="saveData">
            <div class="row">
              <div class="col-12">
                <InputLabel for="status" class="form-label small" value="Status" />
                <TextInput ref="statusInput" type="text" class="form-control" id="status" v-model="form.status" required
                  autocomplete="status" />
                <InputError :message="form.errors.status" class="mt-2" />
              </div>
            </div>
          </form>
        </template>

        <template #footer>
          <SecondaryButton @click="closeModal" data-bs-dismiss="modal">
            Batal
          </SecondaryButton>

          <PrimaryButton class="ms-3 btn btn-primary btn-custom btn-sm" :class="{ 'opacity-25': form.processing }"
            :disabled="form.processing">
            <span v-if="form.processing" class="spinner-border spinner-border-sm mr-2" role="status"></span>
            Simpan
          </PrimaryButton>
        </template>
      </DialogModal>
      <div class="card-body px-4 custom">
        <div class="table-responsive">
          <button class="btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#formstatusEdit">
            <span>Edit Data</span>
          </button>
          <table id="table_user" class="table custom" style="width:100%">
            <thead>
              <tr>
                <th>Aksi</th>
                <th>ID Status</th>
                <th>Status</th>
                <th>Tanggal Dibuat</th>
                <th>Tanggal Diubah</th>
              </tr>
            </thead>
            <tbody v-for="status in statuses" :key="status.id">
              <tr>
                <td>
                  <button class="btn btn-warning text-white btn-circle custShadow2 me-2" data-bs-toggle="modal"
                    data-bs-target="#editDataAdministrator">Edit</button>
                  <button class="btn btn-danger text-white btn-circle custShadow2 me-2" data-bs-toggle="modal"
                    data-bs-target="#hapusDataAdministrator">Hapus</button>
                </td>
                <td>{{ status.id }}</td>
                <td>{{ status.status }}</td>
                <td>{{ status.created_at }}</td>
                <td>{{ status.updated_at }}</td>
              </tr>
            </tbody>
          </table>
        </div>
        <DialogModal target="formstatusEdit" :hasErrors="form.hasErrors">
          <template #title>
            Edit Status
          </template>
          <template #content>
            <form @submit.prevent="updateData">
              <div class="row">
                <div class="col-12">
                  <InputLabel for="status" class="form-label small" value="Status" />
                  <TextInput ref="statusInput" type="text" class="form-control" id="status" v-model="edit.status" required
                    autocomplete="status" />
                  <InputError :message="form.errors.status" class="mt-2" />
                </div>
              </div>
            </form>
          </template>

          <template #footer>
            <SecondaryButton @click="closeModal" data-bs-dismiss="modal">
              Batal
            </SecondaryButton>

            <PrimaryButton class="ms-3 btn btn-primary btn-custom btn-sm" :class="{ 'opacity-25': form.processing }"
              :disabled="form.processing">
              <span v-if="form.processing" class="spinner-border spinner-border-sm mr-2" role="status"></span>
              Simpan
            </PrimaryButton>
          </template>
        </DialogModal>
      </div>
    </div>
  </DashboardLayout>
</template>