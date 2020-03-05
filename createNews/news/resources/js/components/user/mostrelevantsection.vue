<template>
    <div class="container">
        <!-- <div>
            <h2>{{ relevantes[0].fecha }}</h2>
        </div> -->

        <div class="h-600x h-sm-auto">
            <div class="h-2-3 h-sm-auto oflow-hidden">
                <div
                    class="pb-5 pr-5 pr-sm-0 float-left float-sm-none w-2-3 w-sm-100 h-100 h-sm-300x relevant"
                >
                    <a
                        class="pos-relative h-100 dplay-block hoverevent"
                        @click="goToDocumentView(relevantes[0].id)"
                    >
                        <div
                            v-if="relevantes[0].imgdesmostrativa != undefined"
                            :style="{
                                backgroundImage:
                                    'url(' +
                                    relevantes[0].imgdesmostrativa +
                                    ' ) '
                            }"
                            class="img-bg  bg-grad-layer-6"
                        ></div>

                        <div class="abs-blr color-white p-20 bg-sm-color-7">
                            <h3 class="mb-15 mb-sm-5 font-sm-13">
                                <b>{{ relevantes[0].titulo }}</b>
                            </h3>
                            <ul class="list-li-mr-20">
                                <li>
                                    Por:
                                    <span class="color-primary"
                                        ><b>{{ relevantes[0].autor }}</b></span
                                    >
                                    {{ relevantes[0].fecha }}
                                </li>
                            </ul>
                        </div>
                    </a>
                </div>

                <div
                    class="float-left float-sm-none w-1-3 w-sm-100 h-100 h-sm-600x"
                >
                    <div class="pl-5 pb-5 pl-sm-0 ptb-sm-5 pos-relative h-50">
                        <a
                            class="pos-relative h-100 dplay-block hoverevent"
                            @click="goToDocumentView(relevantes[1].id)"
                        >
                            <div
                                v-if="
                                    relevantes[1].imgdesmostrativa != undefined
                                "
                                :style="{
                                    backgroundImage:
                                        'url(' +
                                        relevantes[1].imgdesmostrativa +
                                        ' ) '
                                }"
                                class="img-bg bg-2 bg-grad-layer-6"
                            ></div>

                            <div class="abs-blr color-white p-20 bg-sm-color-7">
                                <h4 class="mb-10 mb-sm-5">
                                    <b>{{ relevantes[1].titulo }}</b>
                                </h4>
                                <ul class="list-li-mr-20">
                                    <li>
                                        Por:
                                        <span class="color-primary"
                                            ><b>{{
                                                relevantes[1].autor
                                            }}</b></span
                                        >
                                        {{ relevantes[1].fecha }}
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div>

                    <div class="pl-5 ptb-5 pl-sm-0 pos-relative h-50">
                        <a
                            class="pos-relative h-100 dplay-block hoverevent"
                            @click="goToDocumentView(relevantes[2].id)"
                        >
                            <div
                                v-if="
                                    relevantes[2].imgdesmostrativa != undefined
                                "
                                :style="{
                                    backgroundImage:
                                        'url(' +
                                        relevantes[2].imgdesmostrativa +
                                        ' ) '
                                }"
                                class="img-bg bg-3 bg-grad-layer-6"
                            ></div>

                            <div
                                class="abs-blr color-white p-20 bg-sm-color-7 hoverevent"
                            >
                                <h4 class="mb-10 mb-sm-5">
                                    <b>{{ relevantes[2].titulo }}</b>
                                </h4>
                                <ul class="list-li-mr-20">
                                    <li>
                                        Por:
                                        <span class="color-primary"
                                            ><b>{{
                                                relevantes[2].autor
                                            }}</b></span
                                        >
                                        {{ relevantes[2].fecha }}
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="h-1-3 oflow-hidden">
                <div
                    class="pr-5 pr-sm-0 pt-5 float-left float-sm-none pos-relative w-1-3 w-sm-100 h-100 h-sm-300x"
                >
                    <a
                        class="pos-relative h-100 dplay-block hoverevent"
                        @click="goToDocumentView(relevantes[3].id)"
                    >
                        <div
                            v-if="relevantes[3].imgdesmostrativa != undefined"
                            :style="{
                                backgroundImage:
                                    'url(' +
                                    relevantes[3].imgdesmostrativa +
                                    ' ) '
                            }"
                            class="img-bg bg-4 bg-grad-layer-6"
                        ></div>

                        <div class="abs-blr color-white p-20 bg-sm-color-7">
                            <h4 class="mb-10 mb-sm-5">
                                <b>{{ relevantes[3].titulo }}</b>
                            </h4>
                            <ul class="list-li-mr-20">
                                <li>
                                    Por:
                                    <span class="color-primary"
                                        ><b>{{ relevantes[3].autor }}</b></span
                                    >
                                    {{ relevantes[3].fecha }}
                                </li>
                            </ul>
                        </div>
                    </a>
                </div>

                <div
                    class="plr-5 plr-sm-0 pt-5 pt-sm-10 float-left float-sm-none pos-relative w-1-3 w-sm-100 h-100 h-sm-300x"
                >
                    <a
                        class="pos-relative h-100 dplay-block hoverevent"
                        @click="goToDocumentView(relevantes[4].id)"
                    >
                        <div
                            v-if="relevantes[4].imgdesmostrativa != undefined"
                            :style="{
                                backgroundImage:
                                    'url(' +
                                    relevantes[4].imgdesmostrativa +
                                    ' ) '
                            }"
                            class="img-bg bg-5 bg-grad-layer-6"
                        ></div>

                        <div class="abs-blr color-white p-20 bg-sm-color-7">
                            <h4 class="mb-10 mb-sm-5">
                                <b>{{ relevantes[4].titulo }}</b>
                            </h4>
                            <ul class="list-li-mr-20">
                                <li>
                                    Por:
                                    <span class="color-primary"
                                        ><b>{{ relevantes[4].autor }}</b></span
                                    >
                                    {{ relevantes[4].fecha }}
                                </li>
                            </ul>
                        </div>
                    </a>
                </div>

                <div
                    class="pl-5 pl-sm-0 pt-5 pt-sm-10 float-left float-sm-none pos-relative w-1-3 w-sm-100 h-100 h-sm-300x"
                >
                    <a
                        class="pos-relative h-100 dplay-block hoverevent"
                        @click="goToDocumentView(relevantes[5].id)"
                    >
                        <div
                            v-if="relevantes[5].imgdesmostrativa != undefined"
                            :style="{
                                backgroundImage:
                                    'url(' +
                                    relevantes[5].imgdesmostrativa +
                                    ' ) '
                            }"
                            class="img-bg bg-6 bg-grad-layer-6"
                        ></div>

                        <div class="abs-blr color-white p-20 bg-sm-color-7">
                            <h4 class="mb-10 mb-sm-5">
                                <b>{{ relevantes[5].titulo }}</b>
                            </h4>
                            <ul class="list-li-mr-20">
                                <li>
                                    Por:
                                    <span class="color-primary"
                                        ><b>{{ relevantes[5].autor }}</b></span
                                    >
                                    {{ relevantes[5].fecha }}
                                </li>
                            </ul>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "mostrelevantsection",

    data() {
        return {
            relevantes: [],
            extra: [],
            carousel_index: 0,
            publicacionFlag: false
        };
    },

    methods: {
        goToDocumentView(id) {
            this.$router.push({ name: "document", params: { id } });
        },

        notesCarousel() {
            this.carousel_index >= this.extra.length
                ? (this.carousel_index = 0)
                : (this.carousel_index = this.carousel_index++);
            this.relevantes[0].id = this.extra[this.carousel_index].id;
            this.relevantes[0].imgdesmostrativa = this.extra[
                this.carousel_index
            ].imgdesmostrativa;
            this.relevantes[0].fecha = this.extra[this.carousel_index].fecha;
            this.relevantes[0].autor = this.extra[this.carousel_index].autor;
            this.relevantes[0].titulo = this.extra[this.carousel_index].titulo;
            this.carousel_index++;
        }
    },

    created() {
        let self = this;

        axios({
            method: "post",
            url: "/relevant"
        }).then(resp => {
            this.relevantes = resp.data;
            axios({
                method: "post",
                url: "/getSuperRelevantes"
            }).then(resp => {
                // this.extra = resp.data.slice(6);
                this.extra = resp.data;
            });
        });

        setInterval(function() {
            self.notesCarousel();
        }, 5000);
    }
};
</script>

<style>
.hoverevent:hover {
    cursor: pointer;
}
</style>
