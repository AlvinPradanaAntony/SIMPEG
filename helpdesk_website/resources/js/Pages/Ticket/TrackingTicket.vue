<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
defineProps({
  canLogin: Boolean,
});

</script>
<template>
    <AppLayout :canLogin="canLogin" title="Tracking Ticket">
    <div class="container my-5">
      <div class="card shadow-md">
        <div class="card-body">
          <h5>Tracking Ticket</h5>
        </div>
      </div>
    </div>
  </AppLayout>
</template>