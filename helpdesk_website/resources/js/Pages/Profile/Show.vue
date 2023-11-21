<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import CardProfile from '@/Components/CardProfile.vue';
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
            <div class="row">
              <div class="col-lg-4 mb-3 mb-lg-0">
                <CardProfile :user="$page.props.auth.user"/>
              </div>
              <div class="col-lg-8">
                <UpdateProfileInformationForm :user="$page.props.auth.user" />

              </div>
            </div>
          </div>
        
          <SectionBorder class="py-5"/>
        
        </div>
      </div>
    </div>
  </AppLayout>
</template>