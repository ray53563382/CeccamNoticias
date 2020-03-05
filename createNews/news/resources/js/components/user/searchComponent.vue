<template>
    <div class="query-container">
        <Header></Header>
        <router-view></router-view>
        <Footer class="my-3" />
    </div>
</template>

<script>
import logito from "../media/home.png";
import Header from "./header";
import Footer from "./footer";
import Searchcard from "./searchcard";
import Vue from "vue";
import VueLoading from "vuejs-loading-plugin";
Vue.use(VueLoading, {
    text: "Cargando"
});

export default {
    name: "searchview",
    components: {
        Header,
        Footer,
        Searchcard
    }
};
</script>

<style lang="scss" scoped></style>
