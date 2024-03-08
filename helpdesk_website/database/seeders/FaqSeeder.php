<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Faq::create([
            'question' => 'Bagaimana cara saya mengajukan izin tahunan?',
            'answer' => '<p>Untuk mengajukan izin tahunan, silakan akses portal kepegawaian kami dan masuk ke akun Anda. Di sana, Anda akan menemukan opsi &quot;Pengajuan Izin&quot; di mana Anda dapat mengisi formulir pengajuan izin dengan rincian tanggal, alasan, dan durasi izin. Pengajuan Anda akan diproses oleh tim HR dan Anda akan menerima pemberitahuan lebih lanjut.</p>',
        ]);
        Faq::create([
            'question' => 'Bagaimana cara melihat slip gaji saya?',
            'answer' => '<p>Untuk melihat slip gaji Anda, Anda dapat masuk ke portal kepegawaian kami. Di sana, Anda akan menemukan opsi &quot;Slip Gaji&quot; atau &quot;Penggajian&quot; yang akan memberi Anda akses ke slip gaji Anda. Anda dapat mengunduh dan mencetak slip gaji sesuai kebutuhan.</p>',
        ]);
        Faq::create([
            'question' => 'Bagaimana cara membuat tiket?',
            'answer' => '<p><strong>Cara Membuat Tiket:</strong>&nbsp;Untuk membuat tiket baru, ikuti langkah-langkah berikut:</p><ol><li>Login ke akun Anda.</li><li>Pilih opsi &#39;Buat Tiket&#39; pada halaman utama.</li><li>Isi formulir tiket dengan informasi yang relevan, seperti judul, deskripsi, dan kategori.</li><li>Klik &#39;Kirim&#39; untuk mengirimkan tiket Anda.</li><li>Anda akan menerima konfirmasi dan nomor referensi tiket. Kami akan segera meninjau dan menanggapi tiket Anda.</li></ol><p>Kami selalu siap membantu Anda, jadi jangan ragu untuk membuat tiket untuk pertanyaan atau masalah apa pun yang Anda hadapi.</p>',
        ]);
        Faq::create([
            'question' => 'Bagaimana cara melihat tiket yang sudah dibuat?',
            'answer' => '<p><strong>Cara Melihat Tiket yang Sudah Dibuat:</strong>&nbsp;Untuk melihat tiket yang telah Anda buat, ikuti langkah-langkah berikut:</p><ol><li>Login ke akun Anda.</li><li>Pilih opsi &#39;Tiket Saya&#39; atau &#39;Riwayat Tiket&#39; pada halaman utama.</li><li>Anda akan melihat daftar tiket yang telah Anda buat, termasuk status dan nomor referensi tiket.</li><li>Klik pada tiket yang ingin Anda lihat untuk melihat detailnya.</li></ol><p>Di halaman tiket, Anda dapat melihat status, tanggapan, dan riwayat percakapan terkait tiket tersebut. Jika Anda memiliki pertanyaan lebih lanjut, jangan ragu untuk menghubungi kami melalui tiket tersebut.</p>',
        ]);
        Faq::create([
            'question' => 'Bagaimana cara mengubah profil?',
            'answer' => '<p><strong>Cara Mengubah Profil:</strong>&nbsp;Untuk memperbarui informasi profil Anda, ikuti langkah-langkah berikut:</p><ol><li>Login ke akun Anda.</li><li>Pilih opsi &#39;Profil Saya&#39; atau &#39;Pengaturan Profil&#39; pada halaman utama.</li><li>Pada halaman profil, Anda dapat mengedit informasi seperti foto profil, nama, alamat email, atau informasi lainnya sesuai kebutuhan.</li><li>Klik &#39;Simpan&#39; atau &#39;Perbarui Profil&#39; setelah Anda selesai mengubah informasi.</li></ol><p>Pastikan untuk memverifikasi perubahan yang Anda buat. Profil Anda sekarang telah diperbarui. Jika Anda mengalami masalah atau memiliki pertanyaan lebih lanjut, jangan ragu untuk menghubungi kami.</p>',
        ]);
        Faq::create([
            'question' => 'Apa yang harus saya lakukan jika saya lupa kata sandi?',
            'answer' => '<p><strong>Jika Anda Lupa Kata Sandi:</strong>&nbsp;Jika Anda lupa kata sandi akun Anda, Anda dapat mengikuti langkah-langkah berikut untuk meresetnya:</p><ol><li>Pada halaman login, klik opsi &#39;Lupa Kata Sandi&#39; atau &#39;Lupa Sandi?&#39;.</li><li>Anda akan diminta untuk memasukkan alamat email yang terkait dengan akun Anda.</li><li>Klik &#39;Kirim&#39; atau &#39;Reset Kata Sandi&#39;.</li><li>Anda akan menerima email dengan tautan reset kata sandi. Klik tautan tersebut.</li><li>Ikuti petunjuk untuk membuat kata sandi yang baru.</li><li>Login ke akun Anda dengan kata sandi yang baru.</li></ol><p>Jika Anda mengalami kesulitan dalam proses ini, jangan ragu untuk menghubungi tim dukungan kami untuk bantuan lebih lanjut.</p>',
        ]);
        Faq::create([
            'question' => 'Bagaimana cara menghubungi tim dukungan?',
            'answer' => '<p><strong>Cara Menghubungi Tim Dukungan:</strong>&nbsp;Jika Anda memerlukan bantuan atau memiliki pertanyaan, Anda dapat menghubungi tim dukungan kami dengan cara berikut:</p><ol><li>Login ke akun Anda (jika Anda memiliki akun).</li><li>Pilih opsi &#39;Hubungi Kami&#39; atau &#39;Layanan Dukungan&#39; pada halaman utama.</li><li>Anda dapat mengirimkan pesan atau membuat tiket dukungan baru untuk pertanyaan Anda.</li><li>Jika Anda tidak memiliki akun, Anda juga dapat menghubungi kami melalui alamat email dukungan atau nomor telepon yang tercantum di situs web.</li></ol><p>Tim dukungan kami siap membantu Anda dengan masalah atau pertanyaan apa pun yang Anda hadapi. Jangan ragu untuk menghubungi kami.</p>',
        ]);
        Faq::create([
            'question' => 'Bagaimana proses kenaikan pangkat berlangsung?',
            'answer' => '<p><strong>Proses Kenaikan Pangkat:</strong>&nbsp;Proses kenaikan pangkat dijelaskan di bawah ini:</p><ol><li>Pegawai harus memenuhi syarat-syarat yang ditentukan untuk kenaikan pangkat, seperti masa kerja dan penilaian kinerja yang baik.</li><li>Pegawai mengajukan permohonan kenaikan pangkat sesuai dengan prosedur yang berlaku, biasanya melalui sistem helpdesk atau formulir khusus.</li><li>Permohonan akan diproses dan dievaluasi oleh departemen kepegawaian atau unit yang berwenang.</li><li>Jika disetujui, pegawai akan menerima pemberitahuan resmi dan kenaikan pangkat akan diberlakukan sesuai dengan jadwal yang ditentukan.</li><li>Jika permohonan ditolak, pegawai akan menerima pemberitahuan dan dapat meminta klarifikasi atau mengikuti proses perbaikan kinerja jika diperlukan.</li></ol><p>Pastikan untuk selalu memeriksa pedoman dan kebijakan yang berlaku untuk mengetahui persyaratan kenaikan pangkat yang spesifik di organisasi Anda.</p>',
        ]);
    }
}
