<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import { Modal } from "bootstrap/dist/js/bootstrap.bundle";
import ActionMessage from '@/Components/ActionMessage.vue';
import ActionSection from '@/Components/ActionSection.vue';
import DialogModal from '@/Components/DialogModal.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';


defineProps({
  sessions: Array,
});

const passwordInput = ref(null);

const form = useForm({
  password: '',
});

const confirmLogout = () => {
  setTimeout(() => passwordInput.value.focus(), 550);
};

const logoutOtherBrowserSessions = () => {
  form.delete(route('other-browser-sessions.destroy'), {
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
      Manajemen Sesi Browser
    </template>

    <template #description>
      Kelola dan keluar dari sesi aktif Anda di browser dan perangkat lain.
    </template>

    <template #content>
      <div class="small">
        Jika perlu, Anda dapat keluar dari semua sesi browser lainnya di semua perangkat Anda. Beberapa sesi terbaru Anda
        tercantum di bawah; namun, daftar ini mungkin tidak lengkap. Jika Anda merasa akun Anda telah disusupi, Anda juga
        harus memperbarui kata sandi Anda.
      </div>

      <!-- Other Browser Sessions -->
      <div v-if="sessions.length > 0" class="mt-4">
        <div v-for="(session, i) in sessions" :key="i" class="d-flex align-items-center mb-3">
          <div>
            <svg v-if="session.agent.is_desktop" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
              stroke-width="1.5" stroke="currentColor" width="32" height="32">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25" />
            </svg>

            <svg v-else xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24 " stroke-width="1.5"
              stroke="currentColor" width="32" height="32">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
            </svg>
          </div>

          <div class="ms-3">
            <div class="fw-bold small">
              {{ session.agent.platform ? session.agent.platform : 'Unknown' }} - {{ session.agent.browser ?
                session.agent.browser : 'Unknown' }}
            </div>

            <div>
              <div class="session_ip">
                {{ session.ip_address }},

                <span v-if="session.is_current_device" class="fw-semibold">This
                  device</span>
                <span v-else>Last active {{ session.last_active }}</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="d-flex align-items-center mt-4">
        <PrimaryButton @click="confirmLogout" class="btn btn-primary border-0 p-2 px-4 btn-sm btn-custom" data-bs-toggle="modal"
          data-bs-target="#modalLogoutSession">
          Keluarkan sesi akun disemua browser
        </PrimaryButton>

        <ActionMessage :on="form.recentlySuccessful" class="ms-3">
          Done.
        </ActionMessage>
      </div>

      <!-- Log Out Other Devices Confirmation Modal -->
      <DialogModal target="modalLogoutSession" :hasErrors="form.hasErrors">
        <template #title>
          Keluarkan sesi akun dari semua browser
        </template>

        <template #content>
          Silakan masukkan kata sandi Anda untuk mengonfirmasi bahwa Anda ingin keluar dari sesi browser Anda yang lain di
          semua perangkat Anda.

          <div class="mt-3">
            <TextInput ref="passwordInput" v-model="form.password" type="password" class="form-control"
              placeholder="Password" autocomplete="current-password" @keyup.enter="logoutOtherBrowserSessions" />

            <InputError :message="form.errors.password" class="mt-2" />
          </div>
        </template>

        <template #footer>
          <SecondaryButton @click="closeModal" data-bs-dismiss="modal">
            Batal
          </SecondaryButton>

          <PrimaryButton class="ms-3 btn btn-primary btn-custom btn-sm" :class="{ 'opacity-25': form.processing }"
            :disabled="form.processing" @click="logoutOtherBrowserSessions">
            <span v-if="form.processing" class="spinner-border spinner-border-sm mr-2" role="status"></span>
            Keluarkan sesi
          </PrimaryButton>
        </template>
      </DialogModal>
    </template>
  </ActionSection>
</template>
