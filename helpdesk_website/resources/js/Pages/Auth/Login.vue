<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
// import AuthenticationCard from '@/Components/AuthenticationCard.vue';
// import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
// import Checkbox from '@/Components/Checkbox.vue';
// import InputError from '@/Components/InputError.vue';
// import InputLabel from '@/Components/InputLabel.vue';
// import PrimaryButton from '@/Components/PrimaryButton.vue';
// import TextInput from '@/Components/TextInput.vue';
import Swal from 'sweetalert2'


defineProps({
  canResetPassword: Boolean,
  status: String,
});

const form = useForm({
  email: '',
  password: '',
  remember: false,
});

const submit = () => {
  form.transform(data => ({
    ...data,
    remember: form.remember ? 'on' : '',
  })).post(route('login'), {
    onFinish: () => form.reset('password'),
  });
};
</script>
<script>
// Import fungsi dari custom2.js
import customScript from "../../../../public/js/custom"; // Sesuaikan path sesuai dengan struktur proyek Anda

export default {
  data() {
    return {
      iconName: 'eye-slash'
    };
  },
  methods: {
    toggleIcon() {
      this.iconName = (this.iconName === 'eye-slash') ? 'eye' : 'eye-slash';
    },
    login(event) {
      event.preventDefault();

      Swal.fire({
        title: 'Berhasil!',
        text: 'Anda berhasil login',
        icon: 'success',
        confirmButtonText: 'OK'
      })
    }
  },
  mounted() {
    // Panggil fungsi setelah komponen dimuat
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
              <form onsubmit="return buttonSubmit()">
                <div class="form-floating form-floating-custom mb-3">
                  <input type="text" class="form-control form-control-custom" id="nipInput" placeholder="Masukan NIP" />
                  <label class="label_nip" for="nipInput">NIP</label>
                  <div class="form-floating-icon">
                    <!-- <i class="uil uil-users-alt"></i> -->
                    <unicon name="users-alt" fill="var(--title-color)" width="20"></unicon>
                  </div>
                </div>
                <div class="form-floating form-floating-custom mb-3 auth-pass-inputgroup">
                  <input type="password" class="form-control form-control-custom" id="passInput"
                    placeholder="Masukan Kata Sandi" />
                  <label class="label_pass" for="passInput">Kata Sandi</label>
                  <div class="form-floating-icon">
                    <!-- <i class="uil uil-padlock"></i> -->
                    <unicon name="padlock" fill="var(--title-color)" width="20"></unicon>
                  </div>
                  <span class="eye hidden" id="spanEye">
                    <i class="show-hide" toggle="#passInput" id="iconShowHide" @click="toggleIcon">
                      <unicon :name="iconName" fill="var(--title-color)" width="20"></unicon>
                    </i>
                  </span>
                </div>
                <div class="mt-4 mb-3">
                  <button class="btn btn-primary w-100 rounded-pill py-2 border-0" id="myButton" type="submit" @click="login">Login</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
