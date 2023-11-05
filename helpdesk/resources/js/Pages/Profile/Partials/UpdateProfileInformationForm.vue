<script setup>
import { ref } from 'vue';
import { Link, router, useForm } from '@inertiajs/vue3';
import ActionMessage from '@/Components/ActionMessage.vue';
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import DangerButton from '@/Components/DangerButton.vue';
import TextInput from '@/Components/TextInput.vue';

const props = defineProps({
    user: Object,
});

const form = useForm({
    _method: 'PUT',
    name: props.user.name,
    gender: props.user.gender,
    nip: props.user.nip,
    birth_place: props.user.birth_place,
    birth_date: props.user.birth_date,
    email: props.user.email,
    address: props.user.address,
    phone: props.user.phone,
    religion: props.user.religion,
    photo: null,
});

const verificationLinkSent = ref(null);
const photoPreview = ref(null);
const photoInput = ref(null);

const updateProfileInformation = () => {
    if (photoInput.value) {
        form.photo = photoInput.value.files[0];
    }

    form.post(route('user-profile-information.update'), {
        errorBag: 'updateProfileInformation',
        preserveScroll: true,
        onSuccess: () => clearPhotoFileInput(),
    });
};

const sendEmailVerification = () => {
    verificationLinkSent.value = true;
};

const selectNewPhoto = () => {
    photoInput.value.click();
};

const updatePhotoPreview = () => {
    const photo = photoInput.value.files[0];

    if (! photo) return;

    const reader = new FileReader();

    reader.onload = (e) => {
        photoPreview.value = e.target.result;
    };

    reader.readAsDataURL(photo);
};

const deletePhoto = () => {
    router.delete(route('current-user-photo.destroy'), {
        preserveScroll: true,
        onSuccess: () => {
            photoPreview.value = null;
            clearPhotoFileInput();
        },
    });
};

const clearPhotoFileInput = () => {
    if (photoInput.value?.value) {
        photoInput.value.value = null;
    }
};
</script>

<template>
    <FormSection @submitted="updateProfileInformation">
        <template #title>
            <span class="mt-1 block w-full p-2">{{ form.name }}</span>
        </template>

        <template #description>
            Perbarui informasi profil dan alamat email akun Anda.
        </template>


        <template #form>
            <!-- Profile Photo -->
            <div v-if="$page.props.jetstream.managesProfilePhotos" class="col-span-6 sm:col-span-4">
                <!-- v-if="$page.props.jetstream.managesProfilePhotos" -->
                <!-- Profile Photo File Input -->
                <input
                    ref="photoInput"
                    type="file"
                    class="hidden"
                    name="photo"
                    @change="updatePhotoPreview"
                >

                <!-- Current Profile Photo -->
                <div v-show="! photoPreview" class="mt-2">
                {{ console.log("Profile Photo URL: ", user.profile_photo_url) }}
                    <img :src="user.profile_photo_url" :alt="user.name" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div v-show="photoPreview" class="mt-2">
                    <span
                        class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                        :style="'background-image: url(\'' + photoPreview + '\');'"
                    />
                </div>

                <PrimaryButton class="mt-2 mr-2" type="button" @click.prevent="selectNewPhoto">
                    Pilih Foto Baru
                </PrimaryButton>

                <DangerButton
                    v-if="user.profile_photo_path"
                    type="button"
                    class="mt-2"
                    @click.prevent="deletePhoto"
                >
                    Hapus Foto
                </DangerButton>

                <InputError :message="form.errors.photo" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-6">
                <h2>Data Utama</h2>
            </div>
            <!-- Name -->
            <div class="col-span-6 sm:col-span-3">
                <InputLabel for="name" value="Nama" />
                <TextInput
                    id="name"
                    v-model="form.name"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autocomplete="name"
                />
                <InputError :message="form.errors.name" class="mt-2" />
            </div>

            <!-- Gender -->
            <div class="col-span-6 sm:col-span-3">
                <InputLabel for="gender" value="Jenis Kelamin" />
                <select id="gender" v-model="form.gender" class=" mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
                <InputError :message="form.errors.gender" class="mt-2" />
            </div>

            <!-- NIP -->
            <div class="col-span-6 sm:col-span-3">
                <InputLabel for="nip" value="NIP" />
                <TextInput
                    id="nip"
                    v-model="form.nip"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autocomplete="nip"
                />
                <InputError :message="form.errors.nip" class="mt-2" />
            </div>

            <!-- Birth Place -->
            <div class="col-span-6 sm:col-span-3">
                <InputLabel for="birth_place" value="Tempat Lahir" />
                <TextInput
                    id="birth_place"
                    v-model="form.birth_place"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autocomplete="birth_place"
                />
                <InputError :message="form.errors.birth_place" class="mt-2" />
            </div>

            <!-- Birth Date -->
            <div class="col-span-6 sm:col-span-3">
                <InputLabel for="birth_date" value="Tanggal Lahir" />
                <TextInput
                    id="birth_date"
                    v-model="form.birth_date"
                    type="date"
                    class="mt-1 block w-full"
                    required
                    autocomplete="birth_date"
                />
                <InputError :message="form.errors.birth_date" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-6">
                <h2>Data Pendukung</h2>
            </div>
            
            <!-- Email -->
            <div class="col-span-6 sm:col-span-3">
                <InputLabel for="email" value="Email" />
                <TextInput
                    id="email"
                    v-model="form.email"
                    type="email"
                    class="mt-1 block w-full"
                    required
                    autocomplete="username"
                />
                <InputError :message="form.errors.email" class="mt-2" />

                <div v-if="$page.props.jetstream.hasEmailVerification && user.email_verified_at === null">
                    <p class="text-sm mt-2">
                        Alamat email Anda belum terverifikasi.
                        <Link
                            :href="route('verification.send')"
                            method="post"
                            as="button"
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            @click.prevent="sendEmailVerification"
                        >
                            Klik di sini untuk mengirim ulang email verifikasi.
                        </Link>
                    </p>

                    <div v-show="verificationLinkSent" class="mt-2 font-medium text-sm text-green-600">
                        A new verification link has been sent to your email address.
                    </div>
                </div>
            </div>

            <!-- Address -->
            <div class="col-span-6 sm:col-span-3">
                <InputLabel for="address" value="Alamat" />
                <TextInput
                    id="address"
                    v-model="form.address"
                    type="text"
                    class="mt-1 block w-full text-left-top h-20"
                    required
                    autocomplete="address"
                />
                <InputError :message="form.errors.address" class="mt-2" />
            </div>

            <!-- Phone -->
            <div class="col-span-6 sm:col-span-3">
                <InputLabel for="phone" value="Nomor Telepon" />
                <TextInput
                    id="phone"
                    v-model="form.phone"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autocomplete="phone"
                />
                <InputError :message="form.errors.phone" class="mt-2" />
            </div>

            <!-- Religion -->
            <div class="col-span-6 sm:col-span-3">
                <InputLabel for="religion" value="Agama" />
                <TextInput
                    id="religion"
                    v-model="form.religion"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autocomplete="religion"
                />
                <InputError :message="form.errors.religion" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <ActionMessage :on="form.recentlySuccessful" class="mr-3">
                Data berhasil disimpan.
            </ActionMessage>

            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Simpan
            </PrimaryButton>
        </template>
    </FormSection>
</template>