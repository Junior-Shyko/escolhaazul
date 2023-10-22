<script setup>
import { reactive, onMounted } from 'vue';
import { router } from '@inertiajs/vue3'
import endpoint from '@/Services/endpoints'
import functions from "@/Util/functions";
import { Head, useForm } from '@inertiajs/vue3';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';

import PrimaryButton from '@/Components/PrimaryButton.vue';

const props = defineProps({
    user: Object
});

const form = useForm({
    nameBank: '',
});

const state = reactive({
    panel: [6]
})

const submit = () => {
    // form.post(route('api/form/ban'));
    router.post('../api/form/bank', form)
};


</script>

<template>
    <div>
        <v-row no-gutters>
            <v-badge color="default" content="Referências Pessoais" inline class="mb-2"></v-badge>
            <v-expansion-panels v-model="state.panel" multiple>
                <v-expansion-panel>
                    <v-expansion-panel-title>Bancárias</v-expansion-panel-title>
                    <v-expansion-panel-text>
                        <v-row>
                            <v-col cols="12" xs="12" sm="12" md="4">
                            <v-text-field label="Nome do Banco" variant="underlined"></v-text-field>
                            <v-text-field label="Label" variant="underlined"></v-text-field>
                        </v-col>
                        <v-col cols="12" xs="12" sm="12" md="4">
                            <v-text-field label="Label" variant="underlined"></v-text-field>
                            <v-text-field label="Label" variant="underlined"></v-text-field>
                        </v-col>
                        <v-col cols="12" xs="12" sm="12" md="4">
                            <v-text-field label="Label" variant="underlined"></v-text-field>
                            <v-text-field label="Label" variant="underlined"></v-text-field>
                        </v-col>
                        </v-row>
                    </v-expansion-panel-text>
                </v-expansion-panel>

                <v-expansion-panel>
                    <v-expansion-panel-title>Imobiliárias</v-expansion-panel-title>
                    <v-expansion-panel-text>
                        Some content 02
                    </v-expansion-panel-text>
                </v-expansion-panel>
                <v-expansion-panel>
                    <v-expansion-panel-title>Comercial</v-expansion-panel-title>
                    <v-expansion-panel-text>
                        Some contentComercial
                    </v-expansion-panel-text>
                </v-expansion-panel>
                <v-expansion-panel>
                    <v-expansion-panel-title>Pessoais</v-expansion-panel-title>
                    <v-expansion-panel-text>
                        Some content Pessoais
                    </v-expansion-panel-text>
                </v-expansion-panel>
                <div class="mt-2 flex w-full">
                    <v-badge color="default" content="Bens" inline class="mb-2"></v-badge>

                </div>
                <v-expansion-panel>
                    <v-expansion-panel-title>Imóveis</v-expansion-panel-title>
                    <v-expansion-panel-text>
                        Some content Imóveis
                    </v-expansion-panel-text>
                </v-expansion-panel>
                <v-expansion-panel>
                    <v-expansion-panel-title>Veículos</v-expansion-panel-title>
                    <v-expansion-panel-text>
                        Some content Veículos
                    </v-expansion-panel-text>
                </v-expansion-panel>
                <v-expansion-panel>
                    <v-expansion-panel-title>Enviar</v-expansion-panel-title>
                    <v-expansion-panel-text>
                        Some content Veículos
                    </v-expansion-panel-text>
                </v-expansion-panel>

            </v-expansion-panels>
        </v-row>
    </div>
</template>

<style lang="scss" scoped></style>