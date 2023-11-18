<script setup>

defineProps({
  icon: String,
  title: String,
  data: String,
  id: String,
});
</script>

<template>
  <div class="card status_dashboard" :id=id>
    <div class="card-body p-3">
      <div class="d-flex align-items-center">
        <div class="card-icon text-white">
          <unicon :name="icon" />
        </div>
        <div class=" ms-auto card-detail">
          <p class="mb-0 card-detail_text">{{ title }}</p>
          <h4 class="my-1 card-detail_data">{{ data }}</h4>
        </div>
      </div>
    </div>
    <div class="abstract1"></div>
    <div class="abstract2"></div>
  </div>
</template>