<template>
  <div>
    <ul>
      <li v-for="item in data" :key="item.id">{{ item.field_name }}</li>
    </ul>
  </div>
</template>

<script>
export default {
  data() {
    return {
      data: [],
    };
  },
  mounted() {
    // Lakukan permintaan HTTP GET untuk mengambil data dari Laravel.
    fetch('/data') // Sesuaikan dengan rute yang telah Anda definisikan di Laravel.
      .then((response) => response.json())
      .then((data) => {
        this.data = data;
      })
      .catch((error) => {
        console.error(error);
      });
  },
};
</script>
