<template>
  <div class="wrapper">
    <div class="sidebar data">
      <div class="colorBack">
        <div class="sidebar-wrapper">
          <div class="logo" style="height: 70px;">
            <a href="http://www.creative-tim.com" class="simple-text">
              <p>Crisis Climatica</p>
            </a>
          </div>
          <ul class="nav">
            <li>
              <a class="nav-link" v-on:click="changeData('publicaciones')">
                <i
                  class="fa fa-save"
                  style="font-size: 25px !important;margin-right: 15px !important;"
                ></i>
                <p style="font-size: 11px !important; color: white;">Crear públicaciones</p>
              </a>
            </li>
            <!--   <li class="nav-item active"> -->
            <li>
              <a class="nav-link" v-on:click="changeData('documentos')">
                <i
                  class="fa fa-file"
                  style="font-size: 25px !important;margin-right: 15px !important;"
                ></i>
                <p style="font-size: 11px !important; color: white;">Agregar Doc</p>
              </a>
            </li>
            <li>
              <a class="nav-link" v-on:click="changeData('noticia')">
                <i
                  class="fa fa-newspaper-o"
                  style="font-size: 25px !important;margin-right: 15px !important;"
                ></i>
                <p style="font-size: 11px !important; cursor:pointer; color: white;">Agregar Noticias</p>
              </a>
            </li>
            <li>
              <a class="nav-link" v-on:click="changeData('accion')">
                <i
                  class="fa fa-wrench"
                  style="font-size: 25px !important;margin-right: 15px !important;"
                ></i>
                <p style="font-size: 11px !important; cursor:pointer; color: white;">Agregar Acciones</p>
              </a>
            </li>
            <li>
              <a class="nav-link" v-on:click="changeData('informacion')">
                <i
                  class="fa fa-share-square"
                  style="font-size: 25px !important;margin-right: 15px !important;"
                ></i>
                <p style="font-size: 11px !important; color: white;">Ver publicaciones</p>
              </a>
            </li>
            <li>
              <a class="nav-link" v-on:click="changeData('pdf')">
                <i
                  class="fa fa-share-square"
                  style="font-size: 25px !important;margin-right: 15px !important;"
                ></i>
                <p style="font-size: 11px !important; color: white;">Ver registros de pdf</p>
              </a>
            </li>

            <li>
              <a class="nav-link" v-on:click="changeData('editnoticias')">
                <i
                  class="fa fa-bell-o "
                  style="font-size: 25px !important;margin-right: 15px !important;"
                ></i>
                <p style="font-size: 11px !important; color: white;">Ver Noticias</p>
              </a>
            </li>

            <li>
              <a class="nav-link" v-on:click="changeData('editacciones')">
                <i
                  class="fa fa-star-o"
                  style="font-size: 25px !important;margin-right: 15px !important;"
                ></i>
                <p style="font-size: 11px !important; color: white;">Ver Acciones</p>
              </a>
            </li>

            <li>
              <a class="nav-link" v-on:click="changeData('multimedia')">
                <i
                  class="fa fa-image"
                  style="font-size: 25px !important;margin-right: 15px !important;"
                ></i>
                <p style="font-size: 11px !important; color: white;">Multimedia</p>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg" color-on-scroll="500">
        <div class="container-fluid">
          <a class="navbar-brand">Sistema de registros</a>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="nav navbar-nav mr-auto">
              <li class="dropdown nav-item">
                <ul class="dropdown-menu">
                  <a class="dropdown-item" href="#">Notification 1</a>
                  <a class="dropdown-item" href="#">Notification 2</a>
                  <a class="dropdown-item" href="#">Notification 3</a>
                  <a class="dropdown-item" href="#">Notification 4</a>
                  <a class="dropdown-item" href="#">Another notification</a>
                </ul>
              </li>
            </ul>
            <ul class="navbar-nav ml-auto">
              <!-- <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <span class="no-icon">Registra</span>
                </a>
              </li>-->
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="http://example.com"
                  id="navbarDropdownMenuLink"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <span class="no-icon">Visitar Página web</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="http://crisisclimaticayautonomia.org/">Ir a home</a>
                </div>
              </li>
              <li class="nav-item" style="cursor: hand !important">
                <a class="nav-link" @click="logout()" style="cursor: hand !important">
                  <span class="no-icon" style="cursor: hand !important">Salir</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <!-- End Navbar -->
      <div class="content">
        <component :is="dynamicComponent"></component>
      </div>
    </div>
  </div>
</template>

<script>
import Editor from "@tinymce/tinymce-vue";
// import router from 'router'
export default {
  data() {
    return {
      vueProp: null,
      dynamicComponent: "addRegister"
    };
  },
  mounted() {
    let self = this;
    console.log("Component mounted.");
  },
  methods: {
    logout() {
      axios.get("/registerClose").then(res => {
        // this.$router.push({ path:'login' });
        window.location.href = "http://crisisclimaticayautonomia.org/login";
      });
    },
    changeData: function(msg) {
      if (msg == "publicaciones") {
        this.dynamicComponent = "addRegister";
      } else if (msg == "documentos") {
        this.dynamicComponent = "addDocument";
      } else if (msg == "informacion") {
        this.dynamicComponent = "addInformation";
      } else if (msg == "pdf") {
        this.dynamicComponent = "addpdf";
      } else if (msg == "multimedia") {
        this.dynamicComponent = "addMulti";
      } else if (msg == "noticia") {
        this.dynamicComponent = "addNoticia";
      } else if (msg == "editnoticias") {
        this.dynamicComponent = "editnoticia";
      } else if (msg == "accion") {
        this.dynamicComponent = "addAction";
      } else if (msg == "editacciones") {
        this.dynamicComponent = "editAcciones";
      }
    }
  },
  components: {
    editor: Editor
  }
};
</script>








