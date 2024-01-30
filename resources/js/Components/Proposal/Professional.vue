<script setup>
import { reactive, onMounted  } from 'vue';
import functions from '@/Util/functions';
import Address from '@/Components/Address.vue';
import endpoint from '@/Services/endpoints';
import Phone from '@/Components/Proposal/Phone.vue';

const props = defineProps({
  user: Object,
  object_type: String
});

const emit = defineEmits(['updateInput']);

const saveField = (val) => {

  let newstr = val.value

  if(val.name == 'salary' || val.name == 'other_rents') {
    newstr = functions.valurMoneyUSA(val.value)
  }

  var valueInputNew = {
    user_id: props.user.id,
    nameInput: val.name,
    proposal_id: props.user.proposal_id,
    route: 'professional',
    object_type: props.object_type,
    valueInput : newstr
  }
  // //enviando informação para o componente pai
  emit('updateInput', valueInputNew);
}

const state = reactive({
  dialogProfessional: false,
  
  profession: '',
  activity: '',
  name_bussiness: '',
  cnpj: '',
  employment_relationship: '',
  admission_date: '',
  function: '',
  contact_person: '',
  email: '',
  salary: '',
  other_rents: '',
  other_income_source: '',
  object_id: '',
  object_type: '',
})


const getData = () => {
  endpoint.getData('professionals', props.user.proposal_id, props.user.id, 'personal')
    .then(res => {
      //Preenchendo os dados
      state.profession                = res.profession
      state.activity                  = res.activity
      state.name_bussiness            = res.name_bussiness
      state.cnpj                      = res.cnpj
      state.employment_relationship   = res.employment_relationship
      state.contact_person   = res.contact_person
      state.admission_date            = res.admission_date
      state.function                  = res.function
      state.email                     = res.email
      state.salary                    = res.salary
      state.other_rents               = res.other_rents
      state.other_rents               = res.other_income_source
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
  <v-row no-gutters class="mt-10">
    <v-badge color="default" content="Dados Profissionais" inline></v-badge>
  </v-row>
  <div class="m-2 flex w-full flex text-center justify-center">
    <h6>Agora você vai adicionar algumas referências importante sobre o seu perfil profissional.
    </h6>
  </div>
  <div>
   
    <v-row>
      <!-- 987.098.098-88 -->
      <v-dialog
      v-model="state.dialogProfessional"
      width="auto"
    >
      <v-card>
        <v-card-text>
          <v-row>
            <v-col cols="12" sx="6" sm="6" md="4">
        <v-text-field label="Profissão" variant="underlined" @blur="saveField($event.target)" name="profession"  v-model="state.profession"></v-text-field>
      </v-col>
      <v-col cols="12" sx="6" sm="6" md="4">
        <v-text-field label="Atividade" variant="underlined" @blur="saveField($event.target)" name="activity" v-model="state.activity"></v-text-field>
      </v-col>
      <v-col cols="12" sx="6" sm="6" md="4">
        <v-text-field label="Empresa onde trabalha" variant="underlined" @blur="saveField($event.target)" name="name_bussiness" v-model="state.name_bussiness"></v-text-field>
      </v-col>
      <v-col cols="12" sx="6" sm="6" md="4">
        <v-text-field label="CNPJ" type="text" v-mask-cnpj variant="underlined" @blur="saveField($event.target)" name="cnpj" v-model="state.cnpj"></v-text-field>
      </v-col>
      <v-col cols="12" sx="6" sm="6" md="4">
        <v-select label="Vinculo Empregatício" :items="['Aposentado/pensionista', 'Autônomo', 'Empresário', 'Funcionário público',
          'Registro CLT', 'Profisional liberal', 'Outros']" variant="underlined" 
          @blur="saveField($event.target)" name="employment_relationship" 
          v-model="state.employment_relationship"></v-select>
      </v-col>
      <v-col cols="12" sx="6" sm="6" md="4">
        <v-text-field label="Data Admissão" type="date" variant="underlined" @blur="saveField($event.target)" name="admission_date" v-model="state.admission_date"></v-text-field>
      </v-col>
      <v-col cols="12" sx="6" sm="6" md="4">
        <v-text-field label="Cargo/Função" variant="underlined" @blur="saveField($event.target)" name="function" v-model="state.function"></v-text-field>
      </v-col>
      <v-col cols="12" sx="6" sm="6" md="4">
        <v-text-field label="Pessoa para contato" variant="underlined" @blur="saveField($event.target)" name="contact_person" v-model="state.contact_person"></v-text-field>
      </v-col>
      <v-col cols="12" sx="6" sm="6" md="4">
        <v-text-field label="E-mail (RH)" 
        variant="underlined" @blur="saveField($event.target)"
        name="email" v-model="state.email">
      </v-text-field>
      </v-col> 
      <v-col cols="12" sx="6" sm="6" md="4">
        <v-text-field type="text" label="Salário (R$)" 
        variant="underlined" @blur="saveField($event.target)"
        name="salary" v-model="state.salary" v-mask-decimal.br="2">
        </v-text-field>
      </v-col>
      <v-col cols="12" sx="6" sm="6" md="4">
        <v-text-field type="text" label="Outras rendas (R$)"
          variant="underlined" @blur="saveField($event.target)"
          name="other_rents" v-model="state.other_rents" v-mask-decimal.br="2">
        </v-text-field>
      </v-col>
      <v-col cols="12" sx="6" sm="6" md="4">
        <v-text-field label="Origem outras rendas" 
        variant="underlined" @blur="saveField($event.target)"
        name="other_income_source" v-model="state.other_income_source">
        </v-text-field>
      </v-col>
          </v-row>
        </v-card-text>
       
        <v-card-actions class="flex justify-between bg-blue-grey-lighten-4">
            <v-btn class="bg-blue-grey-lighten-5 ml-5 mb-2"
                @click="state.dialogProfessional = false">
                Continuar
            </v-btn>
            
        </v-card-actions>


      </v-card>
    </v-dialog>
      <v-col cols="12" xs="6" sm="6" md="12">        
        <v-row  class="flex justify-center mb-5">
          <v-col cols="12" sx="12" sm="12" md="4" class="flex justify-center">
            <v-btn elevation="2" color="primary m-1" @click="state.dialogProfessional = true">
                    <v-icon icon="fas fa-plus-circle" class="mb-1 mr-1"></v-icon>
                    Adicionar dados profissionais
                    </v-btn>         
          </v-col>
          <v-col cols="12" sx="12" sm="12" md="4" class="flex justify-center">
            <Address :user="props.user" object_type="professional"/>          
          </v-col>
          <v-col cols="12" sx="12" sm="12" md="4" class="flex justify-center">
            <Phone :user="props.user" object_type="professional"/>          
          </v-col>
        </v-row>
      </v-col>
    </v-row>
  </div>
</template>

<style lang="scss" scoped></style>