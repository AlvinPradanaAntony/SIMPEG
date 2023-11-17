<script setup>
import { Head, Link, router } from '@inertiajs/vue3';
import NavLink from '@/Components/NavLink.vue';

defineProps({
  title: String,
  canLogin: Boolean,
});

const logout = () => {
  router.post(route('logout'));
};
</script>

<template>
  <div>
    <Head :title="title" />
    <nav class="navbar navbar-expand-lg bg-white shadowNavbar">
      <div class="container">
        <div class="header-logo">
          <Link :href="route('landingpage')" class="navbar-brand p-0">
          <img class="me-1" src="img/logo-pabar.png" width="46" height="46" alt="" />
          <span class="brand-text">
            Helpdesk Kepegawaian
            <small>Pemerintahan Provinsi Papua Barat</small>
          </span>
          </Link>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"> </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <nav-link :canLogin="canLogin" class="ms-auto mb-2 mb-lg-0" />
        </div>
      </div>
    </nav>
    <main>
      <slot />
    </main>
  </div>
</template>
