
<script setup>
import {  onMounted, defineProps,reactive,watch } from 'vue';
import endpoint from '@/Services/endpoints'
import api from "@/Services/server";

import functions from "@/Util/functions";

const props = defineProps({
  proposal: Number,
  user: Object,
  guarantor: Boolean
});

const state = reactive({
  guarantor: [],

});
const getData = () => {
    endpoint.getGuarantor(props.user.id, props.user.proposal_id, 'personal')
    .then(res => {
        state.guarantor = res
    })
    .catch(err => {
        console.log({err})
    })
}

const emit = defineEmits(['loadGuarantor']);

onMounted(() => {
  getData()
})
//Observando alteração na propriedade
watch(
  () => props.guarantor,
  (guarantor) => {
    if(guarantor == true){
        //Chamando a api
        getData();
        setTimeout(() => {
            //Emitindo outro valor para compomente Pai
            emit('loadGuarantor', false);
        }, 500);
    }
  }
)
</script>

<template>
    <div>
        <v-col cols="auto">
            <p>              
              <span>Fiador(es)</span>
            </p>
            <div class="flex flex-wrap gap-4 justify-center text-lg font-serif">              
              <a href="#" v-for='(field) in state.guarantor' 
                class="bg-gray-100 flex-grow text-black border-l-8 border-green-500 rounded-md px-3 py-2 w-full md:w-5/12 lg:w-3/12">
                {{ field.name }}
                <div class="text-gray-500 font-thin text-sm pt-1">
                  <span><strong>E-mail</strong>: {{ field.email }} </span>
                </div>
              </a>
             
            </div>
            <v-btn variant="outlined" size="small"  class="mt-2">
                <a  href="../admin/" target="_blank">
                    Acesse o painel para gerenciar
                </a>
            </v-btn>
          </v-col>
    </div>
</template>


<style lang="scss" scoped>

</style>