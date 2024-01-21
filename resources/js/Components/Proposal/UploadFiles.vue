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
<style >
#dropFiles {
    font-family: Avenir, Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    color: #2c3e50;
    margin-top: 60px;
}
.customClass {
    background: #0c498c;
}
</style>
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
                    <p class="mt-5">
                        <hr>
                        <v-badge color="info" content="Informações para upload" inline class="mb-2 mt-3"></v-badge>
                        <br>
                        Você pode adicionar até 20 arquivos de no máximo 5mb e no formato de .png, .jpg, .jpeg, .pdf, .img .
                    </p>
                <div class="bg-gray-100 sm:px-8 md:px-16 sm:py-8 mt-5">
                    <label class="flex flex-col items-center px-4 py-6 bg-white text-blue rounded-lg shadow-lg
                     tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-white">
                        <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                        </svg>
                        <span class="mt-2 text-sm leading-normal text-center">Jogue seus arquivos ou click no retângulo para envio.
                        <DropZone
                            :maxFiles="Number(20)"
                            :maxFileSize="5"
                            :url="state.urlApi"
                            :uploadOnDrop="true"
                            :multipleUpload="false"
                            :parallelUpload="20"
                            :acceptedFiles="['png', 'jpg', 'jpeg', 'pdf', 'img']"
                            :dropzoneMessageClassName="customClass"
                            style="background: #ffffff; border: 1px solid #c3c3c3; color: #ffffff; width: 100%"
                        />
                            </span>
                    </label>
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




