<script setup>
defineProps({
    type: {
        type: String,
        default: 'button',
    },
});
</script>

<template>
    <button :type="type" class="btn btn-outline-danger btn-custom btn-sm">
        <slot />
    </button>
</template>
