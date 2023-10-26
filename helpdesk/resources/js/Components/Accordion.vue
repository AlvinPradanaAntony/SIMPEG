<script setup>
import { Head, Link } from "@inertiajs/vue3";

defineProps({
    canLogin: Boolean,
});
</script>

<template>
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
            <div class="accordion">
                <div class="accordion-item" v-for="(item, index) in faqItems" :key="index">
                <h2 class="accordion-header" :id="'heading' + index">
                    <button class="accordion-button bg-body-tertiary text-body fw-bold collapsed" data-bs-target="collapse" type="button" @click="toggleAccordion(index)" :class="{'collapsed':expandedAccordion !== index}" aria-controls="'collapsibleContent' + index" aria-expanded="expandedAccordion === index" >
                    <i class="uil uil-question-circle me-2" :class="{ 'open': expandedAccordion === index }"></i>{{ item.question }}
                    </button>
                </h2>
                <div id="'collapsibleContent' + index" class="accordion-collapse collapse" :class="{ 'show': expandedAccordion === index }" aria-labelledby="'heading' + index">
                    <div class="accordion-body">
                    <strong>Jawaban:</strong> {{ item.answer }}
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
  data() {
    return {
      faqItems: [
        {
          question: "Bagaimana cara saya mengajukan izin tahunan?",
          answer: "Untuk mengajukan izin tahunan, silakan akses portal kepegawaian kami dan masuk ke akun Anda. Di sana, Anda akan menemukan opsi 'Pengajuan Izin' di mana Anda dapat mengisi formulir pengajuan izin dengan rincian tanggal, alasan, dan durasi izin. Pengajuan Anda akan diproses oleh tim HR dan Anda akan menerima pemberitahuan lebih lanjut.",
        },
        {
          question: "Coba?",
          answer: "Untuk mengajukan izin tahunan, silakan akses portal kepegawaian kami dan masuk ke akun Anda. Di sana, Anda akan menemukan opsi 'Pengajuan Izin' di mana Anda dapat mengisi formulir pengajuan izin dengan rincian tanggal, alasan, dan durasi izin. Pengajuan Anda akan diproses oleh tim HR dan Anda akan menerima pemberitahuan lebih lanjut. Untuk mengajukan izin tahunan, silakan akses portal kepegawaian kami dan masuk ke akun Anda. Di sana, Anda akan menemukan opsi 'Pengajuan Izin' di mana Anda dapat mengisi formulir pengajuan izin dengan rincian tanggal, alasan, dan durasi izin. Pengajuan Anda akan diproses oleh tim HR dan Anda akan menerima pemberitahuan lebih lanjut.",
        },
        {
          question: "Coba lagi?",
          answer: "Untuk mengajukan izin tahunan, silakan akses portal kepegawaian kami dan masuk ke akun Anda. Di sana, Anda akan menemukan opsi 'Pengajuan Izin' di mana Anda dapat mengisi formulir pengajuan izin dengan rincian tanggal, alasan, dan durasi izin. Pengajuan Anda akan diproses oleh tim HR dan Anda akan menerima pemberitahuan lebih lanjut.",
        },
        // Tambahkan FAQ items lainnya di sini
      ],
      expandedAccordion: null,
    };
  },
  methods: {
    toggleAccordion(index) {
      if (this.expandedAccordion === index) {
        this.expandedAccordion = null;
      } else {
        this.expandedAccordion = index;
      }
    },
  },
};
</script>
