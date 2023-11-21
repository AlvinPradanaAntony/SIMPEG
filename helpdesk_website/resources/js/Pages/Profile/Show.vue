<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import DeleteUserForm from '@/Pages/Profile/Partials/DeleteUserForm.vue';
import LogoutOtherBrowserSessionsForm from '@/Pages/Profile/Partials/LogoutOtherBrowserSessionsForm.vue';
import CardProfile from '@/Components/CardProfile.vue';
import UpdatePasswordForm from '@/Pages/Profile/Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from '@/Pages/Profile/Partials/UpdateProfileInformationForm.vue';
import SectionBorder from '@/Components/SectionBorder.vue';
defineProps({
  canLogin: Boolean,
  confirmsTwoFactorAuthentication: Boolean,
  sessions: Array,
});

</script>
<template>
  <AppLayout :canLogin="canLogin" title="Form Profile">
    <div class="profile_page py-4">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <UpdateProfileInformationForm :user="$page.props.auth.user" />
            <SectionBorder class="py-5"/>
          </div>
          <div class="col-12">
            <UpdatePasswordForm class="mt-10 sm:mt-0" />
            <SectionBorder class="py-5"/>
          </div>
          <div class="col-12">
            <LogoutOtherBrowserSessionsForm :sessions="sessions" class="mt-10 sm:mt-0" />
            <SectionBorder class="py-5"/>
          </div>
          <div class="col-12 pb-5">
            <DeleteUserForm />
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>