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

const roles = ref([]);
const roleInput = ref(null);
const form = useForm({
  role: '',
});
const edit = useForm({
  _method: 'PUT',
  role: roles,
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
  const response = await axios.get('/roles');
  roles.value = response.data.data;
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
  <DashboardLayout title="Akses">
    <div class="card custom mb-3 px-2">
      <div class="card-body">
        <h3 class="m-0 fw-bold fs-5">Halaman Manajemen Hak Akses</h3>
      </div>
    </div>
    <div class="card custom">
      <div class="card-header px-4 py-4">
        <h3 class="m-0 fw-bold fs-5">Data Hak Akses</h3>
        <button class="btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#formRole">
          <unicon name="plus" fill="white" width="20" class="me-2" />
          <span>Buat Baru</span>
        </button>
      </div>
      <DialogModal target="formRole" :hasErrors="form.hasErrors">
        <template #title>
          Buat Role Baru
        </template>

        <template #content>
          <form @submit.prevent="saveData">
            <div class="row">
              <div class="col-12">
                <InputLabel for="role" class="form-label small" value="Role" />
                <TextInput ref="roleInput" type="text" class="form-control" id="role" v-model="form.role" required
                  autocomplete="role" />
                <InputError :message="form.errors.role" class="mt-2" />
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
          <button class="btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#formRoleEdit">
            <span>Edit Data</span>
          </button>
          <table id="table_user" class="table custom" style="width:100%">
            <thead>
              <tr>
                <th>Aksi</th>
                <th>ID Hak Akses</th>
                <th>Hak Akses</th>
                <th>Tanggal Dibuat</th>
                <th>Tanggal Diubah</th>
              </tr>
            </thead>
            <tbody v-for="role in roles" :key="role.id">
              <tr>
                <td>
                  <button class="btn btn-warning text-white btn-circle custShadow2 me-2" data-bs-toggle="modal"
                    data-bs-target="#editDataAdministrator">Edit</button>
                  <button class="btn btn-danger text-white btn-circle custShadow2 me-2" data-bs-toggle="modal"
                    data-bs-target="#hapusDataAdministrator">Hapus</button>
                </td>
                <td>{{ role.id }}</td>
                <td>{{ role.role }}</td>
                <td>{{ role.created_at }}</td>
                <td>{{ role.updated_at }}</td>
              </tr>
            </tbody>
          </table>
        </div>
        <DialogModal target="formRoleEdit" :hasErrors="form.hasErrors">
        <template #title>
          Edit Role
        </template>

        <template #content>
          <form @submit.prevent="saveData">
            <div class="row">
              <div class="col-12">
                <InputLabel for="role" class="form-label small" value="Role" />
                <TextInput ref="roleInput" type="text" class="form-control" id="role" v-model="form.role" required
                  autocomplete="role" />
                <InputError :message="form.errors.role" class="mt-2" />
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