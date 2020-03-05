<template>
    <div class="container">
        <div class="h-600x h-sm-auto">
            <div class="h-2-3 h-sm-auto oflow-hidden">
                <div
                    class="pb-5 pr-5 pr-sm-0 float-left float-sm-none w-2-3 w-sm-100 h-100 h-sm-300x"
                >
                    <a class="pos-relative h-100 dplay-block" href="#">
                        <div class="img-bg bg-1 bg-grad-layer-6"></div>

                        <div class="abs-blr text-light p-20 bg-sm-color-7">
                            <h3 class="mb-15 mb-sm-5 font-sm-13 myfont">
                                <b class="myfont"
                                    >Peter Thiels VC Found Invests Million into
                                    Bitcoin, Market Reacts</b
                                >
                            </h3>
                            <ul class="list-li-mr-20">
                                <li>
                                    by
                                    <span class="text-warning"
                                        ><b>Olivia Capzallo</b></span
                                    >
                                    Jan 25, 2018
                                </li>
                                <li>
                                    <i
                                        class="color-primary mr-5 font-12 ion-ios-bolt"
                                    ></i
                                    >30,190
                                </li>
                                <li>
                                    <i
                                        class="color-primary mr-5 font-12 ion-chatbubbles"
                                    ></i
                                    >30
                                </li>
                            </ul>
                        </div>
                        <!--abs-blr --> </a
                    ><!-- pos-relative -->
                </div>
                <!-- w-1-3 -->
            </div>
        </div>
    </div>

    <!-- <div class="container testy-img">
        <div class="row ">
            <div class="col-12">

            </div>
        </div>
    </div> -->
    <!-- <div
        @click="goToDocumentView"
        :style="{ backgroundImage: 'url(' + card_imagen + ' )' }"
        class="card  mt-lg-3 mx-lg-3 "
    >
        <div ref="transElement" class="transition-element">
            <p class="pl-3 pt-2  wraptext">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eaque
                officiis sed temporibus perferendis, ipsa velit illo, atque
                eligendi impedit enim libero veritatis praesentium modi minus
                recusandae inventore. Non, eveniet sunt.
            </p>
        </div>

        <div @mouseenter="displayElement" class="box">
            <div></div>

            <div class="tag-box ml-3">
                <div class="px-2">
                    <p>{{ card_category }}</p>
                </div>
            </div>

            <P v-html="card_title" class="title-box ml-3 turn-black"></P>

            <p class="autor-box ml-3 turn-black">{{ card_autor }}</p>
        </div>
    </div> -->
</template>

<script>
// import { bus } from "../media/bus";

export default {
    name: "card",

    props: {
        arrayindex: {
            required: true
        }
    },

    data() {
        return {
            card_title: null,
            card_description: null,
            card_autor: null,
            card_imagen: null,
            card_category: null,
            card_id: null,
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
            ],
            relevantes: [],
            index_carousel: 0
            // arrindex: null
        };
    },

    methods: {
        displayElement() {
            // let transElement = this.$refs['transElement']
            // transElement.classList.add('display-class')
            // console.log(transElement);
        },

        goToDocumentView() {
            location.replace("/documentView/" + this.card_id);
        },

        carousel() {
            this.index_carousel >= this.relevantes.length - 1
                ? (this.index_carousel = 0)
                : this.index_carousel++;

            this.card_title = this.relevantes[this.index_carousel].titulo;
            this.card_description = this.relevantes[
                this.index_carousel
            ].informacionArt;
            this.card_autor = this.relevantes[this.index_carousel].autor;
            this.card_imagen = this.relevantes[
                this.index_carousel
            ].imgdesmostrativa;
            this.card_category = this.categorias[
                this.relevantes[this.index_carousel].idcategoria
            ];
            this.card_id = this.relevantes[this.index_carousel].id;

            setTimeout(this.carousel, 6000);
        },

        runCarousel() {
            this.carousel();
        }
    },

    created() {
        EventBus.$on("bus_relevants", data => {
            this.card_title = data[this.arrayindex].titulo;
            this.card_description = data[this.arrayindex].informacionArt;
            this.card_autor = data[this.arrayindex].autor;
            this.card_imagen = data[this.arrayindex].imgdesmostrativa;
            this.card_id = data[this.arrayindex].id;
            this.card_category = this.categorias[
                data[this.arrayindex].idcategoria
            ];
            this.relevantes = data;
            this.index_carousel = this.arrayindex;
            // console.log(this.relevantes);
        });
    },

    mounted() {
        let vm = this;
        setTimeout(function() {
            vm.runCarousel();
        }, 9000);
    }
};
</script>

<style lang="scss" scoped>
@import url("https://fonts.googleapis.com/css?family=Barlow+Semi+Condensed:100i,400,700&display=swap");

.myfont {
    font-family: "ionicons";
}

.testy-img {
    background-image: url("../media/bitcoin.jpg");
    height: 10em;
}

