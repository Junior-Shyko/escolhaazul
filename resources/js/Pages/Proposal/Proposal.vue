<script setup>
import { ref, reactive, onMounted } from "vue";
import { Head, Link, useForm } from '@inertiajs/vue3';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';

const state = reactive({
    tab: null,
    descriptionStep: '',
    descriptionTitleImobile: '',
    dialogDataPersonal: false,
    dialogDataAddress: false,
    dialogDataContact: false,
    password: '',
    skill: 33,
});
const stepForm = (value) => {
    console.log({value})
    if(value == 'two') {
        state.skill = 66
    }
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
            <div class="grid grid-cols-1 gap-1 p-2">
                <div class=" flex justify-center">
                    <label for="" v-if="state.tab == 'one'" class="text-blue-700 hover:text-slate-600 font-medium">Junior,
                        informe seus dados pessoais.</label>
                    <label for="" v-if="state.tab == 'two'" class="text-blue-700 hover:text-slate-600 font-medium">Junior,
                        suas referências pessoais.</label>
                    <label for="" v-if="state.tab == 'tree'" class="text-blue-700 hover:text-slate-600 font-medium">Estamos
                        finalizando, envie seus arquivos.</label>

                </div>
                <v-row>
                    <v-col cols="12" xs="12" sm="12" md="12">
                        <v-progress-linear v-model="state.skill" color="light-blue" striped height="25" class="mb-1">
                            <template v-slot:default="{ value }">
                                <strong>{{value}}%</strong>
                            </template>
                        </v-progress-linear>
                    </v-col>
                </v-row>
                <div class="flex justify-center">
                    <v-card class="w-full">
                        <v-card-text>
                            <v-window v-model="state.tab">
                                <v-window-item value="one">
                                    <v-row no-gutters>
                                        <v-badge color="default" content="Referencia do Imovel" inline></v-badge>
                                    </v-row>
                                    <v-row no-gutters>
                                        <v-col col cols="12" sx="12" sm="12" md="4">
                                            <v-autocomplete class="m-2" variant="underlined" label="Pesquisar o Imóvel"
                                                :items="['Apartamento com 2 dormitórios para alugar, 58 m² por R$ 1.350/mês - Vila União - Fortaleza/CE',
                                                    'Casa com 4 dormitórios para alugar, 93 m² por R$ 1.250 /mês - Bela Vista - Fortaleza/CE',
                                                    'Galpão para alugar, 4000 m² por R$ 25.800,00 - Messejana - Fortaleza/CE',
                                                    'Apartamento com 4 dormitórios para alugar, 90 m² por R$ 1.500,00 /mês - José Bonifácio - Fortaleza/CE',
                                                    'Kitnet com 1 dormitório para alugar, 16 m² por R$ 680,00 /mês - Benfica - Fortaleza/CE',
                                                    'Loja para alugar, 750 m² aluguel R$ 11.500,00/mês - Centro - Fortaleza/CE']"></v-autocomplete>
                                        </v-col>
                                        <v-col col cols="12" sx="12" sm="12" md="4">
                                            <v-autocomplete class="m-2" variant="underlined" label="Tipo do imóvel"
                                                :items="['Apartamento', 'Casa', 'Galpão', 'Kitnet', 'Sala']"></v-autocomplete>
                                        </v-col>
                                        <v-col col cols="12" sx="12" sm="12" md="4">
                                            <v-select class="m-2" variant="underlined" label="Atendente responsável"
                                                :items="['Ana', 'Paulo', 'Maria']"></v-select>
                                        </v-col>
                                    </v-row>
                                    <v-row no-gutters>
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
                                    <v-row no-gutters>
                                        <v-col col cols="12" sx="12" sm="12" md="4">
                                            <v-text-field class="m-1" label="Aluguel Proposto" model-value="00,00"
                                                prefix="R$"></v-text-field>
                                        </v-col>
                                        <v-col col cols="12" sx="12" sm="12" md="8">
                                            <v-textarea class="m-1" rows="3" variant="underlined" label="Aluguel Proposto"
                                                maxlength="120" single-line></v-textarea>
                                        </v-col>
                                    </v-row>
                                    <v-row no-gutters>
                                        <v-badge color="default" content="Dados Pessoais" inline></v-badge>
                                    </v-row>
                                    <v-row no-gutters>
                                        <v-col cols="12" sx="12" sm="12" md="6">
                                            <v-text-field label="Nome completo" class="m-1"
                                                model-value="Junior Oliveira"></v-text-field>
                                        </v-col>
                                        <v-col cols="12" sx="12" sm="12" md="6">
                                            <v-text-field label="E-mail" class="m-1"
                                                model-value="fran@mail.com"></v-text-field>

                                        </v-col>
                                    </v-row>
                                    <v-row no-gutters>
                                        <v-col cols="12" sx="12" sm="12" md="4" class="flex justify-center">
                                            <v-btn elevation="2" color="blue-darken-2 m-1"
                                                @click="state.dialogDataPersonal = true">
                                                <v-icon icon="fas fa-plus-circle" class="mb-1 mr-1"></v-icon>
                                                Adicionar Dados pessoais
                                            </v-btn>
                                        </v-col>
                                        <v-col cols="12" sx="12" sm="12" md="4" class="flex justify-center">
                                            <v-btn elevation="2" color="blue-darken-2 m-1">
                                                <v-icon icon="fas fa-plus-circle" class="mb-1 mr-1"></v-icon>
                                                Adicionar Endereço
                                            </v-btn>
                                        </v-col>
                                        <v-col cols="12" sx="12" sm="12" md="4" class="flex justify-center">
                                            <v-btn elevation="2" color="blue-darken-2 m-1">
                                                <v-icon icon="fas fa-plus-circle" class="mb-1 mr-1"></v-icon>
                                                Adicionar Contato
                                            </v-btn>
                                        </v-col>
                                        <v-dialog v-model="state.dialogDataPersonal" persistent class="block w-full ">
                                            <v-card>
                                                <v-card-text>
                                                    <v-row>
                                                        <v-col cols="6" sx="6" sm="6" md="3">
                                                            <InputLabel for="cpf" value="CPF" />
                                                            <TextInput id="user_cpf" type="text"
                                                                class="mt-1 block w-full border-gray-500"
                                                                v-model="state.password" required
                                                                autocomplete="current-password" autofocus />
                                                        </v-col>
                                                        <v-col cols="6" sx="6" sm="6" md="3">
                                                            <InputLabel for="dtNas" value="Data de Nasc." />
                                                            <TextInput id="dtNas" type="text"
                                                                class="mt-1 block w-full border-gray-500"
                                                                model-value="05/11/1984" required
                                                                autocomplete="current-password" autofocus />
                                                        </v-col>
                                                        <v-col cols="6" sx="6" sm="6" md="3">
                                                            <InputLabel value="Identidade" />
                                                            <TextInput id="identity" type="text"
                                                                class="mt-1 block w-full border-gray-500" model-value=""
                                                                required autocomplete="current-password" autofocus />
                                                        </v-col>
                                                        <v-col cols="6" sx="6" sm="6" md="3">
                                                            <InputLabel value="Orgão Emissor" />
                                                            <TextInput id="emissor" type="text"
                                                                class="mt-1 block w-full border-gray-500"
                                                                model-value="SSP-CE" required
                                                                autocomplete="current-password" autofocus />
                                                        </v-col>
                                                        <v-col cols="6" sx="6" sm="6" md="3">
                                                            <InputLabel value="Nacionalidade" />
                                                            <TextInput id="nationality" type="text"
                                                                class="mt-1 block w-full border-gray-500" model-value=""
                                                                required autocomplete="current-password" autofocus />
                                                        </v-col>
                                                        <v-col cols="6" sx="6" sm="6" md="3">
                                                            <InputLabel value="Naturalidade" />
                                                            <TextInput id="naturality" type="text"
                                                                class="mt-1 block w-full border-gray-500"
                                                                model-value="SSP-CE" required
                                                                autocomplete="current-password" autofocus />
                                                        </v-col>
                                                        <v-col cols="6" sx="6" sm="6" md="3">
                                                            <v-select class="m-2" variant="underlined" label="Estado Civil"
                                                                :items="['Casado', 'Solteiro', 'Viúvo']">
                                                            </v-select>
                                                        </v-col>
                                                        <v-col cols="6" sx="6" sm="6" md="3">
                                                            <v-select class="m-2" variant="underlined"
                                                                label="Nº de Dependentes" :items="['0', '1', '2']">
                                                            </v-select>
                                                        </v-col>
                                                        <v-col cols="12" sx="12" sm="12" md="3">
                                                            <v-select class="m-2" variant="underlined"
                                                                label="Grau de Instrução"
                                                                :items="['Fundamental', 'Ensina Médio', 'Ensino Superior']">
                                                            </v-select>
                                                        </v-col>
                                                    </v-row>
                                                </v-card-text>
                                                <v-card-actions class="flex justify-between">
                                                    <v-btn class="bg-teal-lighten-5"
                                                        @click="state.dialogDataPersonal = false">
                                                        Sair
                                                    </v-btn>

                                                    <v-btn class="bg-light-blue-darken-3">
                                                        Salvar
                                                    </v-btn>
                                                </v-card-actions>
                                            </v-card>
                                        </v-dialog>
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
                            {{ state.tab }}
                            <v-tabs v-model="state.tab" color="blue-darken-2" align-tabs="center">
                                <v-btn class="bg-teal-lighten-5">
                                    <template v-slot:prepend>
                                        <v-tab :value="stepForm('one')" v-if="state.tab == 'two'">
                                            <v-icon icon="fas fa-arrow-left" class="mb-4"></v-icon>
                                            <span class="mb-3">Anterior</span>
                                        </v-tab>
                                        <v-tab :value="stepForm('two')" v-if="state.tab == 'tree'">
                                            <v-icon icon="fas fa-arrow-left" class="mb-4"></v-icon>
                                            <span class="mb-3">Anterior</span>
                                        </v-tab>
                                    </template>
                                </v-btn>

                                <v-btn class="bg-light-blue-darken-3">
                                    <v-tab :value="stepForm('two')" v-if="state.tab == 'one'">
                                        <span class="mb-3">Próxima Etapa</span>
                                        <v-icon icon="fas fa-arrow-right" class="mb-4"></v-icon>
                                    </v-tab>
                                    <v-tab :value="stepForm('tree')" v-if="state.tab == 'two'">
                                        <span class="mb-3">Útima Etapa</span>
                                        <v-icon icon="fas fa-arrow-right" class="mb-4"></v-icon>
                                    </v-tab>
                                </v-btn>
                            </v-tabs>
                        </v-card-actions>
                    </v-card>
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
