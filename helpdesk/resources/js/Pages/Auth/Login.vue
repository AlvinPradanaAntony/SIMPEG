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
        <AuthenticationCard class="authentication-card">
            <!-- <template #logo>
                <AuthenticationCardLogo />
            </template> -->

            <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                {{ status }}
            </div>

            <form @submit.prevent="submit">
                <div>
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
                </div>

                <div class="mt-4">
                    <InputLabel for="password" value="Password" />
                    <TextInput
                        id="password"
                        v-model="form.password"
                        type="password"
                        class="mt-1 block w-full"
                        required
                        autocomplete="current-password"
                    />
                    <InputError class="mt-2" :message="form.errors.password" />
                </div>

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
                </div>

                <div class="flex items-center justify-end mt-4">
                    <!-- <Link v-if="canResetPassword" :href="route('password.request')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Forgot your password?
                </Link> -->

                    <PrimaryButton
                        class="ml-4"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Log in
                    </PrimaryButton>
                </div>
            </form>
        </AuthenticationCard>
    </body>
</template>

<style>
.background-container {
    /* background-image: url("../../../images/background.jpg"); Ganti 'path/to/your/image.jpg' dengan path ke gambar Anda */
    background-size: cover; /* Mengatur ukuran gambar agar menutupi seluruh latar belakang */
    background-position: center center; /* Mengatur posisi gambar */
    background-repeat: no-repeat; /* Mencegah gambar diulang */
    width: 100%; /* Lebar elemen */
    height: 1000px; /* Tinggi elemen */
    position: relative;
    /* z-index: -1; */
}

</style>