.img-bg {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    z-index: 1;
}
.bg-1 {
    background: url("../media/bitcoin.jpg") no-repeat center;
    background-size: cover;
}
.abs-blr {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    z-index: 1;
}
.h-600x {
    height: 600px !important;
}
.h-2-3 {
    height: 66.666% !important;
}
.pos-relative {
    position: relative;
    z-index: 1;
}

.dplay-block {
    display: block;
}

.list-li-mr-20 > li {
    margin-right: 20px;
}

.w-2-3 {
    width: 66.666% !important;
}
.w-sm-100 {
    width: 100% !important;
}
.h-100 {
    height: 100% !important;
}

.pr-5 {
    padding-right: 5px !important;
}
.font-sm-13 {
    font-size: 1.3em;
}

.list-li-mr-20 > li {
    margin-right: 20px;
}

.float-left-right {
    overflow: hidden;
}
.h-600x {
    height: 600px !important;
}
.p-20 {
    padding: 20px !important;
}

.mb-15 {
    margin-bottom: 15px !important;
}

.bg-grad-layer-6:after {
    content: "";
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    z-index: -1;
    opacity: 0.6;
    background: linear-gradient(to top, #000 0%, rgba(0, 0, 0, 0.4) 100%);
}

h1,
h2,
h3,
h4,
h5,
h6,
p,
a,
ul,
span,
li,
img,
inpot,
button {
    margin: 0;
    padding: 0;
    text-decoration: none;
    list-style: none;
}

@font-face {
    font-family: "ionicons";
    src: url("../media/ionicons.ttf");
}

@media only screen and (max-width: 767px) {
    .bg-sm-color-6 {
        background: rgba(0, 0, 0, 0.6);
    }
    .bg-sm-color-7 {
        background: rgba(0, 0, 0, 0.7);
    }
}

@media only screen and (max-width: 767px) {
    .float-sm-none {
        float: none !important;
    }

    .text-sm-center {
        text-align: center;
    }

    .font-sm-13 {
        font-size: 1.3em;
    }
}

@media only screen and (max-width: 767px) {
    .h-sm-auto {
        height: auto !important;
    }
}

// @font-face { font-family: "Ionicons"; src: url("ionicons.eot?v=2.0.0"); src: url("ionicons.eot?v=2.0.0#iefix") format("embedded-opentype"), url("ionicons.ttf?v=2.0.0") format("truetype"), url("ionicons.woff?v=2.0.0") format("woff"), url("ionicons.svg?v=2.0.0#Ionicons") format("svg"); font-weight: normal; font-style: normal; }
// .ion, .ionicons, .ion-alert:before, .ion-alert-circled:before, .ion-android-add:before,

// @media only screen and (max-width: 600px) {
//     .box {
//         display: none;
//     }
//     .title-box {
//         font-size: 1em;
//     }
// }

// .wraptext {
//     text-overflow: hidden;
// }

// .card {
//     height: 15em;
//     width: 100%;
//     background-color: aliceblue;

//     .transition-element {
//         position: absolute;
//         display: block;
//         height: inherit;
//         width: 0em;
//         transition: width 1s;
//         // z-index: 9;
//         background-color: aliceblue;
//         overflow: hidden;

//         p {
//             opacity: 0;
//             animation: opacity 1s;
//         }
//     }
// }

// .card:hover > .transition-element {
//     // width: 38em;
//     width: 100%;
// }

// .card:hover > .box > .turn-black {
//     color: black;
// }
// .card:hover > .transition-element > p {
//     opacity: 1;
// }

// .box {
//     height: inherit;
//     width: inherit;
//     display: grid;
//     grid-template-columns: 100%;
//     // grid-template-rows: 55% 10% 20% 10%;
//     grid-template-rows: 45% 13% 25% 10%;

//     background: rgb(0, 0, 0);
//     background: linear-gradient(
//         0deg,
//         rgba(0, 0, 0, 0.7679446778711485) 0%,
//         rgba(0, 0, 0, 0.0760679271708683) 67%
//     );

//     .tag-box {
//         font-family: "Barlow Semi Condensed", sans-serif;
//         font-weight: 400;
//         z-index: 999;
//         color: rgb(238, 237, 237);

//         div {
//             height: fit-content;
//             width: fit-content;
//             background-color: rgba(21, 21, 21, 0.808);
//             border: 1px solid rgba(255, 255, 255, 0.89);

//             p {
//                 margin: 0 0 0 0;
//             }
//         }
//     }

//     .title-box {
//         font-family: "Barlow Semi Condensed", sans-serif;
//         font-weight: 700;
//         z-index: 999;
//         color: rgb(238, 237, 237);
//         font-size: 1.2em;
//     }

//     .autor-box {
//         font-family: "Barlow Semi Condensed", sans-serif;
//         font-weight: 100;
//         font-style: italic;
//         z-index: 999;
//         color: rgb(238, 237, 237);
//     }

//     .display-class {
//         display: block;
//         width: 38em;
//         height: 22em;
//     }

// @media only screen and (device-width: 375px) and (device-height: 812px) {
//     .box {
//         display: none !important;
//     }
// }
// }
</style>
