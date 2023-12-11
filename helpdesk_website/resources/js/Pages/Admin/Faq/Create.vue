<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import { ref, onMounted, computed, defineProps } from 'vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const faqInput = ref(null);

const form = useForm({
  question: '',
  answer: '',
});

const submit = () => {
  form.post(route('admin.faq.store'), {
      preserveScroll: true,
    onSuccess: () => form.reset(),
    onError: (error) => {
      console.log(error);
      faqInput.value.focus();
    },
  });
};

</script>
<template>
  <DashboardLayout title="FAQ Create">
    <div class="card custom mb-3 px-2">
      <div class="card-body">
        <h3 class="m-0 fw-bold fs-5">
          <Link :href="route('admin.faq')" class="text-decoration-none">Halaman Manajemen FAQ</Link>
          <span> / </span> Buat
        </h3>
      </div>
    </div>
    <div class="card custom">
      <div class="card-header px-4 py-4">
        <h3 class="m-0 fw-bold fs-5">Form Buat FAQ</h3>
      </div>
      <div class="card-body px-4 custom">
        <form @submit.prevent="submit">
          <div class="row">
            <div class="col-lg-12 mb-3">
              <InputLabel for="question" class="form-label small" value="Pertanyaan" />
                <TextInput ref="faqInput" type="text" class="form-control" id="question" v-model="form.question" required
                  autocomplete="question" @keyup.enter="submit" />
                <InputError :message="form.errors.question" class="mt-2" />
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 mb-3">
              <InputLabel for="answer" class="form-label small" value="Jawaban" />
                <TextInput ref="faqInput" type="text" class="form-control" id="answer" v-model="form.answer" required
                  autocomplete="answer" @keyup.enter="submit" />
                <InputError :message="form.errors.answer" class="mt-2" />
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