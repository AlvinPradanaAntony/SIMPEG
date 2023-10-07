<!-- resources/js/components/FAQAccordion.vue -->

<template>
  <div>
    <h1>Frequently Asked Questions</h1>
    <div>
      <div v-for="faq in faqs" :key="faq.id" class="card">
        <div class="card-header">
          <h5 class="mb-0">
            <button class="btn btn-link" @click="toggleAccordion(faq.id)">
              {{ faq.question }}
            </button>
          </h5>
        </div>
        <div v-if="faq.open" class="card-body">
          {{ faq.answer }}
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      faqs: [],
    };
  },
  methods: {
    toggleAccordion(id) {
      // Logika untuk membuka atau menutup accordion
      this.faqs.forEach((faq) => {
        if (faq.id === id) {
          faq.open = !faq.open;
        } else {
          faq.open = false;
        }
      });
    },
    fetchFAQs() {
      // Mengambil data FAQ dari server (menggunakan axios misalnya)
      axios.get('/api/faqs').then((response) => {
        this.faqs = response.data.faqs.map((faq) => ({
          ...faq,
          open: false,
        }));
      });
    },
  },
  mounted() {
    this.fetchFAQs();
  },
};
</script>
