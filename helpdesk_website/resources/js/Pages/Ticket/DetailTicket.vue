<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
defineProps({
  canLogin: Boolean,
});

</script>
<template>
  <AppLayout :canLogin="canLogin" title="Detail Ticket">
    <div class="container align-items-start my-4 mb-5">
      <div class="row align-items-start">
        <div class="col-md-4 mb-3">
          <div class="card-info p-3 mb-3">
            <div class="card-body">
              <div class="mb-3 row">
                <h5 class="col-md-6 col-form-label" for="id">Nomor Tiket :</h5>
                <div class="col-md-6">
                  <span id="id">TK0123</span>
                </div>
                <h5 class="col-md-6 col-form-label" for="department">Bidang :</h5>
                <div class="col-md-6">
                  <span id="department">Sekretariat</span>
                </div>
                <h5 class="col-md-6 col-form-label" for="category">Kategori :</h5>
                <div class="col-md-6">
                  <span id="category">Kesekretariatan</span>
                </div>
                <h5 class="col-md-6 col-form-label" for="date">Tanggal Dibuat :</h5>
                <div class="col-md-6">
                  <span id="date">2 November 2022</span>
                </div>
                <h5 class="col-md-6 col-form-label" for="status">Status :</h5>
                <div class="col-md-6">
                  <span class="status fw-bold" id="status">Terbalas</span>
                </div>
                <div class="col-12 d-flex align-items-center justify-content-center mt-2">
                  <button type="button" class="btn-closed-ticket fw-bold" data-bs-toggle="modal" data-bs-target="#closeTiket">Tutup Tiket</button>
                </div>
              </div>
            </div>
          </div>
          <!-- Modal -->
          <div class="modal fade" id="closeTiket" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-body d-flex flex-column align-items-center text-dark">
                  <h5 class="text-dark">Anda yakin ingin menutup tiket?</h5>
                  <p class="text-justify pt-3" style="text-align: center">Setelah ditutup tiket tidak bisa digunakan lagi, anda harus membuat tiket baru jika membutuhkan bantuan</p>
                </div>
                <div class="footer d-flex justify-content-center mb-3">
                  <button type="button" class="btn-closed mx-5" data-bs-dismiss="modal">Batal</button>
                  <button type="button" class="btn-continue mx-5" data-bs-toggle="modal" data-bs-target="#reviewTiket">Tutup Tiket</button>
                </div>
              </div>
            </div>
          </div>
          <!-- Modal -->
          <div class="modal fade" id="reviewTiket" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-body d-flex flex-column align-items-center">
                  <h5 class="text-dark">Berikan nilai anda terhadap pelayanan kami</h5>
                  <div class="rating">
                    <i class="uis uis-star" data-rating="1.0"></i>
                    <i class="uis uis-star" data-rating="2.0"></i>
                    <i class="uis uis-star" data-rating="3.0"></i>
                    <i class="uis uis-star" data-rating="4.0"></i>
                    <i class="uis uis-star" data-rating="5.0"></i>
                  </div>
                  <p>Rating: <span id="selected-rating">0</span></p>
                  <h5 class="text-dark">Berikan Ulasan</h5>
                  <textarea class="review form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                  <button type="button" class="btn-send fw-bold my-3" data-bs-toggle="modal" data-bs-target="#reviewTiket">Kirim</button>
                </div>
              </div>
            </div>
          </div>
          <div class="card card-info">
            <div class="card-header d-flex p-3 align-items-center text-white">Dokumen</div>
            <div class="card-body">
              <!-- <h5 class="card-title mb-3">Files</h5> -->
              <div class="card mb-1 shadow-none border">
                <div class="p-2">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <div class="avatar-sm">
                        <span class="avatar-title bg-danger rounded"> .PDF </span>
                      </div>
                    </div>
                    <div class="col ps-0">
                      <a href="#" class="text-muted fw-bold">Laporan.pdf</a>
                      <p class="mb-0">2.3 MB</p>
                    </div>
                    <div class="col-auto">
                      <!-- Button -->
                      <a href="#" class="btn btn-link btn-lg text-muted">
                        <i class="uil uil-import"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mb-1 shadow-none border">
                <div class="p-2">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <img src="assets/img/schedule.png" class="avatar-sm rounded" alt="file-image" />
                    </div>
                    <div class="col ps-0">
                      <a href="#" class="text-muted fw-bold">Jadwal.jpg</a>
                      <p class="mb-0">3.25 MB</p>
                    </div>
                    <div class="col-auto">
                      <!-- Button -->
                      <a href="#" class="btn btn-link btn-lg text-muted">
                        <i class="uil uil-import"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mb-0 shadow-none border">
                <div class="p-2">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <div class="avatar-sm">
                        <span class="avatar-title bg-danger text-light rounded"> .PDF </span>
                      </div>
                    </div>
                    <div class="col ps-0">
                      <a href="#" class="text-muted fw-bold">Surat Tugas.pdf</a>
                      <p class="mb-0">7.05 MB</p>
                    </div>
                    <div class="col-auto">
                      <!-- Button -->
                      <a href="#" class="btn btn-link btn-lg text-muted">
                        <i class="uil uil-import"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="card card-info">
            <div class="card-header d-flex p-3 align-items-center text-white">Detail Tiket</div>
            <div class="card-body">
              <div class="chat-conversation" data-simplebar>
                <ul class="list-unstyled mb-0">
                  <li class="right">
                    <div class="conversation-list">
                      <div class="ctext-wrap">
                        <div class="ctext-wrap-content">
                          <h5 class="font-size-14 conversation-name"><a href="#" class="text-dark">Pegawai 1</a> <span class="d-inline-block font-size-12 text-muted ms-2">10:02</span></h5>
                          <p class="mb-0">saya butuh bantuan untuk membuat surat tugas. Bagaimana caranya?</p>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="conversation-list">
                      <div class="ctext-wrap">
                        <div class="ctext-wrap-content">
                          <h5 class="font-size-14 conversation-name"><a href="#" class="text-dark">Bidang Sekretariat</a> <span class="d-inline-block font-size-12 text-muted ms-2">10:04</span></h5>
                          <p class="mb-0">Tentu, saya akan membantu Anda dengan pembuatan surat tugas</p>
                        </div>
                      </div>
                      <div class="ctext-wrap">
                        <div class="ctext-wrap-content">
                          <h5 class="font-size-14 conversation-name"><a href="#" class="text-dark">Bidang Sekretariat</a> <span class="d-inline-block font-size-12 text-muted ms-2">10:04</span></h5>
                          <p class="mb-0">[isi pesan]</p>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="right">
                    <div class="conversation-list">
                      <div class="ctext-wrap">
                        <div class="ctext-wrap-content">
                          <h5 class="font-size-14 conversation-name"><a href="#" class="text-dark">Bidang Sekretariat</a> <span class="d-inline-block font-size-12 text-muted ms-2">10:06</span></h5>
                          <p class="mb-0">Terima kasih banyak. Draft surat tugasnya sudah bagus. Saya tidak punya perubahan. Silakan kirimkan surat tugas resmi.</p>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="conversation-list">
                      <div class="ctext-wrap">
                        <div class="ctext-wrap-content">
                          <h5 class="font-size-14 conversation-name"><a href="#" class="text-dark">Bidang Sekretariat</a> <span class="d-inline-block font-size-12 text-muted ms-2">10:08</span></h5>
                          <p class="mb-0">Baik, surat tugas resmi akan segera dikirimkan kepada Anda. Terima kasih atas kerjasama Anda.</p>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="conversation-list">
                      <div class="ctext-wrap">
                        <div class="ctext-wrap-content">
                          <h5 class="font-size-14 conversation-name"><a href="#" class="text-dark">Bidang Sekretariat</a> <span class="d-inline-block font-size-12 text-muted ms-2">10:09</span></h5>
                          <div class="card mt-2 mb-1 shadow-none border text-start">
                            <div class="p-2">
                              <div class="row align-items-center">
                                <div class="col-auto">
                                  <div class="avatar-sm">
                                    <span class="avatar-title rounded bg-danger"> .PDF </span>
                                  </div>
                                </div>
                                <div class="col ps-0">
                                  <a href="#" class="text-muted fw-bold">Surat Tugas.pdf</a>
                                  <p class="mb-0">2.3 MB</p>
                                </div>
                                <div class="col-auto">
                                  <!-- Button -->
                                  <a href="#" class="btn btn-link btn-lg text-muted">
                                    <i class="uil uil-import"></i>
                                  </a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
              <div class="p-3 chat-input-section pb-0">
                <div class="row">
                  <div class="col-auto pe-0">
                    <div class="file btn btn-primary position-relative overflow-hidden">
                      <label for="input-files">
                        <i class="uil uil-paperclip icon-uploud"></i>
                        <small class="d-none">Upload</small>
                      </label>
                      <input type="file" name="file" class="input-files" id="input-files" />
                    </div>
                  </div>
                  <div class="col">
                    <input type="text" class="form-control chat-input px-3" placeholder="Masukan Pertanyaan Anda" />
                  </div>
                  <div class="col-auto ps-0">
                    <button type="submit" class="btn btn-primary chat-send w-md waves-effect waves-light"><span class="d-none d-sm-inline-block me-2">Kirim</span> <i class="uil uil-message"></i></button>
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