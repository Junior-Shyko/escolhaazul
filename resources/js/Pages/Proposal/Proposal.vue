<script setup>
import { ref, reactive, onMounted } from "vue";
import { Head } from '@inertiajs/vue3';
import Address from '@/Components/Address.vue';
import ContactPhone from '@/Components/ContactPhone.vue';
import RentalData from '@/Components/Proposal/RentalData.vue';
import api from '@/Services/server';
import DataPersonal from '@/Components/Proposal/DataPersonal.vue';
import Bank from "@/Components/Proposal/Bank.vue";
import RealState from "@/Components/Proposal/RealState.vue"
import Commercial from "@/Components/Proposal/Commercial.vue";
import Personal from "@/Components/Proposal/Personal.vue";
import Property from "@/Components/Proposal/Property.vue";
import Vehicle from "@/Components/Proposal/Vehicle.vue";
import functions from "@/Util/functions";

const props = defineProps({
    user: Object
});

const state = reactive({
    tab: null,
    descriptionStep: '',
    descriptionTitleImobile: '',
    dialogDataPersonal: false,
    dialogDataAddress: false,
    dialogDataContact: false,
    cpf: '',
    skill: 33,
    field: '',
    btnStep: false,


});

const receiveEmit = (value) => {
    console.log('Campo', value.name)
    console.log('Valor', value.value)
    var dataPut = {
        proposal_id: value.proposal_id,
        user_id: value.user_id,
        object_type: value.object_type
    }
    dataPut[value.nameInput] = value.valueInput
    console.log({ value })
    api.put('api/' + value.route + '/update', dataPut)
        .then(res => {
            if (res.data && res.data.data !== undefined) {
                Object.entries(res.data.data).forEach(([key, value]) => {
                    functions.toast('Ops!', value[0], 'error')
                });
            }
            state.btnStep = false
        })
        .catch(err => {
            console.log(err)

            // functions.toast('Sucesso', 'Endereço Cadastrado', 'error')
        })
}

const skill = () => {
    switch (state.tab) {
        case 'one':
            state.skill = 33
            break;
        case 'two':
            state.skill = 66
            break;
        case 'three':
            state.skill = 100
            break;
        default:
            break;
    }
}


onMounted(() => {
    console.log(state.tab)
})

// props.user.id = 139
// props.user.proposal_id = 53
// props.user.email = 'your.email+fakedata80077@gmail.com'
// props.user.name = 'Ines Kemmer'



</script>

