<template>
    <header>
        <div class="bg-191">
            <div class="container">
                <div
                    class="oflow-hidden color-ash font-9 text-sm-center ptb-sm-5"
                >
                    <ul
                        class="float-left float-sm-none list-a-plr-10 list-a-plr-sm-5 list-a-ptb-15 list-a-ptb-sm-10"
                    >
                        <li>
                            <a @click="goToNosotros" class="pl-0 pl-sm-10"
                                >Sobre nosotros</a
                            >
                        </li>
                    </ul>
                    <ul
                        class="float-right float-sm-none list-a-plr-10 list-a-plr-sm-5 list-a-ptb-15 list-a-ptb-sm-5"
                    >
                        <li>
                            <a
                                target="_blank"
                                class="pl-0 pl-sm-10"
                                href="https://www.facebook.com/ceccam.org"
                                ><i class="ion-social-facebook"></i
                            ></a>
                        </li>
                        <li>
                            <a
                                target="_blank"
                                href="https://twitter.com/Ceccam9"
                                ><i class="ion-social-twitter"></i
                            ></a>
                        </li>

                        <li>
                            <a
                                target="_blank"
                                href="https://www.youtube.com/channel/UC0WRsxDsAxyG8y_PkcKJA-w"
                                ><i class="ion-social-youtube"></i
                            ></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="container">
            <a @click="gohome" class="logo"><img :src="logo" alt="Logo"/></a>

            <a class="right-area src-btn">
                <i class="active src-icn ion-search"></i>
                <i class="close-icn ion-close"></i>
            </a>
            <div class="src-form myform">
                <form v-on:submit.prevent>
                    <input
                        v-on:keyup.enter="search"
                        v-model.lazy="searchString"
                        type="text"
                        placeholder="Busca entre nuestras publicaciones"
                        class="myinput"
                    />
                    <div class="input-group-btn search-panel">
                        <button
                            type="button"
                            class="btn btn-default dropdown-toggle mybtn"
                            data-toggle="dropdown"
                        >
                            <span id="search_concept"
                                ><span
                                    class="glyphicon glyphicon-align-justify"
                                ></span>
                                Buscar en...</span
                            >
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu mydrop" role="menu">
                            <li>
                                <a
                                    @click="changeString('publicaciones')"
                                    href="#its_equal"
                                >
                                    <span
                                        class="glyphicon glyphicon-envelope text-danger"
                                    ></span>
                                    Publicaciones</a
                                >
                            </li>
                            <li>
                                <a
                                    @click="changeString('noticias')"
                                    href="#its_equal"
                                >
                                    <span>
                                        <i class="fa fa-newspaper"></i>
                                    </span>
                                    Noticias</a
                                >
                            </li>
                        </ul>
                    </div>
                </form>
            </div>

            <a class="menu-nav-icon" data-menu="#main-menu"
                ><i class="ion-navicon"></i
            ></a>

            <ul class="main-menu" id="main-menu">
                <li v-show="esAdmin"><a @click="goToAdmin">Admin</a></li>
                <li v-show="!esAdmin"><a @click="goToLogin">Login</a></li>
                <li><a @click="fetch_all_docs">PUBLICACIONES</a></li>
                <li class="drop-down">
                    <a @mouseenter="muestraMenu" ref="desplegable"
                        >TEMAS<i class="ion-arrow-down-b"></i
                    ></a>
                    <ul
                        @mouseleave="ocultaMenu"
                        class="drop-down-menu drop-down-inner"
                    >
                        <li v-for="(item, index) in categorias" :key="index">
                            <a @click="search_theme(item.id)">{{
                                item.descripcion
                            }}</a>
                        </li>
                    </ul>
                </li>
                <li class="drop-down">
                    <a @click="all_actions">DECLARACIONES</a>
                </li>

                <li><a @click="all_authors">AUTORES</a></li>
                <li><a @click="all_documents">DOCUMENTOS</a></li>
            </ul>
            <div class="clearfix"></div>
        </div>
    </header>
</template>

<script>
import JQuery from "jquery";
let $ = JQuery;
import logo from "../media/LogoCeccam.png";
import home from "../media/home.png";
import VueRouter from "vue-router";

