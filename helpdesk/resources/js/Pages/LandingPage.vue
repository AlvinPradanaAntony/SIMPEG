<script setup>
import { Head, Link } from "@inertiajs/vue3";
import AccordionComponentFaq from "../Components/AccordionComponentFaq.vue";
import Navbar from "../Components/Navbar.vue";
import("../../css/style.css")
import("../custom.js")

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});

</script>

<template>
    <Head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>FAQ | SIMPEG</title>
        <link rel="stylesheet" href="assets/css/bootstrap/bootstrap.min.css" />
        <link rel="stylesheet" href="assets/css/style.css" />
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css" />
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/solid.css" />
    </Head>
    <body>
        <header>
            <!--Navbar -->
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container">
                    <img class="me-2" src="../../images/logo.png" width="46" height="46" alt="" />
                    <div>
                        <h2>Pusat Bantuan Kepegawaian</h2>
                        <p>Pemerintah Provinsi Papua Barat</p>
                    </div>
                    <div v-if="canLogin" class="sm:right-0 p-3"> 
                        <a v-if="$page.props.auth.user" class="btn btn-primary" href="/dashboard" role="button">Dashboard</a>
                        <template v-else>
                            <a class="btn btn-primary" href="/login" role="button">Masuk</a>
                        </template>
                    </div>
                </div>
            </nav>
            <!-- <div class="pace pace-inactive">
                <div>
                    Navbar
                    <div id="header" class="header navbar navbar-default navbar-fixed-top navbar-expand-lg">
                        <div class="container sm:flex">
                            <div class="logo-wrapper">
                                <img class="img-logo" src="../../images/logo.png" alt="Logo"/>
                                <div class="logo-text">
                                    <h2>Pusat Bantuan Kepegawaian</h2>
                                    <p>Pemerintah Provinsi Papua Barat</p>
                                </div>
                            </div>
                            <div v-if="canLogin" class="sm:right-0 p-3"> 
                                <a v-if="$page.props.auth.user" class="btn btn-primary" href="/dashboard" role="button">Dashboard</a>
                                <template v-else>
                                    <a class="btn btn-primary" href="/login" role="button">Masuk</a>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </header>
        <main>
            <!-- Section Search-->
            <section>
                <!-- bg search -->
                <div class="search-banner has-bg">
                    <div class="bg-cover" data-paroller="true" data-paroller-factor="0.5" data-paroller-factor-xs="0.01"></div>
                    <div class="container">
                    <h1 class="text-center">Hai, ada yang bisa kami bantu?</h1>
                    <div class="input-group">
                        <input type="text" class="form-control form-control-lg" placeholder="Cari informasi anda disini..." />
                        <button type="submit" class="btn btn-lg" title="Search"><i class="ui uil-search"></i></button>
                    </div>
                    </div>
                </div> 
            </section>

            <!-- Section FAQ -->
            <section class="section-faq">
                <div class="container py-5">
                    <div class="row">
                    <div class="col-12">
                        <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button bg-body-tertiary text-body fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><i class="uil uil-question-circle me-2"></i> Apa itu Helpdesk?</button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body"><strong>Helpdesk</strong> adalah sebuah aplikasi yang memudahkan anda dalam mengelola tiket yang masuk, sehingga memudahkan anda dalam memantau tiket yang masuk.</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button bg-body-tertiary text-body fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><i class="uil uil-question-circle me-2"></i> Bagaimana cara menggunakan Helpdesk?</button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">Untuk menggunakan Helpdesk, anda bisa mendaftar di halaman <a href="register.php">register</a> atau jika sudah memiliki akun anda bisa langsung login di halaman <a href="login.php">login</a>.</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button bg-body-tertiary text-body fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"><i class="uil uil-question-circle me-2"></i> Bagaimana cara membuat tiket?</button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this
                                with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button bg-body-tertiary text-body fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour"><i class="uil uil-question-circle me-2"></i> Bagaimana cara melihat tiket yang sudah dibuat?</button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this
                                with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFive">
                            <button class="accordion-button bg-body-tertiary text-body fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive"><i class="uil uil-question-circle me-2"></i> Bagaimana cara mengubah profil?</button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this
                                with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </section>

            <!-- Section tiket -->
            <section class="section-tiket">
                <template>
                <div>
                    <AccordionComponentFaq :data="dataFromLaravel" />
                </div>
                </template>
                <h2>Ada pertanyaan lain?</h2>
                <p>Anda dapat bertanya pertanyaan yang belum tersedia di FAQ dan meminta bantuan dengan tiket </p>
                <!-- <a class="btn btn-primary" href="/login" role="button">Buat Tiket</a> -->
                <div v-if="canLogin" class="sm:right-0 p-3"> 
                    <a v-if="$page.props.auth.user" class="btn btn-primary" href="/dashboard" role="button">Dashboard</a>
                    <template v-else>
                        <a class="btn btn-primary" href="/login" role="button">Buat Tiket</a>
                    </template>
                </div>
            </section>
        </main>
        
    </body>

    <footer>
        <div class="footer">

        </div>
    </footer>
</template>

<style>
.bg-dots-darker {
    background-image: url("../../images/background.jpg");
}
@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("../../images/background.jpg");
    }
}
</style>

<script>
import AccordionComponent from '../Components/AccordionComponentFaq.vue'; // Sesuaikan dengan path komponen accordion Anda

export default {
  components: {
    AccordionComponent,
  },
  data() {
    return {
      dataFromLaravel: [], // Data dari Laravel akan disimpan di sini
    };
  },
  mounted() {
    // Lakukan permintaan HTTP GET untuk mengambil data dari Laravel.
    fetch('/faq') // Sesuaikan dengan rute yang telah Anda definisikan di Laravel.
      .then((response) => response.json())
      .then((data) => {
        this.dataFromLaravel = data;
      })
      .catch((error) => {
        console.error(error);
      });
  },
};
</script>