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
                    v-for="(accion, index) in acciones"
                    :key="index"
                    class="col-12 col-lg-4 col-md-6 box"
                    @click="goToAction(accion.id)"
                >
                    <img
                        :src="accion.imgdesmostrativa"
                        alt
                        style="width: 100%; height: 300px;"
                    />
                    <h4 class="pt-20">
                        <a href="#">
                            <b style="color: black;">
                                {{ accion.titulo }}
                            </b>
                        </a>
                    </h4>
                    <!-- <ul style="margin-left: -48px;"> -->
                    <ul style="margin-left: -8px">
                        <li class="color-lite-black">
                            Autor:
                            <a href="#" class="color-black">
                                <b>{{ accion.autor }},</b>
                            </a>
                            <br />
                            {{ accion.fecha }}
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
export default {
    props: {
        querystring: {
            required: false
        }
    },
    data() {
        return {
            notFound: false,
            acciones: [],
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

    created() {
        axios({
            method: "post",
            url: "/todaslasacciones",
            data: {
                page: 1
            }
        })
            .then(resp => {
                this.acciones = resp.data.acciones.data;
                this.pagination = resp.data.pagination;
                // this.$loading(false);
            })
            .catch(Error => console.log(Error));
    },

    methods: {
        goToAction(accionid) {
            // const path = "/vista-accion/" + accionid;
            // if (this.$route.path !== path) this.$router.push(path);
            this.$router.push({
                name: "vistaaccion",
                params: { id: accionid }
            });
            // this.$router.push({ path: "/vista-accion/", params: { accionid } });
        },

        getAccion(page) {
            axios({
                method: "post",
                url: "/todaslasacciones",
                data: {
                    page: page
                }
            })
                .then(resp => {
                    this.acciones = resp.data.acciones.data;
                    this.pagination = resp.data.pagination;
                    // this.$loading(false);
                })
                .catch(Error => console.log(Error));
        },

        changePage(page) {
            this.pagination.current_page = page;
            this.getAccion(page);
        }
    }
};
</script>

<style scoped>
.active {
    background-color: rgba(57, 164, 235, 0.747) !important;
}
</style>
