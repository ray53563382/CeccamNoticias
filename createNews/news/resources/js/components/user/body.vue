<template>
    <div class="body-main container">
        <div class="row pt-lg-4 pr-lg-5">
            <div class="col-lg-9 pl-lg-5">
                <h1>Publicaciones recientes</h1>
            </div>

            <div class="col-3">
                <div class="dropdown">
                    <button
                        class="btn btn-secondary dropdown-toggle"
                        type="button"
                        id="dropdownMenuButton"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                    >
                        Ordernar por
                    </button>
                    <div
                        class="dropdown-menu"
                        aria-labelledby="dropdownMenuButton"
                    >
                        <a
                            @click="sort_by('DESC')"
                            class="dropdown-item"
                            href="#"
                            >Más recientes</a
                        >
                        <a
                            @click="sort_by('ASC')"
                            class="dropdown-item"
                            href="#"
                            >Más antiguos.</a
                        >
                        <a class="dropdown-item" href="#">Los más relevantes</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row m-0 px-2">
            <div
                class="col-md-6"
                v-for="(object, index) in publicacionesRecientes"
                :key="object.id"
            >
                <Minicard
                    :documents="publicacionesRecientes"
                    :objectArray="index"
                />
            </div>
        </div>

        <div class="row my-3">
            <div class="col-12 d-flex justify-content-center">
                <nav aria-label="...">
                    <ul class="pagination">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1"
                                >Anterior</a
                            >
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="#">
                                2
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">Siguiente</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</template>

<script>
import Minicard from "./miniCard";
import { bus } from "../media/bus";
import Vue from 'vue'

export default {
    name: "body",

    data() {
        return {
            publicacionesRecientes: [],
            sortBy: null
        };
    },

    components: {
        Minicard
        // Sidebar
    },

    methods: {
        sort_by(type_sort) {
            this.sortBy = type_sort;
            axios({
                method: "post",
                url: "/allrecent",
                data: {
                    type: this.sortBy
                }
            })
                .then(resp => {
                    this.publicacionesRecientes = resp.data;
                    // console.log(this.publicacionesRecientes);
                })
                .catch(Erorr => console.log(Error));
        }
    },

    created() {
        Vue.set(this.publicacionesRecientes, "index", null);
        axios({
            method: "post",
            url: "/allrecent",
            data: {
                type: "DESC"
            }
        })
            .then(resp => {
                this.publicacionesRecientes = resp.data;
            })
            .catch(Error => {
                console.log(Error);
            });
    }
};
</script>

<style lang="scss" scoped>
@media only screen and (max-width: 600px) {
    .body-main {
        background-color: transparent !important;
        -webkit-box-shadow: none !important;
        -moz-box-shadow: none !important;
        box-shadow: none !important;
    }
}

.body-main {
    // position: relative;
    height: 100%;
    width: 100%;
    background-color: aliceblue;
    -webkit-box-shadow: 2px 3px 10px -1px rgba(0, 0, 0, 0.75);
    -moz-box-shadow: 2px 3px 10px -1px rgba(0, 0, 0, 0.75);
    box-shadow: 2px 3px 10px -1px rgba(0, 0, 0, 0.75);
}
</style>
