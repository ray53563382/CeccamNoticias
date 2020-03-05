<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p @click="cambiaVista" class="h3">
                    Ver en
                    <b
                        :style="[
                            this.activaNoticias == true
                                ? { color: '#fdd520de' }
                                : { color: '#151515' }
                        ]"
                        >Noticias</b
                    >
                </p>
                <p @click="cambiaVista" class="h3">
                    Ver en
                    <b
                        :style="[
                            this.activaPublicaciones == true
                                ? { color: '#fdd520de' }
                                : { color: '#151515' }
                        ]"
                        >Publicaciones</b
                    >
                </p>
            </div>
            <!-- <Noticiasportema></Noticiasportema> -->
            <!-- <h1>hehehehe</h1> -->
        </div>
        <div v-show="verNoticias">
            <Noticiasportema></Noticiasportema>
        </div>
        <div v-show="verPublicaciones">
            <Publicacionesportema></Publicacionesportema>
        </div>
    </div>
</template>

<script>
import Noticiasportema from "./noticiasportema";
import Publicacionesportema from "./buscapublicaciontema";

export default {
    name: "temasnoticiaspublicaciones",
    components: {
        Noticiasportema,
        Publicacionesportema
    },
    data() {
        return {
            verNoticias: true,
            verPublicaciones: false,
            activaNoticias: true,
            activaPublicaciones: false
        };
    },

    methods: {
        cambiaVista() {
            if (this.verNoticias == true) {
                this.verNoticias = false;
                this.activaNoticias = false;
                this.verPublicaciones = true;
                this.activaPublicaciones = true;
            } else {
                this.verNoticias = true;
                this.verPublicaciones = false;
                this.activaNoticias = true;
                this.activaPublicaciones = false;
            }
        }
    }
};
</script>

<style scoped></style>
