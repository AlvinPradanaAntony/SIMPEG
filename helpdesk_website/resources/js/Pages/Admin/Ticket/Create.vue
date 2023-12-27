<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import { ref, onMounted, computed, defineProps } from 'vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const { users_employee, users_department, category, status, review } = defineProps([
  'users_employee',
  'users_department',
  'category',
  'status',
  'review'
]);

const ticketInput = ref(null);

const form = useForm({
  user_id_employee: '',
  user_id_department: '',
  subject: '',
  category_id: '',
  status_id: 1,
  review_id: 1,
});

const submit = () => {
  form.post(route('admin.tiket.store'), {
      preserveScroll: true,
    onSuccess: () => form.reset(),
    onError: (error) => {
      console.log(error);
      ticketInput.value.focus();
    },
  });
};

</script>
<template>
  <DashboardLayout title="Tiket Create">
    <div class="card custom mb-3 px-2">
      <div class="card-body">
        <h3 class="m-0 fw-bold fs-5">
          <Link :href="route('admin.tiket')" class="text-decoration-none">Halaman Manajemen Tiket</Link>
          <span> / </span> Buat
        </h3>
      </div>
    </div>
    <div class="card custom">
      <div class="card-header px-4 py-4">
        <h3 class="m-0 fw-bold fs-5">Form Buat Tiket</h3>
      </div>
      <div class="card-body px-4 custom">
        <form @submit.prevent="submit">
          <div class="row">
            <div class="col-lg-6 mb-3">
              <InputLabel for="user_id_employee" class="form-label small" value="Pegawai" />
              <select v-model="form.user_id_employee" class="form-select">
                <option v-for="user_employee in users_employee" :key="user_employee.id" :value="user_employee.id">
                  {{ user_employee.name }}
                </option>
              </select>
              <InputError :message="form.errors.user_id_employee" class="mt-2" />
            </div>
            <div class="col-lg-6 mb-3">
              <InputLabel for="user_id_department" class="form-label small" value="Admin" />
              <select v-model="form.user_id_department" class="form-select">
                <option v-for="user_department in users_department" :key="user_department.id" :value="user_department.id">
                  {{ user_department.name }}
                </option>
              </select>
              <InputError :message="form.errors.user_id_department" class="mt-2" />
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 mb-3">
              <InputLabel for="subject" class="form-label small" value="Subjek" />
              <TextInput ref="ticketInput" type="text" class="form-control" id="subject" v-model="form.subject" required
                autocomplete="subject" @keyup.enter="submit" />
              <InputError :message="form.errors.subject" class="mt-2" />
            </div>
            <div class="col-lg-6 mb-3">
              <InputLabel for="category_id" class="form-label small" value="Kategori" />
              <select v-model="form.category_id" class="form-select">
                <option v-for="categorys in category" :key="categorys.id" :value="categorys.id">
                  {{ categorys.category }}
                </option>
              </select>
              <InputError :message="form.errors.category_id" class="mt-2" />
            </div>
          </div>
          <div class="text-end">
            <PrimaryButton class="ms-3 btn btn-primary btn-custom btn-sm" :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing" @click="submit">
                <span v-if="form.processing" class="spinner-border spinner-border-sm mr-2" role="status"></span>
                Simpan
            </PrimaryButton>
          </div>

        </form>
      </div>
  </div>
</DashboardLayout></template>