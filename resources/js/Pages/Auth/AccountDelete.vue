
<script setup>
import Header from '@/Components/Proposal/Header.vue';
import { Head } from '@inertiajs/vue3';
import { reactive } from 'vue';
import { urlBase } from "@/Services/server"

const state = reactive({
    newProposal: urlBase
})
</script>
<template>
    <div>
        <Head title="Conta excluída" />
        <Header />
        <div
            class="relative sm:flex min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            <div class="max-w-7xl max-w-full w-full">

                <v-container>
                    <v-row justify="space-around">
                        <v-card width="600">
                            <v-img height="300" src="https://transform.nws.ai/https%3A//cdn.thenewsroom.io/platform/story_media/1288817220/1406424379.jpg/w_1200,c_limit/" cover
                                class="text-white">
                                <v-toolbar color="rgba(0, 0, 0, 0)" theme="dark">
                                    <template v-slot:prepend>
                                        <!-- <v-btn icon="$menu"></v-btn> -->
                                    </template>

                                    <v-toolbar-title class="text-h6 text-light-blue-darken-4">
                                        <!-- Conta excluída -->
                                    </v-toolbar-title>

                                    <template v-slot:append>
                                        <v-btn icon="mdi-dots-vertical"></v-btn>
                                    </template>
                                </v-toolbar>
                            </v-img>

                            <v-card-text>
                                <div class="ms-1 mb-2 text-center">
                                    <p>
                                    Você optou por excluir sua conta na plataforma  <strong>Escolha Azul</strong>, o que resultou na exclusão dos seus dados e 
                                    propostas associadas à sua conta. 
                                    Gostaríamos de reforçar que, caso decida, você pode se cadastrar novamente em nossa plataforma a qualquer momento.
                                    </p>
                                    <p>
                                        <strong>Será um prazer recebê-lo de volta! </strong>
                                    </p>
                                    <p>
                                        Se precisar de qualquer assistência ou tiver alguma dúvida, não hesite em nos contatar. 
                                        Agradecemos pelo tempo que passou conosco e esperamos revê-lo em breve. <br><br>
                                        <hr>
                                        Atenciosamente,
                                    </p>
                                    <p>                                       
                                        <strong class="ea"><h3 class="text-2xl">Equipe Escolha Azul</h3></strong>
                                    </p>
                                    <br>
                                </div>
                            </v-card-text>
                        </v-card>

                        <v-col cols="12" class="flex justify-center">
                            <v-btn color="primary" :href="state.newProposal">Fazer nova proposta</v-btn>
                        </v-col>
                    </v-row>
                </v-container>

            </div>
        </div>

    </div>
</template>


<style >
.ea {
  color: #2587E9;
}
</style>