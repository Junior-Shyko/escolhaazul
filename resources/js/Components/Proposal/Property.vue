<script setup>
import { reactive } from 'vue';
import DialogProposal from './DialogProposal.vue';
import Address from '@/Components/Address.vue';
import functions from '@/Util/functions';

const props = defineProps({
  user: Object,
  object_type: String
});

const emit = defineEmits(['updateInput']);

const saveField = (val) => {

  let newstr = val.value

  var valueInputNew = {
    user_id: props.user.id,
    nameInput: val.name,
    proposal_id: props.user.proposal_id,
    route: 'property',
    object_type: props.object_type,
    valueInput : newstr  }

  if(val.name == 'value') {
    newstr = functions.valurMoneyUSA(val.value)
      valueInputNew.valueInput = newstr
  }
  // //enviando informação para o componente pai
  emit('updateInput', valueInputNew);
}

const state = reactive({
  dialogProperty: false,
  valueProperty: '',
  registration: '',
  financed: '',
  registry: '',
})

const closeDialog = (value) => {
  state.dialogProperty = value
}




</script>

<template>
  <div>
    <v-row>
      <v-col cols="12" @click="state.dialogProperty = true">
        <v-btn color="white" @click="state.dialogPersonal = true" elevation="2" icon="fas fa-home-user">
        </v-btn>
        <v-row>
          <v-col cols="12">
            <div class="flex justify-center">
              <small class="font-semibold">Imóveis</small>
            </div>
            <DialogProposal :dialog="state.dialogProperty" @updateDialog="closeDialog">
              <v-col cols="12" xs="12" sm="12" md="4">
                <v-text-field label="Valor" variant="underlined" 
                  @blur="saveField($event.target)" name="value"
                  v-model="state.valueProperty"  v-mask-decimal.br="2">
                </v-text-field>
                <v-text-field label="Cartório" variant="underlined" 
                  @blur="saveField($event.target)" name="registry"
                  v-model="state.registry">
                </v-text-field>
              </v-col>
              <v-col cols="12" xs="12" sm="12" md="4">
                <v-select
                  label="Financiado?"
                  variant="underlined"
                  @blur="saveField($event.target)" name="financed"
                  v-model="state.financed"
                  :items="['Sim', 'Não']"
                ></v-select>
               
              </v-col>
              <v-col cols="12" xs="12" sm="12" md="4">
                <v-text-field label="Matrícula" variant="underlined" 
                  @blur="saveField($event.target)" name="registration"
                  v-model="state.registration">
                </v-text-field>
                
              </v-col>
              <v-col xs="12" sm="12" md="12">
                <Address :user="props.user" object_type="property" />
              </v-col>

            </DialogProposal>
          </v-col>
        </v-row>
      </v-col>
    </v-row>
  </div>
</template>

<style lang="scss" scoped></style>