<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import { ref, onMounted, onBeforeUnmount } from 'vue';
import axios from 'axios';
defineProps({
  canLogin: Boolean,
});

const form = useForm({
    id: '',
    // ticket_id: '',
    question: '',
    // answer: '',
    file: '',
    user_id_employee: '',
    user_id_department: '',
    subject: '',
    category_id: '',
    status_id: '',
    review_id: '',
    created_at: '',
    // updated_at: '',
});

const submit = () => {
    form.category_id = selectedCategory;
    
    form.post(route('tickets.store'), {
        onFinish: () => {
            form.reset('id', 'question', 'file', 'user_id_employee', 'user_id_department', 'subject', 'category_id', 'status_id', 'review_id', 'created_at');
        },
    });
};

const categories = ref([]);
const selectedCategory = ref(null);
const currentTime = ref(new Date());
let intervalId = null;

onBeforeUnmount(() => {
  clearInterval(intervalId);
});

onMounted(async () => {
  updateCurrentTime();
  intervalId = setInterval(() => {
    updateCurrentTime();
  }, 1000);

  const response = await axios.get('/categories');
  categories.value = response.data.data;
});

const updateCurrentTime = () => {
  currentTime.value = new Date();
};

const updateSelectedCategoryByCategory = (categoryName) => {
  const selectedCategoryValue = categories.value.find(category => category.category === categoryName);
  selectedCategory.value = selectedCategoryValue ? selectedCategoryValue.id : null;
};

const updateSelectedCategoryByDepartment = (departmentName) => {
  const selectedCategoryValue = categories.value.find(category => category.department === departmentName);
  selectedCategory.value = selectedCategoryValue ? selectedCategoryValue.id : null;
};

const getCategoryName = (categoryId) => {
  const selectedCategoryValue = categories.value.find(category => category.id === categoryId);
  return selectedCategoryValue ? selectedCategoryValue.category : '';
};

