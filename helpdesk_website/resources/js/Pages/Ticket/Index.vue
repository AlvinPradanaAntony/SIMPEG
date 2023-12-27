<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { ref, onMounted, computed, defineProps } from 'vue';

const { canLogin, auth, tickets } = defineProps([ 
  'canLogin',
  'auth',
  'tickets',
]);

const ticketInput = ref(null);
const selectedCategoryId = ref(null);

const form = useForm({
  user_id_employee: '',
  user_id_department: '',
  subject: '',
  category_id: 1,
  status_id: 1,
  review_id: 1,
});

const submit = () => {
  form.post(route('formticket'), {
      preserveScroll: true,
    onSuccess: () => form.reset(),
    onError: (error) => {
      console.log(error);
      ticketInput.value.focus();
    },
  });
};

const users_employee = computed(() => {
  return tickets.users.filter(user => user.role_id === 1);
});

const users_departments = computed(() => {
  return tickets.users.filter(user => user.role_id === 2);
});

const selectedCategory = computed(() => {
  const selectedCategoryData = tickets.categories.find(category => category.id === selectedCategoryId.value);
  return selectedCategoryData ? selectedCategoryData.category : '';
});

const selectedDepartmentId = computed(() => {
  const selectedCategoryData = tickets.categories.find(category => category.id === selectedCategoryId.value);
  return selectedCategoryData ? selectedCategoryData.department_id : null;
});

const selectedDepartment = computed(() => {
  const selectedDepartmentData = tickets.departments.find(department => department.id === selectedDepartmentId.value);
  return selectedDepartmentData ? selectedDepartmentData.department : '';
});

</script>
<template>
  <AppLayout :canLogin="canLogin" :tickets="tickets" title="Form Ticket">
    <div class="container align-items-start my-4">
      <div class="row align-items-start">
        <div class="col-md-4 mb-3">
          <div class="card-info shadow">
            <div class="card-header d-flex p-3 align-items-center text-white bg-dark">Pilih Kategori untuk membuat tiket baru</div>
            <div class="card-body p-3">
              <div class="category">
                <div class="form-check" v-for="(category, index) in tickets.categories" :key="index">
                  <label class="form-check-label" :for="'category' + index">
                    <input 
                      class="form-check-input" 
                      type="radio" 
                      :id="'category' + index"
                      :name="'categoryRadio'"
                      :value="category.id"
                      v-model="selectedCategoryId"
                    /> {{ category.category }}
                  </label>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-8 form-question">
          <div class="card-info shadow">
            <div class="card-body px-5">
              <h5 class="d-flex justify-content-center mt-3 mb-4">Formulir Tiket Baru</h5>

              <form @submit.prevent="submit">
                <div class="card-head p-2 mb-3 row">
                  <label class="col-sm-2 col-form-label fw-bold" for="category-name">Kategori :</label>
                  <div class="col-sm-4">
                    <input
                    type="text" 
                    class="form-control" 
                    id="category_id" 
                    name="category"
                    autocomplete="category_id"
                    v-model="selectedCategory"
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
                    v-model="selectedDepartment"
                    readonly disabled />
                  </div>
                </div>
                <div class="card-form p-2 row">
                  <div class="col-lg-12 mb-3">
                    <InputLabel for="user_id_employee" class="form-label small" value="User Pegawai" />
                    <select v-model="form.user_id_employee" class="form-select">
                      <option v-for="user_employee in users_employee" :key="user_employee.id" :value="user_employee.id">
                        {{ user_employee.name }}
                      </option>
                    </select>
                    <InputError :message="form.errors.user_id_employee" class="mt-2" />
                  </div>
                  <div class="col-lg-12 mb-3">
                    <InputLabel for="user_id_department" class="form-label small" value="User Bidang" />
                    <select v-model="form.user_id_department" class="form-select">
                      <option v-for="user_department in users_departments" :key="user_department.id" :value="user_department.id">
                        {{ user_department.name }}
                      </option>
                    </select>
                    <InputError :message="form.errors.user_id_department" class="mt-2" />
                  </div>
                  <div class="col-lg-12 mb-3">
                    <InputLabel for="subject" class="form-label small" value="Subjek" />
                    <TextInput ref="ticketInput" type="text" class="form-control" id="subject" v-model="form.subject" required
                      autocomplete="subject" @keyup.enter="submit" />
                    <InputError :message="form.errors.subject" class="mt-2" />
                  </div>
                  <div class="mb-3">
                    <label class="form-label fw-bold" for="pesan">Pesan*</label>
                    <textarea  class="form-control" id="question" rows="5" required></textarea>
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
                  <div class="text-end">
                    <PrimaryButton class="ms-3 btn btn-primary btn-custom btn-sm" :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing" @click="submit">
                        <span v-if="form.processing" class="spinner-border spinner-border-sm mr-2" role="status"></span>
                        Simpan
                    </PrimaryButton>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>

<!-- <script>
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
</script> -->