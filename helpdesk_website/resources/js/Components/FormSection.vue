<script setup>
import { computed, useSlots } from 'vue';
import SectionTitle from './SectionTitle.vue';

defineEmits(['submitted']);

const hasActions = computed(() => !!useSlots().actions);
</script>

<template>
  <div>
    
    <form @submit.prevent="$emit('submitted')">
      <slot name="form" />
      <div v-if="hasActions"
        class="flex items-center justify-end px-4 py-3 bg-gray-50 text-end sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
        <slot name="actions" />
      </div>
    </form>

  </div>
</template>
