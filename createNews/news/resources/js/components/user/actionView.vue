<template>
    <div>
        <div class="container my-4">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <img :src="docImage" alt="" />
                    <h3 class="mt-30">
                        <b>{{ docTitle }}</b>
                    </h3>
                    <ul class="list-li-mr-20 mtb-15">
                        <li>
                            Por : <b>{{ docAutor }}, </b> <i>{{ docDate }}</i>
                        </li>
                    </ul>
                    <div
                        v-html="docTextBody"
                        class="col-12 testy"
                        style="margin-bottom:5%"
                    ></div>
                    <div
                        v-show="showvideo"
                        class="col-md-12 col-lg-8 .embed-responsive"
                    >
                        <div class="col-lg-4 my-4">
                            <iframe
                                width="360"
                                height="240"
                                :src="'https://www.youtube.com/embed/' + docURL"
                                frameborder="0"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen
                            ></iframe>
                        </div>
                    </div>
                    <div v-show="showdescarga" class="col-md-12 col-lg-8">
                        <div class="col-12">
                            <p>
                                <a ref="downloadpdf" class="buttonDownload"
                                    >Descarga pdf</a
                                >
                            </p>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-8 my-5">
                        <a @click="searchtheme(docThemeID)">
                            <p>
                                <b>Categoría: </b>
                                <span class="hoverevent">{{ docTheme }}</span>
                            </p>
                        </a>
                    </div>

                    <div class="brdr-ash-1 opacty-5"></div>
                </div>
                <!-- col-md-9 -->

                <div class="d-none d-md-block d-lg-none col-md-3"></div>
                <div class="col-md-6 col-lg-4">
                    <div class="pl-20 pl-md-0">
                        <div class="mtb-50"><popularPost></popularPost></div>
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
                <div
                    class="col-12 col-lg-3 col-md-6 box"
                    @click="goToDocumentView(registros[0].id)"
                >
                    <img
                        :src="registros[0].imgdesmostrativa"
                        alt=""
                        style="width: 100%; height: 300px;"
                    />
                    <h4 class="pt-20">
                        <a href="#"
                            ><b style="color: black;">{{
                                registros[0].titulo
                            }}</b></a
                        >
                    </h4>
                    <ul style="margin-left: 0px;">
                        <li class="color-lite-black">
                            Autor:
                            <a href="#" class="color-black"
                                ><b>{{ registros[0].autor }},</b></a
                            >
                            <br />
                            {{ registros[0].fecha }}
                        </li>
                    </ul>
                </div>
                <div
                    class="col-12 col-lg-3 col-md-6 box"
                    @click="goToDocumentView(registros[1].id)"
                >
                    <img
                        :src="registros[1].imgdesmostrativa"
                        alt=""
                        style="width: 100%; height: 300px;"
                    />
                    <h4 class="pt-20">
                        <a href="#"
                            ><b style="color: black;">{{
                                registros[1].titulo
                            }}</b></a
                        >
                    </h4>
                    <ul style="margin-left: 0px;">
                        <li class="color-lite-black">
                            Autor:
                            <a href="#" class="color-black"
                                ><b>{{ registros[1].autor }},</b></a
                            >
                            <br />
                            {{ registros[1].fecha }}
                        </li>
                    </ul>
                </div>
                <div
                    class="col-12 col-lg-3 col-md-6 box"
                    @click="goToDocumentView(registros[2].id)"
                >
                    <img
                        :src="registros[2].imgdesmostrativa"
                        alt=""
                        style="width: 100%; height: 300px;"
                    />
                    <h4 class="pt-20">
                        <a href="#"
                            ><b style="color: black;">{{
                                registros[2].titulo
                            }}</b></a
                        >
                    </h4>
                    <ul style="margin-left: 0px;">
                        <li class="color-lite-black">
                            Autor:
                            <a href="#" class="color-black"
                                ><b>{{ registros[2].autor }},</b></a
                            >
                            <br />
                            {{ registros[2].fecha }}
                        </li>
                    </ul>
                </div>
                <div
                    class="col-12 col-lg-3 col-md-6 box"
                    @click="goToDocumentView(registros[3].id)"
                >
                    <img
                        :src="registros[3].imgdesmostrativa"
                        alt=""
                        style="width: 100%; height: 300px;"
                    />
                    <h4 class="pt-20">
                        <a href="#"
                            ><b style="color: black;">{{
                                registros[3].titulo
                            }}</b></a
                        >
                    </h4>
                    <ul style="margin-left: 0px;">
                        <li class="color-lite-black">
                            Autor:
                            <a href="#" class="color-black"
                                ><b>{{ registros[3].autor }},</b></a
                            >
                            <br />
                            {{ registros[3].fecha }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import logito from "../media/home.png";
import Header from "./header";
import Footer from "./footer";
import Vue from "vue";
import VueLoading from "vuejs-loading-plugin";
Vue.use(VueLoading, {
    text: "Cargando"
});

export default {
    name: "actionview",
    // props: ["sendData"],
    props: {
        myid: {
            required: false
        }
    },

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
            docEtiquetas: null,
            docURL: null,
            docThemeID: null,
            showvideo: false,
            showdescarga: false,
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
        goToDocumentView(id) {
            const path = "/documentView/" + id;
            if (this.$route.path !== path) {
                this.$router.push(path);
            }
            // location.replace("/documentView/" + id);
        },
        searchtheme(id) {
            location.replace("/searchbytheme/" + id);
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
            .catch(error => {
                console.log(error);
            });

        axios({
            method: "post",
            url: "/getAction",
            data: {
                id: this.$route.params.id
            }
        })
            .then(resp => {
                // console.log(resp);
                if (resp.data.url == null) {
                    console.log("uno");

                    if (resp.data.pdf == null) {
                        console.log("pdf null");
                        this.docTitle = resp.data.titulo;
                        this.docDate = resp.data.fecha;
                        this.docAutor = resp.data.autor;
                        this.docTheme = this.categorias[resp.data.idcategoria];
                        this.docImage = resp.data.imgdesmostrativa;
                        this.docTextBody = resp.data.informacionArt;
                        this.docThemeID = resp.data.idcategoria;
                        this.$loading(false);
                    } else {
                        console.log("pdf no null");
                        this.showdescarga = true;
                        this.docTitle = resp.data.titulo;
                        this.docThemeID = resp.data.idcategoria;
                        this.docDate = resp.data.fecha;
                        this.docAutor = resp.data.autor;
                        this.docTheme = this.categorias[resp.data.idcategoria];
                        this.docImage = resp.data.imgdesmostrativa;
                        this.docTextBody = resp.data.informacionArt;
                        this.$refs.downloadpdf.download = "documento.pdf";
                        this.$refs.downloadpdf.href = resp.data.pdf;
                        this.$loading(false);
                    }
                } else {
                    console.log("dos");

                    if (resp.data.pdf == null) {
                        this.showvideo = true;
                        this.docTitle = resp.data.titulo;
                        this.docThemeID = resp.data.idcategoria;
                        this.docDate = resp.data.fecha;
                        this.docAutor = resp.data.autor;
                        this.docTheme = this.categorias[resp.data.idcategoria];
                        this.docImage = resp.data.imgdesmostrativa;
                        this.docTextBody = resp.data.informacionArt;
                        let url = resp.data.url.split("v=");
                        this.docURL = url[1];
                        this.$loading(false);
                    } else {
                        this.docTitle = resp.data.titulo;
                        this.docDate = resp.data.fecha;
                        this.docThemeID = resp.data.idcategoria;
                        this.docAutor = resp.data.autor;
                        this.docTheme = this.categorias[resp.data.idcategoria];
                        this.docImage = resp.data.imgdesmostrativa;
                        this.docTextBody = resp.data.informacionArt;
                        this.showdescarga = true;
                        this.showvideo = true;
                        this.$refs.downloadpdf.download = "documento.pdf";
                        this.$refs.downloadpdf.href = resp.data.pdf;
                        let url = resp.data.url.split("v=");
                        this.docURL = url[1];
                        this.$loading(false);
                    }
                }
            })
            .catch(Error => console.log(Error));
    }
};
</script>

<style scoped>
.hoverevent:hover {
    cursor: pointer;
}

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
.buttonDownload {
    display: inline-block;
    position: relative;
    padding: 10px 25px;

    background-color: #4cc713;
    color: white;

    font-family: sans-serif;
    text-decoration: none;
    font-size: 0.9em;
    text-align: center;
    text-indent: 15px;
}

.buttonDownload:hover {
    background-color: #333;
    color: white;
}

.buttonDownload:before,
.buttonDownload:after {
    content: " ";
    display: block;
    position: absolute;
    left: 15px;
    top: 52%;
}

/* Download box shape  */
.buttonDownload:before {
    width: 10px;
    height: 2px;
    border-style: solid;
    border-width: 0 2px 2px;
}

/* Download arrow shape */
.buttonDownload:after {
    width: 0;
    height: 0;
    margin-left: 3px;
    margin-top: -7px;

    border-style: solid;
    border-width: 4px 4px 0 4px;
    border-color: transparent;
    border-top-color: inherit;

    animation: downloadArrow 2s linear infinite;
    animation-play-state: paused;
}

.buttonDownload:hover:before {
    border-color: #4cc713;
}

.buttonDownload:hover:after {
    border-top-color: #4cc713;
    animation-play-state: running;
}
</style>
