<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import { ref, onMounted, computed, defineProps } from 'vue';

const { canLogin, auth, tickets} = defineProps([ 
  'canLogin',
  'auth',
  'tickets',
]);

const toDetailTicket = (id) => {
  form.get(route('detailticket', { id }), {
    preserveScroll: true,
    onSuccess: () => {
    },
    onError: (error) => {
      console.log(error);
    },
  });
};

const deleteTicket = (id) => {
  form.delete(route('ticket.destroy', { id }), {
    preserveScroll: true,
    onSuccess: () => {
    },
    onError: (error) => {
      console.log(error);
    },
  });
};

const userTickets = computed(() => {
  return tickets.ticket.filter(ticket => ticket.user_id_employee === auth.user.id);
}); 

const sentTickets = computed(() => {
  return userTickets.value.filter(ticket => ticket.statuses.status === 'Terkirim');
});

const missedTickets = computed(() => {
  return userTickets.value.filter(ticket => ticket.statuses.status === 'Terjawab');
});

const answeredTickets = computed(() => {
  return userTickets.value.filter(ticket => ticket.statuses.status === 'Terbalas');
});

const closedTickets = computed(() => {
  return userTickets.value.filter(ticket => ticket.statuses.status === 'Tertutup');
});

function countTicketsByStatus(status) {
  return userTickets.value.filter(ticket => ticket.statuses.status === status).length;
}

