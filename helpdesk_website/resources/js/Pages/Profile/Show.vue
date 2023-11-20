<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
defineProps({
    canLogin: Boolean,
});

</script>
<template>
    <AppLayout :canLogin="canLogin" title="Form Profile">
        <div class="container">
            
        </div>
    </AppLayout>
</template>