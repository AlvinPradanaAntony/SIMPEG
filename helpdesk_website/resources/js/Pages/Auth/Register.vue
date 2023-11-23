<script setup>
import { Head, Link, useForm, } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import Swal from 'sweetalert2'

const form = useForm({
  nip: '',
  name: '',
  email: '',
  password: '',
  password_confirmation: ''
});

const submit = () => {
  form.post(route('register'), {
    onFinish: () => form.reset('password', 'password_confirmation'),
    onError: (error) => {
      console.log(error.password);
      Swal.fire({
        icon: "error",
        title: error.password,
        text:  error.password ? 'Masukan Kata Sandi Dengan Benar' : '',
      });
    },
  });
};
</script>
<script>
import customScript from '@js/custom';

export default {
  data() {
    return {
      iconName: 'eye-slash'
    };
  },
  methods: {
    toggleIcon() { this.iconName = (this.iconName === 'eye-slash') ? 'eye' : 'eye-slash'; },
  },
  mounted() {
    customScript();
  }
};
</script>

<template>
  <AuthenticationCard>

    <Head title="Log in" />
    <form @submit.prevent="submit">
      <div class="form-floating form-floating-custom mb-3">
        <TextInput id="nip" v-model="form.nip" class="form-control form-control-custom" type="text" required autofocus
          autocomplete="nip" placeholder="Masukan NIP" />
        <InputLabel class="label_custom" for="nip" value="NIP" />
        <div class="form-floating-icon">
          <unicon name="key-skeleton-alt" fill="var(--title-color)" width="20"></unicon>
        </div>
      </div>
      <div class="form-floating form-floating-custom mb-3">
        <TextInput id="name" v-model="form.name" class="form-control form-control-custom" type="text" required
          autocomplete="name" placeholder="Masukan Nama" />
        <InputLabel class="label_custom" for="name" value="Nama" />
        <div class="form-floating-icon">
          <unicon name="user" fill="var(--title-color)" width="20"></unicon>
        </div>
      </div>
      <div class="form-floating form-floating-custom mb-3">
        <TextInput id="email" v-model="form.email" class="form-control form-control-custom" type="email" required
          autocomplete="email" placeholder="Masukan Email" />
        <InputLabel class="label_custom" for="email" value="Email" />
        <div class="form-floating-icon">
          <unicon name="envelope-alt" fill="var(--title-color)" width="20"></unicon>
        </div>
      </div>
      <div class="form-floating form-floating-custom mb-3 auth-pass-inputgroup">
        <TextInput id="password" v-model="form.password" class="form-control form-control-custom" type="password" required
          autocomplete="new-password" placeholder="Masukan Kata Sandi" />
        <InputLabel class="label_custom" for="password" value="Kata Sandi" />
        <div class="form-floating-icon">
          <unicon name="padlock" fill="var(--title-color)" width="20"></unicon>
        </div>
        <span class="eye hidden" id="spanEye">
          <i class="show-hide" toggle="#passInput" id="iconShowHide" @click="toggleIcon">
            <unicon :name="iconName" fill="var(--title-color)" width="20"></unicon>
          </i>
        </span>
      </div>
      <div class="form-floating form-floating-custom mb-3 auth-pass-inputgroup">
        <TextInput id="password_confirmation" v-model="form.password_confirmation"
          class="form-control form-control-custom" type="password" required autocomplete="new-password"
          placeholder="Masukan Konfirmasi Kata Sandi" />
        <InputLabel class="label_custom" for="password_confirmation" value="Konfirmasi Kata Sandi" />
        <div class="form-floating-icon">
          <unicon name="padlock" fill="var(--title-color)" width="20"></unicon>
        </div>
        <span class="eye hidden" id="spanEye">
          <i class="show-hide" toggle="#passInput" id="iconShowHide" @click="toggleIcon">
            <unicon :name="iconName" fill="var(--title-color)" width="20"></unicon>
          </i>
        </span>
      </div>
      <div class="mt-4 mb-3">
        <PrimaryButton class="btn btn-primary w-100 rounded-pill border-0 p-2" :disabled="form.processing" id="myButton">
          Login
        </PrimaryButton>
      </div>
    </form>
  </AuthenticationCard>
</template>
