<script setup>
import { Head, router } from '@inertiajs/vue3';
import Header from "@/Components/Proposal/Header.vue";
import api from "@/Services/server"
import termsImg from "../../../img/terms_ea.png"
const props = defineProps({
  user: Object
});

// const checkTerms = () => {
//   console.log(props.user)
//   api.post('../formulario/check-terms', props.user)
//   .then(res => {
//     console.log(res)
//     router.post('../formulario/proposta', props.user)
//   })
//   .catch(err => {
//     console.log(err)
//   })

// }

</script>

<template>
  <Head title="Termos de Uso - Escolha Azul" />
  <div
    class="relative sm:flex min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">

    <div class="max-w-7xl max-w-full w-full">
      <Header />
      <div class="flex justify-center bg-white mt-3">
        <img src="https://espindolaimobiliaria.com.br/escolhaazul/public/img/logo_ea.jpg" alt="Escolha Azul"
          style="width: 350px;">
      </div>
      <div class="mt-2">
        <div class="grid grid-cols-1 gap-6 lg:gap-8">
          <v-container>
            <v-row>
              <v-card class="mx-auto">
                <v-card-text>
                  <div class="items-center gap-4 w-full rounded-lg bg-stripes-violet text-center">

                    <p class="text-h4 text--primary text-center">
                      {{ props.user.name }}
                    </p>
                    <v-row>
                      <v-col cols="12" class="flex justify-center mt-3 mb-3">
                        <img :src="termsImg" width="128" height="128" alt="" srcset="">
                      </v-col>
                    </v-row>
                    <v-divider></v-divider>
                    <p class="text-center">
                      Esse é o nosso Termo de Uso, para continuar você deve ler e se desejar, aceite para
                      continuar.
                    </p>
                  </div>
                  <div class="text-blue-grey-darken-2 text-center">
                    <p>
                      Você poderá ler nosso termos e uso da plataforma nesse 
                      <a href="#" class="text-[#2563eb] font-bold text-lg underline md:underline">Link</a>
                    </p>
                    <p>
                      Ao clicar em ACEITO, significa que você concorda com nossos termos e uso.
                    </p>
                    <v-divider></v-divider>

                  </div>
                  <v-alert type="success" variant="outlined" title="Importante" 
                    text="Seus dados serão salvo automaticamente durante o processo do preenchimento da sua proposta.">
                  </v-alert>
                
                </v-card-text>

                <v-card-actions class="flex justify-between">
                  <v-btn variant="tonal" class="bg-blue-lighten-5 hover:bg-indigo-lighten-5">
                    <v-icon icon="fas fa-close"></v-icon> Desistir
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