<script setup>
import {onMounted, ref, watch,reactive} from 'vue';
import { Head, router } from '@inertiajs/vue3';
import Header from "@/Components/Proposal/Header.vue";
import api from "@/Services/server"
import termsImg from "../../../img/terms_ea.png"
const props = defineProps({
  user: Object
});
const overlay = ref(false);
const state = reactive({
  infoPage : false
})
/*
* Redirecionamento para o formulário de proposta
* */
let redirectForm;
redirectForm = () => {
    router.post('../formulario/proposta', props.user)
};

/*
* Faz uma verificação na api para saber se com esse email existe uma
* solicitação para ser fiador
* */
const verifyGuarantor = () => {
    api.get('verify-guarantor/'+ props.user.email)
        .then(res => {
          console.log({res})
            //Se já existe e ja foi confirmado o componente redireciona
            if(res.data.accept == 1){
                redirectForm();
            }
            //Se não existe solicitação e componente é redirecionado
            if(!res.data){
                redirectForm();
            }
            state.infoPage = true;
            // if(res.data)
        })
        .catch(err => {
            console.log({err})
        })
}

/*
* Metodo para o aceite para ser o fiador da solicitação
* */
const checkGuarantor = () => {
    api.post('accept-guarantor', {email: props.user.email});

}
/*
* Botão para recusar a solicitação de ser fiador
*
* */
const redirectProposal = () => {
    if(overlay) {
        overlay.value = true
        checkGuarantor()
        redirectForm();
    }
}

/*
* Botão para recusar a solicitação de ser fiador
*
* */
const createProposal = () => {
    if(overlay) {
        overlay.value = true
        redirectForm();
    }
}
//Veirifica solicitação assim que o componente é montado
onMounted(() => {
  console.log('mount');
    verifyGuarantor()
    const handleKeyPress = (event) => {
      if (event.key === 'F5') {
        event.preventDefault();
        const message = 'Você tem certeza que deseja atualizar? Até agora suas informações foram salvas, mas você será redirecionado para o início.';
        if (!window.confirm(message)) {
          // Cancela a atualização da página se o usuário não confirmar
          showAlert.value = false;
        } else {
          window.location.href = EscolhaApp.baseURL
        }
      }
    };

    window.addEventListener('keydown', handleKeyPress);
})



window.onbeforeunload = (event) => {

if (showAlert.value) {
// functions.toast('Ops!', 'Voce vai sair da página', 'error')
const message = 'Você tem certeza que deseja sair? Até agora suas informações foram salvas, mas você será redirecionado para o início.';
alert(message)
state.validateImmobile = true
state.validateFinality = true
state.validateWarranty = true
window.location.href = EscolhaApp.baseURL
// event.returnValue = message;
// return false;
}
};

watch(overlay, (newValue, oldValue) => {
   overlay && setTimeout(() => {
        overlay.value = false;
   }, 3000)
});

</script>

<template>
  <Head title="Termos de Uso - Escolha Azul" />
  <div
    class="relative sm:flex min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white"
      v-if="state.infoPage"
    >

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
                        <v-btn variant="outlined" class="block" color="primary"  @click="redirectProposal">
                            Preencher o cadastro de fiador
                        </v-btn>
                        <v-divider></v-divider>
                        <v-btn variant="tonal" class="block mt-3"
                               color="primary" @click="createProposal">
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
                </v-card-text>
                <v-card-actions class="flex justify-between">
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
