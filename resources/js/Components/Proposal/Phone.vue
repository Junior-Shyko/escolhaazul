<script setup>
import { reactive, onMounted } from 'vue';
import endpoint from '@/Services/endpoints'
import TitleAndSubtitle from './TitleAndSubtitle.vue';
import DialogProposal from './DialogProposal.vue';

const props = defineProps({
  user: Object,
  object_type: String
});

const state = reactive({
  dialogPhone: false,
  number: ''
})

const closeDialog = (value) => {
  state.dialogPhone = value
}

</script>

<template>
    <div>
        <v-row>
      <v-col cols="12">
       
        <v-btn 
          elevation="2" color="primary m-1"
          @click="state.dialogPhone = true">
          <v-icon icon="fas fa-plus-circle" class="mb-1 mr-1"></v-icon>
                    contato telefone
        </v-btn>
        <v-row>
          <v-col cols="12">
            
            <DialogProposal :dialog="state.dialogPhone" @updateDialog="closeDialog">
              <v-col cols="12">
                <TitleAndSubtitle title="Telefone" sub="Seus dados são salvos automaticamente" />
              </v-col>
              <v-col cols="9" xs="9" sm="9" md="9">
                <v-text-field label="Telefone" variant="underlined" 
                  @blur="saveField($event.target)" name="number"
                  v-model="state.number" v-mask-phone.br>
                </v-text-field>
               
              </v-col>
              <v-col cols="3" xs="3" sm="3" md="3">
                <!-- <small class="text-xs">Salvar</small> -->
               <v-btn class="mt-3" color="primary">
               
                <v-icon icon="fas fa-save" class="mb-1 mr-1"></v-icon>
               </v-btn>
               
              </v-col>
              
            </DialogProposal>
          </v-col>
        </v-row>
      </v-col>
    </v-row>
    </div>
</template>



<style lang="scss" scoped>

</style>