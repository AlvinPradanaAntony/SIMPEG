<script setup>
import { onMounted, ref } from 'vue';
defineProps({
  modelValue: String,
});

defineEmits(['update:modelValue']);

const input = ref(null);

onMounted(() => {
  if (input.value.hasAttribute('autofocus')) {
    input.value.focus();
  }
});

defineExpose({ focus: () => input.value.focus() });
</script>
<template>
  <div class="input-group">
    <input ref="input" type="text" class="form-control form-control-lg" :value="modelValue"
      @input="$emit('update:modelValue', $event.target.value)" id="search_faq"
      placeholder="Cari informasi anda disini...." />
    <unicon name="search" class="icon_search" fill="var(--text-color)"></unicon>
  </div>
</template>

