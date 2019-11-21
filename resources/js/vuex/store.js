import Vue from 'vue'
import Vuex from 'vuex'


Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        clientes:[],
        formularioState : true,
        cliente:[{nombre:'',dni:'',historial:''}]
    },
    mutations: {
        obtenerDato(state) {
            axios.get('/historial').then(res=> {
                state.clientes= res.data
            })
        },
        buscarCliente(state, buscar){
            const valor = state.clientes.filter(cliente =>{
                return cliente.nombre.toUpperCase() === buscar.toUpperCase()
            })
            state.clientes = valor
        },
        agregarCliente(state, dato){
            axios.post('/historial', dato)
            .then((res) =>{
            const clienteServidor = res.data;
            state.clientes.push(clienteServidor);
            })
            
        },
        eliminarCliente(state,dato){
            axios.delete(`/historial/${dato}`)
                .then(res =>{
                    const index = state.clientes.findIndex(cliente => cliente.nombre === res.data.nombre)
                    state.clientes.splice(index,1)
                    return state.clientes
                })
        },
        activarEditar(state,data){
            state.formularioState = false
            state.cliente = data
        },
        cancelarEditar(state){
            state.formularioState = true
            state.cliente= {nombre:'', dni: '', historial:''}
        },
        editarCliente(state, dato){
            //const params = dato
            axios.put(`/historial/${dato.id}`, dato)
                .then(res => {
                const index = state.clientes.findIndex(cliente => cliente.nombre === res.data.nombre)
                state.clientes[index] = res.data
                state.cliente= {nombre:'', dni: '', historial:''}
                state.formularioState = true
            })
        }
    },
    actions: {
        
    },
})