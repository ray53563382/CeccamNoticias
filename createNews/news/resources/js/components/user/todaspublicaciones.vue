<template>
    <!-- <div class="query-container"> -->
    <!-- <div class="row">
    <div class="col-lg-12">-->
    <!-- <Header /> -->
    <!-- </div>
    </div>-->
    <div class="container">
        <div class="row my-lg-3">
            <div class="col-lg-12">
                <h2>
                    <!-- Resultados para: <b>{{ this.querystring }}</b> -->
                </h2>
            </div>
        </div>

        <div v-show="notFound" class="row">
            <div class="col-lg-12">
                <h3>
                    No se han encontrado resultados. Intenta con otro término.
                </h3>
            </div>
        </div>

        <!-- ALL SEARCH START -->
        <div>
            <div class="row">
                <div
                    v-for="(publicacion, index) in publicaciones"
                    :key="index"
                    class="col-12 col-lg-4 col-md-6 box"
                    @click="goToPublicacion(publicacion.id)"
                >
                    <img
                        :src="publicacion.imgdesmostrativa"
                        alt
                        style="width: 100%; height: 300px;"
                    />
                    <h4 class="pt-20">
                        <a href="#">
                            <b style="color: black;">
                                {{ publicacion.titulo }}
                            </b>
                        </a>
                    </h4>
                    <!-- <ul style="margin-left: -48px;"> -->
                    <ul style="margin-left: -8px">
                        <li class="color-lite-black">
                            Autor:
                            <a href="#" class="color-black">
                                <b>{{ publicacion.autor }},</b>
                            </a>
                            <br />
                            {{ publicacion.fecha }}
                        </li>
                    </ul>
                </div>
            </div>

            <div class="container h-100" style="margin-top: 3%">
                <div
                    class="row h-100 justify-content-center align-items-center"
                >
                    <nav>
                        <ul class="pagination">
                            <li v-if="pagination.current_page > 1">
                                <a
                                    @click="
                                        changePage(pagination.current_page - 1)
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
                                        changePage(pagination.current_page + 1)
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
    <!-- </div> -->
</template>

<script>
// import Vue from "vue";
// import VueLoading from "vuejs-loading-plugin";
// Vue.use(VueLoading, {
//     text: "Cargando"
// });

export default {
    props: {
        querystring: {
            required: false
        }
    },
    data() {
        return {
            notFound: false,
            publicaciones: [],
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

    mounted() {
         this.$loading(true);
        if (this.$route.params.busqueda) {
            axios({
                method: "post",
                url: "/buscapublicaciones",
                data: {
                    busqueda: this.$route.params.busqueda,
                    page: 1
                }
            })
                .then(resp => {
                    this.publicaciones = resp.data.notas.data;
                    this.pagination = resp.data.pagination;
                    this.$loading(false);
                })
                .catch(Error => console.log(Error));
        } else {
            axios({
                method: "post",
                url: "/todaslaspublicaciones",
                data: {
                    page: 1
                }
            })
                .then(resp => {
                    this.publicaciones = resp.data.notas.data;
                    this.pagination = resp.data.pagination;
                    this.$loading(false);
                })
                .catch(Error => console.log(Error));
        }
    },

    methods: {
        goToPublicacion(publicacionid) {
            const path = "/documentView/" + publicacionid;
            if (this.$route.path !== path) this.$router.push(path);
        },

        getPublicacion(page) {
            this.$loading(true);

            if (this.$route.params.busqueda) {
                axios({
                    method: "post",
                    url: "/buscapublicaciones",
                    data: {
                        busqueda: this.$route.params.busqueda,
                        page: page
                    }
                })
                    .then(resp => {
                        this.publicaciones = resp.data.notas.data;
                        this.pagination = resp.data.pagination;
                        this.$loading(false);
                    })
                    .catch(Error => console.log(Error));
                    this.$loading(false);

            } else {
                this.$loading(true);

                axios({
                    method: "post",
                    url: "/todaslaspublicaciones",
                    data: {
                        page: page
                    }
                })
                    .then(resp => {
                        this.publicaciones = resp.data.notas.data;
                        this.pagination = resp.data.pagination;
                        this.$loading(false);
                    })
                    .catch(Error => console.log(Error));
                    this.$loading(false);

            }
        },


        changePage(page) {
            this.pagination.current_page = page;
            this.getPublicacion(page);
        }
    }
};
</script>

<style scoped>
.active {
    background-color: rgba(57, 164, 235, 0.747) !important;
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
</style>
