<script setup>
defineProps({
    type: {
        type: String,
        default: 'button',
    },
});
</script>

<template>
    <button :type="type" class="inline-flex items-center justify-center px-4 py-2 bg-yellow-500 border border-transparent rounded-lg font-semibold text-xs text-white tracking-widest hover:bg-yellow-600 active:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 transition ease-in-out duration-150">
        <slot />
    </button>
</template>
