<script setup>
import { onMounted, ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import { Modal } from "bootstrap/dist/js/bootstrap.bundle";
import ActionSection from '@/Components/ActionSection.vue';
import DangerButton from '@/Components/DangerButton.vue';
import DialogModal from '@/Components/DialogModal.vue';
import InputError from '@/Components/InputError.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';


const passwordInput = ref(null);

const form = useForm({
  password: '',
});

const confirmUserDeletion = () => {
  setTimeout(() => passwordInput.value.focus(), 550);
};

const deleteUser = () => {
  form.delete(route('current-user.destroy'), {
    preserveScroll: true,
    onSuccess: () => closeModal(),
    onError: () => passwordInput.value.focus(),
    onFinish: () => form.reset(),
  });
};

const closeModal = () => {
  form.reset();
  const modalBootstrap = Modal.getOrCreateInstance('#modalLogoutSession')
  modalBootstrap.hide()
};
</script>

<template>
  <ActionSection>
    <template #title>
      Hapus Akun
    </template>

    <template #description>
      Hapus akun Anda secara permanen
    </template>

    <template #content>
      <div class="small">
        Setelah akun Anda dihapus, semua sumber daya dan datanya akan dihapus secara permanen. Sebelum menghapus
        akun Anda, harap unduh data atau informasi apa pun yang ingin Anda simpan.
      </div>

      <div class="mt-4">
        <DangerButton @click="confirmUserDeletion" class="btn btn-danger border-0 p-2 px-4 btn-sm btn-custom" data-bs-toggle="modal"
          data-bs-target="#modalDeleteUser">
          Hapus Akun
        </DangerButton>
      </div>

      <!-- Delete Account Confirmation Modal -->
      <DialogModal target="modalDeleteUser" :hasErrors="form.hasErrors">
        <template #title>
          Hapus Akun
        </template>

        <template #content>
          Apakah Anda yakin ingin menghapus akun Anda? Setelah akun Anda dihapus, semua sumber daya dan datanya
          akan dihapus secara permanen. Silakan masukkan kata sandi Anda untuk mengonfirmasi bahwa Anda ingin
          menghapus akun Anda secara permanen.

          <div class="mt-4">
            <TextInput ref="passwordInput" v-model="form.password" type="password" class="form-control" autofocus
              placeholder="Password" autocomplete="current-password" @keyup.enter="deleteUser" />
            <InputError :message="form.errors.password" class="mt-2" />
          </div>
        </template>

        <template #footer>
          <SecondaryButton @click="closeModal" data-bs-dismiss="modal">
            Batal
          </SecondaryButton>

          <DangerButton class="ms-3 btn btn-primary btn-custom btn-sm" :class="{ 'opacity-25': form.processing }"
            :disabled="form.processing" @click="deleteUser">
            <span v-if="form.processing" class="spinner-border spinner-border-sm mr-2" role="status"></span>
            Hapus
          </DangerButton>
        </template>
      </DialogModal>
    </template>
  </ActionSection>
</template>