const getDepartmentName = (categoryId) => {
  const selectedCategoryValue = categories.value.find(category => category.id === categoryId);
  return selectedCategoryValue ? selectedCategoryValue.department : '';
};
</script>
<template>
  <AppLayout :canLogin="canLogin" title="Form Ticket">
    <div class="container align-items-start my-4">
      <div class="row align-items-start">
        <div class="col-md-4 mb-3">
          <div class="card-info shadow">
            <div class="card-header d-flex p-3 align-items-center text-white bg-dark">Pilih Kategori untuk membuat tiket baru</div>
            <div class="card-body p-3">
              <div class="category" v-for="category in categories" :key="category.id">
                <div class="form-check">
                  <label class="form-check-label" for="category1">
                    <input 
                    class="form-check-input" 
                    type="radio" 
                    name="categoryRadio" 
                    id="category1"
                    :value="category.id"
                    v-model="selectedCategory" />
                    {{ category.category }} 
                  </label>
                </div>
                <!-- <img src="assets/img/kesekretariatan.png" alt="kesekretariatan" width="100" height="100">
                        <div class="category-name">Sekretariat</div>
                        <div class="category-description">Pembuatan Surat, dll</div>
                        <div class="create-tiket">Buat Tiket</div> -->
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-8 form-question">
          <div class="card-info shadow">
            <div class="card-body px-5">
              <h5 class="d-flex justify-content-center mt-3 mb-4">Formulir Tiket Baru</h5>

              <form @submit.prevent="createTicket">
                <div class="card-head p-2 mb-3 row">
                  <label class="col-sm-2 col-form-label fw-bold" for="category-name">Kategori :</label>
                  <div class="col-sm-4">
                    <input
                    type="text" 
                    class="form-control" 
                    id="category_id" 
                    name="category"
                    autocomplete="category_id"
                    :value="getCategoryName(selectedCategory)"
                    @input="updateSelectedCategoryByCategory($event.target.value)" 
                    readonly disabled />
                  </div>
                  <label class="col-sm-2 col-form-label fw-bold" for="department-name">Bidang :</label>
                  <div class="col-sm-4">
                    <input
                    id="user_id_bidang" 
                    type="text"
                    class="form-control"
                    name="department"
                    autocomplete="user_id_bidang"
                    :value="getDepartmentName(selectedCategory)"
                    @input="updateSelectedCategoryByDepartment($event.target.value)" 
                    readonly disabled />
                  </div>
                </div>
                <div class="card-form p-2 row">
                  <div class="mb-3">
                    <label class="form-label fw-bold" for="subjek">Subjek*</label>
                    <input v-model="newTicket.subject" type="text" class="form-control" id="subject" required />
                  </div>
                  <div class="mb-3">
                    <label class="form-label fw-bold" for="subjek">ID</label>
                    <input v-model="lastTicketId" type="number" class="form-control" id="ticket_id" required/> 
                  </div>
                  <div class="mb-3">
                    <label class="form-label fw-bold" for="subjek">User Employee</label>
                    <input v-model="newTicket.user_id_employee" type="text" class="form-control" id="ticket_id" required />
                  </div>
                  <div class="mb-3">
                    <label class="form-label fw-bold" for="subjek">User Department</label>
                    <input v-model="newTicket.user_id_department" type="text" class="form-control" id="ticket_id" required />
                  </div>
                  <div class="mb-3">
                    <label class="form-label fw-bold" for="subjek">Category</label>
                    <input v-model="newTicket.category_id" type="text" class="form-control" id="ticket_id" required />
                  </div>
                  <div class="mb-3">
                    <label class="form-label fw-bold" for="subjek">Status</label>
                    <input v-model="newTicket.status_id" type="text" class="form-control" id="ticket_id" required />
                  </div>
                  <div class="mb-3">
                    <label class="form-label fw-bold" for="subjek">Review</label>
                    <input v-model="newTicket.review_id" type="text" class="form-control" id="ticket_id" required />
                  </div>
                  <div class="mb-3">
                    <label class="form-label fw-bold" for="pesan">Pesan*</label>
                    <textarea v-model="newDetailTicket.question" class="form-control" id="question" rows="5" required></textarea>
                  </div>
                  <div class="col-md-8">
                    <label for="file" class="form-label fw-bold">Unggah Berkas</label>
                    <input class="form-control" type="file" id="file" multiple />
                  </div>
                  <div class="col-md-4 mt-4 py-1">
                    <button id="add-file-button" class="btn btn-primary d-flex justify-content-end">Tambah</button>
                  </div>
                  <!-- <div class="mb-3">
                    <div class="file btn btn-primary position-relative overflow-hidden">
                      <label for="input-files">
                        <i class="uil uil-paperclip icon-uploud"></i>
                        <small class="d-none">Upload</small>
                      </label>
                      <input type="file" name="file" class="input-files" id="file" multiple />
                    </div>
                  </div> -->
                  <div id="file-list">
                    <!-- Daftar file yang dipilih akan ditampilkan di sini -->
                  </div>
                </div>
                <div class="py-3 d-flex justify-content-between">
                  <button type="button" class="btn-clear">Hapus</button>
                  <button type="submit" class="btn-submit" data-bs-toggle="modal" data-bs-target="#modalSuccess" id="SweetAlertSuccess">Kirim</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>

<script>
export default {
  data() {
    return {
      lastTicketId: null,
      newTicket: {
        user_id_employee: '',
        user_id_department: '',
        subject: '',
        category_id: '',
        status_id: '',
        review_id: '',
      },
      newDetailTicket: {
        ticket_id: null,
        question: '',
      },
    };
  },

  mounted() {
      this.getLastTicketId();
  },
  methods: {
    async createTicket() {
      try {
        // Post to tickets table
        const ticketResponse = await axios.post('/tickets', this.newTicket);
        const ticketId = ticketResponse.data.ticket.id;
        
        // Get ticket_id from tickets table
        // const response = await axios.get('/last-ticket-id');
        // this.lastId = response.data.last_ticket_id;
        // this.lastTicketId = this.lastId;
        
        // Post to detail_tickets table
        this.newDetailTicket.ticket_id = ticketId;
        // this.newDetailTicket.ticket_id = ticketId;
        const detailTicketResponse =  await axios.post('/detail_tickets', this.newDetailTicket);
        console.log('Ticket created:', detailTicketResponse.data);

        this.newTicket = {
          user_id_employee: '',
          user_id_department: '',
          subject: '',
          category_id: '',
          status_id: '',
          review_id: '',
        };
        this.newDetailTicket = {
          ticket_id: null,
          question: '',
        };
        await this.getLastTicketId();
      } catch (error) {
        console.error('Error creating Ticket:', error);
      }
    },
    async getLastTicketId() {
      try {
        const response = await axios.get('/last-ticket-id');
        this.lastId = response.data.last_ticket_id;
        this.lastTicketId = this.lastId;
        // this.newTicket.ticket_id = lastTicketId;
      } catch (error) {
        console.error('Error getting last Ticket ID:', error);
      }
    }
  },
};
</script>