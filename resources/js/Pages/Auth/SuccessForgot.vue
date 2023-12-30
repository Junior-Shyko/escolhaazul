<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import {Head} from "@inertiajs/vue3";
</script>

<template>

        <Head title="Senha Resetada" />
        <div
            class="relative sm:flex min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter
            dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            <div class="max-w-7xl max-w-full w-full">
                <v-container>
                    <v-row justify="space-around">
                        <v-col cols="12">
                            <div class="flex justify-center text-center">
                                <h3 class="text-2xl text-[#2563eb] font-bold mt-5 ">
                                    Senha resetada!!!
                                </h3>
                            </div>
                        </v-col>
                        <v-card width="600" class="mt-10">
                            <v-img height="200" src="https://www.customerthermometer.com/img/3-cx-focus-1.jpg" cover
                                   class="text-white">
                                <v-toolbar color="rgba(0, 0, 0, 0)" theme="dark">
                                    <template v-slot:prepend>
                                        <!-- <v-btn icon="$menu"></v-btn> -->
                                    </template>

                                    <v-toolbar-title class="text-h6 text-light-blue-darken-4">

                                    </v-toolbar-title>

                                    <template v-slot:append>
                                        <v-btn icon="mdi-dots-vertical"></v-btn>

                                    </template>
                                </v-toolbar>
                            </v-img>
                            <p class="p-4 m-2 text-center">
                                Você acabou de resetar a sua senha, então você já poderá fazer o seu login.
                            </p>

                        </v-card>
                    </v-row>
                    <v-row class="d-flex justify-center">
                       <v-col cols="12" class="flex justify-center">
                           <v-btn class="mt-5" href="admin/login">
                               Fazer login
                           </v-btn>
                       </v-col>

                    </v-row>
                </v-container>
            </div>
        </div>

</template>

<style scoped lang="scss">

</style>