$(document).ready(function(e) {
    $(".search-panel .dropdown-menu")
        .find("a")
        .click(function(e) {
            e.preventDefault();
            var param = $(this)
                .attr("href")
                .replace("#", "");
            var concept = $(this).html();
            $(".search-panel span#search_concept").html(concept);
            $(".input-group #search_param").val(param);
        });
});

export default {
    name: "header-component",

    data() {
        return {
            logo: logo,
            home: home,
            searchString: null,
            typeOfSearch: null,
            categorias: [],
            // FIXME Esta variable es de prueba
            esAdmin: null
        };
    },

    created() {
        axios({
            url: "/categorias"
        }).then(resp => {
            // console.log(resp.data);
            this.categorias = resp.data;
            axios({
                method: "post",
                url: "/testauth"
            }).then(resp => {
                if (resp.data.id != null && resp.data.id != " ") {
                    console.log("Auth");
                    this.esAdmin = true;
                } else {
                    console.log("No auth");
                    this.esAdmin = false;
                }
            });
        });
    },

    methods: {
        muestraMenu() {
            this.$refs.desplegable.classList.add("mouseover");
        },

        ocultaMenu() {
            this.$refs.desplegable.classList.remove("mouseover");
        },

        search() {
            // console.log(this.searchString);
            if (this.typeOfSearch == null) {
                this.$router.push({
                    name: "publicacionportema",
                    params: { tema: this.searchString }
                });
            } else {
                this.$router.push({
                    name: "noticiaportema",
                    params: { tema: this.searchString }
                });
            }
        },

        gohome() {
            this.$router.push({
                name: "home"
            });
        },

        goToNosotros() {
            this.$router.push({
                name: "nosotros"
            });
        },

        // getCategorias() {
        //     console.log("getcategoriasss");

        //     axios({
        //         url: "/categorias"
        //     }).then(resp => {
        //         console.log(resp.data);
        //         this.categorias = resp.data;
        //     });
        // },

        //publicaciones
        fetch_all_docs() {
            this.$router.push({ name: "todaspublicaciones" });
        },

        all_authors() {
            this.$router.push({ name: "todosautores" });
        },
        all_documents() {
            this.$router.push({ name: "todosdocumentos" });
        },
        all_actions() {
            this.$router.push({ name: "todasacciones" });
        },
        display_menu() {
            this.$refs.menubtn.classList.add("show");
        },

        hide_menu() {
            this.$refs.menubtn.classList.remove("show");
        },

        search_theme(theme) {
            // let tema = parseInt(theme);
            // this.$router.push({
            //     name: "publicacionportema",
            //     params: { tema: tema }
            // });
            // let tema = parseInt(theme);
            this.$router.push({
                name: "temasnoticiaspublicaciones",
                params: { tema: theme }
            });
        },

        changeString(value) {
            value == "noticias"
                ? (this.typeOfSearch = "noticias")
                : (this.typeOfSearch = "publicaciones");
        },

        //NOTE Remove this method, testing purpose only.
        goToAdmin() {
            this.$router.push({ name: "adminHome" });
            // location.replace("login");
        },
        goToLogin() {
            // this.$router.push({ name: "adminHome" });
            location.replace("login");
        }
    }
};
</script>

<style lang="scss" scoped>
a:hover {
    cursor: pointer;
}

*,
*:before,
*:after {
    box-sizing: border-box;
}

.sr-only {
    position: absolute;
    width: 1px;
    height: 1px;
    padding: 0;
    margin: -1px;
    overflow: hidden;
    clip: rect(0, 0, 0, 0);
    border: 0;
}

body,
html {
    width: 100%;
    height: 100%;
}

.mydrop {
    transform: translate3d(10.5em, 1em, 0px) !important;
}

.mybtn {
    width: 10em !important;
}

.myform {
    width: 70% !important;
}

.myinput {
    margin-left: 1em;
    width: 80% !important;
    display: inline !important;
}

@media only screen and (max-width: 768px) {
    // .mydrop {
    //     transform: translate3d(7em, 2em, 0px) !important;
    // }
    li {
        font-size: 0.7em !important;
    }

    .myinput {
        margin-left: 4em;
        width: 90% !important;
    }
}
</style>
