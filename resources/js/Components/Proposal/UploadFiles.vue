<script setup>
import {reactive} from "vue";
import functions from "@/Util/functions";


const state = reactive({
  urlApi: EscolhaApp.baseAPI+'api/form/upload',
  statusUpload: false
})

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