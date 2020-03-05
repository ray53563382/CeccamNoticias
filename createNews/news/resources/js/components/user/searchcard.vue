<template>
    <div @click="goToDocumentView" class="container">
        <div class="row searchcard ">
            <div class="col-3 ">
                <img :src="s_card_image" alt="" class="myimg img-thumbnail" />
            </div>
            <div class="col-8">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <p class="h4">{{ s_card_title }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 description-container">
                            <p
                                v-html="s_card_description"
                                class="text-truncate text-justify"
                            ></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p>{{ s_card_date }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            {{ s_card_autor }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class=" searchcard">
        <img :src="logito" alt="" class=" myimg img-thumbnail" />
    </div> -->
</template>

<script>
// import { bus } from "../media/bus";

export default {
    name: "searchcard",

    props: {
        index_queries: {
            required: true
        },
        queries_array: {
            required: true
        }
    },

    data() {
        return {
            s_card_title: null,
            s_card_description: null,
            s_card_date: null,
            s_card_autor: null,
            s_card_image: null,
            s_card_id: null
        };
    },

    methods: {
        goToDocumentView() {
            location.replace("/documentView/" + this.s_card_id);
        }
    },

    created() {
        // console.log(this.index_queries);
        console.log(this.queries_array);
        this.s_card_title = this.queries_array[this.index_queries].titulo;
        this.s_card_id = this.queries_array[this.index_queries].id;
        this.s_card_description = this.queries_array[
            this.index_queries
        ].informacionArt;
        this.s_card_date = this.queries_array[this.index_queries].fecha;
        this.s_card_autor = this.queries_array[this.index_queries].autor;
        this.s_card_image = this.queries_array[
            this.index_queries
        ].imgdesmostrativa;

        // EventBus.$on("bus_queries", data => {
        //     console.log(data);
        //     console.log("gracious");
        //     this.s_card_title = data[index_queries].titulo;
        //     this.s_card_description = data[index_queries].informacionArt;
        //     this.s_card_date = data[index_queries].fecha;
        //     this.s_card_autor = data[index_queries].autor;
        //     this.s_card_image = data[index_queries].imgdesmostrativa;
        // });
        // console.log("fuck");
    }
};
</script>

<style>
.searchcard {
    height: 10em;
    /* width: 100%; */
    /* background-color: violet; */
}

.myimg {
    /* height: 100%; */
    height: 10em;
    width: 100%;
    background-position: center;
    background-size: cover;
}

.description-container {
    height: 4em;
    /* background-color: #151515; */
}
</style>
