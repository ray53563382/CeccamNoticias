import Vue from "vue";
import VueRouter from "vue-router";
import Nosotros from "./components/user/about.vue";
import Home from "./components/user/app.vue";
import Multimedia from "./components/user/multimedia.vue";
import Document from "./components/user/documentView.vue";
import Search from "./components/user/searchComponent.vue";
import todosautores from "./components/user/todosautores.vue";
import todosdocumentos from "./components/user/todosdocumentos.vue";
import todaspublicaciones from "./components/user/todaspublicaciones.vue";
import todasacciones from "./components/user/todasacciones.vue";
import Vistaaccion from "./components/user/actionView.vue";
import Publicacionportema from "./components/user/buscapublicaciontema.vue";
import Publicacionesautor from "./components/user/publicacionesporautor.vue";
import Todaslasnoticias from "./components/user/todaslasnoticias.vue";
import VistaNoticia from "./components/user/newView.vue";
import Vistapdf from "./components/user/pdfView.vue";
import Noticiaportema from "./components/user/noticiasportema.vue";
import Temasnoticiaspublicaciones from "./components/user/temasnoticiaspublicaciones.vue";
import AdministradorHome from "./components/adm/ExampleComponent.vue";

const routes = [
    { path: "/", name: "home", component: Home },
    { path: "/nosotros", name: "nosotros", component: Nosotros },
    { path: "/multimedia", name: "multimedia", component: Multimedia },
    {
        path: "/home",
        name: "adminHome",
        component: AdministradorHome
    },
    {
        path: "/documentView/:id",
        component: Document,
        name: "document",
        props: true
    },
    {
        path: "/ver-noticia/:id",
        component: VistaNoticia,
        name: "vistanoticia",
        props: true
    },
    {
        path: "/ver-pdf/:id",
        name: "verpdf",
        component: Vistapdf,
        props: true
    },
    {
        path: "/search",
        component: Search,
        name: "publicaciones",
        props: true,

        children: [
            {
                path: "todos-los-autores",
                name: "todosautores",
                component: todosautores
            },
            {
                path: "todos-los-documentos",
                name: "todosdocumentos",
                component: todosdocumentos
            },
            {
                path: "todas-las-publicaciones/",
                name: "todaspublicaciones",
                component: todaspublicaciones
                // props: true
            },
            {
                path: "busca-publicaciones/:busqueda",
                name: "todaspublicaciones",
                component: todaspublicaciones,
                props: true
            },
            {
                path: "publicaciones-del-autor/:autor",
                name: "publicacionesautor",
                component: Publicacionesautor,
                props: true
            },
            {
                path: "todas-las-acciones",
                name: "todasacciones",
                component: todasacciones
                // props: true
            },
            {
                path: "/vista-accion/:id",
                name: "vistaaccion",
                component: Vistaaccion
                // props: true
            },
            {
                path: "busca-publicacion/:tema",
                name: "publicacionportema",
                component: Publicacionportema,
                props: true
            },
            {
                path: "todas-las-noticias",
                name: "todaslasnoticias",
                component: Todaslasnoticias
                // props: true
            },
            {
                path: "busca-noticia/:tema",
                name: "noticiaportema",
                component: Noticiaportema,
                props: true
            },
            {
                path: "/temas-noticias-publicaciones/:tema",
                name: "temasnoticiaspublicaciones",
                component: Temasnoticiaspublicaciones,
                props: true
            }
            // {
            //     path: "busca-noticia/:busqueda",
            //     name: "todaslasnoticias",
            //     component: Todaslasnoticias
            //     // props: true
            // }
        ]
    }

    // {
    //     path: "/search/all",
    //     component: Search,
    //     name: "searchComponent",
    //     props: true
    // },
    // {
    //     path: "/search/all/:author",
    //     component: Search,
    //     name: "searchComponentTwo",
    //     props: true
    // },
    // {
    //     path: "/search/allDocuments",
    //     component: Search,
    //     name: "documents",
    //     props: true
    // },
    // {
    //     path: "/search/get_all_acciones",
    //     component: Search,
    //     name: "declaraciones",
    //     props: true
    // },
    // {
    //     path: "/search/get_all_news",
    //     component: Search,
    //     name: "noticias",
    //     props: true
    // },
];

Vue.use(VueRouter);

const router = new VueRouter({
    mode: "history",
    base: __dirname,
    routes
});

export default router;
