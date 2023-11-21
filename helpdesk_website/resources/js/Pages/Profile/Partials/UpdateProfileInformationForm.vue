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
  phone_number: props.user.phone,
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
        <CardProfile :user="user"/>
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
                <input type="text" class="form-control" id="inputname" v-model="form.name" required autocomplete="name">
                <InputError :message="form.errors.name" class="mt-2" />
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 mb-3">
                <InputLabel for="inputBirthPlace" class="form-label small" value="Tempat Lahir" />
                <input type="text" class="form-control" id="inputBirthPlace" v-model="form.birth_place" required
                  autocomplete="place">
                <InputError :message="form.errors.birth_place" class="mt-2" />
              </div>
              <div class="col-lg-6 mb-3">
                <label for="inputDate" class="form-label small">Tanggal Lahir</label>
                <input type="date" class="form-control" id="inputDate" v-model="form.birth_date" required
                  autocomplete="date">
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
                    Your email address is unverified.

                  </p>
                  <Link :href="route('verification.send')" method="post" as="button"
                    class="btn btn-primary btn-sm btn-custom" @click.prevent="sendEmailVerification">
                  Verifikasi Sekarang
                  </Link>
                  <div v-show="verificationLinkSent" class="mt-2 font-medium text-sm text-green-600">
                    A new verification link has been sent to your email address.
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
                <TextInput type="text" class="form-control" id="inputnumber" v-model="form.phone_number" required
                  autocomplete="phonenumber" />
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
