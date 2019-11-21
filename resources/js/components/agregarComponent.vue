<template>
    <div>
        <b-form  @submit.prevent="agregar()" v-if="formularioState">
            <b-card
            header="Agregar Cliente Nuevos"
            >
            <b-alert v-model="showDismissibleAlert" variant="success" dismissible show>
                Se registro Correctamente el Cliente
            </b-alert>
            <label for="">Nombre:</label>
            <b-card-text>
                <b-form-input
                v-model="cliente.nombre"
                :state="validarNombre"
                placeholder="Nombre Cliente"
                required>

                </b-form-input>
            </b-card-text>

            <label for="">DNI:</label>
            <b-card-text>
                <b-form-input
                v-model="cliente.dni"
                :state="validarDni"
                placeholder="Dni del Cliente = 8 digitos"
                required
                type="number"
                max="99999999"
                min="10000000"
                trim>

                </b-form-input>
            </b-card-text>

            <label for="">Historial Medico:</label>
            <b-card-text>
                <b-form-input
                v-model="cliente.historial"
                :state="validarHistorial"
                placeholder="Historial Medico del Cliente"
                required>

                </b-form-input>

            
            </b-card-text>
            <b-button variant="danger" block class="mt-4" type="submit">Agregar Cliente</b-button>
            </b-card>
        </b-form>
    </div>
</template>

<script>
import { mapMutations,mapState } from 'vuex'

export default {

    computed: {
        validarNombre(){
            return this.cliente.nombre.length > 0
        },
        validarDni(){
            return this.cliente.dni.length > 7 && this.cliente.dni.length < 9
        },
        validarHistorial(){
            return this.cliente.historial.length > 0
        },
        ...mapState(['formularioState'])
       
    },
    methods: {
        ...mapMutations(['agregarCliente']),
        agregar(){
            this.agregarCliente(this.cliente)
            this.cliente={nombre:'',dni:'',historial:''}
            this.showDismissibleAlert=true
        },
    },
    data() {
        return{
            cliente: {nombre: '', dni:'', historial:''},
            showDismissibleAlert: false
        }
    },
}
</script>