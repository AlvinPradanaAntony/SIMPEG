<script setup>
import { computed, useSlots } from 'vue';
import SectionTitle from './SectionTitle.vue';

defineEmits(['submitted']);

const hasActions = computed(() => !!useSlots().actions);
const hasCardProfile = computed(() => !!useSlots().cardProfile);
</script>

<template>
  <div>
    <div class="row">
      <div class="col-lg-4 mb-3 mb-lg-0">
        <div v-if="hasCardProfile">
          <slot name="cardProfile" />
        </div>
        <div v-else>
          <SectionTitle>
            <template #title>
              <slot name="title" />
            </template>
            <template #description>
              <slot name="description" />
            </template>
          </SectionTitle>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card detail_profile">
          <div class="card-body p-0">
            <form @submit.prevent="$emit('submitted')">
              <slot name="form" />
              <div v-if="hasActions" class="text-end footer-form-action p-3">
                <slot name="actions" />
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>

  </div>
</template>
