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
  categories: Array,
  departments: Array,
});

const categoryInput = ref(null);

const form = useForm({
  category: '',
  department_id: '',
});

const edit = useForm({
  _method: 'PUT',
  category: '',
  department_id: '',
});

const openEditModal = (category) => {
  edit.id = category.id;
  edit.category = category.category;
  edit.department_id = category.department_id;
  const modalBootstrap = new Modal(document.getElementById('formCategoryEdit'));
  modalBootstrap.show();
};

const submit = () => {
  form.post(route('admin.category.store'), {
    preserveScroll: true,
    onSuccess: () => closeModal(),
    onFinish: () => form.reset(),
    onError: (error) => {
      console.log(error);
      categoryInput.value.focus();
    },
  });
};

const update = () => {
  edit.put(route('admin.category.update', {id:edit.id}), {
    preserveScroll: true,
    onSuccess: () => closeModal(),
    onFinish: () => edit.reset(),
    onError: (error) => {
      console.log(error);
      categoryInput.value.focus();
    },
  });
};

const deleteCategory = (id) => {
  form.delete(route('admin.category.destroy', { id }), {
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
  $('#table_category').DataTable({
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
  <DashboardLayout title="Kategori">
    <div class="card custom mb-3 px-2">
      <div class="card-body">
        <h3 class="m-0 fw-bold fs-5">Halaman Manajemen Kategori</h3>
      </div>
    </div>
    <div class="card custom">
      <div class="card-header px-4 py-4">
        <h3 class="m-0 fw-bold fs-5">Data Kategori</h3>
        <button class="btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#formCategory">
          <unicon name="plus" fill="white" width="20" class="me-2" />
          <span>Buat Baru</span>
        </button>
      </div>
      <DialogModal target="formCategory" :hasErrors="form.hasErrors">
        <template #title>
          Buat Kategori Baru
        </template>

        <template #content>
          <form @submit.prevent="submit">
            <div class="row">
              <div class="col-12">
                <InputLabel for="category" class="form-label small" value="Kategori" />
                <TextInput ref="categoryInput" type="text" class="form-control" id="category" v-model="form.category" required
                  autocomplete="category" @keyup.enter="submit" />
                <InputError :message="form.errors.category" class="mt-2" />
              </div>
              <div class="col-12">
                <InputLabel for="department_id" class="form-label small" value="Bidang" />
                <select v-model="form.department_id" class="form-select">
                  <option v-for="department in departments" :key="department.id" :value="department.id">
                    {{ department.department }}
                  </option>
                </select>
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
            <span v-if="form.processing" class="spinner-border spinner-border-sm mr-2" role="category"></span>
            Simpan
          </PrimaryButton>
          
        </template>
      </DialogModal>
      <div class="card-body px-4 custom">
        <div class="table-responsive">
          <table id="table_category" class="table custom" style="width:100%">
            <thead>
              <tr>
                <th>Aksi</th>
                <th>ID Kategori</th>
                <th>Kategori</th>
                <th>Bidang</th>
                <th>Tanggal Dibuat</th>
                <th>Tanggal Diubah</th>
              </tr>
            </thead>
            <tbody v-for="category in categories" :key="category.id">
              <tr>
                <td>
                  <button @click="openEditModal(category)" class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#formCategoryEdit">
                    <span>Ubah</span>
                  </button>
                  <button @click="deleteCategory(category)" class="btn btn-danger text-white btn-circle custShadow2 me-2">Hapus</button>
                </td>
                <td>{{ category.id }}</td>
                <td>{{ category.category }}</td>
                <td>{{ category.department.department }}</td>
                <td>{{ category.created_at }}</td>
                <td>{{ category.updated_at }}</td>
              </tr>
            </tbody>
          </table>
        </div>
        <DialogModal target="formCategoryEdit" :hasErrors="edit.hasErrors">
          <template #title>
            Edit Kategori
          </template>
          <template #content>
            <form @submit.prevent="update">
              <div class="row">
                <div class="col-12">
                  <InputLabel for="category" class="form-label small" value="Kategori" />
                  <TextInput ref="categoryInput" type="text" class="form-control" id="category" v-model="edit.category" required
                    autocomplete="category" @keyup.enter="update"/>
                  <InputError :message="edit.errors.category" class="mt-2" />
                </div>
                <div class="col-12">
                  <InputLabel for="department_id" class="form-label small" value="Bidang" />
                  <select v-model="edit.department_id" class="form-select">
                    <option v-for="department in departments" :key="department.id" :value="department.id">
                      {{ department.department }}
                    </option>
                  </select>
                  <InputError :message="edit.errors.department_id" class="mt-2" />
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
              <span v-if="edit.processing" class="spinner-border spinner-border-sm mr-2" role="category"></span>
              Simpan
            </PrimaryButton>
          </template>
        </DialogModal>
      </div>
    </div>
  </DashboardLayout>
</template>