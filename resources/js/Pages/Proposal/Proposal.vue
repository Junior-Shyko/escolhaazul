<script setup>
import { defineProps, reactive, onMounted, ref, onBeforeUnmount} from "vue";
import { Head } from '@inertiajs/vue3';
import Address from '@/Components/Address.vue';
import ContactPhone from '@/Components/ContactPhone.vue';
import RentalData from '@/Components/Proposal/RentalData.vue';
import api from '@/Services/server';
import Header from "@/Components/Proposal/Header.vue";
import DataPersonal from '@/Components/Proposal/DataPersonal.vue';
import Bank from "@/Components/Proposal/Bank.vue";
import RealState from "@/Components/Proposal/RealState.vue"
import Commercial from "@/Components/Proposal/Commercial.vue";
import Personal from "@/Components/Proposal/Personal.vue";
import Property from "@/Components/Proposal/Property.vue";
import Vehicle from "@/Components/Proposal/Vehicle.vue";
import functions from "@/Util/functions";
import UploadFiles from "@/Components/Proposal/UploadFiles.vue";
import TabProposal from "@/Components/Proposal/TabProposal.vue";

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
    btnStep: false
});

const receiveEmit = (value) => {
    var dataPut = {
        proposal_id: value.proposal_id,
        user_id: value.user_id,
        object_type: value.object_type
    }
    dataPut[value.nameInput] = value.valueInput

    api.put(value.route + '/update', dataPut)
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

const skill = (value) => {
    console.log('Proposal: ', value)
    switch (value) {
        case 'one':
            state.skill = 25
            break;
        case 'two':
            state.skill = 50
            break;
        case 'three':
            state.skill = 75
            break;
        case 'four':
            state.skill = 100
            break;    
        default:
            break;
    }
}

const showAlert = ref(true);

onMounted(() => {
    const handleKeyPress = (event) => {
    if (event.key === 'F5') {
      event.preventDefault();
      const message = 'Você tem certeza que deseja atualizar? Até agora suas informações foram salvas, mas você será redirecionado para o início.';
      if (!window.confirm(message)) {
        // Cancela a atualização da página se o usuário não confirmar
        showAlert.value = false;
      }else{
        console.log(EscolhaApp.baseURL)
        window.location.href=EscolhaApp.baseURL
      }
    }
  };

//   window.addEventListener('keydown', handleKeyPress);

//   // Remove o ouvinte de evento quando o componente é desmontado
//   onBeforeUnmount(() => {
//     window.removeEventListener('keydown', handleKeyPress);
//   });
})

// Bloqueia o evento de recarregar a página no navegador
window.onbeforeunload = (event) => {
   
//   if (showAlert.value) {
//     console.log(showAlert.value)
//     // functions.toast('Ops!', 'Voce vai sair da página', 'error')
//     const message = 'Você tem certeza que deseja sair? Até agora suas informações foram salvas, mas você será redirecionado para o início.';
//     alert(message)
//     event.returnValue = message;
//     return false;
//   }
};
props.user.id = 139
props.user.proposal_id = 53
props.user.email = 'your.email+fakedata80077@gmail.com'
props.user.name = 'Ines Kemmer'

</script>

<template>
    <Head title="Proposta Espíndola Imobiliária" />
    <div
        class="relative sm:flex min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <div class="max-w-7xl max-w-full w-full">
            <Header />
            <div class="container mx-auto">
                <v-row>
                    <v-col cols="12">
                        <div class=" grid grid-cols-1 gap-1 p-2">
                            <div class=" flex justify-center">
                                <v-col cols="12" xs="12" sm="12" md="12" class=" text-center">
                                        <small class="text-xs">Ao Finalizar essa etapa, você cumpriu {{ state.skill }}% da
                                            proposta</small>
                                        <v-progress-linear v-model="state.skill" color="light-blue" striped height="25"
                                            class="mb-1">
                                            <template v-slot:default="{ value }">
                                                <strong>{{ value }}%</strong>
                                            </template>
                                        </v-progress-linear>
                                    </v-col>
                                <h6 v-if="state.tab == 'one'" class="text-blue-700 hover:text-slate-600 font-medium">{{
                                    user.name }},
                                    informe seus dados pessoais.</h6>
                                <h6 v-if="state.tab == 'two'" class="text-blue-700 hover:text-slate-600 font-medium">{{
                                    user.name }},
                                    suas referências pessoais.</h6>
                                <h6 v-if="state.tab == 'three'" class="text-blue-700 hover:text-slate-600 font-medium">
                                    Estamos
                                    finalizando, envie seus arquivos.</h6>
                            </div>
                        </div>
                        <div class="flex justify-center">
                            <v-card class="w-full">
                                <v-card-text>
                                    <v-window v-model="state.tab">
                                        <v-window-item value="one">
                                            <RentalData :user="props.user" @updateInput="receiveEmit" />

                                          
                                        </v-window-item>

                                        <v-window-item value="two">
                                            <v-row no-gutters>
                                                <v-badge color="default" content="Dados Pessoais" inline></v-badge>
                                            </v-row>
                                            <v-row no-gutters>
                                                <v-col cols="12" sx="12" sm="12" md="6">
                                                    <v-text-field label="Nome completo" class="m-1"
                                                        model-value="Junior Oliveira"
                                                        v-model="props.user.name"></v-text-field>
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
                                                    <!-- COMPONENTE PARA CADASTRAR O CONTATO TELEFONICO 
                                                <ContactPhone />-->
                                                </v-col>
                                            </v-row>
                                           
                                        </v-window-item>

                                        <v-window-item value="three">
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
                                                    <Bank :user="props.user" @updateInput="receiveEmit"
                                                        object_type="personal" />
                                                </div>
                                                <div class="p-4 rounded-lg shadow-xl bg-sky-500">
                                                    <RealState :user="props.user" @updateInput="receiveEmit"
                                                        object_type="personal" />
                                                </div>
                                                <div class="p-4 rounded-lg shadow-xl bg-sky-300">
                                                    <Commercial :user="props.user" @updateInput="receiveEmit"
                                                        object_type="personal" />
                                                </div>
                                                <div class="p-4 rounded-lg shadow-xl  bg-sky-500 border">
                                                    <Personal :user="props.user" @updateInput="receiveEmit"
                                                        object_type="personal" />
                                                </div>
                                                <div class="p-4 rounded-lg shadow-xl bg-sky-300">
                                                    <Property :user="props.user" @updateInput="receiveEmit"
                                                        object_type="personal" />
                                                </div>
                                                <div class="p-4 rounded-lg shadow-xl  bg-sky-500 border">
                                                    <Vehicle :user="props.user" @updateInput="receiveEmit"
                                                        object_type="personal" />
                                                </div>

                                            </div>
                                            <!-- <Commercial /> -->
                                        </v-window-item>

                                        <v-window-item value="four">
                                            <UploadFiles :user="props.user"/>
                                        </v-window-item>

                                    </v-window>
                                    <v-card-actions class="flex justify-center bg-gray-100 mt-3">
                                        <v-tabs v-model="state.tab" color="blue-darken-2" align-tabs="center">
                                            <template v-slot:default>

                                                <div id="tab-proposal-tab" class="flex justify-center">
                                                    <TabProposal :btnStep="state.tab" @updatetab="skill"/>
                                                </div>
                                            </template>

                                        </v-tabs>

                                    </v-card-actions>
                                   
                                </v-card-text>

                            </v-card>
                        </div>
                    </v-col>
                </v-row>

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
}</style>
