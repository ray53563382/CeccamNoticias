<template>
    <div
        @click="goToDocumentView"
        :style="{ backgroundImage: 'url(' + image + ' )' }"
        class="mini-card  my-3"
    >
        <div ref="transElement" class="transition-element">
            <p class="pl-3 pt-2">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius
                quas minus similique at. Autem expedita, quam reiciendis
                incidunt soluta blanditiis hic voluptas suscipit deserunt,
                harum, velit sapiente. Nihil, quidem corporis!Nulla deleniti
                eaque autem harum...
            </p>
        </div>

        <div @mouseenter="displayElement" class="box">
            <div></div>

            <div class="white-bg pt-3">
                <div class="tag-box mx-2 ml-lg-3">
                    <div>
                        <p>{{ this.category }}</p>
                    </div>
                </div>

                <P class="title-box px-3 my-3 h5 ml-sm-2 ml-lg-3 turn-black">{{
                    this.title
                }}</P>

                <p class="autor-box h5 px-3 ml-lg-3 turn-black">
                    POr: {{ this.author }}
                </p>
                <p class="my-3">
                    {{ this.fecha }}
                </p>
            </div>
        </div>
    </div>
</template>

<script>
import { bus } from "../media/bus";

export default {
    name: "minicard",

    props: {
        documents: {
            requiered: true
        },

        objectArray: {
            required: true
        }
    },

    data() {
        return {
            // image: image
            title: null,
            category: null,
            author: null,
            image: null,
            id: null,
            fecha: null,
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
        displayElement() {
            // let transElement = this.$refs['transElement']
            // transElement.classList.add('display-class')
            // console.log(transElement);
        },
        goToDocumentView() {
            location.replace("/documentView/" + this.id);
        }
    },

    created() {
        // console.log(this.documents);
        this.title = this.documents[this.objectArray].titulo;
        this.category = this.categorias[
            this.documents[this.objectArray].idcategoria
        ];
        this.author = this.documents[this.objectArray].autor;
        this.id = this.documents[this.objectArray].id;
        this.fecha = this.documents[this.objectArray].fecha;
        this.image = this.documents[this.objectArray].imgdesmostrativa;
    }
};
</script>

<style lang="scss" scoped>
@import url("https://fonts.googleapis.com/css?family=Barlow+Semi+Condensed:100i,400,700&display=swap");

// @media only screen and (min-width: 1024px) and (max-height: 1366px) and (-webkit-min-device-pixel-ratio: 1.5) {
//     .autor-date-container {
//     }
//     .newscard {
//         height: 20em;
//     }
// }

// @media only screen and (min-width: 768px) and (max-width: 1024px) {
//     .box > .tag-box {
//         font-size: 1.5em !important;
//     }
// }

@media only screen and (max-width: 600px) {
    .box > p {
        font-size: 1.5em !important;
    }
}

.mini-card {
    position: relative;
    height: 30em;
    // width: 22em;
    width: 100%;
    background-color: aliceblue;
    // background-image: url("http://source.unsplash.com/random/660x600");

    // z-index: 10;

    .transition-element {
        position: absolute;
        display: block;
        height: inherit;
        width: 0em;
        transition: width 1s;
        // z-index: 9;
        background-color: aliceblue;
        overflow: hidden;

        p {
            opacity: 0;
            animation: opacity 1s;
        }
    }
}

.mini-card:hover > .transition-element {
    // width: 22em;
    width: 100%;
}

.mini-card:hover > .box > .turn-black {
    color: black;
}
.mini-card:hover > .transition-element > p {
    opacity: 1;
}

.mini-card:hover {
    -webkit-box-shadow: 2px 3px 10px -1px rgba(0, 0, 0, 0.75);
    -moz-box-shadow: 2px 3px 10px -1px rgba(0, 0, 0, 0.75);
    box-shadow: 2px 3px 10px -1px rgba(0, 0, 0, 0.75);
}

.box {
    height: inherit;
    width: 100%;
    display: grid;
    grid-template-columns: 100%;
    grid-template-rows: repeat(2, 50%);
    background: rgb(0, 0, 0);
    background: linear-gradient(
        0deg,
        rgba(0, 0, 0, 0.7679446778711485) 0%,
        rgba(0, 0, 0, 0.0760679271708683) 67%
    );

    .white-bg {
        z-index: 999;
        height: 100%;
        // width: fit-content;
        background-color: aliceblue;
        border: 1px solid rgba(0, 0, 0, 0.4);
        border-radius: 3px;
    }

    .tag-box {
        font-family: "Barlow Semi Condensed", sans-serif;
        font-weight: 400;
        z-index: 999;
        color: rgb(238, 237, 237);

        div {
            height: fit-content;
            width: fit-content;
            background-color: rgba(21, 21, 21, 0.808);
            border: 1px solid rgba(255, 255, 255, 0.89);

            p {
                margin: 0 0 0 0;
            }
        }
    }

    .title-box {
        font-family: "Barlow Semi Condensed", sans-serif;
        font-weight: 700;
        z-index: 999;
        color: #151515;
        // font-size: 1.5em;
    }

    .autor-box {
        font-family: "Barlow Semi Condensed", sans-serif;
        font-weight: 100;
        font-style: italic;
        z-index: 999;
        color: #151515;
        // font-size: 1.1em;
    }

    .display-class {
        display: block;
        width: 38em;
        height: 22em;
    }
}
</style>
