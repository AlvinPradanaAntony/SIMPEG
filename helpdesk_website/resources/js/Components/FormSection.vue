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
      <div v-if="hasActions" class="text-end footer-form-action p-3">
        <slot name="actions" />
      </div>
    </form>
  </div>
</template>
