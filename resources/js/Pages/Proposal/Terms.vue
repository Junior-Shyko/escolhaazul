<script setup>
import { Head,router } from '@inertiajs/vue3';

const props = defineProps({
    user: Object
});

const checkTerms = () => {
    console.log(props.user)
    router.post('../formulario/proposta', props.user)
}

</script>

<template>
    <Head title="Termos de Uso" />
    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter
        dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="flex justify-center">
                <img src="https://espindolaimobiliaria.com.br/escolhaazul/public/img/logo_ea.jpg" alt=""
                    style="width: 350px;">
            </div>
            <div class="mt-16">
                <div class="grid grid-cols-1 gap-6 lg:gap-8">
                    <v-row>
                        <v-card class="mx-auto" max-width="344" max-height="400" style="overflow: scroll;">
                            <v-card-text>
                                
                                <p class="text-h4 text--primary">
                                    {{ props.user.name}}
                                </p>
                                <br>
                                    <v-divider></v-divider>
                                <p class="">
                                   Esse é o nosso Termo de Uso, para continuar você deve ler e se desejar, aceite para continuar.
                                </p><br>
                                    <v-divider></v-divider>
                                <div class="text-blue-grey-darken-2">
                                    relating to or dependent on charity; charitable.<br>
                                    "an eleemosynary educational institution."
                                    <p>
                                        Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                        Maiores culpa nam itaque quam natus voluptatum labore distinctio! Nihil fuga
                                        pariatur
                                        quisquam qui voluptates dolores tempore eos quae inventore quos? Deserunt!
                                    </p><br>
                                    <p>
                                        Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                        Maiores culpa nam itaque quam natus voluptatum labore distinctio! Nihil fuga
                                        pariatur
                                        quisquam qui voluptates dolores tempore eos quae inventore quos? Deserunt!
                                    </p>
                                    <v-divider></v-divider>
                                    <p>
                                        Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                        Maiores culpa nam itaque quam natus voluptatum labore distinctio! Nihil fuga
                                        pariatur
                                        quisquam qui voluptates dolores tempore eos quae inventore quos? Deserunt!
                                    </p><br>
                                    <v-divider></v-divider>
                                    <p>
                                        Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                        Maiores culpa nam itaque quam natus voluptatum labore distinctio! Nihil fuga
                                        pariatur
                                        quisquam qui voluptates dolores tempore eos quae inventore quos? Deserunt!
                                    </p><br>
                                </div>
                            </v-card-text>
                            <v-card-actions class="flex justify-between">
                                <v-btn variant="tonal" class="bg-blue-lighten-5 hover:bg-indigo-lighten-5">
                                    Desistir
                                </v-btn>
                                <v-btn 
                                    variant="outlined" 
                                    class="text-center bg-primary"
                                    @click="checkTerms"
                                >
                                    Aceito
                                </v-btn>
                            </v-card-actions>
                        </v-card>
                    </v-row>
                </div>
            </div>
        </div>
    </div>
</template>



<style lang="scss" scoped></style>