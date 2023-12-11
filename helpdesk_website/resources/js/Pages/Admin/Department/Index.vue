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
  departments: Array,
});

const departmentInput = ref(null);

const form = useForm({
  department: '',
});

const edit = useForm({
  _method: 'PUT',
  department: '',
});

const openEditModal = (department) => {
  edit.id = department.id;
  edit.department = department.department;
  const modalBootstrap = new Modal(document.getElementById('formDepartmentEdit'));
  modalBootstrap.show();
};

const submit = () => {
  form.post(route('admin.department.store'), {
    preserveScroll: true,
    onSuccess: () => closeModal(),
    onFinish: () => form.reset(),
    onError: (error) => {
      console.log(error);
      departmentInput.value.focus();
    },
  });
};

const update = () => {
  edit.put(route('admin.department.update', {id:edit.id}), {
    preserveScroll: true,
    onSuccess: () => closeModal(),
    onFinish: () => edit.reset(),
    onError: (error) => {
      console.log(error);
      departmentInput.value.focus();
    },
  });
};

const deleteDepartment = (id) => {
  form.delete(route('admin.department.destroy', { id }), {
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
  $('#table_department').DataTable({
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
  <DashboardLayout title="Bidang">
    <div class="card custom mb-3 px-2">
      <div class="card-body">
        <h3 class="m-0 fw-bold fs-5">Halaman Manajemen Bidang</h3>
      </div>
    </div>
    <div class="card custom">
      <div class="card-header px-4 py-4">
        <h3 class="m-0 fw-bold fs-5">Data Bidang</h3>
        <button class="btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#formDepartment">
          <unicon name="plus" fill="white" width="20" class="me-2" />
          <span>Buat Baru</span>
        </button>
      </div>
      <DialogModal target="formDepartment" :hasErrors="form.hasErrors">
        <template #title>
          Buat Bidang Baru
        </template>

        <template #content>
          <form @submit.prevent="submit">
            <div class="row">
              <div class="col-12">
                <InputLabel for="department" class="form-label small" value="Bidang" />
                <TextInput ref="departmentInput" type="text" class="form-control" id="department" v-model="form.department" required
                  autocomplete="department" @keyup.enter="submit" />
                <InputError :message="form.errors.department" class="mt-2" />
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
            <span v-if="form.processing" class="spinner-border spinner-border-sm mr-2" role="department"></span>
            Simpan
          </PrimaryButton>
          
        </template>
      </DialogModal>
      <div class="card-body px-4 custom">
        <div class="table-responsive">
          <table id="table_department" class="table custom" style="width:100%">
            <thead>
              <tr>
                <th>Aksi</th>
                <th>ID Bidang</th>
                <th>Nama Bidang</th>
                <th>Tanggal Dibuat</th>
                <th>Tanggal Diubah</th>
              </tr>
            </thead>
            <tbody v-for="department in departments" :key="department.id">
              <tr>
                <td>
                  <button @click="openEditModal(department)" class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#formDepartmentEdit">
                    <span>Ubah</span>
                  </button>
                  <button @click="deleteDepartment(department)" class="btn btn-danger text-white btn-circle custShadow2 me-2">Hapus</button>
                </td>
                <td>{{ department.id }}</td>
                <td>{{ department.department }}</td>
                <td>{{ department.created_at }}</td>
                <td>{{ department.updated_at }}</td>
              </tr>
            </tbody>
          </table>
        </div>
        <DialogModal target="formDepartmentEdit" :hasErrors="edit.hasErrors">
          <template #title>
            Edit Bidang
          </template>
          <template #content>
            <form @submit.prevent="update">
              <div class="row">
                <div class="col-12">
                  <InputLabel for="department" class="form-label small" value="Bidang" />
                  <TextInput ref="departmentInput" type="text" class="form-control" id="department" v-model="edit.department" required
                    autocomplete="department" @keyup.enter="update"/>
                  <InputError :message="edit.errors.department" class="mt-2" />
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
              <span v-if="edit.processing" class="spinner-border spinner-border-sm mr-2" role="department"></span>
              Simpan
            </PrimaryButton>
          </template>
        </DialogModal>
      </div>
    </div>
  </DashboardLayout>
</template>