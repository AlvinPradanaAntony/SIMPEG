<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
// import ticket-index from '@/Components/TicketIndex.vue';
// import TicketIndex from '@/Components/TicketIndex.vue';
import './../../assets/js/jquery-3.7.1.min.js';
import './../../assets/DataTables-1.13.7/js/jquery.dataTables.min.js';
import './../../assets/DataTables-1.13.7/js/dataTables.bootstrap5.min.js';
import './../../assets/DataTables-1.13.7/css/dataTables.bootstrap5.min.css';
import { all } from 'axios';

const props = defineProps({
    user: Object,
});
</script>

<template>
    <AppLayout title="Dashboard">
        <!-- <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template> -->

        <!-- <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-2 lg:px-2">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="align-items-start mt-3">
                        <div class="row align-items-start">
                            <div class="col-md-3 mb-3">
                                <div class="card card-info mt-4">
                                    <div class="card-header d-flex p-3 items-center text-center text-dark">Dokumen</div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="md:grid md:grid-cols-5 md:gap-6 mt-2 mx-5">
            <div class="mt-5 md:mt-0 md:col-span-1">
                <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-md">
                    <div class="card card-info mt-4">
                        <div class="card-header d-flex items-center text-dark">Dokumen</div>
                        <div class="card-body">
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-4">
                <div class="md:grid-rows-1 md:grid md:gap-6 mx-5">
                    <div class="md:grid md:grid-cols-5 md:gap-6">
                        <div class="py-5 bg-white sm:p-6 shadow sm:rounded-md">
                            Semua Tiket : {{ this.user_tickets.length }}
                        </div>
                        <div class="py-5 bg-white sm:p-6 shadow sm:rounded-md">
                            Terkirim : {{ countTicketsByStatus(1) }}
                        </div>
                        <div class="py-5 bg-white sm:p-6 shadow sm:rounded-md">
                            Terjawab : {{ countTicketsByStatus(2) }}
                        </div>
                        <div class="py-5 bg-white sm:p-6 shadow sm:rounded-md">
                            Terbalas : {{ countTicketsByStatus(3) }}
                        </div>
                        <div class="py-5 bg-white sm:p-6 shadow sm:rounded-md">
                            Tertutup : {{ countTicketsByStatus(4) }}
                        </div>
                    </div>
                </div>
                <div class="md:grid-rows-2 md:grid md:gap-6 mt-2 mx-5">
                    <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-md">
                        <div>
                            <ul class="nav nav-tabs">
                                <li class="nav-item" v-for="(tab, index) in tabs" :key="index">
                                    <a href="#" class="nav-link" :class="{ active: tab.active }" @click="changeTab(index)">{{ tab.label }}</a>
                                </li>
                            </ul>
                        </div>
                        <table id="myTable" class="display">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nomor Tiket</th>
                                    <th>Nama</th>
                                    <th>Subjek</th>
                                    <th>Kategori</th>
                                    <th>Status</th>
                                    <th>Tanggal Pengajuan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item in user_tickets" :key="item.id">
                                    <td></td>
                                    <td>{{ item.id }}</td>
                                    <td>{{ item.name }}</td>
                                    <td>{{ item.subject }}</td>
                                    <td>{{ item.category }}</td>
                                    <td>{{ item.status }}</td>
                                    <td>{{ item.created_at }}</td>
                                </tr>
                            </tbody>
                        </table>
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
            tickets: [
                { id: 1, status_id: 1 },
                { id: 2, status_id: 2 },
                { id: 3, status_id: 3 },
                { id: 4, status_id: 4 },
            ],
            statuses: [],
            users: [],
            categories: [],
            reviews: [],
            tabs: [
                { label: "Tab 1", active: true },
                { label: "Tab 2", active: false },
                { label: "Tab 3", active: false },
            ],
        };
    },

    methods: {
        countTicketsByStatus(statusId) {
            return this.user_tickets.filter(ticket => ticket.status_id === statusId).length;
        },
        changeTab(index) {
            this.tabs.forEach((tab, i) => {
                tab.active = i === index;
            });
        },
    },

    mounted() {
        $(document).ready(function () {
        $('#myTable').DataTable();
        });
        axios.get('/tickets').then((response) => {
            this.tickets = response.data.data;
        });
        axios.get('/statuses').then((response) => {
            this.statuses = response.data.data;
        });
    },

    computed: {
        user_tickets() {
            return this.tickets.filter(ticket => ticket.user_id === this.$page.props.auth.user.id);
        },
    },
};
</script>