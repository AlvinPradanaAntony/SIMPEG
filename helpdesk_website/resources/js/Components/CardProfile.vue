<script setup>

defineProps({
  user: Object,
});
</script>

<template>
  <div>
    <div class="card">
      <div class="card-body p-0">
        <div class="background-cover">
          <img src="/img/bg-login.png" alt="...">
        </div>
        <div class="profile_image">
          <img :src="user.profile_photo_url" alt="" width="100" class="rounded-circle img-thumbnail" />
          <div class="py-3">
            <h5 class="mb-1 fw-bolder">{{ user.name }}</h5>
            <small>Administrator</small>
          </div>
        </div>
        <div class="p-3 text-center py-2 pb-4">
          <div class="row status-ticket">
            <div class="col border-end">
              <div class="p-1">
                <h5 class="mb-1 fw-bold">0</h5>
                <p class="mb-0">Tiket Terkirim</p>
              </div>
            </div>
            <div class="col border-end">
              <div class="p-1">
                <h5 class="mb-1 fw-bold">0</h5>
                <p class="mb-0">Tiket Terbalas</p>
              </div>
            </div>
            <div class="col">
              <div class="p-1">
                <h5 class="mb-1 fw-bold">0</h5>
                <p class="mb-0">Tiket Terbalas</p>
              </div>
            </div>
          </div>
          <button class="btn btn-primary w-100 rounded-pill border-0 p-2 mt-3">Edit Foto Profil</button>
        </div>
      </div>
    </div>
  </div>
</template>