<script setup>
import { ref, reactive, onMounted } from "vue";
import { Head, Link } from '@inertiajs/vue3';

const state = reactive({
    tab: null,
});
</script>

<template>
    <Head title="Proposta Espíndola Imobiliária" />
<div
    class="relative sm:flex min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white"
>
    <div class="max-w-7xl max-w-full w-full">
        <div class="flex justify-between bg-white " style="margin-bottom: 10px; padding: 16px;">
            <h5> <img src="https://espindolaimobiliaria.com.br/escolhaazul/public/img/logo_espindola.png"
                    alt="Espíndola Imobiliária" width="96"></h5>
            <h5>(85) 98810-1166</h5>
        </div>
        <div class="grid grid-cols-1 gap-1 p-2">
            <div class=" flex justify-center">
                <label for="">Junior, informe seus dados nessa etapa</label>
            </div>
            <div class="flex justify-center">
                <v-card class="w-full">
                    <v-tabs
                    v-model="state.tab"
                    color="blue-darken-2"
                    align-tabs="center"
                    >
                    <v-tab value="one">Etapa 1</v-tab>
                    <v-tab value="2">Etapa 2</v-tab>
                    <v-tab value="3">Etapa 3</v-tab>
                    </v-tabs>
                    <v-card-text>

                        <v-window v-model="state.tab">
                            <v-window-item value="one">
                                One
                            </v-window-item>
                            <v-window-item value="2">
                                One 2
                            </v-window-item>
                            <v-window-item value="3">
                                One 3
                            </v-window-item>
                        </v-window>
                    </v-card-text>
                    </v-card>
            </div>
        </div>
        

    </div>
</div>
 
</template>

<style>.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}

@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}</style>
