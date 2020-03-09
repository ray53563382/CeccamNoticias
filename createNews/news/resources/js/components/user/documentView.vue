<template>
    <div>
        <div class="row">
            <div class="col-12">
                <Header></Header>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <img :src="docImage" alt="" style="width:65% !important" />
                    <h3 class="mt-30">
                        <b>{{ docTitle }}</b>
                    </h3>
                    <ul class="list-li-mr-20 mtb-15">
                        <li>
                            Por: <b>{{ docAutor }} </b>{{ docDate }}
                        </li>
                    </ul>
                    <div
                        v-html="docTextBody"
                        class="col-12 testy"
                        style="margin-bottom:5%"
                    ></div>
                    <div class="brdr-ash-1 opacty-5"></div>
                </div>
                <!-- col-md-9 -->

                <div class="d-none d-md-block d-lg-none col-md-3"></div>
                <div class="col-md-6 col-lg-4">
                    <div class="pl-20 pl-md-0">
                        <div class="mtb-50">
                            <popularPost></popularPost>
                        </div>
                        <!-- mtb-50 -->
                    </div>
                    <!--  pl-20 -->
                </div>
                <!-- col-md-3 -->
            </div>
        </div>
        <!-- row -->

        <div class="container" v-if="registros.length != 0">
            <h4 class="p-title mt-50"><b>Te podría interesar</b></h4>
            <div class="row">
                <div class="col-12 col-lg-3 col-md-6 box">
                    <img
                        @click="goToDocumentView(registros[0].id)"
                        :src="registros[0].imgdesmostrativa"
                        style="width: 100%; height: 300px;cursor:pointer !important"
                    />
                    <h4 class="pt-20">
                        <a
                            ><b style="color: black;">{{
                                registros[0].titulo
                            }}</b></a
                        >
                    </h4>
                    <ul style="margin-left: 0px;">
                        <li class="color-lite-black">
                            Autor:
                            <a
                                @click="
                                    veAlAutorPublicaciones(registros[0].autor)
                                "
                                style="cursor:pointer !important"
                                class="color-black"
                                ><b>{{ registros[0].autor }},</b></a
                            >
                            <br />
                            {{ registros[0].fecha }}
                        </li>
                    </ul>
                </div>
                <div class="col-12 col-lg-3 col-md-6 box">
                    <img
                        @click="goToDocumentView(registros[1].id)"
                        :src="registros[1].imgdesmostrativa"
                        style="width: 100%; height: 300px;cursor:pointer !important"
                    />
                    <h4 class="pt-20">
                        <a
                            ><b style="color: black;">{{
                                registros[1].titulo
                            }}</b></a
                        >
                    </h4>
                    <ul style="margin-left: 0px;">
                        <li class="color-lite-black">
                            Autor:
                            <a
                                @click="
                                    veAlAutorPublicaciones(registros[1].autor)
                                "
                                class="color-black"
                                style="cursor:pointer !important"
                                ><b>{{ registros[1].autor }},</b></a
                            >
                            <br />
                            {{ registros[1].fecha }}
                        </li>
                    </ul>
                </div>
                <div class="col-12 col-lg-3 col-md-6 box">
                    <img
                        @click="goToDocumentView(registros[2].id)"
                        :src="registros[2].imgdesmostrativa"
                        alt=""
                        style="width: 100%; height: 300px;cursor:pointer !important"
                    />
                    <h4 class="pt-20">
                        <a
                            ><b style="color: black;">{{
                                registros[2].titulo
                            }}</b></a
                        >
                    </h4>
                    <ul style="margin-left: 0px;">
                        <li class="color-lite-black">
                            Autor:
                            <a
                                @click="
                                    veAlAutorPublicaciones(registros[2].autor)
                                "
                                class="color-black"
                                style="cursor:pointer !important"
                                ><b>{{ registros[2].autor }},</b></a
                            >
                            <br />
                            {{ registros[2].fecha }}
                        </li>
                    </ul>
                </div>
                <div class="col-12 col-lg-3 col-md-6 box">
                    <img
                        @click="goToDocumentView(registros[3].id)"
                        :src="registros[3].imgdesmostrativa"
                        alt=""
                        style="width: 100%; height: 300px;cursor:pointer !important"
                    />
                    <h4 class="pt-20">
                        <a
                            ><b style="color: black;">{{
                                registros[3].titulo
                            }}</b></a
                        >
                    </h4>
                    <ul style="margin-left: 0px;">
                        <li class="color-lite-black">
                            Autor:
                            <a
                                @click="
                                    veAlAutorPublicaciones(registros[3].autor)
                                "
                                class="color-black"
                                style="cursor:pointer !important"
                                ><b>{{ registros[3].autor }},</b></a
                            >
                            <br />
                            {{ registros[3].fecha }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="row" style="margin-top:3%">
            <div class="col-12">
                <Footer></Footer>
            </div>
        </div>
    </div>
</template>

<script>
import VueRouter from "vue-router";
import logito from "../media/home.png";
import Header from "./header";
import Footer from "./footer";
import Vue from "vue";
import VueLoading from "vuejs-loading-plugin";
Vue.use(VueLoading, {
    text: "Cargando"
});

export default {
    name: "documentview",
    components: {
        Header,
        Footer
    },
    data() {
        return {
            docTitle: null,
            docDate: null,
            docAutor: null,
            docTheme: null,
            docImage: null,
            docTextBody: null,
            logito: logito,
            dataID: "hey",
            registros: [],
            categorias: [
                "null",
                "Crisis climática y conservación",
                "Minería",
                "Hidroeléctricas y eólicas",
                "Petróleo fracking y gasoductos",
                "Derechos indígenas",
                "Tierra y territorio",
                "Agua",
                "Bosques y deforestación",
                "Megaproyectos"
            ]
        };
    },
    methods: {
        goToDocumentView(data) {
            // location.replace("/documentView/" + data);
            const path = "/documentView/" + data;
            if (this.$route.path !== path) {
                this.$router.push(path);
            }
        },
        veAlAutorPublicaciones(autor) {
            this.$router.push({
                name: "publicacionesautor",
                params: { autor: autor }
            });
        }
    },
    created() {
        this.$loading(true);
        axios
            .post("/popularPostMedium")
            .then(resp => {
                resp.data.forEach(element => {
                    this.registros.push(element);
                });
            })
            .catch(Error => {
                console.log(Error);
            });

        axios({
            method: "post",
            url: "/getDocument",
            data: {
                id: this.$route.params.id
            }
        })
            .then(resp => {
                this.docTitle = resp.data[0].titulo;
                this.docDate = resp.data[0].fecha;
                this.docAutor = resp.data[0].autor;
                this.docTheme = this.categorias[resp.data[0].idcategoria];
                this.docImage = resp.data[0].imgdesmostrativa;
                this.docTextBody = resp.data[0].informacionArt;
                this.$loading(false);
            })
            .catch(Error => console.log(Error));
    }
};
</script>

<style scoped>
.testy >>> div > div > div > span > img {
    width: 24% !important;
    margin: 4em 1em 2em 1em;
}

.placeholder {
    height: fit-content;
    width: 100%;
}

.file-icon {
    width: 10% !important;
}

.mt-30 {
    margin-top: 30px !important;
}

.list-li-mr-20 > li {
    margin-right: 20px;
}

.mtb-15 {
    margin-top: 15px !important;
    margin-bottom: 15px !important;
}

.brdr-ash-1 {
    height: 1px;
    background: #aaa;
}

.opacty-5 {
    opacity: 0.5;
}

.p-title {
    position: relative;
    padding-bottom: 20px;
    margin-bottom: 40px;
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

.mt-50 {
    margin-top: 50px !important;
}

.pt-20 {
    padding-top: 20px !important;
}

.pt-10 {
    padding-top: 10px !important;
}

.list-a-pt-10 > li > a {
    padding-top: 10px;
}

.list-li-pt-10 > li {
    padding-top: 10px;
}

.mb-30 {
    margin-bottom: 30px !important;
}

.color-lite-black {
    color: #888;
}

.color-black {
    color: #111;
}

.color-primary {
    color: #f9b500;
}

.mr-5 {
    margin-right: 5px !important;
}
</style>
