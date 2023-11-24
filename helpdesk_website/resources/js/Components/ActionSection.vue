<script setup>
import SectionTitle from './SectionTitle.vue';
</script>

<template>
  <div>
    <div class="row">
      <div class="col-lg-4 mb-3 mb-lg-0">
        <SectionTitle>
          <template #title>
            <slot name="title" />
          </template>
          <template #description>
            <slot name="description" />
          </template>
        </SectionTitle>
      </div>
      <div class="col-lg-8">
        <div class="card detail_profile">
          <div class="card-body p-4">
            <slot name="content" />
          </div>
        </div>
    </div>
  </div>
</div>
<!-- <div class="md:grid md:grid-cols-3 md:gap-6">
        <SectionTitle>
            <template #title>
                <slot name="title" />
            </template>
            <template #description>
                <slot name="description" />
            </template>
        </SectionTitle>

        <div class="mt-5 md:mt-0 md:col-span-2">
            <div class="px-4 py-5 sm:p-6 bg-white shadow sm:rounded-lg">
                  <slot name="content" />
              </div>
          </div>
      </div> -->
</template>
