<script setup>
import { Link } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import Footer from '@/Components/Footer.vue';
import axios from 'axios';
import { ref, onMounted, onBeforeUnmount } from 'vue';
import customScript from '../../../public/js/custom';

defineProps({
  canLogin: Boolean,
});

const faqs = ref([]);

onMounted(async () => {
  const response = await axios.get('/faqs');
  faqs.value = response.data.data;
});

const handlePopstate = (event) => {
  const title = `Helpdesk App`;
  $inertia.reload();
  document.title = title;
};

customScript();

window.addEventListener('popstate', handlePopstate);
</script>
<!-- <script>
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
</script> -->
<template>
  <AppLayout :canLogin="canLogin" title="FAQ">
    <div class="search-banner has-bg">
      <div class="bg-cover" data-paroller="true" data-paroller-factor="0.5" data-paroller-factor-xs="0.01"></div>
      <div class="container">
        <h1 class="text-center">Hai, Ada yang bisa kami bantu?</h1>
        <div class="input-group">
          <input type="text" class="form-control form-control-lg" id="search_faq" placeholder="Cari informasi anda disini...." />
          <button type="submit" class="btn btn-lg" title="Search"><i class="ui uil-search"></i></button>
        </div>
      </div>
    </div>
    <div class="container py-5 faq-content">
      <div class="row">
        <div class="col-12" v-for="faq in faqs" :key="faq.id">
          <div class="accordion accordion-custom" id="accordionExample">
            <div class="accordion-item mb-3">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button text-body fw-bold collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                  <i class="uil uil-question-circle me-2"></i>
                  {{ faq.question }}
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <strong>Jawaban : </strong> {{ faq.answer }}
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