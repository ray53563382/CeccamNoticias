<template>
<div class="">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Agregar Multimedía</h4>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 pr-1">
                            <div class="form-group">
                                <label>Nombre de archivo</label>
                                <input type="text" class="form-control" v-model="registro.nombre">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 pr-1">
                            <div class="form-group">
                                <label>Tipo de archivo multimedia</label>
                                <select class="form-control" v-model="registro.tipo">
                                    <option value="1">Video</option>
                                    <option value="2">Audio</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 pr-1">
                            <div class="form-group">
                                <label>Url</label>
                                <input type="text" class="form-control" v-model="registro.url">
                            </div>
                        </div>
                    </div>

                    <button v-on:click="agregardata()" class="btn btn-info btn-fill pull-right">Agregar multimedia</button>

                </div>

            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-12">
            <div class="card-body table-full-width table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <th style="width: 5%;">No.</th>
                        <th style="width: 20%;">Nombre multimedia</th>
                        <th style="width: 10%;">Tipo</th>
                        <th style="width: 25%;">Url</th>
                        <th style="width: 20%;">Acciones</th>

                    </thead>
                    <tbody>
                        <tr :ref="item.id" v-for="(item, index) in resgistrosMulti" :key="index">
                            <td>{{index + 1}}</td>
                            <td>{{item.nombre}}</td>
                            <td v-if="item.tipo == 1">Video</td>
                            <td v-if="item.tipo == 2">Audio</td>
                            <td>{{item.url}}</td>
                            <td>
                                <button type="button" @click="editar(item)" data-toggle="modal" data-target="#exampleModalLong" class="btn btn-labeled btn-success">
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" aria-labelledby="exampleModalLongTitle" aria-hidden="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Editar registro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 pr-1">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ingresa la nombre</label>
                                <input type="text" class="form-control" placeholder="" v-model="editRegister.nombre">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Ingresa tipo</label>

                                <select class="form-control" v-model="editRegister.tipo">
                                    <option value="1">Video</option>
                                    <option value="2">Audio</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Ingresa url</label>
                                <input type="text" class="form-control" placeholder="" v-model="editRegister.url">
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" v-on:click="saveEdit()">Guardar cambios</button>
                </div>
            </div>
        </div>
    </div>

</div>
</template>

<script>
import Vue from 'vue'
import VueLoading from "vuejs-loading-plugin";
Vue.use(VueLoading, {
    text: "Cargando"
});


export default {
    data() {
        return {

            modoEditar: Boolean,
            resgistrosMulti: [],

            editRegister: {
                id: '',
                nombre: '',
                tipo: '',
                url: '',
            },
            registro: {
                nombre: '',
                tipo: '',
                url: '',
            },
        }
    },
    mounted() {
        this.$loading(true);

        this.resgistrosMulti = [];
        axios.get('/multimedia').then(res => {
            res.data.forEach(element => {
                this.resgistrosMulti.push(element)
            });
        this.$loading(false);
        });
    },
    methods: {
        eliminar(item, index) {

            this.$swal({
                title: '¿Estás seguro de eliminar el registro?',
                text: "Los cambios no se podrán revertir!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Borrar!'
            }).then((result) => {
                if (result.value) {
                    axios.delete(`/multimedia/${item.id}`).then(() => {
                        this.resgistrosMulti.splice(index, 1);
                    })

                }
            })

        },
        editar(item) {
            this.modoEditar = true;
            this.editRegister.id = item.id
            this.editRegister.nombre = item.nombre;
            this.editRegister.tipo = item.tipo;
            this.editRegister.url = item.url;
        },

        saveEdit() {
            axios.put(`/multimedia/${this.editRegister.id}`, this.editRegister)
                .then(res => {
                    axios.get('/multimedia').then(res => {
                        this.resgistrosMulti = [];
                        res.data.forEach(element => {
                            this.resgistrosMulti.push(element)
                        });
                        this.$swal(
                            'El registro de multimedia fue guardado!',
                            'Ahora ya puedo visualizarlo en su página web!',
                            'success'
                        )

                    });
                })
        },

        agregardata() {

            if (this.registro.nombre != '' && this.registro.data != '' && this.registro.url != '') {
                console.log(this.registro);

                axios.post('/multimedia', this.registro)
                    .then((res) => {
                        console.log(res);
                        this.$swal(
                            'El registro de multimedia fue guardado!',
                            'Ahora ya puedo visualizarlo en su página web!',
                            'success'
                        )

                        this.registro = {
                                nombre: '',
                                tipo: '',
                                url: ''
                            },

                            this.resgistrosMulti = [];
                        axios.get('/multimedia').then(res => {
                            res.data.forEach(element => {
                                this.resgistrosMulti.push(element)
                            });

                            this.resgistrosMulti.reverse();
                            console.log(this.resgistrosMulti)
                        });
                    });

            } else {
                this.$swal({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'No se pudo agregar el registro!',
                })
            }

        }
    }
}
</script>

<style scoped>
</style>
