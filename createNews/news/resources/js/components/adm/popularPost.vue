<template>
    <div class="pl-20 pl-md-0">
        <div class="mtb-50">
            <h4 class="p-title"><b>Publicaciones destacadas</b></h4>
            <a
                v-for="(item, index) in registros"
                :key="index"
                class="oflow-hidden pos-relative mb-20 dplay-block"
                style="margin-bottom: 3% !important; cursor:pointer !important"
            >
                <div class="wh-100x abs-tlr">
                    <img
                        :src="item.imgdesmostrativa"
                        alt=""
                        @click="goToDocumentView(item)"
                        style=" height: 100px; width: 100px!important;"
                    />
                </div>

                <div class="ml-120 min-h-100x">
                    <h5
                        @click="goToDocumentView(item)"
                        style="cursor:auto !important"
                        class="color-black "
                    >
                        <b>{{ item.titulo }}</b>
                    </h5>
                    <h6 class="color-lite-black pt-10">
                        Por
                        <span class="color-black"
                            ><b
                                style="cursor:pointer !important"
                                @click="veAlAutorPublicaciones(item.autor)"
                                >{{ item.autor }},</b
                            ></span
                        >
                        <span style="font-size: 12px">{{ item.fecha }} </span>
                    </h6>
                </div>
            </a>
        </div>

        <div class="mtb-50 mb-md-0">
            <h4 class="p-title" style="margin-top: 51px;">
                <b>NEWSLETTER</b>
            </h4>
            <p class="mb-20">
                Suscribete y obten la información más relevante de nuestro sitio
                web
            </p>

            <form class="nwsltr-primary-1">
                <input type="text" placeholder="Your email" />
                <button type="submit">
                    <i class="ion-ios-paperplane"></i>
                </button>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            registros: []
        };
    },

    methods: {
        fetchAuthor(author) {
            console.log(author);
            location.replace("/search/all/" + author);
        }
    },

    created() {
        console.log("se creo componente");
        axios
            .post("/popularPost")
            .then(resp => {
                resp.data.forEach(element => {
                    this.registros.push(element);
                });

                console.log(this.registros);
            })
            .catch(error => {
                console.log(error);
            });
    },
    mounted() {},
    methods: {
        goToDocumentView(item) {
            location.replace("/documentView/" + item.id);
        },

        veAlAutorPublicaciones(autor) {
            this.$router.push({
                name: "publicacionesautor",
                params: { autor: autor }
            });
        }
    }
};
</script>

<style scoped>
ul {
    list-style-type: none;
    width: 100%;
}

h3 {
    font: bold 20px/1.5 Helvetica, Verdana, sans-serif;
}

li img {
    float: left;
    margin: 0 15px 0 0;
}

li p {
    font: 200 12px/1.5 Georgia, Times New Roman, serif;
}

li {
    padding: 10px;
    overflow: auto;
}

li:hover {
    background: #eee;
    cursor: pointer;
}

.oflow-hidden {
    overflow: hidden;
}

.p-title {
    position: relative;
    padding-bottom: 20px;
    margin-bottom: 4px;
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

.color-lite-black {
    color: #888;
}

.color-black {
    color: #111;
}

.wh-100x {
    height: 100px;
    width: 100px !important;
}

.abs-tlr {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    z-index: 1;
}

.ml-120 {
    margin-left: 120px !important;
}

.pos-relative {
    position: relative;
    z-index: 1;
}

.dplay-block {
    display: block;
}
</style>
