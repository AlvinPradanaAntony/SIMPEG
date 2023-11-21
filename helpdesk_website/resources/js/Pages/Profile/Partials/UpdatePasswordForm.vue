<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import ActionMessage from '@/Components/ActionMessage.vue';
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const passwordInput = ref(null);
const currentPasswordInput = ref(null);

const form = useForm({
  current_password: '',
  password: '',
  password_confirmation: '',
});

const updatePassword = () => {
  form.put(route('user-password.update'), {
    errorBag: 'updatePassword',
    preserveScroll: true,
    onSuccess: () => form.reset(),
    onError: () => {
      if (form.errors.password) {
        form.reset('password', 'password_confirmation');
        passwordInput.value.focus();
      }

      if (form.errors.current_password) {
        form.reset('current_password');
        currentPasswordInput.value.focus();
      }
    },
  });
};
</script>

<template>
  <FormSection @submitted="updatePassword">
    <template #title>
      Ubah Kata Sandi
    </template>

    <template #description>
      Pastikan akun Anda menggunakan kata sandi yang panjang dan acak agar tetap aman.
    </template>

    <template #form>
      <div class="p-4">
        <div class="row">
          <div class="col-12 col-lg-6">
            <div class="mb-3">
              <InputLabel for="current_password" class="form-label small" value="Current Password" />
              <TextInput id="current_password" class="form-control" ref="currentPasswordInput"
                v-model="form.current_password" type="password" autocomplete="current-password" />
              <InputError :message="form.errors.current_password" class="mt-2" />
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 col-lg-6">
            <div class="mb-3">
              <InputLabel for="password" class="form-label small" value="New Password" />
              <TextInput id="password" class="form-control" ref="passwordInput" v-model="form.password" type="password"
                autocomplete="new-password" />
              <InputError :message="form.errors.password" class="mt-2" />
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 col-lg-6">
            <div class="mb-3">
              <InputLabel for="password_confirmation" class="form-label small" value="Confirm Password" />
              <TextInput id="password_confirmation" class="form-control" v-model="form.password_confirmation"
                type="password" autocomplete="new-password" />
              <InputError :message="form.errors.password_confirmation" class="mt-2" />
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
</template>
