   <template>

  <div class="">
                    <div class="row" v-if="modoEditar == false">
                        <div class="col-md-12">
                            <div class="card strpied-tabled-with-hover">
                                <div class="card-header ">
                                    <h4 class="card-title">Registro de pdf</h4>
                                    <p class="card-category">Si no encuentra su información recargue la página web</p>
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <th>No.</th>
                                            <th style="width: 20%;">Nombre</th>
                                            <th style="width: 12%;">Fecha</th>
                                            <th>Importancia</th>
                                            <th>Descargas</th>
                                            <th style="width: 35%;">Información</th>
                                            <th style="width: 100%; border-bottom: 0px solid #dee2e6;">Editar</th>
                                        </thead>
                                        <tbody>
                                             <tr v-for="(item, index) in document" :key="index">
                                                <td>{{index + 1}}</td>
                                                <td>{{item.nombre}} </td>
                                                <td>{{item.fecha}} </td>
                                                <td v-if="item.importancia == 1" style="color:green">Alta</td>
                                                <td v-else-if="item.importancia == 2" style="color: orange;">Media</td>
                                                <td v-else-if="item.importancia == 3" style="color: red">Baja</td>
                                                <td>{{item.descarga}}</td>
                                                <td>Para ver información click en editar</td>
                                                <td>
                                                    <button type="button" @click="editar(item)" class="btn btn-labeled btn-success">
                                                     <span class="btn-label"><i class="fa fa-pencil-square-o"></i></span></button>
                                                    <button type="button" @click="eliminar(item,index)" class="btn btn-labeled btn-danger" style="margin-left: 4%;">
                                                    <span class="btn-label"><i class="fa fa-remove"></i></span></button>
                                                </td>
                                            </tr>
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
                                    <h4 class="card-title">Editar registro de pdf</h4>
                                    <p class="card-category">Si no encuentra su información recargue la página web</p>
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                     <form enctype="multipart/form-data" @submit.prevent="editarDoc()">
                                       <p v-if="errors.length">
                                        <b>Por favor, corrija el(los) siguiente(s) error(es):</b>
                                        <ul>
                                        <li v-for="error in errors" v-bind:key="error" style="color:red">{{ error }}</li>
                                        </ul>
                                      </p>
                                        <div class="row">
                                            <div class="col-md-3 pr-1">
                                                <div class="form-group">
                                                    <label>Fecha</label>
                                                    <input type="date" style="font-size: 14px;" class="form-control" placeholder="Company" v-model="registro.fecha">
                                                </div>
                                            </div>
                                            <div class="col-md-3 px-1">
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
                                            <div class="col-md-6 pl-1">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Nombre documento</label>
                                                    <input type="text" class="form-control" placeholder="" v-model="registro.nombre">
                                                </div>
                                            </div>
                                        </div>

                                         <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Agregar imagen de pdf </label><br>
                                                    <input type="file"  accept="image/*" @change="obtenerImagen">
                                                </div>
                                            </div>
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Agregar Docuemento</label><br>
                                                    <input type="file"  accept="pdf/*" @change="obtenerPdf">
                                                </div>
                                            </div>
                                        </div>
                                    
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="comment">Información:</label>
                                                    <textarea class="form-control" rows="5" id="comment" v-model="registro.informacion"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-info btn-fill pull-right" style="background-color: #eaa11d !important;">Editar documento</button>
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
            registros: [],
            errors: [],
            registro: {fecha:'',nombre:'', importancia:'' ,imgdesmostrativa:'', pdf:'', informacion:'', id:''},
            document: [],
            modoEditar:false
          }
        },
        methods:{
          eliminar(item,index){

        this.$swal({
              title: '¿Estás seguro de eliminar el registro?',
              text: "Los cambios no se podrán revertir!",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Borrar!'
                }).then((result) => {
                axios.delete(`/document/${item.id}`).then(()=>{
                this.document.splice(index, 1);
                })
            })
          },  
          
          obtenerImagen(e){
            let fileReader = new FileReader();
            fileReader.readAsDataURL(e.target.files[0]);
            fileReader.onload = (e)=>{
                this.registro.imgdesmostrativa = e.target.result
            }
            }, 
            obtenerPdf(e){
                let fileReader = new FileReader();
                fileReader.readAsDataURL(e.target.files[0]);
                fileReader.onload = (e)=>{
                this.registro.pdf = e.target.result
            }
            },
          editar(item){
            this.modoEditar = true;
            this.registro.fecha = item.fecha;
            this.registro.nombre = item.nombre;
            this.registro.importancia = item.importancia;
            this.registro.imgdesmostrativa = item.imgdesmostrativa;
            this.registro.pdf = item.pdf;
            this.registro.informacion = item.informacion;
            this.registro.id = item.id;
            console.log(this.registro);
          },
          regresar(){
            this.modoEditar = false;
          },
          editarDoc(){
            const params = {fecha: this.registro.fecha, nombre: this.registro.nombre, importancia: this.registro.importancia, imgdesmostrativa: this.registro.imgdesmostrativa,
            pdf: this.registro.pdf,informacion:this.registro.informacion};
           axios.put(`/document/${this.registro.id}`, params)
            .then(res=>{
            this.modoEditar = false;
            axios.get('/document').then(res=>{
            this.document = res.data;
          })
        })
          }
        },
        created(){
        this.$loading(true);
          axios.get('/document').then(res=>{
            this.document = res.data;
            this.$loading(false);
          })
        },
        components: {
            'editor': Editor
        }
    }
</script>