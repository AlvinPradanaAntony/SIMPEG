<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
defineProps({
  canLogin: Boolean,
});

</script>
<template>
  <AppLayout :canLogin="canLogin" title="Form Profile">
    <div class="profile_page ">
      <div class="container pt-4">
        <div class="row">
          <div class="col-12">
            <div class="row">
              <div class="col-lg-4 mb-3 mb-lg-0">
                <div class="card">
                  <div class="card-body p-0">
                    <div class="background-cover">
                      <img src="/img/bg-login.png" alt="...">
                    </div>
                    <div class="profile_image">
                      <img :src="$page.props.auth.user.profile_photo_url" alt="" width="100"
                        class="rounded-circle img-thumbnail" />
                      <div class="py-3">
                        <h5 class="mb-1 fw-bolder">{{ $page.props.auth.user.name }}</h5>
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
              <div class="col-lg-8 detail_profile">
                <div class="card">
                  <div class="card-body px-4">
                    <h4 class="card-title mt-2 mb-4">Data Utama</h4>
                    <form class="mb-4">
                      <div class="row">
                        <div class="col-lg-6 mb-3">
                          <label for="inputnip" class="form-label small">NIP</label>
                          <input type="text" class="form-control" id="inputnip">
                        </div>
                        <div class="col-lg-6 mb-3">
                          <label for="inputname" class="form-label small">Nama</label>
                          <input type="text" class="form-control" id="inputname">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6 mb-3">
                          <label for="inputBirthPlace" class="form-label small">Tempat Lahir</label>
                          <input type="text" class="form-control" id="inputBirthPlace">
                        </div>
                        <div class="col-lg-6 mb-3">
                          <label for="inputDate" class="form-label small">Tanggal Lahir</label>
                          <input type="date" class="form-control" id="inputDate">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6 mb-3">
                          <label for="inputGender" class="form-label small">Jenis Kelamin</label>
                          <select class="form-select" aria-label="Default select example" id="inputGender">
                            <option value="" selected class="hidden"></option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                          </select>
                        </div>
                      </div>
                    </form>

                    <h4 class="card-title mt-2 mb-4">Data Pendukung</h4>
                    <form>
                      <div class="row">
                        <div class="col-lg-6 mb-3">
                          <label for="inputemail" class="form-label small">Email</label>
                          <input type="email" class="form-control" id="inputemail">
                        </div>
                        <div class="col-lg-6 mb-3">
                          <label for="inputaddress" class="form-label small">Alamat</label>
                          <textarea type="" class="form-control" id="inputaddress"></textarea>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6 mb-3">
                          <label for="inputnumber" class="form-label small">Nomer Telepon</label>
                          <input type="text" class="form-control" id="inputnumber">
                        </div>
                        <div class="col-lg-6 mb-3">
                          <label for="inputRelegion" class="form-label small">Agama</label>
                          <select class="form-select" aria-label="Default select example" id="inputRelegion">
                            <option value="" selected class="hidden"></option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Budha">Budha</option>
                          </select>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </AppLayout>
</template>