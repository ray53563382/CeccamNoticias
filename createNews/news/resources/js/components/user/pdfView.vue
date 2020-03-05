<template>
    <div>
        <div class="row">
            <div class="col-12">
                <Header></Header>
            </div>
        </div>

        <div class="container">
            <div class="row my-5">
                <div class="col-lg-8 col-md-7 col-sm-12">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 my-5">
                                <p class="h1 text-muted">{{ docTitle }}</p>
                                <!-- <p class="h1 text-muted">{{docTitle}}</p> -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="container">
                                <div class="row">
                                    <div class="col-4">
                                        <p>Por: {{ docAutor }}</p>
                                    </div>
                                    <!-- <div class="col-4">
                                    <p class="h5">Tema: {{ docTheme }}</p>
                                </div> -->
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <p class="h6">{{ docDate }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <img
                                            :src="docImage"
                                            alt
                                            class="img-fluid img-thumbnail"
                                            style="width: 117px;"
                                        />
                                    </div>
                                </div>
                                <div class="row my-5">
                                    <div class="container">
                                        <div
                                            v-html="docTextBody"
                                            class="col-12"
                                        ></div>
                                    </div>
                                </div>
                                <div class="row my-5">
                                    <div class="col-12">
                                        <p>
                                            <a
                                                ref="downloadpdf"
                                                @click="goToDownload"
                                                class="buttonDownload"
                                                style="float: right;"
                                                >Descarga pdf</a
                                            >
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class=" col-lg-4 col-md-5 col-sm-12">
                    <popularPost></popularPost>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <Footer></Footer>
            </div>
        </div>
    </div>
</template>

<script>
// import logito from "../media/home.png";
import Header from "./header";
import Footer from "./footer";

export default {
    name: "pdfview",
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
            docId: null,
            docDate: null,
            docAutor: null,
            docDescarga: null,
            docTags: ["America", "Asia", "Mexico"],
            docDownloadURL: "http://someurl.com",
            docTheme: null,
            docImage: null,
            docTextBody: null,
            dataID: "hey",
            pdfdown: null,
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
        goToDownload() {
            this.docDescarga = this.docDescarga + 1;
            const params = {
                descarga: this.docDescarga
            };
            axios.post(`/download/${this.docId}`, params).then(res => {});
        }
    },

    created() {
        axios({
            method: "post",
            url: "/getpdf",
            data: {
                id: this.$route.params.id
            }
        })
            .then(resp => {
                this.docId = resp.data[0].id;
                this.docTitle = resp.data[0].nombre;
                this.docDate = resp.data[0].fecha;
                this.docDescarga = resp.data[0].descarga;
                this.docImage = resp.data[0].imgdesmostrativa;
                this.docTextBody = resp.data[0].informacion;
                this.$refs.downloadpdf.download = "documento.pdf";
                this.$refs.downloadpdf.href = resp.data[0].pdf;
            })
            .catch(Error => console.log(Error));
    }
};
</script>

<style lang="scss" scoped>
.placeholder {
    height: fit-content;
    width: 100%;
    // background-color: #151515;
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

/* keyframes for the download icon anim */
@keyframes downloadArrow {
    /* 0% and 0.001% keyframes used as a hackish way of having the button frozen on a nice looking frame by default */
    0% {
        margin-top: -7px;
        opacity: 1;
    }

    0.001% {
        margin-top: -15px;
        opacity: 0;
    }

    50% {
        opacity: 1;
    }

    100% {
        margin-top: 0;
        opacity: 0;
    }
}
</style>
