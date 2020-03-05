<template>
    <div class="container">
        <div class="row my-lg-3">
            <div class="col-md-12 col-lg-8">
                <!-- <paginate name="result" :list="resultados" :per="5"> -->
                <h4 class="p-title">
                    <b>Documentos</b>
                </h4>
                <ul>
                    <div v-for="(object, index) in documentos" :key="index">
                        <a
                            @click="vealpdf(object.id)"
                            style="color: black !important;"
                        >
                            <li style="margin-top:2%">
                                <img
                                    style="width: 62px !important;"
                                    :src="object.imgdesmostrativa"
                                />
                                <h3>{{ object.nombre }}</h3>
                                <p>Ver detalle</p>
                            </li>
                        </a>
                    </div>
                </ul>
                <!-- </paginate> -->
                <div class="centrar" style="width: 50%; margin: 0 auto;">
                    <div class="container h-100" style="margin-top: 3%">
                        <div
                            class="row h-100 justify-content-center align-items-center"
                        >
                            <nav>
                                <ul class="pagination">
                                    <li v-if="pagination.current_page > 1">
                                        <a
                                            @click="
                                                changePage(
                                                    pagination.current_page - 1
                                                )
                                            "
                                        >
                                            <span>Atrás</span>
                                        </a>
                                    </li>
                                    <li
                                        v-for="(page, index) in pagesNumber"
                                        :key="index"
                                        v-bind:class="[
                                            page == isActived ? 'active' : ''
                                        ]"
                                        @click="changePage(page)"
                                    >
                                        <a>
                                            <span>{{ page }}</span>
                                        </a>
                                    </li>
                                    <li
                                        v-if="
                                            pagination.current_page <
                                                pagination.last_page
                                        "
                                    >
                                        <a
                                            @click="
                                                changePage(
                                                    pagination.current_page + 1
                                                )
                                            "
                                        >
                                            <span>Siguiente</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <popularPost></popularPost>
            </div>
        </div>
    </div>
</template>

<script>
import Vue from "vue";
import axios from "axios";
import VueLoading from "vuejs-loading-plugin";
Vue.use(VueLoading, {
    text: "Cargando"
});

export default {
    data() {
        return {
            documentos: [],
            pagination: {
                total: 0,
                current_page: 0,
                per_page: 0,
                last_page: 0,
                from: 0,
                to: 0
            }
        };
    },

    methods: {
        getPdfs(page) {
            this.$loading(true);
            axios({
                method: "post",
                url: "/todospdfs",
                data: {
                    page: page
                }
            })
                .then(resp => {
                    this.documentos = resp.data.pdfs.data;
                    this.pagination = resp.data.pagination;
                    console.log(this.documentos);

                    // this.documentos.length == undefined ||
                    // this.documentos.length <= 0
                    //     ? (this.notFound = true)
                    //     : (this.notFound = false);
                    this.$loading(false);
                })
                .catch(Error => console.log(Error));
        },

        changePage(page) {
            this.pagination.current_page = page;
            this.getPdfs(page);
        },
        vealpdf(pdfid) {
            const path = "/ver-pdf/" + pdfid;
            if (this.$route.path !== path) this.$router.push(path);
        }
    },

    computed: {
        isActived: function() {
            return this.pagination.current_page;
        },
        pagesNumber: function() {
            if (!this.pagination.to) {
                return [];
            }

            let from = this.pagination.current_page - 2;
            if (from < 1) {
                from = 1;
            }

            let to = from + 2 * 2;
            if (to >= this.pagination.last_page) {
                to = this.pagination.last_page;
            }

            let pagesArray = [];
            while (from <= to) {
                pagesArray.push(from);
                from++;
            }

            return pagesArray;
        }
    },

    created() {
        this.$loading(true);
        axios({
            method: "post",
            url: "/todospdfs",
            data: {
                page: 1
            }
        })
            .then(resp => {
                this.documentos = resp.data.pdfs.data;
                this.pagination = resp.data.pagination;
                console.log(this.documentos);

                // this.documentos.length == undefined ||
                // this.documentos.length <= 0
                //     ? (this.notFound = true)
                //     : (this.notFound = false);
                this.$loading(false);
            })
            .catch(Error => console.log(Error));
    }
};
</script>

<style lang="scss" scoped>
.active {
    background-color: rgba(57, 164, 235, 0.747) !important;
}

.query-container {
    height: 100vh !important;
}

.author-card {
    height: 15em;
    width: 55%;
    border: 2px solid #151515;
}

