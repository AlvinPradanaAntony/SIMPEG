<script setup>
import { Link } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import Footer from '@/Components/Footer.vue';
defineProps({
  canLogin: Boolean,
  faqs: Array,
});
</script>
<script>
import customScript from '../../../public/js/custom';
export default {
  mounted() {
    customScript();
    window.addEventListener('popstate', this.handlePopstate);

  },
  methods: {
    handlePopstate(event) {
      const title = `Helpdesk App`;
      this.$inertia.reload();
      document.title = title;
    },
  },
};
</script>
<template>
  <AppLayout :canLogin="canLogin" title="FAQ">
    <div class="search-banner has-bg">
      <div class="bg-cover" data-paroller="true" data-paroller-factor="0.5" data-paroller-factor-xs="0.01"></div>
      <div class="container">
        <h1 class="text-center">Hai, Ada yang bisa kami bantu?</h1>
        <div class="input-group">
          <input type="text" class="form-control form-control-lg" id="search_faq"
            placeholder="Cari informasi anda disini...." />
          <button type="submit" class="btn btn-lg" title="Search"><i class="ui uil-search"></i></button>
        </div>
      </div>
    </div>
    <div class="container py-5 faq-content">
      <div v-if="faqs && faqs.length > 0" class="row">
        <div class="col-12">
          <div class="accordion accordion-custom" id="accordionExample">
            <div class="accordion-item mb-3" v-for="faq in faqs" :key="faq.id">
              <h2 class="accordion-header" :id="'heading' + faq.id">
                <button class="accordion-button text-body fw-bold collapsed" type="button" data-bs-toggle="collapse"
                  :data-bs-target="'#collapse' + faq.id" aria-expanded="false" :aria-controls="'collapse' + faq.id">
                  <i class="uil uil-question-circle me-2"></i>
                  {{ faq.question }}
                </button>
              </h2>
              <div :id="'collapse' + faq.id" class="accordion-collapse collapse" :aria-labelledby="'heading' + faq.id"
                data-bs-parent="#accordionExample">
                <div class="accordion-body" v-html="faq.answer"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div v-else class="create-tiket pb-5 mb-5">
        <div class="justify-content-center text-center">
          <img src="img/abstract_question.svg" alt="" height="300">
          <h2>Ada pertanyaan lain ?</h2>
          <p>Anda dapat bertanya pertanyaan yang belum tersedia di FAQ dan meminta bantuan dengan tiket.</p>
          <Link href="/formticket" class="btn-create-ticket d-inline-block position-relative mt-3">Buat Tiket Baru
          </Link>
        </div>
      </div>
    </div>
    <Footer />
  </AppLayout>
</template>