<template>
<div class="">
    <div class="row" v-if="modoEditar == false">
        <div class="col-md-12">
            <div class="card strpied-tabled-with-hover">
                <div class="card-header ">
                    <h4 class="card-title">Declaraciones</h4>
                    <p class="card-category">Si las Acciones no aparecen, recarga la página web</p>
                    <!-- <div @click="subirImportantes" class="btn btn-primary">Marcar como relevantes</div>         -->
                </div>
                <div class="card-body table-full-width table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <th>No.</th>
                            <th style="width: 20%;">Nombre de la Acción</th>
                            <th>Importancia</th>
                            <th>Autor</th>
                            <th style="max-width: 20%;">Publicación</th>
                            <th style=" width:100%; border-bottom: 0px solid #dee2e6;">Editar</th>
                        </thead>
                        <tbody>


                            <!-- <paginate name="result" :list="notas" :per="2" tag="tbody"> -->
                                <tr  v-for="(item, index) in notas" :key="index" :ref="item.id"  :style="[item.relevante == 1 ? {'background': 'rgba(91, 192, 222, 0.2)'} : {'background': '#FFF'}]" >
                                    <!-- <paginate name="result" :list="notas" :per="2" tag="tbody"> -->
                                    <td>{{index + 1}}</td>
                                    <td>{{item.titulo}}</td>
                                    <td v-if="item.importancia == 1" style="color:green">Alta</td>
                                    <td v-else-if="item.importancia == 2" style="color: orange;">Media</td>
                                    <td v-else-if="item.importancia == 3" style="color: red">Baja</td>
                                    <td>{{item.autor}}</td>
                                    <td>
                                        <div>
                                            Para ver información click en editar
                                        </div>
                                    </td>
                                    <td>
                                        <button type="button" @click="editar(item)" data-toggle="modal" data-target="#exampleModalLong" class="btn btn-labeled btn-success">
                                            <span class="btn-label"><i class="fa fa-pencil-square-o"></i></span></button>
                                        <button type="button" @click="eliminar(item,index)" class="btn btn-labeled btn-danger" style="margin-left: 4%;">
                                            <span class="btn-label"><i class="fa fa-remove"></i></span></button>
                                        <!-- <button type="button" @click="agregarImportantes(item)" class="btn btn-labeled btn-primary" style="margin-left: 4%;">
                                        <span class="btn-label"><i class="fa fa-star"></i></span></button> -->
                                    </td>
                                </tr>
                            <!-- </paginate> -->

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <div class="row" v-if="modoEditar == true">
        <div class="col-md-12">
            <div class="card strpied-tabled-with-hover">
                <div class="card-header ">
                    <h4 class="card-title">Editar publicación</h4>
                    <p class="card-category">Si no encuentra su información recargue la página web</p>
                </div>
                <div class="card-body table-full-width table-responsive">
                    <form novalidate="true" enctype="multipart/form-data" @submit.prevent="editarData()">
                        <p v-if="errors.length">
                            <b>Por favor, corrija el(los) siguiente(s) error(es):</b>
                            <ul>
                                <li v-for="error in errors" v-bind:key="error" style="color:red">{{ error }}</li>
                            </ul>
                        </p>
                        <div class="row">
                            <div class="col-md-4 pr-1">
                                <div class="form-group">
                                    <label>Fecha</label>
                                    <input type="date" style="font-size: 14px;" class="form-control" placeholder="Company" v-model="registro.fecha">
                                </div>
                            </div>
                            <div class="col-md-4 pr-1">
                                <div class="form-group">
                                    <label>Importancia</label>
                                    <select class="form-control" v-model="registro.importancia">
                                        <!-- <option selected>Selecciona</option> -->
                                        <option value="1">Alta importancia</option>
                                        <option value="2">Media importancia</option>
                                        <option value="3">Baja importancia</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 pr-1">
                                <div class="form-group">
                                    <label>Categoria</label>
                                    <select class="form-control" v-model="registro.idcategoria">
                                        <option value="1">Crisis climática y conservación</option>
                                        <option value="2">Minería</option>
                                        <option value="3">Hidroeléctricas y eólicas</option>
                                        <option value="4">Petróleo fracking y gasoductos</option>
                                        <option value="5">Derechos indígenas</option>
                                        <option value="6">Tierra y territorio</option>
                                        <option value="7">Agua</option>
                                        <option value="8">Bosques y deforestación</option>
                                        <option value="9">Megaproyectos</option>
                                    </select>
                                                                    <button type="button" class="btn btn-primary">Primary</button>

                                </div>


                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label>Autor</label>
                                    <input type="text" class="form-control" v-model="registro.autor">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 pr-1">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nombre de publicación</label>
                                    <input type="text" class="form-control" placeholder="" v-model="registro.titulo">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 pr-1">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">URL de video.</label>
                                    <input type="text" class="form-control" placeholder="" v-model="registro.url">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Cambiar imagen </label><br>
                                    <input type="file" accept="image/*" ref="fileInput" @change="obtenerImagen">
                                </div>
                            </div>
                        </div>

                         <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Cambiar pdf </label><br>
                                    <input type="file" accept="pdf/*" ref="fileInput" @change="obtenerPdf">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <editor v-model="registro.informacionArt" api-key="no-api-key" initialValue="" :init="{
                                                        height: 500,
                                                        menubar: true,
                                                        plugins: [
                                                        'advlist autolink lists link image charmap print preview anchor',
                                                        'searchreplace visualblocks code fullscreen',
                                                        'insertdatetime media table paste imagetools wordcount'

                                                        ],
                                                        toolbar:
                                                        'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | paste'
                                                    }"></editor>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-info btn-fill pull-right" style="background-color: #eaa11d !important;">Editar evaluación</button>
                        <button class="btn btn-info btn-fill pull-right" style="background-color: red !important;" @click="regresar()">Regresar</button>

                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
