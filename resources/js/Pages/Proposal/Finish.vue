
<script setup>
import Header from '@/Components/Proposal/Header.vue';
import { Head } from '@inertiajs/vue3';
import { onMounted } from 'vue';
import { reactive } from 'vue';
import { urlBase } from "@/Services/server"

const state = reactive({
    messages: [
        {
            from: 'Você',
            message: `iniciou a sua proposta em`,
            time: '10:42am',
            color: 'deep-purple-lighten-1',
        },
        {
            from: 'John Doe',
            message: 'Yeah, sure. Does 1:00pm work?',
            time: '10:37am',
            color: 'green',
        },
        {
            from: 'You',
            message: 'Did you still want to grab lunch today?',
            time: '9:47am',
            color: 'deep-purple-lighten-1',
        },
    ],
    newProposal: urlBase
})

onMounted(() => {
    // console.log(state.newProposal)
})

</script>
<template>
    <div>
        <Head title="Finalizado Proposta" />
        <Header />
        <div
            class="relative sm:flex min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            <div class="max-w-7xl max-w-full w-full">

                <v-container>
                    <v-row justify="space-around">
                        <v-card width="600">
                            <v-img height="200" src="https://www.customerthermometer.com/img/3-cx-focus-1.jpg" cover
                                class="text-white">
                                <v-toolbar color="rgba(0, 0, 0, 0)" theme="dark">
                                    <template v-slot:prepend>
                                        <!-- <v-btn icon="$menu"></v-btn> -->
                                    </template>

                                    <v-toolbar-title class="text-h6 text-light-blue-darken-4">
                                        Sucesso!!!
                                    </v-toolbar-title>

                                    <template v-slot:append>
                                        <v-btn icon="mdi-dots-vertical"></v-btn>
                                    </template>
                                </v-toolbar>
                            </v-img>

                            <v-card-text>
                                <div class="ms-1 mb-2">
                                    <p>
                                    Enviamos uma cópia para o e-mail <strong>{{ $page.props.email }}</strong>,
                                    com mais informações sobre o processo de locação e com os links
                                    para dar prosseguimento no cadastro do inquilino adicional e/ou fiador, dependendo da opção selecionada. 
                                    No e-mail
                                    informamos, também, a conta da <b>Espíndola Imobiliária</b> para transferência da
                                    <b>caução</b>, porém você 
                                    também poderá fazer o pagamento através de <b>cartão de crédito </b>clicando no botão abaixo do 
                                    Pag Seguro ou através do <strong>PIX</strong> (financeiro@espindola.imb.br)
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


<style lang="scss" scoped></style>