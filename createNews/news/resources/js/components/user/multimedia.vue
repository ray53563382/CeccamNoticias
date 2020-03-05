<template>
    <div class="daots">
        <Header />

        <div class="container">
            <div class="col-md-12 col-lg-12">
                <h4 class="p-title"><b>Multimedia</b></h4>

                <div class="row">
                    <div class="col-12">
                        <ul id="tabs" class="nav nav-tabs">
                            <li class="nav-item">
                                <a
                                    class="nav-link small text-uppercase active"
                                    v-on:click="changeData('Videos')"
                                    >Videos</a
                                >
                            </li>
                            <li class="nav-item">
                                <a
                                    class="nav-link small text-uppercase"
                                    v-on:click="changeData('Podcast')"
                                    >Podcast</a
                                >
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="row">
                    <div
                        id="profile1"
                        class=" row tab-pane fade active show"
                        v-if="visible == true"
                    >
                        <div
                            class="multimedia col-lg-4"
                            style="margin-top: 3%"
                            v-for="(data, index) in resgistrosMultiVideo"
                            :key="`data-${index}`"
                        >
                            <iframe
                                width="360"
                                height="240"
                                :src="
                                    'https://www.youtube.com/embed/' + data.url
                                "
                                frameborder="0"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen
                            ></iframe>
                            <h6 class="color-lite-black pt-10 ">
                                Tipo:
                                <span class="color-black"
                                    ><b>Multimedia</b></span
                                >
                                Video
                            </h6>
                            <h5>
                                <b>{{ data.nombre }}</b>
                            </h5>
                        </div>
                    </div>

                    <div
                        id="profile1"
                        class=" row tab-pane fade active show"
                        v-if="visible == false"
                    >
                        <div
                            class="multimedia col-lg-4"
                            style="margin-top: 3%"
                            v-for="(data, index) in resgistrosMultiAudio"
                            :key="`data-${index}`"
                        >
                            <iframe
                                width="360"
                                height="240"
                                :src="
                                    'https://www.youtube.com/embed/' + data.url
                                "
                                frameborder="0"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen
                            ></iframe>
                            <h6 class="color-lite-black pt-10 ">
                                Tipo:
                                <span class="color-black"
                                    ><b>Multimedia</b></span
                                >
                                Video
                            </h6>
                            <h5>
                                <b>{{ data.nombre }}</b>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <Footer class="my-3" />
    </div>
</template>

<script>
import Header from "./header";
import Footer from "./footer";

export default {
    components: {
        Header,
        Footer
    },
    data() {
        return {
            resgistrosMultiVideo: [],
            resgistrosMultiAudio: [],
            visible: Boolean
        };
    },
    mounted() {
        this.resgistrosMultiVideo = [];
        this.resgistrosMultiAudio = [];

        axios.get("/multimedia").then(res => {
            res.data.forEach(element => {
                let url = element.url.split("v=");
                element.url = url[1];
                if (element.tipo == 1) {
                    this.resgistrosMultiVideo.push(element);
                } else {
                    this.resgistrosMultiAudio.push(element);
                }
            });
            this.visible = true;
            console.log("**********************");
            console.log(this.resgistrosMultiVideo);
            console.log(this.resgistrosMultiAudio);
        });
    },
    methods: {
        changeData(data) {
            if (data == "Videos") {
                this.visible = true;
            } else {
                this.visible = false;
            }
        }
    }
};
</script>

<style lang="scss" scoped></style>
