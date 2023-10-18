<script setup>
import { ref, reactive, onMounted } from "vue";
import { Head } from '@inertiajs/vue3';
import Address from '@/Components/Address.vue';
import ContactPhone from '@/Components/ContactPhone.vue'
import RentalData from '@/Components/Proposal/RentalData.vue'
import api from '@/Services/server'
import DataPersonal from '@/Components/Proposal/DataPersonal.vue'

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
    field: ''
});
const stepForm = (value) => {
    console.log({ value })
    if (value == 'two') {
        state.skill = 66
    }
}

const receiveEmit = (value) => {
   
    var dataPut = {
        proposal_id : value.proposal_id,
        user_id: value.user_id
    }
    dataPut[value.nameInput] = value.valueInput
    console.log('receiveEmit', dataPut)
    api.put('api/'+value.route+'/update', dataPut)
    .then(res => {
        console.log({res})
    })
    .catch(err => {
        console.log(err)
    })
}

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
                    {{ state.field }}
                    <label for="" v-if="state.tab == 'one'" class="text-blue-700 hover:text-slate-600 font-medium">{{ user.name }},
                        informe seus dados pessoais.</label>
                    <label for="" v-if="state.tab == 'two'" class="text-blue-700 hover:text-slate-600 font-medium">{{ user.name }},
                        suas referências pessoais.</label>
                    <label for="" v-if="state.tab == 'tree'" class="text-blue-700 hover:text-slate-600 font-medium">Estamos
                        finalizando, envie seus arquivos.</label>

                </div>
                <v-container>
                    <v-row>
                    <v-col cols="12" xs="12" sm="12" md="12">
                        <v-progress-linear v-model="state.skill" color="light-blue" striped height="25" class="mb-1">
                            <template v-slot:default="{ value }">
                                <strong>{{ value }}%</strong>
                            </template>
                        </v-progress-linear>
                    </v-col>
                </v-row>
                </v-container>
                <div class="flex justify-center">
                    <v-container>
                        <v-card class="w-full">
                            <v-card-text>
                                <v-window v-model="state.tab">
                                    <v-window-item value="one">
                                        <!-- Dados da locação -->
                                        <RentalData :user="user" @updateInput="receiveEmit"/>

                                        <v-row no-gutters>
                                            <v-badge color="default" content="Dados Pessoais" inline></v-badge>
                                        </v-row>
                                        <v-row no-gutters>
                                            <v-col cols="12" sx="12" sm="12" md="6">
                                                <v-text-field label="Nome completo" class="m-1"
                                                    model-value="Junior Oliveira"
                                                    v-model="props.user.name"
                                                ></v-text-field>
                                            </v-col>
                                            <v-col cols="12" sx="12" sm="12" md="6">
                                                <v-text-field label="E-mail" class="m-1"
                                                    model-value="email@mail.com"
                                                    v-model="props.user.email"
                                                ></v-text-field>
                                            </v-col>
                                        </v-row>
                                        <v-row no-gutters>
                                            <v-col cols="12" sx="12" sm="12" md="4" class="flex justify-center">
                                                <DataPersonal @updateInput="receiveEmit" :user="props.user"/>
                                            </v-col>
                                            <v-col cols="12" sx="12" sm="12" md="4" class="flex justify-center">
                                                <!-- COMPONENTE PARA CADASTRAR ENDEREÇO -->
                                                <Address />
                                            </v-col>
                                            
                                            <v-col cols="12" sx="12" sm="12" md="4" class="flex justify-center">
                                                <!-- COMPONENTE PARA CADASTRAR O CONTATO TELEFONICO -->
                                                <ContactPhone />
                                            </v-col>

                                          
                                        
                                            <!-- <v-dialog class="block w-full " v-model="state.dialogDataContact">
                                                <v-card>
                                                    <v-card-text>
                                                        contato
                                                    </v-card-text>
                                                    <v-card-actions class="flex justify-center">
                                                        <v-btn class="bg-blue-grey-lighten-4"
                                                            @click="state.dialogDataContact = false">
                                                            Sair
                                                        </v-btn>
                                                    </v-card-actions>
                                                </v-card>
                                            </v-dialog> -->
                                        </v-row>
                                    </v-window-item>
                                    <v-window-item value="two">
                                        <v-row no-gutters>
                                            <v-badge color="default" content="Referências Pessoais" inline></v-badge>
                                            <v-col col cols="12" sx="12" sm="12" md="4">
                                                <v-select class="m-2" variant="underlined" label="Finalidade"
                                                    :items="['Ana', 'Paulo', 'Maria']"></v-select>
                                            </v-col>
                                            <v-col col cols="12" sx="12" sm="12" md="4">
                                                <v-text-field class="mt-1" label="Prazo Desejado" model-value="30"
                                                    suffix="meses"></v-text-field>

                                            </v-col>
                                            <v-col col cols="12" sx="12" sm="12" md="4">
                                                <v-select class="m-2" variant="underlined" label="Tipo de garantia"
                                                    :items="['Carta Fiança', 'Caução', 'Crédito']"></v-select>
                                            </v-col>
                                        </v-row>
                                    </v-window-item>
                                    <v-window-item value="tree">
                                        One 3
                                    </v-window-item>
                                </v-window>
                            </v-card-text>

                            <v-card-actions class="flex justify-between bg-gray-100">
                                <v-tabs v-model="state.tab" color="blue-darken-2" align-tabs="center">
                                    <v-btn class="bg-teal-lighten-5">
                                        <template v-slot:prepend>
                                            <v-tab value="one" v-if="state.tab == 'two'">
                                                <v-icon icon="fas fa-arrow-left" class="mb-4"></v-icon>
                                                <span class="mb-3">Anterior</span>
                                            </v-tab>
                                            <v-tab value="two" v-if="state.tab == 'tree'">
                                                <v-icon icon="fas fa-arrow-left" class="mb-4"></v-icon>
                                                <span class="mb-3">Anterior</span>
                                            </v-tab>
                                        </template>
                                    </v-btn>

                                    <v-btn class="bg-light-blue-darken-3">
                                        {{ state.tab }}
                                        <v-tab value="two" v-if="state.tab == 'one'">
                                            <span class="mb-3">Próxima Etapa</span>
                                            <v-icon icon="fas fa-arrow-right" class="mb-4"></v-icon>
                                        </v-tab>
                                        <v-tab value="tree" v-if="state.tab == 'two'">
                                            <span class="mb-3">Útima Etapa</span>
                                            <v-icon icon="fas fa-arrow-right" class="mb-4"></v-icon>
                                        </v-tab>
                                    </v-btn>
                                </v-tabs>
                            </v-card-actions>
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
