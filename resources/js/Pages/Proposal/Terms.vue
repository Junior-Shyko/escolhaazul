<script setup>
import { Head, router } from '@inertiajs/vue3';
import Header from "@/Components/Proposal/Header.vue";

const props = defineProps({
    user: Object
});

const checkTerms = () => {
    console.log(props.user)
    router.post('../formulario/proposta', props.user)
}

</script>

<template>
    <Head title="Termos de Uso - Escolha Azul" />
    <div
        class="relative sm:flex min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">

        <div class="max-w-7xl max-w-full w-full">
            <Header />
            <div class="flex justify-center">
                <img src="https://espindolaimobiliaria.com.br/escolhaazul/public/img/logo_ea.jpg" alt="Escolha Azul"
                    style="width: 350px;">
            </div>
            <div class="mt-16">
                <div class="grid grid-cols-1 gap-6 lg:gap-8">
                    <v-container>
                        <v-row>
                            <v-card class="mx-auto">
                                <v-card-text>
                                    <p class="text-h4 text--primary text-center">
                                        {{ props.user.name }}
                                    </p>
                                    <img src="https://as1.ftcdn.net/v2/jpg/03/02/89/38/1000_F_302893891_576CG8QPTeA8wmgtC4zXaDernYd0a5uW.jpg"
                                        width="128" height="128" alt="" srcset="">
                                    <v-divider></v-divider>
                                    <p class="text-center">
                                        Esse é o nosso Termo de Uso, para continuar você deve ler e se desejar, aceite para
                                        continuar.
                                    </p><br>
                                    <v-divider></v-divider>
                                </v-card-text>

                                <v-card-text>


                                    <div class="text-blue-grey-darken-2 text-center">
                                        <p>
                                            Você poderá ler nosso termos e uso da plataforma nesse <a href="#" class="text-blue">Link</a>
                                        </p><br>
                                        <p>
                                           Ao clicar em ACEITO, significa que você concorda com nossos termos e uso.
                                        </p>
                                        <v-divider></v-divider>
                                       
                                    </div>
                                    <v-alert
    type="info"
    title="Importante"
    text="Seus dados serão salvo automaticamente durante o processo do preenchimento da sua proposta."
  ></v-alert>
                                </v-card-text>
                                <v-card-actions class="flex justify-between">
                                    <v-btn variant="tonal" class="bg-blue-lighten-5 hover:bg-indigo-lighten-5">
                                        <v-icon icon="fas fa-close"></v-icon>  Desistir
                                    </v-btn>
                                    <v-btn variant="outlined" class="text-center bg-primary" @click="checkTerms">
                                        Aceito <v-icon icon="fas fa-check"></v-icon>
                                    </v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-row>
                    </v-container>
                </div>
            </div>
        </div>
    </div>
</template>



<style lang="scss" scoped></style>