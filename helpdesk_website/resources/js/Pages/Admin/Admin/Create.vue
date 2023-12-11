<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import { ref, onMounted, computed, defineProps } from 'vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

defineProps({
  departments: Array,
  positions: Array,
});

const adminInput = ref(null);

const form = useForm({
  nip: '',
  name: '',
  gender: '',
  birth_place: '',
  birth_date: '',
  religion: '',
  marital_status: '',
  department_id: '',
  position_id: '',
  role_id: 2,
  phone: '',
  address: '',
  email: '',
  password: '',
  password_confirmation: '',
});

const submit = () => {
  form.post(route('admin.petugas.store'), {
    preserveScroll: true,
    onSuccess: () => form.reset(),
    onError: (error) => {
      if (form.errors.password) {
        form.reset('password', 'password_confirmation');
        adminInput.value.focus();
      }

      if (form.errors.current_password) {
        form.reset('current_password');
        adminInput.value.focus();
      }
      console.log(error);
      adminInput.value.focus();
    },
  });
};

</script>
<template>
  <DashboardLayout title="Admin Create">
    <div class="card custom mb-3 px-2">
      <div class="card-body">
        <h3 class="m-0 fw-bold fs-5">
          <Link :href="route('admin.petugas')" class="text-decoration-none">Halaman Manajemen Admin</Link>
          <span> / </span> Buat
        </h3>
      </div>
    </div>
    <div class="card custom">
      <div class="card-header px-4 py-4">
        <h3 class="m-0 fw-bold fs-5">Form Buat Admin</h3>
      </div>
      <div class="card-body px-4 custom">
        <form @submit.prevent="submit">
          <div class="row">
            <div class="col-lg-6 mb-3">
              <InputLabel for="name" class="form-label small" value="Nama" />
              <TextInput ref="adminInput" type="text" class="form-control" id="name" v-model="form.name" required
                autocomplete="name" @keyup.enter="submit" />
              <InputError :message="form.errors.name" class="mt-2" />
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 mb-3">
              <InputLabel for="nip" class="form-label small" value="NIP" />
              <TextInput ref="adminInput" type="text" class="form-control" id="nip" v-model="form.nip" required
                autocomplete="nip" @keyup.enter="submit" />
              <InputError :message="form.errors.nip" class="mt-2" />
            </div>
            <div class="col-lg-6 mb-3">
              <InputLabel for="gender" class="form-label small" value="Jenis Kelamin" />
              <select class="form-select" aria-label="Default select example" id="gender" v-model="form.gender"
                required autocomplete="gender" @keyup.enter="submit">
                <option value="" selected class="hidden"></option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
              <InputError :message="form.errors.gender" class="mt-2" />
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 mb-3">
              <InputLabel for="birth_place" class="form-label small" value="Tempat Lahir" />
              <TextInput ref="adminInput" type="text" class="form-control" id="birth_place" v-model="form.birth_place" required
                autocomplete="birth_place" @keyup.enter="submit" />
              <InputError :message="form.errors.birth_place" class="mt-2" />
            </div>
            <div class="col-lg-6 mb-3">
              <InputLabel for="birth_date" class="form-label small" value="Tanggal Lahir" />
              <TextInput ref="adminInput" type="date" class="form-control" id="birth_date" v-model="form.birth_date" required
                autocomplete="birth_date" @keyup.enter="submit" />
              <InputError :message="form.errors.birth_date" class="mt-2" />
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 mb-3">
              <InputLabel for="religion" class="form-label small" value="Agama" />
              <select class="form-select" aria-label="Default select example" id="religion" v-model="form.religion"
                required autocomplete="religion" @keyup.enter="submit">
                <option value="" selected class="hidden"></option>
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
                <option value="Katolik">Katolik</option>
                <option value="Hindu">Hindu</option>
                <option value="Buddha">Buddha</option>
                <option value="Konghucu">Konghucu</option>
              </select>
              <InputError :message="form.errors.religion" class="mt-2" />
            </div>
            <div class="col-lg-6 mb-3">
              <InputLabel for="marital_status" class="form-label small" value="Status Perkawinan" />
              <select class="form-select" aria-label="Default select example" id="marital_status" v-model="form.marital_status"
                required autocomplete="marital_status" @keyup.enter="submit">
                <option value="" selected class="hidden"></option>
                <option value="Kawin">Kawin</option>
                <option value="Belum Kawin">Belum Kawin</option>
              </select>
              <InputError :message="form.errors.marital_status" class="mt-2" />
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 mb-3">
              <InputLabel for="department_id" class="form-label small" value="Bidang" />
              <select v-model="form.department_id" class="form-select">
                <option v-for="department in departments" :key="department.id" :value="department.id">
                  {{ department.department }}
                </option>
              </select>
              <InputError :message="form.errors.department_id" class="mt-2" />
            </div>
            <div class="col-lg-6 mb-3">
              <InputLabel for="position_id" class="form-label small" value="Jabatan" />
              <select v-model="form.position_id" class="form-select">
                <option v-for="position in positions" :key="position.id" :value="position.id">
                  {{ position.position }}
                </option>
              </select>
              <InputError :message="form.errors.position_id" class="mt-2" />
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 mb-3">
              <InputLabel for="phone" class="form-label small" value="Nomor Telepon" />
              <TextInput ref="adminInput" type="text" class="form-control" id="phone" v-model="form.phone" required
                autocomplete="phone" @keyup.enter="submit" />
              <InputError :message="form.errors.phone" class="mt-2" />
            </div>
            <div class="col-lg-6 mb-3">
              <InputLabel for="address" class="form-label small" value="Alamat" />
                <TextInput ref="adminInput" type="text" class="form-control" id="address" v-model="form.address" required
                  autocomplete="address" @keyup.enter="submit" />
                <InputError :message="form.errors.address" class="mt-2" />
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 mb-3">
              <InputLabel for="email" class="form-label small" value="Email" />
              <TextInput ref="adminInput" type="email" class="form-control" id="email" v-model="form.email" required
                autocomplete="email" @keyup.enter="submit" />
              <InputError :message="form.errors.email" class="mt-2" />
            </div>
            <div class="col-lg-6 mb-3">
              <InputLabel for="password" class="form-label small" value="Password" />
              <TextInput ref="adminInput" type="password" class="form-control" id="password" v-model="form.password" required
                autocomplete="password" @keyup.enter="submit" />
              <InputError :message="form.errors.password" class="mt-2" />
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 mb-3">
              <InputLabel for="confirmPassword" class="form-label small" value="confirmPassword" />
              <TextInput ref="adminInput" type="password" class="form-control" id="confirmPassword" v-model="form.password_confirmation" required
                autocomplete="confirmPassword" @keyup.enter="submit" />
              <InputError :message="form.errors.password_confirmation" class="mt-2" />
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