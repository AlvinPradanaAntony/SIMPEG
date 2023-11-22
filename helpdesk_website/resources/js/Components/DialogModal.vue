<script setup>

defineProps({
  target: String,
});
</script>

<template>
  <div class="dialogModal"> 
  <div class="modal fade" :id="target" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header border-0 pb-2">
          <h1 class="modal-title fs-5" id="exampleModalLabel"><slot name="title" /></h1>
          <button type="button" class="btn border-0 rounded-circle bg-danger" data-bs-dismiss="modal" aria-label="Close">
            <unicon class="close" name="times" fill="white"/>
          </button>
        </div>
        <div class="modal-body small pt-1 pb-0">
          <slot name="content" />
        </div>
        <div class="modal-footer">
          <slot name="footer" />
        </div>
      </div>
    </div>
  </div>
</div>
</template>
