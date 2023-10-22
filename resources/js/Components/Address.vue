<script setup>
import { reactive, onMounted } from "vue";
import endpoint from "@/Services/endpoints";
import api from "@/Services/server";
import functions from "@/Util/functions";


const props = defineProps({
    user: Object
});

const state = reactive({
    dialogDataAddress: false,
    loadingBtn: false,
    cep: '',
    address: '',
    number: '',
    complement: '',
    neighborhood: '',
    city: '',
    uf: '',
    infoErrosCep: '',
    verifyAction: 'create'
})

const showCep = () => {
    setTimeout(() => {
        state.infoErrosCep = ""
    }, 2000);
}


const searchCep = (cep) => {
    axios.get(import.meta.env.VITE_API_CEP + cep)
        .then(function (response) {
            // handle success
            console.log(response.data);
            state.cep = response.data.cep
            state.address = response.data.street
            state.neighborhood = response.data.neighborhood
            state.city = response.data.city
            state.uf = response.data.state
        })
        .catch(function (error) {
            state.infoErrosCep = "Não foi encontrado o endereço com esse CEP"
            showCep()
        })
        .finally(function () {
            // always executed
        });
}

const submit = () => {
    let form = {}
    form.object_id = props.user.id
    form.object_type = 'address_personal'
    form.cep = state.cep
    form.address = state.address
    form.number = state.number
    form.complement = state.complement
    form.neighborhood = state.neighborhood
    form.city = state.city
    form.uf = state.uf
    //Quando for a primeira vez q cadastra o endereço
    if (state.verifyAction == 'create') {
        api.post('api/form/address', form)
            .then(res => {
                //Mensagem de sucesso      
                functions.toast('Sucesso', 'Endereço Cadastrado', 'success')
                state.verifyAction = 'atualizar'
            })
            .catch(err => {
                functions.toast('Ops!', 'Ocorreu um erro. Tente depois', 'error')
            })
    } else {
        api.put('api/form/address', form)
        .then(res => {
            //Mensagem de sucesso      
            functions.toast('Sucesso', 'Alterado Cadastrado', 'success')
            state.verifyAction = 'atualizar'
        })
        .catch(err => {
            console.log(err)
            // functions.toast('Ops!', 'Ocorreu um erro. Tente depois', 'error')
        })
    }

}

const getData = () => {
    endpoint.getAddress(props.user.id, props.user.id, 'address_personal')
        .then(res => {
            //Preenchendo os dados que vem de retorno da API
            state.cep = res.cep
            state.address = res.address
            state.number = res.number
            state.complement = res.complement
            state.neighborhood = res.neighborhood
            state.city = res.city
            state.state = res.state
        })
        .catch(err => {
            console.log(err)
            // functions.toast('Ops!', 'Ocorreu um erro. Tente depois', 'error')
        })

}

onMounted(() => {
    getData()
})
</script>

<template>
    <div>
        <v-row no-gutters>
            <v-col cols="12" sx="12" sm="12" md="12" class="flex justify-center">
                <v-btn elevation="2" color="primary m-1" @click="state.dialogDataAddress = true">
                    <v-icon icon="fas fa-plus-circle" class="mb-1 mr-1"></v-icon>
                    Adicionar Endereço
                    <v-row no-gutters>
                        <v-col cols="12" sx="12" sm="12" md="4">
                            <v-dialog class="block w-full " v-model="state.dialogDataAddress">
                                <v-card>
                                    <form @submit.prevent="submit">
                                        <v-card-text>
                                            <v-row>
                                                <v-col cols="12" xs="12" sm="12" md="12" v-if="state.infoErrosCep !== ''">
                                                    <small class="text-base text-error"> {{ state.infoErrosCep }}</small>
                                                </v-col>
                                                <v-col cols="12" xs="12" sm="12" md="3">
                                                    <v-text-field label="CEP" class="m-1" v-model="state.cep" v-mask-cep
                                                        @blur="searchCep(state.cep)" variant="underlined">
                                                    </v-text-field>
                                                </v-col>
                                                <v-col cols="12" xs="12" sm="12" md="3">
                                                    <v-text-field label="Endereço" class="m-1" v-model="state.address"
                                                        variant="underlined"></v-text-field>
                                                </v-col>
                                                <v-col cols="6" xs="6" sm="6" md="3">
                                                    <v-text-field label="Número" class="m-1" v-model="state.number"
                                                        variant="underlined"></v-text-field>
                                                </v-col>
                                                <v-col cols="6" xs="6" sm="6" md="3">
                                                    <v-text-field label="Complemento" class="m-1" v-model="state.complement"
                                                        variant="underlined"></v-text-field>
                                                </v-col>
                                                <v-col cols="12" xs="6" sm="6" md="3">
                                                    <v-text-field label="Bairro" class="m-1" v-model="state.neighborhood"
                                                        variant="underlined"></v-text-field>
                                                </v-col>
                                                <v-col cols="12" xs="6" sm="6" md="3">
                                                    <v-text-field label="Cidade" class="m-1" v-model="state.city"
                                                        variant="underlined"></v-text-field>
                                                </v-col>
                                                <v-col cols="6" xs="6" sm="6" md="3">
                                                    <v-text-field label="Estado" class="m-1" v-model="state.uf"
                                                        variant="underlined"></v-text-field>
                                                </v-col>
                                            </v-row>
                                        </v-card-text>
                                        <v-card-actions class="flex justify-between bg-blue-grey-lighten-4">
                                            <v-btn class="bg-blue-grey-lighten-5 ml-5 mb-2"
                                                @click="state.dialogDataAddress = false">
                                                Sair
                                            </v-btn>
                                            <v-btn color="" class="bg-primary ml-5 mb-2" type="submit"
                                                v-if="state.verifyAction == 'atualizar'">
                                                Atualizar
                                                <v-icon icon="fas fa-save" class="mb-1 ml-1" size="small"></v-icon>
                                            </v-btn>
                                            <v-btn color="" class="bg-primary ml-5 mb-2" type="submit" v-else>
                                                Confirmar
                                                <v-icon icon="fas fa-save" class="mb-1 ml-1" size="small"></v-icon>
                                            </v-btn>
                                        </v-card-actions>
                                    </form>
                                </v-card>
                            </v-dialog>
                        </v-col>
                        <!-- FIM COLUNAS DO CAMPO -->
                    </v-row>
                </v-btn>
            </v-col>
        </v-row>
    </div>
</template>


<style></style>