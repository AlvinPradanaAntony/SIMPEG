<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import StatusCard from '@/Pages/Admin/Partials/StatusCard.vue';
import { ref, onMounted, computed, defineProps } from 'vue';

const { tickets } = defineProps(['tickets']);

const newTicketsCount = computed(() => {
  return tickets.filter(ticket => ticket.status_id === 1).length;
});

const answeredTicketsCount = computed(() => {
  return tickets.filter(ticket => ticket.status === 2).length;
});

const repliedTicketsCount = computed(() => {
  return tickets.filter(ticket => ticket.status === 3).length;
});

const closedTicketsCount = computed(() => {
  return tickets.filter(ticket => ticket.status === 4).length;
});

onMounted(async() => {
  $('#table_user').DataTable({
    dom: 'Bfrtip',
    lengthMenu: [
      [10, 25, 50],
      ['10 data', '25 data', '50 data']
    ],
    buttons: [
      'pageLength'
    ],
    language: {
      search: "Cari:",
      buttons: {
        pageLength: {
          _: "Tampilkan <strong>%d</strong> data",
          '-1': "Tampilkan Semua"
        }
      },
      zeroRecords: "Data tidak ditemukan",
      info: "Menampilkan _START_ hingga _END_ dari total _TOTAL_ data",
      paginate: {
        next: "Selanjutnya",
        previous: "Sebelumnya"
      },
    },
  });
});
</script>
<template>
  <DashboardLayout title="Tiket" :tickets="tickets">
    <div class="row">
      <div class="col-xl-3 col-md-6 mb-4">
        <StatusCard icon="ticket" title="Tiket Baru" :data="newTicketsCount" color1="#29bb89" color2="#66e7ba" />
      </div>
      <div class="col-xl-3 col-md-6 mb-4">
        <StatusCard icon="ticket" title="Tiket Terjawab" :data="answeredTicketsCount" color1="#bba329" color2="#e7d266" />
      </div>
      <div class="col-xl-3 col-md-6 mb-4">
        <StatusCard icon="ticket" title="Tiket Terbalas" :data="repliedTicketsCount" color1="#2951bb" color2="#6678e7" />
      </div>
      <div class="col-xl-3 col-md-6 mb-4">
        <StatusCard icon="ticket" title="Tiket Tertutup" :data="closedTicketsCount" color1="#bb2929" color2="#e76666" />
      </div>
    </div>
    <main>
      <slot />
    </main>
  </DashboardLayout>
</template>