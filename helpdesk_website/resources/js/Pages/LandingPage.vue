<script setup>
import { Link } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import Footer from '@/Components/Footer.vue';
defineProps({
  canLogin: Boolean,
});
</script>
<script>
import customScript from '../../../public/js/custom';
export default {
  mounted() {
    customScript();
  }
};
</script>
<template>
  <AppLayout :canLogin="canLogin" title="FAQ">
    <div class="search-banner has-bg">
      <div class="bg-cover" data-paroller="true" data-paroller-factor="0.5" data-paroller-factor-xs="0.01"></div>
      <div class="container">
        <h1 class="text-center">Hai, Ada yang bisa kami bantu?</h1>
        <div class="input-group">
          <input type="text" class="form-control form-control-lg" placeholder="Cari informasi anda disini...." />
          <button type="submit" class="btn btn-lg" title="Search"><i class="ui uil-search"></i></button>
        </div>
      </div>
    </div>
    <div class="container py-5 faq-content">
      <div class="row">
        <div class="col-12">
          <div class="accordion accordion-custom" id="accordionExample">
            <div class="accordion-item mb-3">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button text-body fw-bold collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne"><i
                    class="uil uil-question-circle me-2"></i>Bagaimana cara saya mengajukan izin tahunan?</button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <strong>Jawaban : </strong> Untuk mengajukan izin tahunan, silakan akses portal kepegawaian kami dan
                  masuk ke akun Anda. Di sana, Anda akan menemukan opsi "Pengajuan Izin" di mana Anda dapat mengisi
                  formulir pengajuan izin dengan rincian tanggal, alasan, dan durasi izin. Pengajuan Anda akan
                  diproses oleh tim HR dan Anda akan menerima pemberitahuan lebih lanjut.
                </div>
              </div>
            </div>
            <div class="accordion-item mb-3">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button text-body fw-bold collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><i
                    class="uil uil-question-circle me-2"></i>Bagaimana cara melihat slip gaji saya?</button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">Untuk melihat slip gaji Anda, Anda dapat masuk ke portal kepegawaian kami. Di
                  sana, Anda akan menemukan opsi "Slip Gaji" atau "Penggajian" yang akan memberi Anda akses ke slip gaji
                  Anda. Anda dapat mengunduh dan mencetak slip gaji sesuai kebutuhan.</div>
              </div>
            </div>
            <div class="accordion-item mb-3">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button text-body fw-bold collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"><i
                    class="uil uil-question-circle me-2"></i> Bagaimana cara membuat tiket?</button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <strong>Cara Membuat Tiket:</strong> Untuk membuat tiket baru, ikuti langkah-langkah berikut:
                  <ol>
                    <li>Login ke akun Anda.</li>
                    <li>Pilih opsi 'Buat Tiket' pada halaman utama.</li>
                    <li>Isi formulir tiket dengan informasi yang relevan, seperti judul, deskripsi, dan kategori.</li>
                    <li>Klik 'Kirim' untuk mengirimkan tiket Anda.</li>
                    <li>Anda akan menerima konfirmasi dan nomor referensi tiket. Kami akan segera meninjau dan menanggapi
                      tiket Anda.</li>
                  </ol>
                  Kami selalu siap membantu Anda, jadi jangan ragu untuk membuat tiket untuk pertanyaan atau masalah apa
                  pun yang Anda hadapi.
                </div>
              </div>
            </div>
            <div class="accordion-item mb-3">
              <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button text-body fw-bold collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour"><i
                    class="uil uil-question-circle me-2"></i> Bagaimana cara melihat tiket yang sudah dibuat?</button>
              </h2>
              <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <strong>Cara Melihat Tiket yang Sudah Dibuat:</strong> Untuk melihat tiket yang telah Anda buat, ikuti
                  langkah-langkah berikut:
                  <ol>
                    <li>Login ke akun Anda.</li>
                    <li>Pilih opsi 'Tiket Saya' atau 'Riwayat Tiket' pada halaman utama.</li>
                    <li>Anda akan melihat daftar tiket yang telah Anda buat, termasuk status dan nomor referensi tiket.
                    </li>
                    <li>Klik pada tiket yang ingin Anda lihat untuk melihat detailnya.</li>
                  </ol>
                  Di halaman tiket, Anda dapat melihat status, tanggapan, dan riwayat percakapan terkait tiket tersebut.
                  Jika Anda memiliki pertanyaan lebih lanjut, jangan ragu untuk menghubungi kami melalui tiket tersebut.
                </div>
              </div>
            </div>
            <div class="accordion-item mb-3">
              <h2 class="accordion-header" id="headingFive">
                <button class="accordion-button text-body fw-bold collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive"><i
                    class="uil uil-question-circle me-2"></i> Bagaimana cara mengubah profil?</button>
              </h2>
              <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <strong>Cara Mengubah Profil:</strong> Untuk memperbarui informasi profil Anda, ikuti langkah-langkah
                  berikut:
                  <ol>
                    <li>Login ke akun Anda.</li>
                    <li>Pilih opsi 'Profil Saya' atau 'Pengaturan Profil' pada halaman utama.</li>
                    <li>Pada halaman profil, Anda dapat mengedit informasi seperti foto profil, nama, alamat email, atau
                      informasi lainnya sesuai kebutuhan.</li>
                    <li>Klik 'Simpan' atau 'Perbarui Profil' setelah Anda selesai mengubah informasi.</li>
                  </ol>
                  Pastikan untuk memverifikasi perubahan yang Anda buat. Profil Anda sekarang telah diperbarui. Jika Anda
                  mengalami masalah atau memiliki pertanyaan lebih lanjut, jangan ragu untuk menghubungi kami.
                </div>
              </div>
            </div>
            <div class="accordion-item mb-3">
              <h2 class="accordion-header" id="headingSix">
                <button class="accordion-button text-body fw-bold collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix"><i
                    class="uil uil-question-circle me-2"></i> Apa yang harus saya lakukan jika saya lupa kata
                  sandi?</button>
              </h2>
              <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <strong>Jika Anda Lupa Kata Sandi:</strong> Jika Anda lupa kata sandi akun Anda, Anda dapat mengikuti
                  langkah-langkah berikut untuk meresetnya:
                  <ol>
                    <li>Pada halaman login, klik opsi 'Lupa Kata Sandi' atau 'Lupa Sandi?'.</li>
                    <li>Anda akan diminta untuk memasukkan alamat email yang terkait dengan akun Anda.</li>
                    <li>Klik 'Kirim' atau 'Reset Kata Sandi'.</li>
                    <li>Anda akan menerima email dengan tautan reset kata sandi. Klik tautan tersebut.</li>
                    <li>Ikuti petunjuk untuk membuat kata sandi yang baru.</li>
                    <li>Login ke akun Anda dengan kata sandi yang baru.</li>
                  </ol>
                  Jika Anda mengalami kesulitan dalam proses ini, jangan ragu untuk menghubungi tim dukungan kami untuk
                  bantuan lebih lanjut.
                </div>
              </div>
            </div>
            <div class="accordion-item mb-3">
              <h2 class="accordion-header" id="headingSeven">
                <button class="accordion-button text-body fw-bold collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven"><i
                    class="uil uil-question-circle me-2"></i> Bagaimana cara menghubungi tim dukungan?</button>
              </h2>
              <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <strong>Cara Menghubungi Tim Dukungan:</strong> Jika Anda memerlukan bantuan atau memiliki pertanyaan,
                  Anda dapat menghubungi tim dukungan kami dengan cara berikut:
                  <ol>
                    <li>Login ke akun Anda (jika Anda memiliki akun).</li>
                    <li>Pilih opsi 'Hubungi Kami' atau 'Layanan Dukungan' pada halaman utama.</li>
                    <li>Anda dapat mengirimkan pesan atau membuat tiket dukungan baru untuk pertanyaan Anda.</li>
                    <li>Jika Anda tidak memiliki akun, Anda juga dapat menghubungi kami melalui alamat email dukungan atau
                      nomor telepon yang tercantum di situs web.</li>
                  </ol>
                  Tim dukungan kami siap membantu Anda dengan masalah atau pertanyaan apa pun yang Anda hadapi. Jangan
                  ragu untuk menghubungi kami.
                </div>
              </div>
            </div>
            <div class="accordion-item mb-3">
              <h2 class="accordion-header" id="headingEight">
                <button class="accordion-button text-body fw-bold collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight"><i
                    class="uil uil-question-circle me-2"></i> Bagaimana proses kenaikan pangkat berlangsung?</button>
              </h2>
              <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <strong>Proses Kenaikan Pangkat:</strong> Proses kenaikan pangkat dijelaskan di bawah ini:
                  <ol>
                    <li>Pegawai harus memenuhi syarat-syarat yang ditentukan untuk kenaikan pangkat, seperti masa kerja
                      dan penilaian kinerja yang baik.</li>
                    <li>Pegawai mengajukan permohonan kenaikan pangkat sesuai dengan prosedur yang berlaku, biasanya
                      melalui sistem helpdesk atau formulir khusus.</li>
                    <li>Permohonan akan diproses dan dievaluasi oleh departemen kepegawaian atau unit yang berwenang.</li>
                    <li>Jika disetujui, pegawai akan menerima pemberitahuan resmi dan kenaikan pangkat akan diberlakukan
                      sesuai dengan jadwal yang ditentukan.</li>
                    <li>Jika permohonan ditolak, pegawai akan menerima pemberitahuan dan dapat meminta klarifikasi atau
                      mengikuti proses perbaikan kinerja jika diperlukan.</li>
                  </ol>
                  Pastikan untuk selalu memeriksa pedoman dan kebijakan yang berlaku untuk mengetahui persyaratan kenaikan
                  pangkat yang spesifik di organisasi Anda.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="create-tiket pb-5 mb-5">
      <div class="container">
        <div class="justify-content-center text-center">
          <img src="img/abstract_question.svg" alt="" height="300">
          <h2>Ada pertanyaan lain ?</h2>
          <p>Anda dapat bertanya pertanyaan yang belum tersedia di FAQ dan meminta bantuan dengan tiket.</p>
          <Link href="/formticket" class="btn-create-ticket d-inline-block position-relative mt-3">Buat Tiket Baru</Link>
        </div>
      </div>
    </div>
    <Footer />
  </AppLayout>
</template>