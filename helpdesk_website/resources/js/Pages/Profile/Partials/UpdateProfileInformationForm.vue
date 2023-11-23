<script setup>
import { ref } from 'vue';
import { Link, router, useForm } from '@inertiajs/vue3';
import ActionMessage from '@/Components/ActionMessage.vue';
import CardProfile from '@/Components/CardProfile.vue';
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import Swal from 'sweetalert2'

const props = defineProps({
  user: Object,
});

const form = useForm({
  _method: 'PUT',
  nip: props.user.nip,
  name: props.user.name,
  birth_place: props.user.birth_place,
  birth_date: props.user.birth_date,
  gender: props.user.gender,
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
    onError: (error) => {
      Swal.fire({
        icon: "error",
        title: error.photo? 'Kesalahan pada foto' : 'Error' ,
        html: error.photo ? 'Ukuran gambar terlalu besar. Gambar tidak boleh lebih besar dari <b>1MB</b>.' : 'Error',
      });
    },
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

  if (!photo) return;

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
  <div>
    <FormSection @submitted="updateProfileInformation">
      <template #cardProfile>
        <CardProfile>
          <template #photoPreview>
            <div class="profile_image">
              <input id="photo" ref="photoInput" type="file" class="hidden" @change="updatePhotoPreview">
              <div v-show="!photoPreview">
                <img :src="user.profile_photo_url" :alt="user.name" width="100" height="100" class="rounded-circle img-thumbnail d-inline-block" />
              </div>
              <div v-show="photoPreview">
                <div class="d-inline-block img-thumbnail rounded-circle new_profile_image">
                  <span class="custom d-block rounded-circle"
                    :style="'background-image: url(\'' + photoPreview + '\');'" />
                </div>
              </div>

              <div class="py-3 pb-1">
                <h5 class="mb-0 fw-bolder">{{ user.name }}</h5>
                <small>Administrator</small>
              </div>
            </div>
          </template>
          <template #btnAction>
            <PrimaryButton class="btn btn-primary rounded-pill border-0 p-2 px-3 mt-3 me-2" type="button"
              @click.prevent="selectNewPhoto">
              Edit Foto Profil
            </PrimaryButton>

            <SecondaryButton v-if="user.profile_photo_path" type="button" class="rounded-pill p-2 px-3 mt-3" @click.prevent="deletePhoto">
              Remove Photo
            </SecondaryButton>
            <!-- <button class="btn btn-primary w-100 rounded-pill border-0 p-2 mt-3">Edit Foto Profil</button> -->
          </template>
        </CardProfile>
      </template>
      <template #form>
        <div class="p-4">
          <div>
            <h4 class="card-title mt-2 mb-4">Data Utama</h4>
            <div class="row">
              <div class="col-lg-6 mb-3">
                <InputLabel for="inputnip" class="form-label small" value="NIP" />
                <TextInput type="text" class="form-control" id="inputnip" v-model="form.nip" required
                  autocomplete="nip" />
                <InputError :message="form.errors.nip" class="mt-2" />
              </div>
              <div class="col-lg-6 mb-3">
                <InputLabel for="inputname" class="form-label small" value="Nama" />
                <TextInput type="text" class="form-control" id="inputname" v-model="form.name" required
                  autocomplete="name" />
                <InputError :message="form.errors.name" class="mt-2" />
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 mb-3">
                <InputLabel for="inputBirthPlace" class="form-label small" value="Tempat Lahir" />
                <TextInput type="text" class="form-control" id="inputBirthPlace" v-model="form.birth_place" required
                  autocomplete="place" />
                <InputError :message="form.errors.birth_place" class="mt-2" />
              </div>
              <div class="col-lg-6 mb-3">
                <InputLabel for="inputDate" class="form-label small" value="Tanggal Lahir" />
                <TextInput type="date" class="form-control" id="inputDate" v-model="form.birth_date" required
                  autocomplete="date" />
                <InputError :message="form.errors.birth_date" class="mt-2" />
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 mb-3">
                <InputLabel for="inputGender" class="form-label small" value="Tempat Lahir" />
                <select class="form-select" aria-label="Default select example" id="inputGender" v-model="form.gender"
                  required autocomplete="gender">
                  <option value="" selected class="hidden"></option>
                  <option value="Laki-laki">Laki-laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
              </div>
            </div>
          </div>

          <div class="mt-4">
            <h4 class="card-title mt-2 mb-4">Data Pendukung</h4>
            <div class="row">
              <div class="col-lg-6 mb-3">
                <InputLabel for="inputemail" class="form-label small" value="Email" />
                <TextInput type="email" class="form-control" id="inputemail" v-model="form.email" required
                  autocomplete="username" />
                <InputError :message="form.errors.email" class="mt-2" />
                <div v-if="$page.props.jetstream.hasEmailVerification && user.email_verified_at === null">
                  <p class="small mt-2 mb-1 text-danger">
                    Alamat email Anda belum diverifikasi.
                  </p>
                  <Link :href="route('verification.send')" method="post" as="button"
                    class="btn btn-primary btn-sm btn-custom" @click.prevent="sendEmailVerification">
                  Verifikasi Sekarang
                  </Link>
                  <div v-show="verificationLinkSent" class="mt-2 small text-success">
                    Link verifikasi baru telah dikirimkan ke alamat email Anda
                  </div>
                </div>
              </div>
              <div class="col-lg-6 mb-3">
                <InputLabel for="inputaddress" class="form-label small" value="Alamat" />
                <textarea class="form-control" id="inputaddress" v-model="form.address" required
                  autocomplete="address"></textarea>
                <InputError :message="form.errors.address" class="mt-2" />
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 mb-3">
                <InputLabel for="inputnumber" class="form-label small" value="Nomer HP" />
                <TextInput type="text" class="form-control" id="inputnumber" v-model="form.phone" required
                  autocomplete="phonenumber" />
                <InputError :message="form.errors.phone" class="mt-2" />
              </div>
              <div class="col-lg-6 mb-3">
                <InputLabel for="inputRelegion" class="form-label small" value="Agama" />
                <select class="form-select" aria-label="Default select example" id="inputRelegion" v-model="form.religion"
                  required autocomplete="religion">
                  <option value="" selected class="hidden"></option>
                  <option value="Islam">Islam</option>
                  <option value="Kristen">Kristen</option>
                  <option value="Katolik">Katolik</option>
                  <option value="Hindu">Hindu</option>
                  <option value="Budha">Budha</option>
                </select>
              </div>
            </div>
          </div>
        </div>

      </template>
      <template #actions>
        <ActionMessage :on="form.recentlySuccessful" class="me-3">
          Saved.
        </ActionMessage>
        <PrimaryButton class="btn btn-primary border-0 p-2 px-4 btn-sm btn-custom"
          :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
          Save
        </PrimaryButton>
      </template>
    </FormSection>
  </div>
</template>
