<script setup>
import { Head, Link } from "@inertiajs/vue3";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <Head title="Landing Page | FAQ" />
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <div class="logo-wrapper">
                        <img
                            class="img-logo"
                            src="../../images/logo.png"
                            alt="Logo"
                        />
                        <div class="logo-text">
                            <h2>Pusat Bantuan Kepegawaian</h2>
                            <p>Pemerintah Provinsi Papua Barat</p>
                        </div>
                    </div>
                </a>
            </div>
            <div
                v-if="canLogin"
                class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10"
            >
                <a v-if="$page.props.auth.user" class="btn btn-success" href="/dashboard" role="button">Dashboard</a>
                <!-- <Link
                    v-if="$page.props.auth.user"
                    :href="route('dashboard')"
                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                    >Dashboard</Link
                > -->

                <template v-else>
                    <a class="btn btn-success" href="/login" role="button"
                        >Masuk</a
                    >
                    <!-- <Link
                        :href="route('login')"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                        >Log in</Link
                    >

                    <Link
                        v-if="canRegister"
                        :href="route('register')"
                        class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                        >Register</Link
                    > -->
                </template>
            </div>
        </nav>
    </header>

    <body>
        <div class="custom-container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Pertanyaan pernah diajukan (FAQ)</h1>
                    <form class="d-flex" role="search" @submit="onSearch">
                        <input
                            class="form-control me-2 custom-search-input"
                            type="search"
                            placeholder="Cari pertanyaan disini..."
                            aria-label="Search"
                            v-model="searchTerm"
                        />
                        <button class="btn custom-search-btn" type="submit">
                            <img src="../../images/search.png" alt="Search" />
                        </button>
                    </form>

                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                Accordion Item #1
                            </button>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                                <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                Accordion Item #2
                            </button>
                            </h2>
                            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                Accordion Item #3
                            </button>
                            </h2>
                            <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                            </div>
                        </div>
                        </div>
                </div>
                <div class="col-md-5">
                    <img class="img" src="../../images/orang.png" alt="FAQ" />
                    <h2>Ada pertanyaan lain?</h2>
                    <p>
                        Kamu dapat bertanya pertanyaan yang belum tersedia di
                        FAQ dan meminta bantuan dengan tiket
                    </p>
                    <button class="btn btn-primary">Buat Tiket</button>
                </div>
            </div>
        </div>
    </body>
</template>

<style>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}
@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}
:root {
    --color-primary: #117c6f;
    --color-secondary: #289c8e;
    --color-tertiary: #1e1e1e;
    --color-font: #1e1e1e;
}

h1 {
    font-size: 36px;
    font-weight: 700;
    line-height: 1.2;
    color: var(--color-font);
    font-family: poppins;
}

h2 {
    font-size: 24px;
    font-weight: 700;
    line-height: 1.2;
    color: var(--color-font);
    font-family: poppins;
}

h6 {
    font-size: 16px;
    font-weight: 400;
    line-height: 1.2;
    color: var(--color-font);
    font-family: poppins;
}

p {
    font-size: 16px;
    font-weight: 400;
    line-height: 1.2;
    color: var(--color-font);
    font-family: poppins;
}

body {
    background-color: #f5f5f5;
    font-family: poppins;
}

.img-logo {
    max-width: 3.5%;
    height: auto;
    margin-left: 50px;
}

.logo-wrapper {
    display: flex;
    align-items: center;
}

.custom-search-input {
    width: 680px; /* Sesuaikan ukuran lebar sesuai keinginan Anda */
    height: 40px;
    top: 230px;
    left: 70px;
    border-radius: 20px;
    border: 1px solid #e5e5e5;
    margin-top: 20px;
    margin-bottom: 20px;
    align-items: center;
}

/* Mengatur gaya tombol pencarian */
.custom-search-btn {
    background-color: transparent; /* Hapus latar belakang */
    border: 1px; /* Hapus garis tepi */
    border-radius: 20px;
}

/* Mengatur gambar pencarian */
.custom-search-btn img {
    width: 20px; /* Sesuaikan ukuran gambar sesuai keinginan Anda */
    height: 20px; /* Sesuaikan ukuran gambar sesuai keinginan Anda */
}

.custom-container {
    width: 100%;
    padding: 30px;
    margin: 0 auto;
    text-align: center; /* Ini akan membuat kontainer berada di tengah */
}

.img {
    max-width: 80%;
    height: auto;
    margin-left: 70px;
}

.btn-success {
    background-color: #117c72;
    box-shadow: 5px 5px 20px rgba(0, 0, 0, 0.4);
    border-radius: 20px;
    border: #117c72;
    width: 120px;
    font-family: poppins;
    font-weight: 500;
}

.btn-primary {
    background-color: #117c72;
    box-shadow: 5px 5px 20px rgba(0, 0, 0, 0.4);
    border-radius: 20px;
    border: #117c72;
    width: 150px;
    font-family: poppins;
    font-weight: 500;
}
</style>
