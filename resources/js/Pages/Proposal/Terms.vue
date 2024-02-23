<script setup>
import { ref, watch } from 'vue';
import { Head, router } from '@inertiajs/vue3';
import Header from "@/Components/Proposal/Header.vue";
import api from "@/Services/server"
import termsImg from "../../../img/terms_ea.png"
const props = defineProps({
  user: Object
});
const overlay = ref(false);

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
watch(overlay, (newValue, oldValue) => {
    console.log('Novo valor: ' + newValue)
    // overlay.value = true;
    overlay && setTimeout(() => {
        overlay.value = false;
    }, 3000)
});

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
                    <v-row>
                      <v-col cols="12" class="flex justify-center mt-3 mb-3">
                        <img :src="termsImg" width="128" height="128" alt="" srcset="">
                      </v-col>
                    </v-row>
                    <v-divider></v-divider>
                    <p class="text-center font-mono text-lg">
                      Prezado {{ props.user.name }}
                    </p>
                  </div>
                  <div class="text-blue-grey-darken-2 text-center">
                    <p>
                        Gostaria de informar que você foi indicado como fiador em uma proposta de locação.
                        Sua confiança e integridade são fundamentais para essa indicação.
                        Por isso gostariamos de saber se você deseja,
                    </p>
                    <p>
                        <v-btn variant="outlined" class="block" color="primary"  @click="overlay = !overlay">
                            Preencher o cadastro de fiador
                        </v-btn>
                        <v-divider></v-divider>
                        <v-btn variant="tonal" class="block mt-3" color="primary">
                            criar nova proposta de locação
                        </v-btn>
                        <v-overlay
                            :model-value="overlay"
                            class="align-center justify-center"
                        >
                            <v-progress-circular
                                color="primary"
                                indeterminate
                                size="64"
                            ></v-progress-circular>
                        </v-overlay>
                    </p>


                  </div>
<!--                  <v-alert type="success" variant="outlined" title="Importante"-->
<!--                    text="Seus dados serão salvo automaticamente durante o processo do preenchimento da sua proposta.">-->
<!--                  </v-alert>-->

                </v-card-text>

                <v-card-actions class="flex justify-between">
<!--                  <v-btn variant="tonal" class="bg-blue-lighten-5 hover:bg-indigo-lighten-5">-->
<!--                    <v-icon icon="fas fa-close"></v-icon> Desistir-->
<!--                  </v-btn>-->
<!--                  <v-btn variant="outlined" class="text-center bg-primary" @click="checkTerms">-->
<!--                    Aceito <v-icon icon="fas fa-check"></v-icon>-->
<!--                  </v-btn>-->
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
