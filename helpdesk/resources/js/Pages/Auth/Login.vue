<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import AuthenticationCard from "@/Components/AuthenticationCard.vue";
import AuthenticationCardLogo from "@/Components/AuthenticationCardLogo.vue";
import BannerVue from "@/Components/Banner.vue";
import Checkbox from "@/Components/Checkbox.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import("./../../../assets/css/style.css");
import("./../../../assets/js/custom.js");

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    nip: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.transform((data) => ({
        ...data,
        remember: form.remember ? "on" : "",
    })).post(route("login"), {
        onFinish: () => {
            form.reset("password");
            console.log("Login berhasil!");
        },
        onError: (errors) => {
            if (errors.nip) {
                console.error("Terjadi kesalahan pada NIP:", errors.nip[0]);
            } else {
                console.error("Login Gagal: ", errors);
            }
        },
    });
};
</script>

<template>
    <Head title="Login" />
    <body class="font-sans antialiased">
        <div class="login__background"></div>
        <div class="container panel__login">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-10 col-sm-9 col-md-7 col-lg-5">
                    <div class="card border-0 px-3" id="panel-login">
                        <div class="card-header pt-4 ps-2 d-flex align-items-center">
                            <img src="./../../../assets/images/logo.png" alt="" width="50" />
                                <div>
                                <p class="m-0 logo-title">SIMPEG</p>
                                <p class="m-0 logo-subtitle">Sistem Informasi Kepegawaian</p>
                                </div>
                        </div>
                        <div class="card-body p-4">
                            <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                            {{ status }}
                        </div>

                        <div>
                            <p class="m-0 mt-2 txt-login">Masuk</p>
                            <p class="mt-0 mb-4 txt-desc">Silakan isi dengan data Anda yang terdaftar.</p>
                        </div>
                        <form @submit.prevent="submit">
                            <div class="form-floating form-floating-custom mb-3">
                                <TextInput v-model="form.nip" type="text" class="form-control form-control-custom" required autofocus autocomplete="nip" id="nip" placeholder="Masukan NIP" />
                                <InputLabel class="label_nip" for="nip" value="NIP"></InputLabel>
                                <InputError class="mt-2" :message="form.errors.nip"/>
                                <div class="form-floating-icon">
                                    <i class="uil uil-users-alt"></i>
                                </div>
                            </div>
                            <div class="form-floating form-floating-custom mb-3 auth-pass-inputgroup">
                                <TextInput v-model="form.password" type="password" class="form-control form-control-custom" required autocomplete="current-password" id="password" placeholder="Masukan Kata Sandi" />
                                <InputLabel class="label_password" for="password" value="Kata Sandi"></InputLabel>
                                <InputError class="mt-2" :message="form.errors.password" />
                                <div class="form-floating-icon">
                                    <i class="uil uil-padlock"></i>
                                </div>
                                <span class="eye hidden" id="spanEye">
                                    <i class="uil uil-eye-slash show-hide" toggle="#passInput" id="iconShowHide"></i>
                                </span>
                            </div>
                            <!-- <div>
                                <InputLabel for="nip" value="NIP" />
                                <TextInput
                                    id="nip"
                                    v-model="form.nip"
                                    type="text"
                                    class="mt-1 block w-full"
                                    required
                                    autofocus
                                    autocomplete="nip"
                                />
                                <InputError class="mt-2" :message="form.errors.nip" />
                            </div> -->
                            <!-- <div class="mt-4">
                                <InputLabel for="password" value="Password" />
                                <TextInput id="password" v-model="form.password" type="password" class="mt-1 block w-full" required autocomplete="current-password"/>
                                <InputError class="mt-2" :message="form.errors.password" />
                            </div> -->
            <!-- 
                            <div class="block mt-4">
                                <label class="flex items-center">
                                    <Checkbox
                                        v-model:checked="form.remember"
                                        name="remember"
                                    />
                                    <span class="ml-2 text-sm text-gray-600"
                                        >Remember me</span
                                    >
                                </label>
                            </div> -->

                            <div class="flex items-center justify-end">
                                <!-- <Link v-if="canResetPassword" :href="route('password.request')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Forgot your password?
                            </Link> -->

                                <PrimaryButton class="btn btn-primary w-100 rounded-pill border-0 mt-2 mb-3" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">Login</PrimaryButton>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</template>