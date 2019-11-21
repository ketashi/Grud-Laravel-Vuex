<template>
    <div class="mt-5">
        <b-card
        header="Lista de Pacientes">
            <b-card-text>
                <b-row class="my-4 justify-content-end">
                    <b-col md="4" sm="12">
                        <b-form-input
                            :state="obtenerDatos"
                            placeholder="Buscar Paciente"
                            v-model="buscar"
                             class="my-2"
                        />
                    </b-col>
                    <b-col md="2" sm="12" class="my-2">
                        <b-button variant="success" size="sm" block @click="buscarCliente(buscar)">Buscar</b-button>
                    </b-col>
                </b-row>
            
                <b-table
                :items="clientes"
                :fields="fields"
                bordered
                :per-page="perPage"
                :current-page="currentPage"
                >
                <template v-slot:cell(acciones)="data">
                    <div class="d-flex justify-content-center flex-column">
                        <b-button variant="warning" size="sm" class="my-2" @click="activarEditar(data.item)">Editar</b-button>
                        <b-button variant="danger" size="sm" @click="eliminarCliente(data.item.id)">Eliminar</b-button>
                    </div>
                </template>

                </b-table>

                    <b-pagination
                    v-model="currentPage"
                    :total-rows="rows"
                    :per-page="perPage"
                    align="center"
                    ></b-pagination>
            </b-card-text>
            
        </b-card>
        
    </div>
</template>
<script>
    import {mapState, mapMutations} from 'vuex'
export default {
    computed: {
        ...mapState(['clientes']),
        obtenerDatos(){
            if(this.buscar === ''){
              return this.obtenerDato()
            }
        },
        rows() {
            return this.clientes.length
        }
    },
    methods: {
        ...mapMutations(['obtenerDato','buscarCliente','eliminarCliente','activarEditar'])
    },
    created() {
        this.obtenerDato()
    },
    data() {
        return {
            buscar:'',
            fields:[
                {key:'id'},
                {key:'nombre', sorteable:true, label:'Nombre Cliente'},
                {key:'dni'},
                {key:'historial', label:'Historial Clinico'},
                {key:'acciones'}
                ],
            perPage: 5,
            currentPage: 1,
        }
    },
}
</script>