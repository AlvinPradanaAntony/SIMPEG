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

defineProps({
  roles: Array,
});

const roleInput = ref(null);

const form = useForm({
  role: '',
});

const edit = useForm({
  _method: 'PUT',
  role: '',
});

const openEditModal = (role) => {
  edit.id = role.id;
  edit.role = role.role;
  const modalBootstrap = new Modal(document.getElementById('formRoleEdit'));
  modalBootstrap.show();
};

const submit = () => {
  form.post(route('admin.role.store'), {
    preserveScroll: true,
    onSuccess: () => closeModal(),
    onFinish: () => form.reset(),
    onError: (error) => {
      console.log(error);
      roleInput.value.focus();
    },
  });
};

const update = () => {
  edit.put(route('admin.role.update', {id:edit.id}), {
    preserveScroll: true,
    onSuccess: () => closeModal(),
    onFinish: () => edit.reset(),
    onError: (error) => {
      console.log(error);
      roleInput.value.focus();
    },
  });
};

const deleteRole = (id) => {
  form.delete(route('admin.role.destroy', { id }), {
    preserveScroll: true,
    onSuccess: () => {
    },
    onError: (error) => {
      console.log(error);
    },
  });
};

const closeModal = () => {
  form.reset();
  const modalBootstrap = Modal.getOrCreateInstance('#modalLogoutSession')
  modalBootstrap.hide()
};


onMounted(async () => {
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
          Buat Akses Baru
        </template>

        <template #content>
          <form @submit.prevent="submit">
            <div class="row">
              <div class="col-12">
                <InputLabel for="role" class="form-label small" value="Akses" />
                <TextInput ref="roleInput" type="text" class="form-control" id="role" v-model="form.role" required
                  autocomplete="role" @keyup.enter="submit" />
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
            :disabled="form.processing" @click="submit">
            <span v-if="form.processing" class="spinner-border spinner-border-sm mr-2" role="role"></span>
            Simpan
          </PrimaryButton>
          
        </template>
      </DialogModal>
      <div class="card-body px-4 custom">
        <div class="table-responsive">
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
                  <button @click="openEditModal(role)" class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#formRoleEdit">
                    <span>Ubah</span>
                  </button>
                  <button @click="deleteRole(role)" class="btn btn-danger text-white btn-circle custShadow2 me-2">Hapus</button>
                </td>
                <td>{{ role.id }}</td>
                <td>{{ role.role }}</td>
                <td>{{ role.created_at }}</td>
                <td>{{ role.updated_at }}</td>
              </tr>
            </tbody>
          </table>
        </div>
        <DialogModal target="formRoleEdit" :hasErrors="edit.hasErrors">
          <template #title>
            Edit Akses
          </template>
          <template #content>
            <form @submit.prevent="update">
              <div class="row">
                <div class="col-12">
                  <InputLabel for="role" class="form-label small" value="Akses" />
                  <TextInput ref="roleInput" type="text" class="form-control" id="role" v-model="edit.role" required
                    autocomplete="role" @keyup.enter="update"/>
                  <InputError :message="edit.errors.role" class="mt-2" />
                </div>
              </div>
            </form>
          </template>

          <template #footer>
            <SecondaryButton @click="closeModal" data-bs-dismiss="modal">
              Batal
            </SecondaryButton>

            <PrimaryButton class="ms-3 btn btn-primary btn-custom btn-sm" :class="{ 'opacity-25': edit.processing }"
              :disabled="edit.processing" @click="update">
              <span v-if="edit.processing" class="spinner-border spinner-border-sm mr-2" role="role"></span>
              Simpan
            </PrimaryButton>
          </template>
        </DialogModal>
      </div>
    </div>
  </DashboardLayout>
</template>