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
  statuses: Array,
});

const statusInput = ref(null);

const form = useForm({
  status: '',
});

const edit = useForm({
  _method: 'PUT',
  status: '',
});

const openEditModal = (status) => {
  edit.id = status.id;
  edit.status = status.status;
  const modalBootstrap = new Modal(document.getElementById('formStatusEdit'));
  modalBootstrap.show();
};

const submit = () => {
  form.post(route('admin.status.store'), {
    preserveScroll: true,
    onSuccess: () => closeModal(),
    onFinish: () => form.reset(),
    onError: (error) => {
      console.log(error);
      statusInput.value.focus();
    },
  });
};

const update = () => {
  edit.put(route('admin.status.update', {id:edit.id}), {
    preserveScroll: true,
    onSuccess: () => closeModal(),
    onFinish: () => edit.reset(),
    onError: (error) => {
      console.log(error);
      statusInput.value.focus();
    },
  });
};

const deleteStatus = (id) => {
  form.delete(route('admin.status.destroy', { id }), {
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
  $('#table_status').DataTable({
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
        <button class="btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#formStatus">
          <unicon name="plus" fill="white" width="20" class="me-2" />
          <span>Buat Baru</span>
        </button>
      </div>
      <DialogModal target="formStatus" :hasErrors="form.hasErrors">
        <template #title>
          Buat Status Baru
        </template>

        <template #content>
          <form @submit.prevent="submit">
            <div class="row">
              <div class="col-12">
                <InputLabel for="status" class="form-label small" value="Status" />
                <TextInput ref="statusInput" type="text" class="form-control" id="status" v-model="form.status" required
                  autocomplete="status" @keyup.enter="submit" />
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
            :disabled="form.processing" @click="submit">
            <span v-if="form.processing" class="spinner-border spinner-border-sm mr-2" role="status"></span>
            Simpan
          </PrimaryButton>
          
        </template>
      </DialogModal>
      <div class="card-body px-4 custom">
        <div class="table-responsive">
          <table id="table_status" class="table custom" style="width:100%">
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
                  <button @click="openEditModal(status)" class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#formStatusEdit">
                    <span>Ubah</span>
                  </button>
                  <button @click="deleteStatus(status)" class="btn btn-danger text-white btn-circle custShadow2 me-2">Hapus</button>
                </td>
                <td>{{ status.id }}</td>
                <td>{{ status.status }}</td>
                <td>{{ status.created_at }}</td>
                <td>{{ status.updated_at }}</td>
              </tr>
            </tbody>
          </table>
        </div>
        <DialogModal target="formStatusEdit" :hasErrors="edit.hasErrors">
          <template #title>
            Edit Status
          </template>
          <template #content>
            <form @submit.prevent="update">
              <div class="row">
                <div class="col-12">
                  <InputLabel for="status" class="form-label small" value="Status" />
                  <TextInput ref="statusInput" type="text" class="form-control" id="status" v-model="edit.status" required
                    autocomplete="status" @keyup.enter="update"/>
                  <InputError :message="edit.errors.status" class="mt-2" />
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
              <span v-if="edit.processing" class="spinner-border spinner-border-sm mr-2" role="status"></span>
              Simpan
            </PrimaryButton>
          </template>
        </DialogModal>
      </div>
    </div>
  </DashboardLayout>
</template>