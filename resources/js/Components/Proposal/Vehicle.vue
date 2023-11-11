<script setup>
import { reactive, onMounted  } from 'vue';
import functions from '@/Util/functions';
import DialogProposal from './DialogProposal.vue';
import endpoint from '@/Services/endpoints'


const props = defineProps({
  user: Object,
  object_type: String
});

const emit = defineEmits(['updateInput']);

const saveField = (val) => {
  var valueInputNew = {
    user_id: props.user.id,
    nameInput: val.name,
    proposal_id: props.user.proposal_id,
    route: 'vehicle',
    object_type: props.object_type,
    valueInput: val.value
  }
  if(val.name == 'value') {
    valueInputNew.valueInput = functions.valurMoneyUSA(val.value)
  }

  // //enviando informação para o componente pai
  emit('updateInput', valueInputNew);
}

const state = reactive({
  dialogVehicle: false,
  branch: '',
  model: '',
  year: '',
  plate: '',
  financed: '',
  financial: '',
  value: ''
})

const closeDialog = (value) => {
  state.dialogVehicle = value
}

const getData = () => {
  endpoint.getData('vehicles', props.user.proposal_id, props.user.id, 'personal')
    .then(res => {
      //Preenchendo os dados
      state.branch    = res.branch
      state.model     = res.model
      state.year      = res.year
      state.plate     = res.plate
      state.financed  = res.financed
      state.financial = res.financial
      state.value     = res.value
    })
    .catch(err => {
      console.log({ err })
    })

}

onMounted(() => {
  getData()
})


</script>

<template>
  <div>
    <v-row>
      <v-col cols="12">
        <v-btn color="white" @click="state.dialogVehicle = true" elevation="2" icon="fas fa-car">
        </v-btn>
        <v-row>
          <v-col cols="12">
            <div class="flex justify-center">
              <small class="font-semibold">Veículo</small>
            </div>
            <DialogProposal :dialog="state.dialogVehicle" @updateDialog="closeDialog">
              <v-col cols="12" xs="12" sm="12" md="3">
                <v-text-field label="Marca" variant="underlined" 
                  @blur="saveField($event.target)" name="branch"
                  v-model="state.branch">
                </v-text-field>               
              </v-col>
              <v-col cols="12" xs="12" sm="12" md="3">
                <v-text-field label="Modelo" variant="underlined" 
                  @blur="saveField($event.target)" name="model"
                  v-model="state.model">
                </v-text-field>
              </v-col>
              <v-col cols="12" xs="12" sm="12" md="3">
                <v-text-field label="Ano" variant="underlined" 
                  @blur="saveField($event.target)" name="year"
                  v-model="state.year">
                </v-text-field>                 
              </v-col>
              <v-col cols="12" xs="12" sm="12" md="3">
                <v-text-field label="Placa" variant="underlined" 
                  @blur="saveField($event.target)" name="plate"
                  v-model="state.plate">
                </v-text-field>                    
              </v-col>
              <v-col cols="12" xs="12" sm="12" md="3">
                <v-select
                  label="Financiado?"
                  variant="underlined"
                  @blur="saveField($event.target)" name="financed"
                  v-model="state.financed"
                  :items="['Sim', 'Não']"
                ></v-select>
              </v-col>
              <v-col cols="12" xs="12" sm="12" md="6">
                <v-text-field label="Financeira" variant="underlined" 
                  @blur="saveField($event.target)" name="financial"
                  v-model="state.financial">
                </v-text-field>                    
              </v-col>
              <v-col cols="12" xs="12" sm="12" md="3">
                <v-text-field label="Valor" variant="underlined" 
                  @blur="saveField($event.target)" name="value"
                  v-model="state.value" v-mask-decimal.br="2">
                </v-text-field>                    
              </v-col>

            </DialogProposal>
          </v-col>
        </v-row>
      </v-col>
    </v-row>
  </div>
</template>

<style lang="scss" scoped></style>