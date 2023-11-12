<script setup>
import { defineProps, reactive, onMounted } from "vue";
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
import UploadFiles from "@/Components/Proposal/UploadFiles.vue";

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
    console.log(props.user)
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
            <header class="sticky inset-0 z-50 border-b border-slate-100 bg-white/80 backdrop-blur-lg">
                <v-container>
                    <nav class="mx-auto flex max-w-6xl gap-8 px-6 transition-all duration-200 ease-in-out lg:px-12">
                        <div class="relative flex items-center">
                            <a href="/">
                                <img src="https://espindolaimobiliaria.com.br/escolhaazul/public/img/logo_espindola.png"
                                    loading="lazy" style="color:transparent" width="96" height="96">
                            </a>
                        </div>
                        <ul class="hidden items-center justify-center gap-6 md:flex">
                            <!-- <li class="pt-1.5 font-dm text-sm font-medium text-slate-700">
                                    <a href="#">Pricing</a>
                                </li>
                                <li class="pt-1.5 font-dm text-sm font-medium text-slate-700">
                                    <a href="#">Blog</a>
                                </li>
                                <li class="pt-1.5 font-dm text-sm font-medium text-slate-700">
                                    <a href="#">Docs</a>
                                </li> -->
                        </ul>
                        <div class="flex-grow"></div>
                        <div class="hidden items-center justify-center gap-6 md:flex">
                            <a href="#" class="font-dm text-sm font-medium text-slate-700">(85) 98810-1166</a>
                            <a href="#"
                                class="rounded-md bg-gradient-to-br from-green-600 to-emerald-400 px-3 py-1.5 font-dm text-sm font-medium text-white shadow-md shadow-green-400/50 transition-transform duration-200 ease-in-out hover:scale-[1.03]">
                                Dúvidas?
                            </a>
                        </div>
                        <div class="relative flex items-center justify-center md:hidden">
                            <div class="grid grid-rows-2">
                                <div>
                                    <a href="#" class="font-dm text-sm font-medium text-slate-700">(85) 98810-1166</a>
                                </div>
                                <!-- ... -->
                                <div>
                                    <a href="#"
                                        class="rounded-md bg-gradient-to-br from-green-600 to-emerald-400 px-3 py-1.5 font-dm text-sm font-medium text-white shadow-md shadow-green-400/50 transition-transform duration-200 ease-in-out hover:scale-[1.03]">
                                        Dúvidas?
                                    </a>
                                </div>
                            </div>
                        </div>
                    </nav>
                </v-container>
            </header>
            <div class="container mx-auto">
                <v-row>
                    <v-col cols="12">
                        <div class=" grid grid-cols-1 gap-1 p-2">
                            <div class=" flex justify-center">

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

                                        <v-window-item value="two">
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

                                        <v-window-item value="three">
                                           <UploadFiles :user="props.user"/>
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
                                        <small class="text-xs">Ao Finalizar essa etapa, você cumpriu {{ state.skill }}% da
                                            proposta</small>
                                        <v-progress-linear v-model="state.skill" color="light-blue" striped height="25"
                                            class="mb-1">
                                            <template v-slot:default="{ value }">
                                                <strong>{{ value }}%</strong>
                                            </template>
                                        </v-progress-linear>
                                    </v-col>
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
