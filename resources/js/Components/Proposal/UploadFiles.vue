<script setup>
import {reactive, onMounted, ref} from "vue";
import { router } from '@inertiajs/vue3'

const props = defineProps({
    user: Object
})

const state = reactive({
  urlApi: EscolhaApp.baseAPI+'form/upload/proposal/'+ props.user.proposal_id+ '/personal',
  statusUpload: false,
  userProposal: props.user
})

function submit() {
    // console.log(state.userProposal.email)
    let dataFinish = {
        status  : 'finalizada',
        user_id : props.user.id,
        proposal: props.user.proposal_id
    }
    
    router.post('finalizar', dataFinish, {
        preserveScroll: true
    });
}

</script>

<template>
    <div>
        <v-row>
            <v-container>
                <div class="mt-2 flex w-full">
                    <v-badge color="default" content="Anexar documentos" inline class="mb-2"></v-badge>
                </div>
                <v-col cols="12">
                    <p class="text-sm">
                        Além desta proposta devidamente preenchida, é necessário anexar
                        abaixo os documentos que comprovem as informações aqui
                        fornecidas.
                        E, após a aprovação, será imprescindível apresentar os originais
                        ou
                        enviar cópia autenticada até o ato da entrega das chaves.
                        
                    </p>
                    <div style="position: relative;">
                     
                <DropZone 
                    :maxFiles="Number(20)"
                    :url="state.urlApi"
                    :uploadOnDrop="true"
                    :multipleUpload="false"
                    :parallelUpload="20"
                    :acceptedFiles="['png', 'jpg', 'jpeg', 'pdf', 'img']"
                    />
              </div>
                </v-col>
            </v-container>
            <v-container>
                <form @submit.prevent="submit">
                    <v-btn block color="primary" type="submit">Finalizar Proposta</v-btn>
                </form>
            </v-container>
        </v-row>
    </div>
</template>



<style >
#dropFiles {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}</style>