@import url("https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700");
@import url("https://fonts.googleapis.com/css?family=Raleway:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i");

* {
    box-sizing: border-box;
}

.box:hover {
    border-top-left-radius: 10px;
    border-bottom-left-radius: 10px;
    animation-name: example;
    animation-duration: 0.25s;
    margin-bottom: 20px;
    //   border-left: 2px solid blue;
    box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
}

.pt-20 {
    padding-top: 20px !important;
}

.list-li-mr-20 > li {
    margin-right: 20px;
}

.color-primary {
    color: #f9b500;
}

.mr-5 {
    margin-right: 5px !important;
}

.paginate-result {
    width: 100%;
    text-align: center;
    margin-bottom: 1rem;
}

.font-12 {
    font-size: 1.2em;
}

.cards {
    width: 100%;
    display: flex;
    display: -webkit-flex;
    justify-content: center;
    -webkit-justify-content: center;
    max-width: 820px;
}

.card__like {
    width: 18px;
}

.card__clock {
    width: 15px;
    vertical-align: middle;
    fill: #ad7d52;
}

.card__time {
    font-size: 12px;
    color: #ad7d52;
    vertical-align: middle;
    margin-left: 5px;
}

.card__clock-info {
    float: right;
}

.card__img {
    visibility: hidden;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    // width: 100%;
    height: 360px;
    // height: 235px;
    border-top-left-radius: 12px;
    border-top-right-radius: 12px;
}

.card__info-hover {
    position: absolute;
    padding: 16px;
    width: 100%;
    opacity: 1;
    color: #fff;
    top: 0;
}

.card__img--hover {
    transition: 0.2s all ease-out;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    width: 100%;
    position: absolute;
    height: 235px;
    border-top-left-radius: 12px;
    border-top-right-radius: 12px;
    top: 0;
    color: #fff;
}

.card {
    margin-right: 25px;
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0, 1);
    background-color: #fff;
    height: 360px;
    position: relative;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0px 13px 10px -7px rgba(0, 0, 0, 0.1);
}

.card:hover {
    box-shadow: 0px 30px 18px -8px rgba(0, 0, 0, 0.1);
    transform: scale(1.1, 1.1);
    color: #fff;
}

.card__info {
    z-index: 2;
    background-color: #fff;
    border-bottom-left-radius: 12px;
    border-bottom-right-radius: 12px;
    padding: 16px 24px 24px 24px;
}

.card__category:hover {
    font-family: "Raleway", sans-serif;
    text-transform: uppercase;
    font-size: 13px;
    letter-spacing: 2px;
    font-weight: 500;
    color: #868686;
}

.card__title {
    margin-top: 5px;
    margin-bottom: 10px;
    font-family: "Roboto Slab", serif;
}

.card__by {
    font-size: 12px;
    font-family: "Raleway", sans-serif;
    font-weight: 500;
}

.card__author {
    font-weight: 600;
    text-decoration: none;
    color: #ad7d52;
}

.card__author:hover {
    font-weight: 600;
    text-decoration: none;
    color: #fff;
}

.card:hover .card__img--hover {
    height: 100%;
    opacity: 0.3;
}

.card:hover .card__info {
    background-color: transparent;
    position: relative;
}

.card:hover .card__info-hover {
    opacity: 1;
}

ul {
    list-style-type: none;
    width: 100%;
}

h3 {
    font: bold 20px/1.5 Helvetica, Verdana, sans-serif;
}

li img {
    float: left;
    margin: 0 15px 0 0;
}

li p {
    font: 200 12px/1.5 Georgia, Times New Roman, serif;
}

li {
    padding: 10px;
    overflow: auto;
}

li:hover {
    background: #eee;
    cursor: pointer;
}

.p-title {
    position: relative;
    padding-bottom: 20px;
    margin-bottom: 4px;
}

.p-title:after {
    content: "";
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 1px;
    background: #ccc;
}

.p-title:before {
    content: "";
    position: absolute;
    bottom: 0;
    left: 0;
    width: 80px;
    height: 5px;
    background: #f9b500;
    z-index: 1;
}

.color-lite-black {
    color: #888;
}

.color-black {
    color: #111;
}

.wh-100x {
    height: 100px;
    width: 100px !important;
}

.abs-tlr {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    z-index: 1;
}

.ml-120 {
    margin-left: 120px !important;
}

.mycursor {
    cursor: pointer;
}

// BOTH
.mybtn {
    margin: 1em 0 3em 0;
}
.botones {
    margin: 0.2em 0 0.1em 0;
    cursor: pointer;
}
</style>