<template>
    <Head title="Proposta Espíndola Imobiliária" />
    <div
        class="relative sm:flex min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <div class="max-w-7xl max-w-full w-full">
            <div class="flex justify-between bg-white " style="margin-bottom: 10px; padding: 16px;">
                <h5> <img src="https://espindolaimobiliaria.com.br/escolhaazul/public/img/logo_espindola.png"
                        alt="Espíndola Imobiliária" width="96"></h5>
                <h5>(85) 98810-1166</h5>
            </div>
            <div class=" grid grid-cols-1 gap-1 p-2">
                <div class=" flex justify-center">
                    <h6 v-if="state.tab == 'one'" class="text-blue-700 hover:text-slate-600 font-medium">{{ user.name }},
                        informe seus dados pessoais.</h6>
                    <h6 v-if="state.tab == 'two'" class="text-blue-700 hover:text-slate-600 font-medium">{{ user.name }},
                        suas referências pessoais.</h6>
                    <h6 v-if="state.tab == 'three'" class="text-blue-700 hover:text-slate-600 font-medium">Estamos
                        finalizando, envie seus arquivos.</h6>
                </div>

                <div class="flex justify-center">
                    <v-container>
                        <v-card class="w-full">
                            <v-card-text>
                                <v-window v-model="state.tab">
                                    <v-window-item value="one">
                                        <RentalData :user="user" @updateInput="receiveEmit" />
                                        <v-row no-gutters>
                                            <v-badge color="default" content="Dados Pessoais" inline></v-badge>
                                        </v-row>
                                        <v-row no-gutters>
                                            <v-col cols="12" sx="12" sm="12" md="6">
                                                <v-text-field label="Nome completo" class="m-1"
                                                    model-value="Junior Oliveira" v-model="props.user.name"></v-text-field>
                                            </v-col>
                                            <v-col cols="12" sx="12" sm="12" md="6">
                                                <v-text-field label="E-mail" class="m-1" model-value="email@mail.com"
                                                    v-model="props.user.email"></v-text-field>
                                            </v-col>
                                        </v-row>
                                        <v-row no-gutters>
                                            <v-col cols="12" sx="12" sm="12" md="4" class="flex justify-center">
                                                <DataPersonal @updateInput="receiveEmit" :user="props.user" />
                                            </v-col>
                                            <v-col cols="12" sx="12" sm="12" md="4" class="flex justify-center">
                                                <!-- COMPONENTE PARA CADASTRAR ENDEREÇO -->
                                                <Address :user="props.user" />
                                            </v-col>

                                            <v-col cols="12" sx="12" sm="12" md="4" class="flex justify-center">
                                                <!-- COMPONENTE PARA CADASTRAR O CONTATO TELEFONICO -->
                                                <ContactPhone />
                                            </v-col>
                                        </v-row>
                                    </v-window-item>

                                    <v-window-item value="two">
                                        <!-- <Bank :user="props.user" @updateInput="receiveEmit" object_type="personal" /> -->
                                        <div class="mt-2 flex w-full">
                                            <v-badge color="default" content="Referência" inline class="mb-2"></v-badge>
                                        </div>
                                        <div class="m-2 flex w-full flex text-center justify-center">
                                            <h6>Agora você vai adicionar algumas referências importante para análise da 
                                                propposta clicando no icone desejado.
                                            </h6>
                                        </div>
                                        <div
                                            class="grid grid-cols-3 gap-4 font-mono text-white text-sm text-center font-bold leading-6 bg-stripes-fuchsia rounded-lg">
                                            <div class="p-4 rounded-lg shadow-xl bg-sky-300">
                                                <Bank :user="props.user" @updateInput="receiveEmit" object_type="personal"/>
                                            </div>
                                            <div class="p-4 rounded-lg shadow-xl bg-sky-500">
                                                <RealState :user="props.user" @updateInput="receiveEmit" object_type="personal"/>
                                            </div>
                                            <div class="p-4 rounded-lg shadow-xl bg-sky-300">                                                
                                                <Commercial :user="props.user" @updateInput="receiveEmit" object_type="personal"/>
                                            </div>
                                            <div class="p-4 rounded-lg shadow-xl  bg-sky-500 border">
                                                <!-- <v-btn icon="fas fa-person" elevation="4" >
                                                </v-btn>
                                                <div class="flex justify-center">
                                                    <small class="font-semibold text-white">Pessoal</small>
                                                </div> -->
                                                <Personal :user="props.user" @updateInput="receiveEmit" object_type="personal"/>
                                            </div>
                                            <div class="p-4 rounded-lg shadow-xl bg-sky-300">
                                                <Property  :user="props.user" @updateInput="receiveEmit" object_type="personal"/>
                                            </div>
                                            <div class="p-4 rounded-lg shadow-xl  bg-sky-500 border">
                                                <!-- <v-btn icon="fas fa-car" elevation="4" >
                                                </v-btn>
                                                <div class="flex justify-center">
                                                    <small class="font-semibold text-white">Veículo</small>
                                                </div> -->
                                                <Vehicle :user="props.user" @updateInput="receiveEmit" object_type="personal"/>
                                            </div>
                                           
                                        </div>
                                        <!-- <Commercial /> -->
                                        <div class="bg-grey-lighten-5 flex">

                                            <v-container>
                                                <!-- <v-row>

                                                    <v-col cols="12" class="flex justify-center">
                                                        <small>Preencha suas referências, clicando no icone</small>
                                                    </v-col>
                                                    <v-col cols="4" xs="4" sm="4" md="4">

                                                        <v-sheet elevation="8" class="p-2" rounded="rounded">
                                                            <v-btn icon="fas fa-building-columns" color="primary">
                                                            </v-btn>
                                                            <div class="flex justify-center">
                                                                <small class="font-semibold">Imobiliária</small>
                                                            </div>
                                                        </v-sheet>
                                                    </v-col>
                                                    <v-col cols="4" xs="4" sm="4" md="4">
                                                        <v-sheet elevation="8" class="p-2 " rounded="rounded">
                                                            <v-btn icon="fas fa-dumpster" color="primary">
                                                            </v-btn>
                                                            <div class="flex justify-center">
                                                                <small class="font-semibold">Comercial</small>
                                                            </div>
                                                        </v-sheet>
                                                    </v-col>

                                                    <v-col cols="4" xs="4" sm="4" md="4">

                                                        <v-sheet elevation="8" class="p-2" rounded="rounded">
                                                            <v-btn icon="fas fa-person" color="primary">
                                                            </v-btn>
                                                            <div class="flex justify-center">
                                                                <small class="font-semibold">Persoal</small>
                                                            </div>
                                                        </v-sheet>
                                                    </v-col>
                                                </v-row> -->
                                            </v-container>

                                        </div>
                                        <!-- <div class="bg-grey-lighten-5 flex mt-3">

                                            <v-container>

                                                <v-row>
                                                    <v-col cols="12" class="flex justify-center">
                                                        <small>Preencha suas referências, clicando no icone</small>
                                                    </v-col>
                                                    <v-col cols="4" xs="4" sm="4" md="4" class="flex justify-center">
                                                        <v-btn icon="fas fa-sign-hanging" elevation="8" color="primary"
                                                            class="mb-1">
                                                        </v-btn>
                                                    </v-col>
                                                    <v-col cols="4" xs="4" sm="4" md="4" class="flex justify-center">
                                                        <v-btn icon="fas fa-dumpster" elevation="8" color="primary"
                                                            class="mb-1">
                                                        </v-btn>
                                                    </v-col>

                                                    <v-col cols="4" xs="4" sm="4" md="4" class="flex justify-center">
                                                        <v-btn icon="fas fa-person" elevation="8" color="primary"
                                                            class="mb-1">
                                                        </v-btn>
                                                    </v-col>
                                                </v-row>
                                            </v-container>

                                        </div> -->
                                    </v-window-item>

                                    <v-window-item value="three">
                                        <v-row>
                                            <v-container>
                                                <div class="mt-2 flex w-full">
                                                    <v-badge color="default" content="Anexar documentos" inline
                                                        class="mb-2"></v-badge>
                                                </div>
                                                <v-col cols="12">
                                                    <p class="text-sm">
                                                        Além desta proposta devidamente preenchida, é necessário anexar
                                                        abaixo os documentos que comprovem as informações aqui fornecidas.
                                                        E, após a aprovação, será imprescindível apresentar os originais ou
                                                        enviar cópia autenticada até o ato da entrega das chaves.
                                                    </p>
                                                    <div class="flex items-center justify-center w-full">
                                                        <label for="dropzone-file"
                                                            class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                            <div
                                                                class="flex flex-col items-center justify-center pt-5 pb-6">
                                                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400"
                                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                    fill="none" viewBox="0 0 20 16">
                                                                    <path stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                                                </svg>
                                                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                                                                    <span class="font-semibold">Click to upload</span> or
                                                                    drag and drop
                                                                </p>
                                                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG,
                                                                    PNG, JPG or GIF (MAX. 800x400px)</p>
                                                            </div>
                                                            <input id="dropzone-file" type="file" multiple class="hidden" />
                                                        </label>
                                                    </div>
                                                </v-col>
                                            </v-container>
                                        </v-row>
                                    </v-window-item>
                                </v-window>
                                <v-card-actions class="flex justify-center bg-gray-100 mt-3">
                                    <v-tabs v-model="state.tab" color="blue-darken-2" align-tabs="center">
                                        <template v-slot:default>

                                            <v-btn class="bg-teal-lighten-5" @click="skill">
                                                <v-tab value="one" @click="skill">
                                                    <span>1ª Etapa</span>
                                                </v-tab>
                                                <v-tab value="two" :disabled="state.btnStep">2ª Etapa</v-tab>
                                                <v-tab value="three">3ª etapa</v-tab>
                                            </v-btn>
                                        </template>

                                    </v-tabs>

                                </v-card-actions>
                                <v-col cols="12" xs="12" sm="12" md="12" class=" text-center">
                                    <small class="text-xs">Ao Finalizar essa etapa, você cumpriu {{ state.skill }}% da proposta</small>  
                                    <v-progress-linear v-model="state.skill" color="light-blue" striped height="25"
                                        class="mb-1">
                                        <template v-slot:default="{ value }">
                                         <strong>{{ value }}%</strong>
                                        </template>
                                    </v-progress-linear>
                                </v-col>
                            </v-card-text>

                        </v-card>
                    </v-container>
                </div>
            </div>


        </div>
    </div>
</template>

<style>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}

@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}
</style>
