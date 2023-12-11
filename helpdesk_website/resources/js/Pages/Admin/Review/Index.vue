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
  reviews: Array,
});

const reviewInput = ref(null);

const form = useForm({
  rating: '',
  review: '',
});

const edit = useForm({
  _method: 'PUT',
  rating: '',
  review: '',
});

const openEditModal = (review) => {
  edit.id = review.id;
  edit.rating = review.rating;
  edit.review = review.review;
  const modalBootstrap = new Modal(document.getElementById('formReviewEdit'));
  modalBootstrap.show();
};

const submit = () => {
  form.post(route('admin.review.store'), {
    preserveScroll: true,
    onSuccess: () => closeModal(),
    onFinish: () => form.reset(),
    onError: (error) => {
      console.log(error);
      reviewInput.value.focus();
    },
  });
};

const update = () => {
  edit.put(route('admin.review.update', {id:edit.id}), {
    preserveScroll: true,
    onSuccess: () => closeModal(),
    onFinish: () => edit.reset(),
    onError: (error) => {
      console.log(error);
      reviewInput.value.focus();
    },
  });
};

const deleteReview = (id) => {
  form.delete(route('admin.review.destroy', { id }), {
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
  $('#table_review').DataTable({
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
        <h3 class="m-0 fw-bold fs-5">Halaman Manajemen Ulasan</h3>
      </div>
    </div>
    <div class="card custom">
      <div class="card-header px-4 py-4">
        <h3 class="m-0 fw-bold fs-5">Data Ulasan</h3>
        <button class="btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#formReview">
          <unicon name="plus" fill="white" width="20" class="me-2" />
          <span>Buat Baru</span>
        </button>
      </div>
      <DialogModal target="formReview" :hasErrors="form.hasErrors">
        <template #title>
          Buat Ulasan Baru
        </template>

        <template #content>
          <form @submit.prevent="submit">
            <div class="row">
              <div class="col-12">
                <InputLabel for="rating" class="form-label small" value="Rating" />
                <TextInput ref="reviewInput" type="text" class="form-control" id="rating" v-model="form.rating" required
                  autocomplete="rating" @keyup.enter="submit" />
                <InputError :message="form.errors.rating" class="mt-2" />
              </div>
              <div class="col-12">
                <InputLabel for="review" class="form-label small" value="Ulasan" />
                <TextInput ref="reviewInput" type="text" class="form-control" id="review" v-model="form.review" required
                  autocomplete="review" @keyup.enter="submit" />
                <InputError :message="form.errors.review" class="mt-2" />
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
            <span v-if="form.processing" class="spinner-border spinner-border-sm mr-2" role="review"></span>
            Simpan
          </PrimaryButton>
          
        </template>
      </DialogModal>
      <div class="card-body px-4 custom">
        <div class="table-responsive">
          <table id="table_review" class="table custom" style="width:100%">
            <thead>
              <tr>
                <th>Aksi</th>
                <th>ID Ulasan</th>
                <th>Nilai</th>
                <th>Ulasan</th>
                <th>Tanggal Dibuat</th>
                <th>Tanggal Diubah</th>
              </tr>
            </thead>
            <tbody v-for="review in reviews" :key="review.id">
              <tr>
                <td>
                  <button @click="openEditModal(review)" class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#formReviewEdit">
                    <span>Ubah</span>
                  </button>
                  <button @click="deleteReview(review)" class="btn btn-danger text-white btn-circle custShadow2 me-2">Hapus</button>
                </td>
                <td>{{ review.id }}</td>
                <td>{{ review.rating }}</td>
                <td>{{ review.review }}</td>
                <td>{{ review.created_at }}</td>
                <td>{{ review.updated_at }}</td>
              </tr>
            </tbody>
          </table>
        </div>
        <DialogModal target="formReviewEdit" :hasErrors="edit.hasErrors">
          <template #title>
            Edit Ulasan
          </template>
          <template #content>
            <form @submit.prevent="update">
              <div class="row">
                <div class="col-12">
                  <InputLabel for="rating" class="form-label small" value="Rating" />
                  <TextInput ref="reviewInput" type="text" class="form-control" id="rating" v-model="edit.rating" required
                    autocomplete="rating" @keyup.enter="update"/>
                  <InputError :message="edit.errors.rating" class="mt-2" />
                </div>
                <div class="col-12">
                  <InputLabel for="review" class="form-label small" value="Ulasan" />
                  <TextInput ref="reviewInput" type="text" class="form-control" id="review" v-model="edit.review" required
                    autocomplete="review" @keyup.enter="update"/>
                  <InputError :message="edit.errors.review" class="mt-2" />
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
              <span v-if="edit.processing" class="spinner-border spinner-border-sm mr-2" role="review"></span>
              Simpan
            </PrimaryButton>
          </template>
        </DialogModal>
      </div>
    </div>
  </DashboardLayout>
</template>