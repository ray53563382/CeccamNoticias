<template>
    <div id="app">
        <footer class="bg-191 color-ccc">
            <div class="container">
                <div class="pt-50 pb-20 pos-relative">
                    <div class="abs-tblr pt-50 z--1 text-center">
                        <div class="h-80 pos-relative">
                            <img class="opacty-1 h-100 w-auto" src="" alt="" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="mb-30">
                                <a href="#"
                                    ><img :src="logo" style="width:86%"
                                /></a>
                                <p class="mtb-20 color-ccc">
                                    Teléfonos : (55) 5661 19 25 - (55) 5661 53
                                    98
                                </p>
                                <p class="color-ash">
                                    Copyright &copy; Todos los derechos
                                    reservados
                                    <br />
                                    | Crisis climática y autonomía.
                                </p>
                            </div>
                            <!-- mb-30 -->
                        </div>
                        <!-- col-md-4 -->

                        <div class="col-sm-4">
                            <div class="mb-30">
                                <h5 class="color-primary mb-20">
                                    <b>PUBLICACIONES</b>
                                </h5>
                                <div class="mb-20">
                                    <a
                                        style="cursor:pointer"
                                        class="color-white"
                                        @click="todosAutores"
                                        ><b>AUTORES</b></a
                                    >
                                    <!-- <h6 class="mt-10">Jan 25, 2018</h6> -->
                                </div>
                                <div class="brdr-ash-1 opacty-2 mr-30"></div>
                                <div class="mt-20">
                                    <a
                                        class="color-white"
                                        style="cursor:pointer"
                                        @click="todasPublicaciones"
                                        ><b>PUBLICACIONES RECIENTES.</b></a
                                    >
                                    <!-- <h6 class="mt-10">Jan 25, 2018</h6> -->
                                </div>
                            </div>
                            <!-- mb-30 -->
                        </div>
                        <!-- col-md-4 -->

                        <div class="col-sm-4">
                            <div class="mb-30">
                                <h5 class="color-primary mb-20">
                                    <b>DOCUMENTOS</b>
                                </h5>
                                <div class="mb-20">
                                    <a
                                        class="color-white"
                                        style="cursor:pointer"
                                        @click="todosDocumentos"
                                        ><b>VER TODOS LOS DOCUMENTOS</b></a
                                    >
                                    <!-- <h6 class="mt-10">Jan 25, 2018</h6> -->
                                </div>
                                <div class="brdr-ash-1 opacty-2 mr-30"></div>
                                <!-- <div class="mt-20">
                                <a class="color-white" href="#"
                                    ><b
                                        >Bitcoin's roller coster ride is not
                                        over</b
                                    ></a
                                >
                                <h6 class="mt-10">Jan 25, 2018</h6>
                            </div> -->
                            </div>
                            <!-- mb-30 -->
                        </div>
                        <!-- col-md-4 -->
                    </div>
                    <!-- row -->
                </div>
                <!-- ptb-50 -->

                <div class="brdr-ash-1 opacty-2"></div>

                <div
                    class="oflow-hidden color-ash font-9 text-sm-center ptb-sm-5"
                >
                    <ul
                        class="float-left float-sm-none list-a-plr-10 list-a-plr-sm-5 list-a-ptb-15 list-a-ptb-sm-10"
                    >
                        <!-- <li>
                        <a class="pl-0 pl-sm-10" href="#">Terms & Conditions</a>
                    </li> -->
                        <li>
                            <a style="cursor:pointer" @click="goToNosotros"
                                >SOBRE NOSOTROS</a
                            >
                        </li>
                        <!-- <li><a href="#">Contact us</a></li> -->
                    </ul>
                    <ul
                        class="float-right float-sm-none list-a-plr-10 list-a-plr-sm-5 list-a-ptb-15 list-a-ptb-sm-5"
                    >
                        <li>
                            <a
                                class="pl-0 pl-sm-10"
                                href="https://www.facebook.com/ceccam.org"
                                ><i class="ion-social-facebook"></i
                            ></a>
                        </li>
                        <li>
                            <a href="https://twitter.com/Ceccam9"
                                ><i class="ion-social-twitter"></i
                            ></a>
                        </li>
                        <li>
                            <a
                                href="https://www.youtube.com/channel/UC0WRsxDsAxyG8y_PkcKJA-w"
                                ><i class="ion-social-youtube"></i
                            ></a>
                        </li>
                    </ul>
                </div>
                <!-- oflow-hidden -->
            </div>
            <!-- container -->
        </footer>
    </div>
</template>

<script>
import logo from "../media/LogoCeccam.png";

export default {
    data() {
        return {
            logo: logo
        };
    },

    methods: {
        goToNosotros() {
            this.$router.push({
                name: "nosotros"
            });
        },

        todosAutores() {
            this.$router.push({ name: "todosautores" });
        },
        todasPublicaciones() {
            this.$router.push({ name: "todaspublicaciones" });
        },
        todosDocumentos() {
            this.$router.push({ name: "todosdocumentos" });
        }
    }
};
</script>

<style lang="scss" scoped>
// .footer-main {
//     width: 100%;
//     height: 20em;
//     background-color: #15151511;
// }

// .icon-footer {
//     height: 1.8em;
// }

// .footer-logo {
//     height: 5em;
// }

// .p-footer {
//     color: black;
//     font-weight: bold;
// }
</style>
