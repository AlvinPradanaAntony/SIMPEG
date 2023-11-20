<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import Swal from 'sweetalert2'


defineProps({
  canResetPassword: Boolean,
  status: String,
});

const form = useForm({
  nip: '',
  password: '',
  remember: false,
});

const submit = () => {
  form.transform(data => ({
    ...data,
    remember: form.remember ? 'on' : '',
  })).post(route('login'), {
    onFinish: () => form.reset('password'),
    onError: (error) => {
      console.log(error.password);
      Swal.fire({
        icon: "error",
        title: error.nip || error.password,
        text: error.nip? 'Silakan hubungi administrator untuk didaftarkan' : '' || error.password? 'Masukan Kata Sandi Dengan Benar' : '',
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
  <div>

    <Head title="Log in" />
    <div class="login__background"></div>
    <div class="container panel__login">
      <div class="row justify-content-center h-100 align-items-center">
        <div class="col-10 col-sm-9 col-md-7 col-lg-5">
          <div class="card border-0 px-3" id="panel-login">
            <div class="card-header pt-4 ps-2 d-flex align-items-center">
              <img src="img/logo-pabar.png" alt="logo" height="75" />
              <div>
                <p class="m-0 logo-title">SIMPEG</p>
                <p class="m-0 logo-subtitle">Sistem Informasi Kepegawaian</p>
              </div>
            </div>
            <div class="card-body p-4">
              <div>
                <p class="m-0 mt-2 txt-login">Masuk</p>
                <p class="mt-0 mb-4 txt-desc">Silakan isi dengan data Anda yang terdaftar.</p>
              </div>
              <form @submit.prevent="submit">
                <div class="form-floating form-floating-custom mb-3">
                  <TextInput id="nip" v-model="form.nip" class="form-control form-control-custom" type="text" required
                    autofocus autocomplete="nip" placeholder="Masukan NIP" />
                  <InputLabel class="label_nip" for="nipInput" value="NIP" />
                  <div class="form-floating-icon">
                    <unicon name="users-alt" fill="var(--title-color)" width="20"></unicon>
                  </div>
                </div>
                <div class="form-floating form-floating-custom mb-3 auth-pass-inputgroup">
                  <TextInput id="passInput" v-model="form.password" class="form-control form-control-custom"
                    type="password" required autocomplete="password" placeholder="Masukan Kata Sandi" />
                  <InputLabel class="label_pass" for="passInput" value="Kata Sandi" />
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
                  <PrimaryButton class="btn btn-primary w-100 rounded-pill border-0 p-2" :disabled="form.processing"
                    id="myButton">Login</PrimaryButton>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