</template>

<script>
import Editor from '@tinymce/tinymce-vue'
import Vue from 'vue';
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
Vue.use(VueSweetalert2);

import VueLoading from "vuejs-loading-plugin";
Vue.use(VueLoading, {
    text: "Cargando"
});

export default {
    data() {
        return {
            modoEditar: false,
            notas: [],
            registros: [],
            paginate: ["result"],
            errors: [],
            registro: {
                titulo: '',
                fecha: '',
                autor: '',
                importancia: '',
                idcategoria: '',
                informacionArt: '',
                imgdesmostrativa: '',
                id: '',
                pdf: null,
                url: null
            },
            importantes: []
        }
    },
    created() {
        this.$loading(true);
        axios.post('/getAllActions').then(res => {
            this.notas = res.data;
        })
        this.$loading(false);
    },

    mounted() {},
    methods: {
        eliminar(item, index) {
            this.$swal({
                title: '¿Estás seguro de eliminar la acción?',
                text: "Los cambios no se podrán revertir!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Borrar!'
            }).then((result) => {
                if (result.value) {
                    axios({
                        method: "post",
                        url: "/deleteAction",
                        data: {
                            id: item.id
                        }
                    })
                    .then(()=>{
                        this.notas.splice(index, 1);
                    })
                    // axios.delete(`/deleteNew/${item.id}`).then(() => {
                    //     this.notas.splice(index, 1);
                    // })

                }
            })

        },
        editar(item) {
            this.modoEditar = true;
            console.log(item);
            this.registro.titulo = item.titulo;
            this.registro.fecha = item.fecha;
            this.registro.autor = item.autor;
            this.registro.importancia = item.importancia;
            this.registro.idcategoria = item.idcategoria;
            this.registro.informacionArt = item.informacionArt;
            this.registro.imgdesmostrativa = item.imgdesmostrativa;
            this.registro.id = item.id;
            this.registro.pdf = item.pdf;
            this.registro.url = item.url;
            console.log("aqui esta el registro");
            console.log(this.registro);
        },
        editarData() {
       
            axios({
                method: "post",
                url: "/updateAction",
                data:{
                    id : this.registro.id,
                    titulo: this.registro.titulo,
                    fecha: this.registro.fecha,
                    autor: this.registro.autor,
                    importancia: this.registro.importancia,
                    idcategoria: this.registro.idcategoria,
                    informacionArt: this.registro.informacionArt,
                    imgdesmostrativa: this.registro.imgdesmostrativa,
                    pdf: this.registro.pdf,
                    url: this.registro.url
                }
            })
            .then(resp =>{
                this.modoEditar = false;
                axios({
                    method: "post",
                    url: "/getAllActions",

                })
                .then(resp=>{
                    this.notas = res.data;
                    // location.reload();
                })
            })
        },

        regresar() {
            this.modoEditar = false;
        },

        obtenerImagen(e) {
            let fileReader = new FileReader();
            fileReader.readAsDataURL(e.target.files[0]);
            fileReader.onload = (e) => {
                this.registro.imgdesmostrativa = e.target.result
            }
        },

        obtenerPdf(e) {
            let fileReader = new FileReader();
            fileReader.readAsDataURL(e.target.files[0]);
            fileReader.onload = (e) => {
                this.registro.pdf = e.target.result
            }
        },

        iluminaImportantes(item){
            if(item.relevante == 1){
                 this.$refs[item.id][0].style.background = "rgba(246, 153, 63, 0.4)"
            }else{
                return
            }
        },


        // agregarImportantes(item){

        //     if(this.importantes.indexOf(item.id) != -1){
        //         this.$swal({
        //             title: '¿Remover esta publicacion de relevante?',
        //             text: "Siempre puedes cambiar las publicaciones.",
        //             type: 'warning',
        //             showCancelButton: true,
        //             confirmButtonColor: '#3085d6',
        //             cancelButtonColor: '#d33',
        //             confirmButtonText: 'Aceptar'
        //             }).then((result) => {
        //             if (result.value) {
        //                 this.importantes.slice(this.importantes.indexOf(item.id), 1)
        //                 this.$refs[item.id][0].style.background = "#FFF"
        //                 axios({
        //                     method: "post",
        //                     url: "/removerImportante",
        //                     data: {
        //                         id: item.id
        //                     }
        //                 })
        //             }
        //         })
        //     }else{
        //           this.$swal({
        //             title: '¿Colocar esta publicacione como relevante?',
        //             text: "Siempre puedes cambiar las publicaciones.",
        //             type: 'warning',
        //             showCancelButton: true,
        //             confirmButtonColor: '#3085d6',
        //             cancelButtonColor: '#d33',
        //             confirmButtonText: 'Aceptar'
        //             }).then((result) => {
        //             if (result.value) {
        //                 this.importantes.push(item.id);
        //                 this.$refs[item.id][0].style.background = "rgba(246, 153, 63, 0.4)"
        //                 axios({
        //                     method: "post",
        //                     url: "/colocarImportante",
        //                     data: {
        //                         id: item.id
        //                     }
        //                 })
        //             }
        //         })
        //     }

        // }
    },
    components: {
        'editor': Editor,
    }
}
</script>

<style scoped>
.modal-dialog {
    margin: 0px auto 0px auto;
    /* color: rgba(246, 153, 63, 0.6); */
    /* color: rgba(91, 192, 222, 0.5); */
}
</style>
