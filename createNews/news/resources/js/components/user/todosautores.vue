<template>
    <div class="container">
        <div class="row my-lg-3">
            <div class="col-lg-12">
                <h2>
                    <!-- Resultados para: <b>{{ this.querystring }}</b> -->
                </h2>
            </div>
        </div>

        <!-- <div v-show="notFound" class="row">
            <div class="col-lg-12">
                <h3>
                    Se ha producido un error, por favor recarga la página.
                </h3>
            </div>
        </div> -->

        <!-- DOCUMENTS START -->
        <!-- <div> -->
        <!-- <div > -->
        <h4 class="p-title" style="margin-bottom: 2%">
            <b>Autores</b>
        </h4>
        <div class="row">
            <div class="col-lg-8 col-md-6 col-sm-12">
                <!-- <paginate name="result" :list="resultadosAtores" :per="5"> -->
                <div v-for="(autor, index) in autores" :key="index">
                    <div
                        @click="goToAutor(autor.autor)"
                        class="container border border-warning my-5 py-4 px-4 mx-2 mycursor"
                    >
                        <div class="row">
                            <div class="col-3">
                                <div>
                                    <img
                                        style="height: 6em; width: 4em"
                                        src="../media/pencil.png"
                                        alt
                                        class="img-thumbnail"
                                    />
                                </div>
                            </div>
                            <div class="col-9">
                                <div>
                                    <b>Ver todo de:</b>
                                    <h2
                                        class="text-warning"
                                        style="color:#847811 !important"
                                    >
                                        {{ autor.autor }}
                                    </h2>
                                    <!-- <h3>autor</h3> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- </paginate> -->
                <div class="container">
                    <div
                        class="row h-100 justify-content-center align-items-center"
                    >
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
                                                        pagination.current_page -
                                                            1
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
                                                page == isActived
                                                    ? 'active'
                                                    : ''
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
                                                        pagination.current_page +
                                                            1
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
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <popularPost></popularPost>
            </div>
        </div>
        <!-- </div> -->
        <!-- </div> -->

        <!-- Todos las acciones END -->
    </div>
    <!-- DOCUMENTS END -->
</template>

<script>
import Vue from "vue";
import axios from "axios";
import VueLoading from "vuejs-loading-plugin";
Vue.use(VueLoading, {
    text: "Cargando"
});

export default {
    name: "todoslosautores",
    data() {
        return {
            autores: [],
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
        goToAutor(nombreautor) {
            this.$router.push({
                name: "publicacionesautor",
                params: { autor: nombreautor }
            });
        },

        getAutores(page) {
            axios({
                method: "post",
                url: "/allAuthors",
                data: {
                    page: page
                }
            })
                .then(resp => {
                    // console.log(resp);
                    this.$loading(false);
                    this.autores = resp.data.autores.data;
                    this.pagination = resp.data.pagination;
                })
                .catch(Error => console.log(Error));
        },

        changePage(page) {
            this.pagination.current_page = page;
            this.getAutores(page);
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
            url: "/allAuthors",
            data: {
                page: 1
            }
        })
            .then(resp => {
                // console.log(resp);
                this.$loading(false);
                console.log(resp.data);
                this.autores = resp.data.autores.data;
                this.pagination = resp.data.pagination;
            })
            .catch(Error => console.log(Error));
    }
};
</script>

<style scoped>
.active {
    background-color: rgba(57, 164, 235, 0.747) !important;
}
</style>
