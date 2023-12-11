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
  positions: Array,
});

const positionInput = ref(null);

const form = useForm({
  position: '',
});

const edit = useForm({
  _method: 'PUT',
  position: '',
});

const openEditModal = (position) => {
  edit.id = position.id;
  edit.position = position.position;
  const modalBootstrap = new Modal(document.getElementById('formPositionEdit'));
  modalBootstrap.show();
};

const submit = () => {
  form.post(route('admin.position.store'), {
    preserveScroll: true,
    onSuccess: () => closeModal(),
    onFinish: () => form.reset(),
    onError: (error) => {
      console.log(error);
      positionInput.value.focus();
    },
  });
};

const update = () => {
  edit.put(route('admin.position.update', {id:edit.id}), {
    preserveScroll: true,
    onSuccess: () => closeModal(),
    onFinish: () => edit.reset(),
    onError: (error) => {
      console.log(error);
      positionInput.value.focus();
    },
  });
};

const deletePosition = (id) => {
  form.delete(route('admin.position.destroy', { id }), {
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
  $('#table_position').DataTable({
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
  <DashboardLayout title="Jabatan">
    <div class="card custom mb-3 px-2">
      <div class="card-body">
        <h3 class="m-0 fw-bold fs-5">Halaman Manajemen Jabatan</h3>
      </div>
    </div>
    <div class="card custom">
      <div class="card-header px-4 py-4">
        <h3 class="m-0 fw-bold fs-5">Data Jabatan</h3>
        <button class="btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#formPosition">
          <unicon name="plus" fill="white" width="20" class="me-2" />
          <span>Buat Baru</span>
        </button>
      </div>
      <DialogModal target="formPosition" :hasErrors="form.hasErrors">
        <template #title>
          Buat Jabatan Baru
        </template>

        <template #content>
          <form @submit.prevent="submit">
            <div class="row">
              <div class="col-12">
                <InputLabel for="position" class="form-label small" value="Jabatan" />
                <TextInput ref="positionInput" type="text" class="form-control" id="position" v-model="form.position" required
                  autocomplete="position" @keyup.enter="submit" />
                <InputError :message="form.errors.position" class="mt-2" />
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
            <span v-if="form.processing" class="spinner-border spinner-border-sm mr-2" role="position"></span>
            Simpan
          </PrimaryButton>
          
        </template>
      </DialogModal>
      <div class="card-body px-4 custom">
        <div class="table-responsive">
          <table id="table_position" class="table custom" style="width:100%">
            <thead>
              <tr>
                <th>Aksi</th>
                <th>ID Jabatan</th>
                <th>Jabatan</th>
                <th>Tanggal Dibuat</th>
                <th>Tanggal Diubah</th>
              </tr>
            </thead>
            <tbody v-for="position in positions" :key="position.id">
              <tr>
                <td>
                  <button @click="openEditModal(position)" class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#formPositionEdit">
                    <span>Ubah</span>
                  </button>
                  <button @click="deletePosition(position)" class="btn btn-danger text-white btn-circle custShadow2 me-2">Hapus</button>
                </td>
                <td>{{ position.id }}</td>
                <td>{{ position.position }}</td>
                <td>{{ position.created_at }}</td>
                <td>{{ position.updated_at }}</td>
              </tr>
            </tbody>
          </table>
        </div>
        <DialogModal target="formPositionEdit" :hasErrors="edit.hasErrors">
          <template #title>
            Edit Jabatan
          </template>
          <template #content>
            <form @submit.prevent="update">
              <div class="row">
                <div class="col-12">
                  <InputLabel for="position" class="form-label small" value="Jabatan" />
                  <TextInput ref="positionInput" type="text" class="form-control" id="position" v-model="edit.position" required
                    autocomplete="position" @keyup.enter="update"/>
                  <InputError :message="edit.errors.position" class="mt-2" />
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
              <span v-if="edit.processing" class="spinner-border spinner-border-sm mr-2" role="position"></span>
              Simpan
            </PrimaryButton>
          </template>
        </DialogModal>
      </div>
    </div>
  </DashboardLayout>
</template>