<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import Layout from './Layout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const form = useForm({
  pegawai: '',
  petugas: '',
  subjek: '',
  status: '',
  kategori: ''
});
const submit = () => {
  // form.post(route(''), {
  //   onError: (error) => {
  //     console.log(error);
  //   },
  // });
};
</script>
<template>
  <Layout>
    <div class="card custom mb-3 px-2">
      <div class="card-body">
        <h3 class="m-0 fw-bold fs-5">
          <Link :href="route('admin.tiket')" class="text-decoration-none">Halaman Manajemen Tiket</Link>
          <span> / </span> Edit
        </h3>
      </div>
    </div>
    <div class="card custom">
      <div class="card-header px-4 py-4">
        <h3 class="m-0 fw-bold fs-5">Form Edit Tiket</h3>
      </div>
      <div class="card-body px-4 custom">
        <form @submit.prevent="submit">
          <div class="row">
            <div class="col-lg-6 mb-3">
              <InputLabel for="inputPegawai" class="form-label small" value="Nama Pegawai" />
              <TextInput type="text" class="form-control" id="inputPegawai" v-model="form.pegawai" required
                autocomplete="pegawai" />
              <InputError :message="form.errors.pegawai" class="mt-2" />
            </div>
            <div class="col-lg-6 mb-3">
              <InputLabel for="inputPetugas" class="form-label small" value="Nama" />
              <TextInput type="text" class="form-control" id="inputPetugas" v-model="form.petugas" required
                autocomplete="petugas" />
              <InputError :message="form.errors.petugas" class="mt-2" />
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 mb-3">
              <InputLabel for="inputKategori" class="form-label small" value="Kategori" />
              <TextInput type="text" class="form-control" id="inputKategori" v-model="form.kategori" required
                autocomplete="kategori" />
              <InputError :message="form.errors.kategori" class="mt-2" />
            </div>
            <div class="col-lg-6 mb-3">
              <InputLabel for="inputSubjek" class="form-label small" value="Subjek" />
              <TextInput type="text" class="form-control" id="inputSubjek" v-model="form.birth_date" required
                autocomplete="subjek" />
              <InputError :message="form.errors.birth_date" class="mt-2" />
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 mb-3">
              <InputLabel for="inputStatus" class="form-label small" value="Status" />
              <select class="form-select" aria-label="Default select example" id="inputStatus" v-model="form.status"
                required autocomplete="status">
                <option value="" selected class="hidden"></option>
                <option value="Terkirim">Terkirim</option>
                <option value="Terjawab">Terjawab</option>
                <option value="Terbalas">Terbalas</option>
                <option value="Tertutup">Tertutup</option>
              </select>
            </div>
            <div class="col-lg-6 mb-3">
              <InputLabel for="inputKategori" class="form-label small" value="Kategori" />
              <select class="form-select" aria-label="Default select example" id="inputKategori" v-model="form.kategori"
                required autocomplete="kategori">
                <option value="" selected class="hidden"></option>
                <option value="Kategori 1">Kategori 1</option>
                <option value="Kategori 2">Kategori 2</option>
                <option value="Kategori 3">Kategori 3</option>
                <option value="Kategori 4">Kategori 4</option>
              </select>
            </div>
          </div>
          <div class="text-end">
            <PrimaryButton class="btn btn-primary border-0 p-2 px-4 btn-sm btn-custom ms-auto"
              :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
              Simpan
            </PrimaryButton>
          </div>

        </form>
      </div>
  </div>
</Layout></template>