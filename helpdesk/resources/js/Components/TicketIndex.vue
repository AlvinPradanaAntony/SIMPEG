<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <div class="d-flex justify-content-between align-content-center mb-2">
        <div class="d-flex">
            <div class="d-flex align-items-center ml-4">
                <label for="paginate" class="text-nowrap mr-2 mb-0">Per Page</label>
                <select class="form-control form-control-sm">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50" selected>50</option>
                    <option value="100">100</option>
                </select>
            </div>
            <div>
                <div class="d-flex align-items-center ml-4">
                    <label for="paginate" class="text-nowrap mr-2 mb-0">Status</label>
                    <select v-model="selectedStatuses" class="form-control form-control-sm">
                        <option value="">Semua</option>
                        <option v-for="item in statuses" :key="item.id" :value="item.id">
                            {{ item.name }}
                        </option>
                    </select>
                </div>
            </div>
            <div>
                <div class="d-flex align-items-center ml-4">
                    <label for="paginate" class="text-nowrap mr-2 mb-0">Kategori</label>
                    <select v-model="selectedCategories" class="form-control form-control-sm">
                        <option value="">Semua</option>
                        <option v-for="item in categories" :key="item.id" :value="item.id">
                            {{ item.name }}
                        </option>
                    </select>
                </div>
            </div>
            <div>
                <div class="dropdown ml-4">
                    <button v-if="checked.length > 0" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">Centang ({{ checked.length }})</button>
                    <div class="dropdown-menu">
                        <a
                            href="#"
                            onclick="confirm('Are you sure you wanna delete this Record?') || event.stopImmediatePropagation()"
                            class="dropdown-item"
                            type="button"
                            @click.prevent="deleteRecords">
                            Hapus
                        </a>

                        <a :href="url" class="dropdown-item" type="button">
                            Export
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <input
                    v-model.lazy="search"
                    type="search"
                    class="form-control"
                    placeholder="Search by name,email,phone,or address..."
                />
            </div>
            <div class="col-md-10 mb-2" v-if="selectPage">
                <div v-if="selectAll || tickets.meta.total == checked.length">
                    You are currently selecting all
                    <strong>{{ checked.length }}</strong> items.
                </div>
                <div v-else>
                    You have selected <strong>{{ checked.length }}</strong> items,
                    Do you want to Select All
                    <strong>{{ tickets.meta.total }}</strong
                    >?
                    <a @click.prevent="selectAllRecords" href="#" class="ml-2"
                        >Select All</a
                    >
                </div>
            </div>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover">
                <tbody>
                    <tr>
                        <th><input type="checkbox" v-model="selectPage" /></th>
                        <th>
                            <a href="#" @click.prevent="change_sort('id')"
                                >Nomor Tiket</a
                            >
                            <span
                                v-if="
                                    sort_direction == 'desc' &&
                                        sort_field == 'id'
                                "
                                >&uarr;</span
                            >
                            <span
                                v-if="
                                    sort_direction == 'asc' &&
                                        sort_field == 'user_id'
                                "
                                >&darr;</span
                            >
                        </th>
                        <th>
                            <a href="#" @click.prevent="change_sort('subject')"
                                >Subjek</a
                            >
                            <span
                                v-if="
                                    sort_direction == 'desc' &&
                                        sort_field == 'subject'
                                "
                                >&uarr;</span
                            >
                            <span
                                v-if="
                                    sort_direction == 'asc' &&
                                        sort_field == 'subject'
                                "
                                >&darr;</span
                            >
                        </th>
                        <th>
                            <a href="#" @click.prevent="change_sort('category_id')"
                                >Category</a
                            >
                            <span
                                v-if="
                                    sort_direction == 'desc' &&
                                        sort_field == 'category_id'
                                "
                                >&uarr;</span
                            >
                            <span
                                v-if="
                                    sort_direction == 'asc' &&
                                        sort_field == 'category_id'
                                "
                                >&darr;</span
                            >
                        </th>
                        <th>
                            <a
                                href="#"
                                @click.prevent="change_sort('stasus_id')"
                                >Status</a
                            >
                            <span
                                v-if="
                                    sort_direction == 'desc' &&
                                        sort_field == 'status_id'
                                "
                                >&uarr;</span
                            >
                            <span
                                v-if="
                                    sort_direction == 'asc' &&
                                        sort_field == 'status_id'
                                "
                                >&darr;</span
                            >
                        </th>
                        <th>
                            <a
                                href="#"
                                @click.prevent="change_sort('created_at')"
                                >Created At</a
                            >
                            <span
                                v-if="
                                    sort_direction == 'desc' &&
                                        sort_field == 'created_at'
                                "
                                >&uarr;</span
                            >
                            <span
                                v-if="
                                    sort_direction == 'asc' &&
                                        sort_field == 'created_at'
                                "
                                >&darr;</span
                            >
                        </th>
                        <th>Class</th>
                        <th>Section</th>
                        <th>Action</th>
                    </tr>

                    <tr
                        v-for="ticket in tickets.data"
                        :key="ticket.id"
                        :class="isChecked(ticket.id) ? 'table-primary' : ''"
                    >
                        <td>
                            <input
                                type="checkbox"
                                :value="ticket.id"
                                v-model="checked"
                            />
                        </td>
                        <td>{{ ticket.name }}</td>
                        <td>{{ ticket.email }}</td>
                        <td>{{ ticket.address }}</td>
                        <td>{{ ticket.phone_number }}</td>
                        <td>{{ ticket.created_at }}</td>
                        <td>{{ ticket.class }}</td>
                        <td>{{ ticket.section }}</td>
                        <td>
                            <button
                                onclick="confirm('Are you sure you wanna delete this Record?') || event.stopImmediatePropagation()"
                                class="btn btn-danger btn-sm"
                                @click="deleteSingleRecord(ticket.id)"
                            >
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="row mt-4">
            <div class="col-sm-6 offset-5">
                <pagination
                    :data="tickets"
                    @pagination-change-page="getTickets"
                ></pagination>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            tickets: {},
            paginate: 10,
            search: "",
            statuses: {},
            selectedStatus: "",
            selectedCategory: "",
            categories: {},
            checked: [],
            selectPage: false,
            selectAll: false,
            sort_direction: "desc",
            sort_field: "created_at",
            url: "",
            getTicketsUrl: "",
            getTicketsUrlWithoutPaginate: ""
        };
    },

    mounted() {
        axios.get("/tickets").then(response => {
            this.statuses = response.data.data;
        });
        this.getTickets();
    }
    // watch: {
    //     paginate: function(value) {
    //         this.getTickets();
    //     },
    //     search: function(value) {
    //         this.getTickets();
    //     },
    //     selectedStatus: function(value) {
    //         this.selectedCategory = "";
    //         axios
    //             .get("/api/categories?status_id=" + this.selectedStatus)
    //             .then(response => {
    //                 this.categories = response.data.data;
    //             });
    //         this.getTickets();
    //     },
    //     selectedCategory: function(value) {
    //         this.getTickets();
    //     },
    //     selectPage: function(value) {
    //         this.checked = [];
    //         if (value) {
    //             this.tickets.data.forEach(ticket => {
    //                 this.checked.push(ticket.id);
    //             });
    //         } else {
    //             this.checked = [];
    //             this.selectAll = false;
    //         }
    //     },
    //     checked: function(value) {
    //         this.url = "/tickets/export/" + this.checked;
    //     }
    // },

    // methods: {
    //     selectAllRecords() {
    //         axios.get(this.getTicketsUrlWithoutPaginate).then(response => {
    //             // console.log(response.data);
    //             this.checked = [];
    //             response.data.data.forEach(ticket => {
    //                 this.checked.push(ticket.id);
    //             });
    //             this.selectAll = true;
    //         });
    //     },
    //     change_sort(field) {
    //         if (this.sort_field == field) {
    //             this.sort_direction =
    //                 this.sort_direction == "asc" ? "desc" : "asc";
    //         } else {
    //             this.sort_field = field;
    //         }
    //         this.getTickets();
    //     },
    //     deleteSingleRecord(id) {
    //         axios.delete("/ticket/delete/" + id).then(response => {
    //             this.checked = this.checked.filter(id => id != id);
    //             this.$toast.success("ticket Deleted Successfully");
    //             this.getTickets();
    //         });
    //     },
    //     deleteRecords() {
    //         axios
    //             .delete("/tickets/massDestroy/" + this.checked)
    //             .then(response => {
    //                 if (response.status == 204) {
    //                     this.$toast.success(
    //                         "Selected tickets were Deleted Successfully"
    //                     );
    //                     this.checked = [];
    //                     this.getTickets();
    //                 }
    //             });
    //     },
    //     isChecked(id) {
    //         return this.checked.includes(id);
    //     },
    //     getTickets(page = 1) {
    //         this.getTicketsUrlWithoutPaginate =
    //             "/tickets?" +
    //             "q=" +
    //             this.search +
    //             "&sort_direction=" +
    //             this.sort_direction +
    //             "&sort_field=" +
    //             this.sort_field +
    //             "&selectedStatus=" +
    //             this.selectedStatus +
    //             "&selectedCategory=" +
    //             this.selectedCategory;

    //         this.getTicketsUrl = this.getTicketsUrlWithoutPaginate.concat(
    //             "&paginate=" + this.paginate + "&page=" + page
    //         );
    //         axios.get(this.getTicketsUrl).then(response => {
    //             this.tickets = response.data;
    //         });
    //     }
    // },

    
};
</script>