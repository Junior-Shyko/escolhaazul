
<script setup>
import { reactive, onMounted  } from 'vue';
import DialogProposal from './DialogProposal.vue';
import functions from '@/Util/functions';
import endpoint from '@/Services/endpoints'
import TitleAndSubtitle from './TitleAndSubtitle.vue';

const props = defineProps({
  user: Object,
  object_type: String
});

const emit = defineEmits(['updateInput']);

const saveField = (val) => {

  let newValue = val.value
  if(val.name == 'phone_fixed' || val.name == 'phone_mobile') {
    newValue = functions.formatPhone(val.value)    
  }

  var valueInputNew = {
    user_id: props.user.id,
    nameInput: val.name,
    proposal_id: props.user.proposal_id,
    route: 'personal',
    object_type: props.object_type,
    valueInput : newValue
  }
  // //enviando informação para o componente pai
  emit('updateInput', valueInputNew);
}

const state = reactive({
  dialogPersonal: false,
  name: '',
  cpf: '',
  phone_fixed: '',
  phone_mobile: '',
  relationship: ''
})

const closeDialog = (value) =>{
  state.dialogPersonal = value
}

const getData = () => {
  endpoint.getData('personals', props.user.proposal_id, props.user.id, 'personal')
    .then(res => {
      //Preenchendo os dados
      console.log({res})
      state.name          = res.name
      state.cpf           = res.cpf
      state.relationship  = res.relationship
      state.phone_fixed   = res.phone_fixed
      state.phone_mobile  = res.phone_mobile
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
      <v-col cols="12" @click="state.dialogPersonal = true">
        <v-btn color="white" @click="state.dialogPersonal = true" 
          elevation="2" icon="fas fa-person">
        </v-btn>
        <v-row>
          <v-col cols="12">
            <div class="flex justify-center">
              <small class="font-semibold">Pessoal</small>
            </div>
              <DialogProposal :dialog="state.dialogPersonal" @updateDialog="closeDialog">
              
                  <v-col cols="12">
                    <TitleAndSubtitle
                    title="Referência Pessoal"
                    sub="Seus dados são salvos automaticamente"
                />
                  </v-col>
               
                <v-col cols="12" xs="12" sm="12" md="12">
                    <v-text-field label="Nome" variant="underlined"
                      @blur="saveField($event.target)"
                      name="name" v-model="state.name">
                    </v-text-field>                    
                </v-col>
                <v-col cols="12" xs="12" sm="12" md="6">
                  <v-text-field label="C.P.F" variant="underlined"
                    @blur="saveField($event.target)"
                    name="cpf" v-model="state.cpf" v-mask-cpf>
                  </v-text-field>
                    <v-text-field label="Telefone" variant="underlined"
                      @blur="saveField($event.target)"
                      name="phone_fixed" v-model="state.phone_fixed" v-mask-phone.br>
                    </v-text-field>
                   
                </v-col>
                <v-col cols="12" xs="12" sm="12" md="6">
                <v-text-field label="Qual a relação?" variant="underlined"
                      @blur="saveField($event.target)"
                      name="relationship" v-model="state.relationship">
                    </v-text-field>
                    <v-text-field label="Telefone" variant="underlined"
                      @blur="saveField($event.target)"
                      name="phone_mobile" v-model="state.phone_mobile" v-mask-phone.br>
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