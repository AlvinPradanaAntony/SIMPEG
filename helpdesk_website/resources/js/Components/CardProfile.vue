<template>
  <div>
    <div class="card">
      <div class="card-body p-0">
        <div class="background-cover">
          <img src="/img/bg-login.png" alt="cover">
        </div>
        <slot name="photoPreview"/>
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
         <slot name="btnAction"/>
        </div>
      </div>
    </div>
  </div>
</template>