</script>
<template>
    <AppLayout :canLogin="canLogin" :tickets="tickets" title="Tracking Ticket">
    <div class="container my-5">
      <div class="align-items-start ">
        <div class="row align-items-start">
          <div class="col-md-3">
            <div class="card card-info">
              <div class="card-header d-flex p-2 align-items-center bg-dark text-white">Dokumen</div>
              <div class="card-body">
                <div class="card mb-1 shadow-none border">
                    <div class="p-2">
                      <div class="row align-items-center">
                        <div class="col-auto">
                          <div class="avatar-sm">
                            <span class="avatar-title bg-danger rounded"> .PDF </span>
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
            <div class="py-5 bg-white sm:p-6 shadow sm:rounded-md">
              Semua Tiket : {{ userTickets.length }}
              Terkirim : {{ countTicketsByStatus('Terkirim') }}
              Terjawab : {{ countTicketsByStatus('Terjawab') }}
              Terbalas : {{ countTicketsByStatus('Terbalas') }}
              Tertutup : {{ countTicketsByStatus('Tertutup') }}
            </div>
          </div>

          <div class="row col-md-9 g-2 m-0 p-0">
              <div class="col-12 p-0">
                <div class="colorSecondary2 shadow roundedPanel">
                  <!-- Tabs Navs -->
                  <ul class="nav nav-tabs bg-white pt-2 px-4 roundedTab custShadow" id="ex1" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="tab-1" data-bs-toggle="tab" data-bs-target="#tabs-1" type="button" role="tab" aria-controls="tabs-1" aria-selected="true">Semua</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="tab-2" data-bs-toggle="tab" data-bs-target="#tabs-2" type="button" role="tab" aria-controls="tabs-2" aria-selected="false">Terkirim</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="tab-3" data-bs-toggle="tab" data-bs-target="#tabs-3" type="button" role="tab" aria-controls="tabs-3" aria-selected="false">Terjawab</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="tab-4" data-bs-toggle="tab" data-bs-target="#tabs-4" type="button" role="tab" aria-controls="tabs-4" aria-selected="false">Terbalas</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="tab-5" data-bs-toggle="tab" data-bs-target="#tabs-5" type="button" role="tab" aria-controls="tabs-5" aria-selected="false">Tertutup</button>
                    </li>
                  </ul>

                  <!-- Tabs Content Semua-->
                  <div class="tab-content" id="ex1-content">
                    <div class="tab-pane fade show active" id="tabs-1" role="tabpanel" aria-labelledby="ex1-tab-1">
                      <div class="row g-2 m-0">
                        <div class="col-lg-12 m-0 p-0">
                          <div class="card mb-4 roundedTabContent">
                            <div class="card-header shadow roundedTabContent bg-success text-white">
                              <div class="title float-start">
                                <span class="m-0"><b>Tabel Semua Tiket</b></span>
                              </div>
                            </div>
                            <div class="card-body">
                              <div class="table-responsive">
                                <table id="myTable1" class="table table-hover dataTable nowrap" width="100%">
                                  <thead>
                                    <tr>
                                      <th>#</th>
                                      <th>Nomor Tiket</th>
                                      <th>Nama Pelapor</th>
                                      <th>Nama Petugas</th>
                                      <th>Subjek</th>
                                      <th>Kategori</th>
                                      <th>Bidang</th>
                                      <th>Status</th>
                                      <th>Tanggal Pengajuan</th>
                                    </tr>
                                  </thead>
                                  <tbody v-for="ticket in userTickets" :key="ticket.id">
                                    <tr>
                                      <td>
                                        <button @click="toDetailTicket(ticket)" class="btn btn-warning text-white custShadow2 mb-3">Ubah</button>
                                        <button @click="deleteTicket(ticket)" class="btn btn-danger text-white btn-circle custShadow2 me-2">Hapus</button>
                                      </td>
                                      <td>{{ ticket.id }}</td>
                                      <td>{{ ticket.users_employee.name }}</td>
                                      <td>{{ ticket.users_department.name }}</td>
                                      <td>{{ ticket.subject }}</td>
                                      <td>{{ ticket.categories.category }}</td>
                                      <td>{{ ticket.categories.department.department }}</td>
                                      <td>{{ ticket.statuses.status }}</td>
                                      <td>{{ ticket.created_at }}</td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Tabs Content Terkirim-->
                  <div class="tab-content" id="ex1-content">
                    <div class="tab-pane fade" id="tabs-2" role="tabpanel" aria-labelledby="ex1-tab-1">
                      <div class="row g-2 m-0">
                        <div class="col-lg-12 p-0 m-0 p-0">
                          <div class="card mb-4 roundedTabContent">
                            <div class="card-header shadow roundedTabContent">
                              <div class="title float-start">
                                <span class="m-0"><b>Tabel Tiket Terkirim</b></span>
                              </div>
                            </div>
                            <div class="card-body">
                              <div class="table-responsive">
                                <table id="myTable" class="display table-hover dataTable nowrap" width="100%">
                                  <thead>
                                    <tr>
                                      <th>#</th>
                                      <th>Nomor Tiket</th>
                                      <th>Nama Pelapor</th>
                                      <th>Nama Petugas</th>
                                      <th>Subjek</th>
                                      <th>Kategori</th>
                                      <th>Bidang</th>
                                      <th>Status</th>
                                      <th>Tanggal Pengajuan</th>
                                    </tr>
                                  </thead>
                                  <tbody v-for="ticket in sentTickets" :key="ticket.id">
                                    <tr >
                                      <td>
                                        <button class="btn btn-warning text-white btn-circle custShadow2 me-2" data-bs-toggle="modal" data-bs-target="#editDataAdministrator"><i class="uil uil-edit" data-bs-toggle="tooltip" title="Edit Data"></i></button>
                                        <button class="btn btn-danger text-white btn-circle custShadow2 me-2" data-bs-toggle="modal" data-bs-target="#hapusDataAdministrator"><i class="uil uil-trash-alt" data-bs-toggle="tooltip" title="Hapus Data"></i></button>
                                      </td>
                                      <td>{{ ticket.id }}</td>
                                      <td>{{ ticket.users_employee.name }}</td>
                                      <td>{{ ticket.users_department.name }}</td>
                                      <td>{{ ticket.subject }}</td>
                                      <td>{{ ticket.categories.category }}</td>
                                      <td>{{ ticket.categories.department.department }}</td>
                                      <td>{{ ticket.statuses.status }}</td>
                                      <td>{{ ticket.created_at }}</td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Tabs Content Terjawab -->
                  <div class="tab-content" id="ex1-content">
                    <div class="tab-pane fade" id="tabs-3" role="tabpanel" aria-labelledby="ex1-tab-1">
                      <div class="row g-2 m-0">
                        <div class="col-lg-12 p-0 m-0 p-0">
                          <div class="card mb-4 roundedTabContent">
                            <div class="card-header shadow roundedTabContent">
                              <div class="title float-start">
                                <span class="m-0"><b>Tabel Tiket Terjawab</b></span>
                              </div>
                            </div>
                            <div class="card-body">
                              <div class="table-responsive">
                                <table id="myTable3" class="table table-hover dataTable nowrap" width="100%" >
                                  <thead>
                                    <tr>
                                      <th>#</th>
                                      <th>Nomor Tiket</th>
                                      <th>Nama Pelapor</th>
                                      <th>Nama Petugas</th>
                                      <th>Subjek</th>
                                      <th>Kategori</th>
                                      <th>Bidang</th>
                                      <th>Status</th>
                                      <th>Tanggal Pengajuan</th>
                                    </tr>
                                  </thead>
                                  <tbody v-for="ticket in missedTickets" :key="ticket.id">
                                    <tr>
                                      <td>
                                        <button class="btn btn-warning text-white btn-circle custShadow2 me-2" data-bs-toggle="modal" data-bs-target="#editDataAdministrator"><i class="uil uil-edit" data-bs-toggle="tooltip" title="Edit Data"></i></button>
                                        <button class="btn btn-danger text-white btn-circle custShadow2 me-2" data-bs-toggle="modal" data-bs-target="#hapusDataAdministrator"><i class="uil uil-trash-alt" data-bs-toggle="tooltip" title="Hapus Data"></i></button>
                                      </td>
                                      <td>{{ ticket.id }}</td>
                                      <td>{{ ticket.users_employee.name }}</td>
                                      <td>{{ ticket.users_department.name }}</td>
                                      <td>{{ ticket.subject }}</td>
                                      <td>{{ ticket.categories.category }}</td>
                                      <td>{{ ticket.categories.department.department }}</td>
                                      <td>{{ ticket.statuses.status }}</td>
                                      <td>{{ ticket.created_at }}</td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Tabs Content Terbalas -->
                  <div class="tab-content" id="ex1-content">
                    <div class="tab-pane fade" id="tabs-4" role="tabpanel" aria-labelledby="ex1-tab-1">
                      <div class="row g-2 m-0">
                        <div class="col-lg-12 p-0 m-0 p-0">
                          <div class="card mb-4 roundedTabContent">
                            <div class="card-header shadow roundedTabContent">
                              <div class="title float-start">
                                <span class="m-0"><b>Tabel Tiket Terbalas</b></span>
                              </div>
                            </div>
                            <div class="card-body">
                              <div class="table-responsive">
                                <table id="myTable4" class="table table-hover dataTable nowrap" width="100%" >
                                  <thead>
                                    <tr>
                                      <th>#</th>
                                      <th>Nomor Tiket</th>
                                      <th>Nama Pelapor</th>
                                      <th>Nama Petugas</th>
                                      <th>Subjek</th>
                                      <th>Kategori</th>
                                      <th>Bidang</th>
                                      <th>Status</th>
                                      <th>Tanggal Pengajuan</th>
                                    </tr>
                                  </thead>
                                  <tbody v-for="ticket in answeredTickets" :key="ticket.id">
                                    <tr>
                                      <td>
                                        <button class="btn btn-warning text-white btn-circle custShadow2 me-2" data-bs-toggle="modal" data-bs-target="#editDataAdministrator"><i class="uil uil-edit" data-bs-toggle="tooltip" title="Edit Data"></i></button>
                                        <button class="btn btn-danger text-white btn-circle custShadow2 me-2" data-bs-toggle="modal" data-bs-target="#hapusDataAdministrator"><i class="uil uil-trash-alt" data-bs-toggle="tooltip" title="Hapus Data"></i></button>
                                      </td>
                                      <td>{{ ticket.id }}</td>
                                      <td>{{ ticket.users_employee.name }}</td>
                                      <td>{{ ticket.users_department.name }}</td>
                                      <td>{{ ticket.subject }}</td>
                                      <td>{{ ticket.categories.category }}</td>
                                      <td>{{ ticket.categories.department.department }}</td>
                                      <td>{{ ticket.statuses.status }}</td>
                                      <td>{{ ticket.created_at }}</td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Tabs Content Tertutup -->
                  <div class="tab-content" id="ex1-content">
                    <div class="tab-pane fade" id="tabs-5" role="tabpanel" aria-labelledby="ex1-tab-1">
                      <div class="row g-2 m-0">
                        <div class="col-lg-12 p-0 m-0 p-0">
                          <div class="card mb-4 roundedTabContent">
                            <div class="card-header shadow roundedTabContent">
                              <div class="title float-start">
                                <span class="m-0"><b>Tabel Tiket Tertutup</b></span>
                              </div>
                            </div>
                            <div class="card-body">
                              <div class="table-responsive">
                                <table id="myTable5" class="table table-hover dataTable nowrap" width="100%">
                                  <thead>
                                    <tr>
                                      <th>#</th>
                                      <th>Nomor Tiket</th>
                                      <th>Nama Pelapor</th>
                                      <th>Nama Petugas</th>
                                      <th>Subjek</th>
                                      <th>Kategori</th>
                                      <th>Bidang</th>
                                      <th>Status</th>
                                      <th>Tanggal Pengajuan</th>
                                    </tr>
                                  </thead>
                                  <tbody v-for="ticket in closedTickets" :key="ticket.id">
                                    <tr>
                                      <td>
                                        <button class="btn btn-warning text-white btn-circle custShadow2 me-2" data-bs-toggle="modal" data-bs-target="#editDataAdministrator"><i class="uil uil-edit" data-bs-toggle="tooltip" title="Edit Data"></i></button>
                                        <button class="btn btn-danger text-white btn-circle custShadow2 me-2" data-bs-toggle="modal" data-bs-target="#hapusDataAdministrator"><i class="uil uil-trash-alt" data-bs-toggle="tooltip" title="Hapus Data"></i></button>
                                      </td>
                                      <td>{{ ticket.id }}</td>
                                      <td>{{ ticket.users_employee.name }}</td>
                                      <td>{{ ticket.users_department.name }}</td>
                                      <td>{{ ticket.subject }}</td>
                                      <td>{{ ticket.categories.category }}</td>
                                      <td>{{ ticket.categories.department.department }}</td>
                                      <td>{{ ticket.statuses.status }}</td>
                                      <td>{{ ticket.created_at }}</td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
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