<template>
    <!-- <div id="app"> -->
    <div id="app">
        <Header />
        <Mostrelevantsection />
        <Recentsection />
        <Footer />
        <!-- </div>  -->
    </div>
</template>

<script>
// Import header component.
import Header from "./header";
import Footer from "./footer";
import Mostrelevantsection from "./mostrelevantsection";
import Recentsection from "./recentsection";
import Vue from "vue";
import axios from "axios";
// import { bus } from "../media/bus";

export default {
    name: "App",

    components: {
        Header,
        Footer,
        Mostrelevantsection,
        Recentsection
    }
};
</script>

<style lang="scss" scoped>
.relevant {
    background-color: rgba(21, 21, 21, 0.808);
    border: 1px solid rgba(255, 255, 255, 0.89);

    -webkit-box-shadow: 2px 3px 10px -1px rgba(0, 0, 0, 0.75);
    -moz-box-shadow: 2px 3px 10px -1px rgba(0, 0, 0, 0.75);
    box-shadow: 2px 3px 10px -1px rgba(0, 0, 0, 0.75);

    // justify-content: center;
    a {
        font-weight: bolder;
        font-size: 1.2em;
        text-decoration: none;
        color: aliceblue;
    }
}

.side-bar {
    // position: fixed;
    height: 90em;
    width: 5em;
    background-color: aliceblue;
}

.container {
    // position: relative !important;
    padding: 0 0 0 0;
}

.sticked {
    position: fixed;
    top: 0;
}

.relevant-container {
    // display: flex;
    width: 100%;
    // height: fit-content;
    background-color: #fff;
    -webkit-box-shadow: 2px 3px 10px -1px rgba(0, 0, 0, 0.75);
    -moz-box-shadow: 2px 3px 10px -1px rgba(0, 0, 0, 0.75);
    box-shadow: 2px 3px 10px -1px rgba(0, 0, 0, 0.75);
}
</style>
