/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

// import router from './router'

// window.Vue = require("vue");
// window.EventBus = new Vue();
// import Vue from 'vue'

// Vue.config.productionTip = false

// const app = new Vue({
// router,
//     el: "#app",
// });

import Vue from "vue";
import App from "./components/App.vue";
import router from "./router";

Vue.config.productionTip = false;

Vue.component("header", require("./components/user/header.vue").default); //component name should be in camel-case
Vue.component(
    "Mostrelevantsection",
    require("./components/user/mostrelevantsection.vue").default
); //component name should be in camel-case
Vue.component(
    "Recentsection",
    require("./components/user/recentsection.vue").default
); //component name should be in camel-case
Vue.component("Footer", require("./components/user/footer.vue").default); //component name should be in camel-case

Vue.component(
    "about-component",
    require("./components/user/about.vue").default
);
Vue.component("addMulti", require("./components/adm/addMulti.vue").default);
Vue.component(
    "editnoticia",
    require("./components/adm/editnoticia.vue").default
);
Vue.component(
    "editAcciones",
    require("./components/adm/editAcciones.vue").default
);
Vue.component(
    "mostrelevantsection-component",
    require("./components/user/recentsection.vue").default
);
Vue.component(
    "pdfview-component",
    require("./components/user/pdfView.vue").default
);
Vue.component(
    "newview-component",
    require("./components/user/newView.vue").default
);

Vue.component(
    "actionview-component",
    require("./components/user/actionView.vue").default
);

Vue.component(
    "searchview-component",
    require("./components/user/searchComponent.vue").default
);
Vue.component(
    "searchcard",
    require("./components/user/searchcard.vue").default
);

Vue.component(
    "example-component",
    require("./components/adm/ExampleComponent.vue").default
);

Vue.component(
    "addInformation",
    require("./components/adm/addInformation.vue").default
);
Vue.component(
    "addDocument",
    require("./components/adm/addDocument.vue").default
);
Vue.component("addAction", require("./components/adm/addAction.vue").default);
Vue.component("addNoticia", require("./components/adm/addNoticia.vue").default);

Vue.component(
    "addRegister",
    require("./components/adm/addRegister.vue").default
);
Vue.component("addpdf", require("./components/adm/addpdf.vue").default);

Vue.component("app-component", require("./components/user/app.vue").default);
Vue.component(
    "viewdoc-component",
    require("./components/user/documentView.vue").default
);

Vue.component(
    "popularPost",
    require("./components/adm/popularPost.vue").default
);

Vue.component(
    "documentView",
    require("./components/user/documentView.vue").default
);

Vue.component(
    "busquedaTodo",
    require("./components/user/todosautores.vue").default
);

Vue.component(
    "busquedaTodo",
    require("./components/user/todosdocumentos.vue").default
);

Vue.component(
    "publicacionportema",
    require("./components/user/buscapublicaciontema.vue").default
);

Vue.component(
    "noticiasportema",
    require("./components/user/noticiasportema.vue").default
);

new Vue({
    router,
    render: h => h(App)
}).$mount("#app");
